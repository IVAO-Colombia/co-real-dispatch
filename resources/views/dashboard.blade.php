<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <x-stats-flight :booking="$userBooking" :countPilotBookings="$countPilotBookings"
                :countAtcBookings="$countAtcBookings" :principalHub="$principalHub" />
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 flex items-center flex-col">
            <h3 class="text-3xl mb-8 text-center font-bold text-[#3C55AC]">About this event</h3>
            <iframe width="853" height="480" src="https://www.youtube.com/embed/g5VjIuk8rJc"
                title="Colombia Real Dispatch 2024" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</div>