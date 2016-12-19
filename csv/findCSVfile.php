<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #FF0033;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<p class="style1">  Make sure the csv file is saved without Excel formating (click Yes when saving the file as a CSV file in Excel to remove any Excel formating).<BR>
  <BR>
  <br>
</p>
<form action='uploadCSV.php' enctype="multipart/form-data" method="post" >

    Import CSV File : 
      <input type='file' name='sel_file' size='20'>
    <input type='submit' name='submit' value='submit'>

</form>  
   
</body>
</html>
