<?php  

//select.php
 
include('customer_database_connection.php');

$query = "SELECT * FROM customers ORDER BY customer_id DESC";
$statement = $connect->prepare($query);
if($statement->execute())
{
  while($row = $statement->fetch(PDO::FETCH_ASSOC))
  {
    $data[] = $row;
  }
  echo json_encode($data);
}

?>