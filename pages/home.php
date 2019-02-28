<div class="row">
    <div class="col-sm-8">

        <?php foreach (App\Table\Billet::getLast() as $post): ?>

            <h2>
                <a href="<?= $post->url; ?>"><?= $post->title; ?></a>
            </h2>
            <p>
                <em><?= $post->categorie; ?></em>
            </p>
            <p>
                <?= $post->extrait; ?>
            </p>

        <?php endforeach; ?>

    </div>

    <div class="com-sm-4">
        <ul>

            <?php foreach (App\Table\Categorie::All() as $categorie): ?>
                <li>
                    <a href="<?= $categorie->url; ?>"><?= $categorie->title; ?></a>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>

</div>

