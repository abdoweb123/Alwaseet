@extends('admin.layout')

@section('title')
    <x-pageTitle current=" {{ __('dash.home') }}">
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('dash.home') }}
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('dash.wallet_transactions') }}
        </li>
    </x-pageTitle>
@endsection

@section('content')

    <h3>
        @lang('dash.total') : ( {{ $total_wallet }} )
    </h3>

    <div class="card-styles mt-4">
        <div class="table-wrapper table-responsive">
        <table class="table clients-table text-center">
            <thead>
            <tr>
                <th>@lang('dash.Amount')</th>
                <th>@lang('dash.type')</th>
                <th>@lang('dash.Time')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>
                        <x-fulldate :date="$transaction->created_at"></x-fulldate>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>

@endsection


