@props([
    'data',
    'total'=>false,
    'walletTotla'=>false,
    'columns' => [],
    'pagination' => false,
    'searchable' => false,
    'noCreate' => false,
    'deleteAll' => false,
    'createPage' => null,
    'noAction' => false,
])

@unless ($noCreate || $createPage)
    <button type="button" class="btn btn-dark my-3 rounded-3" data-bs-toggle="modal" data-bs-target="#addModal">
        {{ __('dash.create_new') }}
    </button>
@endunless
@if ($createPage)
    <a href="{{ $createPage }}" type="button" class="btn btn-dark my-3 rounded-3">
        {{ __('dash.create_new') }}
    </a>
@endif
@if ($deleteAll)
    <button wire:click='deleteAll' type="button" class="btn btn-danger my-3 rounded-3">
        {{ __('dash.delete_all') }}
    </button>
@endif
<div class="card-styles mt-4">
    @if ($searchable)
        <input wire:model.live='search' type="text" style="width: 20%;" class="form-control w-20"
            placeholder="{{ __('dash.searchFor') }} {{ $searchable }} ..">
    @endif
    <div class="table-wrapper table-responsive">
        <table class="table clients-table">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    @foreach ($columns as $column)
                        <th>
                            {{ __('dash.' . $column) }}
                        </th>
                    @endforeach
                    @unless ($noAction)
                        <th width=10%>{{ __('dash.actions') }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    {{ $slot }}
                </tbody>
            </table>
            @if ($pagination)
                {{ $pagination->links() }}
            @endif
            @if ($total || $walletTotla)
                <div class="container ">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="p-2  bg-info-600 text-black">
                                <!-- Your content for the left side -->

                                {{ __('dash.total_membership') }} : {{ $total }}


                            </h4>
                        </div>
                        <div class="col-6">
                            <h4 class="p-2  bg-info-600 text-black">
                                <!-- Your content for the left side -->

                                {{ __('dash.totalWalet') }} : {{ $walletTotla }}


                            </h4>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
