@extends('userarea.layout')

@section('content')
    <section class="navigation-section short-nav d-flex justify-content-center align-items-center mb-0">
        <div class="text-center d-flex justify-content-center align-items-center">
            <a class="text-white" href="{{ route('home') }}">{{ __('dash.home') }}</a>
            <span><i style="font-size: medium; color: white;" class="fa-solid fa-angle-{{lang('en') ? 'right': 'left'}} mx-5"></i></span>
            <a href="services.html">{{ __('dash.categories') }}</a>
        </div>
    </section>
    <!-- ***************************************************************************************** -->
    <!-- ***************************************************************************************** -->
    <section class="services services-page">
        <h2 class="heading--2">{{ __('dash.categories') }}</h2>

        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="service information">
                            <a href="{{ route('services', $category->id) }}">
                                <div class="logo-img-box">
                                    <img src="{{ asset($category->image) }}" alt="" />
                                </div>
                                <p class="title" style="height: 35px;font-size: 1.5rem" >{{ $category['title_'.lang()] }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
