<?php

header('Content-type: text/plain');

$link=mysql_pconnect('localhost','random','random');
if (!$link) {
    quit();
}
mysql_select_db('random',$link) || quit();

$ret=mysql_query('LOCK TABLE start WRITE',$link);
if (!$ret) {
    quit();
}

$ret=mysql_query('SELECT start FROM start',$link);
if (!$ret) {
    quit();
}

$row=mysql_fetch_assoc($ret);
if (!$row) {
    quit();
}

mysql_query('UPDATE start SET start = start + 8;') || quit();
$hexstring=file_get_contents('hidden/random-hex.txt',0,null,$row['start'],8);
if (strlen($hexstring) != 8) {
    quit();
}

$number=hexdec($hexstring);
print 'true:'.$number.":4294967295"; # HEX:FFFFFFFF = DEC:4294967295

$ret=mysql_query('UNLOCK TABLES',$link);
if (!$ret) {
    quit();
}

function quit() {
    mysql_query('UNLOCK TABLES',$link);
    print 'pseudo:'.mt_rand().":".mt_getrandmax();
    exit;
}

?>
