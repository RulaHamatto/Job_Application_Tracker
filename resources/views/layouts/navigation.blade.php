<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            {{-- Logo + Main Navigation --}}
            <div class="flex items-center">

                {{-- Logo --}}
                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}"
                       class="text-xl font-bold text-blue-600">
                        Job Tracker
                    </a>

                </div>


                {{-- Desktop Navigation --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    {{-- Dashboard --}}
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                       {{ request()->routeIs('dashboard')
                            ? 'border-blue-600 text-gray-900'
                            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">

                        Dashboard

                    </a>


                    {{-- Applications --}}
                    <a href="{{ route('applications.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                       {{ request()->routeIs('applications.*')
                            ? 'border-blue-600 text-gray-900'
                            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">

                        Applications

                    </a>


                    {{-- Companies --}}
                    <a href="{{ route('companies.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                       {{ request()->routeIs('companies.*')
                            ? 'border-blue-600 text-gray-900'
                            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">

                        Companies

                    </a>


                    {{-- Interviews --}}
                    <a href="{{ route('interviews.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                       {{ request()->routeIs('interviews.*')
                            ? 'border-blue-600 text-gray-900'
                            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">

                        Interviews

                    </a>


                    {{-- Notes --}}
                    <a href="{{ route('notes.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                       {{ request()->routeIs('notes.*')
                            ? 'border-blue-600 text-gray-900'
                            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">

                        Notes

                    </a>

                </div>

            </div>


            {{-- User Menu Desktop --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">

                            <div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">

                                <svg class="fill-current h-4 w-4"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">

                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd" />

                                </svg>

                            </div>

                        </button>

                    </x-slot>


                    <x-slot name="content">

                        {{-- Profile --}}
                        <x-dropdown-link :href="route('profile.edit')">

                            {{ __('Profile') }}

                        </x-dropdown-link>


                        {{-- Logout --}}
                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                                {{ __('Log Out') }}

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            {{-- Mobile Hamburger --}}
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">

                    <svg class="h-6 w-6"
                         stroke="currentColor"
                         fill="none"
                         viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    {{-- Mobile Navigation --}}
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden border-t border-gray-200">

        <div class="pt-2 pb-3 space-y-1">

            {{-- Dashboard --}}
            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">

                Dashboard

            </x-responsive-nav-link>


            {{-- Applications --}}
            <x-responsive-nav-link
                :href="route('applications.index')"
                :active="request()->routeIs('applications.*')">

                Applications

            </x-responsive-nav-link>


            {{-- Companies --}}
            <x-responsive-nav-link
                :href="route('companies.index')"
                :active="request()->routeIs('companies.*')">

                Companies

            </x-responsive-nav-link>


            {{-- Interviews --}}
            <x-responsive-nav-link
                :href="route('interviews.index')"
                :active="request()->routeIs('interviews.*')">

                Interviews

            </x-responsive-nav-link>


            {{-- Notes --}}
            <x-responsive-nav-link
                :href="route('notes.index')"
                :active="request()->routeIs('notes.*')">

                Notes

            </x-responsive-nav-link>

        </div>


        {{-- Mobile User --}}
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>

            </div>


            <div class="mt-3 space-y-1">

                {{-- Profile --}}
                <x-responsive-nav-link :href="route('profile.edit')">

                    Profile

                </x-responsive-nav-link>


                {{-- Logout --}}
                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">

                        Log Out

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>