<nav class="bg-gray-800" x-data="topbar">
    <div class=" px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <div class="-ml-2 mr-2 flex items-center md:hidden">
                    <button @click="toggle" type="button"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <x-custom-icon x-show="!isOpen" icon="hamburger" tag="span" class="text-current" />
                        <x-custom-icon x-show="isOpen" icon="close" tag="span" class="text-current" />
                    </button>
                </div>
                <div class="flex flex-shrink-0 items-center">
                    <a class="block" href="{{ route('dashboard') }}">
                        <x-application-logo class=" h-8 w-auto" />
                    </a>
                </div>
                @if (count($topbarNavigationItems) > 0)
                    <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                        @foreach ($topbarNavigationItems as $topbarNavigationItem)
                            <a href="{{ route($topbarNavigationItem['route']) }}"
                                class="{{ Request::is($topbarNavigationItem['pattern']) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium"
                                {{ Request::is($topbarNavigationItem['pattern']) ? 'aria-current="page"' : '' }}>
                                {{ $topbarNavigationItem['label'] }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="flex items-center">
                <div class="flex flex-shrink-0">
                  @can(Permissions::getPermissionKey(Permissions::ACCESS_BACKEND))
                  <x-button tag="a" flat href="/admin">Admin-Bereich</x-button>

              @endcan
                </div>
                <div class="hidden md:ml-4 md:flex md:flex-shrink-0 md:items-center">
                    <button type="button" @click="toggle"
                        class="hidden rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">View notifications</span>
                        <x-custom-icon icon="bell" tag="span" class="block text-current" />
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3" x-data="profileDropdown">
                        <div>
                            <button type="button" @click="toggle"
                                class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">Mein Profil</a>


                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">Einstellungen</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2"
                                    onclick="event.preventDefault();this.closest('form').submit();">Abmelden</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        @if (count($topbarNavigationItems) > 0)
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                @foreach ($topbarNavigationItems as $topbarNavigationItem)
                    <a href="{{ route($topbarNavigationItem['route']) }}"
                        class="{{ Request::is($topbarNavigationItem['pattern']) ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 rounded-md text-sm font-medium"
                        {{ Request::is($topbarNavigationItem['pattern']) ? 'aria-current="page"' : '' }}>
                        {{ $topbarNavigationItem['label'] }}
                    </a>
                @endforeach
            </div>
        @endif
        <div class="border-t border-gray-700 pt-4 pb-3">
            <div class="flex items-center px-5 sm:px-6">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">{{ Auth::user()->firstname }}
                        {{ Auth::user()->lastname }}</div>
                    <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                </div>
                <button type="button"
                    class="ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <x-custom-icon icon="bell" tag="span" class="block" />
                </button>
            </div>
            <div class="mt-3 space-y-1 px-2 sm:px-3">

                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Mein
                    Profil</a>

                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Einstellungen</a>

                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Abmelden</a>
            </div>
        </div>
    </div>
</nav>
