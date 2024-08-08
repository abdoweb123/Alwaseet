@extends('userarea.layout')
@section('content')
        <!-- ***************************************************************************************** -->
    <!-- ***************************************************************************************** -->
    <section class="hero-slider">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                @foreach ($slides as $slide)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide 1"></button>
                @endforeach          
            </div>
            <div class="carousel-inner">
                @foreach ($slides as $slide)
                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}}">
                        <img src="{{ asset('userarea') }}/assets/main/bg.png" class="d-block w-100" alt="..." />
                        <div class="passport-img-box">
                            <img src="{{ asset($slide->image) }}" alt="passport" />
                        </div>
                        <div class="slider-text text-end">
                            <a href="{{ $slide->link }}" style="text-decoration: none; {{ lang('en') ? 'text-align: start' : '' }}">
                                <h1>{{ $slide['title_'.lang()] }}</h1>
                                <p>{{ $slide['desc_'.lang()] }}</p>    
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- ***************************************************************************************** -->
    <!-- ***************************************************************************************** -->
    <div class="section-about text-center">
        <h2 class="heading--2">{{ __('dash.about_us') }}</h2>
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
    <!-- ***************************************************************************************** -->
    <!-- ***************************************************************************************** -->
    <section class="services">
        <h2 class="heading--2">{{ __('dash.categories') }}</h2>

        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-4 col-6">
                        <a style="text-decoration: none; color:black" href="{{ route('services', $category->id) }}">
                            <div class="service">
                                <div class="logo-img-box">
                                    <img src="{{ asset($category->image) }}" alt="" />
                                </div>
                                <p class="title" style="height: 35px;font-size: 1.5rem" >{{ $category['title_'.lang()] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <a href="{{ route('categories') }}" class="more-link py-2">{{ __('dash.more') }}</a>
    </section>
@endsection