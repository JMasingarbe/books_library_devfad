<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <?php include 'component/navbar.php'; ?>
    
    <main class="container-fluid">
        <h1>Demande d’emprunt reçue</h1>
        <p>Livre = <?= $_POST['book_id'] ?></p>
        <p>Livre = <?= $_SESSION['user']['id'] ?></p>
        <a href="/books">Revoir les livres</a>
        <a href="">Vos emprunts</a>
    </main>
</body>

</html>