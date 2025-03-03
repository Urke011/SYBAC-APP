@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'font-normal text-slate-900
                                            rounded border-2 border-slate-400 focus:border-slate-400
                                            focus:ring-2 focus:ring-sky-400'
                                ])
        !!}
>
