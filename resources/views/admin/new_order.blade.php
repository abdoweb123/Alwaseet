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
            {{ __('dash.orders') }}
        </li>
    </x-pageTitle>
@endsection

@section('content')

    <form method="POST" action="{{ route('dashboard.create_order') }}">
        @csrf
        <div class="card-styles mt-4 row">
            <div class="form-group mt-10 col-12 col-md-6">
                <label class="w-100" for="user_id">@lang('dash.cpr')</label>
                <select class="form-control selectpicker" name="user_id" id="user_id">
                    <option value="">-----</option>
                    @foreach($users->sortBy('name') as $users)
                        <option value="{{ $users->id }}">{{ $users['cpr'] }}</option>
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
                <label class="w-100" for="price">@lang('dash.price')</label>
                <input  id="price" name="price"  class="form-control" type="number" step="any" min="0">
            </div>
            <div class="form-group mt-10 col-12 col-md-6">
                <label class="w-100" for="service_id">@lang('dash.service')</label>
                <select class="form-control selectpicker" name="service_id" id="service_id">
                    @foreach($services->sortBy('title_'.app()->getlocale()) as $service)
                        <option value="{{ $service->id }}">{{ $service['title_'.app()->getlocale()] }}</option>
                    @endforeach
                </select>
            </div>
            
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
                    },
                    error: function() {
                        alert('Failed to fetch user data.');
                    }
                });
            } else {
                $('#name').val('');
                $('#phone').val('');
            }
        });
    });
</script>
@endsection