<?php
	/*
	Load local file into the database table.
	Please define the table cloumn in CREATE TABLE section.
	The column order must be same as the one in the local file. 
	*/


	// Parameter set
	$database_name = "<database name here>";
	$table_name = "<table name here>";
	$load_file = "<filename here>";
	$user = "";
	$pass = "";
	$server = "";

	// Database connection
	$link = mysqli_init();
	mysqli_options($link, MYSQLI_OPT_LOCAL_INFILE, true);
	mysqli_real_connect($link, $server, $user, $pass, $database_name);

	// Table drop
	$sql = "DROP TABLE IF EXISTS `".$table_name."`;";
	mysqli_query($link, $sql) or die(mysqli_error($enllac));

	// Table create
	// Here are the sample columns.
	$sql = "CREATE TABLE `".$table_name."` (
	  `service_id` varchar(45) DEFAULT NULL,
	  `product_type` varchar(45) DEFAULT NULL,
	  `product_line` varchar(45) DEFAULT NULL,
	  `product_name` varchar(45) DEFAULT NULL,
	  `status` varchar(45) DEFAULT NULL,
	  `account` varchar(45) DEFAULT NULL,
	  `billing_start_date` varchar(45) DEFAULT NULL,
	  `billing_end_date` varchar(45) DEFAULT NULL,
	  `mrc_subtotal` int(11) DEFAULT NULL,
	  `nrc_subtotal` int(11) DEFAULT NULL,
	  `quantity` int(11) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	mysqli_query($link, $sql) or die(mysqli_error($enllac));

	// Load local data
	/*
	$sql = "LOAD DATA LOCAL INFILE '".$load_file."' INTO TABLE `".$table_name."`
	FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\r' IGNORE 1 LINES;";
	mysqli_query($link, $sql) or die(mysqli_error($enllac));
	*/

?>
