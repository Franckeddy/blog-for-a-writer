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
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']) ?>
    <?= $form->select('category_id', 'Catégorie', $categories) ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
<HR align=center size=8 width="50%">
<div class="row">
    <div class="col-6">
        <a href="../admincategories" class="btn btn-outline-info">Retour à l'admin.</a>
    </div>
    <div class="col-6">
        <a href="../index" class="btn btn-outline-secondary" style="float: right">Retour à l'acceuil.</a>
    </div>
</div>