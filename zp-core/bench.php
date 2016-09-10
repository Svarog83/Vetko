<?php
$str = 'someFileName.withDot.jpg';

$_zp_script_timer['start'] = microtime();

$iter = 1000000;

for ( $i = 0; $i < $iter; $i++) {
	$suffix = getSuffix2($str);
}

$_zp_script_timer['complete'] = microtime();


list($usec, $sec) = explode(' ', array_shift($_zp_script_timer));
$first = $last = (float) $usec + (float) $sec;
$_zp_script_timer['end'] = microtime();
foreach ($_zp_script_timer as $step => $time) {
	list($usec, $sec) = explode(" ", $time);
	$cur = (float) $usec + (float) $sec;
	printf("" . 'Zenphoto script processing %1$s:%2$.4f seconds' . " \n", $step, $cur - $last);
	$last = $cur;
}
if (count($_zp_script_timer) > 1)
	printf("" . 'Zenphoto script processing total:%.4f seconds' . " -->\n", $last - $first);


function getSuffix($filename) {
	$suffix = strtolower(substr(strrchr($filename, "."), 1));
	return $suffix;
}

function getSuffix2($filename) {
	$suffix = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
	return $suffix;
}
