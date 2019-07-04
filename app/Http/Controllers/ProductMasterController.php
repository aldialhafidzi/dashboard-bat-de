<?php

namespace App\Http\Controllers;

use DataTables;
use App\Brand;
use App\Product;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ProductMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view(
            'product_master',
            [
                'judul'       => 'Dashboard BatDE',
                'page'        => 'product-master',
                'brands'      => $brands
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'bid'       => $request['bid'],
            'p_name'    => $request['p_name'],
            'p_desc'    => $request['p_desc'],
            'price'     => $request['price'],
            'is_bat'    => $request['is_bat']
        ];

        Product::insert($data);
        return response()->json(['message' => 'Product data added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::with(['brand'])->where('pid', $id)->firstOrFail();
        return $products;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product            = Product::find($id);

        $product->bid       = $request['bid'];
        $product->is_bat    = $request['is_bat'];
        $product->p_name    = $request['p_name'];
        $product->p_desc    = $request['p_desc'];
        $product->price     = $request['price'];
        $product->timestamps = false;
        $product->save();

        return response()->json(['message' => 'Product data updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Product data deleted successfully.']);
    }

    public function getAllProduct()
    {
        $product = Product::orderBy('price', 'DESC')->get();
        $datatables = Datatables::of($product)
            ->addIndexColumn()
            ->addColumn('action', function ($product) {
                return '<a onclick="editProductForm(' . $product->pid . ')" style="color : #FFF;" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>' . ' ' .
                    '<a onclick="deleteProductForm(' . $product->pid . ')" style="color : #FFF;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus_data" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
            });
        return $datatables->make(true);
    }

    public function export_excel()
    {
        return Excel::download(new ProductExport, 'Product.xlsx');
    }
}
