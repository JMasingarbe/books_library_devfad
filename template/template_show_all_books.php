<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="/assets/main.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <?php include 'component/navbar.php'; ?>
    <main class="container-fluid">
        <h1 id="books-title">Liste des livres</h1>
        <?php if (empty($data)): ?>
            <p>Aucun livre disponible.</p>
        <?php endif; ?>
        <section class="books-grid" aria-labelledby="books-title">
            <!-- Block liste des livres -->
            <?php foreach ($data ?? [] as $book): ?>
                <article class="book-card">
                    <h2><?= htmlspecialchars($book->getTitle() ?? '', ENT_QUOTES, 'UTF-8') ?></h2>
                    <p>Auteur : <?= htmlspecialchars($book->getAuthor() ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                    <?php if ($book->getCover()): ?>
                        <img
                            class="book-cover"
                            src="/assets/img/cover/<?= htmlspecialchars($book->getCover(), ENT_QUOTES, 'UTF-8') ?>"
                            alt="Couverture de <?= htmlspecialchars($book->getTitle() ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    <?php endif; ?>
                    <p><?= htmlspecialchars($book->getContent() ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                    <p>Date de publication : <?= htmlspecialchars($book->getPublishAt()?->format('d/m/Y') ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                    <?php if ($book->getCategories()): ?>
                        <ul>
                            <?php foreach ($book->getCategories() as $category): ?>
                                <li><?= htmlspecialchars($category->getName() ?? '', ENT_QUOTES, 'UTF-8') ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <form action="/lending/new" method="post">
                        <input type="text" name="book_id" value="<?= htmlspecialchars($book->getId() ?? '', ENT_QUOTES, 'UTF-8') ?>" hidden>
                        <input type="text" name="csrf_token" value="<?= htmlspecialchars($_SESSION["csrf_token"], ENT_QUOTES, 'UTF-8') ?>" hidden>
                        <button type="submit">Emprunter</button>
                    </form>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>
