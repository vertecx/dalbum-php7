<?php

/*  DAlbum Norwegian language support file

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
    'loginBtn'          => 'Logg inn',
    'loginBtnTitle'     => 'Logg inn',

    'logoutBtn'         => 'Logg ut',
    'logoutBtnTitle'    => 'Logg ut',

    'reindexBtn'        => 'Reindeks&eacute;r',
    'reindexBtnTitle'   => 'S&oslash;k etter nye bilder og oppdat&eacute;r DAlbum-databasen',

    'usrmgrBtn'         => 'Brukere',
    'usrmgrBtnTitle'    => 'Legg til/fjern brukere og endre passord',

    'closeWindowBtn'    => 'Lukk vindu',
    'closeWindowBtnTitle'=> 'Lukk dette vinduet',

    'fullScreenBtn'         => 'Fullskjerm',
    'fullScreenBtnTitle'    => '&Aring;pne vinduet i et fullskjermsvindu. Eller bare trykk F11 for samme effekt',

    'editDefBtn'            => 'Endre',
    'editDefBtnTitle'       => 'Endre albumtittel, kommentarer eller behandle bildene for albumet',

    'indexUsername'         => 'Bruker:',
    'page'                  => 'Viser #begin# - #end# av #count#. &nbsp; side: &nbsp;',
    'noimages'              => 'Ingen bilder',
    'noPublicImages'        => 'Ingen offentlige bilder tilgjengelig. Vennligst logg inn.',
    'noscript'              => 'Beklager, katalogvisning kan bare benyttes med Javascript sl&aringtt p&aring for nettleseren.<BR><BR>Vennligst endre innstillingene i din nettleser.',

    'prevPageBtn'           => 'Forrige',
    'prevPageBtnTitle'      => 'G&aring; til forrige side (#page#)',

    'nextPageBtn'           => 'Neste',
    'nextPageBtnTitle'      => 'G&aring; til neste side (#page#)',

    'allPageBtn'           => 'Alle',
    'allPageBtnTitle'      => 'Vis alle sider',

    'statusLeft'            => '<b>#TotalImages#</b> bilder i <b>#TotalAlbums#</b> album',
    'statusRight'           => '<a href="http://www.dalbum.org">Generert av DAlbum #version# &copy; 2003 DeltaX Inc. p&aring #elapsed# s</a>',

    // Common stuff
    'mainPage'              => 'Til hovedsiden',
    'username'              => 'Brukernavn:',
    'password'              => 'Passord:',
    'bytes'                 => 'bytes',
    'KB'                    => 'kB',
    'MB'                    => 'MB',
    'pixels'                => 'pixler',
    'errorReturn'           => 'Til forrige side',

    /// Login.php
    'loginTitle'            =>  'Logg inn p&aring; #title#',
    'loginAuthError'        =>  'Autentifiseringsfeil',
    'loginBadUserName'      =>  'Ditt brukernavn eller passord finnes ikke i databasen.',
    'loginAgain'            =>  'Logg inn igjen',
    'loginNoCookiesWarning' =>  '<HR><B>Advarsel: Sm&aring; (Cookies) er avsl&aring;tt av i din nettleser!</B><BR>For &aring; fortsette m&aring; dette sl&aring;s p&aring;.<BR>Vennligst sl&aring; p&aring; dette i innstillingene for din nettleser og oppdat&eacute;r denne siden (F5).<BR><HR>',
    'loginLoginBtn'         => 'Logg inn',
    'loginCancelBtn'        => 'Avbryt',

    // pass.php
    'passTitle'             => 'Brukerh&aring;ndterer',
    'passUserExists'        => 'Brukeren #user# eksisterer allerede.',
    'passNotMatch'          => 'Passordene er ikke like.',
    'passNoUserSelected'    => 'Ingen bruker er valgt.',
    'passNoAdminDelete'     => 'DAlbum hovedadministrator kan ikke slettes.',
    'passWriteError'        => 'Kan ikke &aring;pne passordfil for skriving!',
    'passError'             => '<B>Feil: </B>#error#',
    'passAddBtn'            => 'Legg til',
    'passDeleteBtn'         => 'Slett',
    'passChangePwdBtn'      => 'Forandre passord',
    'passCloseBtn'          => 'Lukk',
    'passCancelBtn'         => 'Avbryt',

    'passAddUserDlgTitle'   => 'Legg til bruker',
    'passChangePwdDlgTitle' => 'Forandre passord',
    'passConfirmPassword'   => 'Bekreft passord:',

    // showimg.php
    'showPrevBtn'           => 'Forrige',
    'showPrevBtnTitle'      => 'Vis forrige bilde',

    'showNextBtn'           => 'Neste',
    'showNextBtnTitle'      => 'Vis neste bilde',

    'showIndexBtn'          => 'Indeks',
    'showIndexBtnTitle'     => 'Return&eacute;r til albumets indeks',

    'showImageBtn'          => 'Vis bilde',
    'showImageBtnTitle'     => 'Vis bare bilder i nytt vindu',

    'showHiResBtn'          => 'Opprinnelig bilde (#size#)',
    'showHiResBtnTitle'     => 'Vis opprinnelig bilde i h&oslash;y oppl&oslash;sning i nytt vindu',

    'showHiResDownloadBtn'      => 'Last ned (#size#)',
    'showHiResDownloadBtnTitle' => 'Last ned originalt h&oslash;yt-oppl&oslash;selig bilde (#size#)',

    'showShowDetailsBtn'        => 'Vis detaljer',
    'showShowDetailsBtnTitle'   => 'Vis EXIFs bildedetaljer:: bildedato, lukningshastighet osv. (om tilgjengelig)',

    'showHideDetailsBtn'        => 'Gjem detaljer',
    'showHideDetailsBtnTitle'   => 'Gjem EXIFs bildedetaljer',

    'showRotateBtn'             => 'Rot&eacute;r',
    'showRotateBtnTitle'        => 'Rot&eacute;r bilde 90 grader med klokken',

    'showUpdateBtn'             => 'Oppdat&eacute;r',
    'showUpdateBtnTitle'        => 'Generer p&aring; nytt sm&aring;bilder og omgjorte bilder',

    'showExifFilename'          => 'Filnavn: ',
    'showExifFilesize'          => 'Filst&oslash;rrelse: ',
    'showExifResolution'        => 'Oppl&oslash;sning: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Dato: ',
    'showExifCamera'            => 'Kameramodell: ',
    'showExifISO'               => 'ISO: ',
    'showExifExposure'          => 'Eksponeringstid: ',
    'showExifAperture'          => 'Blender&aring;pning: ',
    'showExifFocalLength'       => 'Brennvidde: ',
    'showExifFlashYes'          => 'Ja',
    'showExifFlashNo'           => 'Nei',
    'showExifFlash'             => 'Blitz: ',
    'showExifDialogTitle'       => 'Opprinnelige detaljer for bilde',

    'showImageTitleImage'       => 'Klikk for &aring; vise neste bilde: #image#',
    'showImageTitleIndex'       => 'Klikk for &aring; returnere til albumets indeks',


    // edit*.php
    'editTitle'                 => 'Endre #filename#',
    'editDlgTitle'              => 'Albumets definisjonsfil',
    'editFileLocation'          => 'Filplassering',

    'editEditAsTextBtn'         => 'Endre som tekst',
    'editEditAsTextBtnTitle'    => 'Endre denne filen som en ren tekstfil',
    'editReindexNote'           => 'Vennligst bemerk at du m&aring; reindeksere etter &aring; ha forandret innstillingene for bildest&oslash;rrelse.',

    'editAlbumTitle'            => 'Albumets tittel:',
    'editAlbumDate'             => 'Dato:',
    'editAlbumComment'          => 'Kommentar:',
    'editAlbumTitleImage'       => 'Hovedbilde:',
    'editAlbumDefault'          => 'Standardalbum',
    'editAlbumUsers'            => 'Tillatte brukere:',
    'editAlbumUsersNote'        => '(komma-separert brukerliste; la st&aring; tomt eller <B>all</B> = anonym tilgang, <B>valid-user</B> = alle autentifiserte brukere)',

    'editCancelBtn'             => 'Avbryt',
    'editSaveBtn'               => 'Lagre',

    'editThumbLink'             => '#filename# (&Aring;pner i nytt vindu)',
    'editImgFilename'           => 'Filnavn<BR><small>(forandre for &aring; bytte navn, la st&aring; tomt for &aring; slette)</small>:',
    'editImgTitle'              => 'Tittel:',
    'editImgComment'            => 'Kommentar:',
    'editImgResize'             => 'Gi bildet ny st&oslash;rrelse',
    'editNewFileMessage'        => '( ny fil )',
    'editTop'                   => 'Til toppen',

    'editRenameError'           => 'Kunne ikke endre filnavnet til #filename# - ugyldig filendelse',
    'editSaveError'             => 'En feil skjedde ved lagring av albumets definisjonsfil #filename#',
    'editHTMLSep'               => 'HTML (eget vindu)',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Tekst',

    // reindex.php
    'reindexTitle'              => 'DAlbum-reindeksering',
    'reindexDlgTitle'           => 'DAlbum-reindeksering',
    'reindexDlgComment'         => 'DAlbums reindeksering s&oslash;ker etter nye bilder/kataloger med nye bilder, lager sm&aring;bilder og oppdaterer bilde-databasen.',
    'reindexDlgSpeed'           => 'Vennligst spesifis&eacute;r reindekseringens hastighet:',

    'reindexSpeed0'             => '<B>Rask</B>. Lager bare ikke-eksisterende sm&aring;bilder og omgj&oslash;r st&oslash;rrelsen p&aring; bildene. Verifiserer ikke bildenes integritet.',
    'reindexSpeed1'             => '<B>Moderat</B>.  Lager bare ikke-eksisterende eller korrupte sm&aring;bilder og omgj&oslash;r st&oslash;rrelsen p&aring; bilder. Verifiserer bildenes integritet.',
    'reindexSpeed2'             => '<B>Langsom</B>. Samme som <B>Moderat</B>, men sletter ogs&aring; ikke-eksisterende bilde-referanser (sm&aring;bilder og omgjorte).',
    'reindexSpeed3'             => '<B>Veldig langsom</B>. Lager alle sm&aring;bilder og omgj&oslash;r st&oslash;rrelsen p&aring; alle bilder p&aring; nytt. Advarsel: Dette kan ta mange timer!',

    'reindexCancelBtn'          => 'Avbryt',
    'reindexStartBtn'           => 'Start',

    'reindexProgressTitle'      => 'DAlbum reindeksering p&aring;g&aring;r',

    'reindexError'              => 'En feil skjedde under opprettelse av sm&aring;bilde',
    'reindexRetry'              => 'Pr&oslash;v p&aring; nytt p&aring; feilet bilde',
    'reindexIgnore'             => 'Ignorer feil og fortsett',
    'reindexAgain'              => 'Start reindeksering p&aring; nytt',

    'reindexMainImageProblem'   => 'Opplastet bilde har et problem',
    'reindexResizedProblem'     => 'Omgjort bilde har et problem',
    'reindexThumbProblem'       => 'Problem med sm&aring;bilde',

    'reindexCompleted'          => '<P>Operasjon fullf&oslash;rt.</P><P>Reindeksering tok #elapsed# sekunder. Album ble generert p&aring; #treeelapsed# sekunder.</P>',
    'reindexStats'              => 'DAlbum-statistikk',
    'reindexStatsAlbums'        => 'Antall album:',
    'reindexStatsImages'        => 'Antall bilder:',
    'reindexStatsOrigSize'      => 'Total st&oslash;rrelse for opprinnelige bilder:',
    'reindexStatsResizedSize'   => 'Total st&oslash;rrelse for omgjorte bilder:',
    'reindexStatsThumbSize'     => 'Total st&oslash;rrelse for sm&aring;bilder:',

    'reindexStatusErrors'       => '<B>Status: </B> #errors# feil funnet:',

    'reindexStatusOK'           => '<B>Status: </B> Suksess. Ingen feil.',
    'reindexSaveError'          => '<B>Feil: </B>Kunne ikke lagre #filename#',

    'reindexTHFilename'         => 'Filnavn',
    'reindexTHProblem'          => 'Problem',

    // customizations

    // Image comments
    'cCommentsImageComments'        => 'Bildekommentarer',
    'cCommentsLoginToAddComments'   => 'Vennligst #loginbutton# for &aring; legge til kommentarer<BR>&nbsp;',
    'cCommentsYourName'             => 'Ditt navn:',
    'cCommentsComment'              => 'Kommentar:',
    'cCommentsSendButtonText'       => 'Legg til',
    'cCommentsDeleteButtonText'     => 'Slett',
    'cCommentsMailSubject'          => 'Ny kommentar lagt til bilde #image# ( Album: #album# )',
    'cCommentsMailBody'             => "Ny kommentar lagt til av #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
    'cCommentsDateFormat'           => 'j. F, Y, H:i',

    // Slide show
    'cSlideshowSlideshow'           => '-- Lysbildeshow --',
    'cSlideshowSeconds'             => '#sec# sekunder',
    'cSlideshowStopTitle'           => 'Klikk her for &aring; stoppe lysbildeshowet',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'             => 'Eksp:',
    'cExiflineAperture'             => 'Bl.&aring;.:',
    'cExiflineFlash'                => 'Blitz:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',
    'cExiflineFocal'                => 'Br.v.:',


    // Custom file types
    'cCustomClickToOpen'            => 'Klikk for &aring; &aring;pne "#title#"',
    'cCustomOpenBtn'                => 'Åpne fil',
    'cCustomOpenBtnTitle'           => 'Åpne fil "#title#" i dette vinduet',

    // Highligh modified albums
    'cModifiedNew'                  => 'ny!',
    'cModifiedUpdated'              => 'oppdatert!',

    // ZIP
    'cZipBtn'                    => 'Last ned som ZIP (#size#)',
    'cZipBtnTitle'               => 'Last ned hele albumet som ZIP-arkiv (#size#)',

    ''  => ''
);

?>