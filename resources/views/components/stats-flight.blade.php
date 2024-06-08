<div class="w-full bg-white border border-gray-200 rounded-lg shadow">
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select tab</label>
        <select id="tabs"
            class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option>Statistics</option>
            <option>Services</option>
        </select>
    </div>
    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex"
        id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
        <li class="w-full">
            <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats"
                aria-selected="true"
                class="inline-block w-full p-4 rounded-ss-lg bg-gray-50 hover:bg-gray-100 focus:outline-none">Statistics</button>
        </li>
        <li class="w-full">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                aria-selected="false"
                class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none">Services</button>
        </li>
    </ul>
    <div id="fullWidthTabContent" class="border-t border-gray-200">
        <div class="hidden p-4 bg-white rounded-lg md:p-8" id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <dl
                class="grid max-w-screen-xl grid-cols-1 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-4 sm:p-8">

                @can('viewAny', App\Models\PilotBooking::class)
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">{{$countPilotBookings}}</dt>
                    <dd class="text-gray-500">
                        <i class='bx bxs-paper-plane'></i>
                        Pilot Bookings
                    </dd>
                </div>
                @endcan
                @can('viewAny', App\Models\AtcBooking::class)

                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">{{$countAtcBookings}}</dt>
                    <dd class="text-gray-500">
                        <i class='bx bx-headphone'></i>
                        Atc Bookings
                    </dd>
                </div>
                @endcan
                @can('viewAny', App\Models\PilotBooking::class)
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">{{$principalHub}}</dt>
                    <dd class="text-gray-500"><i class='bx bxs-home'></i>Principal
                        Hub</dd>
                </div>
                @endcan
                <div class="flex flex-col items-center text-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">{{ isset($booking->hub) ? "$booking->hub
                        ($booking->id)":"Don't have bookings"}}
                    </dt>
                    <dd class="text-gray-500"><i class='bx bxs-user'></i> My hub (id)</dd>
                </div>

                <div class="flex flex-col items-center text-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">
                        <x-countdown />
                    </dt>
                    <dd class="text-gray-500"><i class='bx bxs-time'></i> Time left</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <a target="_blank" href="https://discord.co.ivao.aero"
                        class="mb-2 text-3xl font-extrabold cursor-pointer hover:text-blue-800"><i
                            class='bx bxl-discord-alt bx-md'></i>
                    </a>
                    <dd class="text-gray-500 cursor-pointer">
                        <a target="_blank" href="https://discord.co.ivao.aero">
                            <span id="default-msg"><i class='bx bx-link-alt'></i> Dispatch link
                            </span>
                        </a>
                    </dd>
                </div>
            </dl>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8" id="about" role="tabpanel" aria-labelledby="about-tab">
            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900">Rules and regulations</h2>
            <!-- List -->
            <ul role="list" class="space-y-4 text-gray-500">
                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="leading-tight">Lorem ipsum dolor</span>
                </li>
                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="leading-tight">Lorem ipsum dolor</span>
                </li>
                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="leading-tight">Lorem ipsum dolor</span>
                </li>
                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="leading-tight">Lorem ipsum dolor</span>
                </li>
            </ul>
        </div>
    </div>
</div>