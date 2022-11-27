<?php  

//select.php
 
include('product_database_connection.php');

$query = "SELECT * FROM product ORDER BY product_id DESC";
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