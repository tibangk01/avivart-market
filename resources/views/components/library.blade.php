<div>
    @switch($library->library_type_id)

        @case(1)

            <p><img {{ $attributes }} src="{{ $library->remote }}" alt="{{ $library->description }}"></p>

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
