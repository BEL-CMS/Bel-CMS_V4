<?php use BelCMS\Core\User; ?>
<div class="nav-holder">
	<div class="nav-holder-wrap but-hol">
		<div class="nav-container fl-wrap">
			<!-- nav -->
			<nav class="nav-inner" id="menu">
				<ul>
					<li><a href="index.php">Home</a></li><li>
						<a href="#">Pages</a>
						<ul>
							<li><a href="Downloads" title="Downloads">Téléchargements</a></li>
							<li><a href="Members" title="Members">Membres</a></li>
							<li><a href="Forum" title="Forum">Forum</a></li>
							<li><a href="Guestbook" title="Guestbook">Livre d'or</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Utilisateur</a>
						<ul>
							<?php
							if (User::isLogged()):
							?>
							<li><a href="User/Profil" title="profils">Profile</a></li>
							<li><a href="Mails" title="Mails">Messagerie</a></li>
							<li><a href="User/security" title="password">Mot de passe</a></li>
							<li><a href="User/social" title="link social">Liens Socials</a></li>
							<li><a href="User/logout" title="logout">Déconnexion</a></li>
							<?php
							else:
							?>
							<li><a href="User/login&echo" title="Login">Login</a></li>
							<li><a href="User/register&echo" title="registred">Enregistrement</a></li>
							<?php
							endif;
							?>
						</ul>
					</li>
					<li>
						<a href="Articles" title="Articles">Articles</a>
					</li>
				</ul>
			</nav>
			<!-- nav end-->
		</div>
		<div class="nav-footer"><span>&#169; Bel-CMS 2015 / <?=date("d-m-Y H:i:s");?>  /  All rights reserved. </span></div>
		<div class="nav-holder-wrap_line"></div>
		<div class="nav-holder-wrap_dec"></div>
	</div>
</div>
<div class="nav-overlay"></div>