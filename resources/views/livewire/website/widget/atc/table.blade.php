<div class="">
    <div class="relative overflow-x-auto">
        @if ($modal)
        @component('components.atc-confirm-booking', [
        "id" => Auth::user()->id,
        "dependence" => $dependence,
        "start_at" => $start_at,
        "end_at" => $end_at
        ])
        @endcomponent
        @endif

        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        FACILITY
                    </th>
                    @foreach ($bookingTimes as $item)
                    <th scope="col" class="px-6 py-3 text-center">
                        {{$item["start_at"]}} UTC <br>-<br> {{$item["end_at"]}} UTC
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{-- @dd($this->facilitybooks) --}}
                @foreach ($this->facilitybooks as $k => $facility)
                <tr class="bg-white border-b">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$facility->name}}
                    </td>
                    @foreach ($facility->times as $key => $time)
                    @if(isset($time["user_id"]) && Auth::user() && $time["status"] ==
                    \App\Enums\AtcBookingStatus::Pending)
                    <td class="text-center bg-[#F9CC2C] font-bold">
                        <span>Pendiente a confirmacion</span>
                    </td>
                    @elseif(isset($time["status"]) && Auth::user() &&
                    $time["status"] ==
                    \App\Enums\AtcBookingStatus::Booked)
                    {{-- @dd($time["booking"]->pilot->vid) --}}
                    <td class="text-center bg-[#2EC662] text-white ">
                        <span>Reservado por: <br><a class="hover:text-[#0D2C99]"" target=" _blank"
                                href='https://www.ivao.aero/Member.aspx?ID={{$time["booking"]->pilot->vid}}'>
                                {{$time["booking"]->pilot->vid}}</a></span>
                    </td>
                    @elseif (!isset($item["user_id"]) && Auth::user() &&
                    $facility->rating<= Auth::user()->ratingatc
                        )
                        <td class="text-center">
                            <x-input type="checkbox"
                                wire:click="showConfirm('{{$facility->name}}','{{$time['start_at']}}','{{$time['end_at']}}')"
                                class="form-check-input">
                            </x-input> {{__('Free')}}
                        </td>
                        @elseif ($facility->rating > Auth::user()->ratingatc)
                        <td class="text-center">
                            <span>{{__('Necessary rating')}}: <br>
                                {{$this->facilitysIvao[$facility->rating]['name']}}</span>
                        </td>
                        @endif
                        </td>
                        @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- <x-input type="checkbox"
    wire:click="showConfirm('{{$facility->name}}','{{$time['start_at']}}','{{$time['end_at']}}')"
    class="form-check-input">
</x-input> {{__('Free')}} --}}

{{-- && $item["start_at"] == $book->start_at && $item["end_at"] --}}
{{-- @foreach ($facility->book as $book)
{{--$book}}
@if (!$book->user_id &&
Auth::user()
&&
$facility->rating <= Auth::user()->ratingatc
    &&
    Auth::user()->division == 'CO')


    @elseif ($facility->rating > Auth::user()->ratingatc)
    <span>{{__('Necessary rating')}}: <br>
        {{$this->facilitysIvao[$facility->rating]['name']}}</span>
    @elseif($book->user_id == Auth::user()->id && !$book->status !=
    App\Enums\AtcBookingStatus::Pending)
    <span>{{__('Booking pending for approval')}}</span>
    @else
    Reservado por: <br><a class="hover:text-ivao-blue"
        href="https://www.ivao.aero/Member.aspx?ID={{ $item->user->vid }}">{{$item->user->vid}}</a>
    @endif
    @endforeach --}}