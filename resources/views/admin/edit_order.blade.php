@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection
@section('title')
    <x-pageTitle current="Home">
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('dash.home') }}
        </li>
        <li class="breadcrumb-item" aria-current="page">
            <a href="{{ route('dashboard.home') }}"> {{ __('dash.orders') }}</a>
        </li>
    </x-pageTitle>
@endsection

@section('content')

    <form method="POST" action="{{ route('dashboard.update_order',$order->id) }}">
        @csrf
        @method('PUT')
        <div class="card-styles mt-4 row">
            <div class="form-group mb-10  col-lg-6">
                <label class="w-100" for="order_number">{{ __('dash.order_number') }}</label>
                <input id="order_number" name="order_number" class="form-control" value="{{ $order->order_number }}">
                @if ($errors->has('order_number'))
                    <span class="text-danger">{{ $errors->first('order_number') }}</span>
                @endif
            </div>
            <x-form.input name="bla_name" value="{{ $order->bla_name }}" label="{{ __('dash.bla_name') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="id_type" value="{{ $order->id_type }}" label="{{ __('dash.id_type') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="id_number" value="{{ $order->id_number }}" label="{{ __('dash.id_number') }}" class="col-lg-6"></x-form.input>
            <div class="text-center">
                <span>-------- @lang('dash.Worker_data') --------</span>
            </div>
            <div class="form-group mb-10 col-lg-6">
                <label class="w-100">{{ __('dash.personal_number') }}</label>
                <select class="form-control selectpicker" name="personal_number" id="personal_number">
                    <option value="">-----</option>
                    @foreach($workers as $worker)
                        <option value="{{ $worker->personal_number }}" {{ $worker->personal_number == $order->worker?->personal_number ? 'selected' : '' }}>
                            {{ $worker->personal_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <x-form.input name="passport_number" value="{{ $order->worker?->passport_number }}" attribute="readonly" label="{{ __('dash.passport_number') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="name" attribute="readonly" value="{{ $order->worker?->name }}" label="{{ __('dash.name') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="phone" attribute="readonly"  value="{{ $order->worker?->phone }}" label="{{ __('dash.phone') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="email"  attribute="readonly" value="{{ $order->worker?->email }}" label="{{ __('dash.email') }}" class="col-lg-6"></x-form.input>

            {{-- <x-form.select name="request_status" label="{{ __('dash.request_status') }}"></x-form.select> --}}
            <x-form.regtextarea label="{{ __('dash.notes') }}" name="note"></x-form.regtextarea>

            <div class="form-group mt-10 col-12">
                <button type="submit" style="width: 200px;" class="btn btn-info">@lang('dash.submit')</button>
            </div>
        </div>
    </form>
@endsection
@section('js')
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
<script>
    $(document).ready(function() {
        $('#personal_number').change(function() {
            var personal_number = $(this).val();
            if (personal_number) {
                $.ajax({
                    url: "{{ route('dashboard.worker_data') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        personal_number: personal_number
                    },
                    success: function(data) {
                        $('#name').val(data.name);
                        $('#phone').val(data.phone);
                        $('#personal_number').val(data.personal_number);
                        $('#passport_number').val(data.passport_number);
                        $('#email').val(data.email);
                    },
                    error: function() {
                        alert('Failed to fetch user data.');
                    }
                });
            } else {
                $('#name').val('');
                $('#phone').val('');
                $('#personal_number').val('');
                $('#passport_number').val('');
                $('#email').val('');
            }
        });
    });
</script>
@endsection
