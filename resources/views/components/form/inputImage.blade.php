@props(
    [
        'name',
        'label',
        'image' => null,
        'accept' => null
    ]
)
<div {{ $attributes->merge(['class'=>'form-group mb-10']) }}>
    <label class="w-100" for="{{ $name }}">
        {{ $label }}
    </label>
    <input
        id="{{ $name }}"
        wire:model="{{ $name }}"
        class="form-control"
        type="file"
        accept="{{ $accept ? $accept :  'image/png, image/gif, image/jpeg'}}"
        >
    @if($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
