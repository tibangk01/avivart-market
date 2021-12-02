<footer class="">
    <div class="text-right fs-11">
        Document généré le {{ now()->isoFormat('LL LTS') }} | <strong>Page : <span class="pagenum"></span></strong>
    </div>

    <hr class="my-1">

    <div class="text-center fs-11">
        {{ session('sessionSociety')->enterprise->address }},
        <span>BP : {{ session('sessionSociety')->enterprise->postal_code }} - Email : <a href="mailto:{{ session('sessionSociety')->enterprise->email }}">{{ session('sessionSociety')->enterprise->email }}</a> - Tél : {{ session('sessionSociety')->enterprise->getFullPhoneNumber() }} - Site Web : <a href="{{ session('sessionSociety')->enterprise->website }}">{{ session('sessionSociety')->enterprise->website }}</a></span>
        <br>
        <span>RCCM : {{ session('sessionSociety')->tppcr }} - NIF : {{ session('sessionSociety')->fiscal_code }}</span>
        <br>
        <span>{{ session('sessionSociety')->enterprise->city }} - {{ session('sessionSociety')->enterprise->region->name }} - {{ session('sessionSociety')->enterprise->country->name }}</span>
    </div>
</footer>