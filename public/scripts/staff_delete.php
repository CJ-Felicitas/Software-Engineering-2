<?php

//delete.php

include('staff_database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$query = "DELETE FROM staffs WHERE staff_id = '".$form_data->staff_id."'";

$statement = $connect->prepare($query);
if($statement->execute())
{
 $message = 'Data Deleted';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>
