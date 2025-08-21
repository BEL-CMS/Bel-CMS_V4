<section id="belcms_downloads">
    <div class="row row-cols-1 row-cols-md-3 g-4">
<?php
foreach ($data as $data):
    if (is_file(constant('ROOT_DOC').$data->screen)) {
        $img = $data->screen;
        $img = '<img src="'.$img.'" class="card-img-top belcms_downloads_img_cat" alt="image '.$data->name.'">';
    } else {
        $img = 'assets/img/no_img_fullwide.webp';
        $img = '<img src="'.$img.'" class="card-img-top" alt="image no image">';
    }
?>
    <div class="col">
        <div class="card h-100">
            <?= $img; ?>
            <div class="card-body">
                <h5 class="card-title"><?= $data->name; ?></h5>
                <p class="card-text"><?= $data->description; ?></p>
            </div>
            <div class="card-footer">
                <button type="button" onclick="location.href='downloads/viewdl/<?= $data->id; ?>'" class="btn btn-info">Descriptif</button>
            </div>
        </div>
    </div>
<?php
endforeach;
?>
    </div>
</section>