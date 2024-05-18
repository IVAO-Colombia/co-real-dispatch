@section('title', "HUB")
<div>
    @if ($hubScreen)
    Seleccione su hub
    @include('livewire.website.widget.pilot.hub-select')
    @elseif ($airlineScreen)
    Seleccione la aerolinea
    @include('livewire.website.widget.pilot.airline-select')
    @elseif ($aircraftScreen)
    Seleccione la aeronave
    @include('livewire.website.widget.pilot.aircraft-select')
    @endif
</div>