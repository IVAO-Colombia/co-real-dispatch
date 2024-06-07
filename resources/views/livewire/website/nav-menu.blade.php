<nav class="relative top-0 z-50 w-full bg-[#0D2C99] text-white">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <div class="text-center">
                    <button class="text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm "
                        type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                        aria-controls="drawer-navigation">
                        <box-icon name='menu' size='md' color='#ffffff'></box-icon>
                    </button>
                </div>
                <a href="{{route('home')}}" class="flex ms-2">
                    <img src="{{asset('img/Logo_Tag_WHITE.svg')}}" class="h-16" alt="IVAO Co Logo" />
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div class="">
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Colombia
                            Real Dispatch | Faltan:
                            <x-countdown />
                        </span>

                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button" disabled class="flex text-sm p-2" aria-expanded="false">
                            <span class="sr-only">Open user menu</span>
                            @auth
                            <span>
                                {{ Auth::user()->firstname }} {{Auth::user()->lastname}}
                                {{Auth::user()->staff ? " | ".Auth::user()->staff: " | ". Auth::user()->vid}}
                            </span>
                            @else
                            <div class="flex items-center">
                                <span class="p-3 rounded bg-[#3C55AC]">
                                    <a href="{{route('login')}}">Login with IVAO SSO</a>
                                </span>
                            </div>
                            @endauth
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- drawer component -->
        <div id="drawer-navigation"
            class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white"
            tabindex="-1" aria-labelledby="drawer-navigation-label">
            <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase">
                Menu
            </h5>
            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="py-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{route('home')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                </path>
                            </svg>
                            <span class="ms-3">Informacion</span>
                        </a>
                    </li>
                    @auth
                    <li>
                        <a href="{{route('dashboard')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    @endauth
                    <li>
                        <a href="{{route('book.pilot')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="m21.743 12.331-9-10c-.379-.422-1.107-.422-1.486 0l-9 10a.998.998 0 0 0-.17 1.076c.16.361.518.593.913.593h2v7a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-4h4v4a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-7h2a.998.998 0 0 0 .743-1.669z">
                                </path>
                            </svg>
                            <span class="ms-3">Booking hub</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('book.atc')}}"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                fill="currentColor" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.486 2 2 6.486 2 12v4.143C2 17.167 2.897 18 4 18h1a1 1 0 0 0 1-1v-5.143a1 1 0 0 0-1-1h-.908C4.648 6.987 7.978 4 12 4s7.352 2.987 7.908 6.857H19a1 1 0 0 0-1 1V18c0 1.103-.897 2-2 2h-2v-1h-4v3h6c2.206 0 4-1.794 4-4 1.103 0 2-.833 2-1.857V12c0-5.514-4.486-10-10-10z">
                                </path>
                            </svg>
                            <span class="ms-3">ATC Booking</span>
                        </a>
                    </li>
                    @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button href=""
                                class="flex w-full items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                    width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M5.002 21h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-14c-1.103 0-2 .897-2 2v6.001H10V7l6 5-6 5v-3.999H3.002V19c0 1.103.897 2 2 2z">
                                    </path>
                                </svg>
                                <span class="ms-3">Log out</span>
                            </button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>