<?php

namespace App\Http\Controllers;

use DataTables;
use App\Consumer;
use App\Wilayah_2018;
use App\Dashboard_Consumer;
use App\Top_Consumer_Regency;
use App\Top_Consumer_District;
use App\MongoDB_Location_Stat; 
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ConsumerController extends Controller
{

    // Dashboard Consumer Function
    public function index()
    {
        $top_5_location     = Top_Consumer_Regency::orderBy('total', 'DESC')->take(5)->get();
        $updateWizard       = Dashboard_Consumer::orderBy('created_at', 'DESC')->take(5)->get();
        $newUpdate          = Dashboard_Consumer::orderBy('created_at', 'DESC')->first();
        $total_customer     = $newUpdate->total_customer;

        return view('dashboard_consumer', [ 'judul'             => 'Dashboard Consumer - BatDE',
                                            'page'              => 'dashboard_consumer',
                                            't_male'            => $newUpdate->male_customer,
                                            't_female'          => $newUpdate->female_customer,
                                            't_customer'        => $newUpdate->total_customer,
                                            'max_createTime'    => $newUpdate->max_create_time,
                                            'min_createTime'    => $newUpdate->min_create_time,
                                            'first_customer'    => $newUpdate->first_customer,
                                            'last_customer'     => $newUpdate->last_customer,
                                            'new_customer'      => $newUpdate->new_customer,
                                            'top_5_dashboard'   => json_decode($updateWizard),
                                            'top_5_location'    => json_decode($top_5_location) ]);
    }

    // LOCATION BY KTP FUNCTION
    public function locationKTPConsumer()
    {
        $data = MongoDB_Location_Stat::all();
        // $users = MongoDB_Location_Stat::collection('ktp_stats')->get();
        foreach ($data as $key => $value) {
            dd($data[0]->data);
        }
        dd(json_decode($data));
        return view('location_stat_ktp', ['judul'    => 'Consumer Location - BatDE',
                                          'page'     => 'location_consumer_ktp']);
    }

    public function getLocationKTPConsumer()
    {

       return 'haha';
    }
    // END OF LOCATION BY KTP

    // Location Of Consumer Function
    public function locationsConsumer(){

        $top_regency        = Top_Consumer_Regency::distinct()
                                                ->orderBy('total', 'DESC')->take(10)
                                                ->get(['regency', 'total']);

        $top_district       = Top_Consumer_District::distinct()
                                                ->orderBy('total', 'DESC')->take(10)
                                                ->get(['district', 'total']);

        return view('location_stat', [   'judul'            => 'Consumer Location - BatDE',
                                         'page'             => 'location_consumer',
                                         'top_regency'      => json_decode($top_regency),
                                         'top_district'     => json_decode($top_district)]);
    }

    public function getDistrictConsumer()
    {
        $district          = Consumer::selectRaw('kecamatan, count(*) as jumlah')
                                        ->groupBy('kecamatan')
                                        ->with(['location_kecamatan'])
                                        ->orderByRaw('jumlah DESC')
                                        ->get();

        $datatables = Datatables::of($district)
                        ->addIndexColumn();
        return $datatables->make(true);   
    }

    public function getCityConsumer()
    {
        $city               = Consumer::selectRaw('city, count(*) as jumlah')
                                        ->groupBy('city')
                                        ->with(['location'])
                                        ->orderByRaw('jumlah DESC')
                                        ->get();

        $datatables = Datatables::of($city)
                        ->addIndexColumn();
        return $datatables->make(true);   
    }

    // Product Type Function
    public function productType()
    {
        $product            = Consumer::selectRaw('current_product, count(*) as jumlah')
                                        ->groupBy('current_product')
                                        ->join('product_master', 'consumer.current_product', '=', 'product_master.pid')
                                        ->with(['product'])
                                        ->orderByRaw('jumlah DESC')->take(5)
                                        ->get();

        return view('product_type', [   'judul' => 'Product Type - BatDE',
                                        'page'  => 'product_consumer',
                                        'products' => json_decode($product) ]);                       
    }

    public function getProductType()
    {
        $product            = Consumer::selectRaw('current_product, count(*) as jumlah')
                                        ->groupBy('current_product')
                                        // ->join('product_master', 'consumer.current_product', '=', 'product_master.pid')
                                        ->with(['product'])
                                        ->orderByRaw('jumlah DESC')
                                        ->get();
                
        $datatables = Datatables::of($product)
                        ->addIndexColumn();
        return $datatables->make(true);
    }
}