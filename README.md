# DAlbum for PHP 7 and up
This project is a modernization of DAlbum 1.44 build 177 from http://www.dalbum.org/. It is intended to fix the multiple fatal errors, warnings and notices that are generated when running under PHP 7 and up.

The modernization will not make DAlbum a modern product viable for new albums. It is only meant to allow you to continue running your legacy albums after migrating to more recent versions of PHP.

## Changes
* Replaced calls to [split](http://php.net/manual/en/function.split.php) with [explode](http://php.net/manual/en/function.explode.php).
* Replaced calls to [ereg](http://php.net/manual/en/function.ereg.php) and [eregi](http://php.net/manual/en/function.eregi.php) with [preg_match](http://php.net/manual/en/function.preg-match.php).
* Replaced call to [preg_replace](http://php.net/manual/en/function.preg-replace.php) using deprecated /e modifier with [preg_replace_callback](http://php.net/manual/en/function.preg-replace-callback.php).
* Replaced PHP 4 style constructors with `__construct()`.
* Removed checking for and handling of [magic_quotes](https://www.php.net/manual/en/info.configuration.php#ini.magic-quotes-gpc).
* Replaced occurrences of curly brace array syntax (`$foo{0}`) with bracket syntax (`$foo[0]`).
* Removed checks of `$_SERVER['PATH_INFO']` or `$_SERVER['ORIG_PATH_INFO']` being set when generating photo.php URLs. GET params will always be used instead.
* config.php renamed to config.php.dist
* Transcoded Lithuanian locale file from ISO-8859-13 to UTF-8.
