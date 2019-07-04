@extends('layouts.masterapp')
@section('content')

{{-- BEGIN BREADCUMBS --}}
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Consumer Location By SS</h1>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Consumer Statistic</a></li>
                    <li class="active">Location By SS</li>
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

                <div class="col-md-6 col-lg-3">
                    <div class="card bg-flat-color-1 text-light">
                        <div class="card-body">
                            <div class="h4 m-0">{{ $total_data }}</div>
                            <div>Total Sosial Seller</div>
                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            <small class="text-light"></small>
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
                                    <h4 class="mb-3">Statistic </h4>
                                    <canvas id="team-chart-consumer-location-ss"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="animated fadeIn">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Regency Table</strong>
                                            </div>
                                            <div class="card-body">
                                                <table id="table_location_by_ss" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Regency Area</th>
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
                                    <h4 class="mb-3">Statistic </h4>
                                    <canvas id="team-chart-consumer-location-ss-district"></canvas>
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
                                                <table id="table_location_by_ss_district" class="table table-striped table-bordered">
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
