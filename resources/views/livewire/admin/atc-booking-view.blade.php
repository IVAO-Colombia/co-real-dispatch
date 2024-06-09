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
                    <button wire:click='delete({{$item->id}})'
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#0D2C99] rounded-lg hover:bg-[#3C55AC] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Eliminar
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