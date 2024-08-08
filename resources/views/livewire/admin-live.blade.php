@section('title')
    <x-pageTitle current="{{ __('dash.admins') }}">
        <x-breadcrumb title="{{ __('dash.home') }}" route="{{ route('dashboard.home') }}" />
        <x-breadcrumb title="{{ __('dash.admins') }}" active />
    </x-pageTitle>
@endsection

<div>
    <x-table :pagination="$admins" :columns="['name', 'email']" searchable="{{ __('dash.name') }}, {{ __('dash.email') }}">
        @forelse ($admins as $admin)
            <tr Role="row" class="odd">
                <td>{{ $admins->firstItem() + $loop->index }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <a wire:click="openEditModal({{ $admin->id }})" type="button" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="text-primary lni lni-pencil mr-10"></i>
                    </a>
                    @if($loop->index != 0)
                        <a wire:click="openDeleteModal({{ $admin->id }})" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="text-danger lni lni-trash-can"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
        <div class="card my-4 py-4 rounded-full shadow-sm">
            <div class="card-body  text-center">
                <h4>{{ __('dash.nodata') }}</h4>
            </div>
        </div>
        @endforelse
    </x-table>

    {{-- Add --}}
    <x-modal wireAction="store" id="addModal" title="{{ __('dash.add') }}" type="primary">
        <div class="row">
            <x-form.input name="name" label="{{ __('dash.name') }}"></x-form.input>
            <x-form.input name="email" type="email" label="{{ __('dash.email') }}"></x-form.input>
            <x-form.input name="password" label="{{ __('dash.password') }}"></x-form.input>
        </div>
    </x-modal>

    {{-- Edit --}}
    <x-modal wireAction="update" id="editModal" title="{{ __('dash.update') }}" type="info">
        <div class="row">
            <x-form.input name="name" label="{{ __('dash.name') }}"></x-form.input>
            <x-form.input name="email" type="email" label="{{ __('dash.email') }}"></x-form.input>
            <x-form.input name="password" label="{{ __('dash.password') }}"></x-form.input>
        </div>
    </x-modal>

    {{-- Delete --}}
    <x-modal wireAction="delete" id="deleteModal" title="{{ __('dash.delete') }}" type="danger">
        <div class="row">
            <x-alert type="warning">
                <h3>{{ __('dash.alert_delete_confirm') }}</h3>
            </x-alert>
        </div>
    </x-modal>
</div>

@section('js')
<x-closeModal />
@endsection
