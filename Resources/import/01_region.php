<?php

$fh = fopen("reg2013.txt", "r");

$link = mysql_connect('localhost', 'root', '111111');
if (!$link) die('Could not connect: ' . mysql_error());
mysql_select_db("confreres");

$i = 0;
while ($i < 100) {

	$line = fgets($fh);
 	if ($line == null) break;
	
	if ($i == 0) {
		$i++;
		continue;
	}
 
	$a = explode("\t", $line);
	$code = trim($a[0]);
	$nom = trim($a[4]);
	//print($code . " : " . $cp . "\n");
 
	$query = 'INSERT INTO Region (code, nom) VALUES ("' . $code . '", "' . $nom . '");';
	print($i . " " . $query . "\n");
	mysql_query($query);
 
	$i++;
}

fclose($fh);

echo "\nDONE : $i\n";


