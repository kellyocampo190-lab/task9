@extends('layouts.studio')
@section('title', 'Order book')
@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table studio-table" aria-label="Studio orders">
                <thead><tr><th scope="col">Order</th><th scope="col">Arrangement</th><th scope="col">Qty.</th><th scope="col">Status</th></tr></thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order['number'] }}</th>
                            <td>{{ $order['design'] }}</td>
                            <td>{{ $order['quantity'] }}</td>
                            <td><span class="order-status">{{ $order['status'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
