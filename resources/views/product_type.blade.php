@extends('layouts.masterapp')
@section('content')

{{-- BEGIN BREADCUMBS --}}
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Current Product</h1>
      </div>
    </div>
  </div>

  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="#">Consumer Statistic</a></li>
          <li class="active">Current Product</li>
        </ol>
      </div>
    </div>
  </div>
</div>

{{-- END BREADCUMB --}}

{{-- BEGIN CONTENT --}}
<div class="content mt-3">
  <div class="row">

      <div class="col-sm-6">

        <div class="row">

          <div class="col-sm-4">
                    <div class="card bg-flat-color-3 text-light">
                        <div class="card-body">
                            <div class="h4 m-0">{{ $total_data }}</div>
                            <div>Total Consumer</div>
                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            <small class="text-light"></small>
                        </div>
                    </div>
            </div>

            <div class="col-sm-4">
              <div class="card bg-flat-color-1 text-light">
                <div class="card-body">
                  <div class="h4 m-0">{{ $total_data_valid }}</div>
                  <div>Valid Product</div>
                  <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100"></div>
                  <small class="text-light"></small>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="card bg-flat-color-4 text-light">
                <div class="card-body">
                  <div class="h4 m-0">{{ $total_data_invalid }}</div>
                  <div>Invalid Product</div>
                  <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;"
                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  <small class="text-light"></small>
                </div>
              </div>
            </div>
          
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-3">Team Commits </h4>
                  <canvas id="team-chart-product-type"></canvas>
                </div>
              </div>
            </div>

        </div>

          
      </div>

    <div class="col-sm-6">
      <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Current Product</strong>
                            </div>
                            <div class="card-body">
                                <table id="table_product_type" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>Count</th>
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

    <div class="col-sm-6">

    </div>
  </div>
  

    
</div>

@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


