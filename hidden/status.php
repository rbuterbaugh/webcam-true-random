<?php

$link=mysql_pconnect('localhost','random','random');
mysql_select_db('random',$link) || quit();
$ret=mysql_query('SELECT start FROM start',$link);
$row=mysql_fetch_assoc($ret);
$pos=$row['start'];
$size=`ls -la random-hex.txt |cut -d " " -f 5`;
$size-=0;
print 'Random file usage: '.sprintf('%.2f',($pos*100/$size))."% (".$pos." characters used, ".$size." characters total)\n";

?>
