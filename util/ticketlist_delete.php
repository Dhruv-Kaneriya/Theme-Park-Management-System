<?php
//delete.php
include "../Database/db_conn.php";

if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM tickets_list WHERE ticket_id = '".$id."'";
  mysqli_query($conn, $query);
 }
}
