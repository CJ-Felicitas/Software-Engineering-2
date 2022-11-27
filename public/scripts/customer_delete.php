<?php

//delete.php

include('customer_database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$query = "DELETE FROM customers WHERE customer_id = '".$form_data->customer_id."'";

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
