<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script>tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],

        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | bullist numlist | outdent indent blockquote | undo redo | anchor | forecolor backcolor",


        menubar: false,
        toolbar_items_size: 'small',

        height: 500,
    });
</script>
<form method="post">
    <?= $form->input('title', 'Titre de l\'article') ?>
    <?= $form->input('date', 'Date de création') ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']) ?>
    <?= $form->select('category_id', 'Catégorie', $categories) ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
