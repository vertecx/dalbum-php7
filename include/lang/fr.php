<?php

/*  DAlbum French language support file
    
    Traduction par Jean-Luc Lacroix 30 août 2005.
    
    (c) Copyright 2003 by DeltaX Inc.
     
    Permission is hereby granted, free of charge, to any person obtaining a
    copy of this software and associated documentation files (the "Software"),
    to deal in the Software without restriction, including without limitation
    the rights to use, copy, modify, merge, publish, distribute, sublicense,
    and/or sell copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included
    in all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
    OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    ITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
    DEALINGS IN THE SOFTWARE.
*/

$newlang=array(

    ///////////////////////////////
    // Index.php
    ///////////////////////////////
    'loginBtn'          => 'Connexion',
    'loginBtnTitle'     => 'Connexion',

    'logoutBtn'         => 'D&eacute;connexion',
    'logoutBtnTitle'    => 'D&eacute;connexion',

    'reindexBtn'        => 'R&eacute;indexer',
    'reindexBtnTitle'   => 'R&eacute;pertorie les nouvelles images dans la base de donn&eacute;es DAlbum',

    'usrmgrBtn'         => 'Utilisateurs',
    'usrmgrBtnTitle'    => 'Ajout/Suppression des utilisateurs et gestion des mots de passe',

    'closeWindowBtn'    => 'Fermer la fen&ecirc;tre',
    'closeWindowBtnTitle'=> 'Fermeture de cette fen&ecirc;tre',

    'fullScreenBtn'         => 'Plein-&eacute;cran',
    'fullScreenBtnTitle'    => 'Ouvrir cette page en mode plein écran. Ou bien raccourci clavier F11',

    'editDefBtn'            => 'Editer',
    'editDefBtnTitle'       => 'Editer le titre de l&rsquo;album, commenter et g&eacute;rer les images',

    'indexUsername'         => 'Utilisateur:',
    'page'                  => 'Affichage des &eacute;l&eacute;ments #begin# &agrave; #end# sur un total de #count#. &nbsp; Page: &nbsp;',
    'noimages'              => 'Aucune image',
    'noPublicImages'        => 'Aucune image publique disponible Connectez-vous SVP.',
    'noscript'              => 'D&eacute;sol&eacute;, le dossier ne peut &ecirc;tre vu qu&rsquo;avec un navigateur supportant Javascript.<br /><br />Allez dans les options de votre navigateur et activez le Javascript pour ce site.',

    'prevPageBtn'           => 'Pr&eacute;c&eacute;dent',
    'prevPageBtnTitle'      => 'Page pr&eacute;c&eacute;dente (#page#)',

    'nextPageBtn'           => 'Suivant',
    'nextPageBtnTitle'      => 'Page suivante (#page#)',

    'statusLeft'            => '<b>#TotalImages#</b> images dans <b>#TotalAlbums#</b> albums',
    'statusRight'           => '<a href="http://www.dalbum.org">G&eacute;n&eacute;r&eacute; par DAlbum #version# &copy; 2003 DeltaX Inc. en #elapsed# s</a>',

    // Common stuff
    'mainPage'              => 'Page principale',
    'username'              => 'Utilisateur:',
    'password'              => 'Mot de passe:',
    'bytes'                 => 'octets',
    'KB'                    => 'KO',
    'MB'                    => 'MO',
    'pixels'                => 'pixels',
    'errorReturn'           => 'Retourner &agrave; la page pr&eacute;c&eacute;dente',

    /// Login.php
    'loginTitle'            =>  'Connecter &agrave; #title#',

    'loginAuthError'        =>  'Erreur d&rsquo;authentification',
    'loginBadUserName'      =>  'Nom d&rsquo;utilisateur ou mot de passe non-valide',
    'loginAgain'            =>  'Connectez-vous &agrave; nouveau',
    'loginNoCookiesWarning' =>  '<hr><b>Attention: Les cookies ne sont pas actifs!</b> Pour continuer, veuillez activer les cookies dans les options de votre navigateur et rechargez cette page.<br /><hr>',
    'loginLoginBtn'         => 'Connexion',
    'loginCancelBtn'        => 'Annuler',

    // pass.php
    'passTitle'             => 'Gestion des utilisateurs',
    'passUserExists'        => 'L&rsquo;utilisateur #user# existe d&eacute;j&agrave;.',
    'passNotMatch'          => 'Mots de passe ne concordent pas.',
    'passNoUserSelected'    => 'Aucun utilisateur choisi.',
    'passNoAdminDelete'     => 'Le compte administrateur maître ne peut &ecirc;tre effac&eacute;!',
    'passWriteError'        => 'Impossible d&rsquo;ouvrir le fichier des mots de passe.',
    'passError'             => '<b>Erreur: </b>#error#',
    'passAddBtn'            => 'Ajout',
    'passDeleteBtn'         => 'Suppression',
    'passChangePwdBtn'      => 'Changer le mot de passe',
    'passCloseBtn'          => 'Fermer',
    'passCancelBtn'         => 'Annuler',

    'passAddUserDlgTitle'   => 'Ajouter utilisateur',
    'passChangePwdDlgTitle' => 'Changer le mot de passe',
    'passConfirmPassword'   => 'Confirmer le mot de passe:',

    // showimg.php
    'showPrevBtn'           => 'Pr&eacute;c&eacute;dente',
    'showPrevBtnTitle'      => 'Voir image pr&eacute;c&eacute;dente',

    'showNextBtn'           => 'Suivante',
    'showNextBtnTitle'      => 'Voir image suivante',

    'showIndexBtn'          => 'Index',
    'showIndexBtnTitle'     => 'Retour &agrave; l&rsquo;index',

    'showImageBtn'          => 'Voir image',
    'showImageBtnTitle'     => 'Voir image dans une nouvelle fen&ecirc;tre',

    'showHiResBtn'          => 'Image originale (#size#)',
    'showHiResBtnTitle'     => 'Voir image originale en haute r&eacute;solution dans une autre fen&ecirc;tre',

    'showShowDetailsBtn'        => 'Voir d&eacute;tails',
    'showShowDetailsBtnTitle'   => 'Voir les d&eacute;tails EXIF de l&rsquo;image: date, vitesse d&rsquo;ouverture, etc. (si disponible)',

    'showHideDetailsBtn'        => 'Cacher les d&eacute;tails',
    'showHideDetailsBtnTitle'   => 'Cacher les d&eacute;tails EXIF de l&rsquo;image',

    'showRotateBtn'             => 'Pivoter',
    'showRotateBtnTitle'        => 'Pivoter l&rsquo;image de 90 degrees dans le sens horaire',

    'showUpdateBtn'             => 'Actualiser',
    'showUpdateBtnTitle'        => 'R&eacute;g&eacute;n&egrave;re l&rsquo;image redimensionn&eacute;e et son onglet',

    'showExifFilename'          => 'Nom du fichier: ',
    'showExifFilesize'          => 'Taille du fichier: ',
    'showExifResolution'        => 'R&eacute;solution: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Date: ',
    'showExifCamera'            => 'Mod&egrave;le de cam&eacute;ra: ',
    'showExifISO'               => 'ISO: ',
    'showExifExposure'          => 'Exposition: ',
    'showExifAperture'          => 'Ouverture: ',
    'showExifFocalLength'       => 'Longueur de focale: ',
    'showExifFlashYes'          => 'Oui',
    'showExifFlashNo'           => 'Non',
    'showExifFlash'             => 'Flash utilis&eacute;: ',
    'showExifDialogTitle'       => 'D&eacute;tails de l&rsquo;image originale',

    'showImageTitleImage'       => 'Cliquer pour image suivante: #image#',
    'showImageTitleIndex'       => 'Cliquer pour retourner &agrave; l&rsquo;index de l&rsquo;album',


    // edit*.php
    'editTitle'                 => 'Editer #filename#',
    'editDlgTitle'              => 'Fichier des param&egrave;tres de l&rsquo;album',
    'editFileLocation'          => 'Emplacement du fichier',

    'editEditAsTextBtn'         => 'Editer comme du texte',
    'editEditAsTextBtnTitle'    => 'Editer ce fichier comme un fichier normal de texte',
    'editReindexNote'           => 'Note: vous devrez r&eacute;-indexer l&rsquo;album apr&egrave;s avoir chang&eacute; les param&egrave;tres de redimensionnement',

    'editAlbumTitle'            => 'Titre de l&rsquo;album:',
    'editAlbumDate'             => 'Date:',
    'editAlbumComment'          => 'Commentaire:',
    'editAlbumTitleImage'       => 'Titre de l&rsquo;image:',
    'editAlbumDefault'          => 'Album par d&eacute;faut',
    'editAlbumUsers'            => 'Utilisateurs autoris&eacute;s:',
    'editAlbumUsersNote'        => '(liste s&eacute;par&eacute;e par des virgules, cha&icirc;ne de caract&egrave;res vide ou <b>tous</b> = acc&egrave;s anonyme, <b>utilisateur valide</b>=n&rsquo;importe quel utilisateur authentifi&eacute;)',

    'editCancelBtn'             => 'Annuler',
    'editSaveBtn'               => 'Sauvegarder',

    'editThumbLink'             => '#filename# (ouverture dans une nouvelle fen&ecirc;tre)',
    'editImgFilename'           => 'Nom du fichier<br /><small>(changer pour renommer, effacer pour supprimer)</small>:',
    'editImgTitle'              => 'Titre:',
    'editImgComment'            => 'Commentaire:',
    'editImgResize'             => 'Redimensionner l&rsquo;image',
    'editNewFileMessage'        => '( nouveau fichier )',
    'editTop'                   => 'Haut',

    'editRenameError'           => 'Impossible de changer pour le nom #filename# - car extension de fichier non-valide',

    'editSaveError'             => 'Une erreur est survenue lors de la sauvegarde de fichier de configuration #filename#',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Texte',

    // reindex.php
    'reindexTitle'              => 'R&eacute;-indexation de DAlbum',
    'reindexDlgTitle'           => 'R&eacute;-indexation de DAlbum',
    'reindexDlgComment'         => 'La r&eacute;-indexation cherche les dossiers de donn&eacute;es pour trouver les nouvelles images, cr&eacute;er les onglets requis et met &agrave; jour la base de donn&eacute;es.',
    'reindexDlgSpeed'           => 'Veuillez choisir la m&eacute;thode de r&eacute;-indexation:',

        'reindexSpeed0'             => '<b>Rapide</b>. Cr&eacute;ation des onglets et des images redimensionn&eacute;es. Ne v&eacute;rifie pas l&rsquo;int&eacute;grit&eacute; des images.',
    'reindexSpeed1'             => '<b>Mod&eacute;r&eacute;e</b>. Cr&eacute;ation des images ou onglets redimensionn&eacute;s corrompus ou non-existants seulement. V&eacute;rifie en m&ecirc;me temps l&rsquo;int&eacute;grit&eacute; des images.',
    'reindexSpeed2'             => '<b>Lente</b>. Comme <b>Mod&eacute;r&eacute;e</b> mais efface &eacute;galement les onglets et images sans r&eacute;f&eacute;rence.',
    'reindexSpeed3'             => '<b>Tr&egrave;s lente</b>. R&eacute;g&eacute;n&egrave;re tous les onglets et toutes les images redimensionn&eacute;es. Attention: cela pourrait prendre plusieurs heures!',

    'reindexCancelBtn'          => 'Annuler',
    'reindexStartBtn'           => 'D&eacute;marrer',

    'reindexProgressTitle'      => 'R&eacute;-indexation de DAlbum en cours',

    'reindexError'              => 'Une erreur est survenue lors de la cr&eacute;ation des onglets.',
    'reindexRetry'              => 'R&eacute;essayer pour l&rsquo;image &agrave; probl&egrave;me',
    'reindexIgnore'             => 'Ignorer l&rsquo;erreur et poursuivre',
    'reindexAgain'              => 'Recommencer l&rsquo;indexation',

    'reindexMainImageProblem'   => 'Probl&egrave;me d&rsquo;image t&eacute;l&eacute;charg&eacute;e',
    'reindexResizedProblem'     => 'Probl&egrave;me de redimensionnement',
    'reindexThumbProblem'       => 'Probl&egrave;me d&rsquo;onglet',

    'reindexCompleted'          => '<p>Op&eacute;ration termin&eacute;e.</p><p>La r&eacute;-indexation a pris #elapsed# secondes. La re-structuration de l&rsquo;album a pris #treeelapsed# secondes.</p>',
    'reindexStats'              => 'Statistiques de DAlbum',
    'reindexStatsAlbums'        => 'Nombre d&rsquo;albums:',
    'reindexStatsImages'        => 'Nombre d&rsquo;images:',
    'reindexStatsOrigSize'      => 'Taille totale des images originales:',
    'reindexStatsResizedSize'   => 'Taille totale des images redimensionn&eacute;es:',
    'reindexStatsThumbSize'     => 'Taille totale des onglets:',

    'reindexStatusErrors'       => '<b>Statut: </b> #errors# erreurs trouv&eacute;es:',

    'reindexStatusOK'           => '<b>Statut: </b> R&eacute;ussi avec succ&egrave;s. Aucune erreur d&eacute;tect&eacute;e.',
    'reindexSaveError'          => '<b>Erreur: </b> Impossible de sauvegarder #filename#',

    'reindexTHFilename'         => 'Nom du fichier',
    'reindexTHProblem'          => 'Probl&egrave;me',

// customizations

    // Image comments
    'cCommentsImageComments'        => 'Commentaires',
    'cCommentsLoginToAddComments'   => 'Veuillez #loginbutton# pour ajouter vos commentaires.<br />&nbsp;',
    'cCommentsYourName'             => 'Votre nom:',
    'cCommentsComment'              => 'Commentaire:',
    'cCommentsSendButtonText'       => 'Envoyer',
    'cCommentsDeleteButtonText'     => 'Supprimer',
    'cCommentsMailSubject'          => 'Nouveau commentaire sur image #image# ( Album: #album# )',
    'cCommentsMailBody'             => "Nouveau commentaire post&eacute; par #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
  
    'cCommentsDateFormat'           => 'F j, Y, g:i a',
    
    // Slide show
    'cSlideshowSlideshow'           => '-- Diaporama --',
    'cSlideshowSeconds'             => '#sec# secondes',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'áExiflineExposure'             => 'E:',
    'cExiflineAperture'             => 'A:',
    'cExiflineFlash'                => 'Flash:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'            => 'Cliquer pour ouvrir "#title#"',
    'cCustomOpenBtn'                => 'Ouvrir fichier',
    'cCustomOpenBtnTitle'           => 'Ouvrir fichier "#title#" dans fen&ecirc;tre courante',

    // Highligh modified albums
    'cModifiedNew'                  => 'Nouveau!',
    'cModifiedUpdated'              => 'Mis-à-jour!',

    ''  => ''
);
?>