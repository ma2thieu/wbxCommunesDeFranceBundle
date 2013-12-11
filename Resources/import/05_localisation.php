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
	$code_reg = trim($a[0]);
	$code_dep = trim($a[1]);
	$code_com = trim($a[4]);
	$cp = trim($a[7]);

	//print($code . " : " . $cp . "\n");

	$cps = explode("-", $cp);
 	foreach ($cps as $c) {
		$query = 'INSERT INTO Localisation (code_postal_id, commune_id, departement_id, region_id) VALUES ("' . $c . '", "' . $code_com . '", "' . $code_dep . '", "' . $code_reg . '");';
		print($i . " " . $query . "\n");
		mysql_query($query);
		
		$i++;
	}
 
}

fclose($fh);

echo "\nDONE : $i\n";


