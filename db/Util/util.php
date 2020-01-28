<?php 
//     //ENTER THE RELEVANT INFO BELOW
//     $mysqlUserName      = "Your Username";
//     $mysqlPassword      = "Your Password";
//     $mysqlHostName      = "Your Host";
//     $DbName             = "Your Database Name here";
//     $backup_name        = "mybackup.sql";
//     $tables             = "Your tables";

//    //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables

//     Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name=false );

//     function Export_Database($host,$user,$pass,$name,  $tables=false, $backup_name=false )
//     {
//         $mysqli = new mysqli($host,$user,$pass,$name); 
//         $mysqli->select_db($name); 
//         $mysqli->query("SET NAMES 'utf8'");

//         $queryTables    = $mysqli->query('SHOW TABLES'); 
//         while($row = $queryTables->fetch_row()) 
//         { 
//             $target_tables[] = $row[0]; 
//         }   
//         if($tables !== false) 
//         { 
//             $target_tables = array_intersect( $target_tables, $tables); 
//         }
//         foreach($target_tables as $table)
//         {
//             $result         =   $mysqli->query('SELECT * FROM '.$table);  
//             $fields_amount  =   $result->field_count;  
//             $rows_num=$mysqli->affected_rows;     
//             $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
//             $TableMLine     =   $res->fetch_row();
//             $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

//             for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
//             {
//                 while($row = $result->fetch_row())  
//                 { //when started (and every after 100 command cycle):
//                     if ($st_counter%100 == 0 || $st_counter == 0 )  
//                     {
//                             $content .= "\nINSERT INTO ".$table." VALUES";
//                     }
//                     $content .= "\n(";
//                     for($j=0; $j<$fields_amount; $j++)  
//                     { 
//                         $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
//                         if (isset($row[$j]))
//                         {
//                             $content .= '"'.$row[$j].'"' ; 
//                         }
//                         else 
//                         {   
//                             $content .= '""';
//                         }     
//                         if ($j<($fields_amount-1))
//                         {
//                                 $content.= ',';
//                         }      
//                     }
//                     $content .=")";
//                     //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
//                     if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
//                     {   
//                         $content .= ";";
//                     } 
//                     else 
//                     {
//                         $content .= ",";
//                     } 
//                     $st_counter=$st_counter+1;
//                 }
//             } $content .="\n\n\n";
//         }
//         //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
//         $backup_name = $backup_name ? $backup_name : $name.".sql";
//         header('Content-Type: application/octet-stream');   
//         header("Content-Transfer-Encoding: Binary"); 
//         header("Content-disposition: attachment; filename=\"".$backup_name."\"");  
//         echo $content; exit;
//     }

// Name of the file
$filename = 'churc.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = 'dump';

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>