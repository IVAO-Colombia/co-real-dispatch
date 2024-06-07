<div class="relative pt-2 lg:pt-2">
    @if ($modal)
    @component('components.pilot-confirm-booking', [
    "aircraft" => $aircraft,
    "airline" => $airline,
    "hub" => $hub,
    "id" => Auth::user()->id,
    ])
    @endcomponent
    @endif

    <div class="bg-cover w-full flex justify-center items-center" style="">
        <div class="w-full bg-white p-5  bg-opacity-40 backdrop-filter backdrop-blur-lg">
            <div class="w-12/12 mx-auto rounded-2xl bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto">

                    @isset($airline)
                    @foreach ($airports[$hub]["airlines"][$airline]["aircrafts"] as $k => $item)
                    <article
                        class="bg-white  p-6 mb-6 shadow transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
                        <button wire:click='confirmBooking("{{$item}}")' target="_self"
                            class="absolute opacity-0 top-0 right-0 left-0 bottom-0"></button>
                        <div class="relative mb-4 rounded-2xl">
                            <img class="max-h-80 rounded-2xl w-full object-cover transition-transform duration-300 transform group-hover:scale-105"
                                src="{{asset('img/'.strtolower($item).'_airplane.png')}}" alt="">
                            <button wire:click='confirmBooking("{{$item}}")'
                                class="flex justify-center items-center bg-red-700 bg-opacity-80 z-10 absolute top-0 left-0 w-full h-full text-white rounded-2xl opacity-0 transition-all duration-300 transform group-hover:scale-105 text-xl group-hover:opacity-100"
                                target="_self" rel="noopener noreferrer">
                                {{$item}}
                            </button>
                        </div>
                        <h1 class="font-large text-xl leading-8">
                            <button wire:click='confirmBooking("{{$item}}")'
                                class="relative group-hover:text-red-700 transition-colors duration-200 ">
                                {{$item}}
                            </button>
                        </h1>
                    </article>
                    @endforeach
                    @endisset
                </div>

            </div>
        </div>
    </div>
</div>