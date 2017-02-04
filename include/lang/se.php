<?php

/*  DAlbum Swedish language support file

    (c) Copyright 2003 by nylle.com info@nylle.com

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
    'loginBtn'          => 'Logga in',
    'loginBtnTitle'     => 'Logga in',

    'logoutBtn'         => 'Logga ut',
    'logoutBtnTitle'    => 'Logga ut',

    'reindexBtn'        => 'Omindexering',
    'reindexBtnTitle'   => 'S&ouml;k efter nya foton och uppdatera DAlbum databasen',

    'usrmgrBtn'         => 'Anv&auml;ndare',
    'usrmgrBtnTitle'    => 'L&auml;gg till/ta bort anv&auml;ndare och &auml;ndra l&ouml;senord',

    'closeWindowBtn'    => 'St&auml;ng f&ouml;nster',
    'closeWindowBtnTitle'=> 'St&auml;ng detta f&ouml;nster',

    'fullScreenBtn'         => 'Fullsk&auml;rm',
    'fullScreenBtnTitle'    => '&Ouml;ppna denna sida i full sk&auml;rms f&ouml;nster. Eller tryck p&aring; F11 f&ouml;r samma effekt',

    'editDefBtn'            => '&Auml;ndra',
    'editDefBtnTitle'       => '&Auml;ndra albumtitel, kommentar och behandla albumfoton',

    'indexUsername'         => 'Anv&auml;ndare:',
    'page'                  => 'Visar foto #begin# - #end# av #count#. &nbsp; sida: &nbsp;',
    'noimages'              => 'Inga foton',
    'noPublicImages'        => 'Inga allm&auml;nna foton tillg&auml;ngliga, Var v&auml;nligen logga in.',
    'noscript'              => 'Ledsen, Mappvy kan bara visas med Javascriptsst&ouml;d p&aring;slaget i din webl&auml;sare.<BR><BR>Var v&auml;nligen g&aring; till din webl&auml;sares inst&auml;llningar och sl&aring; p&aring; javascript f&ouml;r denna sida.',

    'prevPageBtn'           => 'F&ouml;reg&aring;ende',
    'prevPageBtnTitle'      => 'Visa f&ouml;reg&aring;ende sida (sida #page#)',

    'nextPageBtn'           => 'N&auml;sta',
    'nextPageBtnTitle'      => 'Visa n&auml;sta sida (sida #page#)',

    'statusLeft'            => '<b>#TotalImages#</b> foton i <b>#TotalAlbums#</b> album',
    'statusRight'           => '<a href="http://www.dalbum.org">Skapat av DAlbum #version# © 2003 DeltaX Inc. in #elapsed# s</a>',

    // Common stuff
    'mainPage'              => 'G&aring; till huvudsidan',
    'username'              => 'Anv&auml;ndarnamn:',
    'password'              => 'L&ouml;senord:',
    'bytes'                 => 'bytes',
    'KB'                    => 'KB',
    'MB'                    => 'MB',
    'pixels'                => 'pixels',
    'errorReturn'           => '&Aring;terg&aring; till f&ouml;reg&aring;ende sida',

    /// Login.php
    'loginTitle'            =>  'Logga in till #title#',
    'loginAuthError'        =>  'Autentiserings fel',
    'loginBadUserName'      =>  'Ditt anv&auml;ndarnamn eller l&ouml;senord fanns inte i databasen.',
    'loginAgain'            =>  'Logga in igen',
    'loginNoCookiesWarning' =>  htmlentities('<HR><B>Varning: Cookies &auml;r avslaget i din webl&auml;sare!</B><BR>F&ouml;r att forts&auml;tta m&aring;ste du sl&aring; p&aring; cookies.<BR>Var v&auml;nligen g&aring; till din webl&auml;sares inst&auml;llningar och sl&aring; p&aring; cookies.<BR><HR>'),
    'loginLoginBtn'         => 'Logga in',
    'loginCancelBtn'        => 'Avbryt',

    // pass.php
    'passTitle'             => 'Anv&auml;ndarhantering',
    'passUserExists'        => 'Anv&auml;ndare #user# finns redan.',
    'passNotMatch'          => 'L&ouml;senorden &auml;r olika.',
    'passNoUserSelected'    => 'Ingen anv&auml;ndare vald.',
    'passNoAdminDelete'     => 'Prim&auml;r DAlbum administrat&ouml;r kan inte tas bort.',
    'passWriteError'        => 'Det g&aring;r inte att skriva till l&ouml;senordsfilen!',
    'passError'             => '<B>Fel: </B>#error#',
    'passAddBtn'            => 'L&auml;gg till',
    'passDeleteBtn'         => 'Ta bort',
    'passChangePwdBtn'      => 'Byt l&ouml;senord',
    'passCloseBtn'          => 'St&auml;ng',
    'passCancelBtn'         => 'Avbryt',

    'passAddUserDlgTitle'   => 'L&auml;gg till anv&auml;ndare',
    'passChangePwdDlgTitle' => 'Byt l&ouml;senord',
    'passConfirmPassword'   => 'Verifiera l&ouml;senord:',

    // showimg.php
    'showPrevBtn'           => 'Föregående',
    'showPrevBtnTitle'      => 'Visa föregående foto',

    'showNextBtn'           => 'N&auml;sta',
    'showNextBtnTitle'      => 'Visa n&auml;sta foto',

    'showIndexBtn'          => 'Index',
    'showIndexBtnTitle'     => '&Aring;terg&aring; till albumindex',

    'showImageBtn'          => 'Visa foto',
    'showImageBtnTitle'     => 'Visa fotot enbart i ett nytt f&ouml;nster',

    'showHiResBtn'          => 'Originalfoto (#size#)',
    'showHiResBtnTitle'     => 'Visa original/h&ouml;guppl&ouml;st foto i ett nytt f&ouml;nster',

    'showShowDetailsBtn'        => 'Visa detaljer',
    'showShowDetailsBtnTitle'   => 'Visa EXIF fotodetaljer: N&auml;r foto &auml;r taget, Slutartider etc. (om tillg&auml;ngligt)',

    'showHideDetailsBtn'        => 'D&ouml;lj detaljer',
    'showHideDetailsBtnTitle'   => 'D&ouml;lj EXIF fotodetaljer',

    'showRotateBtn'             => 'Rotera',
    'showRotateBtnTitle'        => 'Rotera foto 90 grader medsols',

    'showUpdateBtn'             => 'Uppdatera',
    'showUpdateBtnTitle'        => 'Generera om storleks&auml;ndrad bild och tumnagel',

    'showExifFilename'          => 'Filnamn: ',
    'showExifFilesize'          => 'Filstorlek: ',
    'showExifResolution'        => 'Uppl&ouml;sning: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Datum: ',
    'showExifCamera'            => 'Kamera Modell: ',
    'showExifISO'               => 'ISO-värde: ',
    'showExifExposure'          => 'Exponering : ',
    'showExifAperture'          => 'Bl&auml;ndare: ',
    'showExifFocalLength'       => 'Br&auml;nnvidd: ',
    'showExifFlashYes'          => 'Ja',
    'showExifFlashNo'           => 'Nej',
    'showExifFlash'             => 'Blixt: ',
    'showExifDialogTitle'       => 'Detaljer orginalfoto',

    'showImageTitleImage'       => 'Klicka f&ouml;r att visa n&auml;sta foto: #image#',
    'showImageTitleIndex'       => 'Klicka f&ouml;r att &aring;terg&aring; till album index',


    // edit*.php
    'editTitle'                 => 'Editera #filename#',
    'editDlgTitle'              => 'Album definitions fil',
    'editFileLocation'          => 'Fil plats',

    'editEditAsTextBtn'         => 'Editera som text',
    'editEditAsTextBtnTitle'    => 'Editera denna fil som en vanlig text fil',
    'editReindexNote'           => 'Var v&auml;nligen notera att du m&aring;ste indexera om efter att du har &auml;ndrat fotostorlek inst&auml;llningarna f&ouml;r att &auml;ndringarna skall sl&aring; igenom',

    'editAlbumTitle'            => 'Albumtitel:',
    'editAlbumDate'             => 'Datum:',
    'editAlbumComment'          => 'Kommentar:',
    'editAlbumTitleImage'       => 'Titelfoto:',
    'editAlbumDefault'          => 'Förvalt album',
    'editAlbumUsers'            => 'Till&aring;tna anv&auml;ndare:',
    'editAlbumUsersNote'        => '(kommaseparerad anv.lista, tom str&auml;ng eller <B>all</B> = anonym tilltr&auml;de, <B>valid-user</B>=Alla beh&ouml;riga anv&auml;ndare)',

    'editCancelBtn'             => 'Avbryt',
    'editSaveBtn'               => 'Spara',

    'editThumbLink'             => '#filename# (&Ouml;ppnas i nytt f&ouml;nster)',
    'editImgFilename'           => 'Filnamn<BR><small>(&auml;ndra f&ouml;r att byta namn, rensa f&ouml;r att ta bort)</small>:',
    'editImgTitle'              => 'Titel:',
    'editImgComment'            => 'Kommentar:',
    'editImgResize'             => '&Auml;ndra storlek p&aring; foto',
    'editNewFileMessage'        => '( new file )',
    'editTop'                   => 'Top',

    'editRenameError'           => 'Det gick inte att &auml;ndra filnamn till #filename# - ogiltig fil&auml;ndelse',
    'editSaveError'             => 'Ett fel uppstod n&auml;r albumdefinitionerna skulle sparas i filen #filename#',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Text',

    // reindex.php
    'reindexTitle'              => 'DAlbum omindexering',
    'reindexDlgTitle'           => 'DAlbum omindexering',
    'reindexDlgComment'         => 'DAlbum omindexering söker i kataloger efter nya foton, skapar tumnaglar som saknas och uppdaterar databasinformationen.',
    'reindexDlgSpeed'           => 'Var v&auml;nlig ange omindexeringshastighet nedan:',

    'reindexSpeed0'             => '<B>Snabb</B>. Skapar bara tumnaglar och &auml;ndrar bildstorlek p&aring; foton som inte redan finns. Verifierar inte integriteten p&aring; fotot.',
    'reindexSpeed1'             => '<B>Medelm&aring;ttig</B>. Skapar b&aring;de nya och trasiga tumnaglar och &auml;ndrar bildstorlek p&aring; foton. Verifierar integriteten p&aring; fotot.',
    'reindexSpeed2'             => '<B>Långsam</B>. Samma som <B>Medelm&aring;ttig</B> men tar &auml;ven bort &auml;ndrade foto/tumnaglar som saknar referens.',
    'reindexSpeed3'             => '<B>Superlångsam</B>. Skapar om alla tumnaglar och &auml;ndrar bildstorleken p&aring; alla foton. Varning: Det kan ta flera timmar!',

    'reindexCancelBtn'          => 'Avbryt',
    'reindexStartBtn'           => 'Starta',

    'reindexProgressTitle'      => 'DAlbum omindexering p&aring;g&aring;r',

    'reindexError'              => 'Ett fel har uppst&aring;tt medans tumnaglarna f&ouml;r foto skulle skapas.',
    'reindexRetry'              => 'F&ouml;rs&ouml;k igen foto misslyckades',
    'reindexIgnore'             => 'Ignorera fel och forts&auml;tt',
    'reindexAgain'              => 'Starta om omindexeringen',

    'reindexMainImageProblem'   => 'Problem med uppladdat foto',
    'reindexResizedProblem'     => 'Problem med att &auml;ndra bildstorleken',
    'reindexThumbProblem'       => 'Problem med tumnagel',

    'reindexCompleted'          => '<P>Arbete utf&ouml;rt.</P><P>Omindexering tog #elapsed# sekunder. Albumens tr&auml;dstruktur skapades p&aring;  #treeelapsed# sekunder.</P>',
    'reindexStats'              => 'DAlbum statistik',
    'reindexStatsAlbums'        => 'Antal album:',
    'reindexStatsImages'        => 'Antal foton:',
    'reindexStatsOrigSize'      => 'Total storlek p&aring; originalfoton:',
    'reindexStatsResizedSize'   => 'Total storlek p&aring; &auml;ndrade foton:',
    'reindexStatsThumbSize'     => 'Total storlek p&aring; tumnaglarna:',

    'reindexStatusErrors'       => '<B>Status: </B> #errors# fel hittades:',

    'reindexStatusOK'           => '<B>Status: </B> Lyckades. Inga fel hittades.',
    'reindexSaveError'          => '<B>Fel: </B>Det gick inte att spara #filename#',

    'reindexTHFilename'         => 'Filnamn',
    'reindexTHProblem'          => 'Problem',

    // customizations

    // Image comments
    'cCommentsImageComments'        => 'Bildkommentarer',
    'cCommentsLoginToAddComments'   => 'Var v&auml;nlig #loginbutton# f&ouml;r att l&auml;gga till kommentarer.<BR>&nbsp;',
    'cCommentsYourName'             => 'Ditt namn:',
    'cCommentsComment'              => 'Kommentar:',
    'cCommentsSendButtonText'       => 'Skicka',
    'cCommentsDeleteButtonText'     => 'Ta Bort',
    'cCommentsMailSubject'          => 'Ny kommentar om bild #image# ( Album: #album# )',
    'cCommentsMailBody'             => "Ny kommentar inlagt av #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
    'cCommentsDateFormat'           => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'           => '-- Bildspel --',
    'cSlideshowSeconds'             => '#sec# Sekunder',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'I:',
    'cExiflineExposure'             => 'E:',
    'cExiflineAperture'             => 'A:',
    'cExiflineFlash'                => 'Blixt:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'            => 'Klicka f&ouml;r att &ouml;ppna "#title#"',
    'cCustomOpenBtn'                => '&Ouml;ppna fil',
    'cCustomOpenBtnTitle'           => '&Ouml;ppna fil "#title#" i detta f&ouml;nster',

    // Highligh modified albums
    'cModifiedNew'                  => 'ny!',
    'cModifiedUpdated'              => 'uppdaterad!',

    'indexPage'              => 'text.html.sv',
    'showExifMeteringMode'      => 'Ljusmätning:',
    'showExifExposureMode'      => 'Exponeringsläge:',
    'showExifLems'              => 'Objektiv',
    ''  => ''
);

?>