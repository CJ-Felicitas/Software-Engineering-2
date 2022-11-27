<?php  

//edit.php

include('staff_database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':first_name'  => $form_data->first_name,
 ':last_name'  => $form_data->last_name,
 ':email'  => $form_data->email,
 ':phone'  => $form_data->phone,
 ':branch_id'  => $form_data->branch_id,
 ':position_name'  => $form_data->position_name,
 ':username'  => $form_data->username,
 ':password'  => $form_data->password,
 ':staff_id'    => $form_data->staff_id
);

$query = "
 UPDATE staffs 
 SET first_name = :first_name,
     last_name = :last_name,
     email = :email,
     phone = :phone,
     branch_id = :branch_id,
     position_name = :position_name,
     username = :username,
     password = :password
 WHERE staff_id = :staff_id
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
