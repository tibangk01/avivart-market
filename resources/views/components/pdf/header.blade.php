<header>
    <div class="">
        <img src="{{ session('sessionSociety')->enterprise->library->remote }}" alt="{{ session('sessionSociety')->enterprise->library->description }}" class="logo">
    </div>

    @if($watermark)
        @if($orientation == 'portrait')
            <x-watermark.portrait />
        @elseif($orientation == 'landscape')
            <x-watermark.landscape />
        @endif
    @endif
</header>