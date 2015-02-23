<html>
    <head>
        <meta charset="utf-8" />
        <title>Počítač</title>
    </head>
    <body>
        <h1>Počítač: <b><?=$item->nazov?> (<?=$item->id?>)</b></h1>
        <table style="width: 800px; margin:30px;">
            <tr>
				<th style="text-align:right; padding-right:10px;"><?= $labels["kod"] ?></th><td><?= $item->kod ?></td>
            </tr>
            <tr>
				<th style="text-align:right; padding-right:10px;"><?= $labels["vyrobca"] ?></th><td><?= $item->vyrobca ?></td>
            </tr>
            <tr>
				<th style="text-align:right; padding-right:10px;"><?= $labels["cena"] ?></th><td><?= $item->cena ?> &euro;</td>
            </tr>
            <tr>
				<th style="text-align:right; padding-right:10px;"><?= $labels["sklad"] ?></th><td><?= $item->sklad ?></td>
            </tr>
            <tr>
				<th style="text-align:right; padding-right:10px;"><?= $labels["procesor"] ?></th><td><?= $item->procesor ?></td>
            </tr>
            <tr>
				<th style="text-align:right; padding-right:10px;"><?= $labels["grafika"] ?></th><td><?= $item->grafika ?></td>
            </tr>
            <tr>
				<th style="text-align:right; padding-right:10px;"><?= $labels["pevny_disk"] ?></th><td><?= $item->pevny_disk ?></td>
            </tr>
            <tr>
				<th style="text-align:right; padding-right:10px;"><?= $labels["pamat"] ?></th><td><?= $item->pamat ?></td>
            </tr>
        </table>
    </body>
</html>
