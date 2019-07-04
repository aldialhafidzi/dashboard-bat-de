@extends('layouts.masterapp')
@section('content')

{{-- BEGIN BREADCUMBS --}}
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Product Master</h1>
      </div>
    </div>
  </div>

  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="#">Table</a></li>
          <li class="active">Product Master</li>
        </ol>
      </div>
    </div>
  </div>
</div>
{{-- END BREADCUMB --}}

{{-- BEGIN CONTENT --}}
<div class="content mt-3">
  <div class="row">
    <div class="col-sm-12">
      <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="pull-left btn-group btn-group-sm" role="group">
                                        <a class="btn btn-primary" href="{{url('product-export-excel')}}" class="btn btn-success product-master-export-excel"></a> <span> <i class="fas fa-file-excel"></i> </span>&nbsp; Export &nbsp;</a>
                                        <button type="button" class="btn btn-primary" onclick="tambahProductForm();"> <span> <i class="fa fa fa-plus"></i> </span>&nbsp; Add Data &nbsp;</button>
                                    </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <table id="table_product_master" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Product Name</th>
                                                <th>Product Description</th>
                                                <th>Price</th>
                                                <th width="120px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                  </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
      </div>

    </div>

  </div>
</div>


                <div class="modal fade" id="modal_product_Master" tabindex="-1" role="dialog" aria-labelledby="modal_product_MasterLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_product_MasterLabel">Medium Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <div class="card">
                                  <form id="form_product_master" class="needs-validation" novalidate>
                                  @csrf {{ method_field("POST") }}

                                  <div class="card-body card-block">
                                    
                                    <div class="row">

                                      <div class="col-sm-6">
                                          <label for="form-control-label">Brand Name</label>
                                          <select class="form-control" name="bid" id="bid" placeholder="Choose a brand">
                                            @foreach ($brands as $item)
                                                <option value="{{ $item->bid }}">{{ $item->brand_name }}</option>
                                              @endforeach
                                          </select>
                                      </div>


                                      <div class="col-sm-6">
                                            <label class=" form-control-label">Product Name</label>
                                            <input id="p_name" name="p_name" class="form-control">
                                      </div>

                                    </div>

                                    <div class="row" style="padding-top:20px;">

                                      <div class="col-sm-6">
                                          <label for="form-control-label">Is Bat</label>
                                          <select class="form-control" name="is_bat" id="is_bat">
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                          </select>
                                      </div>

                                      <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class=" form-control-label">Product Description</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                <input id="p_desc" name="p_desc" class="form-control">
                                            </div>
                                        </div>
                                      </div>

                                      <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class=" form-control-label">Product Price</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                                <input id="price" name="price" class="form-control">
                                            </div>
                                        </div>
                                      </div>

                                    </div>

                                    <input id="pid" name="pid" type="hidden" value="">
                                    
                                </div>

                                </form>
                               </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="submit_product_master" id="submit_product_master" value="Update" form="form_product_master">
                            </div>
                        </div>
                    </div>
                </div>
@endsection
