<?php

/*  DAlbum English-US language support file

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
    'loginBtn'          => 'Logi sisse',
    'loginBtnTitle'     => 'Logi sisse',

    'logoutBtn'         => 'Logi välja',
    'logoutBtnTitle'    => 'Logi välja',

    'reindexBtn'        => 'Reindekseeri',
    'reindexBtnTitle'   => 'Otsi uusi pilte ja täienda DAlbumi andmebaasi',

    'usrmgrBtn'         => 'Kasutajad',
    'usrmgrBtnTitle'    => 'Lisa/kustuta kasutajaid ja muuda salasõnu',

    'closeWindowBtn'    => 'Sulge aken',
    'closeWindowBtnTitle'=> 'Sulge see aken',

    'fullScreenBtn'         => 'Täisekraanvaade',
    'fullScreenBtnTitle'    => 'Ava leht täisekraanvaates või vajuta F11 klahvi',

    'editDefBtn'            => 'Redigeeri',
    'editDefBtnTitle'       => 'Muuda albumi nime, kommentaare ja redigeeri albumi pilte',

    'indexUsername'         => 'Kasutaja:',
    'page'                  => 'Näitan #begin# - #end# kokku #count# -st. &nbsp; Leht: &nbsp;',
    'noimages'              => 'Pilte pole',
    'noPublicImages'        => 'Ei ühtki avalikku pilti. Palun logi sisse.',
    'noscript'              => 'Vabandust, kaustavaadet näidatakse ainult siis, kui brauseri Javascripti tugi on sisse lülitatud.<BR><BR>Ava brauseri eelistused ja luba Javasgript selle veebi kohta.',

    'prevPageBtn'           => 'Eelmine',
    'prevPageBtnTitle'      => 'Mine eelmisele lehele (#page#)',

    'nextPageBtn'           => 'Järgmine',
    'nextPageBtnTitle'      => 'Mine järgmisele lehele (#page#)',

    'statusLeft'            => '<b>#TotalImages#</b> pilti <b>#TotalAlbums#</b> albumites',
    'statusRight'           => '<a href="http://www.dalbum.org">Genereeritud DAlbumi versiooni #version# poolt &copy; 2003 DeltaX Inc. #elapsed# sekundiga</a>',

    // Common stuff
    'mainPage'              => 'Mine pealehele',
    'username'              => 'Kasutajanimi:',
    'password'              => 'Salasõna:',
    'bytes'                 => 'baiti',
    'KB'                    => 'KB',
    'MB'                    => 'MB',
    'pixels'                => 'pikslit',
    'errorReturn'           => 'Tagasi eelmisele lehele',

    /// Login.php
    'loginTitle'            =>  'Logi sisse #title#-sse',
    'loginAuthError'        =>  'Autentimise viga',
    'loginBadUserName'      =>  'Teie kasutajanimi ja/või salasõna puudub andmebaasis.',
    'loginAgain'            =>  'Logi uuesti sisse',
    'loginNoCookiesWarning' =>  '<HR><B>Hoiatus: Brauseri küpsised - Cookies - ei ole lubatud!</B><BR>Jätkamiseks tuleb need lubada.<BR>Palun luba küpsised brauseri seadetes ja värskenda siis lehte.<BR><HR>',
    'loginLoginBtn'         => 'Logi sisse',
    'loginCancelBtn'        => 'Tühista',

    // pass.php
    'passTitle'             => 'Kasutajahaldus',
    'passUserExists'        => 'Kasutaja #user# on juba olemas.',
    'passNotMatch'          => 'Salasõnad ei kattu.',
    'passNoUserSelected'    => 'Ühtki kasutajat pole valitud.',
    'passNoAdminDelete'     => 'Esmast DAlbumi administraatorit ei saa kustutada.',
    'passWriteError'        => 'Salasõnafaili ei õnnestu muutmiseks avada!',
    'passError'             => '<B>Viga: </B>#error#',
    'passAddBtn'            => 'Lisa',
    'passDeleteBtn'         => 'Kustuta',
    'passChangePwdBtn'      => 'Muuda salasõna',
    'passCloseBtn'          => 'Sulge',
    'passCancelBtn'         => 'Tühista',

    'passAddUserDlgTitle'   => 'Lisa kasutaja',
    'passChangePwdDlgTitle' => 'Muuda salasõna',
    'passConfirmPassword'   => 'Kinnita salasõna:',

    // showimg.php
    'showPrevBtn'           => 'Eelmine',
    'showPrevBtnTitle'      => 'Näita eelmist pilti',

    'showNextBtn'           => 'Järgmine',
    'showNextBtnTitle'      => 'Näita järgmist pilti',

    'showIndexBtn'          => 'Sisukord',
    'showIndexBtnTitle'     => 'Tagasi albumi sisukorra juurde',

    'showImageBtn'          => 'Näita pilti',
    'showImageBtnTitle'     => 'Näita uues aknas ainult pilti',

    'showHiResBtn'          => 'Originaalsuurus (#size#)',
    'showHiResBtnTitle'     => 'Näita uues aknas originaalsuuruses pilti',

    'showShowDetailsBtn'        => 'Näita detaile',
    'showShowDetailsBtnTitle'   => 'Näita pildi EXIF detaile: Kuupäeva, jne. (kui võimalik)',

    'showHideDetailsBtn'        => 'Peida detailid',
    'showHideDetailsBtnTitle'   => 'Peida pildi EXIF detailid',

    'showRotateBtn'             => 'Pööra',
    'showRotateBtnTitle'        => 'Pööra pilti 90 kraadi päripäeva',

    'showUpdateBtn'             => 'Täienda',
    'showUpdateBtnTitle'        => 'Regenereeri muudetud suurusega pildid ja pisipildid',

    'showExifFilename'          => 'Faili nimi: ',
    'showExifFilesize'          => 'Faili suurus: ',
    'showExifResolution'        => 'Resolutsioon: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Kuupäev: ',
    'showExifCamera'            => 'Kaamera: ',
    'showExifISO'               => 'ISO: ',
    'showExifExposure'          => 'Exposure: ',
    'showExifAperture'          => 'Aperture: ',
    'showExifFocalLength'       => 'Focal length: ',
    'showExifFlashYes'          => 'Jah',
    'showExifFlashNo'           => 'Ei',
    'showExifFlash'             => 'Välklamp: ',
    'showExifDialogTitle'       => 'Pildi originaaldetailid',

    'showImageTitleImage'       => 'Klõpsa järgmise pildi vaatamiseks: #image#',
    'showImageTitleIndex'       => 'Klõpsa albumi sisukorra juurde tagasi pöördumiseks',


    // edit*.php
    'editTitle'                 => 'Redigeeri #filename#',
    'editDlgTitle'              => 'Albumi definitsioonifail',
    'editFileLocation'          => 'Faili asukoht',

    'editEditAsTextBtn'         => 'Muuda tekstina',
    'editEditAsTextBtnTitle'    => 'Muuda faili tekstifailina',
    'editReindexNote'           => 'Palun arvesta, et peale pildi suuruse seadete muutumist tuleb reindekseerida',

    'editAlbumTitle'            => 'Albumi nimi:',
    'editAlbumDate'             => 'Kuupäev:',
    'editAlbumComment'          => 'Kommentaar:',
    'editAlbumTitleImage'       => 'Nimipilt:',
    'editAlbumDefault'          => 'Vaikimisi album',
    'editAlbumUsers'            => 'Lubatud kasutajad:',
    'editAlbumUsersNote'        => '(komaga eraldatud kasutajate loend, tühi väli või <B>all</B> = anonüümne ligipääs, <B>valid-user</B>=iga autenditud kasutaja)',

    'editCancelBtn'             => 'Tühista',
    'editSaveBtn'               => 'Salvesta',

    'editThumbLink'             => '#filename# (avaneb uues aknas)',
    'editImgFilename'           => 'Failinimi<BR><small>(ümbernimetamiseks muuda, kustutamiseks puhasta lahter)</small>:',
    'editImgTitle'              => 'Pealkiri:',
    'editImgComment'            => 'Kommentaar:',
    'editImgResize'             => 'Muuda pildi suurust',
    'editNewFileMessage'        => '( uus fail )',
    'editTop'                   => 'Üles',

    'editRenameError'           => 'Faili #filename# nime ei saa muuta - vigane faililaiend',
    'editSaveError'             => 'Albumi definitsioonifaili #filename# muutmisel tekkis viga',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Tekst',

    // reindex.php
    'reindexTitle'              => 'DAlbumi reindekseerimine',
    'reindexDlgTitle'           => 'DAlbumi reindekseerimine',
    'reindexDlgComment'         => 'DAlbum reindekseerimine otsib uutele piltidele andmekaustu, loob puuduvad pisipildid ja täiendab pildiandmebaasi.',
    'reindexDlgSpeed'           => 'Määra allpool reindekseerimise kiirus:',

    'reindexSpeed0'             => '<B>Kiire</B>. Loob üksnes puuduvad pisipildid ja muudetud suurusega pildid. Ei kontrolli pildifaile.',
    'reindexSpeed1'             => '<B>Mõõdukas</B>. Loob üksnes puuduvad või  vigased pisipildid ja muudetud suurusega pildid. Kontrollib pildifaile.',
    'reindexSpeed2'             => '<B>Aeglane</B>. Sama, mis <B>Mõõdukas</B>, kuid ühtlasi kustutab tarbetud pisipildid ja muudetud suurusega pildid.',
    'reindexSpeed3'             => '<B>Üliaeglane</B>. Loob uuesti kõik pisipildid ja muudetud suurusega pildid. Hoiatus: võib võtta mitu tundi!',

    'reindexCancelBtn'          => 'Tühista',
    'reindexStartBtn'           => 'Alusta',

    'reindexProgressTitle'      => 'Toimub DAlbumi reindekseerimine',

    'reindexError'              => 'Pisipildi loomisel tekkis viga',
    'reindexRetry'              => 'Proovi uuesti',
    'reindexIgnore'             => 'Eira viga ja jätka',
    'reindexAgain'              => 'Käivita reindekseerimine uuesti',

    'reindexMainImageProblem'   => 'Probleem üleslaetud pildiga',
    'reindexResizedProblem'     => 'Probleem muudetud suurusega pildiga',
    'reindexThumbProblem'       => 'Probleem pisipildiga',

    'reindexCompleted'          => '<P>Operatsioon lõpetatud.</P><P>Reindekseerimine kestis #elapsed# sekundit. Albumi struktuuri loomine kestis #treeelapsed# sekundit.</P>',
    'reindexStats'              => 'DAlbumi statistika',
    'reindexStatsAlbums'        => 'Albumite arv:',
    'reindexStatsImages'        => 'Piltide arv:',
    'reindexStatsOrigSize'      => 'Originaalpiltide kogusuurus:',
    'reindexStatsResizedSize'   => 'Muudetud suurusega piltide kogusuurus:',
    'reindexStatsThumbSize'     => 'Pisipiltide kogusuurus:',

    'reindexStatusErrors'       => '<B>Seisund: </B>Leiti #errors# viga:',

    'reindexStatusOK'           => '<B>Seisund: </B> Korras. Vigu ei leitud.',
    'reindexSaveError'          => '<B>Viga: </B> Võimatu salvestada #filename#',

    'reindexTHFilename'         => 'Failinimi',
    'reindexTHProblem'          => 'Probleem',

    // customizations

    // Image comments
    'cCommentsImageComments'        => 'Pildi kommentaarid',
    'cCommentsLoginToAddComments'   => 'Palun #loginbutton# kommentaaride lisamiseks.<BR>&nbsp;',
    'cCommentsYourName'             => 'Sinu nimi:',
    'cCommentsComment'              => 'Kommentaar:',
    'cCommentsSendButtonText'       => 'Saada',
    'cCommentsDeleteButtonText'     => 'Kustuta',
    'cCommentsMailSubject'          => 'Uus kommentaar  pildi #image# kohta ( Album: #album# )',
    'cCommentsMailBody'             => "Postitatud #user# poolt, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
    'cCommentsDateFormat'           => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'           => '-- Slaidishow --',
    'cSlideshowSeconds'             => '#sec# sekundit',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'             => 'E:',
    'cExiflineAperture'             => 'A:',
    'cExiflineFlash'                => 'Flash:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'            => 'Klõpsa "#title#" avamiseks',
    'cCustomOpenBtn'                => 'Ava fail',
    'cCustomOpenBtnTitle'           => 'Ava fail "#title#" samas aknas',

    // Highligh modified albums
    'cModifiedNew'                  => 'uus!',
    'cModifiedUpdated'              => 'täiendatud!',

    ''  => ''
);

?>