@if(request()->query('printing') == 'corporation')

    <x-customers.printing.corporations />

@else

    <x-customers.printing.people />

@endif