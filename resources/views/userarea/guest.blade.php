@extends('userarea.layout')

@section('content')
    <section class="navigation-section d-flex justify-content-center align-items-center">
        <div class="text-center d-flex justify-content-center align-items-center">
            <a href="{{ route('home') }}">{{ __('dash.home') }}</a>
            <span><i style="font-size: medium; color: white;" class="fa-solid fa-angle-{{lang('en') ? 'right': 'left'}} mx-5"></i></span>
            <a href="{{ route('categories') }}">{{ __('dash.categories') }}</a>
            <span><i style="font-size: medium; color: white;" class="fa-solid fa-angle-{{lang('en') ? 'right': 'left'}} mx-5"></i></span>
            <a href="{{ route('services', $category->category->id) }}">{{ $category->category['title_' . lang()] }}</a>
            <span><i style="font-size: medium; color: white;" class="fa-solid fa-angle-{{lang('en') ? 'right': 'left'}} mx-5"></i></span>
            <a href="contact.html">{{ $category['title_' . lang()] }}</a>
        </div>

        <div class="ministry-logo-box">
            <img src="{{ asset($category->category->image) }}" alt="" />
        </div>
    </section>

    <section class="id-service-details">
        <div class="container outer-container">
            <div class="content-container">
                @if(session('success'))
                    <div class="alert alert-success h3">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('guest_store') }}" method="post" class="send-request-form">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="form-label"> {{ __('dash.name') }}</label>
                        <input name="name" type="text" class="form-control" />
                        @error('name')<p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="form-label">{{ __('dash.phone') }}</label>
                        <input name="phone" type="number" class="form-control" />
                        @error('phone')<p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>@enderror
                    </div>
                    <input type="hidden" name="service_id", value="{{ $service->id }}">
                    <button type="submit" class="contact-us-btn btn btn-primary d-flex align-items-center">
                        {{ __('dash.send') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
