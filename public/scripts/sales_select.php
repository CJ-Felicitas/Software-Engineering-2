<?php  

//select.php
 
include('sales_database_connection.php');

$query = "SELECT * FROM orders ORDER BY order_id DESC";
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