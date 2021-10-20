<style>
    @page {
        margin: 0cm 0cm;
    }

    .page-break {
        /*page-break-before: always;*/
        page-break-after: always;
    }

    body {
        border: 1px solid red;
        margin: 0;
    }

    table {
        width: 100%;
    }

    table th, table td {
        border: 1px solid green;
    }
</style>

<table class="table table-bordered">
    <tr>
        <td><x-library :library='$staff->human->user->library' class="img50_50" /></td>
        <td>
            <div>{{ $staff->human->user->full_name }}</div>
            <div>{{ $staff->staff_type->name }}</div>
        </td>
        <td>
            <img src="{{ asset('qrcodes/qrcode1.png') }}" alt="qrcode" class="img50_50" />
        </td>
    </tr>
</table>

<p>
    <img src="data:image/png;base64,{{  DNS1D::getBarcodePNG('4', 'C39E+', 3 , 33, array(1,1,1), true) }}" alt="barcode" />
</p>

<div class="page-break"></div>