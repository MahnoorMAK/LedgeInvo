@extends('Layout.app')

@section('title', 'Create Account - Apexbooks')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Register.css') }}">
<div class="auth-split">

    {{-- ==================== LEFT PANEL ==================== --}}
    <div class="auth-left">

        {{-- Aesthetic accounting background --}}
        <div class="auth-left-bg">
            {{-- Subtle grid / ledger lines --}}
            <div class="ledger-lines"></div>

            {{-- Soft glowing orbs --}}
            <div class="bg-orb bg-orb-1"></div>
            <div class="bg-orb bg-orb-2"></div>

            {{-- Floating accounting icons --}}
            <div class="bg-icon bg-icon-1">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="24" height="24"><rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="6" x2="16" y2="6"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="16" y2="14"/><line x1="8" y1="18" x2="12" y2="18"/></svg>
            </div>
            <div class="bg-icon bg-icon-2">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="24" height="24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <div class="bg-icon bg-icon-3">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="24" height="24"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="15" x2="23" y2="15"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="15" x2="4" y2="15"/></svg>
            </div>
            <div class="bg-icon bg-icon-4">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="24" height="24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            </div>
            <div class="bg-icon bg-icon-5">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="24" height="24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><line x1="9" y1="15" x2="15" y2="15"/><line x1="9" y1="11" x2="13" y2="11"/></svg>
            </div>
            <div class="bg-icon bg-icon-6">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="24" height="24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
            </div>
        </div>

        <div class="auth-left-inner">

            <h1 class="auth-left-title">
                Start building<br>
                <span>financial clarity.</span>
            </h1>

            <p class="auth-left-subtitle">
                Join thousands of teams using Apexbooks to automate workflows,
                understand their numbers, and grow with confidence.
            </p>

            {{-- Floating card scene --}}
            <div class="auth-scene">

                {{-- Card 1: Revenue --}}
                <div class="scene-card scene-card-1">
                    <div class="scene-card-top">
                        <span>Q3 Revenue</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    </div>
                    <div class="scene-card-value">$124.5k</div>
                    <div class="scene-card-trend">↑ 14% vs last month</div>
                </div>

                {{-- Card 2: Processed Invoices --}}
                <div class="scene-card scene-card-2">
                    <div class="scene-card-tags">
                        <span class="scene-tag scene-tag-purple">Automated</span>
                        <span class="scene-tag">Ledger</span>
                    </div>
                    <div class="scene-card-label">Processed Invoices</div>
                    <div class="scene-card-value big">12,450</div>
                </div>

                {{-- Card 3: Reconciled --}}
                <div class="scene-card scene-card-3">
                    <div class="scene-check">
                        <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor"><path d="M16.7 5.3a1 1 0 0 1 0 1.4l-8 8a1 1 0 0 1-1.4 0l-4-4a1 1 0 1 1 1.4-1.4L8 12.6l7.3-7.3a1 1 0 0 1 1.4 0z"/></svg>
                    </div>
                    <div>
                        <div class="scene-card-title">Reconciled</div>
                        <div class="scene-card-label">Just now</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ==================== RIGHT PANEL ==================== --}}
    <div class="auth-right">
        <div class="auth-right-inner">

            <div class="auth-brand-row">
                <div class="auth-brand-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18"/><path d="M7 14l4-4 4 4 6-6"/></svg>
                </div>
                <span class="auth-brand-name">Apexbooks.</span>
            </div>

            <h2 class="auth-title">Create your account</h2>
            <p class="auth-subtitle">Get started with Apexbooks in under a minute.</p>

            <form action="/register" method="POST" class="auth-form">
                @csrf

                <div class="auth-field">
                    <label for="first_name">First name</label>
                    <input type="text" id="first_name" name="first_name" required autocomplete="given-name">
                </div>

                <div class="auth-field">
                    <label for="last_name">Last name</label>
                    <input type="text" id="last_name" name="last_name" required autocomplete="family-name">
                </div>

                <div class="auth-field">
                    <label for="email">Work email</label>
                    <input type="email" id="email" name="email" required autocomplete="email" placeholder="name@company.com">
                </div>

                <div class="auth-field">
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company" required autocomplete="organization">
                </div>

                <div class="auth-field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required minlength="8" autocomplete="new-password">
                    <span class="auth-hint">At least 8 characters</span>
                </div>

                <div class="auth-field">
                    <label for="password_confirmation">Confirm password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                </div>

                <label class="auth-checkbox">
                    <input type="checkbox" name="terms" required>
                    <span>I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></span>
                </label>

                <button type="submit" class="auth-submit">
                    Create account
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor"><path d="M10.3 3.3a1 1 0 0 1 1.4 0l6 6a1 1 0 0 1 0 1.4l-6 6a1 1 0 0 1-1.4-1.4L14.6 11H3a1 1 0 1 1 0-2h11.6L10.3 4.7a1 1 0 0 1 0-1.4z"/></svg>
                </button>
            </form>

            <div class="auth-divider"><span>Or continue with</span></div>

            <div class="auth-social">
                <button type="button" class="auth-social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84A11 11 0 0 0 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18A11 11 0 0 0 1 12c0 1.77.42 3.45 1.18 4.93l3.66-2.84z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84C6.71 7.31 9.14 5.38 12 5.38z"/></svg>
                    Google
                </button>
                <button type="button" class="auth-social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24"><path fill="#f25022" d="M1 1h10v10H1z"/><path fill="#7fba00" d="M13 1h10v10H13z"/><path fill="#00a4ef" d="M1 13h10v10H1z"/><path fill="#ffb900" d="M13 13h10v10H13z"/></svg>
                    Microsoft
                </button>
            </div>

            <p class="auth-signin">
                Already have an account? <a href="/Login1">Sign in</a>
            </p>

        </div>
    </div>
</div>
@endsection