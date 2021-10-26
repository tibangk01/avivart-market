@if($provider->person_type_id == 1)

    <x-providers.printing.corporation :provider="$provider" />

@else

    <x-providers.printing.person :provider="$provider" />

@endif