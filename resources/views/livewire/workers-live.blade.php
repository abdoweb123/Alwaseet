@section('title')
    <x-pageTitle current="{{ __('dash.workers') }}">
        <x-breadcrumb title="{{ __('dash.home') }}" route="{{ route('dashboard.home') }}" />
        <x-breadcrumb title="{{ __('dash.workers') }}" active />
    </x-pageTitle>
@endsection

@section('style')
    <style>
        a{
            cursor: pointer;
            padding: 4px;
        }
    </style>
@endsection


<div>
    <!-- Button to open create modal -->
    <button wire:click="create" class="btn btn-dark my-3 rounded-3"> {{ __('dash.create_new') }}</button>

    <div class="card-styles mt-4">
    <div class="table-wrapper table-responsive">
        <table class="table clients-table text-center">
        <thead>
        <tr>
            <th>@lang('dash.name')</th>
            <th>@lang('dash.personal_number')</th>
            <th>@lang('dash.passport_number')</th>
            <th>@lang('dash.phone')</th>
            <th>@lang('dash.email')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($workers as $worker)
            <tr>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->personal_number }}</td>
                <td>{{ $worker->passport_number }}</td>
                <td>{{ $worker->phone }}</td>
                <td>{{ $worker->email }}</td>
                <td>
                    <a wire:click="edit({{ $worker->id }})"> <i class="text-primary lni lni-pencil mr-10"></i></a>
                    <a wire:click="confirmDeletion({{ $worker->id }})"> <i class="text-danger lni lni-trash-can"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $workers->links() }}

    <!-- Create/Edit Modal -->
    <div class="modal fade @if($isModalOpen) show @endif" tabindex="-1" role="dialog" style="display: @if($isModalOpen) block @endif;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-block modal-header">
{{--                    <button type="button" class="close" wire:click="$set('isModalOpen', false)" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                    <button type="button" class="close bg-warning btn-close float-start mt-0" wire:click="$set('isModalOpen', false)" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h1 class="float-end fs-5 modal-title" id="detailsModal">{{ $updateMode ? __('dash.update') : __('dash.add')  }}</h1>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>@lang('dash.name')</label>
                            <input type="text" name="name" class="form-control" wire:model.defer="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>@lang('dash.personal_number')</label>
                            <input type="text" name="personal_number" class="form-control" wire:model.defer="personal_number">
                            @error('personal_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>@lang('dash.passport_number')</label>
                            <input type="text" name="passport_number" class="form-control" wire:model.defer="passport_number">
                            @error('passport_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>@lang('dash.phone')</label>
                            <input type="text" name="phone" class="form-control" wire:model.defer="phone">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>@lang('dash.email')</label>
                            <input type="email" name="email" class="form-control" wire:model.defer="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" >@lang('dash.cancel')</button>
                    <button type="button" class="btn btn-primary" wire:click="{{ $updateMode ? 'update' : 'store' }}">@lang('dash.confirm')</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade @if($confirmingDeletion) show @endif" tabindex="-1" role="dialog" style="display: @if($confirmingDeletion) block @endif;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header d-block modal-header">
                    <button type="button" class="bg-warning btn-close float-start mt-0" wire:click="$set('confirmingDeletion', false)" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h1 class="float-end fs-5 modal-title" id="detailsModal">@lang('dash.delete')</h1>
                </div>

                <div class="modal-content">
                    <div class="modal-header d-block modal-header">
                        <h3>{{ __('dash.alert_delete_confirm') }}</h3>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="$set('confirmingDeletion', false)">@lang('dash.cancel')</button>
                        <button type="button" class="btn btn-danger" wire:click="delete">@lang('dash.confirm')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
