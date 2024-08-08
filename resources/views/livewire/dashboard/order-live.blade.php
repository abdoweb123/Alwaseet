
<div class="card-styles mt-4">
    <input wire:model.live='search' type="text" style="width: 30%;" class="form-control w-20"
        placeholder="{{ __('dash.searchOrder') }} ..">
    <div class="table-wrapper table-responsive">
        <table class="table clients-table">
            <thead>
                <tr>
                    <th>{{ __('dash.order_number') }}</th>
                    <th>{{ __('dash.created_at') }}</th>
                    <th>{{ __('dash.name') }}</th>
                    <th>{{ __('dash.phone') }}</th>
                    <th>{{ __('dash.service') }}</th>
                    <th>{{ __('dash.price') }}</th>
                    <th>{{ __('dash.end_membership') }}</th>
                    <th>{{ __('dash.request_status') }}</th>
                    <th>{{ __('dash.status') }}</th>
                    <th>{{ __('dash.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="text-center">
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->created_at->format('Y/m/d H:i a') }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->service['title_' . lang()] }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->user?->end_memebership ?? __('dash.noend') }}</td>
                        <td>
                            @if ($order->request_status == 0)
                                <span wire:click="openChangeRequestStatusModal({{ $order->id }})" type="button"
                                    data-bs-toggle="modal" data-bs-target="#changestatus" class="bg-info-100 px-4 py-2 rounded-5 rounded-full shadow-sm">
                                    <i class="fa-regular fa-clock"></i>
                                    {{ __('dash.request_proccessing') }}
                                </span>
                            @elseif($order->request_status == 1)
                                <span wire:click="openChangeRequestStatusModal({{ $order->id }})" type="button"
                                    data-bs-toggle="modal" data-bs-target="#changestatus" class="bg-info-600 px-4 py-2 rounded-5 rounded-full">
                                    <i class="fa-solid fa-check"></i>
                                    {{ __('dash.request_done') }}
                                </span>
                            @else
                                <span wire:click="openChangeRequestStatusModal({{ $order->id }})" type="button"
                                    data-bs-toggle="modal" data-bs-target="#changestatus" class="text-white bg-danger px-4 py-2 rounded-5 rounded-full">
                                    <i class="fa-solid fa-cancel"></i>
                                    {{ __('dash.request_cancelled') }}
                                </span>
                            @endif
                        </td>
                        <td>
                            @if ($order->status == false)
                                <span role="button" wire:click='changeStatus({{ $order->id }})'
                                    class="bg-info-100 px-4 py-2 rounded-5 rounded-full shadow-sm">
                                    <i class="fa-regular fa-clock"></i>
                                    {{ __('dash.waiting') }}
                                </span>
                            @else
                                <span role="button" wire:click='changeStatus({{ $order->id }})'
                                    class="bg-info-600 px-4 py-2 rounded-5 rounded-full">
                                    <i class="fa-solid fa-check"></i>
                                    {{ __('dash.done') }}
                                </span>
                            @endif
                        </td>
                        <td>
                            <a wire:click="openDeleteModal({{ $order->id }})" type="button" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <i class="text-danger lni lni-trash-can"></i>
                            </a>
                            <a href="{{ route('dashboard.order_show', $order->id) }}" type="button">
                                <i class="text-info lni lni-eye mr-10"></i>
                            </a>
{{--                            <a wire:click="openEditModal({{ $order->id }})" type="button" data-bs-toggle="modal"--}}
{{--                                data-bs-target="#editModal">--}}
{{--                                <i class="text-primary lni lni-pencil mr-10"></i>--}}
{{--                            </a>--}}

                            <a href="{{route('dashboard.edit_order', $order->id)}}">
                                <i class="text-primary lni lni-pencil mr-10"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{ $orders->links() }}
        </table>
        <div class="container ">
            <div class="row">
                <div class="col-6">
                    <h4 class="p-2  bg-info-600 text-black">
                        <!-- Your content for the left side -->

                        {{ __('dash.total') }} : {{ $sumPrice }}


                    </h4>
                </div>
                <div class="col-6">
                    <h4 class="p-2  bg-info-600 text-black">
                        <!-- Your content for the left side -->

                        {{ __('dash.numberofOrders') }} : {{ $ordersCount }}


                    </h4>

                </div>
            </div>
        </div>
    </div>


    {{-- Delete --}}
    <x-modal wireAction="delete" id="deleteModal" title="{{ __('dash.delete') }}" type="danger">
        <div class="row">
            <x-alert type="warning">
                <h3>{{ __('dash.alert_delete_confirm') }}</h3>
            </x-alert>
        </div>
    </x-modal>

    <x-modal wireAction="update" id="editModal" title="{{ __('dash.update') }}" type="info" style="min-width: 80vw">
        <div class="row">
            <div class="form-group mb-10  col-lg-6">
                <label class="w-100" for="order_number">{{ __('dash.order_number') }}</label>
                <input id="order_number" wire:model="order_number" class="form-control">
                @if ($errors->has('order_number'))
                    <span class="text-danger">{{ $errors->first('order_number') }}</span>
                @endif
            </div>
            <x-form.input name="bla_name" label="{{ __('dash.bla_name') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="id_type" label="{{ __('dash.id_type') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="id_number" label="{{ __('dash.id_number') }}" class="col-lg-6"></x-form.input>
            <div class="text-center">
                <span>-------- @lang('dash.Worker_data') --------</span>
            </div>

            <div class="form-group mb-10 col-lg-6">
                <label class="w-100">{{ __('dash.personal_number') }}</label>
                <select class="form-control selectpicker" name="personal_number" wire:model.live="personal_number">
                    <option value="">-----</option>
                    @foreach($workers as $worker)
                        <option value="{{ $worker->personal_number }}" {{ $worker->personal_number == $personal_number ? 'selected' : '' }}>
                            {{ $worker->personal_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <x-form.input name="passport_number" attribute="readonly" label="{{ __('dash.passport_number') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="name" attribute="readonly" label="{{ __('dash.name') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="phone" attribute="readonly" label="{{ __('dash.phone') }}" class="col-lg-6"></x-form.input>
            <x-form.input name="email"  attribute="readonly" label="{{ __('dash.email') }}" class="col-lg-6"></x-form.input>

            {{-- <x-form.select name="request_status" label="{{ __('dash.request_status') }}"></x-form.select> --}}
            <x-form.regtextarea label="{{ __('dash.notes') }}" name="note"></x-form.regtextarea>
        </div>
    </x-modal>
    <x-modal wireAction="updateStatus" id="changestatus" title="{{ __('dash.chngeStatus') }}" type="info">
        <div class="row">

            <div class="form-group mb-10">
                <label class="w-100" for="request_status">{{ __('dash.request_status') }}</label>

                <select wire:model="request_status" name="request_status" id="request_status" class="form-control">
                    <option hidden>--</option>
                    <option @if ($request_status == 0) selected @endif value="0">
                        {{ __('dash.request_proccessing') }}</option>
                    <option @if ($request_status == 1) selected @endif value="1">
                        {{ __('dash.request_done') }}</option>
                    <option @if ($request_status == 2) selected @endif value="2">
                        {{ __('dash.request_cancelled') }}</option>
                </select>
                @if ($errors->has('request_status'))
                    <span class="text-danger">{{ $errors->first('request_status') }}</span>
                @endif
            </div>

        </div>
    </x-modal>
</div>

@section('js')
    <x-closeModal />
@endsection

