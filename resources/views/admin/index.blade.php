@extends('admin.layout')

@section('title')
    <x-pageTitle current=" {{ __('dash.home') }}">
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('dash.home') }}
        </li>
    </x-pageTitle>
@endsection

@section('content')


    <a href="{{ route('dashboard.new_order') }}" type="button" class="btn btn-dark my-3 rounded-3">
        {{ __('dash.create_new') }}
    </a>
    
<livewire:dashboard.order-live />
@endsection
