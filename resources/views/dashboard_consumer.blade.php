@extends('layouts.masterapp')
@section('content')

{{-- BEGIN BREADCUMBS --}}
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Consumer Dashboard</h1>
      </div>
    </div>
  </div>

  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li class="active">Consumer</li>
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

         <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-time text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Max Created Time</div>
                                <div class="stat-digit" style="font-size:12px;">{{ $max_createTime }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-time text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Min Created Time</div>
                                <div class="stat-digit" style="font-size:12px;">{{ $min_createTime }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-sm-12 col-lg-6">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>

                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $t_customer }}</span>
                        </h4>
                        <br>
                        <p class="text-light"><span><i class="fa fa-users"></i></span> Total Customer</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                        <p class="text-light pull-right" style="font-size:12px;">Last Week</p>
                    </div>

                </div>
            </div>

            <div class="col-sm-12 col-lg-6">
                <div class="card text-white bg-flat-color-5">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $new_customer }}</span>
                        </h4>
                        <br>
                        <p class="text-light"> <span> <i class="fa fa-smile-o"></i></span> New Customer</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                        <p class="text-light pull-right" style="font-size:12px;">Last Week</p>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong class="card-title">Top 5 Consumer Location</strong>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Area</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                      @php
                          $i = 1;
                      @endphp
                      @foreach ($top_5_location as $item)
                        <tr>
                          <td scope="row">{{$i}}</td>
                          <td>{{ $item->regency }}</td>
                          <td>{{ $item->total }}</td>
                        </tr>    
                      @php
                         $i++; 
                      @endphp
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>            
            </div>

           

      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">

        <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-bolt text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">First Customer</div>
                                <div class="stat-digit" style="font-size:12px;">{{ $first_customer }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-flag text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Last Customer</div>
                                <div class="stat-digit" style="font-size:12px;">{{ $last_customer }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $t_male }}</span>
                        </h4>
                        <br>
                        <p class="text-light"> <span> <i class="fa fa-male"></i></span> Male Customer</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                        <p class="text-light pull-right" style="font-size:12px;">Last Week</p>
                    </div>
                </div>
            </div>



            <div class="col-sm-12 col-lg-6">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{ $t_female }}</span>
                        </h4>
                        <br>
                        <p class="text-light"> <span> <i class="fa fa-female"></i></span> Female Customer</p>

                        
                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart3"></canvas>
                          </div>
                          
                          <p class="text-light pull-right" style="font-size:12px;">Last Week</p>
                        </div>
                </div>
            </div>


            <div class="col-xl-12 col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-3">Gender Percentage</h4>
                  <canvas id="doughutChart"></canvas>
                </div>
              </div>
            </div>


      </div>
    </div>
  </div>

   
</div>
{{-- END CONTENT --}}



          {{-- <div class="row"> --}}

            {{-- <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Customer</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $t_customer }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}

            {{-- <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Male Customer</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $t_male }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-male fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}

            {{-- <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Female Customer</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $t_female }}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-female fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> --}}

                  {{-- <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Max Create Time</div>
                              <div class="h7 mb-0 font-weight-bold text-gray-800">{{ $max_createTime }}</div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> --}}

                      {{-- <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Min Create Time</div>
                                  <div class="h7 mb-0 font-weight-bold text-gray-800">{{ $min_createTime }}</div>
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> --}}
        
          {{-- </div> --}}
        



            


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


