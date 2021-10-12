<footer class="">
    <div class="text-right fs-11">
        Document généré le {{ date('d M Y à H:i:s') }} / <strong>Page : <span class="pagenum"></span></strong>
    </div>

    <hr class="my-1">

    <div class="text-center fs-11">
        {{ session('sessionSociety')->enterprise->address }},
        <span>BP : {{ session('sessionSociety')->enterprise->postal_code }} - Email : {{ session('sessionSociety')->enterprise->email }} - Tél : {{ session('sessionSociety')->enterprise->getFullPhoneNumber() }} - Site Web : {{ session('sessionSociety')->enterprise->website }}</span>
        <br>
        <span>RCCM : {{ session('sessionSociety')->tppcr }} - NIF : {{ session('sessionSociety')->fiscal_code }}</span>
        <br>
        <span>{{ session('sessionSociety')->enterprise->city }} - {{ session('sessionSociety')->enterprise->region->name }} - {{ session('sessionSociety')->enterprise->country->name }}</span>
    </div>
</footer>