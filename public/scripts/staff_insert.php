
<?php

//insert.php

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
       );
$query = "
 INSERT INTO staffs
 (first_name, last_name, email,  phone, branch_id, position_name) VALUES
 (:first_name, :last_name, :email, :phone, :branch_id, :position_name)
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
