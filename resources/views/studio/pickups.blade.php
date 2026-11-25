@extends('layouts.studio')
@section('title', 'Pickup schedule')
@section('content')
    <div class="card">
        <ol class="list-group list-group-flush pickup-list">
            @foreach ($orders as $order)
                <li class="list-group-item">
                    <strong>{{ $order['pickup'] }}</strong>
                    <span>{{ $order['design'] }}</span>
                    <span class="order-number">{{ $order['number'] }}</span>
                </li>
            @endforeach
        </ol>
    </div>
@endsection
