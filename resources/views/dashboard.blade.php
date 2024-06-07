<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <x-stats-flight :booking="$userBooking" :countPilotBookings="$countPilotBookings"
                :countAtcBookings="$countAtcBookings" :principalHub="$principalHub" />
        </div>
    </div>
</div>