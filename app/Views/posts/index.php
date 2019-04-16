<div class="row">
    <div class="col-sm-8">
        <div class="container"><h1>Billets</h1></div>
        <hr size="5" width=”100%”/>
        <?php foreach ($posts as $post) : ?>
            <div class="container">
                <h2>
                    <a href="<?= $post->url ?>"><?= $post->title ?></a>
                </h2>
                <p>
                    <em><?= $post->categorie ?></em>
                </p>
                <p>
                    <?= $post->extrait ?>
                </p>
                <hr size="5" width="50%" align=center/>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <div class="container"><h2>Catégories</h2></div>
        <ul>
            <?php foreach ($categories as $categorie) : ?>
                <li>
                    <a href="<?= $categorie->url ?>"><?= $categorie->title ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
