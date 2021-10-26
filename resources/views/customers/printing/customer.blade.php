@if($customer->person_type_id == 1)

    <x-customers.printing.corporation :customer="$customer" />

@else

    <x-customers.printing.person :customer="$customer" />

@endif