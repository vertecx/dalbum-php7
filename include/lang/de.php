<?php

/*  DAlbum German language support file

    (c) Copyright 2003 by Akira Hattesohl [mariah.carey at hamburg.de]

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
    'loginBtn'          => 'Anmelden',
    'loginBtnTitle'     => 'Anmelden',

    'logoutBtn'         => 'Abmelden',
    'logoutBtnTitle'    => 'Abmelden',

    'reindexBtn'        => 'Neuindizierung',
    'reindexBtnTitle'   => 'Nach neuen Bildern suchen und DAlbum-Datenbank aktualisieren',

    'usrmgrBtn'         => 'Benutzer',
    'usrmgrBtnTitle'    => 'Benutzer hinzuf&uuml;gen/entfernen und Passw&ouml;rter &auml;ndern',

    'closeWindowBtn'    => 'Fenster schliessen',
    'closeWindowBtnTitle'=> 'Dieses Fenster schliessen',

    'fullScreenBtn'         => 'Vollbild',
    'fullScreenBtnTitle'    => 'Diese Seite im Vollbild-Fenster &ouml;ffnen (F11)',

    'editDefBtn'            => 'Bearbeiten',
    'editDefBtnTitle'       => 'Album-Titel bearbeiten, Kommentare setzen und Bilder verwalten',

    'indexUsername'         => 'Benutzer:',
    'page'                  => 'Objekte #begin# - #end# von #count# Objekten werden angezeigt. &nbsp; Seite: &nbsp;',
    'noimages'              => 'Keine Bilder',
    'noPublicImages'        => 'Keine &ouml;ffentlichen Bilder verf&uuml;gbar. Bitte erst anmelden.',
    'noscript'              => 'Die Ordner-Ansicht kann im Browser leider nur bei aktiverter Javascript-Unterst&uuml;tzung angezeigt werden.<BR><BR>Bitte Javascript f&uuml;r diese Seite in den Browser-Einstellungen aktivieren.',

    'prevPageBtn'           => 'Zurück',
    'prevPageBtnTitle'      => 'Zurück zur vorherigen Seite (#page#)',

    'nextPageBtn'           => 'Weiter',
    'nextPageBtnTitle'      => 'Weiter zur nächsten Seite (#page#)',

    'statusLeft'            => '<b>#TotalImages#</b> Bilder in <b>#TotalAlbums#</b> Alben',
    'statusRight'           => '<a href="http://www.dalbum.org">Erstellt durch DAlbum #version# &copy; 2003 DeltaX Inc. in #elapsed# s</a>',

    // Common stuff
    'mainPage'              => 'Zur Hauptseite',
    'username'              => 'Benutzername:',
    'password'              => 'Passwort:',
    'bytes'                 => 'bytes',
    'KB'                    => ' kB',
    'MB'                    => ' MB',
    'pixels'                => 'Pixel',
    'errorReturn'           => 'Zur&uuml;ck zur vorherigen Seite',

    /// Login.php
    'loginTitle'            =>  'Anmeldung f&uuml;r #title#',
    'loginAuthError'        =>  'Anmeldungs-Fehler',
    'loginBadUserName'      =>  'Benutzername oder Passwort konnten nicht in der Datenbank gefunden werden.',
    'loginAgain'            =>  'Erneut anmelden',
    'loginNoCookiesWarning' =>  '<HR><B>Warnung: Cookies sind im Browser deaktiviert!</B><BR>F&uuml;r den weiteren Verlauf m&uuml;ssen Cookies aktivert werden.<BR>Bitte Cookies in den Browser-Einstellungen aktivieren und diese Seite erneut laden.<BR><HR>',
    'loginLoginBtn'         => 'Anmelden',
    'loginCancelBtn'        => 'Abbruch',

    // pass.php
    'passTitle'             => 'Benutzer verwalten',
    'passUserExists'        => 'Benutzer #user# existiert bereits.',
    'passNotMatch'          => 'Passw&ouml;rter stimmen nicht &uuml;berein.',
    'passNoUserSelected'    => 'Kein Benutzer ausgew&auml;hlt.',
    'passNoAdminDelete'     => 'Haupt-DAlbum-Administrator kann nicht entfernt werden.',
    'passWriteError'        => 'Passwort-Datei konnte nicht zum Schreiben ge&ouml;ffnet werden!',
    'passError'             => '<B>Fehler: </B>#error#',
    'passAddBtn'            => 'Hinzuf&uuml;gen',
    'passDeleteBtn'         => 'Entfernen',
    'passChangePwdBtn'      => 'Passwort &auml;ndern',
    'passCloseBtn'          => 'Schliessen',
    'passCancelBtn'         => 'Abbruch',

    'passAddUserDlgTitle'   => 'Benutzer hinzuf&uuml;gen',
    'passChangePwdDlgTitle' => 'Passwort &auml;ndern',
    'passConfirmPassword'   => 'Passwort best&auml;tigen:',

    // showimg.php
    'showPrevBtn'           => 'Zur&uuml;ck',
    'showPrevBtnTitle'      => 'Vorheriges Bild anzeigen',

    'showNextBtn'           => 'Vor',
    'showNextBtnTitle'      => 'N&auml;chstes Bild anzeigen',

    'showIndexBtn'          => 'Index',
    'showIndexBtnTitle'     => 'Zur&uuml;ck zur Album-Übersicht',

    'showImageBtn'          => 'Bild anzeigen',
    'showImageBtnTitle'     => 'Nur das Bild anzeigen (in neuem Fenster)',

    'showHiResBtn'          => 'Originalbild (#size#)',
    'showHiResBtnTitle'     => 'Das Bild in Originalgr&ouml;&szlig;e anzeigen (in neuem Fenster)',

    'showShowDetailsBtn'        => 'Details anzeigen',
    'showShowDetailsBtnTitle'   => 'EXIF Bild-Details anzeigen: Datum, Belichtungszeit etc. (falls vorhanden)',

    'showHideDetailsBtn'        => 'Details verbergen',
    'showHideDetailsBtnTitle'   => 'EXIF Bild-Details verbergen',

    'showRotateBtn'             => 'Drehen',
    'showRotateBtnTitle'        => 'Bild um 90° im Uhrzeigersinn drehen',

    'showUpdateBtn'             => 'Aktualisieren',
    'showUpdateBtnTitle'        => 'Vorschau- und Normalbilder regenerieren',

    'showExifFilename'          => 'Dateiname: ',
    'showExifFilesize'          => 'Dateigr&ouml;&szlig;e: ',
    'showExifResolution'        => 'Aufl&ouml;sung: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Datum: ',
    'showExifCamera'            => 'Kameramodel: ',
    'showExifISO'               => 'ISO: ',
    'showExifExposure'          => 'Belichtung: ',
    'showExifAperture'          => 'Blende: ',
    'showExifFocalLength'       => 'Brennweite: ',
    'showExifFlashYes'          => 'Ja',
    'showExifFlashNo'           => 'Nein',
    'showExifFlash'             => 'Blitz ausgel&ouml;st: ',
    'showExifDialogTitle'       => 'Bild-Details des Originals',

    'showImageTitleImage'       => 'Klicken, um das n&auml;chste Bild anzuzeigen: #image#',
    'showImageTitleIndex'       => 'Klicken, um zur&uuml;ck zur Album-Übersicht zu gelangen',


    // edit*.php
    'editTitle'                 => '#filename# bearbeiten',
    'editDlgTitle'              => 'Album-Definitionsdatei',
    'editFileLocation'          => 'Ort der Datei',

    'editEditAsTextBtn'         => 'Als Text bearbeiten',
    'editEditAsTextBtnTitle'    => 'Diese Datei direkt als Nur-Text-Datei bearbeiten',
    'editReindexNote'           => 'Bitte beachten, dass eine Neuindizierung erforderlich ist, falls &Auml;nderungen an den Einstellungen f&uuml;r die Bildergr&ouml;sse gemacht werden',

    'editAlbumTitle'            => 'Album-Titel:',
    'editAlbumDate'             => 'Datum:',
    'editAlbumComment'          => 'Kommentar:',
    'editAlbumTitleImage'       => 'Titlebild:',
    'editAlbumDefault'          => 'Dieses Album beim Wiederbetreten der Seite als Start-Album anzeigen',
    'editAlbumUsers'            => 'Erlaubte Benutzer:',
    'editAlbumUsersNote'        => '(Komma-getrennte Benutzerliste, Leerzeile oder <B>all</B> = anonymer Zugriff, <B>valid-user</B> = beliebiger angemeldeter Benutzer)',

    'editCancelBtn'             => 'Abbruch',
    'editSaveBtn'               => 'Sichern',

    'editThumbLink'             => '#filename# (in neuem Fenster &ouml;ffnen)',
    'editImgFilename'           => 'Dateiname<BR><small>(&Auml;ndern zum Umbenennen, Freilassen zum Entfernen)</small>:',
    'editImgTitle'              => 'Titel:',
    'editImgComment'            => 'Kommentar:',
    'editImgResize'             => 'Bildgr&ouml;&szlig;e laut den Einstellungen (config.php) &auml;ndern',
    'editNewFileMessage'        => '( neue Datei )',
    'editTop'                   => 'Anfang',

    'editRenameError'           => 'Nicht möglich Dateiname in #filename# zu ändern - ungültige Dateiendung',
    'editSaveError'             => 'Felher beim Sichern der Album-Definitionsdatei #filename#',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Text',

    // reindex.php
    'reindexTitle'              => 'DAlbum-Neuindizierung',
    'reindexDlgTitle'           => 'DAlbum-Neuindizierung',
    'reindexDlgComment'         => 'Bei der DAlbum-Neuindizierung werden sämtliche Ordner nach neuen Bildern durchsucht, fehlende Vorschaubilder erzeugt und die Informationen der Bilder-Datenbank aktualisiert.',
    'reindexDlgSpeed'           => 'Bitte die Art der Neuindizierung angeben:',

    'reindexSpeed0'             => '<B>Schnell</B>. Lediglich fehlende Vorschau- und Normalbilder erstellen. Bilddateien nicht auf Unversehrtheit &uuml;berpr&uuml;fen.',
    'reindexSpeed1'             => '<B>Mittelm&auml;&szlig;ig</B>. Lediglich fehlende oder fehlerhafte Vorschau- und Normalbilder erstellen. Bilddateien auf Unversehrtheit &uuml;berpr&uuml;fen.',
    'reindexSpeed2'
             => '<B>Langsam</B>. Wie <B>Mittelm&auml;&szlig;ig</B>, zus&auml;tzlich auch verwaiste Vorschau- und Normalbilder entfernen.',
    'reindexSpeed3'             => '<B>Sehr langsam</B>. S&auml;mtliche Vorschau- und Normalbilder neu erstellen. Warnung: Dies kann mehrere Stunden dauern!',

    'reindexCancelBtn'          => 'Abbruch',
    'reindexStartBtn'           => 'Start',

    'reindexProgressTitle'      => 'DAlbum-Neuindizierung l&auml;uft',

    'reindexError'              => 'Fehler bei der Erstellung eines Vorschaubildes',
    'reindexRetry'              => 'Wiederholen',
    'reindexIgnore'             => 'Fehler ignorieren und fortfahren',
    'reindexAgain'              => 'Neuindizierung von vorne starten',

    'reindexMainImageProblem'   => 'Problem mit hochgeladenem Bild',
    'reindexResizedProblem'     => 'Problem mit Normalbild',
    'reindexThumbProblem'       => 'Problem mit Vorschaubild',

    'reindexCompleted'          => '<P>Vorgang abgeschlossen.</P><P>Neuindizierung hat #elapsed# Sekunden gedauert. Album-Baum wurde in #treeelapsed# Sekunden erstellt.</P>',
    'reindexStats'              => 'DAlbum-Statistik',
    'reindexStatsAlbums'        => 'Anzahl der Alben:',
    'reindexStatsImages'        => 'Anzahl der Bilder:',
    'reindexStatsOrigSize'      => 'Gesamtgr&ouml;&szlig;e der Originalbilder:',
    'reindexStatsResizedSize'   => 'Gesamtgr&ouml;&szlig;e der Normalbilder:',
    'reindexStatsThumbSize'     => 'Gesamtgr&ouml;&szlig;e der Vorschaubilder:',

    'reindexStatusErrors'       => '<B>Status: </B> #errors# Fehler aufgetreten:',

    'reindexStatusOK'           => '<B>Status: </B> Erfolg. Keine Fehler aufgetreten.',
    'reindexSaveError'          => '<B>Fehler: </B> Sichern von #filename# nicht m&ouml;glich',

    'reindexTHFilename'         => 'Dateiname',
    'reindexTHProblem'          => 'Problem',

    // customizations

    // Image comments
    'cCommentsImageComments'       => 'Bildkommentare',
    'cCommentsLoginToAddComments'  => 'Bitte #loginbutton#, um Deine Kommentare hinzuzuf&uuml;gen.<BR>&nbsp;',
    'cCommentsYourName'            => 'Dein Name:',
    'cCommentsComment'             => 'Kommentar:',
    'cCommentsSendButtonText'      => 'Abschicken',
    'cCommentsDeleteButtonText'    => 'Löschen',
    'cCommentsMailSubject'         => 'Neuer Kommentar zu Bild #image# ( Album: #album# )',
    'cCommentsMailBody'            => "Neuer Kommentar von #user# abgegeben, IP: #ip#, DNS: #dns#\n\n#body#\n\n URL: #url#\n",
    'cCommentsDateFormat'          => 'd. F Y, H:i',

    // Slide show
    'cSlideshowSlideshow'          => '-- Slide-Show --',
    'cSlideshowSeconds'            => '#sec# Sekunden',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'     => 'ISO:',
    'cExiflineExposure'            => 'Beli:',
    'cExiflineAperture'            => 'Blen:',
    'cExiflineFlash'               => 'Blitz:',
    'cExiflineDateFormat'          => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'           => 'Klicken, um "#title#" zu &ouml;ffnen',
    'cCustomOpenBtn'               => 'Datei &ouml;ffnen',
    'cCustomOpenBtnTitle'          => 'Datei "#title#" in aktuellem Fenster &ouml;ffnen',

    // Highligh modified albums
    'cModifiedNew'                 => 'neu!',
    'cModifiedUpdated'             => 'aktualisiert!',

    '' => ''
);

?>