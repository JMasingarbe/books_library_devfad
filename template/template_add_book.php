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
        <h1>Ajouter un livre</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="saisir le titre">
            <?php foreach ($data["validation"]["title"] ?? [] as $error) : ?>
                <p><?=  htmlspecialchars($error->message, ENT_QUOTES, 'UTF-8');  ?></p>
            <?php endforeach ?>
            <textarea name="content" placeholder="saisir le résumé"></textarea>
            <?php foreach ($data["validation"]["content"] ?? [] as $error) : ?>
                <p><?=  htmlspecialchars($error->message, ENT_QUOTES, 'UTF-8');  ?></p>
            <?php endforeach ?>
            <label for="publish_at">Saisir le date de publication
                <input type="date" name="publish_at">
            </label>
            <?php foreach ($data["validation"]["publishAt"] ?? [] as $error) : ?>
                <p><?=  htmlspecialchars($error->message, ENT_QUOTES, 'UTF-8');  ?></p>
            <?php endforeach ?>
            <input type="text" name="author" placeholder="saisir le nom de l'auteur">
            <?php foreach ($data["validation"]["author"] ?? [] as $error) : ?>
                <p><?=  htmlspecialchars($error->message, ENT_QUOTES, 'UTF-8');  ?></p>
            <?php endforeach ?>
            <label for="cover"> Importer une image de couverture
            <input type="file" name="cover">
            </label>
            <select name="categories[]" multiple size="4">
                <option disabled>
                    Selectionner les categories ...
                </option>
                <?php foreach ($data["categories"] ?? [] as $category) : ?>
                   <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Inscription" name="submit">
        </form>
        <p><?= htmlspecialchars($data["errors"] ?? "", ENT_QUOTES, 'UTF-8') ?></p>
        <p><?= htmlspecialchars($data["success"] ?? "", ENT_QUOTES, 'UTF-8') ?></p>
    </main>
</body>

</html>