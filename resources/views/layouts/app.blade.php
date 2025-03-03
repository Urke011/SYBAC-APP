<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- title -->
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- icons -->
        <!-- styles -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        @vite(['resources/css/app.css'])
    </head>

    <body class="font-sans antialiased bg-slate-200" {{ $attributes }}>
        <div class="min-h-screen">
<!-- START SUBSECTION -->
    

            <div class="fixed top-0 right-0 left-0 w-full h-auto z-[100]">
                <x-topbar />
            </div>
            <div class="hidden md:block fixed top-0 left-0 bottom-0 w-64 z-[80]">
                <x-sidebar />
            </div>
            <main class="w-full h-auto min-h-screen pl-0 pt-16 md:pl-64 z-[60] ">
                <div class="w-full h-auto container mx-auto px-8 py-10">

                    <div class="relative border-b border-gray-200 pb-5 sm:pb-0">
                        <div
                            class="min-h-[64px] md:flex md:items-center @if (isset($buttons) && $buttons != null) md:justify-between @endif ">
                            <h2 class="text-2xl font-bold leading-6 uppercase text-gray-900"> {{ $header }}</h2>
                            @if (isset($buttons) && $buttons != null)
                                <div
                                    class="mt-3 flex md:absolute md:top-3 md:right-0 md:mt-0 flex flex-row justify-end items-center gap-4">
                                    {{ $buttons }}
                                </div>
                            @endif

                        </div>
                        <div class="hidden mt-4">
                            <!-- Dropdown menu on small screens -->
                            <div class="sm:hidden">
                                <label for="current-tab" class="sr-only">Select a tab</label>
                                <select id="current-tab" name="current-tab"
                                    class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option>Applied</option>

                                    <option>Phone Screening</option>

                                    <option selected>Interview</option>

                                    <option>Offer</option>

                                    <option>Hired</option>
                                </select>
                            </div>
                            <!-- Tabs at small breakpoint and up -->
                            <div class="hidden sm:block">
                                <nav class="-mb-px flex space-x-8">
                                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                                    <a href="#"
                                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Applied</a>

                                    <a href="#"
                                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Phone
                                        Screening</a>

                                    <a href="#"
                                        class="border-indigo-500 text-indigo-600 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm"
                                        aria-current="page">Interview</a>

                                    <a href="#"
                                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Offer</a>

                                    <a href="#"
                                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">Hired</a>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="w-full h-auto pt-10">
                        {{ $slot }}
                    </div>


                    <!-- Modals -->
                    @if (isset($modals) && $modals != null)
                        <aside>
                            {{ $modals }}
                        </aside>
                    @endif



                </div>

            </main>
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            {{-- $header --}}

            <!-- Page Content -->
            {{-- <main class="container mx-auto px-4">

            </main> --}}
            


<!-- END SUBSECTION -->
        </div>
        <!-- scripts -->
        @vite(['resources/js/app.js'])
    </body>

</html>
