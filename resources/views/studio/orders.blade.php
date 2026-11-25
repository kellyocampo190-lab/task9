@extends('layouts.studio')
@section('title', 'Order book')
@section('content')
    <div class="card table-responsive">
        <table class="table studio-table" aria-label="Studio orders">
            <thead><tr><th scope="col">Order</th><th scope="col">Arrangement</th><th scope="col">Qty.</th><th scope="col">Status</th></tr></thead>
            <tbody data-studio-page="orders" data-api="{{ route('studio.data', [], false) }}"></tbody>
        </table>
    </div>
@endsection
