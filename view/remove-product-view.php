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

<p><?php echo $message; ?></p>

<p>Commande numéro : <?php echo $order->getId(); ?></p>

<p>Liste des produits mise à jour:</p>
<ul>
    <?php foreach ($order->getProducts() as $product) { ?>

        <li><?php echo $product; ?></li>

    <?php } ?>
</ul>

</body>
</html>