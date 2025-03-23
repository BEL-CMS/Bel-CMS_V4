<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.0 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2025 Bel-CMS
 * @author as Stive - stive@determe.be
*/

if (!defined('CHECK_INDEX')):
	header($_SERVER['SERVER_PROTOCOL'] . ' 403 Direct access forbidden');
	exit('<!doctype html><html><head><meta charset="utf-8"><title>BEL-CMS : Error 403 Forbidden</title><style>h1{margin: 20px auto;text-align:center;color: red;}p{text-align:center;font-weight:bold;</style></head><body><h1>HTTP Error 403 : Forbidden</h1><p>You don\'t permission to access / on this server.</p></body></html>');
endif;

$array = array(
	#####################################
	# Langue - DEFAUT
	#####################################
    'SUCCESS'                             => 'Succès',
	'ERROR'                               => 'Erreur',
	'WARNING'                             => 'Alert',
	'INFO'                                => 'Information',
	'ALERT_INFOS'                         => 'Alert ! Information requis',
	'DEFAULT_AVATAR'                      => 'assets/img/default_avatar.jpg',
	'CAPTCHA'                             => 'Captcha',
	'CODE_CAPTCHA_ERROR'                  => 'Erreur du code Captcha !',
	'CODE_CAPTCHA_TIME'                   => 'Veuillez patienter avant l\'envoi d\'un nouveau message',
	'ERROR_UNKNOW'                        => 'Erreur inconnue du Captcha',
	'SEND_MAIL_VALID'                     => 'Envoie de votre code de validation par e-mail',
	'DEL_USERS'                           => 'Votre compte a bien été supprimé',
	'ERROR_SERIAL_OR_NAME'                => 'L\'email ou la clé d\'activation est incorrecte',
	'USER_CREATE_ACTIVED'                 => 'Votre compte a bien été activé',
	'NOT_EXISTS'                          => 'L\'utilisateur n\'existe pas',
	'CONNECTION_SUCCESSFULLY'             => 'connexion effectué avec succès',
	'USERS'                               => 'Utilisateur',
	'LOGIN_IN_PROGRESS'                   => 'Login en cours...',
	#####################################
	# Fichier lang en français - Social
	#####################################
	'FACEBOOK'                            => 'Facebook',
	'YOUTUBE'                             => 'YouTube',
	'WHATSAPP'                            => 'Whatsapp',
	'INSTAGRAM'                           => 'Instagram',
	'MESSENGER'                           => 'Messenger (Meta)',
	'TIKTOK'                              => 'TikTok',
	'SNAPCHAT'                            => 'SnapChat',
	'TELEGRAM'                            => 'Telegram',
	'PINTEREST'                           => 'Pinterest',
	'X_TWITTER'                           => '(X) Twitter',
	'REDDIT'                              => 'Reddit',
	'LINKEDIN'                            => 'LinkedIn',
	'SKYPE'                               => 'Skype',
	'VIBER'                               => 'Viber',
	'TEAMS_MS'                            => 'Teams ms',
	'DISCORD'                             => 'Discord',
	'TWITCH'                              => 'Twitch',
	#####################################
	# COLOR
	#####################################
	'RED'                                 => 'Rouge',
	'BLUE'                                => 'Bleu',
	'YELLOW'                              => 'Jaune',
	'GREEN'                               => 'Vert',
	'GREY'                                => 'Gris',
	#####################################
	# POSITION
	#####################################
	'TOP'                                 => 'Haut',
	'RIGHT'                               => 'Droit',
	'BOTTOM'                              => 'Bas',
	'LEFT'                                => 'Gauche',
	#####################################
	# Fichier lang en français - Pages BAN
	#####################################
	'BAN'                                 => 'Bannissement',
	'DATE_OF_BAN'                         => 'Durée du bannissement',
	'BEGINNING_OF_BAN'                    => 'Début du bannissement',
	'DATE_OF_FNISH'                       => 'Fin du bannissement',
	'DFNISH'                              => 'Fini',
	'YOU_ARE_BANNED'                      => 'Vous êtes banni',
	#####################################
	# Fichier lang en français - Pages BAN DUREE
	#####################################
	'LIFE'                                => 'A vie',
	'ONE_MINUTE'                          => '1 Minute',
	'FIVE_MINUTES'                        => '5 Minute',
	'FIFTEEN_MINUTES'                     => '15 Minutes',
	'THIRTY_MINUTES'                      => '30 Minutes',
	'ONE_O_CLOCK'                         => '1 Heure',
	'THREE_O_CLOCK'                       => '3 Heures',
	'SIX_O_CLOCK'                         => '6 Heures',
	'TWELVE_O_CLOCK'                      => '12 Heures',
	'A_DAY'                               => '1 Jour',
	'ONE_WEEK'                            => '1 Semaine',
	'TWO_WEEK'                            => '2 Semaines',
	'A_MONTH'                             => '1 Mois',
	'THREE_MONTHS'                        => '3 Mois',
	'SIX_MONTHS'                          => '6 Mois',
	'ONE_YEAR'                            => '1 An',
	'FIVE_YEARS'                          => '5 Ans',
	'TEN'                                 => '10 ans',
	'PT1M'                                => '1 Minute',
	'PT5M'                                => '5 Minutes',
	'PT10M'                               => '10 minutes',
	'PT15M'                               => '15 Minutes',
	'PT30M'                               => '30 Minutes',
	'PT1H'                                => '1 Heure',
	'PT3H'                                => '3 Heures',
	'PT6H'                                => '6 Heures',
	'PT12H'                               => '12 Heures',
	'P1D'                                 => '1 Jour',
	'P7D'                                 => '1 Semaine',
	'P14D'                                => '2 Semaines',
	'P1M'                                 => '1 Mois',
	'P3M'                                 => '3 Mois',
	'P6M'                                 => '6 Mois',
	'P1Y'                                 => '1 An',
	'P5Y'                                 => '5 Ans',
	'P10Y'                                => '10 ans',
	'P99Y'                                => 'À vie',
	#####################################
	# LANG
	# ###################################
	'FRENCH'                              => 'fr',
	'ENGLISH'                             => 'eng',
	'NETHERLANDS'                         => 'nl',
	'DEUTCH'                              => 'de',
	'FR_LANG'                             => 'français',
	'FR_ENGLISH'                          => 'english',
	#####################################
	# LANG USER
	# ###################################
	'USERNAME'                            => 'Nom d\'utilisateur',
	'BIRTHDAY'                            => 'Anniversaire',
	'COUNTRY'                             => 'Pays',
	'DESCRIPTION'                         => 'Description',
	'LOCATION'                            => 'Emplacement',
	'GENDER'                              => 'Genre',
	'COPYRIGHT'                           => '<a href="https://bel-cms.dev" style="display: none;">Bel-CMS</a>',
	#####################################
	# USER
	#####################################
	'FEMALE'                              => 'Femme',
	'MALE'                                => 'Homme',
	'UNISEXUAL'                           => 'Unisexe',
	'NO_SPEC'                             => 'Non spécifié',
	'NOSPEC'                              => 'Non spécifié',
	'MEMBER'                              => 'Membre',
	'MEMBERS'                             => 'Membres',
	'PSEUDO'                              => 'Pseudo',
	'ABOUT'                               => 'À propos',
	'MY_AVATAR'                           => 'Mes avatars',
	'AVATAR'                              => 'Avatar',
	'AVATARS'                             => 'Avatars',
	'REGISTRATION'                        => 'Enregistrement',
	'LOGIN'                               => 'Se connecter',
	'NAME_MAIL_PASS'                      => 'Veuillez entrer votre email ou votre nom d\'utilisateur et votre mot de passe',
	'MAIL_PASS_PRIVATE'                   => 'Veuillez entrer votre email prive lors de l\'inscription et votre mot de passe',
	'NAME_MAIL_TOKEN'                     => 'Veuillez entrer votre email ou votre nom d\'utilisateur et votre token envoyé par e-mail.',
	'TOKEN'                               => 'Token envoyé normalement par mail',  
	'PRIVATE_MAIL'                        => 'Entrer votre mail d\'enregistrement',
	'RECOVERING_MY_PASS'                  => 'Récupération de mon mot de passe',
	'RECOVERY'                            => 'Récupération',
	'INFO_REGISTRATION'                   => 'Veuillez saisir toutes les informations pour vous inscrire',
	'LOGIN_ADMIN'                         => 'Login administration',
	'BANISHMENT'                          => 'Bannissement',
	'IPV4_IPV6'                           => 'IPV4 - IPV6',
	'SERIAL_ADMIN_NO_VALID'               => 'Le Numéro de série de l\'Administrateur est faux !',
	'NAME_ADMIN_GOLD'                     => 'Vous devez être un Administrateur Gold ou avoir une clé de sécurité fournie à l\'installation.',
	'IPV4_IPV6_NO_VALID'                  => 'IPV4 - IPV6 non valide.',
	'EMAIL_USER_BAN'                      => 'L\'email renseigne est invalide.',
	'IMPOSSIBLE_TO_BAN_YOURSELF'          => 'Impossible de se bannir soi-même.',
	'EMAIL_USER'                          => 'E-mail renseigné',   
	'NO_TEXT_DEFINED'                     => 'Le texte n\'est pas definit',
	'SESSION_COOKIES_DELETE'              => 'Votre session et vos cookies de ce site sont effacés',
	'ACCOUNT_BLOCKED_REQUEST_NEW_PASS'    => 'Par mesure de sécurité, votre compte est bloqué, veuillez demander un nouveau mot de passe.',
	'ACCOUNT_BLOCKED_ONE'                 => 'Vous êtes banni temporairement, de 1 minutes, suite à de trop nombreuses tentatives de mot de passe.',
	'ACCOUNT_BLOCKED_FIVE'                => 'Vous êtes banni temporairement, de 5 minutes, suite à de trop nombreuses tentatives de mot de passe.',
	'ACCOUNT_BLOCKED_TEN'                 => 'Vous êtes banni temporairement, de 10 minutes, suite à de trop nombreuses tentatives de mot de passe.',
	'ACCOUNT_BLOCKED_FIFTEEN'             => 'Vous êtes banni temporairement, de 15 minutes, suite à de trop nombreuses tentatives de mot de passe.',
	'ACCOUNT_BLOCKED_THIRTY'              => 'Vous êtes banni temporairement, de 30 minutes, suite à de trop nombreuses tentatives de mot de passe.',
	'ACCOUNT_BLOCKED_TWELVE'              => 'Vous êtes banni temporairement, de 12 heures, suite à de trop nombreuses tentatives de mot de passe.',
	'ACCOUNT_BLOCKED_ONE_HOUR'            => 'Vous êtes banni temporairement, de 1 heures, suite à de trop nombreuses tentatives de mot de passe.',
	'ACCOUNT_BLOCKED_TWENTY_FOUR'         => 'Vous êtes banni temporairement, de 1 jour, suite à de trop nombreuses tentatives de mot de passe.',
	'ACCOUNT_BLOCKED_LIFE'                => 'Vous êtes banni definitivement, suite à de trop nombreuses tentatives de mot de passe.',
	'VALIDATION_REQUIRED'                 => 'Validation requise',
	'CONNECTION_SUCCESSFULLY'             => 'La connexion a été effectuée avec succès.',
	'WRONG_USER_PASS'                     => 'Mauvaise combinaison de Pseudonyme-email et/ou mot de passe.',
	'NO_USER_WITH_USER_AND_MAIL'          => 'Aucun utilisateur avec ce nom et/ou mail.',
	'NAME_OR_PASS_REQUIRED'               => 'Le nom ou le mot de passe est obligatoire.',
	#####################################
	# Langue - DEFAUT - Administration
	#####################################
	'FILE_NO_FOUND'                       => 'Fichier non trouvé',
	'FILE'                                => 'Fichier',
	'NO_FOUND'                            => 'non trouvé',
	'FILE_MODELS_NO_FOUND'                => 'Models non trouvé',
	'ERROR_FILE'                          => 'Erreur de fichier',
	'UNLISTED'                            => 'Non répertorié',
	'THE_REQUESTED_SUBPAGE'               => 'La sous-page demandé ',
	'IS_NOT_AVAILABLE_ON_THE_PAGE'        => 'n\'est pas disponible dans la page',
	'LOGGED_IN_TO_ADMIN'                  => 'S\'est connecté à l\'administration',
	'AUTHORIZED_ACCESS'                   => 'Accès autorisé',
	'UNAUTHORIZED_ACCESS'                 => 'Accès refusé',
	'TRY_TO_CONNECT_WHIT_ANOTHER_HASHKEY' => 'À tenter de se connecter avec un autre Hash Key !',
	'HASHKEY_DOES_NOT_MATCH_YOURS'        => 'Hash_key ne correspond pas au vôtre ?...',
	'ATTEMPTED_ACCESS_WHIT_WRONG_PASS'    => 'Tentative d\'accès avec un mauvais mot de passe !',
	'THE_PASS_IS_NOT_CORRECT'             => 'Le mot de passe n\'est pas le bon !!!',
	'ONE_PAGE'                            => 'à la page',
	'SETTING'                             => 'paramètre',
	'ACCESS_TO_CONTROLLER_IMPOSSIBLE'     => 'Accès au controller impossible',
	'PLEASE_ENTER_YOUR_MAIL'              => 'Veuillez entrer votre e-mail',
	'INVALID_ID'                          => 'ID non valide',
	'MOBILE'                              => 'Mobile',
	'SEARCH'                              => 'Rechercher',
	'MAX_UPLOADS'                         => 'Max taille Upload',
	'LOGIN_IN_FAIL_MAIL'                  => 'L\'e-mail renseigné n\'est pas le vôtre',
	'PAGE_UNKNOW'                         => 'Page de l\'Administration inconnue',
	'UNKNOWN_PAGE'                        => 'Page inconnu...',
	'ERROR_LAYOUT'                        => 'il y a un soucis avèc le layout',
	'USER_UNKNOW'                         => 'Utilisateur supprimé',
	'ADMINISTRATOR'                       => 'Administrateur',
);
foreach ($array as $constant => $value) {
	if (!defined($constant)) {
		define($constant, $value); unset($array);
	}
}