<footer class="main-footer">
    @if(!is_null($staffStatusBarInfo))
    <strong class="text-dark">Période en cours : </strong>{{ $staffStatusBarInfo->day_transaction->exercise->getPeriod() }} |
    <strong class="text-danger">Journée en cours ({{ $staffStatusBarInfo->day_transaction->getState() }}) : </strong>{{ $staffStatusBarInfo->day_transaction->getDay() }} |
    <strong class="text-danger">Caisse en cours ({{ $staffStatusBarInfo->getState() }}) : </strong>{{ $staffStatusBarInfo->cash_register->name }} |
    <strong class="text-success">Montant de la caisse : </strong>{{ amountConverter($staffStatusBarInfo->amount) }} |
    <em class="text-warning">Devise : </em>{{ $staffStatusBarInfo->day_transaction->exercise->currency->name }}
    @else
    <strong>Copyright &copy; 2021-{{ date('Y') }} <a href="https://www.avivart.net" target="_blank">AVIV'ART</a>.</strong>
    Tous Droits Réservés.
    @endif

    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
</footer>