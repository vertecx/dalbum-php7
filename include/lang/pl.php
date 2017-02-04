<?php

/*  DAlbum Polish language support file

    (c) Copyright 2003 by Tomek Winiarski

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


/*

For proper displaying Polish letters page must be in ISO-8859-2

*/

$newlang=array(

    ///////////////////////////////
    // Index.php
    ///////////////////////////////
    'loginBtn'          => 'Log in',
    'loginBtnTitle'     => 'Log in',

    'logoutBtn'         => 'Log out',
    'logoutBtnTitle'    => 'Log out',

    'reindexBtn'        => 'Reindex',
    'reindexBtnTitle'   => 'Przeszukiwanie i aktualizacja album�w',

    'usrmgrBtn'         => 'U�ytkownicy',
    'usrmgrBtnTitle'    => 'Zarz�dzanie u�ytkownikami i has�ami',

    'closeWindowBtn'    => 'Zamknij okno',
    'closeWindowBtnTitle'=> 'Zamyka to okno',

    'fullScreenBtn'         => 'Pe�ny ekran',
    'fullScreenBtnTitle'    => 'Prze�acza t� stron� na pe�ny ekran (to samo powoduje naci�ni�cie klawisza F11) ',

    'editDefBtn'            => 'Edycja',
    'editDefBtnTitle'       => 'Edycja nazwy albumu, komentarzy i zarz�dzanie zdj�ciami',

    'indexUsername'         => 'U�ytkownik:',
    'page'                  => 'Zdj�cia #begin# - #end# z #count#. &nbsp; Strona: &nbsp;',
    'noimages'              => 'Brak zdj��',
    'noPublicImages'        => 'Brak zdj�� dost�pnych bez uprawnie�. Prosz� si� zalogowa�.',
    'noscript'              => 'Przepraszam. Wy�wietlanie folder�w dzia�a tylko z przegl�darkami obs�uguj�cymi JavaScript<BR><BR>Prosz� w��czy� obs�ug� JavaSript-u.',

    'prevPageBtn'           => 'Wstecz',
    'prevPageBtnTitle'      => 'Powr�t do porzedniej strony (#page#)',

    'nextPageBtn'           => 'Dalej',
    'nextPageBtnTitle'      => 'Przejd� do nast�pnej strony (#page#)',

    'statusLeft'            => 'Zdj��: <b>#TotalImages#</b>,  album�w: <b>#TotalAlbums#</b>',
    'statusRight'           => '<a href="http://www.dalbum.org">Generated by DAlbum #version# &copy; 2003 DeltaX Inc. in #elapsed# s</a>',

    // Common stuff
    'mainPage'              => 'Strona g��wna',
    'username'              => 'U�ytkownik:',
    'password'              => 'Has�o:',
    'bytes'                 => 'bytes',
    'KB'                    => 'KB',
    'MB'                    => 'MB',
    'pixels'                => 'pikseli',
    'errorReturn'           => 'Powr�t do porzedniej strony',

    /// Login.php
    'loginTitle'            =>  'Logowanie do: #title#',
    'loginAuthError'        =>  'Z�y login/has�o',
    'loginBadUserName'      =>  'T�j login lub has�o nie zosta�y odnalezione.',
    'loginAgain'            =>  'Ponowne logowanie',
    'loginNoCookiesWarning' =>  '<HR><B>Ostrze�enie: w przegl�darce wy��czone s� cookies!</B><BR>do przegl�dania tych stron cookies musz� by� w��czone.<BR>Po ich w��czeniu od�wie� stron�.<BR><HR>',
    'loginLoginBtn'         => 'Logowanie',
    'loginCancelBtn'        => 'Anuluj',

    // pass.php
    'passTitle'             => 'Zarz�dzanie u�ytkownikami',
    'passUserExists'        => 'u�ytkownik #user# ju� istnieje.',
    'passNotMatch'          => 'Has�o nie pasuj�.',
    'passNoUserSelected'    => 'Nie wybrano u�ytkownika.',
    'passNoAdminDelete'     => 'G��wny administrator nie mo�e by� usuni�ty.',
    'passWriteError'        => 'Brak dost�pu do pliku z has�ami!',
    'passError'             => '<B>B��d: </B>#error#',
    'passAddBtn'            => 'Dodaj',
    'passDeleteBtn'         => 'Skasuj',
    'passChangePwdBtn'      => 'Zmie� has�o',
    'passCloseBtn'          => 'Zamknij',
    'passCancelBtn'         => 'Anuluj',

    'passAddUserDlgTitle'   => 'Dodaj u�ytkownika',
    'passChangePwdDlgTitle' => 'Zmie� has�o',
    'passConfirmPassword'   => 'Potwierd� has�o:',

    // showimg.php
    'showPrevBtn'           => 'Wstecz',
    'showPrevBtnTitle'      => 'Poka� poprzednie zdj�cie',

    'showNextBtn'           => 'Dalej',
    'showNextBtnTitle'      => 'Poka� nast�pne zdj�cie',

    'showIndexBtn'          => 'Miniatury',
    'showIndexBtnTitle'     => 'Powr�t do strony z miniaturkami',

    'showImageBtn'          => 'Poka� zdj�cie',
    'showImageBtnTitle'     => 'Otwiera tylko zdj�cie w osobnym oknie',

    'showHiResBtn'          => 'Oryginalny rozmiar (#size#)',
    'showHiResBtnTitle'     => 'Otwiera zdj�cie w oryginalnym rozmiarze (osobne okno)',

    'showShowDetailsBtn'        => 'Poka� szczeg�y',
    'showShowDetailsBtnTitle'   => 'Wy�wietla informacje EXIF: dat�, przes�on�, czu�o��, itp (je�li takie dane s� zachowane).',

    'showHideDetailsBtn'        => 'Ukryj szczeg�y',
    'showHideDetailsBtnTitle'   => 'Ukrywa informacje EXIF',

    'showRotateBtn'             => 'Obr�t',
    'showRotateBtnTitle'        => 'Obraca zdj�cie o 90 stopni.',

    'showUpdateBtn'             => 'Od�wie�',
    'showUpdateBtnTitle'        => 'Od�wie�a zdj�cie i jego miniaturk�',

    'showExifFilename'          => 'Nazwa pliku: ',
    'showExifFilesize'          => 'Rozmiar pliku: ',
    'showExifResolution'        => 'Rozdzielczo��: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Data: ',
    'showExifCamera'            => 'Model aparatu: ',
    'showExifExposure'          => 'Czas na�wietlania: ',
    'showExifAperture'          => 'Przes�ona: ',
    'showExifFocalLength'       => 'Ogniskowa: ',
    'showExifFlashYes'          => 'Tak',
    'showExifFlashNo'           => 'Nie',
    'showExifFlash'             => 'Lampa: ',
    'showExifDialogTitle'       => 'Informacje o zdj�ciu',

    'showImageTitleImage'       => 'Kliknij aby pokaza� nast�pne zdj�cie: #image#',
    'showImageTitleIndex'       => 'Kliknij aby powr�ci� do miniaturek',


    // edit*.php
    'editTitle'                 => 'Edytcja #filename#',
    'editDlgTitle'              => 'Plik opisuj�cy album',
    'editFileLocation'          => 'Po�o�enie pliku',

    'editEditAsTextBtn'         => 'Edycja pliku tekstowego',
    'editEditAsTextBtnTitle'    => 'Edycja pliku opisuj�cego w formie pliku tekstowego',
    'editReindexNote'           => 'Pami�taj o od�wie�eniu album�w po zmianach w plikach opisuj�cych albumy',

    'editAlbumTitle'            => 'Tytu� albumu:',
    'editAlbumDate'             => 'Data:',
    'editAlbumComment'          => 'Komentarz:',
    'editAlbumTitleImage'       => 'Tytu� zdj�cia:',
    'editAlbumDefault'          => 'Album domy�lny:',
    'editAlbumUsers'            => 'Dopuszczeni u�ytkownicy:',
    'editAlbumUsersNote'        => '(lista u�ytkownik�w odzielona przecinkami, brak wpisu lub <B>all</B> = wszyscy odwiedzaj�cy, <B>valid-user</B>=dowolny zarejestrowany u�ytkownik)',

    'editCancelBtn'             => 'Anuluj',
    'editSaveBtn'               => 'Zapisz',

    'editThumbLink'             => '#filename# (Otwarty w nowym oknie)',
    'editImgFilename'           => 'Plik<BR><small>(change to rename, clear to delete)</small>:',
    'editImgTitle'              => 'Tytu�:',
    'editImgComment'            => 'Komentarz:',
    'editImgResize'             => 'Zmiana rozmiaru',
    'editNewFileMessage'        => '( nowy plik )',
    'editTop'                   => 'G�ra',

    'editRenameError'           => 'Unable to change filenaname to #filename# - invalid file extension',
    'editSaveError'             => 'An error occured saving album definition file #filename#',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Text',

    // reindex.php
    'reindexTitle'              => 'DAlbum - od�wie�anie',
    'reindexDlgTitle'           => 'DAlbum - od�wie�anie',
    'reindexDlgComment'         => 'DAlbum wyszukuje nowe zdj�cia, tworzy brakuj�ce miniaturki i uaktualnia informacje o albumach i zdj�ciach.',
    'reindexDlgSpeed'           => 'Wybierz pr�dko�� od�wie�ania:',

    'reindexSpeed0'             => '<B>Szybkie</B>. Generowane s� wy��cznie nie istniej�ce miniatury i zmniejszone zdj�cia. Nie jest przeprowadzana weryfikacja plik�w',
    'reindexSpeed1'             => '<B>�rednie</B>. Generowane s� nie istniej�ce lub uszkodzone miniatury i zmniejszone zdj�cia. Przeprowadzana jest weryfikacja plik�w.',
    'reindexSpeed2'             => '<B>Wolne</B>. Podobnie jak <B>�rednie</B> dodatkowo kasowane s� niepotrzebne pliki.',
    'reindexSpeed3'             => '<B>BARDZO wolne</B>. Generowane s� od nowa miniatury dla WSZYSTKICH zdj��. Uwaga! mo�e to potrwa� bardzo d�ugo!',

    'reindexCancelBtn'          => 'Anuluj',
    'reindexStartBtn'           => 'Start',

    'reindexProgressTitle'      => 'Od�wie�anie...',

    'reindexError'              => 'B��d przy tworzeniu miniatury zdj�cia!',
    'reindexRetry'              => 'Pon�w tworzenie tylko zepsutych miniatur',
    'reindexIgnore'             => 'Zignoruj b��d',
    'reindexAgain'              => 'Ponowne od�wie�anie',

    'reindexMainImageProblem'   => 'Problem z wgraniem zdj�cia',
    'reindexResizedProblem'     => 'Problem ze zmian� rozmiaru zdj�cia',
    'reindexThumbProblem'       => 'Problem z miniaturk�',

    'reindexCompleted'          => '<P>Od�wie�anie zako�czone.</P><P>Od�wie�anie zaj�o: #elapsed# sek. Katalog album�w wygenerowny w: #treeelapsed# sek.</P>',
    'reindexStats'              => 'Statystyka',
    'reindexStatsAlbums'        => 'Ilo�� album�w:',
    'reindexStatsImages'        => 'Ilo�� zdj��:',
    'reindexStatsOrigSize'      => 'Ca�kowita obj�to�� oryginalnych plik�w:',
    'reindexStatsResizedSize'   => 'Ca�kowita obj�to�� plik�w zdje� zmniejszanych:',
    'reindexStatsThumbSize'     => 'Ca�kowita obj�to�� plik�w miniaturek:',

    'reindexStatusErrors'       => '<B>Uwaga! Znaleziono b�ed�w: </B> #errors# ',

    'reindexStatusOK'           => '<B>Od�wie�anie zako�czone sukcesem. </B>',
    'reindexSaveError'          => '<B>B��d: </B>nie mo�na zapisa�: #filename#',

    'reindexTHFilename'         => 'Filename',
    'reindexTHProblem'          => 'Problem',

    ''  => ''
);

?>