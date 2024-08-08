@section('title')
    <x-pageTitle current="{{ __('dash.users') }}">
        <x-breadcrumb title="{{ __('dash.home') }}" route="{{ route('dashboard.home') }}" />
        <x-breadcrumb title="{{ __('dash.users') }}" active />
    </x-pageTitle>
@endsection

<div>
    <x-table :pagination="$users" :walletTotla="$walletTotla" :total="$sumPrice" :columns="[
        'name',
        'phone',
        'email',
        'cpr',
        'wallet',
        'created_at',
        'end_memebership',
        'number_months_year',
        'total_price_month',
        'expiration',
    ]" searchable="name, email, phone,cpr">
        @forelse ($users as $user)
            @php
                // Given number of months
                $totalMonths = $user->number_months;

                // Calculate years and remaining months
                $years = floor($totalMonths / 12);
                $remainingMonths = $totalMonths % 12;
            @endphp
            <tr Role="row" class="odd">
                <td>{{ $users->firstItem() + $loop->index }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->cpr }}</td>
                <td>{{ $user->wallet }}</td>
                <td>
                    <x-fulldate :date="$user->created_at"></x-fulldate>
                </td>
                {{-- <td>
                    <x-fulldate :date="$user->end_memebership"></x-fulldate>
                </td> --}}
                <td>{{  $user->number_months != null &&
                    $user->end_memebership != null &&
                    $user->price_month != null &&
                    $user->total_price_month != null ? $user->end_memebership : __('dash.noend') }}</td>
                <td>
                    @if ( $user->number_months == null||
                    $user->end_memebership == null ||
                    $user->price_month == null ||
                    $user->total_price_month == null)
                        لايوجد
                    @else
                        @if ($user->number_months < 12)
                            {{ $user->number_months . ' ' . __('dash.month') }}
                        @else
                            {{ $years . ' ' . __('dash.year') . ' ' . $remainingMonths . ' ' . __('dash.month') }}
                        @endif
                    @endif
                </td>
                <td>{{ $user->number_months != null &&
                    $user->end_memebership != null &&
                    $user->price_month != null &&
                    $user->total_price_month != null? $user->total_price_month : '0.000' }}</td>
                <td>
                    @if (
                       ( $user->number_months != null &&
                            $user->end_memebership != null &&
                            $user->price_month != null &&
                            $user->total_price_month != null) && \Carbon\Carbon::now()->toDateString() >= $user->end_memebership)
                        {{ __('dash.membership_expired') }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('dashboard.membershipCertificate',$user->id) }}">
                        <i class="fas fa-certificate"></i>
                    </a>
                    <a href="{{ route('dashboard.wallet_transactions',$user->id) }}">
                        <i class="text-primary fa-solid fa-wallet mr-10"></i>
                    </a>
                    <a wire:click="openEditModal({{ $user->id }})" type="button" data-bs-toggle="modal"
                        data-bs-target="#editModal">
                        <i class="text-primary lni lni-pencil mr-10"></i>
                    </a>
                    <a wire:click="openDeleteModal({{ $user->id }})" type="button" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">
                        <i class="text-danger lni lni-trash-can"></i>
                    </a>
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
            <x-form.input name="phone" type="phone" label="{{ __('dash.phone') }}"></x-form.input>
            <x-form.input name="cpr" type="cpr" label="CPR"></x-form.input>
            <x-form.input name="wallet" label="{{ __('dash.wallet') }}"></x-form.input>
            <x-form.input name="password" label="{{ __('dash.password') }}"></x-form.input>

            {{-- <x-form.checks name='membership' value='1' label="membership" type="checkbox" wire:model="isChecked"
                id="checkbox"></x-form.checks> --}}

            <x-form.input name="number_months" type="number" label="{{ __('dash.number_months') }}"></x-form.input>
            <x-form.input name="end_memebership" type='date'
                label="{{ __('dash.end_memebership') }}"></x-form.input>
            <x-form.input name="price_month" step="any" type='number'
                label="{{ __('dash.price_month') }}"></x-form.input>


        </div>
    </x-modal>

    {{-- Edit --}}
    <x-modal wireAction="update" id="editModal" title="{{ __('dash.update') }}" type="info">
        <div class="row">
            <x-form.input name="name" label="{{ __('dash.name') }}"></x-form.input>
            <x-form.input name="email" type="email" label="{{ __('dash.email') }}"></x-form.input>
            <x-form.input name="phone" type="phone" label="{{ __('dash.phone') }}"></x-form.input>
            <x-form.input name="cpr" type="cpr" label="CPR"></x-form.input>
            <x-form.input name="wallet" label="{{ __('dash.wallet') }}" attribute="readonly"></x-form.input>
            <x-form.input name="password" label="{{ __('dash.password') }}"></x-form.input>

            <x-form.input name="number_months" type="number" label="{{ __('dash.number_months') }}"></x-form.input>
            <x-form.input name="end_memebership" type='date'
                label="{{ __('dash.end_memebership') }}"></x-form.input>
            <x-form.input name="price_month" step="any" type='number'
                label="{{ __('dash.price_month') }}"></x-form.input>
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

    {{-- show --}}
    {{-- <x-modal size="modal-lg" id="showModal" title="{{ __('dash.show') }}" type="danger">
            <div class="row">
                <table class="table table-busered">
                    <tbody>
                        <x-showitem name="{{ __('dash.created_at') }}">
                            <x-fulldate :date="$created_at"></x-fulldate>
                        </x-showitem>
                        <x-showitem name="{{ __('dash.name') }}">{{ $name }}</x-showitem>
                        <x-showitem name="{{ __('dash.email') }}">{{ $email }}</x-showitem>
                        <x-showitem name="{{ __('dash.message') }}">{{ $message }}</x-showitem>
                    </tbody>
                </table>
            </div>
        </x-modal> --}}

</div>

@section('js')
    <x-closeModal />
    {{-- <script>
        $(document).ready(function() {

            $('#addModal #checkbox').change(function() {
                // Check if the checkbox is checked
                if ($(this).is(':checked')) {
                    // If checked, show the additional inputs
                    console.log("22");
                    $('#additionalInputs').show();
                } else {
                    // If not checked, hide the additional inputs
                    $('#additionalInputs').hide();
                }
            });
        });
    </script> --}}
@endsection
