<?php
include "Database/db_conn.php";
$sql="SELECT tickets_list.no_adult,tickets_list.no_child,ride_list.adult_price,ride_list.child_price, SUM(tickets_list.no_adult*ride_list.adult_price) as adult_sale, SUM(tickets_list.no_child*ride_list.child_price) as child_sale from tickets_list INNER JOIN ride_list ON tickets_list.ride_id=ride_list.ride_id";
//$sql="SELECT tickets_list.no_adult,tickets_list.no_child,ride_list.adult_price,ride_list.child_price, SUM(tickets_list.no_adult*ride_list.adult_price as today_sale from tickets_list INNER JOIN ride_list ON tickets_list.ride_id=ride_list.ride_id where DATE(date_issued)=CURDATE()";
//$sql="SELECT SUM(no_adult) as today_sale FROM tickets_list where DATE(date_issued)=CURDATE()";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_array($result);
$total_sale=$res['adult_sale']+$res['child_sale'];

$sql="SELECT tickets_list.no_adult,tickets_list.no_child,ride_list.adult_price,ride_list.child_price, SUM(tickets_list.no_adult*ride_list.adult_price) as adult_sale, SUM(tickets_list.no_child*ride_list.child_price) as child_sale from tickets_list INNER JOIN ride_list ON tickets_list.ride_id=ride_list.ride_id where DATE(date_issued)=CURDATE()";
//$sql="SELECT tickets_list.no_adult,tickets_list.no_child,ride_list.adult_price,ride_list.child_price, SUM(tickets_list.no_adult*ride_list.adult_price as today_sale from tickets_list INNER JOIN ride_list ON tickets_list.ride_id=ride_list.ride_id where DATE(date_issued)=CURDATE()";
//$sql="SELECT SUM(no_adult) as today_sale FROM tickets_list where DATE(date_issued)=CURDATE()";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_array($result);
$today_sale=$res['adult_sale']+$res['child_sale'];


// $sql="SELECT SUM(no_tickets) as total_sale FROM tickets_list";
// $result = mysqli_query($conn, $sql);
// $res = mysqli_fetch_array($result);
// $total_sale=$res['total_sale'];

$sql="SELECT COUNT(ride_id) as total_rides FROM ride_list";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_array($result);
$total_rides=$res['total_rides'];


$sql="SELECT SUM(no_adult+no_child) as total_tickets FROM tickets_list";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_array($result);
$total_tickets=$res['total_tickets'];


?>