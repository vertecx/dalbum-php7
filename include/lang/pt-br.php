<?php

/*  DAlbum Brazilian Portuguese PT-BR language support file

    (c) Copyright 2003 by Mauricio Wolff .:. organiKa.com.br.

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
    'loginBtn'          => 'Log in',
    'loginBtnTitle'     => 'Log in',

    'logoutBtn'         => 'Log out',
    'logoutBtnTitle'    => 'Log out',

    'reindexBtn'        => 'Reindexar',
    'reindexBtnTitle'   => 'Procura por novas imagens e atualiza o banco de dados de imagens',

    'usrmgrBtn'         => 'Usu&aacute;rios',
    'usrmgrBtnTitle'    => 'Adiciona/remove usu&aacute;rio e troca senhas',

    'closeWindowBtn'    => 'Fechar Janela',
    'closeWindowBtnTitle'=> 'Fechar esta janela',

    'fullScreenBtn'         => 'Tela Cheia',
    'fullScreenBtnTitle'    => 'Abrir esta p&aacute;gina em tela cheia. Ou somente tecle F11 para o mesmo resultado',

    'editDefBtn'            => 'Editar',
    'editDefBtnTitle'       => 'Editar o t&iacute;tulo, coment&aacute;rios e gerenciar imagens do &aacute;lbum',

    'indexUsername'         => 'Usu&aacute;rio:',
    'page'                  => 'Mostrando itens #begin# - #end# de #count#. &nbsp; P&aacute;gina: &nbsp;',
    'noimages'              => 'Sem imagens',
    'noPublicImages'        => 'Nenhuma imagem p&uacute;blica dispon&iacute;vel. Por favor log in.',
    'noscript'              => 'Desculpe, as pastas s&oacute; podem ser vistas com JavaScript habilitado.<BR><BR>Por favor habilite JavaScript nas prefer&ecirc;ncias do seu navegador.',

    'statusLeft'            => '<b>#TotalImages#</b> imagens em <b>#TotalAlbums#</b> &aacute;lbuns',
    'statusRight'           => '<a href="http://www.dalbum.org">Gerado por DAlbum #version# &copy; 2003 DeltaX Inc. em #elapsed# s</a>',

    'prevPageBtn'           => 'Anterior',
    'prevPageBtnTitle'      => 'Ir para a p&aacute;gina anterior (#page#)',

    'nextPageBtn'           => 'Pr&oacute;xima',
    'nextPageBtnTitle'      => 'Ir para a pr&oacute;xima p&aacute;gina (#page#)',

    'statusLeft'            => '<b>#TotalImages#</b> imagens em <b>#TotalAlbums#</b> &aacute;lbuns',
    'statusRight'           => '<a href="http://www.dalbum.org">Gerado por DAlbum #version# &copy; 2003 DeltaX Inc. em #elapsed# s</a>',
    // Common stuff
    'mainPage'              => 'V&aacute; para p&aacute;gina principal',
    'username'              => 'Usu&aacute;rio:',
    'password'              => 'Senha:',
    'bytes'                 => 'bytes',
    'KB'                    => 'KB',
    'MB'                    => 'MB',
    'pixels'                => 'pixels',
    'errorReturn'           => 'Retorne para a p&aacute;gina anterior',

    /// Login.php
    'loginTitle'            =>  'Login em #title#',
    'loginAuthError'        =>  'Erro de autentica&ccedil;&atilde;o',
    'loginBadUserName'      =>  'Seu username ou senha n&atilde;o foram encontrados no banco de dados.',
    'loginAgain'            =>  'Login novamente',
    'loginNoCookiesWarning' =>  '<HR><B>Aviso: Cookies desabilitados no navegador!</B><BR>Para continuar, voc&ecirc; precisa habilitar cookies no seu navegador.<BR>Por favor habilite nas prefer&ecirc;ncias do seu navegador e atualize esta p&aacute;gina..<BR><HR>',
    'loginLoginBtn'         => 'Login',
    'loginCancelBtn'        => 'Cancelar',

    // pass.php
    'passTitle'             => 'Gerenciamento de usu&aacute;rios',
    'passUserExists'        => 'Usu&aacute;rio #user# j&aacute; existe.',
    'passNotMatch'          => 'Senhas n&atilde;o conferem.',
    'passNoUserSelected'    => 'Nenhum usu&aacute;rio selecionado.',
    'passNoAdminDelete'     => 'O Administardor prim&aacute;rio do DAlbum n&atilde;o pode se deletado.',
    'passWriteError'        => 'N&atilde;o pude abrir o arquivo de senhas para escrita!',
    'passError'             => '<B>Erro: </B>#error#',
    'passAddBtn'            => 'Adicionar',
    'passDeleteBtn'         => 'Deletar',
    'passChangePwdBtn'      => 'Alterar senha',
    'passCloseBtn'          => 'Fechar',
    'passCancelBtn'         => 'Cancelar',

    'passAddUserDlgTitle'   => 'Adicionar usu&aacute;rio',
    'passChangePwdDlgTitle' => 'Alterar senha',
    'passConfirmPassword'   => 'Confirmar senha:',

    // showimg.php
    'showPrevBtn'           => 'Anterior',
    'showPrevBtnTitle'      => 'Mostrar imagem anterior',

    'showNextBtn'           => 'Pr&oacute;xima',
    'showNextBtnTitle'      => 'Mostrar pr&oacute;xima imagem',

    'showIndexBtn'          => '&Iacute;ndice',
    'showIndexBtnTitle'     => 'Retorna ao &iacute;ndice do &aacute;lbum',

    'showImageBtn'          => 'Mostrar imagem',
    'showImageBtnTitle'     => 'Mostra apenas a imagem numa nova janela',

    'showHiResBtn'          => 'Imagem original (#size#)',
    'showHiResBtnTitle'     => 'Mostrar imagem original (full resolution) em uma nova janela',

    'showShowDetailsBtn'        => 'Mostrar detalhes',
    'showShowDetailsBtnTitle'   => 'Mostra detalhes EXIF: data, velocidade do obturador etc. (se dispon&iacute;vel)',

    'showHideDetailsBtn'        => 'Esconder detalhes',
    'showHideDetailsBtnTitle'   => 'Esconde detalhes EXIF',

    'showRotateBtn'             => 'Rotacionar',
    'showRotateBtnTitle'        => 'Rotaciona a imagem 90 graus em sentido hor&aacute;rio',

    'showUpdateBtn'             => 'Atualizar',
    'showUpdateBtnTitle'        => 'Gerar novamente a imagem redimensionada e a miniatura',

    'showExifFilename'          => 'Nome do arquivo: ',
    'showExifFilesize'          => 'Tamanho do arquivo: ',
    'showExifResolution'        => 'Resolu&ccedil;&atilde;o: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Data: ',
    'showExifCamera'            => 'Modelo de c&acirc;mera: ',
    'showExifExposure'          => 'Exposi&ccedil;&atilde;o: ',
    'showExifAperture'          => 'Abertura: ',
    'showExifFocalLength'       => 'Profundidade focal: ',
    'showExifFlashYes'          => 'Sim',
    'showExifFlashNo'           => 'N&atilde;o',
    'showExifFlash'             => 'Flash disparado: ',
    'showExifDialogTitle'       => 'Detalhes originais da imagem',

    'showImageTitleImage'       => 'Clique para mostrar a pr&oacute;xima imagem: #image#',
    'showImageTitleIndex'       => 'Clique para retornar ao &iacute;ndice do &aacute;lbum',


    // edit*.php
    'editTitle'                 => 'Editar #filename#',
    'editDlgTitle'              => 'Arquivo de definição do Álbum',
    'editFileLocation'          => 'Localiza&ccedil;&atilde;o do arquivo',

    'editEditAsTextBtn'         => 'Editar como texto',
    'editEditAsTextBtnTitle'    => 'Editar este arquivo como texto puro',
    'editReindexNote'           => 'Por favor note que voc&ecirc; ir&aacute; precisar reindexar as imagens depois de mudar os par&acirc;metros de redimensionamento das imagens',

    'editAlbumTitle'            => 'T&iacute;tulo do &Aacute;lbum:',
    'editAlbumDate'             => 'Data:',
    'editAlbumComment'          => 'Coment&aacute;rio:',
    'editAlbumTitleImage'       => 'T&iacute;tulo da imagem:',
    'editAlbumDefault'          => '&Aacute;lbum padr&atilde;o',
    'editAlbumUsers'            => 'Usu&aacute;rios com permiss&atilde;o:',
    'editAlbumUsersNote'        => '(lista de usu&aacute;rios separados por v&iacute;rgulas, string vazia ou <B>all</B> = accesso an&ocirc;nimo, <B>valid-user</B> = qualquer usu&aacute;rio autenticado)',

    'editCancelBtn'             => 'Cancelar',
    'editSaveBtn'               => 'Salvar',

    'editThumbLink'             => '#filename# (Abre numa nova janela)',
    'editImgFilename'           => 'Nome do arquivo<BR><small>(mude para renomear, limpe para apagar)</small>:',
    'editImgTitle'              => 'T&iacute;tulo:',
    'editImgComment'            => 'Coment&aacute;rio:',
    'editImgResize'             => 'Redimensionar imagem',
    'editNewFileMessage'        => '( novo arquivo )',
    'editTop'                   => 'Topo',

    'editRenameError'           => 'N&atilde;o pude mudar o nome do arquivo para #filename# - extens&atilde;o de arquivo inv&aacute;lida',
    'editSaveError'             => 'Ocorreu um erro ao salvar o arquivo de definição do álbum #filename#',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Texto',

    // reindex.php
    'reindexTitle'              => 'Reindexa&ccedil;&atilde;o do DAlbum',
    'reindexDlgTitle'           => 'Reindexa&ccedil;&atilde;o do DAlbum',
    'reindexDlgComment'         => 'A reindexa&ccedil;&atilde;o do DAlbum procura as pastas de dados por novas imagens, cria miniaturas (thumbnails) faltantes e atualiza as informa&ccedil;&otilde;es do banco de dados de imagens.',
    'reindexDlgSpeed'           => 'Por favor especifique a velocidade de reindexa&ccedil;&atilde;o abaixo:',

    'reindexSpeed0'             => '<B>R&aacute;pida</B>. Cria somente miniaturas e redimensiona as imagens que n&atilde;o existem. N&atilde;o verifica a integridade dos arquivos de imagens.',
    'reindexSpeed1'             => '<B>Moderada</B>. Cria somente miniaturas e redimensiona as imagens que n&atilde;o existem ou est&atilde;o corrompidas. Verifica a integridade dos arquivos de imagem.',
    'reindexSpeed2'             => '<B>Lenta</B>. Mesmo que a <B>Moderada</B> mas tamb&eacute;m deleta as miniaturas e imagens redimensionadas sem um original correspondente.',
    'reindexSpeed3'             => '<B>Extremamente Lenta</B>. Recria todas as miniaturas e imagens redimensionadas. Aten&ccedil;&atilde;o: dependendo da quantidade de imagens, isso pode levar v&aacute;rias horas!',

    'reindexCancelBtn'          => 'Cancelar',
    'reindexStartBtn'           => 'Iniciar',

    'reindexProgressTitle'      => 'DAlbum : reindexa&ccedil;&atilde;o em andamento...',

    'reindexError'              => 'Ocorreu um erro ao criar a miniatura para a imagem',
    'reindexRetry'              => 'Tentar novamente a imagem que falhou',
    'reindexIgnore'             => 'Ignorar erro e continuar',
    'reindexAgain'              => 'Reiniciar reindexa&ccedil;&atilde;o',

    'reindexMainImageProblem'   => 'Problema ao enviar imagem',
    'reindexResizedProblem'     => 'Problema ao redimensaionar imagem',
    'reindexThumbProblem'       => 'Problema na miniatura',

    'reindexCompleted'          => '<P>Operação concluída.</P><P>A reindexação levou #elapsed# segundos. A árvore do álbum foi gerada em #treeelapsed# segundos.</P>',
    'reindexStats'              => 'Estat&iacute;sticas do DAlbum',
    'reindexStatsAlbums'        => 'N&uacute;mero de &aacute;lbuns:',
    'reindexStatsImages'        => 'N&uacute;mero de imagens:',
    'reindexStatsOrigSize'      => 'Tamanho total das imagens originais:',
    'reindexStatsResizedSize'   => 'Tamanho total de imagens redimensionadas:',
    'reindexStatsThumbSize'     => 'Tamanho total de miniaturas:',

    'reindexStatusErrors'       => '<B>Status: </B> #errors# erros encontrados:',

    'reindexStatusOK'           => '<B>Status: </B> Successo. Nenhum erro encontrado.',
    'reindexSaveError'          => '<B>Erro: </B>Não foi possível salvar #filename#',

    'reindexTHFilename'         => 'Nome do arquivo',
    'reindexTHProblem'          => 'Problema',

    // customizations

    // Image comments
    'cCommentsImageComments'        => 'Comentários da imagem',
    'cCommentsLoginToAddComments'   => 'Por favor #loginbutton# para adicionar o seu comentário.<BR>&nbsp;',
    'cCommentsYourName'             => 'Seu nome:',
    'cCommentsComment'              => 'Comentário:',
    'cCommentsSendButtonText'       => 'Enviar',
    'cCommentsDeleteButtonText'     => 'Excluir',
    'cCommentsMailSubject'          => 'Novo comentário sobre a imagem #image# ( Álbum: #album# )',
    'cCommentsMailBody'             => "Novo comentário enviado por #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nSite: #url#\n",
    'cCommentsDateFormat'           => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'           => '-- Slide show --',
    'cSlideshowSeconds'             => '#sec# segundos',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'             => 'E:',
    'cExiflineAperture'             => 'A:',
    'cExiflineFlash'                => 'Flash:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'            => 'Clique para abrir "#title#"',
    'cCustomOpenBtn'                => 'Abrir arquivo',
    'cCustomOpenBtnTitle'           => 'Abrir arquivo "#title#" na janela atual',

    // Highligh modified albums
    'cModifiedNew'                  => 'novo!',
    'cModifiedUpdated'              => 'atualizado!',

    ''  => ''
);

?>