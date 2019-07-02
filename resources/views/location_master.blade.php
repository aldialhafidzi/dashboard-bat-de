@extends('layouts.masterapp')
@section('content')

{{-- BEGIN BREADCUMBS --}}

  <div class="breadcrumbs">
    <div class="col-sm-4">
      <div class="page-header float-left">
        <div class="page-title">
          <h1>Location</h1>
        </div>
      </div>
    </div>
  
    <div class="col-sm-8">
      <div class="page-header float-right" >
        <div class="page-title">
          <ol class="breadcrumb text-right" >
            <li><a href="#">Table</a></li>
            <li class="active">Location</li>
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
                                        <button type="button" class="btn btn-success product-master-export-excel"> <span> <i class="fas fa-file-excel"></i> </span>&nbsp; Export &nbsp;</button>
                                        <button type="button" class="btn btn-primary" onclick="tambahLocationForm();"> <span> <i class="fa fa fa-plus"></i> </span>&nbsp; Add Data &nbsp;</button>
                                    </div>
                            </div>
                            <div class="card-body">
                                <table id="table_location" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Province</th>
                                            <th>Regency</th>
                                            <th>District</th>
                                            <th>Village</th>
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

{{-- MODAL LOCATION MASTER --}}

                  <div class="modal fade" id="modal_location_Master" tabindex="-1" role="dialog" aria-labelledby="modal_location_MasterLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_location_MasterLabel">Medium Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                              <div class="card">
                                <div class="card-body card-block">
                                    <form id="form_location_master" class="needs-validation form-horizontal" novalidate>
                                      @csrf {{ method_field("POST") }}

                                      <div class="row">

                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="id_province">Province Code</label>
                                            <input type="text" class="form-control" disabled="" id="id_province" name="id_province" placeholder="Enter Province area code">
                                          </div>
                                        </div>

                                        <div class="col-sm-8">
                                          <div class="form-group">
                                            <label for="id_province">Province Name</label>
                                            <input type="text" class="form-control" disabled="" id="province" name="province" placeholder="Enter Province area name">
                                          </div>
                                        </div>

                                      </div>

                                      <div class="row">

                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="id_province">Regency Code</label>
                                            <input type="text" class="form-control" disabled="" id="id_regency" name="id_regency" placeholder="Enter Regency area code">
                                          </div>
                                        </div>

                                        <div class="col-sm-8">
                                          <div class="form-group">
                                            <label for="id_province">Regency Name</label>
                                            <input type="text" class="form-control" disabled="" id="regency" name="regency" placeholder="Enter Regency area name">
                                          </div>
                                        </div>

                                      </div>

                                      <div class="row">

                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="id_province">District Code</label>
                                            <input type="text" class="form-control" disabled="" id="id_district" name="id_district" placeholder="Enter District area code">
                                          </div>
                                        </div>

                                        <div class="col-sm-8">
                                          <div class="form-group">
                                            <label for="id_province">District Name</label>
                                            <input type="text" class="form-control" disabled="" id="district" name="district" placeholder="Enter District area name">
                                          </div>
                                        </div>

                                      </div>

                                      <div class="row">

                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="id_province">Village Code</label>
                                            <input type="text" class="form-control" disabled="" id="id_village" name="id_village" placeholder="Enter Village area code">
                                          </div>
                                        </div>

                                        <div class="col-sm-8">
                                          <div class="form-group">
                                            <label for="id_province">Village Name</label>
                                            <input type="text" class="form-control" disabled="" id="village" name="village" placeholder="Enter Village area name">
                                          </div>
                                        </div>

                                      </div>

                                        <div class="row form-group" style="padding-top:20px;">
                                          <div class="col-sm-12 pull-right">
                                            <label class="switch switch-text switch-primary switch-pill"><input type="checkbox" id="switch_edit_location" class="switch-input" checked="false"> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span></label>
                                            <small>Click here to enable edit data.</small>
                                          </div>
                                        </div>


                                    </form>

                                  </div>

                                </div>

                            </div>

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="submit_location_master" id="submit_location_master" value="Update" form="form_location_master">
                            </div>
                        </div>
                    </div>
                </div>

@endsection



