<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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
                        <li>Dependence: {{$item->dependence}}</li>
                        <li>Start At: {{$item->start_at}}</li>
                        <li>End At: {{$item->end_at}}</li>
                        <li>Status: {{App\Enums\AtcBookingStatus::from($item->status)->name}}</li>
                    </ul>
                    </p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#0D2C99] rounded-lg hover:bg-[#3C55AC] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Eliminar
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