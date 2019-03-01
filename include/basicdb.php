<?php
include_once ("connect.php");
function check_username_by_table($tablename, $email){
	global $conn;
	
	$sql="SELECT * FROM $tablename WHERE email='$email' LIMIT 1";

	$result=mysqli_query($conn,$sql);

	return (mysqli_num_rows($result)>0)? true: false;
}

function get_field($table)
{
	global $conn;
	$field = array();
	$sql = "SHOW COLUMNS FROM $table";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$field[] = $row['Field'];
	}

	return $field;
}

// get filed name end
// insert  start

function insertion($table, $data = array())
{
	global $conn;
	foreach($data as $key => $value) {
		if (is_string($value)) {
			$data[$key] = mysqli_real_escape_string($conn, $value);
		}
	}

	$sql = "INSERT INTO $table VALUES ('" . join("', '", $data) . "');";
	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . $sql . "<br />" . mysqli_error($conn);
		exit;
	}

	return mysqli_insert_id($conn);
}

// insert  end
// sellect all element start

function get_all($table)
{
	global $conn;
	$sql = "SELECT * from $table";
	$result = mysqli_query($conn, $sql);
	return (mysqli_num_rows($result) > 0) ? $result : 0;
}
function get_all_desc($table,$descid)
{
	global $conn;
	$sql = "SELECT * from $table ORDER BY $descid DESC";
	$result = mysqli_query($conn, $sql);
	return (mysqli_num_rows($result) > 0) ? $result : 0;
}
// sellect all element end
// sellect by  id start

function get_by_id($table, $tableid, $id)
{
	global $conn;
	$sql = "SELECT * FROM $table WHERE $tableid='$id' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		return mysqli_fetch_array($result);
	}
	else {
		return 0;
	}
}

function get_by_any($table, $tableid, $id)
{
	global $conn;
	$sql = "SELECT * FROM $table WHERE $tableid='$id'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		return $result;
	}
	else {
		return 0;
	}
}

// sellect by id end
// delete start

function deletion($table, $tableid, $id)
{
	global $conn;
	$returndata = get_by_id($table, $tableid, $id);
	$sql = "DELETE FROM $table WHERE $tableid='$id'";
	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . $sql . "<br />" . mysqli_error($conn);
		exit;
	}

	return $returndata;
}

// delete end
// update start

function updation($table, $tableid, $id, $data = array())
{
	global $conn;
	foreach($data as $key => $value) {
		if (is_string($value)) {
			$data[$key] = mysqli_real_escape_string($conn, $value);
		}
	}

	$field = get_field($table);
	$att = array();
	foreach($data as $key => $value) {
		if ($value !== null) {
			$temp = $field[$key];
			$att[] = "{$temp}='{$value}'";
		}
	}

	$sql = "UPDATE $table SET " . join(", ", $att) . " where  $tableid='$id';";
	if (!mysqli_query($conn, $sql)) {
		echo "Error: " . $sql . "<br />" . mysqli_error($conn);
		exit;
	}

	return $id;
}

function get_num_rows($table)
{
	global $conn;
	$sql = "SELECT * FROM $table";
	$result = mysqli_query($conn, $sql);
	return mysqli_num_rows($result);
}
?>