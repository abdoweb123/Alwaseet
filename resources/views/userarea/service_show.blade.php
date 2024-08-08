@extends('userarea.layout')

@section('content')
    <section class="navigation-section d-flex justify-content-center align-items-center">
        <div class="text-center d-flex justify-content-center align-items-center">
            <a href="{{ route('home') }}">{{ __('dash.home') }}</a>
            <span><i style="font-size: medium; color: white;"
                    class="fa-solid fa-angle-{{ lang('en') ? 'right' : 'left' }} mx-5"></i></span>
            <a href="{{ route('categories') }}">{{ __('dash.categories') }}</a>
            <span><i style="font-size: medium; color: white;"
                    class="fa-solid fa-angle-{{ lang('en') ? 'right' : 'left' }} mx-5"></i></span>
            <a href="{{ route('services', $category->category->id) }}">{{ $category->category['title_' . lang()] }}</a>
            <span><i style="font-size: medium; color: white;"
                    class="fa-solid fa-angle-{{ lang('en') ? 'right' : 'left' }} mx-5"></i></span>
            <a href="contact.html">{{ $category['title_' . lang()] }}</a>
        </div>

        <div class="ministry-logo-box">
            <img src="{{ asset($category->category->image) }}" alt="" />
        </div>
    </section>
    <!-- ***************************************************************************************** -->
    <!-- ***************************************************************************************** -->
    <section class="id-service-details">
        <div class="container outer-container">
            <div class="content-container w-100">
                <div class="id-title">
                    <p>{{ $service['title_' . lang()] }}</p>
                    <p class="price">{{ __('dash.service_cost') }}: <span dir="ltr">BHD
                            @if (auth()->check())
                                @if (auth()->user()->total_price_month != null && \Carbon\Carbon::now()->toDateString()  < auth()->user()->end_memebership)
                                    {{ $service->price_for_users }}

                                @else
                                    {{  $service->price }}
                                @endif
                            @else
                                {{ $service->price }}
                            @endif
                        </span></p>
                </div>
                <h5 class="government">{{ $category->category['title_' . lang()] }}</h5>
                <h5 class="py-2">{{ __('dash.service_details') }}</h5>
                <p class="id-text">{{ $service['desc_' . lang()] }}</p>
                @if (auth()->check())
                    @if (session('success'))
                        <div class="alert alert-success h3">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger h3">
                            {{ session('error') }}
                        </div>
                    @else
                        <form action="{{ route('user_store', $service->id) }}" method="post">
                            @csrf
                            <button type="submit"
                                class="contact-us-btn mx-auto w-50">{{ __('dash.contact_with_us') }}</button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('guest', $service->id) }}"
                        class="contact-us-btn mx-auto w-50">{{ __('dash.contact_with_us') }}</a>
                @endif
            </div>
        </div>
    </section>
@endsection
