#!/usr/bin/perl


exit if (!-f $ARGV[0]);

open(F,"$ARGV[0]");
$line=<F>;
close F;

%tmp=();
$tot=0;

foreach (split(//,$line)) {
    $tmp{$_}++;
    $tot++;
}

foreach (sort(keys(%tmp))) {
    print "$_ = $tmp{$_} = ".(int(($tmp{$_}/$tot)*10000)/100)."%\n";
}
