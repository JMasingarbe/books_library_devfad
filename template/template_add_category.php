<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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