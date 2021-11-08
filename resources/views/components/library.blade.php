<div>
    @switch($library->library_type_id)

        @case(1)

            <img {{ $attributes }} src="{{ $library->remote }}" alt="{{ $library->description }}">

            @break


        @case(2)

            <!- video -->

            @break

        @case(3)

            <!- audio -->

            @break

        @case(4)

            <!- docs -->

            @break


        @default

            <!- unknown -->

    @endswitch
</div>
