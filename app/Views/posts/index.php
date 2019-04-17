<div class="row">
    <div class="col-sm-8" style="padding-top: 1em">
        <div class="container"><h2>Billets</h2></div>
        <hr/>
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
    <div class="col-sm-4" style="padding: 1em">
        <div class="container"><h2>Catégories</h2></div>
        <hr/>
        <ul>
            <?php foreach ($categories as $categorie) : ?>
                <li>
                    <a href="<?= $categorie->url ?>"><?= $categorie->title ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
