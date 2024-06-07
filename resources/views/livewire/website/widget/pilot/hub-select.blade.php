<div class="relative pt-2 lg:pt-2">
    <div class="bg-cover w-full flex justify-center items-center"
        style="background-image: url('/images/mybackground.jpeg');">
        <div class="w-full bg-white p-5  bg-opacity-40 backdrop-filter backdrop-blur-lg">
            <div class="w-12/12 mx-auto rounded-2xl bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto">

                    @foreach ($airports as $item)
                    <article
                        class="bg-white  p-6 mb-6 shadow transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
                        <button wire:click='selectAirline("{{$item["oaci"]}}")' target="_self"
                            class="absolute opacity-0 top-0 right-0 left-0 bottom-0"></button>
                        <div class="relative mb-4 rounded-2xl">
                            <img class="max-h-80 rounded-2xl w-full object-cover transition-transform duration-300 transform group-hover:scale-105"
                                src="{{asset('img/'.strtolower($item['oaci']).'_twr.png')}}" alt="">
                            <button wire:click='selectAirline("{{$item["oaci"]}}")'
                                class="flex justify-center items-center bg-red-700 bg-opacity-80 z-10 absolute top-0 left-0 w-full h-full text-white rounded-2xl opacity-0 transition-all duration-300 transform group-hover:scale-105 text-xl group-hover:opacity-100"
                                target="_self" rel="noopener noreferrer">
                                {{$item["oaci"]}}
                            </button>

                        </div>
                        <div class="flex justify-between items-center w-full pb-4 mb-auto">
                            <div class="flex items-center">
                                <div class="flex flex-1">
                                    <p class="text-sm font-semibold">{{$item["name"]}}</p>
                                </div>
                            </div>
                        </div>
                        <h1 class="font-large text-xl leading-8">
                            <button wire:click='selectAirline("{{$item["oaci"]}}")'
                                class="relative group-hover:text-red-700 transition-colors duration-200 ">
                                {{$item["oaci"]}}
                            </button>
                        </h1>
                    </article>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>