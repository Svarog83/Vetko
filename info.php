<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
	Locales & INFO
	</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

</head>

<body>
<?php
// settings you may want to change
$locale = "ru_RU";  // the locale you want
$locales_root = "./locale";  // locales directory
$domain = "zenphoto"; // the domain you're using, this is the .PO/.MO file name without the extension

// activate the locale setting
setlocale(LC_ALL, $locale . ".utf8");
setlocale(LC_TIME, $locale . ".utf8");
putenv("LANG=$locale");
// path to the .MO file that we should monitor
$filename = "$locales_root/$locale/LC_MESSAGES/$domain.mo";
$mtime = filemtime($filename); // check its modification time
// our new unique .MO file
$filename_new = "$locales_root/$locale/LC_MESSAGES/{$domain}_{$mtime}.mo";

if (!file_exists($filename_new)) {  // check if we have created it before
      // if not, create it now, by copying the original
      copy($filename,$filename_new);
}
// compute the new domain name
$domain_new = "{$domain}_{$mtime}";
// bind it
bindtextdomain($domain_new,$locales_root);
bind_textdomain_codeset($domain_new, 'UTF-8');
// then activate it
textdomain($domain_new);
// all done

echo gettext('latest comments') . '.<br>';
echo gettext('View album:'). '.<br>';
echo '<br>' . gettext('Contact us');
echo '<br> = ' . $domain_new . '<br><br>';
echo '<br>---------';
echo strftime("%B, %d (%A) в %H:%M", mktime(0, 0, 0, 12, 22, 1978));
echo '<br>---------';
/*function list_system_locales(){
    ob_start();
    system('locale -a');
    $str = ob_get_contents();
    ob_end_clean();
    return split("\\n", trim($str));
}

$locales = list_system_locales();*/

?>
</body>
</html>