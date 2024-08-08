<div>
    @if ($sent == false)
    <div class="hero-form mx-auto w-75 mb-5" style="{{ lang('ar') ? 'direction:rtl' : '' }}">
        <div class="mb-5">
            <label for="name" class="form-label text-light fw-bold">{{ __('dash.name') }}*
                @error('name')<div class="d-inline">{{ $message }}</div>@enderror
            </label>
            <input wire:model='name' type="text" class="form-control" required />
        </div>
        <div class="mb-5">
            <label for="email" class="form-label text-light fw-bold">{{ __('dash.email') }}*
                @error('email')<div class="d-inline">{{ $message }}</div>@enderror
            </label>
            <input wire:model='email' type="email" class="form-control" required />
        </div>
        <div class="mb-5">
            <label for="phone" class="form-label text-light fw-bold">{{ __('dash.phone') }}*
                @error('phone')<div class="d-inline">{{ $message }}</div>@enderror
            </label>
            <input wire:model='phone' type="number" class="form-control"required />
        </div>
        <div class=" mb-4">
            <label for="Message" class="form-label text-light fw-bold">{{ __('dash.message') }}*
                @error('message')<div class="d-inline">{{ $message }}</div>@enderror
            </label>
            <textarea wire:model='message' class="form-control" required></textarea>
        </div>
        <button wire:click='store' class="btn btn-primary hero-btn">{{ __('dash.send') }}</button>
    </div>
    @else
    <div class="bg-white h1 m-5 p-5 rounded-5 shadow-sm terms-text-box text-center">
        {{ __('dash.sent_success') }}
    </div>

    @endif
</div>
