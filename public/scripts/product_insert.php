
<?php  

//insert.php

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
    ':quantity'  => $form_data->quantity
    
);

$query = "
 INSERT INTO product 
 (branch_id, product_name, brand, category_id, model_year, list_price, specifications, quantity) VALUES 
 (:branch_id, :product_name, :brand, :category_id, :model_year, :list_price, :specifications, :quantity)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 $message = 'Data Inserted';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>
