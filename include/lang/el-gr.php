<?php

/*  DAlbum Greek language support file

    (c) Copyright 2004 by indyone [indyone at gmail.com] & DeltaX Inc.

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
    'loginBtn'          => 'Είσοδος',
    'loginBtnTitle'     => 'Είσοδος',

    'logoutBtn'         => 'Έξοδος',
    'logoutBtnTitle'    => 'Έξοδος',

    'reindexBtn'        => 'Δημιουργία περιεχομένων',
    'reindexBtnTitle'   => 'Αναζήτηστε για νέες εικόνες και ενημέρωσε την βάση δεδομένων',

    'usrmgrBtn'         => 'Χρήστες',
    'usrmgrBtnTitle'    => 'Προσθαφαίρεση χρηστών και αλλαγή κωδικών πρόσβασης',

    'closeWindowBtn'    => 'Κλείσιμο παραθύρου',
    'closeWindowBtnTitle'=> 'Κλείστε αυτό το παράθυρο',

    'fullScreenBtn'         => 'Σε ολόκληρη την οθόνη',
    'fullScreenBtnTitle'    => 'Εμφάνιστε αυτή την σελίδα σε παράθυρο που καταλαμβάνει όλη την οθόνη ή πάτα το πλήκτρο F11 για να έχεις το ίδιο αποτέλεσμα',

    'editDefBtn'            => 'Επεξεργασία',
    'editDefBtnTitle'       => 'Επεξεργάστείτε το τίτλο της συλλογής, τα σχόλια και διαχειρίσου τις εικόνες',

    'indexUsername'         => 'Χρήστης:',
    'page'                  => 'Εμφανίζονται οι εικόνες #begin# - #end# από τις #count#. &nbsp; Σελίδες: &nbsp;',
    'noimages'              => 'Δεν υπάρχουν εικόνες',
    'noPublicImages'        => 'Δεν υπάρχουν εικόνες για το κοινό. Παρακαλώ συνδεθείτε στο σύστημα.',
    'noscript'              => 'Συγνώμμη, οι φάκελοι μπορούν να εμφανιστούν μόνο όταν υπάρχει υποστήριξη για Javascript στο φυλλομετρητή σας.<br><br>Παρακαλώ πηγαίνετ στις ρυθμίσεις του φλλομετρητή σας και ενεργοποιήστε την Javascript για αυτον τν δικτυακό τόπο.',

    'prevPageBtn'           => 'Προηγούμενη',
    'prevPageBtnTitle'      => 'Πήγαιντε στην προηγούμενη σελίδα (#page#)',

    'nextPageBtn'           => 'Επόμενη',
    'nextPageBtnTitle'      => 'Πηγαιντε στην επόμενη σελίδα (#page#)',

    'statusLeft'            => '<b>#TotalImages#</b> εικόνες σε <b>#TotalAlbums#</b> συλλογές',
    'statusRight'           => '<a href="http://www.dalbum.org">Δημιουργήθηκε από το DAlbum #version# &copy; 2003 DeltaX Inc. σε #elapsed# δευτ.</a>',

    // Common stuff
    'mainPage'              => 'Πήγαιντε στην κεντρική σελίδα',
    'username'              => 'Όνομα χρήστη:',
    'password'              => 'Κωδικός πρόσβασης:',
    'bytes'                 => 'bytes',
    'KB'                    => 'KB',
    'MB'                    => 'MB',
    'pixels'                => 'εικονοστοιχεία',
    'errorReturn'           => 'Επιστρεψτε στην προηγούμενη σελίδα',

    /// Login.php
    'loginTitle'            =>  'Σύνδεση στο #title#',
    'loginAuthError'        =>  'Σφάλμα κατα την αυθεντικοποίηση',
    'loginBadUserName'      =>  'Το όνομα χρήστη ή ο κωδικός πρόσβασης δεν βρέθηκαν στην βάση δεδομένων.',
    'loginAgain'            =>  'Δοκιμάστε να συνδεθείτε ξανά',
    'loginNoCookiesWarning' =>  '<hr><b>Προσοχή: Τα cookies είναι απενεργοποιημένα στον φυλλομετρητή σας!</b><br>Για να μπορέσετε να συνεχίσετε θα πρέπει να έχετε ενεργοποιήση τα cookies.<br>Παρακαλώ ενεργοποιήστε τα cookies στις ρυθμίσεις του φλλομετρητή σας και ανανεώστε αυτή την σελίδα.<br><hr>',
    'loginLoginBtn'         => 'Είσοδος',
    'loginCancelBtn'        => 'Ακύρωση',

    // pass.php
    'passTitle'             => 'Διαχειρηση χρηστών',
    'passUserExists'        => 'Ο χρήστης #user# υπάρχει ήδη.',
    'passNotMatch'          => 'Οι κωδικοί πρόσβασης δεν είναι όμοιοι.',
    'passNoUserSelected'    => 'Δεν επιλέξατε χρηστη.',
    'passNoAdminDelete'     => 'Ο πρωταρχικός DAlbum διαχειριστής δεν μπορεί να δαγραφθεί.',
    'passWriteError'        => 'Δεν είναι δυνατόν να ανοιχτεί το αρχείο κωδικών πρόσβασης για εγγραφή!',
    'passError'             => '<b>Σφάλμα: </b>#error#',
    'passAddBtn'            => 'Προσθήκη',
    'passDeleteBtn'         => 'Διαγραφή',
    'passChangePwdBtn'      => 'Αλλαγή κωδικού πρόσβασης',
    'passCloseBtn'          => 'Κλείσιμο',
    'passCancelBtn'         => 'Ακύρωση',

    'passAddUserDlgTitle'   => 'Προσθήκη χρήστη',
    'passChangePwdDlgTitle' => 'Αλλαγή κωδικού πρόσβασης',
    'passConfirmPassword'   => 'Επιβεβαίωση κωδικού πρόσβασης:',

    // showimg.php
    'showPrevBtn'           => 'Προηγούμενη',
    'showPrevBtnTitle'      => 'Εμφάνισε την προηγούμενη εικόνα',

    'showNextBtn'           => 'Επόμενη',
    'showNextBtnTitle'      => 'Εμφάνισε την επόμενη εικόνα',

    'showIndexBtn'          => 'Περιεχόμενα',
    'showIndexBtnTitle'     => 'Επιστροφή στα περιεχόμενα της συλλογής',

    'showImageBtn'          => 'Εμφάνιση εικόνας',
    'showImageBtnTitle'     => 'Εμφάνιση της εικόνας μόνο σε νέο παραθυρο',

    'showHiResBtn'          => 'Αρχική (#size#)',
    'showHiResBtnTitle'     => 'Εμφάνισε την αρχική εικόνα σε πλήρη ανάλυση σε νέο παράθυρο',

    'showShowDetailsBtn'        => 'Λεπτομέριες',
    'showShowDetailsBtnTitle'   => 'Εμφάνιση των λεπτομέριων EXIF της εικόνας: Ημερομηνία εικόνας, Ταχύτητα κλείστρου κτλπ. (εαν είναι διαθέσιμα)',

    'showHideDetailsBtn'        => 'Χωρίς λεπτομέριες',
    'showHideDetailsBtnTitle'   => 'Απόκρυψη των λεπτομέριων EXIF της εικόνας',

    'showRotateBtn'             => 'Περιστροφή',
    'showRotateBtnTitle'        => 'Στρέψε της εικόνα 90 μοίρες με την φορά των δεικτών το ρολογιού',

    'showUpdateBtn'             => 'Ενημέρωση',
    'showUpdateBtnTitle'        => 'Ξαναδημιούργησε την εικόνα μικρότερης ανάλυσης και την προεπισκόπηση της εικόνας',

    'showExifFilename'          => 'Όνομα αρχείου: ',
    'showExifFilesize'          => 'Μέγεθος αρχείου: ',
    'showExifResolution'        => 'Ανάλυση: ',
    'showExifDateFormat'        => '%a, %d %B %Y %H:%M:%S',
    'showExifDate'              => 'Ημερομηνία: ',
    'showExifCamera'            => 'Φωτογραφικής κάμερας: ',
    'showExifISO'               => 'ISO: ',
    'showExifExposure'          => 'Έκθεση: ',
    'showExifAperture'          => 'Ανοιγμα: ',
    'showExifFocalLength'       => 'Εστιακή απόσταση: ',
    'showExifFlashYes'          => 'Ναί',
    'showExifFlashNo'           => 'Όχι',
    'showExifFlash'             => 'Χρησιμοποιήθηκε το flash: ',
    'showExifDialogTitle'       => 'Λεπτομέριες αρχικής εικόνας',

    'showImageTitleImage'       => 'Κάντε κλικ για να εμφανιστεί η επόμενη εικόνα: #image#',
    'showImageTitleIndex'       => 'Κάντε κλικ για να επιστρέψε στα περιεχόμενα της συλλογής',


    // edit*.php
    'editTitle'                 => 'Επεξεργασία #filename#',
    'editDlgTitle'              => 'Αρχείο ορισμού της συλλογής',
    'editFileLocation'          => 'Τοποθεσία αρχείου',

    'editEditAsTextBtn'         => 'Επεξεργασία ως κείμενο',
    'editEditAsTextBtnTitle'    => 'Επεξεργαστείτε αυτό το αρχείου σας ένα αρχείου απλού κειμένου',
    'editReindexNote'           => 'Παρακαλώ σημειώστε ότι πρέπει να ξαναδημιουργήσετε τα περιεχόμενα αφού αλλάξετε τις ρυθμίσεις αλλαγής μεγέθους για κάθε εικόνα',

    'editAlbumTitle'            => 'Ονομασια συλλογής:',
    'editAlbumDate'             => 'Ημερομηνια:',
    'editAlbumComment'          => 'Σχόλια:',
    'editAlbumTitleImage'       => 'Ονομασία εικονας:',
    'editAlbumDefault'          => 'Συλλογή που εμφανίζεται εξ\' ορισμού',
    'editAlbumUsers'            => 'Επιτρεπόμενοι χρήστες:',
    'editAlbumUsersNote'        => '(Λίστα (χωρισμένη με κόμματα) με τους χρήστες: άδειο πεδίο ή η λέξη <b>all</b> = έχουν οποιηδήποτε χρήστες πρόσβαση, <b>valid-user</b>=οποιοσδήποτε έγκυρος χρήστης)',

    'editCancelBtn'             => 'Ακύρωση',
    'editSaveBtn'               => 'Αποθήκευση',

    'editThumbLink'             => '#filename# (Ανοίγει σε νέο παράθυρο)',
    'editImgFilename'           => 'Όνομα αρχειου<br><small>(αλλάξτε το για να το μετονομάσετε, άφηστε το άδειο για να διαγραφθεί)</small>:',
    'editImgTitle'              => 'Τίτλος:',
    'editImgComment'            => 'Σχόλια:',
    'editImgResize'             => 'Αλλαγή μεγέθους της εικόνας',
    'editNewFileMessage'        => '( νέο αρχείο )',
    'editTop'                   => 'Κορυφή',

    'editRenameError'           => 'Δεν είναι δυνατόν να αλλαχθεί το όνομα αρχειο σε #filename# - η επέκταση είναι λάθος',
    'editSaveError'             => 'Υπήρξε κάποιο λάθος κατά την αποθήκευση του αρχείου ορισμού συλλογής #filename#',
    'editHTML'                  => 'HTML',
    'editText'                  => 'Απλό κείμενο',

    // reindex.php
    'reindexTitle'              => 'Δημιουργία περιεχομένων',
    'reindexDlgTitle'           => 'Δημιουργία περιεχομένων',
    'reindexDlgComment'         => 'Η δημιουργία περιεχομένων αναζητά για φακέλους με νέες εικόνες, δημιουργεί οποιαδήποτε χαμένα αρχεία προεπισκόπησης και ενημερώνει την βάση δεδομένων των εικόνων.',
    'reindexDlgSpeed'           => 'Παρακαλώ επιλέξτε την ταχύτητα δημιουργίας περιεχομένων:',

    'reindexSpeed0'             => '<b>Γρήγορα</b>. Δημιουργεί τα αρχεία προεπισκόπησης και τα μικρότερης ανάλυσης που δεν υπάρχουν. Δεν ελέγχει για την ακεραιότητα των αρχείων εικόνας.',
    'reindexSpeed1'             => '<b>Μέτρια</b>. Δημιουργεί τα αρχεία προεπισκόπησης και τα μικρότερης ανάλυσης που δεν υπάρχουν ή είναι κατεστραμένα. Ελέγχει για την ακεραιότητα των αρχείων εικόνας.',
    'reindexSpeed2'             => '<b>Αργά</b>. Όπως και στο <b>Μέτρια</b> αλλά διαγράφει επίσης και τις εικόνες προεπισκόπησης και μικρότερης ανάλυσης που δεν έχουν το αρχίκο αρχειο εικόνας.',
    'reindexSpeed3'             => '<b>Υπερβολικά αργά</b>. Ξαναδημιούργησε όλα τα αρχεία προεπισκόπησης και μικρότερης ανάλυσης. Προσοχή: μπορει να κρατήσει αρκετή ώρα!',

    'reindexCancelBtn'          => 'Ακύρωση',
    'reindexStartBtn'           => 'Έναρξη',

    'reindexProgressTitle'      => 'Δημιουργία περιεχόμένων σε εξέλιξη',

    'reindexError'              => 'Ένα σφάλμα υπήρξε κατα την δημιουργία του αρχειου προεπισκόπησης της εικόνας',
    'reindexRetry'              => 'Επανάληψη της είκόνας που απέτυχε',
    'reindexIgnore'             => 'Αγνόησε το σφάλμα και συνέχισε',
    'reindexAgain'              => 'Επανέναρξη της δημιουργίας περιεχομένων',

    'reindexMainImageProblem'   => 'Σφάλμα στο αρχειο εικόνας',
    'reindexResizedProblem'     => 'Σφάλμα στο αρχειο μικρότερης ανάλυσης',
    'reindexThumbProblem'       => 'Σφάλμα στο αρχειο προεπισκόπησης',

    'reindexCompleted'          => '<P>Η διαδικασία ολοκληρώθηκε.</P><P>Η δημιουργία περιεχομένων διάρκησε #elapsed# δευτερόλεπτα. Το δέντρο των συλλογών δημιουργήθηκε σε #treeelapsed# δευτερόλεπτα.</P>',
    'reindexStats'              => 'Στατιστικά',
    'reindexStatsAlbums'        => 'Συνολικές συλλογές:',
    'reindexStatsImages'        => 'Συνολικές εικόνες:',
    'reindexStatsOrigSize'      => 'Συνολικό μέγεθος αρχικών εικόνων:',
    'reindexStatsResizedSize'   => 'Συνολικό μέγεθος εικόνων μικρότερης ανάλυσης:',
    'reindexStatsThumbSize'     => 'Συνολικό μέγεθος αρχείων προεπισκόπησης:',

    'reindexStatusErrors'       => '<b>Κατάσταση: </b> #errors# σφάλματα βρεθήκαν:',

    'reindexStatusOK'           => '<b>Κατάσταση: </b> Επιτυχία. Δεν βρεθήκαν σφάλματα.',
    'reindexSaveError'          => '<b>Σφάλμα: </b>Δεν είναι δυνατόν να αποθηκευτεί το αρχείο #filename#',

    'reindexTHFilename'         => 'Όνομα αρχείου',
    'reindexTHProblem'          => 'Πρόβλημα',

    // customizations

    // Image comments
    'cCommentsImageComments'        => 'Σχόλια εικόνας',
    'cCommentsLoginToAddComments'   => 'Παρακαλώ συνδεθείτε #loginbutton# για να προσθέσετε τα σχόλια σας.<br>&nbsp;',
    'cCommentsYourName'             => 'Το όνομα σας:',
    'cCommentsComment'              => 'Σχόλια:',
    'cCommentsSendButtonText'       => 'Αποστολή',
    'cCommentsDeleteButtonText'     => 'Διαγραφή',
    'cCommentsMailSubject'          => 'Νέο σχόλιο σχετικά με την είκόνα #image# ( Συλλογή: #album# )',
    'cCommentsMailBody'             => "Νέο σχόλιο στάλθηκε από τον χρηστη #user#, IP: #ip#, DNS: #dns#\n\n#body#\n\nPage URL: #url#\n",
    'cCommentsDateFormat'           => 'F j, Y, g:i a',

    // Slide show
    'cSlideshowSlideshow'           => 'Χωρίς slideshow',
    'cSlideshowSeconds'             => 'Ανά #sec# δευτερόλεπτα',

    // Exif line (must be short)
    'cExiflineISOSpeedRatings'      => 'ISO:',
    'cExiflineExposure'             => 'E:',
    'cExiflineAperture'             => 'A:',
    'cExiflineFlash'                => 'Flash:',
    'cExiflineDateFormat'           => '%d %B %Y %H:%M:%S',

    // Custom file types
    'cCustomClickToOpen'            => 'Κάνε κλίκ για να ανοίξει το "#title#"',
    'cCustomOpenBtn'                => 'Ανοιγμα αρχείου',
    'cCustomOpenBtnTitle'           => 'Ανοιγμα αρχειο "#title#" στο τρέχων παράθυρο',

    // Highligh modified albums
    'cModifiedNew'                  => 'νέο!',
    'cModifiedUpdated'              => 'ενημερώθηκε!',

    ''  => ''
);
?>