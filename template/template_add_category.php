<<<<<<< HEAD
<!DOCTYPE html>
=======
>>>>>>> 9c0243437cb34a7e20e67ea9b957bbd31c897579
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title><?= $title ?? "" ?></title>
</head>
<body>
    <h1>Ajout de Catégorie</h1>

    <form action="" method="post">
        <input type="text" name="category_name" id="">
        <button type="submit" name="submit">Ajouter la catégorie</button>
    </form>

    <p><?= $data["msg"] ?? "" ?></p>
</body>
</html>
=======
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>
<body>
    <?php include 'component/navbar.php' ?>
    <main class="container-fluid">
        <h1>Ajouter une categorie</h1>
        <form action="" method="post">
            <input type="text" name="category_name" placeholder="Saisir le nom de la categorie">
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <p><?= $data["msg"] ?? "" ?></p>
    </main>
</body>
</html>
>>>>>>> 9c0243437cb34a7e20e67ea9b957bbd31c897579
