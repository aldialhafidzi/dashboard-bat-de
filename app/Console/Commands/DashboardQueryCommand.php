<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Product;
use App\Consumer;
use App\Location;
use App\OneToOne;
use App\Dlab;
use App\Social_Seller;
use App\User_Epostcard;
use App\Ncp;
use App\User_Code;
use App\User_Quiz;
use App\Log_Game;
use \stdClass;
use App\Dashboard_Consumer;
use App\Top_Consumer_Regency;
use Illuminate\Console\Command;

class DashboardQueryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dashboard:query';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update dashboard table every week';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
            // GET MAX CREATED_AT
            $data_db = [];

            $data_db[0] = json_decode(OneToOne::select('create_time as created_at')->where('create_time', \DB::raw('(select max("create_time") from "public"."121" )'))->first());
            $data_db[1] = json_decode(Dlab::where('registration_date', \DB::raw('(select max("registration_date") from "public"."dlab" )'))
                                            ->OrderBy('registration_time', 'DESC')->first());
            $data_db[2] = json_decode(Social_Seller::select('created_at')->where('created_at', \DB::raw('(select max("created_at") from "public"."social_seller" )'))->first());
            $data_db[3] = json_decode(User_Epostcard::select('created_at')->where('created_at', \DB::raw('(select max("created_at") from "public"."user_epostcards" )'))->first());
            $data_db[4] = json_decode(Ncp::select('create_time as created_at')->where('create_time', \DB::raw('(select max("create_time") from "public"."ncp" )'))->first());
            $data_db[5] = json_decode(User_Code::select('created_at')->where('created_at', \DB::raw('(select max("created_at") from "public"."user_codes" )'))->first());
            $data_db[6] = json_decode(User_Quiz::select('created_at')->where('created_at', \DB::raw('(select max("created_at") from "public"."user_quiz" )'))->first());
            $data_db[7] = json_decode(Log_Game::select('created_at')->where('created_at', \DB::raw('(select max("created_at") from "public"."log_games" )'))->first());

            if ($data_db[1] != null) {
                $date = $data_db[1]->registration_date;
                $time = $data_db[1]->registration_time;
                $merge_dlab         = "$date $time";
                $merge_dlab         = date("Y-m-d H:i:s", strtotime($merge_dlab));
                $object             = new stdClass();
                $object->created_at = $merge_dlab;
                $data_db[1]         = $object;
            }

            $max_times          = [];
            foreach ($data_db as $key => $value) {
                if ($value != null) {
                    array_push($max_times, $value->created_at);
                }
            }

            $max                = max(array_map('strtotime', $max_times));
            $max_create_time    = date('Y-m-j H:i:s', $max);
            // MAX CREATED TIME UDAH DI DAPAT!

            // GET MIN CREATED_AT
            $data_db[0] = json_decode(OneToOne::select('create_time as created_at')->where('create_time', \DB::raw('(select min("create_time") from "public"."121" )'))->first());
            $data_db[1] = json_decode(Dlab::where('registration_date', \DB::raw('(select min("registration_date") from "public"."dlab" )'))
                                            ->OrderBy('registration_time', 'DESC')->first());
            $data_db[2] = json_decode(Social_Seller::select('created_at')->where('created_at', \DB::raw('(select min("created_at") from "public"."social_seller" )'))->first());
            $data_db[3] = json_decode(User_Epostcard::select('created_at')->where('created_at', \DB::raw('(select min("created_at") from "public"."user_epostcards" )'))->first());
            $data_db[4] = json_decode(Ncp::select('create_time as created_at')->where('create_time', \DB::raw('(select min("create_time") from "public"."ncp" )'))->first());
            $data_db[5] = json_decode(User_Code::select('created_at')->where('created_at', \DB::raw('(select min("created_at") from "public"."user_codes" )'))->first());
            $data_db[6] = json_decode(User_Quiz::select('created_at')->where('created_at', \DB::raw('(select min("created_at") from "public"."user_quiz" )'))->first());
            $data_db[7] = json_decode(Log_Game::select('created_at')->where('created_at', \DB::raw('(select min("created_at") from "public"."log_games" )'))->first());

            if ($data_db[1] != null) {
                $date = $data_db[1]->registration_date;
                $time = $data_db[1]->registration_time;
                $merge_dlab         = "$date $time";
                $merge_dlab         = date("Y-m-d H:i:s", strtotime($merge_dlab));
                $object             = new stdClass();
                $object->created_at = $merge_dlab;
                $data_db[1]         = $object;
            }

            $min_times          = [];
            foreach ($data_db as $key => $value) {
                if ($value != null) {
                    array_push($min_times, $value->created_at);
                }
            }

            $min                = min(array_map('strtotime', $min_times));
            $min_create_time    = date('Y-m-j H:i:s', $min);

            // END OF MAX / MIN CREATED TIME

            // BEGIN FIRST / LAST CUSTOMER
            $first_customer     = json_decode(Consumer::orderBy('id', 'ASC')->first());
            $last_customer      = json_decode(Consumer::orderBy('id', 'DESC')->first());
            // END OF FIRST / LAST CUSTOMER

            // BEGIN TOTAL & NEW CUSTOMER
            $total_customer              = Consumer::count();
            $new_customer                = 0;
            $chek_total_cust_dashboard   = json_decode(Dashboard_Consumer::select('total_customer')
                                                                        ->orderBy('created_at', 'DESC')->first());
            if ($chek_total_cust_dashboard != null) {
                $new_customer                = (int) $total_customer - (int) $chek_total_cust_dashboard->total_customer;
            }
            // END OF TOTAL & NEW CUSTOMER

            // BEGIN MALE / FEMALE CUSTOOMER
            $male_customer         = Consumer::where('gender', 'Male')->count();
            $female_customer       = Consumer::where('gender', 'Female')->count();
            // END OF MALE / FEMALE CUSTOMER

            // dd($total_customer);
            // BEGIN INSERT TO DASHBOARD TABLE
            $data = [
                'max_create_time'       => $max_create_time,
                'min_create_time'       => $min_create_time,
                'first_customer'        => $first_customer->name,
                'last_customer'         => $last_customer->name,
                'total_customer'        => $total_customer,
                'new_customer'          => $new_customer,
                'male_customer'         => $male_customer,
                'female_customer'       => $female_customer,
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            ];

            Dashboard_Consumer::insert($data);
            // END OF INSERT TO DASHBOARD TABLE

             // BEGIN TOP LOCATION CUSTOMER
            $top_location               = json_decode (Consumer::selectRaw('city, count(*) as jumlah')
                                        ->groupBy('city')
                                        ->with(['location'])
                                        ->whereNotNull('city')
                                        ->orderByRaw('jumlah DESC')
                                        ->get());
            // END OF TOP LOCATION CUSTOMER

            // CLEAR TABLE DULU
            Top_Consumer_Regency::truncate();
            // END CLEAR TABLE
            // BEGIN INSERT TO TOP LOCATION
            foreach ($top_location as $key => $value) {
                $data = [
                    'regency'     => $value->location->regency,
                    'total'       => $value->jumlah,
                    'created_at'  => Carbon::now(),
                    'updated_at'  => Carbon::now()
                ];

                Top_Consumer_Regency::insert($data);
            }
            // END OF INSERT TO TOP LOCATION 

    }
}
