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

	$sql = "INSERT INTO customer (Name, Email, Job) VALUES (?, ?, ?)";
	$params = array($_POST["txtName"], $_POST["txtEmail"], $_POST["txtJob"]);

	$stmt = sqlsrv_query( $conn, $sql, $params);
	if( $stmt === false ) {
		 die( print_r( sqlsrv_errors(), true));
	}
	else
	{
		echo "Record add successfully";
	}

	sqlsrv_close($conn);
?>
</body>
</html>
