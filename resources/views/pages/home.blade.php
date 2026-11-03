@extends('layout.app')

@section('title', 'Home — LedgeInvo')

@section('content')
    
    <!-- Welcome Text (Jo aapne diya tha) -->
    <div style="text-align: center; padding: 80px 20px 40px;">
        <h1 style="font-size: 3rem; color: #0f172a; font-weight: 800;">Welcome to LedgeInvo</h1>
        <p style="font-size: 1.2rem; color: #64748b;">Smart Solutions for Tax & Accounting.</p>
    </div>

    <!-- Pricing FAQs Section Include -->
    @include('components.pricingfaq')

@endsection