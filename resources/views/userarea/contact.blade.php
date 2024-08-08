@extends('userarea.layout')

@section('content')
    <section class="navigation-section short-nav d-flex justify-content-center align-items-center mb-0">
        <div class="text-center d-flex justify-content-center align-items-center">
            <a href="{{ route('home') }}">{{ __('dash.home') }}</a>
            <span><i style="font-size: medium; color: white;"
                    class="fa-solid fa-angle-{{ lang('en') ? 'right' : 'left' }} mx-5"></i></span>
            <a href="contact.html">{{ __('dash.contact_us') }}</a>
        </div>
    </section>
    <!-- ***************************************************************************************** -->
    <!-- ***************************************************************************************** -->
    <div class="contact-us-page-section container">
        <div class="flex-column-reverse flex-lg-row mt-5 row">
            <div class="col-lg-6">
                <h5 class="contact-heading">{{ __('dash.send_message') }}</h5>
                <div class="contact-form-box">
                    @if (session('success'))
                        <div class="alert alert-success h3">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact_us_post') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="mb-5">
                            <label for="name" class="form-label mb-3">{{ __('dash.name') }}</label>
                            <input type="text" name="name" class="form-control" />
                            @error('name')
                                <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="email" class="form-label mb-3">{{ __('dash.email') }}</label>
                            <input type="email" name="email" class="form-control" required />
                            @error('email')
                                <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="phone" class="form-label mb-3">{{ __('dash.phone') }}</label>
                            <input type="number" name="phone" class="form-control" required />
                            @error('phone')
                                <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="subject" class="form-label mb-3">{{ __('dash.subject') }}</label>
                            <input type="text" name="subject" class="form-control" required />
                            @error('subject')
                                <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="message" class="form-label mb-3">{{ __('dash.message') }}</label>
                            <textarea type="text" name="message" class="form-control" required></textarea>
                            @error('message')
                                <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="contact-us-btn btn btn-primary d-flex align-items-center"
                            style="font-size: 23px;">
                            {{ __('dash.send') }}
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-data-box">
                    <h5 class="contact-heading">{{ __('dash.contact_details') }}</h5>
                    <div class="contact-data">
                        <span class="mx-3"><img src="{{ asset('userarea') }}/assets/main/contactPage/mail.svg"
                                alt="mail" />
                        </span>
                        <a href="mailTo:{{ setting('email') }}">{{ setting('email') }}</a>
                    </div>
                    <div class="contact-data">
                        <span class="mx-3"><img src="{{ asset('userarea') }}/assets/main/contactPage/phone.svg"
                                alt="phone" />
                        </span>
                        <a target="_blank" href="https://wa.me/{{ setting('whatsapp') }}">{{ setting('whatsapp') }}</a>
                    </div>
                    <div class="contact-data">
                        <span class="mx-3">
                            <img src="{{ asset('userarea') }}/assets/main/contactPage/location.svg" alt="location" />
                        </span>
                        <span>{{ setting('address') }}</span>
                    </div>
                    <div class="location-map">
                        <h5 class="contact-heading">{{ __('dash.google_location') }}</h5>
                        <div class="location-img-box">
                            <iframe class="w-100"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13649.280991210342!2d{{ $points['long'] }}!3d{{ $points['lat'] }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1703077461395!5m2!1sen!2seg"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
