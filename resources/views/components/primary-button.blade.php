<button {{ $attributes->merge(['type' => 'submit',
                                'class' => 'inline-flex items-center
                                border-2 border-transparent rounded
                                bg-primary-600px-4 py-1.5
                                text-base font-normal text-red shadow-sm hover:bg-primary-700focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
