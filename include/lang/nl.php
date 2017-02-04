<?php

/*  DAlbum Dutch language support file

    Translation by: Andre Berends, August 20th, 2003 (after correcting some faults)

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
    'loginBtn'              => 'Inloggen',
    'loginBtnTitle'             => 'Inloggen',
    'logoutBtn'             => 'Uitloggen',
    'logoutBtnTitle'            => 'Uitloggen',
    'reindexBtn'            => 'Herindexeren',
    'reindexBtnTitle'       => 'Zoek naar nieuwe afbeeldingen, en voeg ze toe aan de DAlbum-database',
    'usrmgrBtn'             => 'Gebruikers',
    'usrmgrBtnTitle'            => 'Gebruikers toevoegen/verwijderen en wachtwoorden wijzigen',
    'closeWindowBtn'            => 'Sluit venster',
    'closeWindowBtnTitle'       => 'Sluit dit venster',
    'fullScreenBtn'         => 'Volledig scherm',
    'fullScreenBtnTitle'        => 'Open deze pagina in een volledig scherm, of druk op F11 voor hetzelfde effect',
    'editDefBtn'            => 'Bewerk',
    'editDefBtnTitle'           => 'Bewerk albumtitel, opmerkingen en beheer albumafbeeldingen',
    'indexUsername'         => 'Gebruiker:',
    'page'              => 'Toon items #begin# - #end# van #count#. &nbsp; Pagina: &nbsp;',
    'noimages'              => 'Geen afbeeldingen',
    'noPublicImages'            => 'Geen afbeeldingen beschikbaar. Je moet eerst inloggen.',
    'noscript'              => 'Sorry, mapweergave is alleen mogelijk met Javascript-ondersteuning ingeschakeld in uw browser.<BR><BR>AUB JavaScript ondersteuning inschakelen in de voorkeuren van uw browser.',
    'statusLeft'            => '<b>#TotalImages#</b> afbeeldingen in <b>#TotalAlbums#</b> albums',
    'statusRight'           => '<a href="http://www.dalbum.org">Gegenereerd door DAlbum #version# &copy; 2004 DeltaX Inc. in #elapsed# seconden</a>',
    'prevPageBtn'           => '&lt;&lt;',
    'prevPageBtnTitle'      => 'Pagina #page#',
    'nextPageBtn'           => '&gt;&gt;',
    'nextPageBtnTitle'      => 'Pagina #page#',

    // Common stuff
    'mainPage'              => 'Ga naar hoofdpagina',
    'username'              => 'Gebruikernaam:',
    'password'              => 'Wachtwoord:',
    'bytes'             => 'bytes',
    'KB'                    => 'KB',
    'MB'                    => 'MB',
    'pixels'                => 'pixels',
    'errorReturn'           => 'Ga terug naar de vorige pagina',

    /// Login.php
    'loginTitle'            => 'Inloggen op #title#',
    'loginAuthError'            => 'Authenticatie mislukt',
    'loginBadUserName'      => 'Uw gebruikersnaam en/of wachtwoord niet gevonden in de database.',
    'loginAgain'            => 'Opnieuw inloggen',
    'loginNoCookiesWarning'     => '<HR><B>Waarschuwing: Cookies zijn uitgeschakeld in uw browser!</B><BR>Om door te kunnen gaan, moeten cookies zijn ingeschakeld.<BR>AUB cookies inschakelen in uw browservoorkeuren, en vernieuw (F5) deze pagina.<BR><HR>',
    'loginLoginBtn'         => 'Inloggen',
    'loginCancelBtn'            => 'Annuleer',

    // pass.php
    'passTitle'             => 'Gebruikersbeheer',
    'passUserExists'            => 'Gebruiker #user# bestaat reeds.',
    'passNotMatch'          => 'Wachtwoorden komen niet overeen.',
    'passNoUserSelected'        => 'Geen gebruiker geselecteerd.',
    'passNoAdminDelete'     => 'Primaire DAlbum-beheerder kan niet worden gewist.',
    'passWriteError'            => 'Kan niet schrijven in wachtwoordbestand!',
    'passError'             => '<B>Fout: </B>#error#',
    'passAddBtn'            => 'Toevoegen',
    'passDeleteBtn'         => 'Wissen',
    'passChangePwdBtn'      => 'Wachtwoord wijzigen',
    'passCloseBtn'          => 'Sluiten',
    'passCancelBtn'         => 'Annuleer',
    'passAddUserDlgTitle'       => 'Voeg gebruiker toe',
    'passChangePwdDlgTitle'     => 'Wachtwoord wijzigen',
    'passConfirmPassword'       => 'Bevestig wachtwoord:',

    // showimg.php
    'showPrevBtn'           => 'Vorige',
    'showPrevBtnTitle'      => 'Toon vorige afbeelding',
    'showNextBtn'           => 'Volgende',
    'showNextBtnTitle'      => 'Toon volgende afbeelding',
    'showIndexBtn'          => 'Inhoud',
    'showIndexBtnTitle'         => 'Terug naar inhoudsopgave',
    'showImageBtn'          => 'Toon afbeelding',
    'showImageBtnTitle'         => 'Toon alleen de afbeelding in een nieuw venster',
    'showHiResBtn'          => 'Originele afbeelding (#size#)',
    'showHiResBtnTitle'         => 'Toon afbeelding in originele resolutie in een nieuw venster',
    'showShowDetailsBtn'        => 'Toon details',
    'showShowDetailsBtnTitle'   => 'Toon EXIF-gegevens: fotodatum, sluitertijd, diafragma, ISO e.d. (indien beschikbaar)',
    'showHideDetailsBtn'        => 'Verberg details',
    'showHideDetailsBtnTitle'   => 'Verberg EXIF-gegevens',
    'showRotateBtn'             => 'Roteer',
    'showRotateBtnTitle'        => 'Roteer afbeelding 90 graden rechtsom',
    'showExifFilename'      => 'Bestandsnaam: ',
    'showExifFilesize'      => 'Bestandsgrootte: ',
    'showExifResolution'        => 'Resolutie: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'          => 'Datum: ',
    'showExifCamera'            => 'Cameramodel: ',
    'showExifExposure'      => 'Sluitertijd: ',
    'showExifAperture'      => 'Diafragma: ',
    'showExifFocalLength'       => 'Brandpunt afstand: ',
    'showExifFlashYes'      => 'Ja',
    'showExifFlashNo'           => 'Nee',
    'showExifFlash'         => 'Flitser gebruikt: ',
    'showExifDialogTitle'       => 'Afbeeldingsdetails',
    'showImageTitleImage'       => 'Klik om de volgende afbeelding te tonen: #image#',
    'showImageTitleIndex'       => 'Klik om terug te gaan naar albuminhoudsopgave',


    // edit*.php
    'editTitle'             => 'Bewerk #filename#',
    'editDlgTitle'          => 'Albumdefinitiebestand',
    'editFileLocation'      => 'Bestandslocatie',
    'editEditAsTextBtn'     => 'Bewerk als tekst',
    'editEditAsTextBtnTitle'    => 'Bewerk als alleen tekstbestand',
    'editReindexNote'           => 'LET OP: U moet herindexeren nadat de veranderingen zijn ingevoerd',
    'editAlbumTitle'            => 'Album titel:',
    'editAlbumDate'         => 'Datum:',
    'editAlbumComment'      => 'Opmerking:',
    'editAlbumTitleImage'       => 'Afbeelding bij map:',
    'editAlbumDefault'      => 'Standaardalbum',
    'editAlbumUsers'            => 'Toegestane gebruikers:',
    'editAlbumUsersNote'        => '(komma gescheiden gebruikerslijst, leeg of <B>all</B> = anonieme toegang, <B>valid-user</B>=Alle geldige gebruikers)',
    'editCancelBtn'         => 'Annuleer',
    'editSaveBtn'           => 'Opslaan',
    'editThumbLink'         => '#filename# openen in een nieuw venster',
    'editImgFilename'           => 'Bestandsnaam<BR><small>(wijzig om te hernoemen, legen of wissen)</small>:',
    'editImgTitle'          => 'Titel:',
    'editImgComment'            => 'Opmerking:',
    'editImgResize'         => 'Wijzig afbeeldingsgrootte',
    'editNewFileMessage'        => '( nieuw bestand )',
    'editTop'               => 'Naar boven',
    'editRenameError'           => 'Kan bestandsnaam niet veranderen in #filename# - ongeldige extensie',
    'editSaveError'         => 'Een fout is opgetreden bij het opslaan van albumdefinitie-bestand #filename#',
    'editHTML'              => 'HTML',
    'editText'              => 'Tekst',

    // reindex.php
    'reindexTitle'          => 'DAlbum herindexeren',
    'reindexDlgTitle'           => 'DAlbum herindexeren',
    'reindexDlgComment'     => 'DAlbum-herindex zoekt naar nieuwe afbeeldingen, maakt ontbrekende thumbnails en werkt database-informatie bij.',
    'reindexDlgSpeed'           => 'Kies hieronder de herindexeermethode:',
    'reindexSpeed0'         => '<B>Snel</B>. Maakt alleen niet bestaande thumbnails aan en wijzigt afbeeldingformaat. Contoleert de integriteit van de afbeeldingen niet.',
    'reindexSpeed1'         => '<B>Gemiddeld</B>. Maakt en/of hersteld niet bestaande thumbnails, wijzigt afbeeldingformaat. Controleert de integriteit van de afbeeldingen.',
    'reindexSpeed2'         => '<B>Traag</B>. Hetzelfde als <B>Gemiddeld</B> , maar wist ook niet gebruikte thumbnails en afbeeldingen.',
    'reindexSpeed3'         => '<B>Extreem traag</B>. Vernieuwt alle thumbnails en wijzigt alle afbeeldingformaten. Waarschuwing: dit proces kan lang duren!',
    'reindexCancelBtn'      => 'Annuleer',
    'reindexStartBtn'           => 'Starten',
    'reindexProgressTitle'      => 'DAlbum: Bezig met herindexeren',
    'reindexError'          => 'Fout op bij het aanmaken van een thumbnail',
    'reindexRetry'          => 'Deze afbeelding opnieuw proberen',
    'reindexIgnore'         => 'Negeer deze afbeelding en ga door',
    'reindexAgain'          => 'Opnieuw indexeren',
    'reindexMainImageProblem'   => 'Probleem met geuploade afbeelding ',
    'reindexResizedProblem'     => 'Probleem met afbeelding in nieuw formaat',
    'reindexThumbProblem'       => 'Thumbnail probleem',
    'reindexCompleted'      => '<P>Herindexeren geslaagd.</P><P>Herindexeren nam #elapsed# seconden in beslag. Album is aangemaakt in #treeelapsed# seconden.</P>',
    'reindexStats'          => 'DAlbum-statistieken',
    'reindexStatsAlbums'        => 'Aantal albums:',
    'reindexStatsImages'        => 'Aantal afbeeldingen:',
    'reindexStatsOrigSize'      => 'Totaal formaat van originele afbeeldingen:',
    'reindexStatsResizedSize'       => 'Totaal formaat van gewijzigde afbeeldingen:',
    'reindexStatsThumbSize'         => 'Totaal formaat van thumbnails:',
    'reindexStatusErrors'       => '<B>Status: </B> #errors# fouten gevonden:',
    'reindexStatusOK'           => '<B>Status: </B> Geen fouten gevonden.',
    'reindexSaveError'      => '<B>Error: </B> Kon #filename# niet opslaan',
    'reindexTHFilename'     => 'Bestandsnaam',
    'reindexTHProblem'      => 'Probleem',


    // Image comments
    'cCommentsImageComments'        => 'Opmerkingen',
    'cCommentsLoginToAddComments'   => 'Klik op #loginbutton# om opmerkingen toe te voegen.<BR>&nbsp;',
    'cCommentsYourName'     => 'Naam:',
    'cCommentsComment'      => 'Opmerkingen:',
    'cCommentsSendButtonText'   => 'Verzenden',
    'cCommentsDeleteButtonText'     => 'Verwijderen',
    'cCommentsMailSubject'      => 'Nieuwe opmerkingen bij #image# ( Album: #album# )',
    'cCommentsMailBody'         => "Nieuwe opmerkingen toegevoegd door #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
    'cCommentsDateFormat'       => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'       => '-- Diashow --',
    'cSlideshowSeconds'         => '#sec# seconden',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'     => 'S:',
    'cExiflineAperture'     => 'D:',
    'cExiflineFlash'            => 'Flits:',
    'cExiflineDateFormat'       => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'        => 'Klik om "#title#" te openen',
    'cCustomOpenBtn'            => 'Bestand openen',
    'cCustomOpenBtnTitle'       => 'Open bestand "#title#" in het huidige venster',

    // Highligh modified albums
    'cModifiedNew'          => 'nieuw!',
    'cModifiedUpdated'      => 'aangepast!',

    ''  => ''
);

?>