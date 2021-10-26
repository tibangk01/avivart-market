@if(request()->query('printing') == 'corporation')

    <x-providers.printing.corporations />

@else

    <x-providers.printing.people />

@endif