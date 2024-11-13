<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/asset/CSS/CSS.css">
    <title>Document</title>
</head>
<body>
<main>
    <h1>Adresse de livraison</h1>

    <h2><?php echo $message; ?></h2>

    <p>Commande numéro : <?php echo $order->getId(); ?></p>

    <form method="post">
        <label for="shippingAddress">Adresse de livraison:</label>
        <input type="text" name="shippingAddress" required>
        <button type="submit">Enregistrer</button>
    </form>

    <p>Cette adresse a bien été ajoutée: <?php echo $order->getAddress(); ?></p>

</main>

</body>
</html>
