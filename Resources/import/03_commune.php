<?php

$fh = fopen("comsimp2013.txt", "r");

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
 
	$a = explode("\t", $line);
	$code_reg = trim($a[2]);
	$code_dep = trim($a[3]);
	$code_com = trim($a[3]) . trim($a[4]);
	$nom = trim(trim($a[11]) . " " . trim($a[10]));
	//print($code . " : " . $cp . "\n");
 
	$query = 'INSERT INTO Commune (code, departement_id, region_id, nom) VALUES ("' . $code_com . '", "' . $code_dep . '", "' . $code_reg . '", "' . $nom . '");';
	print($i . " " . $query . "\n");
	mysql_query($query);
 
	$i++;
}

fclose($fh);

echo "\nDONE : $i\n";


