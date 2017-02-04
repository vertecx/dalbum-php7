<?php

/*
    Russian language support for DAlbum.
    Recommended charset: windows-1251

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
    'loginBtn'          => 'Вход',
    'loginBtnTitle'     => 'Ввести имя пользователя и пароль',

    'logoutBtn'         => 'Выйти',
    'logoutBtnTitle'    => 'Переход в режим незарегистрированного пользователя',

    'reindexBtn'        => 'Переиндексация',
    'reindexBtnTitle'   => 'Поиск новых изображений и обновление базы данных',

    'usrmgrBtn'         => 'Пользователи',
    'usrmgrBtnTitle'    => 'Управление списком пользователей и изменение паролей',

    'closeWindowBtn'    => 'Закрыть',
    'closeWindowBtnTitle'=> 'Закрыть окно',

    'fullScreenBtn'         => 'Распахнуть',
    'fullScreenBtnTitle'    => 'Открыть окно на весь экран. Или просто нажмите клавишу F11',

    'editDefBtn'            => 'Изменить',
    'editDefBtnTitle'       => 'Изменить название альбома, комментарии и другие свойства',

    'indexUsername'         => 'Пользователь:',
    'page'                  => 'Изображения #begin# - #end# из #count#. &nbsp; Страница: &nbsp;',
    'noimages'              => 'Нет изображений',
    'noPublicImages'        => 'Для просмотра альбома введите свой пароль.',
    'noscript'              => 'Извините, для показа содержания альбома требуется поддержка Javascript в Вашем браузере.<BR>Пожалуйста включите поддержку Javascript для этого сайта в установках Вашего броузера и обновите эту страницу.',

    'prevPageBtn'           => 'Пред.',
    'prevPageBtnTitle'      => 'Предыдущая страница (#page#)',

    'nextPageBtn'           => 'След.',
    'nextPageBtnTitle'      => 'Следующая страница (#page#)',


    'statusLeft'            => '<b>#TotalImages#</b> изображений в <b>#TotalAlbums#</b> альбомах',

    // Common stuff
    'mainPage'              => 'Перейти на главную страницу',
    'username'              => 'Имя пользователя:',
    'password'              => 'Пароль:',
    'bytes'                 => 'байт',
    'KB'                    => 'Кб',
    'MB'                    => 'Мб',
    'pixels'                => 'пикс.',
    'errorReturn'           => 'Вернуться на предыдущую страницу',

    /// Login.php
    'loginTitle'            =>  'Введите ваше имя и пароль для входа в систему',
    'loginAuthError'        =>  'Ошибка',
    'loginBadUserName'      =>  'Имя пользователя или пароль не найдены.',
    'loginAgain'            =>  'Войти еще раз',
    'loginNoCookiesWarning' =>  '<HR><B>Внимание: В Вашем броузере выключена поддержка Cookies!</B><BR><BR>Пожалуйста включите поддержку Cookies для этого сайта в установках Вашего броузера и обновите эту страницу.<BR><HR>',
    'loginLoginBtn'         => 'Вход',
    'loginCancelBtn'        => 'Отмена',

    // pass.php
    'passTitle'             => 'Пользователи',
    'passUserExists'        => 'Пользователь #user# уже существует.',
    'passNotMatch'          => 'Пароли не совпадают.',
    'passNoUserSelected'    => 'Выберите имя пользователя из списка перед выполнением команды.',
    'passNoAdminDelete'     => 'Главный администратор не может быть удален.',
    'passWriteError'        => 'Ошибка записи файла паролей!',
    'passError'             => '<B>Ошибка: </B>#error#',
    'passAddBtn'            => 'Добавить',
    'passDeleteBtn'         => 'Удалить',
    'passChangePwdBtn'      => 'Изменить пароль',
    'passCloseBtn'          => 'Закрыть',
    'passCancelBtn'         => 'Отмена',

    'passAddUserDlgTitle'   => 'Новый пользователь',
    'passChangePwdDlgTitle' => 'Смена пароля',
    'passConfirmPassword'   => 'Подтвердите пароль:',

    // showimg.php
    'showPrevBtn'           => 'Предыдущее',
    'showPrevBtnTitle'      => 'Показать предыдущее изображение',

    'showNextBtn'           => 'Следующее',
    'showNextBtnTitle'      => 'Показать следующее изображение',

    'showIndexBtn'          => 'Содержание',
    'showIndexBtnTitle'     => 'Вернуться к содержанию альбома',

    'showImageBtn'          => 'Изображение',
    'showImageBtnTitle'     => 'Показать только изображение без полей и элементов управления в новом окне',

    'showHiResBtn'          => 'Оригинал (#size#)',
    'showHiResBtnTitle'     => 'Показать полноразмерное изображеие в новом окне',

    'showShowDetailsBtn'        => 'Параметры',
    'showShowDetailsBtnTitle'   => 'Показать параметры съемки: дата, выдержка, диафрагма (если доступно)',

    'showHideDetailsBtn'        => 'Убрать параметры',
    'showHideDetailsBtnTitle'   => 'Убрать параметры съемки',

    'showRotateBtn'             => 'Повернуть',
    'showRotateBtnTitle'        => 'Повернуть изображение на 90 градусов по часовой стрелке',

    'showUpdateBtn'             => 'Обновить',
    'showUpdateBtnTitle'        => 'Переделать уменьшенное изображение и миниатюру',


    'showExifFilename'          => 'Имя файла: ',
    'showExifFilesize'          => 'Размер файла: ',
    'showExifResolution'        => 'Разрешение: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Дата: ',
    'showExifCamera'            => 'Тип фотокамеры: ',
    'showExifExposure'          => 'Выдержка: ',
    'showExifAperture'          => 'Диафрагма: ',
    'showExifFocalLength'       => 'Фокусное расстояние: ',
    'showExifFlashYes'          => 'Со вспышкой',
    'showExifFlashNo'           => 'Без вспышки',
    'showExifFlash'             => 'Вспышка: ',
    'showExifDialogTitle'       => 'Параметры съемки',

    'showImageTitleImage'       => 'Кликните для перехода к следующему изображению: #image#',
    'showImageTitleIndex'       => 'Кликните чтобы вернуться к содержанию альбома',


    // edit*.php
    'editTitle'                 => 'Изменение #filename#',
    'editDlgTitle'              => 'Файл описания альбома',
    'editFileLocation'          => 'Имя файла',

    'editEditAsTextBtn'         => 'Текст',
    'editEditAsTextBtnTitle'    => 'Редактировать этот файл в текстовом виде',
    'editReindexNote'           => 'Внимание: после включения уменьшенных изображений необходимо переиндексировать альбом!',

    'editAlbumTitle'            => 'Название альбома:',
    'editAlbumDate'             => 'Дата:',
    'editAlbumComment'          => 'Комментарии:',
    'editAlbumTitleImage'       => 'Заглавное изображение:',
    'editAlbumDefault'          => 'Альбом по умолчанию',
    'editAlbumUsers'            => 'Пользователи:',
    'editAlbumUsersNote'        => '(введите имена пользователей через запятую.<BR>Пустая строка или <B>all</B> разшают анонимный доступ, <B>valid-user</B>=доступ для всех зарегистрированных пользователей)',

    'editCancelBtn'             => 'Отмена',
    'editSaveBtn'               => 'Сохранить',

    'editThumbLink'             => '#filename# (в новом окне)',
    'editImgFilename'           => 'Имя файла<BR><small>(пустая строка = удалить)</small>:',
    'editImgTitle'              => 'Название:',
    'editImgComment'            => 'Комментарий:',
    'editImgResize'             => 'Уменьшить',
    'editNewFileMessage'        => '( новый )',
    'editTop'                   => 'Наверх',

    'editRenameError'           => 'Ошибка переименования файла в #filename# - недопустимое расширение файла',
    'editSaveError'             => 'Ошибка при записи файла описания альбома #filename#',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Текст',

    // reindex.php
    'reindexTitle'              => 'Переиндексация',
    'reindexDlgTitle'           => 'Переиндексация',
    'reindexDlgComment'         => 'При переиндексации <B>DAlbum</B> ищет новые изображения на диске, создает отсутствующие миниатюры и обновляет содержание альбома.',
    'reindexDlgSpeed'           => 'Желаемая скорость переиндексации:',

    'reindexSpeed0'             => '<B>Быстрая</B>. Миниатюры и уменьшенные копии создаются только если соотв. файлы не существуют. Содержимое файлов не проверяется.',
    'reindexSpeed1'             => '<B>Средняя</B>. Миниатюры и уменьшенные копии создаются только если соотв. файлы не существуют или запорчены.',
    'reindexSpeed2'             => '<B>Медленная</B>. Аналогично <B>Средней</B> скорости. Кроме того удаляются неиспользуемые миниатюры и уменьшенные копии.',
    'reindexSpeed3'             => '<B>Очень медленная</B>. Пересоздать все миниатюры и уменьшенные копии. Внимание: это процесс может занять несколько часов!',

    'reindexCancelBtn'          => 'Отмена',
    'reindexStartBtn'           => 'Начать переиндексацию',

    'reindexProgressTitle'      => 'Идет переиндексация',

    'reindexError'              => 'Ошибка при создании миниатюры изображения ',
    'reindexRetry'              => 'Повторить операцию',
    'reindexIgnore'             => 'Пропустить изображение и продолжить',
    'reindexAgain'              => 'Начать переидексацию сначала',

    'reindexMainImageProblem'   => 'Проблемы с оригинальным изображением',
    'reindexResizedProblem'     => 'Проблемы с уменьшенным изображением',
    'reindexThumbProblem'       => 'Проблемы с миниатюрой',

    'reindexCompleted'          => '<P>Переидексация завершена.</P><P>Операция заняла #elapsed# секунд. Создание дерева содержания альбомов заняло #treeelapsed# секунд.</P>',
    'reindexStats'              => 'Статистика',
    'reindexStatsAlbums'        => 'Количество альбомов:',
    'reindexStatsImages'        => 'Количество изображений:',
    'reindexStatsOrigSize'      => 'Общий размер оригинальных изображений:',
    'reindexStatsResizedSize'   => 'Общий размер уменьшенных изображений:',
    'reindexStatsThumbSize'     => 'Общий размер миниатюр:',

    'reindexStatusErrors'       => '<B>Статус: </B> Найдено #errors# ошибок:',

    'reindexStatusOK'           => '<B>Статус: </B> Операция завершена успешно. Ошибок не обнаружено.',
    'reindexSaveError'          => '<B>Ошибка: </B> Не удалось записать файл #filename#',

    'reindexTHFilename'         => 'Имя файла',
    'reindexTHProblem'          => 'Комментарии',

    // Image comments
    'cCommentsImageComments'        => 'Комментарии',
    'cCommentsLoginToAddComments'   => 'Пожалуйста нажмите #loginbutton# чтобы добавить ваш комметарий.<BR>&nbsp;',
    'cCommentsYourName'             => 'Имя:',
    'cCommentsComment'              => 'Комментарий:',
    'cCommentsSendButtonText'       => 'Отправить',
    'cCommentsDeleteButtonText'     => 'Удалить',
    'cCommentsMailSubject'          => 'Новый комментарий для изображения #image# ( Альбом: #album# )',
    'cCommentsMailBody'             => "Новый комментарий от пользователя #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nАдрес: #url#\n",
    'cCommentsDateFormat'           => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'           => '-- Слайд шоу --',
    'cSlideshowSeconds'             => '#sec# секунд',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'             => 'Выд.:',
    'cExiflineAperture'             => 'Диафр.:',
    'cExiflineFlash'                => 'Всп.:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'            => 'Кликните чтобы открыть "#title#"',
    'cCustomOpenBtn'                => 'Открыть файл',
    'cCustomOpenBtnTitle'           => 'Открыть "#title#" в этом окне',

    // Highligh modified albums
    'cModifiedNew'                  => 'новый!',
    'cModifiedUpdated'              => 'обновление!',

    ''  => ''
);

?>