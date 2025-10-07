<section id="belcms_downloads">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">
                    Nom
                </th>
                <th scope="col">
                    Taille
                </th>
                <th scope="col">
                    Date
                </th>
                <th scope="col">
                    Vu
                </th>
                <th scope="col">
                    Télécharger
                </th>
            </tr>
        </thead>
        <tbody>
            <?php

            use BelCMS\Requires\Common;

            foreach ($data as $data):
                if (is_file($data->screen)) {
                    $img = $data->screen;
                    $img = '<img src="' . $img . '" class="card-img-top" alt="image ' . $data->name . '">';
                } else {
                    $img = 'assets/img/no_img_fullwide.webp';
                    $img = '<img src="' . $img . '" class="card-img-top" alt="image no image">';
                }
                $size = Common::ConvertSize($data->size);
            ?>
                <tr>
                    <td><?= $data->name; ?></td>
                    <td><?= $size; ?></td>
                    <td><?= Common::TransformDate($data->date, 'FULL', 'MEDIUM'); ?></td>
                    <td><?= $data->view; ?></td>
                    <td><?= $data->dls; ?></td>
                    <td><a class="btn btn-secondary belcms_btn_downloads" href="downloads/viewdl/<?= $data->id; ?>">Voir</a></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</section>