@extends('layouts.masterapp')
@section('content')

{{-- BEGIN BREADCUMBS --}}
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Consumer Location</h1>
      </div>
    </div>
  </div>

  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="#">Consumer Statistic</a></li>
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
      <div class="row">
        <div class="col-sm-3">
          <div class="card">
            <div class="p-0 clearfix">
              <i class="fa fa-users bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
              <div class="h5 text-primary mb-0 pt-3">{{ $total_regency }}</div>
              <div class="text-muted text-uppercase font-weight-bold font-xs small">Valid Regency</div>
            </div>
          </div>
        </div>
    
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body p-0 clearfix">
              <i class="fa fa-users bg-info p-4 font-2xl mr-3 float-left text-light"></i>
              <div class="h5 text-info mb-0 pt-3">{{ $total_district }}</div>
              <div class="text-muted text-uppercase font-weight-bold font-xs small">Valid District</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
        
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-3">Statistic / Regency</h4>
                  <canvas id="team-chart"></canvas>
                </div>
              </div>
            </div>
        
            <div class="col-sm-12">
              <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <strong class="card-title">City Table</strong>
                      </div>
                      <div class="card-body">
                        <table id="table_location_stat_city" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>City Area</th>
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
          </div>
        </div>


        <div class="col-sm-6">
          
          <div class="row">
        
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-3">Statistic / District </h4>
                  <canvas id="team-chart-2"></canvas>
                </div>
              </div>
            </div>
        
            <div class="col-sm-12">
              <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <strong class="card-title">District Table</strong>
                      </div>
                      <div class="card-body">
                        <table id="table_location_stat_district" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>District Area</th>
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
          </div>
        </div>



      </div>
    </div>

    


    
  </div>
  

    
</div>

@endsection
