<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Faktura</title>
    <link rel="stylesheet" href="invoice_style.css">
</head>
<body>
<h1>Faktura</h1>
<table class="table">
    <tr>
        <td>
            <address>
                <p>Kuba Łopacki</p>
                <p>Norwida 1<br>58-100 Świdnica </p>
                <p>+48 601 288 895</p>
            </address>
        </td>
        <td>
            <article>
                <address>
                    <p>Dane klienta:</p><span class="kropki">
            <br>......................................
            <br>......................................
            <br>......................................
            <br>......................................

                </address>
            </article>
        </td>
    </tr>
</table>

<table class="meta" rules="all" cellpadding="10">
    <tr>
        <td>
            Numer faktury:
        </td>
        <td></td>
    </tr>
    <tr>
        <td>
            Data:
        </td>
        <td></td>
    </tr>
</table>
<br><br><br>
<table class="items">
    <thead>
    <tr>
        <th class="data" align="center">Produkt</th>
        <th class="data" align="center">Cena/szt(PLN)</th>
        <th class="data" align="center">Podatek</th>
        <th class="data" align="center">Ilość</th>
        <th class="data" align="center">Cena brutto(PLN)</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($koszyk1->produkty_w_koszyku as $produkt): ?>
        <tr>
            <td class="item"><?php echo $produkt->Nazwa ?></td>
            <td align="right"><?php echo $produkt->Cena ?></td>
            <td align="center"><?php echo ((($produkt->Podatek) * 100) + 1) . "%" ?></td>
            <td align="center"><?php echo $koszyk1->liczba_sztuk[$produkt->Nazwa] ?></td>
            <td align="right"><?php echo $koszyk1->liczba_sztuk[$produkt->Nazwa] * $produkt->Cena * (1 + $produkt->Podatek) ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<br><br>
<table class="balance">
    <tr>
        <th>Suma</th>
        <td><?php $koszyk1->totalPriceBrutto() ?> PLN</td>
    </tr>
</table>
<br><br><br><br>
<div>.......................................................<br>Podpis osoby wystawiającej fakturę
</div>

</body>
</html>
