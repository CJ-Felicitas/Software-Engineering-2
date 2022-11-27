<?php  

//edit.php

include('product_database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':branch_id'  => $form_data->branch_id,
 ':product_name'  => $form_data->product_name,
 ':brand'  => $form_data->brand,
 ':category_id'  => $form_data->category_id,
 ':model_year'  => $form_data->model_year,
 ':list_price'  => $form_data->list_price,
 ':specifications'  => $form_data->specifications,
 ':quantity'  => $form_data->quantity,
 ':product_id'    => $form_data->product_id
);

$query = "
 UPDATE product 
 SET branch_id = :branch_id,
     product_name = :product_name, 
     brand = :brand, 
     category_id = :category_id, 
     model_year = :model_year, 
     list_price = :list_price, 
     specifications = :specifications,
     quantity = :quantity
 WHERE product_id = :product_id
";

$statement = $connect->prepare($query);
if($statement->execute($data))
{
 $message = 'Data Edited';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>
