@extends('userarea.layout')
@section('content')
    <div class="container edit-section">
        <h5 class="edit-heading mx-2 bg-body-secondary edit-heading mx-2 p-4 rounded-5">{{ __('dash.edit_profile') }}</h5>
        <a href="{{ route('old_orders') }}">
            <h5 class="edit-heading mx-2 text-dark px-4">{{ __('dash.old_orders') }}</h5>
        </a>
        <h5 role="button" onclick="document.getElementById('logout_form').submit();" class="edit-heading mx-2 px-4">
            {{ __('dash.logout') }}</h5>
        <h5 class="edit-heading mx-2 px-4">{{ __('dash.wallet') }} : {{ $user->wallet }}</h5>
        <form id="logout_form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
        <div class="edit-form-box mt-5">
            @if (session('error'))
                <div class="alert alert-danger h3">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success h3">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('change_pass') }}" class="edit-form">
                @csrf
                <div class="mb-5">
                    <label for="name" class="form-label">{{ __('dash.name') }}</label>
                    <input name="name" type="text" value="{{ $user->name }}" class="form-control" required />
                    @error('name')
                        <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="form-label">{{ __('dash.email') }}</label>
                    <input name="email" type="text" value="{{ $user->email }}" class="form-control" required />
                    @error('email')
                        <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="phone" class="form-label">{{ __('dash.phone') }}</label>
                    <input name="phone" type="text" value="{{ $user->phone }}" class="form-control" required />
                    @error('phone')
                        <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label">{{ __('dash.password') }}</label>
                    <input autocomplete="false" type="password" id="password" name="password" class="form-control iti" />
                    @error('password')
                        <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                    @enderror
                </div>
                @if (
                    $user->number_months != null &&
                        $user->end_memebership != null &&
                        $user->price_month != null &&
                        $user->total_price_month != null)
                    <div class="mb-5">
                        <label for="number_months" class="form-label">{{ __('dash.number_months') }}</label>
                        <input readonly value="{{ $user->number_months }}" autocomplete="false" type="number"
                            id="number_months" name="number_months" class="form-control iti" />
                        @error('number_months')
                            <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="end_memebership" class="form-label">{{ __('dash.end_memebership') }}</label>
                        <input readonly value="{{ \Carbon\Carbon::parse($user->end_memebership)->format('d/m/Y') }}" autocomplete="false" type="text"
                            id="end_memebership" name="end_memebership" class="form-control iti" />
                        @error('end_memebership')
                            <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="price_month" class="form-label">{{ __('dash.price_month') }}</label>
                        <input readonly value="{{ $user->price_month }}" autocomplete="false" type="number"
                            id="price_month" name="price_month" class="form-control iti" />
                        @error('price_month')
                            <p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (\Carbon\Carbon::now()->toDateString() >= $user->end_memebership)
                        <h2 class="alert-heading alert alert-danger">
                            {{ __('dash.membership_expired') }}
                        </h2>

                        <a href="{{ url('contact_us') }}"
                            class="contact-us-btn btn btn-save btn-primary d-flex align-items-center"
                            style="font-size: 28px;">
                            {{ __('dash.editmembership') }}
                        </a>
                    @endif
                @else
                    <a href="{{ url('contact_us') }}"
                        class="contact-us-btn btn btn-save btn-primary d-flex align-items-center" style="font-size: 28px;">
                        {{ __('dash.addmembership') }}
                    </a>
                @endif

                <button type="submit" class="contact-us-btn btn btn-save btn-primary d-flex align-items-center"
                    style="font-size: 28px;">
                    {{ __('dash.submit') }}
                </button>
            </form>
        </div>
    </div>
@endsection
