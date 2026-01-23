<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

 ?>
<div id="main_content">
    <div class="main_content">
        <ul id="check">
            <?php
            foreach (createDirAll() as $key => $value):
                echo $value;
            endforeach;
            ?>
        </ul>
    </div>
	<nav aria-label="Page navigation">
		<ul class="pagination justify-content-end">
			<li class="page-item">
				<a class="page-link" href="index.php?page=check">Précédant</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="index.php?page=pdo">Suivant</a>
			</li>
		</ul>
	</nav>
</div>