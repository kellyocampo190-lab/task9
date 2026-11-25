@extends('layouts.studio')
@section('title', 'Pickup schedule')
@section('content')
    <div class="card">
        <ol class="list-group list-group-flush pickup-list" data-studio-page="pickups" data-api="{{ route('studio.data', [], false) }}"></ol>
    </div>
@endsection
