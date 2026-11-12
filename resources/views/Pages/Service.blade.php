{{-- resources/views/Pages/Service.blade.php --}}
@extends('Layout.app1')

@section('title', 'Our Services - Apexbooks')

@section('styles')
    {{-- Service page styles --}}
    
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
@endsection

@section('content')


@include('Component.service-hero')
@include('Component.pricing')
@include('Component.services-grid')
@include('Component.Grid')
@include('Component.accounts-gallery')


{{-- ============================================
     FEATURED SHOWCASE BANNER (3D)
     ============================================ --}}
<section class="showcase">
    <div class="showcase-inner">
        <div class="showcase-content">
            <div class="showcase-text">
                <span class="section-eyebrow" style="color: rgba(255,255,255,0.85);">Why teams choose Apexbooks</span>
                <h2>One platform. Every financial workflow.</h2>
                <p>
                    Stop stitching together spreadsheets, inboxes, and disconnected tools.
                    Apexbooks unifies your entire finance stack so your team can focus on
                    decisions — not data entry.
                </p>
                <div class="showcase-actions">
                    <a href="/register" class="btn-white">
                        Get Started <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="/Contact" class="btn-ghost">
                        Talk to Sales <i class="fa-solid fa-headset"></i>
                    </a>
                </div>
            </div>

            <div class="showcase-visual" aria-hidden="true">
                <div class="stat-card s1" style="--rot:-4deg;">
                    <div class="stat-label">Monthly Revenue</div>
                    <div class="stat-value">$124,500</div>
                    <div class="stat-trend"><i class="fa-solid fa-arrow-up"></i> 14.2%</div>
                </div>
                <div class="stat-card s2" style="--rot:3deg;">
                    <div class="stat-label">Invoices Processed</div>
                    <div class="stat-value accent">12,450</div>
                    <div class="stat-trend"><i class="fa-solid fa-arrow-up"></i> 8.7%</div>
                </div>
                <div class="stat-card s3" style="--rot:-2deg;">
                    <div class="stat-label">Hours Saved / Mo</div>
                    <div class="stat-value">386</div>
                    <div class="stat-trend"><i class="fa-solid fa-arrow-up"></i> 22.1%</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================
     PROCESS / STEPS
     ============================================ --}}
<section class="process">
    <span class="section-eyebrow">How it works</span>
    <h2 class="section-title">Up and running in days, not months.</h2>
    <p class="section-subtitle">
        A guided onboarding process that gets your books clean and your team productive — fast.
    </p>

    <div class="steps">
        <div class="step">
            <div class="step-number">01</div>
            <h3 class="step-title">Connect your accounts</h3>
            <p class="step-desc">
                Link your bank, payment gateways, and existing tools in a few clicks. We'll import your history automatically.
            </p>
        </div>
        <div class="step">
            <div class="step-number">02</div>
            <h3 class="step-title">Automate the work</h3>
            <p class="step-desc">
                Transactions get categorized, reconciled, and posted to your ledger without anyone touching a spreadsheet.
            </p>
        </div>
        <div class="step">
            <div class="step-number">03</div>
            <h3 class="step-title">Invite your team</h3>
            <p class="step-desc">
                Give accountants, managers, and stakeholders the access they need — with the permissions you control.
            </p>
        </div>
        <div class="step">
            <div class="step-number">04</div>
            <h3 class="step-title">Make confident decisions</h3>
            <p class="step-desc">
                Real-time dashboards and forecasts keep everyone aligned on the numbers that matter most.
            </p>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('js/service.js') }}"></script>
@endsection