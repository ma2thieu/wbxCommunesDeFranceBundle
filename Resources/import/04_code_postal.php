<?php

$fh = fopen("com.txt", "r");

$link = mysql_connect('localhost', 'root', '111111');
if (!$link) die('Could not connect: ' . mysql_error());
mysql_select_db("confreres");

$i = 0;
while ($i < 100000) {

	$line = fgets($fh);
 	if ($line == null) break;
	
	if ($i == 0) {
		$i++;
		continue;
	}
 
	$a = explode(";", $line);
	$cp = trim($a[7]);

	//print($code . " : " . $cp . "\n");

	$cps = explode("-", $cp);
 	foreach ($cps as $c) {
		$query = 'INSERT INTO CodePostal (code) VALUES ("' . $c . '");';
		print($i . " " . $query . "\n");
		mysql_query($query);
		
		$i++;
	}
 
}

fclose($fh);

echo "\nDONE : $i\n";


