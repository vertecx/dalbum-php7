# DAlbum for PHP 7
This project is a modernization of DAlbum 1.44 build 177 from http://www.dalbum.org/. It is intended to fix the multiple fatal errors, warnings and notices that are generated when running under PHP 7.

The modernization will not make DAlbum a modern product viable for new albums. It is only meant to allow you to continue running your legacy albums after migrating to PHP 7.

## Changes
* Replace calls to [split](http://php.net/manual/en/function.split.php) with [explode](http://php.net/manual/en/function.explode.php).
* Replace calls to [ereg](http://php.net/manual/en/function.ereg.php) and [eregi](http://php.net/manual/en/function.eregi.php) with [preg_match](http://php.net/manual/en/function.preg-match.php).
* Replace call to [preg_replace](http://php.net/manual/en/function.preg-replace.php) using deprecated /e modifier with [preg_replace_callback](http://php.net/manual/en/function.preg-replace-callback.php).
