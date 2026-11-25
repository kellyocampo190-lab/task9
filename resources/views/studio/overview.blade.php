@extends('layouts.studio')
@section('title', 'Studio overview')
@section('content')
    <div data-studio-page="overview" data-pickups="{{ route('pickups', [], false) }}" data-api="{{ route('studio.data', [], false) }}"></div>
@endsection
