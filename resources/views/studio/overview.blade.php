@extends('layouts.studio')
@section('title', 'Studio overview')
@section('content')
    <div class="row metrics">
        @foreach (['Orders' => $orderCount, 'Arrangements' => $arrangementCount, 'Ready for pickup' => $readyCount] as $label => $value)
            <div class="col-md-4">
                <div class="small-box studio-metric">
                    <div class="inner"><p>{{ $label }}</p><h2>{{ $value }}</h2></div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card first-pickup">
        <div class="card-body">
            <div>
                <h2>First pickup</h2>
                <p>{{ $firstPickup['pickup'] }} · {{ $firstPickup['design'] }}</p>
            </div>
            <a href="{{ route('pickups') }}">View schedule <span aria-hidden="true">→</span></a>
        </div>
    </div>
@endsection
