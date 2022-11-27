<?php  

//select.php
 
include('staff_database_connection.php');

$query = "SELECT * FROM staffs ORDER BY staff_id DESC";
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