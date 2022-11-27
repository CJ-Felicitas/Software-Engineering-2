
<?php  

//insert.php

include('customer_database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':first_name'  => $form_data->first_name,
 ':last_name'  => $form_data->last_name,
 ':phone'  => $form_data->phone,
 ':email'  => $form_data->email,
 ':street'  => $form_data->street,
 ':city'  => $form_data->city,
 ':zip_code'  => $form_data->zip_code

);

$query = "
 INSERT INTO customers 
 (first_name, last_name, phone, email, street, city, zip_code) VALUES 
 (:first_name, :last_name, :phone, :email, :street, :city, :zip_code)
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
