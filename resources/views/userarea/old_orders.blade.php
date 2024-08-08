@extends('userarea.layout')
@section('content')
    <div class="container edit-section">
        <a href="{{ route('profile') }}">
            <h5 class="edit-heading mx-2 text-dark px-4">{{ __('dash.edit_profile') }}</h5>
        </a>
        <h5 class="edit-heading mx-2 bg-body-secondary p-4 rounded-5">{{ __('dash.old_orders') }}</h5>

        <h5 role="button" onclick="document.getElementById('logout_form').submit();" class="edit-heading mx-2 px-4">
            {{ __('dash.logout') }}</h5>
        <form id="logout_form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
        <div class="edit-form-box mt-5">
            <div class="tab-item-content row gap-5">
                @forelse ($orders as $order)
                    <div class="col-12 mx-auto w-75">
                        <div class="info-content-box row">
                            <div class="col-12">
                                <h4>{{ $order->service['title_' . lang()] }}</h4>
                                <p>{{ $order->service->category->category['title_' . lang()] }}
                                    ({{ $order->service->category['title_' . lang()] }})</p>
                                <p>{{ $order->created_at->diffForHumans() }}</p>
                                <p>{{ $order->order_number }}</p>
                                <br>
                                @if ($order->status == false)
                                    <span class="bg-secondary-subtle d-flex p-2 px-4 rounded-5 w-25" style="font-size: 15px;">
                                        <i class="fa-regular fa-clock"></i>
                                        {{ __('dash.waiting') }}
                                    </span>
                                @else
                                    <span class="bg-success-subtle d-flex p-2 px-4 rounded-5 w-25" style="font-size: 15px;">
                                        <i class="fa-solid fa-check"></i>
                                        {{ __('dash.done') }}
                                    </span>
                                @endif
                            </div>
                        </div>    
                    </div>
                @empty
                <h4>
                   {{ __('dash.nodata')}}
                </h4>
                @endforelse
            </div>
        </div>
    </div>
@endsection
