@extends('layouts.app')

@section('title', "Home")

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h4>Welcome to the 'Is it closed or flooded' website, for Costessey. </h4>
            <p>The aim of the website is to allow anybody to quickly see if any of the roads are Closed or Flooded. The status of each location is purely based on the amount of reports in the last 24 hours, so it relies on people reporting!</p>
            <h5>Disclaimer</h5>
            <p>Use this information at your own risk, we hold no guarrantees of it's accuracy.</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row counters justify-content-center">
        @foreach($locations as $location)
        <div class="col-12 mb-3">
            <div class="card">
                <h5 class="card-header @if($location->status == 'open') text-bg-success @elseif($location->status == 'flooded') text-bg-primary @elseif($location->status == 'closed') text-bg-danger @endif">Costessey Mill - <span class="text-uppercase">{{$location->status}}</span></h5>
                <div class="card-body">
                    {!! $location->embedded_map !!}
                </div>
                <div class="card-footer text-muted">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <h3>Current Stats: </h3>
                                <p>Reported Closed <i class="fa-solid fa-ban"></i> (in last 24 Hours): {{$location->reports->where('type', 'closed')->where('created_at', '>', Carbon\Carbon::now()->subHours(24))->count()}}</p>
                                <p>Reported Flooded <i class="fa-solid fa-house-flood-water"></i> (in last 24 Hours): {{$location->reports->where('type', 'flooded')->where('created_at', '>', Carbon\Carbon::now()->subHours(24))->count()}}</p>
                                <p>Reported Open (in last 24 Hours): {{$location->reports->where('type', 'open')->where('created_at', '>', Carbon\Carbon::now()->subHours(24))->count()}}</p>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h3>Report: </h3>
                                <a href="{{route('report', ['status'=>'closed', 'location'=>$location->id])}}" class="btn btn-danger" data-mdb-ripple-init>Closed <i class="fa-solid fa-ban"></i></a>
                                <a href="{{route('report', ['status'=>'flooded', 'location'=>$location->id])}}" class="btn btn-primary" data-mdb-ripple-init>Flooded <i class="fa-solid fa-house-flood-water"></i></a>
                                <a href="{{route('report', ['status'=>'open', 'location'=>$location->id])}}" class="btn btn-success" data-mdb-ripple-init>Open</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h5>Using this tool</h5>
            <p>Only 1 report per location every 30 minutes is permitted. This is to prevent abuse and reduce any potential of misleading information. When you use the report buttons, we will log your IP address for the purpose of preventing abuse only. We do not collect or use any other data whilst you use this tool. Essential cookies are present, but do not track any personal data.</p>
        </div>
    </div>
</div>
@endsection
 
@push('js')

@endpush
