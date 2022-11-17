<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <style type="text/css">

        .tg  {
            width: 100%;
            border-collapse:collapse;border-spacing:0;
        }

        .tg td{
            border-style:solid;border-width:0px;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;
            padding:10px 5px;word-break:normal;
        }

        .tg th{
            border-style:solid;border-width:0px;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;
           overflow:hidden;padding:10px 5px;word-break:normal;
        }

        .tg .tg-0pky{
            border-color:inherit;text-align:left;vertical-align:top
        }

        .tg .tg-0lax{
            text-align:left;vertical-align:top
        }

        @media screen and (max-width: 767px) {
            .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
        }

    </style>

  </head>
  <body>
    <h1><strong>FACTUUR</strong></h1>
    <table>
        <tbody>
            <tr>
                <td width="302">
                <p><strong>{{$invoice->company->name}}</strong></p>
                <p>{{ $invoice->company->street }} {{ $invoice->company->HouseNumber}}</p>
                <p>{{ $invoice->company->city }}</p>
                <p>{{ $invoice->company->CountryCode }}</p>
                <p>&nbsp;</p>
                <p><em>Periode</em>:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $invoice->created_at }}</p>
                <p>Klantnr.:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(klantnmbr)</p>
                <p>Contractnr.:&nbsp; &nbsp; (contractnmbr)</p>
                <p>Factuurnr.:&nbsp; &nbsp; &nbsp;{{ $invoice->id }}</p>
                <p><strong>&nbsp;</strong></p>
                </td>
                <td width="302">
                    {{-- C:\laragon\www\BarrocIntens\public\fotos\logo\Logo4_klein.png --}}
                    <img src="fotos/logo/Logo4_klein.png" alt="">
                    <p><em>Barroc Intens</em></p>
                    <p><em>Terheijdenseweg 350</em></p>
                    <p><em>4826 AA&nbsp; Breda</em></p>
                </td>
            </tr>
        </tbody>
    </table>
    <hr style="height:2px;border-width:0;color:#facc15;background-color: #facc15">

    <div class="tg-wrap">
        <table class="tg">
            <thead>
            <tr>
                <td class="tg-0pky">Aantal</td>
                <td class="tg-0lax">Product Id</td>
                <td class="tg-0lax">Omschrijving</td>
                <td class="tg-0lax">Prijs</td>
                <td class="tg-0lax">Subtotaal</td>
            </tr>
            <?php
                $price = '0';

            foreach($invoice_products as $products){

                $subtotaal = bcmul($products->amount, $products->product_price, 2);

                $price+= $subtotaal;
                $total_price = number_format($price, 2);

                ?>
            <tr>
                <td class="tg-0pky">{{ $products->amount }}x</td>
                <td class="tg-0lax">{{ $products->product_id }}</td>
                <td class="tg-0lax">{{ $products->product_name }}</td>
                <td class="tg-0lax">&euro;{{ $products->product_price }}</td>
                <td class="tg-0lax">&euro;{{ $subtotaal }}</td>
            </tr>
            <?php
            } ?>

            </thead>
        </table>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Totaal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &euro;{{ $total_price }}</p>
    <p>&nbsp;</p>
    <p><em>&nbsp;</em></p>
    <p><em>&nbsp;</em></p>
    <p><em>Te betalen binnen 14 dagen na dagtekening.</em></p>
  </body>
</html>
