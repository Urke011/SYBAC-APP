<div class="w-full h-full flex flex-grow flex-col overflow-y-auto border-r border-gray-200 bg-white pt-24 pb-4">
    <div class="  flex flex-grow flex-col">
        <nav class="flex-1 space-y-1 bg-white px-2" aria-label="Sidebar">
            @foreach ($sidebarNavigationItems as $sidebarNavigationItem)
                @if (count($sidebarNavigationItem['childrens']) > 0)
                    <div class="space-y-1" x-data="sidebarSection">
                        <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                        <button type="button"
                            class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            aria-controls="sub-menu-1" aria-expanded="false" @click="toggle">
                            <!-- Heroicon name: outline/users -->
                            <svg class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            <span class="flex-1">{{ $sidebarNavigationItem['label'] }}</span>
                            <svg class="ml-3 h-5 w-5 flex-shrink-0 transform transition-colors duration-150 ease-in-out group-hover:text-gray-400"
                                :class="open ? 'text-gray-400 rotate-90' : 'text-gray-300'" viewBox="0 0 20 20"
                                aria-hidden="true">
                                <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                            </svg>
                        </button>
                        <!-- Expandable link section, show/hide based on state. -->
                        <div class="space-y-1" id="sub-menu-1" x-show="open" x-cloak>
                            @foreach ($sidebarNavigationItem['childrens'] as $children)
                                <a href="{{ route($children['route']) }}"
                                    class="group flex w-full items-center rounded-md py-2 pl-11 pr-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">{{ $children['label'] }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    @can($sidebarNavigationItem['permission'])
                        <div class="space-y-1">
                            <a href="{{ route($sidebarNavigationItem['route']) }}"
                                class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 py-2 text-sm font-medium rounded-md">
                                <x-custom-icon :icon="$sidebarNavigationItem['icon']" tag="span" class="text-gray-500 mr-3 flex-shrink-0" />
                                {{ $sidebarNavigationItem['label'] }}
                            </a>

                        </div>
                    @endcan
                @endif
            @endforeach



        </nav>
    </div>
</div>
