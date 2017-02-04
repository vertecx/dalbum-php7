<?php

/*  DAlbum Czech language support file

    (c) Copyright 2003 by Lubor Kemza

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
    'loginBtn'          => 'Pøihlásit',
    'loginBtnTitle'     => 'Pøihlásit',

    'logoutBtn'         => 'Odhlásit',
    'logoutBtnTitle'    => 'Odhlásit',

    'reindexBtn'        => 'Reindexace',
    'reindexBtnTitle'   => 'Hledání nových obrázkù a obnova databáze informací o obrázcích programu DAlbum',

    'usrmgrBtn'         => 'U¾ivatelé',
    'usrmgrBtnTitle'    => 'Pøidat/odebrate u¾ivatele a zmìnit hesla',

    'closeWindowBtn'        => 'Zavøít okno',
    'closeWindowBtnTitle'   => 'Zavøít toto okno',

    'fullScreenBtn'         => 'Na celou obrazovku',
    'fullScreenBtnTitle'    => 'Otevøe tuto stránku pøes celou obrazovku. Mù¾ete také zmáèknout F11...',

    'editDefBtn'        => 'Upravit',
    'editDefBtnTitle'   => 'Upravit název alba, komentáøe a spravovat obrázky',

    'indexUsername'     => 'U¾ivatel:',
    'page'              => 'Zobrazeno  #begin# - #end#  z #count# polo¾ek. &nbsp; Stránka: &nbsp;',
    'noimages'          => '®ádné obrázky',
    'noPublicImages'    => 'Galerie není pøístupná pro veøejnost. Pøihla¹te se prosím..',
    'noscript'          => 'Zobrazení slo¾ek je bohu¾el viditelné pouze se zapnutou podporou JavaScriptu ve Va¹em prohlí¾eèi.<BR><BR>',

    'prevPageBtn'       => 'Pøedchozí',
    'prevPageBtnTitle'  => 'Na pøedchozí stránku (#page#)',

    'nextPageBtn'       => 'Dal¹í',
    'nextPageBtnTitle'  => 'Na dal¹í stránku (#page#)',

    'statusLeft'        => '<b>#TotalImages#</b> obrázkù v <b>#TotalAlbums#</b> albech',
    'statusRight'       => '<a href="http://www.dalbum.org">Vytvoøeno programem DAlbum #version# &copy; 2003 DeltaX Inc. in #elapsed# s</a>',

    // Common stuff
    'mainPage'      => 'Na hlavní stránku',
    'username'      => 'U¾ivatel:',
    'password'      => 'Heslo:',
    'bytes'         => 'bytù',
    'KB'            => 'KB',
    'MB'            => 'MB',
    'pixels'        => 'pixelù',
    'errorReturn'   => 'Zpìt na pøedchozí stránku',

    /// Login.php
    'loginTitle'            => 'Login to #title#',
    'loginAuthError'        => 'Chyba pøihlá¹ení',
    'loginBadUserName'      => 'Va¹e u¾ivatelské jméno nebo heslo nebylo nalezeno v databázi',
    'loginAgain'            => 'Nové pøihlá¹ení',
    'loginNoCookiesWarning' => '<HR><B>Pozor: Ve Va¹em prohlí¾eèi máte vypnuté Cookies!</B><BR>Pokud chcete pokraèovat, musíte si podporu Cookies povolit.<BR>Povolte podporu cookies ve vlastnostech svého prohlí¾eèe a obnovte stránku.<BR><HR>',
    'loginLoginBtn'         => 'Pøihlásit',
    'loginCancelBtn'        => 'Zru¹it',

    // pass.php
    'passTitle'             => 'Správa u¾ivatelù',
    'passUserExists'        => '®ivatel #user# ji¾ existuje.',
    'passNotMatch'          => 'Hesla vzájemnì nesouhlasí.',
    'passNoUserSelected'    => 'Nebyl vybrán u¾ivatel.',
    'passNoAdminDelete'     => 'Hlavní správce DAlbum nemù¾e být odstranìn.',
    'passWriteError'        => 'Nelze otevøít soubor hesel na zápis!',
    'passError'             => '<B>Chyba: </B>#error#',
    'passAddBtn'            => 'Pøidat',
    'passDeleteBtn'         => 'Odstranit',
    'passChangePwdBtn'      => 'Zmìnit heslo',
    'passCloseBtn'          => 'Zavøít',
    'passCancelBtn'         => 'Zru¹it',

    'passAddUserDlgTitle'   => 'Pøidat u¾ivatele',
    'passChangePwdDlgTitle' => 'Zmìnit heslo',
    'passConfirmPassword'   => 'Potvrdit heslo:',

    // showimg.php
    'showPrevBtn'       => 'Pøedchozí',
    'showPrevBtnTitle'  => 'Ukázat pøedchozí obrázek',

    'showNextBtn'       => 'Dal¹í',
    'showNextBtnTitle'  => 'Ukázat dal¹í obrázek',

    'showIndexBtn'      => 'Seznam',
    'showIndexBtnTitle' => 'Zpìt na seznam alb',

    'showImageBtn'      => 'Ukázat obrázek',
    'showImageBtnTitle' => 'Ukázat v novém oknì pouze obrázek',

    'showHiResBtn'      => 'Pùvodní obrázek (#size#)',
    'showHiResBtnTitle' => 'Ukázat pùvodní obrázek ve vysokém rozli¹ení v novém oknì',

    'showShowDetailsBtn'      => 'Ukázat detaily',
    'showShowDetailsBtnTitle' => 'UKÁZAT EXIF detaily: Datum, rychlost zobrazení apod. (Je-li to mo¾né)',

    'showHideDetailsBtn'      => 'Skrýt detaily',
    'showHideDetailsBtnTitle' => 'Skrýt EXIF detaily',

    'showRotateBtn'       => 'Otoèit',
    'showRotateBtnTitle'  => 'Otoèit o 90 stupòù ve smìru hodinových ruèièek',

    'showUpdateBtn'       => 'Obnovit',
    'showUpdateBtnTitle'  => 'Vygenerování obrázku se zmìnìnou velikostí a náhledù',

    'showExifFilename'    => 'Název souboru: ',
    'showExifFilesize'    => 'Velikost souboru: ',
    'showExifResolution'  => 'Rozli¹ení: ',
    'showExifDateFormat'  => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'        => 'Datum: ',
    'showExifCamera'      => 'Model fotoaparátu: ',
    'showExifExposure'    => 'Expozice: ',
    'showExifAperture'    => 'Clona: ',
    'showExifFocalLength' => 'Ohnisková vzdálenost: ',
    'showExifFlashYes'    => 'Ano',
    'showExifFlashNo'     => 'Ne',
    'showExifFlash'       => 'Pou¾ití blesku: ',
    'showExifDialogTitle' => 'Detaily originálního obrázku',
    'showExifDialogTitle' => 'Detaily originálního obrázku',

    'showImageTitleImage'   => 'Kliknìte pro zobrazení dal¹ího obrázku: #image#',
    'showImageTitleIndex'   => 'Kliknìte pro návrat do seznamu alb',


    // edit*.php
    'editTitle'         => 'Upravit #filename#',
    'editDlgTitle'      => 'Konfiguraèní soubor alba',
    'editFileLocation'  => 'Umístìní souboru',

    'editEditAsTextBtn'     => 'Upravit jako text',
    'editEditAsTextBtnTitle'=> 'Upravit soubor jako èistý text',
    'editReindexNote'       => 'Nezapomeòte spustit reindexaci po zmìnì nastavení rozmìrù obrázku',

    'editAlbumTitle'      => 'Název Alba:',
    'editAlbumDate'       => 'Datum:',
    'editAlbumComment'    => 'Popis:',
    'editAlbumTitleImage' => 'Název obrázku:',
    'editAlbumDefault'    => 'Výchozí album',
    'editAlbumUsers'      => 'Povolení u¾ivatelé:',
    'editAlbumUsersNote'  => '(seznam u¾ivatelù oddìlených èárkou, prázdné pole nebo  <B>all</B> = anonymní pøístup, <B>valid-user</B>=v¹ichni pøihlá¹ení u¾ivatelé)',

    'editCancelBtn'     => 'Zru¹it',
    'editSaveBtn'       => 'Ulo¾it',

    'editThumbLink'       => '#filename# (Otevøení v novém oknì)',
    'editImgFilename'     => 'Soubor<BR><small>(zmìnit název nebo smazat)</small>:',
    'editImgTitle'        => 'Název:',
    'editImgComment'      => 'Popis:',
    'editImgResize'       => 'Zmìnit velikost obrázku',
    'editNewFileMessage'  => '( nový soubor )',
    'editTop'             => 'Nadpis',

    'editRenameError'   => 'Nelze zmìnit název souboru #filename# - ¹patná pøípopna souboru',
    'editSaveError'     => 'Nastala chyba pøi ukládání konfiguraèního souboru #filename#',
    'editHTMLSep'       => 'HTML (samostatná stránka)',
    'editHTML'          => 'HTML',
    'editText'          => 'Text',

    // reindex.php
    'reindexTitle'      => 'Reindexace programu DAlbum',
    'reindexDlgTitle'   => 'Reindexace programu DAlbum',
    'reindexDlgComment' => 'Reindexace programu DAlbum prohledává slo¾ky s novými obrázky, vytváøí chybìjící náhledy a obnovuje and updates informace v databázi obrázkù.',
    'reindexDlgSpeed'   => 'Zvolte si prosím rychlost reindexace:',

    'reindexSpeed0'     => '<B>Rychlá</B>. Vytváøí pouze neexistující náhledy a obrázky se zmìnìnou velikostí. Neovìøuje integritu souborù s obrázky.',
    'reindexSpeed1'     => '<B>Moderovaná</B>. Vytváøí pouze neexistující nebo poru¹ené náhledy a obrázky se zmìnìnou velikostí. Ovìøuje integritu souborù s obrázky',
    'reindexSpeed2'     => '<B>Pomalá</B>. Stejnì jako <B>Moderovaná</B>, ale navíc ma¾e neidentifikované náhledy a obrázky se zmìnìnou velikosti.',
    'reindexSpeed3'     => '<B>Extémnì pomalá</B>. Vytváøí znovu v¹echny náhledy a obrázky se zmìnìnou velikostí. Pozor:: to mù¾e trvat nìkolik hodin!',

    'reindexCancelBtn'  => 'Zru¹it',
    'reindexStartBtn'   => 'Start',

    'reindexProgressTitle'  => 'Probíhá reindexace programu DAlbum',

    'reindexError'      => 'Nastala chyba pøi vytváøení náhledu pro obrázek',
    'reindexRetry'      => 'Opakovat reindexaci na obrázkus chybou',
    'reindexIgnore'     => 'Ignorovat chybu a pokraèovat',
    'reindexAgain'      => 'Spustit reindexaci znovu',

    'reindexMainImageProblem'   => 'Problém pøi nahrávání souboru',
    'reindexResizedProblem'     => 'Problém se zmìnou velikosti obrázku',
    'reindexThumbProblem'       => 'Problém pøi vytváøení náhledu',

    'reindexCompleted'        => '<P>Úloha dokonèena.</P><P>Reindexace trvala #elapsed# sekund. Stomová struktura alb byla vytvoøena za #treeelapsed# sekund.</P>',
    'reindexStats'            => 'DAlbum statistika',
    'reindexStatsAlbums'      => 'Poèet alb:',
    'reindexStatsImages'      => 'Poèet obrázkù:',
    'reindexStatsOrigSize'    => 'Celková velikost pùvodních obrázkù:',
    'reindexStatsResizedSize' => 'Celková velikost obrázkù se zmìnìnou velikostí:',
    'reindexStatsThumbSize'   => 'Celková velikost náhledù:',

    'reindexStatusErrors'   => '<B>Výsledek: </B>Bylo nalezeno #errors# chyb.',

    'reindexStatusOK'   => '<B>Výsledek: </B> Úspì¹né zakonèení - bez chyb.',
    'reindexSaveError'  => '<B>Chyba: </B>Nelze ulo¾it #filename#',

    'reindexTHFilename' => 'Soubor',
    'reindexTHProblem'  => 'Problém',

    // customizations

    // Image comments
    'cCommentsImageComments'        => 'Komentáø obrázku',
    'cCommentsLoginToAddComments'   => 'K vlo¾ení Va¹ich komentáøù #loginbutton#.<BR>&nbsp;',
    'cCommentsYourName'             => 'Va¹e jméno:',
    'cCommentsComment'              => 'Komentáø:',
    'cCommentsSendButtonText'       => 'Odeslat',
    'cCommentsDeleteButtonText'     => 'Smazat',
    'cCommentsMailSubject'          => 'Nový komentáø obrázku #image# ( Z alba: #album# )',
    'cCommentsMailBody'             => "Nový komentáø byl odeslán u¾ivatelem #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
    'cCommentsDateFormat'           => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'           => '-- Prezentace --',
    'cSlideshowSeconds'             => '#sec# sekund',
    'cSlideshowStopTitle'           => 'Kliknìte pro zastavení prezentace',
    
    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'             => 'E:',
    'cExiflineAperture'             => 'A:',
    'cExiflineFlash'                => 'Blesk:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',
    'cExiflineFocal'                => 'F:',

    // Custom file types
    'cCustomClickToOpen'            => 'Kliknìte pro otevøení "#title#"',
    'cCustomOpenBtn'                => 'Otevøít soubor',
    'cCustomOpenBtnTitle'           => 'Otevøít soubor "#title#" v aktuálním oknì',

    // Highligh modified albums
    'cModifiedNew'                  => 'nový!',
    'cModifiedUpdated'              => 'aktualizovaný!',

    // ZIP
    'cZipBtn'                    => 'Stáhnout jako ZIP archiv (#size#)',
    'cZipBtnTitle'               => 'Stáhnout celé album jako ZIP archiv (#size#)',
    
    ''  => ''
);

?>
