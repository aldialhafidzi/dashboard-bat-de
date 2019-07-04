@extends('layouts.masterapp')
@section('content')

{{-- BEGIN BREADCUMBS --}}
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Consumer Location By NCP</h1>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Consumer Statistic</a></li>
                    <li class="active">Location By NCP</li>
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
        
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one pull-left">
                                <div class="stat-icon dib"><i class="ti-user text-info border-info"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Location NCP</div>
                                    <div class="stat-digit">{{ $total_data }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9"> </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Statistic </h4>
                    <canvas id="team-chart-consumer-location-ncp"></canvas>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Regency Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="table_location_by_ncp" class="table table-striped table-bordered">
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

@endsection
