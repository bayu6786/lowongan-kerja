<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Left Section: Logo & Navigation Menu -->
            <div class="flex">
                <!-- Application Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Main Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <!-- Home Link -->
                    <x-nav-link 
                        :href="route('home')" 
                        :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    
                    <!-- Jobs Link -->
                    <x-nav-link 
                        :href="route('user.jobs.index')" 
                        :active="request()->routeIs('user.jobs.index')">
                        Lowongan
                    </x-nav-link>
                    
                    <!-- General Information Link -->
                    <x-nav-link 
                        :href="route('informasi')" 
                        :active="request()->routeIs('informasi')">
                        Informasi Umum
                    </x-nav-link>
                    
                    <!-- Contact Link -->
                    <x-nav-link 
                        :href="route('contact')" 
                        :active="request()->routeIs('contact')">
                        Contact
                    </x-nav-link>
                    
                </div>
            </div>

            <!-- Right Section: User Authentication -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <!-- Authenticated User Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile Link in Dropdown -->
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            
                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link 
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <!-- Guest User Links -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" 
                           class="text-sm text-gray-700 hover:text-gray-900 underline decoration-2 underline-offset-4 transition duration-150 ease-in-out">
                            {{ __('Login') }}
                        </a>
                        <a href="{{ route('register') }}" 
                           class="text-sm text-gray-700 hover:text-gray-900 underline decoration-2 underline-offset-4 transition duration-150 ease-in-out">
                            {{ __('Register') }}
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>