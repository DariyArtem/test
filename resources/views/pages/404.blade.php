@extends('layouts.base3')

@section('content')
    <div class="error">
        <div class="container">
            <div class="error-img">
                <img src="img/errorPage/Oops.png" alt="">
            </div>
            <div class="error__text">
                <div class="error-title">Oops!</div>
                <div class="error-description">The page you’re looking for doesn’t exits.</div>
                <div class="error-subtitle">Don’t panic just click the big button to retun home</div>
            </div>
            <div class="error-btn">
                <div class="error-btnSubstance">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    <button type="button">Go Back Home</button>
                </div>
            </div>
        </div>
    </div>
@endsection
