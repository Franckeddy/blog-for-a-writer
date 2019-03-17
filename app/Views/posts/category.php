<div class="row">
    <div class="col-sm-8">
        <?php
		if ($billets )
		{foreach ($billets as $post): ?>
                <h2>
                    <a href="<?= $post->url; ?>"><?= $post->title; ?></a>
                </h2>
                <p>
                    <em><?= $post->categorie; ?></em>
                </p>
                <p>
                    <?= $post->extrait; ?>
                </p>
            <?php endforeach;
        }
        else echo '<h4>Aucun article dans cette rubrique</h4>';
        ?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach ($categories as $categorie): ?>
                <li>
                    <a href="<?= $categorie->url; ?>"><?= $categorie->title; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>