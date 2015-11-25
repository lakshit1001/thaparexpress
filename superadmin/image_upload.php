<?php

define('DB_USERNAME', 'bookfoxi_tx1');
define('DB_PASSWORD', 'laxarsh6!');
define('DB_HOST', 'localhost');
define('DB_NAME', 'bookfoxi_tx');

$filename = $_FILES['file']['name'];
$id = $_POST['name'];
$type= $_POST['type'];
$ext = end((explode(".", $filename)));
$destination = "../superadmin/".$type.'img/' . $id . '.' . $ext;
if (move_uploaded_file( $_FILES['file']['tmp_name'] , $destination )){
  echo "The file ". $filename . " has been uploaded. to ". $destination;

// Create connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE events SET image='" . $id . "." . $ext . "' WHERE id='" . $id . "'";
echo($sql);
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

} else {
  echo $id . "Sorry, there was an error uploading your file.";
};

?>