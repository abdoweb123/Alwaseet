@extends('userarea.layout')
@section('content')
    <section class="signUp-logIn container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <ul class="nav nav-pills sign-up-pills mb-3" id="pills-tab" role="tablist">
                    {{-- <li class="nav-item active sign-up-tab underline" role="presentation">
                        <button class="nav-link active sign-nav-item" id="pills-signUp-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-signUp" type="button" role="tab" aria-controls="pills-signUp"
                            aria-selected="true">
                            إنشاء حساب جديد
                        </button>
                    </li> --}}
                    <li class="nav-item active login-in-tab" role="presentation">
                        <button class="nav-link active sign-nav-item" id="pills-login-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login"
                            aria-selected="false"
                            >
                            {{ __('dash.login') }}
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade " id="pills-signUp" role="tabpanel"
                        aria-labelledby="pills-signUp-tab" tabindex="0">
                        {{-- <div class="signUp-form-box">
                            <form class="signUp-form">
                                <div class="mb-5">
                                    <label for="name" class="form-label mb-3"> الاسم</label>
                                    <input type="text" class="form-control" required />
                                </div>
                                <div class="mb-5">
                                    <label for="phone" class="form-label mb-3"> رقم الموبايل</label>
                                    <input type="tel" class="form-control" required id="phoneSignUp" />
                                </div>
                                <div class="mb-5">
                                    <label for="email" class="form-label mb-3"> الايميل</label>
                                    <input type="email" class="form-control" required />
                                </div>

                                <div class="mb-5">
                                    <label for="password" class="form-label mb-3">
                                        كلمة المرور</label>
                                    <input type="password" class="form-control" required />
                                </div>
                                <button type="submit"
                                    class="contact-us-btn btn btn-signup btn-primary d-flex align-items-center">
                                    إنشاء حساب
                                </button>
                            </form>
                        </div> --}}
                    </div>
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab"
                        tabindex="0">
                        <div class="login-form-box">
                            @if(session('error'))
                                <div class="alert alert-danger h3">
                                    {{ session('error') }}
                                </div>
                            @endif    
                            <form action="{{ route('login') }}" method="post" class="login-form">
                                @csrf
                  
                                <div class="mb-5  ">
                                    <label for="cpr" class="form-label">{{ __('dash.cpr') }}</label>
                                    <input dir="{{ lang('ar') ? 'rtl' : 'ltr' }}" autocomplete="off" name="cpr" type="text" id="cpr" class="form-control" required />
                                    {{-- <span class="{{ lang('ar') ? 'country-code-rtl' : 'country-code' }}">+973</span> --}}
                                    @error('cpr')<p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>@enderror                    
                                </div>

                                <div class="mb-5">
                                    <label for="password" class="form-label">{{ __('dash.password') }}</label>
                                    <input  name="password" type="password" class="form-control" required />
                                    @error('password')<p class="alert text-danger" style="font-size: medium;">{{ $message }}</p>@enderror                    
                                </div>
                                <button type="submit"
                                    class="contact-us-btn btn btn-log-in btn-primary d-flex align-items-center"style="font-size: 23px;">
                                    {{ __('dash.login') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="signup-img-box">
                    <img src="{{ asset('userarea') }}/assets/main/signupPage/AdobeStock_328703928.png" alt="" />
                </div>
            </div>
        </div>
    </section>
@endsection
