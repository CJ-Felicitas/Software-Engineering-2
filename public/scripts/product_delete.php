<?php

//delete.php

include('product_database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$query = "DELETE FROM product WHERE product_id = '".$form_data->product_id."'";

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
