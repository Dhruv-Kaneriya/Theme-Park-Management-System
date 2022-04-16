<?php include 'util/session.php' ?>
<?php include 'util/isadmin.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'util/links.php' ?>

  <title>Pricing</title>


</head>

<body style="background: #F3F3FF">
  <div class="md:flex">
    <?php include 'components/sidebar.php'; ?>
    <div class="grow" style="flex-grow: 1;">
      <?php include 'components/navbar.php' ?>
      <div class=" bg-white m-4 rounded-lg mt-8 font-bold">
        <div class="border-b-2 p-4 lg:p-8">
          <p class="text-2xl lg:text-3xl font-bold">Edit Pricing</p>
        </div>
        <div class="p-4 lg:p-8">
          <form action="util/pricing_functionality.php" method="POST">
            <div class="pb-4">
              <p class=" pl-2 pb-2">Select Ride</p>
              <div class="flex justify-center">
                <div class="w-full">
                  <select id="selected_ride" required onchange="updatePrice()" name="select_ride" class="form-select appearance-none 
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    text-gray-700 
                    bg-gray-400 
                    font-medium 
                    rounded-lg
                    bg-no-repeat
                    border-2 border-solid border-green-700
                  
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-green-700 focus:outline-none" aria-label="Select Ride">
                    <option disabled>---Please select---</option>
                    <?php
                    include "Database/db_conn.php";

                    $sql = "SELECT * FROM ride_list";

                    $result = mysqli_query($conn, $sql);
                    $ride_list = [];
                    $i = 0;
                    while ($res = mysqli_fetch_array($result)) {
                      $subtable = [

                        "adult_price" => $res['adult_price'],
                        "child_price" => $res['child_price']
                      ];
                      $ride_list[$res['ride_id']] = $subtable;
                    ?>
                      <option selected value=<?php echo $res['ride_id'] ?>><?php echo $res['ride_name'] ?></option>
                    <?php
                    }

                    ?>

                  </select>

                </div>
              </div>
            </div>
            <div class="lg:flex">
              <div class="pb-4 flex-1 lg:pr-8">
                <p class=" pl-2 pb-2">Adult Price</p>
                <input required pattern="[0-9]{0,11}" name="adult_price" title="Amount must be in digits" type="text" placeholder="eg. $400" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
              <div class="pb-4 flex-1 lg:pl-8">
                <p class=" pl-2 pb-2">Child Price</p>
                <input required pattern="[0-9]{0,11}" name="child_price" title="Amount must be in digits" type="text" placeholder="eg. $200" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
            </div>
            <div class=" flex justify-end">
              <button class="shadow w-full lg:w-40 lg:h-16 text-lg bg-green-900 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 mt-4 rounded" type="submit">
                Submit
              </button>
            </div>
            <div class="mt-8 flex justify-center">
              <?php if (isset($_GET['status'])) { ?>
                <p class="text-sm text-green-600"> <?php echo $_GET['status'] ?> </p>
              <?php } ?>
              <?php if (isset($_GET['error'])) { ?>
                <p class="text-sm text-red-600"> <?php echo $_GET['error'] ?> </p>
              <?php } ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>