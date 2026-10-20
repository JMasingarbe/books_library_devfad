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
        <section>
            <!-- Block liste des catégorie -->
            <?php foreach ($data ?? [] as $category): ?>
                <article>
                    <h2><?= $category->getId() ?></h2>
                    <p><?= $category->getName() ?></p>
                </article>
            <?php endforeach ?>
        </section>
    </main>
</body>

</html>