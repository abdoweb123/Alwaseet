@extends('admin.layout')

@section('title')
    <x-pageTitle current=" {{ __('dash.home') }}">
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('dash.home') }}
        </li>
    </x-pageTitle>
@endsection

@section('content')

    <form method="POST" action="{{ route('dashboard.wallet_store') }}" id="wallet-form">
        @csrf
        <div class="card-styles mt-4 row">
            <div class="form-group mt-10 col-12 col-md-6">
                <label class="w-100" for="user_id">@lang('dash.cpr')</label>
                <select class="form-control selectpicker" name="user_id" id="user_id" required>
                    <option value="">-----</option>
                    @foreach($users->sortBy('name') as $user)
                        <option value="{{ $user->id }}">{{ $user['cpr'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-10 col-12 col-md-6">

                <label class="w-100" for="name">@lang('dash.name')</label>
                <input readonly id="name" name="name"  class="form-control" type="text">
            </div>
            <div class="form-group mt-10 col-12 col-md-6">
                <label class="w-100" for="phone">@lang('dash.phone')</label>
                <input readonly id="phone" name="phone"  class="form-control" type="text">
            </div>
            <div class="form-group mt-10 col-12 col-md-6">
                <label class="w-100" for="wallet">@lang('dash.The_amount_in_wallet')</label>
                <input  id="wallet" name="wallet"  class="form-control" type="number" step="any" min="0" readonly>
            </div>
            <div class="form-group mt-10 col-12 col-md-6">
                <label class="w-100" for="type">@lang('dash.type')</label>
                <select class="form-control" name="type" id="type" required>
                    <option value="">-----</option>
                    <option value="1">@lang('dash.withdraw')</option>
                    <option value="2">@lang('dash.deposit')</option>
                </select>
            </div>
            <div class="form-group mt-10 col-12 col-md-6">
                <label class="w-100" for="amount">@lang('dash.Amount')</label>
                <input id="amount" name="amount"  class="form-control" type="number" step="any" min="0" required>
                <span id="amount-error" class="text-danger" style="display: none;"></span>
            </div>

            <div class="form-group mt-10 col-12">
                <button type="submit" style="width: 200px;" class="btn btn-info">@lang('dash.submit')</button>
            </div>

        </div>
    </form>
@endsection

@section('js')
    <!-- For live search -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(".selectpicker").select2({
                language: "{{ lang() }}",
                dir: "{{ lang('ar') ? 'rtl' : 'ltr' }}",
                closeOnSelect: false,
            });
        });
    </script>

    <!-- To get user data when choose on CPR -->
    <script>
        $(document).ready(function() {
            $('#user_id').change(function() {
                var userId = $(this).val();
                if (userId) {
                    $.ajax({
                        url: "{{ route('dashboard.user_data') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            user_id: userId
                        },
                        success: function(data) {
                            $('#name').val(data.name);
                            $('#phone').val(data.phone);
                            $('#wallet').val(data.wallet);
                        },
                        error: function() {
                            alert('Failed to fetch user data.');
                        }
                    });
                } else {
                    $('#name').val('');
                    $('#phone').val('');
                    $('#wallet').val('');
                }
            });
        });
    </script>

    <!-- To check that the Amount withdrawn <= the wallet amount -->
    <script>
        $(document).ready(function() {
            $('#wallet-form').on('submit', function(event) {
                var type = $('#type').val();
                var wallet = parseFloat($('#wallet').val());
                var amount = parseFloat($('#amount').val());
                var isValid = true;

                if (type == '1' && amount > wallet) {
                    $('#amount-error').text('{{ __('dash.amount_less_or_equal_wallet') }}').show();
                    isValid = false;
                } else {
                    $('#amount-error').hide();
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
