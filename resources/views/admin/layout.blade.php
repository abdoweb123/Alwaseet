<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ setting('title') }}</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf_token" value="{{ csrf_token() }}" content="{{ csrf_token() }}" />
    {{-- <meta name="DT_Lang" value="{{ DT_Lang() }}" content="{{ DT_Lang() }}"/> --}}
    {{-- <meta name="user-theme" content="{{ auth()->user()->theme }}" /> --}}
    <link rel="icon" href="{{ asset(setting('logo')) }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/dashboard.css') }}">
    <!-- Include Select2 CSS -->
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 Bootstrap Theme CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.1/dist/select2-bootstrap4.min.css" rel="stylesheet" />

    @yield('css')
    @yield('style')
    @if (lang('ar'))
        <link rel="stylesheet" href="{{ asset('admin/css/ar.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('admin/css/en.css') }}">
    @endif

</head>

<body>
    <aside class="sidebar-nav-wrapper active">
        <div class="navbar-logo">
            <a href="{{ route('dashboard.home') }}">
                <img src="{{ asset(setting('logo')) }}" alt="logo" style="height: 100px;max-width: 198px;" />
            </a>
        </div>

        @include('admin.inc.sidebar')

    </aside>
    <div class="overlay"></div>

    <main class="main-wrapper active">
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6" style="z-index: 100">
                        <div class="header-left">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <i class="lni lni-menu"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <x-notification></x-notification>
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>{{ auth('admin')->user()->name ?? 'no auth yet' }}</h6>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <form action="{{ route('dashboard.logout') }}" method="POST">
                                            @csrf
                                            <a href="{{ route('dashboard.logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();"> <i
                                                    class="lni lni-exit"></i>Log out</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="section">
            <div class="container-fluid">
                @yield('title')

                <!-- Blade Template -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </section>

        <footer class="footer">
            <div class="container-fluid text-center">
                <p class="text-sm" style="direction: ltr">
                    © All Copyrights Reserved 2023, Powered By
                    <a href="https://emcan-group.com/" rel="nofollow" target="_blank">
                        Emcan Solutions
                    </a>
                </p>
            </div>
        </footer>
    </main>

    <script src="{{ asset('admin/js/dashboard.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('admin/js/main.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> --}}


    <!-- (Start) Input validation To choose which (numeric or alphabetic) according to input name  -->
    <script>
        document.querySelector("input[name='name']").addEventListener('input', function (e) {
            var input = e.target;
            var value = input.value;
            input.value = value.replace(/\d/g, ''); // Remove numeric characters
        });

        document.querySelectorAll("input[name='phone'], input[name='personal_number']").forEach(function(input) {
            input.addEventListener('input', function (e) {
                var value = e.target.value;
                e.target.value = value.replace(/[A-Za-z\u0600-\u06FF\s]/g, ''); // Remove alphabetic characters and spaces
            });
        });

        document.querySelector('form').addEventListener('submit', function (e) {
            var nameInput = document.getElementById('name');
            var phoneInput = document.getElementById('phone');
            var nameValue = nameInput.value.trim();
            var phoneValue = phoneInput.value.trim();

            if (/^\d+$/.test(nameValue)) {
                alert('Name cannot be only numbers.');
                e.preventDefault();
                return false;
            }

            if (/^[A-Za-z\s]+$/.test(phoneValue)) {
                alert('Phone number cannot be only alphabetic characters.');
                e.preventDefault();
                return false;
            }
        });


        function setupEmailValidation() {
            var emailInput = document.querySelector("input[name='email']");
            if (emailInput) {
                emailInput.removeEventListener('input', emailValidationHandler); // Remove previous listener if any
                emailInput.addEventListener('input', emailValidationHandler);
            }
        }

        function emailValidationHandler() {
            var email = this.value;
            var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!pattern.test(email)) {
                this.setCustomValidity('Please enter a valid email in the format like ali@gmail.com');
            } else {
                this.setCustomValidity('');
            }
        }
    </script>
    <!-- (End) Input validation To choose which (numeric or alphabetic) according to input name -->

    <!-- Include Select2 JS -->
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Initialize Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-4zNT9/KDe1kJHjGPpjDeKK9+o8gSp6Mlf8z13Bu63sM41Dkvbb2oLNSxQmSiTr+AMBOwv2lXU5I6E5h+78tLig=="
            crossorigin="anonymous"></script>
    <script>
        function initializeSelect2() {
            $('.selectpicker').select2({
                theme: 'bootstrap4',
                language: "{{ lang() }}",
                dir: "{{ lang('ar') ? 'rtl' : 'ltr' }}",
                closeOnSelect: false,
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            initializeSelect2();
        });

        window.addEventListener('contentChanged', function() {
            initializeSelect2();
        });

        $('#editModal').on('shown.bs.modal', function() {
            initializeSelect2();
        });
    </script>
    @if(session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: () => {
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                });
            });
        </script>
    @endif


    @yield('js')
    @livewireScripts
    <script src="{{ asset('admin/js/wire-sweetalert.js') }}"></script>
    <x-livewire-alert::scripts />


    @stack('js')
    @yield('script')
</body>

</html>
