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
	# Langue - USER
	#####################################
    'LOGIN_REQUIRE'                       => 'Login requis',
	'UNKNOW_USER_MAIL_PASS'               => 'Les champs nom d\'utilisateur & e-mail & mot de passe doivent être rempli',
	'NO_MAIL_ALLOWED'                     => 'Les emails jetables ne sont pas autorisés',
	'SECURE_CODE_FAIL'                    => 'Le code de sécurité est incorrect',
	'MIN_THREE_CARACTER'                  => 'Le nom d\'utilisateur est trop court, minimum 3 caractères',
	'MAX_CARACTER'                        => 'Le nom d\'utilisateur est trop long, maximum 32 caractères',
	'PASS_CONFIRM_NOT_SAME'               => 'Le mot de passe et la confirmation ne sont pas identiques',
	'CURRENT_RECORD'                      => 'Enregistrement en cours,...',
	'THIS_NAME_OR_PSEUDO_RESERVED'        => 'Ce nom d\'utilisateur est déjà réservé.',
	'THIS_MAIL_IS_ALREADY_RESERVED'       => 'Ce courriel est déjà réservé.',
	'PROFILE_UPDATE_SUCCESS'              => 'La mise à jour du profil s\'est déroulée avec succès.',
    'CHOOSE_YOUR_CONNECTION'              => 'Choisir sa connexion',
	'CHOOSE_YOUR_CASE'                    => 'Choisir son boitier',
	'CHOOSE_YOUR_KEYBOARD'                => 'Choisir son clavier',
	'COOLING'                             => 'Refroidissement',
	'CPU'                                 => 'Processeur (CPU)',
	'MOTHERBOARD'                         => 'Carte mère',
	'RAM'                                 => 'Ram',
	'GPU'                                 => 'Carte graphique (GPU)',
	'STORAGE'                             => 'Stockage',
	'PSU'                                 => 'Alimentation (PSU)',
	'SCREEN'                              => 'Marque de l\'écran',
	'OS'                                  => 'Système d\'exploitation',
	'CASE_MODEL'                          => 'Modèle de boîtier',
	'COOLING_MODEL'                       => 'Modèle de refroidissement',
	'MODEL_CPU'                           => 'Modèle processeur',
	'MOTHERBOARD_MODEL'                   => 'Modèle carte mère',
	'RAM_QUANTITY'                        => 'Quantité RAM',
	'MODEL_GPU'                           => 'Modèle carte graphique',
	'SIZE_SSD'                            => 'Taille (SSD, HDD, M2)',
	'DETAIL_PSU'                          => 'Detail du PSU',
	'RESOLUTION'                          => 'Résolution',
	'HARDWARE_UPDATE_SUCCESS'             => 'Le matériel informatique a été mis à jour.',
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
	'MAIL_OR_USERNAME'                    => 'Nom ou e-mail',
	'YOUR_MESSAGE'                        => 'Votre Message...',
	'LOGIN_ID'                            => 'Connexion identifiant',
	'MEMBER_DELETE'                       => 'Membre supprimé',
	'CODE_CAPTCHA_ERROR'                  => 'Erreur de code captcha, veuillez réessayer',
	'NO_BANS_YET'                         => 'Aucun bannissement pour l\'instant',
	'SEND_PASS_IS_OK'                     => 'Le mot de passe a été enregistré',
	'OLD_PASS_FALSE'                      => 'L\'ancien mot de passe de conrespond pas',
	'SOCIAL_UPDATE_SUCCESS'               => 'La mise à jour des liens sociaux, a été effectué avec succèss',
	'REQUESTED_PAGE_NOT_ACCESSIBLE'       => 'Il n\'est pas possible d\'accéder à la page demandée',
	'USER_DELETE_OK'                      => 'Votre compte a bien été supprimé.',
	'USER_CHANGE_AVATAR_OK'               => 'L\'avatar a été effectuer ce changement avec succès',
	'USER_DELETE_AVATAR_OK'               => 'Supression de l\'avatar avec succès',
	'USER_GRAVATAR_OK'                    => 'Changement de statut pour le Gravatar',
	'SUBJECT_HTML'                        => 'Récupération du code à valider',
	'ACCOUNT_REGISTRATION'                => 'Enregistrement du compte',
	'SERIAL_ACTIVE'                       => 'Clé d\'activation',
	'ACTIVE_TO_SERIAL'                    => 'Voici la clé de sécurité pour activer votre compte.',
);
foreach ($array as $constant => $value) {
	if (!defined($constant)) {
		define($constant, $value); unset($array);
	}
}