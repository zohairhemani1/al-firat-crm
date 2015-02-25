<?php


include 'headers/connect_to_mysql.php'; 

$query = $_GET['query'];
if($_GET['type']=="email")
{
	echo "EMAILS:\n";
}
else
{
	echo "PHONE:\n";
}
//$query = "SELECT * FROM `form`";

$result = mysql_query($query) or die("Error executing query: ".mysql_error());

$row = mysql_fetch_assoc($result);

$line = "";

$comma = "";

/*

foreach($row as $name => $value)

{
    $line .= $comma . '"' . str_replace('"', '""', $name) . '"';
    $comma = ",";
}

$line .= "\n"; 

*/

$out = $line;

 

mysql_data_seek($result, 0);

 

while($row = mysql_fetch_assoc($result))

{
	
    /*$line = "";

    $comma = "";

    foreach($row as $value)

    {

        $line .= $comma . '"' . str_replace('"', '""', $value) . '"';

        $comma = ",";

    }
    $line .= "\n";

    $out.=$line;*/
	
	if($_GET['type']=="email")
	{
		$out .= $row['customerEmail'];
		$out .= "\n";
	}
	else
	{
		$out .= $row['mobile'];
		//$out .= $row['mobile_other'];
		//$out .= $row['tele'];
		$out .= "\n";
	}

}

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename={$_GET['type']}.csv");

echo $out;

exit;




?>