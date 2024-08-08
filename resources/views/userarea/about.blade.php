@extends('userarea.layout')

@section('content')
    <section class="navigation-section short-nav d-flex justify-content-center align-items-center mb-0">
        <div class="text-center d-flex justify-content-center align-items-center">
            <a class="text-white" href="{{ route('home') }}">{{ __('dash.home') }}</a>
            <span><i style="font-size: medium; color: white;" class="fa-solid fa-angle-{{lang('en') ? 'right': 'left'}} mx-5"></i></span>
                    <a href="about.html">{{ __('dash.about_us') }}</a>
        </div>
    </section>
    <!-- ***************************************************************************************** -->
    <!-- ***************************************************************************************** -->
    <div class="about-us-page-section">
        <h3 class="container about-heading">{{ __('dash.about_us') }}</h3>
        <section class="about container">
            <div class="about-content-box">
                <p style="text-align: {{ lang('ar') ? 'right' : 'left' }}">
                  {!! setting('about_us_'.lang()) !!}
                </p>
            </div>
            <div class="about-img-box">
              <img src="{{ asset(setting('about_us_image')) }}" />
            </div>
        </section>
    </div>
@endsection
