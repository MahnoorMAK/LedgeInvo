{{-- resources/views/Page/coming-soon.blade.php --}}
@extends('Layout.app')

@section('title', 'Coming Soon')

@section('page-title', 'Services')

@section('page-subtitle', 'This is the service page!')

@section('services')
<section class="container">
    <h1>Services</h1>
    <h2>This is the service page!</h2>
    <p>Welcome to our home</p>

    <input type="email" placeholder="Enter your email" id="emailInput">
    <button onclick="notifyMe()">Notify Me</button>

    <section class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
    </section>

    <section class="small-text">
        &copy; 2026 All rights reserved
    </section>
</section>
@endsection

@push('styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
        flex-direction: column;
    }

    .container {
        background: white;
        padding: 50px 40px;
        border-radius: 15px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        max-width: 500px;
        width: 100%;
    }

    h1 {
        font-size: 60px;
        margin-bottom: 10px;
    }

    h2 {
        font-size: 28px;
        color: #333;
        margin-bottom: 10px;
    }

    p {
        color: #666;
        font-size: 16px;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 15px;
        outline: none;
        margin-bottom: 10px;
    }

    input:focus {
        border-color: #667eea;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #667eea;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
        background: #5a67d8;
    }

    .social-icons {
        margin-top: 25px;
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .social-icons a {
        color: #667eea;
        font-size: 24px;
        text-decoration: none;
    }

    .social-icons a:hover {
        color: #5a67d8;
    }

    .small-text {
        font-size: 13px;
        color: #999;
        margin-top: 15px;
    }

    @media (max-width: 480px) {
        .container {
            padding: 30px 20px;
        }

        h1 {
            font-size: 40px;
        }

        h2 {
            font-size: 22px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    function notifyMe() {
        const email = document.getElementById('emailInput').value.trim();

        if (!email) {
            alert('Please enter your email address');
            return;
        }

        if (!email.includes('@') || !email.includes('.')) {
            alert('Please enter a valid email address');
            return;
        }

        alert('Thank you! We\'ll notify you at ' + email);
        document.getElementById('emailInput').value = '';
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('emailInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                notifyMe();
            }
        });
    });
</script>
@endpush