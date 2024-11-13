<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<H1> Vous etes ici pour payer </H1>

<p>Commande numéro : <?php echo $order->getId(); ?></p>

<p> Statut de la commande : <?php echo $order->getStatus(); ?></p>

</body>
</html>