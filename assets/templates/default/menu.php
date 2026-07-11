<?php
$quickLinks = (object) array (
    'RGPD'    => '',
    'Cookiel' => '',
    'Terms'   => '',
    'CGU'     => '',
    'FAQs'    => ''
);

$array = array(
    'Accueil'               => 'index.php',
    'Actualités'            => 'news',
    'Forum'                 => 'forum',
    'Pages'                 => array(
        'Livre d\'or'       => 'guestbook',
        'Nos liens'         => 'links',
        'Galerie d\'images' => 'Gallery'
    )
);
?>
<nav class="navigation">
    <ul>
        <?php
        foreach ($array as $name => $link):
            if (is_array($link)) {
            ?>
            <li><a href="#">Pages</a>
                <ul>
                    <?php
                        foreach ($link as $sub_name => $sub_link):
                            echo '<li><a href="'.$sub_link.'">'.$sub_name.'</a></li>';
                        endforeach;
                    ?>
                </ul>
            </li>
            <?php
            } else {
                echo '<li><a href="'.$link.'">'.$name.'</a></li>';
            }
        ?>
        <?php
        endforeach;
        ?>
    </ul>
</nav>