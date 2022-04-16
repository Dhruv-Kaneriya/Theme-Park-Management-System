

<?php include_once("util/session.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/dashboard.css">
    <?php include 'util/links.php' ?>
    <?php include 'util/total.php' ?>
    <title>DashBoard</title>

</head>
<body
    style="background: #F3F3FF"
  >
  <div class="md:flex">
      <?php include 'components/sidebar.php'; ?>
      <div class="grow" style="flex-grow: 1;">
        <!-- navbar section start  -->
        <?php include 'components/navbar.php' ?>
        <!-- navbar section end  -->
        <!-- two item section start -->
        <div class="md:flex justify-around leading-8">
          <div class="rounded-lg bg-white m-6 p-8 pl-8 md:w-2/5">
            <p class="font-bold ">Total Rides</p>
            <p class="text-5xl font-bold"><?php echo $total_rides?></p>
            <p class="font-bold text-gray-500">Total Tickets Sold</p>
            <p class="text-5xl font-bold text-gray-500"><?php echo $total_tickets?></p>
          </div>
          <div class="rounded-lg bg-white m-6 p-8 pl-8 md:w-2/5">
            <p class="font-bold ">Today's Sale</p>
            <p class="text-5xl font-bold"><?php echo $today_sale?></p>
            <p class="font-bold text-gray-500">Total Sales</p>
            <p class="text-5xl font-bold text-gray-500"><?php echo $total_sale?></p>
          </div>
        </div>
        <!-- two item section end -->
        <!-- recent ticket section start  -->
        <div>
          <div class="rounded-lg p-4 lg:mx-16 md:mx-4 mx-2 bg-white ">
            <!-- recent ticket header start -->
            <div class="flex justify-between px-4">
            <p class="font-bold text-lg">Recent Tickets</p>
            <p class="font-bold text-blue-700 text-sm"> <a href="ticketlist.php">show more tickets</a> </p>
            </div>
            <!-- recent ticket header ends  -->
            <div class="recent-ticket-gradient rounded-lg m-2 my-4">
              <?php include 'components/recent_table.php' ?>
            </div>
          </div>
        </div>
        <!-- recent ticket section end  -->
      </div>
    </div>

  </body>

</html>
