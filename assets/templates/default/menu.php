<?php
$array = array(
    'Accueil'               => 'index.php',
    'Actualités'            => 'news',
    'Forum'                 => 'forum',
    'Pages'                 => array(
        'Livre d\'or'       => 'guestbook',
        'Nos liens'         => 'links',
        'Galerie d\'images' => 'Gallery',
        'Nos membres'       => 'Members'
    )
);
?>
<nav>
    <ul class="no-list-style">
    <?php
    foreach ($array as $name => $link):
        if (is_array($link)) {
        ?>
        <li><a href="#">Pages <i class="fa-solid fa-caret-down"></i></a>
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