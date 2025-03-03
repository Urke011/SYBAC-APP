@props(['tag', 'primary' => true, 'icon' => null, 'secondary' => false, 'flat' => false, 'normal' => true, 'small' => false, 'big' => false, 'error' => false])

@php
if ($secondary) {
    $primary = false;
    $flat = false;
    $error = false;
}

if ($flat) {
    $primary = false;
    $secondary = false;
    $error = false;
}

if ($error) {
    $primary = false;
    $secondary = false;
    $flat = false;
}

if ($big) {
    $small = false;
    $normal = false;
}

if ($small) {
    $big = false;
    $normal = false;
}

@endphp

<{{ isset($tag) ? $tag : 'button' }}
    {{ $attributes->class([
        'inline-flex items-center',
        'disabled:opacity-25',
        'transition ease-in-out duration-150',
        'border-2 border-transparent rounded',
        'focus:ring-2 focus:ring-sky-400',
        'font-normal text-white',

        'bg-primary-600 text-white hover:bg-primary-700' => $primary,

        'bg-slate-100 text-primary-500 border-primary-500 hover:bg-primary-200' => $secondary,

        'text-slate-500 hover:bg-gray-50' => $flat,

        'bg-red-600 text-white hover:bg-red-700 focus:ring-error-500' => $error,

        'text-base px-6 py-3' => $big,
        'text-xs px-2.5 py-1.5' => $small,
        'text-sm px-4 py-2' => $normal,
    ]) }}>
    @if ($icon)
        <x-custom-icon :icon="$icon" tag="span" class="-ml-1 mr-2" small />
    @endif
    <span>{{ $slot }}</span>
    </{{ isset($tag) ? $tag : 'button' }}>
