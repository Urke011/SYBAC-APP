@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-normal text-sm text-slate-400']) }}>
    {{ $value ?? $slot }}
</label>