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

use BelCMS\Requires\Common;

Common::constant(array(
	#####################################
	# Fichier lang en français - Pages
	#####################################
	'ADDED_AN_ARTICLE'            => 'Ajouté un article',
	'ADD_DOWNLOADS'               => 'Ajouté un téléchargement',
	'CONFIRM_DELETE'              => 'Confirmer la suppression : ',
	'DEL_CONFIRM'                 => 'Confirmer la suppression',
	'ACCESS_TO_ADMIN'             => 'Accès aux administrateurs',
	'ACCESS_TO_GROUPS'            => 'Accès aux groupes',
	'TO_REGISTER'                 => 'Enregistrer',
	'PARAMETER_EDITING_SUCCESS'   => 'Édition des paramètre avec succès',
	'EDIT_PARAM_ERROR'            => 'Erreur lors de la sauvegarde des paramètre',
	'ACTIVE_WIDGETS'              => 'Activer le widget',
	'EDIT_PARAM_SUCCESS'          => 'Édition des paramètres avec succès',
	'DROP_FILES_CLICK_OR_UPLOADS' => 'Déposez les fichiers ici ou cliquez pour télécharger.',
	'SEND_FILES'                  => 'Envoyer les fichiers',
	'DEL_BDD_ERROR'               => 'Erreur lors du transfert en base de données',
	'SEND_BDD_PARTIEL'            => 'Envoie en base de données partiellement',
	'NO_CATEGORY'                 => 'Aucune catégorie',
	'NO_ACCESS_ADMIN'             => 'Cette page n\'est accessible qu\'aux administrateurs de premier niveau.',
	'EDITING_SUCCESS'             => 'Édition effectue avec succès',
	'EDIT_ERROR'                  => 'Erreur lors de la sauvegarde ou rien à changer dans le formulaire.',
	'ID_ERROR'                    => 'ID Incorrecte, un message sera transmis aux administrateurs',
	'ID_ERROR_TITLE'              => 'ID Incorrecte',
	'ID_ERROR_MSG'                => 'L\'utilisateur a donné une ID qui n\' est pas valide',
	'DEL_SUCCESS'                 => 'Effacement effectué avec succès.',
	'DEL_ERROR'                   => 'Erreur lors de la suppression',
	'ERROR_NO_DATA'               => 'Aucune donnée transmise',
	'CATEGORY'                    => 'Catégories',
	'SEND_EDIT_SUCCESS'           => 'Édition a été effectuée avec succès',
	'ACTIVE'                      => 'Activer',
	'CAT_IS_REQUIRED'             => 'Une catégorie est obligatoire.',
	'QUESTION'                    => 'Question',
	'SEND_SUCCESS'                => 'Insertion en base de donnée avec succès',
	'EMPTY_NAME'                  => 'Aucun nom transmis ?',
	'NEW'                         => 'Nouveau',
	'ARRANGEMENT'                 => 'Disposition',
	'DEL_FILE_SUCCESS'            => 'Fichier supprimé avec succès',
	'UNKNOW_MODELS'               => 'Fichier models manquant.',
	'SAVE_BDD_SUCCESS'            => 'Sauvegarde effectuée avec succès',
	'SAVE_BDD_ERROR'              => 'Données corrompues, la sauvegarde n\'a pas eu lieu',
	#####################################
	# UPLOAD
	#####################################
	'UPLOAD_ERROR'                        => 'Echec de l\'upload !',
	'UPLOAD_ERROR_FILE'                   => 'Vous devez uploader un fichier de type prédéfini.',
	'UPLOAD_ERROR_SIZE'                   => 'Le fichier est trop volumineux',
	'UPLOAD_FILE_SUCCESS'                 => 'Upload effectué avec succès.',
	'UPLOAD_NONE'                         => 'Aucun fichier en upload',
	'UPLOAD'                              => 'Télécharger',
	'SIZE'                                => 'Taille',
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
	# Nom des modules
	#####################################
	'NEWS'                                => 'Actualités',
	'ARTICLE'                             => 'Article',
	'HOME'                                => 'Accueil',
	'BLOG'                                => 'Blog',
	'DOWNLOADS'                           => 'Téléchargements',
	'FORUM'                               => 'Forum',
	'USER'                                => 'Utilisateur',
	'USERS'                               => 'Utilisateurs',
	'COMMENTS'                            => 'Commentaires',
	'COMMENT'                             => 'Commentaire',
	'READMORE'                            => 'Lire la suite',
	'NEWTHREAD'                           => 'Nouveau Post',
	'MAILS'                               => 'Boîte de réception',
	'MANAGEMENTS'                         => 'Administration',
	'GUESTBOOK'                           => 'Livre d\'or',
	'DONATIONS'                           => 'Don',
	'GALLERY'                             => 'Galerie d\'images',
	'FAQ'                                 => 'Foire aux questions',
	'FILE_MANAGER'                        => 'Geiers',
	'ARTICLES'                            => 'Articles',
	'LINKS'                               => 'Liens',
	'SURVEY'                              => 'Sondages',
	'MARKET'                              => 'Boutique',
	'PRICING'                             => 'Tarifs',
	#####################################
	# Nom Administration
	#####################################
	'ADMINISTRATORS'                      => 'Administrateur',
	'MEMBERS'                             => 'Membres',
	'CMS_VALIDATION'                      => '',
	'GROUP_NAME_RESERVED'                 => 'Le nom est réservé.',
	'NO_ACCESS_GROUP_PAGE'                => 'Vous n\'avez pas les autorisations nécessaires pour consulter cette page .',
	'ADD'                                 => 'Ajouter',
	'VALID_SUCCESS'                       => 'Validation du lien effectué avec succès',
));