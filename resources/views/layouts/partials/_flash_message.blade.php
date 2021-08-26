@if(session()->has("success"))
<div class="alert alert-success" role="alert">
    &#128515; {{ session("success") }}
</div>
@endif

@if(session()->has("danger"))
<div class="alert alert-danger" role="alert">
    &#128515; {{ session("danger") }}
</div>
@endif

@if(session()->has("warning"))
<div class="alert alert-warning" role="alert">
    &#128515; {{ session("warning") }}
</div>
@endif

@if(session()->has("info"))
<div class="alert alert-info" role="alert">
    &#128515; {{ session("info") }}
</div>
@endif

@if(session()->has("primary"))
<div class="alert alert-primary" role="alert">
   	&#128515; {{ session("primary") }}
</div>
@endif

@php (session()->forget(['success', 'danger', 'warning', 'info', 'primary']))
