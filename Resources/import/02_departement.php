<?php

$fh = fopen("depts2013.txt", "r");

$link = mysql_connect('localhost', 'root', '111111');
if (!$link) die('Could not connect: ' . mysql_error());
mysql_select_db("confreres");

$i = 0;
while ($i < 200) {

	$line = fgets($fh);
 	if ($line == null) break;
	
	if ($i == 0) {
		$i++;
		continue;
	}
 
	$a = explode("\t", $line);
	$code_region = trim($a[0]);
	$code = trim($a[1]);
	$nom = trim($a[5]);
	//print($code . " : " . $cp . "\n");
 
	$query = 'INSERT INTO Departement (code, region_id, nom) VALUES ("' . $code . '", "' . $code_region . '", "' . $nom . '");';
	print($i . " " . $query . "\n");
	mysql_query($query);
 
	$i++;
}

fclose($fh);

echo "\nDONE : $i\n";


