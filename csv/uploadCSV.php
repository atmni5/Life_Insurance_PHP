<?PHP

// connect to the database server
$DServer = mysql_connect("mysql2.000webhost.com", "a9309716_tumini", "tumini5") or die("cannot connect");
// select the database from the server
$DBase = mysql_select_db("a9309716_tafe", $DServer) or die("not working");
$fname = $_FILES['sel_file']['name'];  
//echo $fname;
//die();   
$chk_ext = explode(".",$fname);     
if(strtolower($chk_ext[1]) == "csv")
{     
 $filename = $_FILES['sel_file']['tmp_name'];
 $handle = fopen($filename, "r");
 //echo $handle;	
 $flag = true;
 //echo $flag;
 ini_set('auto_detect_line_endings',TRUE);
 while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
 {
		if($flag) { $flag = false; continue;  }	
			echo $flag;
	 $size = count($data);
	 echo $size;
	 for($i = 0;  $i < $size; $i++) {
	   $data[$i]=removeinjection($data[$i]);
	   echo $data[$i]."<br>";
	 }
	
		
	 //check if rec exists if so update fields
	
	 $sql = "INSERT into tbl_products(`title`,`description`,`price`) values('$data[0]','$data[1]','$data[2]')";
	 mysql_query( $sql ) or die('Error##'.mysql_error());
	 echo $sql;
		
	 // fclose($handle);
	 echo "<BR>Successfully Imported";
 }
 
} else {
   echo "<BR>Invalid File";
 }    

fclose($handle);

function removeinjection($mystr){
$mystr=mysql_real_escape_string($mystr);
return $mystr;
}
?>




