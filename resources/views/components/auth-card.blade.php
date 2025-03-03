<div class="min-h-screen flex flex-col justify-center items-center">

    <a href="/">
        <x-application-logo class="w-32 h-32" />
    </a>

    <div class="w-full sm:max-w-sm mt-8 px-8 py-8 bg-slate-800 overflow-hidden rounded">
        {{ $slot }}
    </div>
</div>