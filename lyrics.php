<?php

$_artist = ucfirst($_GET["artist"]);
$_song = ucfirst($_GET["song"]);

/*
$_artist = ucfirst($argv[1]);
$_song = ucfirst($argv[2]);
*/

$_urlWebsite = "http://lyrics.wikia.com/{$_artist}:{$_song}";

$_fileGet = file_get_contents($_urlWebsite);

$_pattern = "/(\&\#[0-9\;\<br\ \/\>]*)/";

preg_match_all($_pattern, $_fileGet, $_aOut);

$_words = implode("",$_aOut[1]);

$_words = html_entity_decode($_words);

$_words = str_ireplace(array("<   b", "<br />"), array("", "<br />\n"), $_words);
$_words= str_replace("<  b", "", $_words);

echo $_words;

//poi con la variabile $_words facci ciò che cazzo vuoi XD

?>