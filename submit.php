<html>
<head>
<title>Submitted</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "dicodingkevsub1.database.windows.net";
	$userName = "kevhoz";
	$userPassword = 'Zxcasdqwe123';
	$dbName = "dicodingkevsub1";

	$connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);

	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}

	$sql = "INSERT INTO kevsub1 (Name, Email, Job) VALUES (?, ?, ?)";
	$params = array($_POST["txtName"], $_POST["txtEmail"], $_POST["txtJob"]);

	$stmt = sqlsrv_query( $conn, $sql, $params);
	if( $stmt === false ) {
		 die( print_r( sqlsrv_errors(), true));
	}
	else
	{
		echo "Record add successfully";
	}
	
	$stmt2 = "SELECT * FROM kevsub1";
   	$query = sqlsrv_query($conn, $stmt2);
?>
<table width="600" border="1">
  <tr>
    <th width="200"> <div align="center">Name </div></th>
    <th width="200"> <div align="center">Email </div></th>
    <th width="100"> <div align="center">Job </div></th>
  </tr>
<?php
while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
{
?>
  <tr>
    <td><?php echo $result["Name"];?></td>
    <td><?php echo $result["Email"];?></td>	  
    <td><?php echo $result["Job"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
sqlsrv_close($conn);
?>
</body>
<form action="https://dicodingkevsubs1web.azurewebsites.net">
	<input type="submit" value="Back to Form" />
</form>
</body>
</html>
