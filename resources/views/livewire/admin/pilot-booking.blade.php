<div>
    <div class="py-12">

        @if ($modal)
        @component('components.show-pilot-booking', [
        "booking" => $this->booking,
        "facilitysIvaoPilot" => $facilitysIvaoPilot,
        "facilitysIvaoController" => $facilitysIvaoController,
        ])

        @endcomponent
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex md:flex-row flex-col w-full">
                <div class="w-full md:w-auto">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-[#0D2C99] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                        type="button">HUB <i class='bx bxs-down-arrow bx-xs'></i>
                    </button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <button wire:click='filter("SKBO")'
                                    class="block px-4 py-2 hover:bg-gray-100 w-full text-left">SKBO</button>
                            </li>
                            <li>
                                <button wire:click='filter("SKRG")'
                                    class="block px-4 py-2 hover:bg-gray-100 w-full text-left">SKRG</button>
                            </li>
                            <li>
                                <button wire:click='filter("SKBQ")'
                                    class="block px-4 py-2 hover:bg-gray-100 w-full text-left">SKBQ</button>
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
                        <input type="search" id="default-search" wire:model.live='search'
                            class="block w-full py-2.5 px-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="VID" required />
                        <button type="submit"
                            class="text-white absolute end-px bottom-px bg-[#0D2C99] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-r-lg text-sm px-5 py-2.5">Search</button>
                    </div>

                </div>
                <div class="w-full md:w-auto">
                    <button type="button" wire:click='filter("id")'
                        class="text-white bg-[#0D2C99] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Reset
                        filters</button>
                    <button type="button" wire:click='export'
                        class="text-white bg-[#1d6f42] hover:bg-[#2EC662] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Export
                        to Excel</button>
                </div>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5 justify-items-center mt-5 lg:mt-0">
                @foreach ($bookings as $item)
                <div class="md:w-full w-4/5 p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">#{{$item->id}}
                        {{$item->pilot->firstname}}
                        ({{$item->pilot->vid}})</h5>
                    <p class="mb-3 font-normal text-gray-700">
                    <ul>
                        <li>Aircraft: {{$item->aircraft}}</li>
                        <li>Airline: {{$item->airline}}</li>
                        <li>HUB: {{$item->hub}}</li>
                        <li>Rank: {{$facilitysIvaoPilot[$item->pilot->ratingpilot]["name"]}}</li>
                        <li>Country: {{$item->pilot->country}}</li>
                        <li>Briefing file: {!! $item->briefing ? "<a href='". json_decode($item->briefing)[0] ."'
                                target='
                                _blank' class='text-blue-800'>
                                View
                                PDF </a>": "Nothing"!!}
                        <li>
                    </ul>
                    </p>
                    <button wire:click='showBooking({{$item->id}})'
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#0D2C99] rounded-lg hover:bg-[#3C55AC] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Ver reserva
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</div>