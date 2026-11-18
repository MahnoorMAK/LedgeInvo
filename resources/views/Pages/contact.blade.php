{{-- resources/views/Pages/Contact.blade.php --}}
@extends('Layout.app1')

@section('title', 'Contact Us - Apexbooks')

@section('styles')
    {{-- Contact page styles --}}
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('sidebar')
    @include('Layout.Sidebar') 
@endsection

@section('content')

{{-- ============================================
     HERO
     ============================================ --}}
<!--<section class="contact-hero">
    <div class="hero-scene" aria-hidden="true">
        <div class="cube c1"></div>
        <div class="cube c2"></div>
        <div class="cube c3"></div>
        <div class="cube c4"></div>
    </div>

    <div class="hero-inner">
        <span class="hero-eyebrow">
            <i class="fa-solid fa-paper-plane"></i>
            Contact Us
        </span>
        <h1 class="hero-title">
            Let's talk about <span class="accent">your books.</span>
        </h1>
        <p class="hero-subtitle">
            Questions about pricing, onboarding, or integrations? Our team typically
            replies within one business day. Choose whichever channel works best for you.
        </p>
    </div>
</section>-->
@include('Component.c1')
@include('Component.support-hours')
@include('Component.contact-block')
@include('Component.location-map')


@endsection

@section('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endsection