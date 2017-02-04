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
    'loginBtn'          => 'Conexión (Logon)',
    'loginBtnTitle'     => 'Conexión (Logon)',

    'logoutBtn'         => 'Salir',
    'logoutBtnTitle'    => 'Salir',

    'reindexBtn'        => 'Re-indexar',
    'reindexBtnTitle'   => 'Buscar nuevas imágenes y actualizar la base de datos DAlbum',

    'usrmgrBtn'         => 'Usuarios',
    'usrmgrBtnTitle'    => 'Crear/Eliminar usuarios y cambiar claves',

    'closeWindowBtn'    => 'Cerrar ventana',
    'closeWindowBtnTitle'=> 'Cerrar esta ventana',

    'fullScreenBtn'         => 'Pantalla completa',
    'fullScreenBtnTitle'    => 'Abrir esta página en una ventana de pantalla completa; oprima F11 para obtener el mismo resultado',

    'editDefBtn'            => 'Editar',
    'editDefBtnTitle'       => 'Editar al titulo del álbum, comentarios y administrar imágenes',

    'indexUsername'         => 'Usuario:',
    'page'                  => 'Mostrando ítems #begin# - #end# de #count#. &nbsp; Página: &nbsp;',
    'noimages'              => 'No hay imágenes',
    'noPublicImages'        => 'No hay imágenes publicas disponibles. Por favor haga logon.',
    'noscript'              => 'Disculpe, la vista de carpetas solo puede ser desplegada con el soporte de Javascript habilitado en su navegador.<BR><BR>Por favor, diríjase a sus preferencias en el navegador y habilite Javascript para este sitio.',

    'prevPageBtn'           => 'Anterior',
    'prevPageBtnTitle'      => 'Ir a la página anterior (#page#)',

    'nextPageBtn'           => 'Siguiente',
    'nextPageBtnTitle'      => 'Ir a la siguiente página (#page#)',

    'statusLeft'            => '<b>#TotalImages#</b> imágenes en <b>#TotalAlbums#</b> álbumes',
    'statusRight'           => '<a href="http://www.dalbum.org">Generada por DAlbum #version# &copy; 2003 DeltaX Inc. en #elapsed# s</a>',

    // Common stuff
    'mainPage'              => 'Ir ala página principal',
    'username'              => 'Usuario:',
    'password'              => 'Contraseña:',
    'bytes'                 => 'bytes',
    'KB'                    => 'KB',
    'MB'                    => 'MB',
    'pixels'                => 'píxeles',
    'errorReturn'           => 'Volver a la pagina anterior',

    /// Login.php
    'loginTitle'            =>  'Conectarse a #title#',
    'loginAuthError'        =>  'Error de autentificación',
    'loginBadUserName'      =>  'Su usuario o contraseña no fueron encontrados en la base de datos',
    'loginAgain'            =>  'Conectarse nuevamente',
    'loginNoCookiesWarning' =>  '<HR><B>Advertencia: El uso de Cookies esta deshabilitado en su navegador!</B><BR>Para poder continuar el uso de cookies debe estar habilitado.<BR>Por favor habilite el uso de cookies en las preferencias de su navegador y recargue esta pagina.<BR><HR>',
    'loginLoginBtn'         => 'Logon',
    'loginCancelBtn'        => 'Cancelar',

    // pass.php
    'passTitle'             => 'Manejo de Usuarios',
    'passUserExists'        => 'El Usuario #user# ya existe.',
    'passNotMatch'          => 'Las contraseñas no concuerdan.',
    'passNoUserSelected'    => 'No ha seleccionado un usuario.',
    'passNoAdminDelete'     => 'El administrador primario de DAlbum no puede ser delegado.',
    'passWriteError'        => 'No se pudo abrir el archivo de contraseñas para escritura!',
    'passError'             => '<B>Error: </B>#error#',
    'passAddBtn'            => 'Crear',
    'passDeleteBtn'         => 'Borrar',
    'passChangePwdBtn'      => 'Cambiar contraseña',
    'passCloseBtn'          => 'Cerrar',
    'passCancelBtn'         => 'Cancelar',

    'passAddUserDlgTitle'   => 'Crear usuario',
    'passChangePwdDlgTitle' => 'Cambiar contraseña',
    'passConfirmPassword'   => 'Confirmar contraseña:',

    // showimg.php
    'showPrevBtn'           => 'Anterior',
    'showPrevBtnTitle'      => 'Mostrar imagen anterior',

    'showNextBtn'           => 'Siguiente',
    'showNextBtnTitle'      => 'Mostrar siguiente imagen',

    'showIndexBtn'          => 'Indice',
    'showIndexBtnTitle'     => 'Volver al indice de albumes',

    'showImageBtn'          => 'Mostrar imagen',
    'showImageBtnTitle'     => 'Mostrar solamente la imagen en una nueva ventana',

    'showHiResBtn'          => 'Tamaño original (#size#)',
    'showHiResBtnTitle'     => 'Mostrar la imagen original de alta resolución en una nueva ventana',

    'showShowDetailsBtn'        => 'Mostrar los detalles',
    'showShowDetailsBtnTitle'   => 'Mostrar detalles de imagen EXIF: fecha de la imagen, velocidad de disparador, etc. (si hay disponible)',

    'showHideDetailsBtn'        => 'Ocultar detalles',
    'showHideDetailsBtnTitle'   => 'Ocultar detalles de la imagen EXIF',

    'showRotateBtn'             => 'Rotar',
    'showRotateBtnTitle'        => 'Rotar la imagen 90 grados en sentido horario',

    'showUpdateBtn'             => 'Actualizar',
    'showUpdateBtnTitle'        => 'Regenerar imagen de tamaño ajustado e índice de imágenes (thumbnails)',

    'showExifFilename'          => 'Nombre del Archivo: ',
    'showExifFilesize'          => 'Tamaño del Archivo: ',
    'showExifResolution'        => 'Resolución: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Fecha: ',
    'showExifCamera'            => 'Modelo de Cámara: ',
    'showExifExposure'          => 'Exposición: ',
    'showExifAperture'          => 'Apertura: ',
    'showExifFocalLength'       => 'Largo focal: ',
    'showExifFlashYes'          => 'Si',
    'showExifFlashNo'           => 'No',
    'showExifFlash'             => 'Flash disparado: ',
    'showExifDialogTitle'       => 'Detalles originales de la imagen',

    'showImageTitleImage'       => 'Oprima para mostrar la próxima imagen: #image#',
    'showImageTitleIndex'       => 'Oprima para retornar al índice de albumes',


    // edit*.php
    'editTitle'                 => 'Editar #filename#',
    'editDlgTitle'              => 'Archivo de definición del álbum',
    'editFileLocation'          => 'Ubicación del Archivo',

    'editEditAsTextBtn'         => 'Editar como texto',
    'editEditAsTextBtnTitle'    => 'Editar este archivo como un archivo de texto plano (plain-text)',
    'editReindexNote'           => 'Por favor recuerde que precisa re-indexar después de cambiar los parámetros de ajuste de tamaño de imágenes',
    'editAlbumTitle'            => 'Titulo del Álbum:',
    'editAlbumDate'             => 'Fecha:',
    'editAlbumComment'          => 'Comentarios:',
    'editAlbumTitleImage'       => 'Titulo de la imagen:',
    'editAlbumDefault'          => 'Álbum por Defecto:',
    'editAlbumUsers'            => 'Usuarios con acceso:',
    'editAlbumUsersNote'        => '(lista de usuarios separados por coma, si lo deja vacio o indica  <B>all</B> = acceso anonimo, <B>valid-user</B>=cualquier usuario registrado)',

    'editCancelBtn'             => 'Cancelar',
    'editSaveBtn'               => 'Grabar',

    'editThumbLink'             => '#filename# (Abre en una ventana nueva)',
    'editImgFilename'           => 'Nombre del archivo<BR><small>(cambe para renombrar, limpie para borrar)</small>:',
    'editImgTitle'              => 'Titulo:',
    'editImgComment'            => 'Comentarios:',
    'editImgResize'             => 'Ajustar tamaño de la imagen',
    'editNewFileMessage'        => '( archivo nuevo )',
    'editTop'                   => 'Ir al Tope',

    'editRenameError'           => 'No se pudo cambiar el nombre del archivo a #filename# - extensión de archivo invalida',
    'editSaveError'             => 'Ocurrió un error grabando el archivo de definición del álbum #filename#',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Text',

    // reindex.php
    'reindexTitle'              => 'DAlbum re-indexando',
    'reindexDlgTitle'           => 'DAlbum re-indexando',
    'reindexDlgComment'         => 'El re-indexado de DAlbum busca imágenes nuevas en las carpetas de datos, crea índices de fotos perdidos (thumbnails) y actualiza la base de datos de información de imágenes.',
    'reindexDlgSpeed'           => 'Por favor especifique la velocidad de re-indexado:',

    'reindexSpeed0'             => '<B>Rápida</B>. Crear solamente los índices de imágenes e imágenes de tamaño ajustado que no existen. No verificar la integridad de los archivos de imágenes.',
    'reindexSpeed1'             => '<B>Moderada</B>. Crear solamente los índices de imágenes e imágenes de tamaño ajustado que no existen. Verificar la integridad de los archivos de imágenes.',
    'reindexSpeed2'             => '<B>Lenta</B>. Lo mismo que  <B>Moderada</B> pero además borrar los índices de imágenes e imágenes de tamaño ajustado que no tengan referencia.',
    'reindexSpeed3'             => '<B>Extremadamente lenta</B>. Recrear todos los índices de imágenes e imágenes de tamaño ajustado. Advertencia: este proceso puede demorar varias horas!',

    'reindexCancelBtn'          => 'Cancelar',
    'reindexStartBtn'           => 'Comenzar',

    'reindexProgressTitle'      => 'DAlbum re-indexado en progreso',

    'reindexError'              => 'Ocurrió un error creando el índice de imágenes para la imagen',
    'reindexRetry'              => 'Reintentar la imagen que fallo',
    'reindexIgnore'             => 'Ignorar el error y continuar',
    'reindexAgain'              => 'Reiniciar el re-indexado',

    'reindexMainImageProblem'   => 'Problema con la imagen subida',
    'reindexResizedProblem'     => 'Problema con la imagen de tamaño ajustado',
    'reindexThumbProblem'       => 'Problema con el índice de imágenes (thumbnail)',

    'reindexCompleted'          => '<P>Operación terminada.</P><P>El re-indexado demoró #elapsed# segundos. El árbol de álbumes fue generado en #treeelapsed# segundos.</P>',
    'reindexStats'              => 'Estadísticas DAlbum ',
    'reindexStatsAlbums'        => 'Cantidad de álbumes:',
    'reindexStatsImages'        => 'Cantidad de imágenes:',
    'reindexStatsOrigSize'      => ' Tamaño total de imágenes originales:',
    'reindexStatsResizedSize'   => ' Tamaño total de imágenes de tamaño ajustado:',
    'reindexStatsThumbSize'     => 'Tamaño total de índices de imágenes (thumbnails):',

    'reindexStatusErrors'       => '<B>Estado: </B> #errors# errores encontrados:',

    'reindexStatusOK'           => '<B>Status: </B> Éxito. No se encontraron errores.',
    'reindexSaveError'          => '<B>Error: </B>No se pudo salvar #filename#',

    'reindexTHFilename'         => 'Nombre de archivo',
    'reindexTHProblem'          => 'Problema',

    // customizations

    // Image comments
    'cCommentsImageComments'        => 'Comentarios de la Imágen',
    'cCommentsLoginToAddComments'   => 'Por favor #loginbutton# para dejar sus comentarios.<BR>&nbsp;',
    'cCommentsYourName'             => 'Nombre:',
    'cCommentsComment'              => 'Comentario:',
    'cCommentsSendButtonText'       => 'Enviar',
    'cCommentsDeleteButtonText'     => 'Borrar',
    'cCommentsMailSubject'          => 'Comentario nuevo acerca de la imagen #image# ( Album: #album# )',
    'cCommentsMailBody'             => "Comentario nuevo publicado por #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
    'cCommentsDateFormat'           => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'           => '-- Presentación aut. de fotos --',
    'cSlideshowSeconds'             => '#sec# segundos',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'             => 'E:',
    'cExiflineAperture'             => 'A:',
    'cExiflineFlash'                => 'Flash:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'            => 'Oprima para abrir "#title#"',
    'cCustomOpenBtn'                => 'Abrir archivo',
    'cCustomOpenBtnTitle'           => 'Abrir archivo "#title#" en la ventana activa',

    // Highligh modified albums
    'cModifiedNew'                  => 'nuevo!',
    'cModifiedUpdated'              => 'actualizado!',

    ''  => ''
);

?>
