<div id="crud-modal" tabindex="-1" aria-modal="true" role="dialog"
    class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Book of {{$booking->pilot->vid}}
                </h3>
                <button type="button" wire:click='closeModal'
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="pilotName" class="block mb-2 text-sm font-medium text-gray-900">Pilot
                            name</label>
                        <input type="text" name="pilotName" id=" pilotName"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{$booking->pilot->firstname}} {{$booking->pilot->lastname}}" disabled>
                    </div>
                    <div class=" col-span-2 sm:col-span-1">
                        <label for="pilotRating"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilot rating</label>
                        <input type="text" name="pilotRating" id="pilotRating"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{$facilitysIvaoPilot[$booking->pilot->ratingpilot]['name']}}" disabled>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="atcRating"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilot rating</label>
                        <input type="text" name="atcRating" id="atcRating"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{$facilitysIvaoController[$booking->pilot->ratingatc]['name']}}" disabled>
                    </div>
                    <div class="col-span-2">
                        <label for="airline" class="block mb-2 text-sm font-medium text-gray-900">Airline</label>
                        <input type="text" name="airline" id=" airline"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{$booking->airline}}" disabled>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="atcRating"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hub</label>
                        <input type="text" name="atcRating" id="atcRating"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{$booking->hub}}" disabled>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="aircraft"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aircraft</label>
                        <input type="text" name="aircraft" id="aircraft"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{$booking->aircraft}}" disabled>
                    </div>
                </div>
                <button type="button" wire:click='closeModal'
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1 -ms-1 w-5 h-5" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);">
                        <path
                            d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                        </path>
                    </svg>
                    Close
                </button>
                @isset($booking->briefing)

                <a href="{{json_decode($booking->briefing)[0]}}" target="_blank"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1 -ms-1 w-5 h-5" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);">
                        <path
                            d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z">
                        </path>
                        <path
                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z">
                        </path>
                    </svg>
                    View briefing
                </a>
                @endisset
            </div>
        </div>
    </div>
</div>
<div class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div>