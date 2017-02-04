<?php

/*  DAlbum Hungarian language support file

    (c) Copyright 2005 by BandiBoy.hu

*/

$newlang=array(

    ///////////////////////////////
    // Index.php
    ///////////////////////////////
    'loginBtn'          => 'Belépés',
    'loginBtnTitle'     => 'Belépés',

    'logoutBtn'         => 'Kilépés',
    'logoutBtnTitle'    => 'Kilépés',

    'reindexBtn'        => 'Újra indexelés',
    'reindexBtnTitle'   => 'Új képek keresése és az adatbázis felülírása',

    'usrmgrBtn'         => 'Felhasználók',
    'usrmgrBtnTitle'    => 'Felhasználók hozzáadása/eltávólítása és jelszavak módosítása',

    'closeWindowBtn'    => 'Ablak bezárása',
    'closeWindowBtnTitle'=> 'Ezen ablak bezárása',

    'fullScreenBtn'         => 'Teljes képernyõ',
    'fullScreenBtnTitle'    => 'A oldal megnyitása teljesképernyõs ablakban. (F11)',

    'editDefBtn'            => 'Szerkesztés',
    'editDefBtnTitle'       => 'Az album címének és leírásának szerkesztése, továbbá képek kezelése',

    'indexUsername'         => 'Felhasználó:',
    'page'                  => 'Képek megjelenítése: #begin# - #end# összesen #count# kép. &nbsp; Oldal: &nbsp;',
    'noimages'              => 'Nincsenek képek',
    'noPublicImages'        => 'Nincs publikus kép. Kérlek, jelentkezz be!',
    'noscript'              => 'A mappanézet csak akkor látható, ha a böngészõdben bekapcsolod a Javascript támogatást.',

    'prevPageBtn'           => 'Elõzõ',
    'prevPageBtnTitle'      => 'Ugrás az elõzõ oldalra (#page#)',

    'nextPageBtn'           => 'Következõ',
    'nextPageBtnTitle'      => 'Ugrás a következõ oldalra (#page#)',

    'statusLeft'            => '<b>#TotalImages#</b> kép <b>#TotalAlbums#</b> albumban',
    'statusRight'           => '<a href="http://www.bandiboy.hu">Creted by BandiBoy</a>',

    // Common stuff
    'mainPage'              => 'Ugrás a fõoldalra',
    'username'              => 'Felhasználónév:',
    'password'              => 'Jelszó:',
    'bytes'                 => 'bájt',
    'KB'                    => 'KB',
    'MB'                    => 'MB',
    'pixels'                => 'képpont',
    'errorReturn'           => 'Vissza az elõzõ oldalra',

    /// Login.php
    'loginTitle'            =>  'Bejelentkezés ide: #title#',
    'loginAuthError'        =>  'Sikertelen belépés',
    'loginBadUserName'      =>  'A felhasználóneved vagy jelszavad nem található az adatbázisban.',
    'loginAgain'            =>  'Belépés ismét',
    'loginNoCookiesWarning' =>  '<HR><B>HIBA: a cookie-k ki vannak kapcsolva a böngészõdben!</B><BR>A mûködéshez be kell kapcsolni a cookie-kat.<BR>Kérlek kapcsold be a cookie-kat a böngészõd beállításainál, és frissítsd az oldalt!<BR><HR>',
    'loginLoginBtn'         => 'Belépés',
    'loginCancelBtn'        => 'Mégsem',

    // pass.php
    'passTitle'             => 'Felhasználó kezelõ',
    'passUserExists'        => '#user# felhasználó már létezik.',
    'passNotMatch'          => 'A jelszó nem egyezik.',
    'passNoUserSelected'    => 'Nincs felhasználó kiválasztva.',
    'passNoAdminDelete'     => 'Az elsõdleges DAlbum adminisztrátor nem törölhetõ.',
    'passWriteError'        => 'A jelszó fájl nem írható!',
    'passError'             => '<B>Hiba: </B>#error#',
    'passAddBtn'            => 'Hozzáadás',
    'passDeleteBtn'         => 'Törlés',
    'passChangePwdBtn'      => 'Jelszó megváltoztatása',
    'passCloseBtn'          => 'Bezár',
    'passCancelBtn'         => 'Mégsem',

    'passAddUserDlgTitle'   => 'Felhasználó hozzáadása',
    'passChangePwdDlgTitle' => 'Jelszó megváltoztatása',
    'passConfirmPassword'   => 'Jelszó megerõsítése:',

    // showimg.php
    'showPrevBtn'           => 'Elõzõ',
    'showPrevBtnTitle'      => 'Elõzõ kép mutatása',

    'showNextBtn'           => 'Következõ',
    'showNextBtnTitle'      => 'Következõ kép mutatása',

    'showIndexBtn'          => 'Index',
    'showIndexBtnTitle'     => 'Vissza az index-hez',

    'showImageBtn'          => 'Kép mutatása',
    'showImageBtnTitle'     => 'Kép mutatása új ablakban',

    'showHiResBtn'          => 'Eredeti (#size#)',
    'showHiResBtnTitle'     => 'Eredeti felbontású kép megjelenítése új ablakban',

    'showShowDetailsBtn'        => 'Adatok mutatása',
    'showShowDetailsBtnTitle'   => 'EXIF képadatok mutatása: dátum, shutter sebesség stb. (ha lehetséges)',

    'showHideDetailsBtn'        => 'Adatok rejtése',
    'showHideDetailsBtnTitle'   => 'EXIF képadatok rejtése',

    'showRotateBtn'             => 'Forgatás',
    'showRotateBtnTitle'        => 'Kép elforgatása jobbra 90 fokkal',

    'showUpdateBtn'             => 'Frissítés',
    'showUpdateBtnTitle'        => 'Újragenerálja az átméretezett képet és az elönézeti képet',

    'showExifFilename'          => 'Fájl név: ',
    'showExifFilesize'          => 'Fájl méret: ',
    'showExifResolution'        => 'Felbontás: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Dátum: ',
    'showExifCamera'            => 'Kamera típus: ',
    'showExifISO'               => 'ISO: ',
    'showExifExposure'          => 'Exposure: ',
    'showExifAperture'          => 'Aperture: ',
    'showExifFocalLength'       => 'Focal length: ',
    'showExifFlashYes'          => 'Igen',
    'showExifFlashNo'           => 'Nem',
    'showExifFlash'             => 'Flash fired: ',
    'showExifDialogTitle'       => 'Original image details',

    'showImageTitleImage'       => 'Kattints a következõ kép megjelenitéséhez: #image#',
    'showImageTitleIndex'       => 'Kattintásra vissza az album index-hez',


    // edit*.php
    'editTitle'                 => '#filename# szerkesztése',
    'editDlgTitle'              => 'Album definíciós file',
    'editFileLocation'          => 'Fájl helye',

    'editEditAsTextBtn'         => 'Szerkesztés szövegként',
    'editEditAsTextBtnTitle'    => 'Ezen fájl szerkesztése plain-text fájlként',
    'editReindexNote'           => 'Az átméretezés után újra kell indexelned',

    'editAlbumTitle'            => 'Album cím:',
    'editAlbumDate'             => 'Dátum:',
    'editAlbumComment'          => 'Leírás:',
    'editAlbumTitleImage'       => 'Title image:',
    'editAlbumDefault'          => 'Alapértelmezett album',
    'editAlbumUsers'            => 'Engedélyezett felhasználók:',
    'editAlbumUsersNote'        => '(vesszõvel elválasztott felhasználói lista, üres érték vagy <B>all</B> = anonymous elérés, <B>valid-user</B> = minden regisztrált felhasználó)',

    'editCancelBtn'             => 'Mégsem',
    'editSaveBtn'               => 'Mentés',

    'editThumbLink'             => '#filename# (megnyitás új ablakban)',
    'editImgFilename'           => 'Fájlnév<BR><small>(változtatsd meg az átnevezéshez, vagy hagyd üresen a törléshez)</small>:',
    'editImgTitle'              => 'Cím:',
    'editImgComment'            => 'Leírás:',
    'editImgResize'             => 'Kép átméretezése',
    'editNewFileMessage'        => '( új fájl )',
    'editTop'                   => 'Vissza az oldal tetejére',

    'editRenameError'           => '#filename# fájl nem nevezhetõ át - érvénytelen kiterjesztés',
    'editSaveError'             => 'Hiba lépett fel az album definíciós fájlának mentése közben: #filename#',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Szöveg',

    // reindex.php
    'reindexTitle'              => 'DAlbum újra indexelés',
    'reindexDlgTitle'           => 'DAlbum újra indexelés',
    'reindexDlgComment'         => 'DAlbum újra indexelés új képeket keres a mappákban, elkésziti a hiányzó elönézeti képeket és frissiti az adatbázist.',
    'reindexDlgSpeed'           => 'Válaszd ki az újra indexelés sebességét:',

    'reindexSpeed0'             => '<B>Gyors</B>: Csak még nem létezõ elõnézeti- és átméretezett képeket hoz létre. Nem ellenõrzi a képfájlok integritását.',
    'reindexSpeed1'             => '<B>Moderált</B>: Csak még nem létezõ, vagy hibás elõnézeti- és átméretezett képeket hoz létre. Ellenõrzi a képfájlok integritását.',
    'reindexSpeed2'             => '<B>Lassú</B>: Olyan, mint a <B>Moderált</B>, de törli is a referencia nélküli elõnézeti- és átméretezett képeket.',
    'reindexSpeed3'             => '<B>Nagyon lassú</B>: Újra létrehozza az összes elõnézeti- és átméretezett képet. Vigyázat: órákig tarthat!',

    'reindexCancelBtn'          => 'Mégsem',
    'reindexStartBtn'           => 'Indítás',

    'reindexProgressTitle'      => 'DAlbum újra indexelés folyamatban',

    'reindexError'              => 'Hiba lépett fel az elõnézeti kép létrehozásánál',
    'reindexRetry'              => 'Újra próbálkozás',
    'reindexIgnore'             => 'Kihagy és folytat',
    'reindexAgain'              => 'Újra indexelés újrakezdése',

    'reindexMainImageProblem'   => 'Feltöltött kép probléma',
    'reindexResizedProblem'     => 'Átméretezett kép probléma',
    'reindexThumbProblem'       => 'Elõnézeti kép probléma',

    'reindexCompleted'          => '<P>Mûvelet végrehajtva.</P><P>Az újra indexelés #elapsed# másodpercet vett igénybe. Album rendszer létrehozva #treeelapsed# másodperc alatt.</P>',
    'reindexStats'              => 'DAlbum statisztika',
    'reindexStatsAlbums'        => 'Albumok száma:',
    'reindexStatsImages'        => 'Képek száma:',
    'reindexStatsOrigSize'      => 'Az eredeti képek teljes mérete:',
    'reindexStatsResizedSize'   => 'Az átméretezett képek teljes mérete:',
    'reindexStatsThumbSize'     => 'Az elõnézeti képek teljes mérete:',

    'reindexStatusErrors'       => '<B>Állapot: </B> #errors# hiba található:',

    'reindexStatusOK'           => '<B>Állapot: </B> Kész. Hiba nem található.',
    'reindexSaveError'          => '<B>Hiba: </B>#filename# fájlt nem lehet menteni',

    'reindexTHFilename'         => 'Fiálnév',
    'reindexTHProblem'          => 'Probléma',

    // customizations

    // Image comments
    'cCommentsImageComments'        => 'Kép leírás',
    'cCommentsLoginToAddComments'   => 'Hozzászóláshozzáadásához lépj be: #loginbutton#<BR>&nbsp;',
    'cCommentsYourName'             => 'Neved:',
    'cCommentsComment'              => 'Leírás:',
    'cCommentsSendButtonText'       => 'Küld',
    'cCommentsDeleteButtonText'     => 'Törlés',
    'cCommentsMailSubject'          => 'Új hozzászólás #image# képhez ( Album: #album# )',
    'cCommentsMailBody'             => "Új hozzászólást küldte: #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
    'cCommentsDateFormat'           => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'           => '-- Slide show --',
    'cSlideshowSeconds'             => '#sec# másodperc',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'             => 'E:',
    'cExiflineAperture'             => 'A:',
    'cExiflineFlash'                => 'Flash:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'            => 'Kattint a megnyitáshoz: "#title#"',
    'cCustomOpenBtn'                => 'Fájl megnyitás',
    'cCustomOpenBtnTitle'           => '"#title#" megnyitása ebben az ablakban',

    // Highligh modified albums
    'cModifiedNew'                  => 'új!',
    'cModifiedUpdated'              => 'frissítve!',

    ''  => ''
);

?>