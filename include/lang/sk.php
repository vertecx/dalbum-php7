<?php

/*  DAlbum Slovak language support file

    (c) Copyright 2003 by Peter Mikula

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
    'loginBtn'      => 'Prihlásit',
    'loginBtnTitle'     => 'Prihlásit',

    'logoutBtn'         => 'Odhlásit',
    'logoutBtnTitle'    => 'Odhlásit',

    'reindexBtn'        => 'Reindexácia',
    'reindexBtnTitle'   => 'Hladanie nových obrázkou a obnova databáze informacií o obrázkoch programu DAlbum',

    'usrmgrBtn'         => 'Užívatelia',
    'usrmgrBtnTitle'    => 'Pridat/odobrat užívatela a zmenit heslá',

    'closeWindowBtn'    => 'Zavriet okno',
    'closeWindowBtnTitle'   => 'Zavriet toto okno',

    'fullScreenBtn'     => 'Na celú obrazovku',
    'fullScreenBtnTitle'    => 'Otvorte túto stránku cez celou obrazovku. Môžete tiež stlaèit F11...',

    'editDefBtn'        => 'Upravit',
    'editDefBtnTitle'   => 'Upravit názov albumu, komentára a spravovat obrázky',

    'indexUsername'     => 'Uživatel:',
    'page'          => 'Zobrazené  #begin# - #end#  z #count# položiek. &nbsp; Stránka: &nbsp;',
    'noimages'      => 'Žiadne obrázky',
    'noPublicImages'    => 'Galéria neni prístupná pre verejnost. Prihláste se prosím..',
    'noscript'      => 'Zobrazenie zložiek je bohužial vyditelné len so zapnutou podporou JavaScriptu vo Vašom prehliadaèi.<BR><BR>',

    'prevPageBtn'       => 'Predolšá',
    'prevPageBtnTitle'  => 'Na predošlú stránku (#page#)',

    'nextPageBtn'       => 'Dalšia',
    'nextPageBtnTitle'  => 'Na dalšiu stránku (#page#)',

    'statusLeft'        => '<b>#TotalImages#</b> obrázkou v <b>#TotalAlbums#</b> albumoch',
    'statusRight'       => '<a href="http://www.dalbum.org">Vytvorené programom DAlbum #version# &copy; 2003 DeltaX Inc. in #elapsed# s</a>',

    // Common stuff
    'mainPage'      => 'Na hlavnú stránku',
    'username'      => 'Užívatel:',
    'password'      => 'Heslo:',
    'bytes'         => 'bytov',
    'KB'            => 'KB',
    'MB'            => 'MB',
    'pixels'        => 'pixelov',
    'errorReturn'       => 'Zpät na predošlú stránku',

    /// Login.php
    'loginTitle'        => 'Login to #title#',
    'loginAuthError'    => 'Chyba prihlásenia',
    'loginBadUserName'  => 'Vaše uživatelské meno alebo heslo nebolo nájdené v databázi',
    'loginAgain'        => 'Nové prihlásenie',
    'loginNoCookiesWarning' => '<HR><B>Pozor: Vo Vašom priehladaèi máte vypnuté Cookies!</B><BR>Pokial chcete pokraèovat, musíte si podporu Cookies povolit.<BR>Povolte podporu cookies vo vlastnostnostiach svojho prehliadaèa a obnovte stránku.<BR><HR>',
    'loginLoginBtn'     => 'Prihlásit',
    'loginCancelBtn'    => 'Zrušit',

    // pass.php
    'passTitle'     => 'Správa užívatelov',
    'passUserExists'    => 'Užívatel #user# už existuje.',
    'passNotMatch'      => 'Heslá vzájomne nesúhlasia.',
    'passNoUserSelected'    => 'Nebol vybraný užívatel.',
    'passNoAdminDelete' => 'Hlavný správca DAlbum nemôže byt odstranený.',
    'passWriteError'    => 'Nedá sa otvorit súbor hesiel na zápis!',
    'passError'     => '<B>Chyba: </B>#error#',
    'passAddBtn'        => 'Pridat',
    'passDeleteBtn'     => 'Odstranit',
    'passChangePwdBtn'  => 'Zmenit heslo',
    'passCloseBtn'      => 'Zavriet',
    'passCancelBtn'     => 'Zrušit',

    'passAddUserDlgTitle'   => 'Pridat užívatela',
    'passChangePwdDlgTitle' => 'Zmenit heslo',
    'passConfirmPassword'   => 'Potvrdit heslo:',

    // showimg.php
    'showPrevBtn'       => 'Predošlí',
    'showPrevBtnTitle'  => 'Ukázat predošlí obrázok',

    'showNextBtn'       => 'Další',
    'showNextBtnTitle'  => 'Ukázat další obrázok',

    'showIndexBtn'      => 'Zoznam',
    'showIndexBtnTitle'     => 'Zpät na zoznam albumov',

    'showImageBtn'      => 'Ukázat obrázok',
    'showImageBtnTitle'     => 'Ukázat v novóm okne len obrázok',

    'showHiResBtn'      => 'Pôvodný obrázok (#size#)',
    'showHiResBtnTitle'     => 'Ukázat pôvodný obrázok vo vysokom rozlíšení v novom okne',

    'showShowDetailsBtn'    => 'Ukázat detaily',
    'showShowDetailsBtnTitle'    => 'UKÁZAT EXIF detaily: Datum, rýchlost zobrazenia apod. (Ak je to možné)',

    'showHideDetailsBtn'    => 'Skryt detaily',
    'showHideDetailsBtnTitle'    => 'Skryt EXIF detaily',

    'showRotateBtn'     => 'Otoèit',
    'showRotateBtnTitle'    => 'Otoèit o 90 stupòov v smere hodinových ruèièiek',

    'showUpdateBtn'     => 'Obnovit',
    'showUpdateBtnTitle'    => 'Vygenerovanie obrázku so zmeòenou velkostou a náhladov',

    'showExifFilename'  => 'Názov súboru: ',
    'showExifFilesize'  => 'Velkost súboru: ',
    'showExifResolution'    => 'Rozlišenie: ',
    'showExifDateFormat'    => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'      => 'Dátum: ',
    'showExifCamera'    => 'Model fotoaparátu: ',
    'showExifExposure'  => 'Expozícia: ',
    'showExifAperture'  => 'Clona: ',
    'showExifFocalLength'   => 'Ohnisková vzdialenost: ',
    'showExifFlashYes'  => 'Áno',
    'showExifFlashNo'   => 'Nie',
    'showExifFlash'     => 'Použitie blesku: ',
    'showExifDialogTitle'   => 'Detaily originálneho obrázku',
    'showExifDialogTitle'       => 'Detaily originálneho obrázku',

    'showImageTitleImage'   => 'Kliknite pre zobrazenie dalšieho obrázku: #image#',
    'showImageTitleIndex'   => 'Kliknite pre návrat do zoznamu albumov',


    // edit*.php
    'editTitle'     => 'Upravit #filename#',
    'editDlgTitle'      => 'Konfiguraèný súbor albumu',
    'editFileLocation'  => 'Umiestnenie súborov',

    'editEditAsTextBtn' => 'Upravit ako text',
    'editEditAsTextBtnTitle'=> 'Upravit súbor ako èistý text',
    'editReindexNote'   => 'Nezabudnite spustit reindexáciu po zmene nastavenia rozmerov obrázku',

    'editAlbumTitle'    => 'Názov Albumu:',
    'editAlbumDate'     => 'Dátum:',
    'editAlbumComment'  => 'Popis:',
    'editAlbumTitleImage'   => 'Názov obrázku:',
    'editAlbumDefault'  => 'Hlavný album',
    'editAlbumUsers'    => 'Povolení užívatelia:',
    'editAlbumUsersNote'    => '(zoznam ulívatelov oddelených èiarkov, prázdne pole alebo  <B>all</B> = anonymní prístup, <B>valid-user</B>=všetci prihlásení užívatelia)',

    'editCancelBtn'     => 'Zrušit',
    'editSaveBtn'       => 'Uložit',

    'editThumbLink'     => '#filename# (Otvorenie v novom okne)',
    'editImgFilename'   => 'Súbor<BR><small>(zmenit názov alebo zmazat)</small>:',
    'editImgTitle'      => 'Názov:',
    'editImgComment'    => 'Popis:',
    'editImgResize'     => 'Zmenit velkost obrázku',
    'editNewFileMessage'    => '( nový súbor )',
    'editTop'       => 'Nadpis',

    'editRenameError'   => 'Nedá sa zmenit názov súboru #filename# - ¹zlá prípona súboru',
    'editSaveError'     => 'Nastala chyba pri ukladaní konfiguraèného súboru #filename#',
    'editHTML'      => 'HTML',
    'editText'      => 'Text',

    // reindex.php
    'reindexTitle'      => 'Reindexácia programu DAlbum',
    'reindexDlgTitle'   => 'Reindexácia programu DAlbum',
    'reindexDlgComment' => 'Reindexácia programu DAlbum prehladáva zložky s novými obrázkami, vytvára chybajúce náhlady a obnovuje informácie v databáze obrázkov.',
    'reindexDlgSpeed'   => 'Zvolte si prosím rychlost reindexácie:',

    'reindexSpeed0'     => '<B>Rychlá</B>. Vytvára len neexistujúce náhlady a obrázky so zmenenou velkostou. Nekontroluje integritu obrázkou.',
    'reindexSpeed1'     => '<B>Moderovaná</B>. Vytvára len neexistujúce alebo porušené náhlady a obrázky so zmenenou velkostou. Kontroluje integritu obrázkou',
    'reindexSpeed2'     => '<B>Pomalá</B>. Rovnaká ako <B>Moderovaná</B>, ale naviac maže neidentifikované náhlady a obrázky so zmenenou velikosti.',
    'reindexSpeed3'     => '<B>Extémnì pomalá</B>. Vytvára znovu všetky náhledy a obrázky so zmenenou velkostou. Pozor:: môže to trvat až niekolko hodín!',

    'reindexCancelBtn'  => 'Zrušit',
    'reindexStartBtn'   => 'Štart',

    'reindexProgressTitle'  => 'Prebieha reindexácia programu DAlbum',

    'reindexError'      => 'Nastala chyba pri vytváraní náhladu pre obrázok',
    'reindexRetry'      => 'Opakovat reindexáciu na obrázku s chybou',
    'reindexIgnore'     => 'Ignorovat chybu a pokraèovat',
    'reindexAgain'      => 'Spustit reindexáciu znova',

    'reindexMainImageProblem'   => 'Problém pri nahrávaní súboru',
    'reindexResizedProblem'     => 'Problém so zmenenou velkostou obrázku',
    'reindexThumbProblem'       => 'Problém pri vytváraní náhladu',

    'reindexCompleted'  => '<P>Úloha dokonèená.</P><P>Reindexácia trvala #elapsed# sekund. Stromová štruktúra albumov bola vytvorená za #treeelapsed# sekund.</P>',
    'reindexStats'      => 'DAlbum štatistika',
    'reindexStatsAlbums'    => 'Poèet albumov:',
    'reindexStatsImages'    => 'Poèet obrázkov:',
    'reindexStatsOrigSize'  => 'Celková velkost pôvodných obrázkov:',
    'reindexStatsResizedSize'   => 'Celková velkost obrázkov so zmenenou velkostou:',
    'reindexStatsThumbSize'     => 'Celková velkost náhladov:',

    'reindexStatusErrors'   => '<B>Výsledok: </B>Našlo sa #errors# chyb.',

    'reindexStatusOK'   => '<B>Výsledok: </B> Úspešné zakonèenie - bez chýb.',
    'reindexSaveError'  => '<B>Chyba: </B>Nejde ukonèit #filename#',

    'reindexTHFilename' => 'Súbor',
    'reindexTHProblem'  => 'Problém',

    // customizations

    // Image comments
    'cCommentsImageComments'        => 'Komentár obrázku',
    'cCommentsLoginToAddComments'   => 'Na vlolenie Vašich komentárov #loginbutton#.<BR>&nbsp;',
    'cCommentsYourName'             => 'Vaše meno:',
    'cCommentsComment'              => 'Komentár:',
    'cCommentsSendButtonText'       => 'Odoslat',
    'cCommentsDeleteButtonText'     => 'Zmazat',
    'cCommentsMailSubject'          => 'Nový komentár obrázku #image# ( Z albumu: #album# )',
    'cCommentsMailBody'             => "Nový komentár bol pridaný užívatelom #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
    'cCommentsDateFormat'           => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'           => '-- Slide show --',
    'cSlideshowSeconds'             => '#sec# sekúnd',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'             => 'E:',
    'cExiflineAperture'             => 'A:',
    'cExiflineFlash'                => 'Blesk:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'            => 'Kliknite pre otvorenie "#title#"',
    'cCustomOpenBtn'                => 'Otevorit súbor',
    'cCustomOpenBtnTitle'           => 'Otevorit súbor "#title#" v aktuálnom okne',

    // Highligh modified albums
    'cModifiedNew'                  => 'nový!',
    'cModifiedUpdated'              => 'aktualizovaný!',

    ''  => ''
);

?>