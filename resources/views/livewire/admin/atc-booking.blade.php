<div>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
            <div class="mt-5 flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">{{session("message")}}
                </div>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="mt-5 flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">{{session("error")}}
                </div>
            </div>
            @endif
            <div class="flex md:flex-row flex-col w-full">
                <div class="w-full md:w-auto">
                    <button type="button" wire:click='filter("id")'
                        class="text-white bg-[#0D2C99] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">ID</button>
                </div>
                <div class="w-full md:w-auto">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-[#0D2C99] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                        type="button">Status <i class='bx bxs-down-arrow bx-xs'></i>
                    </button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <button wire:click='filter(2)'
                                    class="block px-4 py-2 hover:bg-gray-100 w-full text-left">Pending</button>
                            </li>
                            <li>
                                <button wire:click='filter(1)'
                                    class="block px-4 py-2 hover:bg-gray-100 w-full text-left">Rejected</button>
                            </li>
                            <li>
                                <button wire:click='filter(3)'
                                    class="block px-4 py-2 hover:bg-gray-100 w-full text-left">Booked</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md:w-auto w-full">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                            <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24"
                                style="fill: rgb(207, 207, 207);transform: ;msFilter:;">
                                <path
                                    d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z">
                                </path>
                            </svg>
                        </div>
                        <input type="search" id="default-search" wire:model.live=' search'
                            class="block w-full py-2.5 px-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="VID" required />
                        <button type="submit"
                            class="text-white absolute end-px bottom-px bg-[#0D2C99] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-r-lg text-sm px-5 py-2.5">Search</button>
                    </div>

                </div>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5 justify-items-center mt-5 lg:mt-0">
                @foreach ($bookings as $item)
                <div
                    class="md:w-full w-4/5 p-6 bg-white border border-gray-200 rounded-lg shadow {{$item->status == App\Enums\AtcBookingStatus::Pending->value ? 'hover:shadow-2xl hover:shadow-[#F9CC2C] ease-in-out duration-300': 'hover:shadow-2xl hover:shadow-[#2EC662] ease-in-out duration-300' }}
                     {{$item->status == App\Enums\AtcBookingStatus::Rejected->value ? 'hover:shadow-2xl hover:shadow-[#E93434] ease-in-out duration-300': '' }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">#{{$item->id}}
                        {{$item->pilot->firstname}}
                        ({{$item->pilot->vid}})</h5>
                    <p class="mb-3 font-normal text-gray-700">
                    <ul>
                        <li>
                            Dependence: {{$item->dependence}}
                        </li>
                        <li>
                            Status: {{App\Enums\AtcBookingStatus::from($item->status)->name}}
                        </li>
                        <li>
                            Rank: {{$facilitysIvaoController[$item->pilot->ratingatc]["name"]}}
                        <li>
                        <li>
                            Start At: {{$item->start_at}}
                        </li>
                        <li>
                            End At: {{$item->end_at}}
                        </li>
                    </ul>
                    </p>
                    @if ($item->status == App\Enums\AtcBookingStatus::Pending->value)
                    <button href="#" wire:click='confirmBooking({{$item->id}})'
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#0D2C99] rounded-lg hover:bg-[#2EC662] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Confirmar
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                    <button href="#" wire:click='reject({{$item->id}})'
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#0D2C99] rounded-lg hover:bg-[#E93434] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Rechazar
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                    @endif
                    @if ($item->status == App\Enums\AtcBookingStatus::Rejected->value)
                    <button href="#" wire:click='pendingBooking({{$item->id}})'
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#0D2C99] rounded-lg hover:bg-[#2EC662] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Pending
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                    @endif
                    @if ($item->status == App\Enums\AtcBookingStatus::Booked->value)
                    <button wire:click='pendingBooking({{$item->id}})'
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#0D2C99] rounded-lg hover:bg-[#7EA2D6] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Pendiente
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                    <button wire:click='delete({{$item->id}})'
                        wire:confirm="Are you sure you want to delete this booking?"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#0D2C99] rounded-lg hover:bg-[#E93434] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Eliminar
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                    @endif
                    <a href="https://www.ivao.aero/Member.aspx?ID={{$item->pilot->vid}}" target="_blank"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#0D2C99] rounded-lg hover:bg-[#F9CC2C] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Perfil
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</div>