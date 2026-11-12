@extends('Layout.app1')

@section('title', 'LedgeInvo - Financial Clarity for Every Role')

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

    @include('Component.gallery')


   {{-- ✅ Hero Slider (full-screen image carousel) --}}
   @include('Component.cloud-shader-hero')

    {{-- ✅ Hero Section (text, CTA, and abstract dashboard mockup) --}}

    {{-- ✅ Cloud Shader Hero Section --}}
    @include('Component.Hero', ['sliderId' => 'hero-home']) 

    <!-- Main Hero Section -->
    <div class="hero-container">

        <!-- Left Side: Text & CTA -->
        <div class="hero-text">
            <h1>Financial clarity for <span>every role.</span></h1>
            <p>Streamlined access for companies, vendors, customers &amp; more. Experience a unified platform designed to bring transparency and efficiency to your entire financial ecosystem.</p>

            <div class="hero-buttons">
                <button class="btn-primary btn-large">
                    Start for free
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </button>
                <button class="btn-secondary">Book a demo</button>
            </div>
        </div>

        <!-- Right Side: Abstract Dashboard Mockup -->
        <div class="dashboard-mockup">
            <div class="mockup-header">
                <div class="mockup-title">Financial Overview</div>
                <div class="mockup-dots">
                    <span></span><span></span><span></span>
                </div>
            </div>

            <div class="mockup-chart">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>

            <div class="mockup-stats">
                <div class="stat-card">
                    <div class="stat-label">Total Revenue</div>
                    <div class="stat-value">$124,500</div>
                    <div class="stat-trend">
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        12.5%
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Pending Invoices</div>
                    <div class="stat-value">24</div>
                    <div class="stat-trend" style="color: #F59E0B;">
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Action needed
                    </div>
                </div>
            </div>
        </div>

    </div>

    
@include('Component.StatsBar')
@include('Component.FeaturesGrid')
@include('Component.ModulesTabs')
@include('Component.TopClients')
@include('Component.Slider3D')

@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection