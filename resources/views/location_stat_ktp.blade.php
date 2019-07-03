@extends('layouts.masterapp')
@section('content')

{{-- BEGIN BREADCUMBS --}}
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Consumer Location By KTP</h1>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Consumer Statistic</a></li>
                    <li class="active">Location By KTP</li>
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
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Statistic </h4>
                    <canvas id="team-chart-consumer-location-ktp"></canvas>
                </div>
            </div>
        </div>

        {{-- <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Team Commits </h4>
                    <canvas id="team-chart-2"></canvas>
                </div>
            </div>
        </div> --}}

        <div class="col-sm-6">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">District Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="table_location_by_ktp" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>District Area</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @php --}}
                                            // $i = 1;
                                        // @endphp
                                        {{-- @foreach ($data as $item) --}}
                                            {{-- <tr> --}}
                                                {{-- <td>{{$i}}</td> --}}
                                                {{-- <td>{{$item->code}}</td> --}}
                                                {{-- <td>{{$item->name}}</td> --}}
                                                {{-- <td>{{$item->count}}</td> --}}
                                            {{-- </tr> --}}
                                        {{-- @php --}}
                                            // $i++;
                                        // @endphp
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        {{-- <div class="col-sm-6">
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
        </div> --}}



    </div>



</div>

@endsection