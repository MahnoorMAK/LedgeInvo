@extends('Layout.app')

@section('title', 'LedgeInvo - Financial Clarity for Every Role')

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

@include('Component.ModulesTabs')
@include('Component.TopClients')
@include('Component.Slider3D')

@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection