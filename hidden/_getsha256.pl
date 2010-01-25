#!/usr/bin/perl

use Time::HiRes qw(usleep);

$prev="";
while (1) {
    $out=`sha256sum _image.jpg`;
    if ($out=~/^([0-9a-f]+)[^0-9a-f]/) {
	$hex=$1;
	if ($hex ne $prev) {
	    `echo -n "$hex" >> random-hex.txt`;
	}
	$prev=$hex;
    }
    usleep(500000);
}

