@section('title', "Welcome!")

<div class="">
    <section class="bg-center  bg-no-repeat bg-gray-700 bg-blend-multiply"
        style="background-image: url('{{asset('img/Event_banner.png')}}')">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Colombia Real Dispatch</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Vive la emoción de un evento
                inigualable en la red de IVAO, donde podrás realizar todo el proceso de despacho en una
                demostración de habilidades y coordinación que establecerá un nuevo estándar en la simulación de vuelos.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{route('book.pilot')}}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Book now
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="#about-event"
                    class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Learn more
                </a>
            </div>
        </div>
    </section>


    <section class="bg-white" id="about-event">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12 mb-8">
                <a href="#"
                    class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                    </svg>
                    Informacion
                </a>
                <h1 class="text-gray-900 text-3xl md:text-5xl font-extrabold mb-2">Colombia Real Dispatch</h1>
                <p class="text-lg font-normal text-gray-500 mb-6">
                    El evento simulará el despacho de los vuelos con el objetivo que los pilotos realicen el
                    procedimiento desde la presentación en la "oficina" de la Aerolínea seleccionada y reciban el
                    despacho a través del discord oficial de la división, donde el personal especializado en despacho de
                    aeronaves le entregará los 2 vuelos obligatorio, que será ida y vuelta de su hub de elección.
                </p>
                <a href="{{env('IVAO_FORUM_LINK')}}" target="_blank"
                    class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Read more
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12">
                    <a href="#"
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                        </svg>
                        Reserva
                    </a>
                    <h2 class="text-gray-900 text-3xl font-extrabold mb-2">Los vuelos que se despachen serán de rutas
                        reales.</h2>
                    <p class="text-lg font-normal text-gray-500">
                        ¿Cuáles son los aeropuertos elegibles?
                    <ul class="text-lg font-normal text-gray-500 mb-4">
                        <li>SKBQ Aeropuerto Internacional Ernesto Cortissoz</li>
                        <li>SKRG Aeropuerto Internacional José María Córdova</li>
                        <li>SKBO Aeropuerto Internacional El Dorado</li>
                    </ul>
                    </p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12">
                    <a href="#"
                        class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                        </svg>
                        Airlines
                    </a>
                    <h2 class="text-gray-900 text-3xl font-extrabold mb-2">Aerolineas reales, despachos reales.</h2>
                    <p class="text-lg font-normal text-gray-500">
                        ¿Cuáles son las aerolineas disponibles?
                    <ul class="text-lg font-normal text-gray-500 mb-4">
                        <li>Avianca (AVA)</li>
                        <li>Clic (EFY)</li>
                        <li>Wingo (RPB)</li>
                        <li>Latam (ARE)</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </section>


</div>