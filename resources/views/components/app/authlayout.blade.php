<div x-data="{ openMenuUser: false }" >

    <div class="min-h-full ">
        <nav class="bg-gray-800">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">

                            <img class="h-12 w-30" src="{{ asset("images/blockstairs_logo_negativa_completa_800x280.png") }}" alt="Workflow">
                        </div>
                        <x-menuBar title="Dashboard" href="{{ route('dashboard') }}" />
                        <x-menuBar title="Usuários" href="{{ route('usuários') }}" />


                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center ml-4 md:ml-6">


                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button x-on:click="openMenuUser = ! openMenuUser" type="button"
                                        class="flex items-center max-w-xs text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>

                                        <img class="w-8 h-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </button>
                                </div>

                                <div x-show="openMenuUser"
                                    class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">


                                    <div class="my-3 ml-3">
                                        <div class="text-sm font-medium leading-none text-gray-400">{{
                                            Auth()->user()->name }}</div>
                                        <div class="my-1 text-xs font-medium leading-none text-gray-400">{{
                                            Auth()->user()->email }}</div>
                                    </div>
                                    <hr class="my-3 border-gray-300">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                        id="user-menu-item-2">Sair</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mr-2 md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>

                            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <!--
                    Heroicon name: outline/x

                    Menu open: "block", Menu closed: "hidden"
                  -->
                            <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <x-menuBar mobile title="Dashboard" href="{{ route('dashboard') }}" />
                    <x-menuBar mobile title="Usuários" href="{{ route('usuários') }}" />


                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">{{ Auth()->user()->name }}</div>
                            <div class="text-sm font-medium leading-none text-gray-400">{{ Auth()->user()->email }}
                            </div>
                        </div>

                    </div>
                    <div class="px-2 mt-3 space-y-1">

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700">Sair</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

                <h1 class="text-3xl font-bold text-gray-900">{{ $title }}</h1>
            </div>
        </header>
        <main>

            <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="px-4 py-6 sm:px-0">
                    {{ $slot }}
                </div>
                <!-- /End replace -->
            </div>

        </main>
    </div>

</div>
</div>
