<?php include 'util/session.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'util/links.php' ?>

  <title>Add Ticket</title>

  <style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {

      opacity: 1;

    }
  </style>
</head>

<body style="background: #F3F3FF">
  <div class="md:flex">
    <?php include 'components/sidebar.php'; ?>
    <div class="grow" style="flex-grow: 1;">
      <?php include 'components/navbar.php' ?>
      <div class=" bg-white m-4 rounded-lg mt-8 font-bold">
        <div class="border-b-2 p-4 lg:p-8">
          <p class="text-2xl lg:text-3xl font-bold">New Ticket</p>
        </div>
        <div class="p-4 lg:p-8">
          <form action="util/addticket_functionality.php" method="POST">
            <div class=" lg:flex">
              <div class="pb-4 flex-1 lg:pr-8">
                <p class=" pl-2 pb-2">Customer Name</p>
                <input type="text" pattern="[A-Za-z ]{3,30}" title="Only Letters allowed and between size of 3 to 30." required name="customer_name" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
              <div class="pb-4 flex-1 lg:pl-8">

                <p class=" pl-2 pb-2">Select Ride</p>



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
            <div class=" lg:flex">
              <div class="pb-4 flex-1 lg:pr-8">
                <p class=" pl-2 pb-2">No. of Adult</p>
                <input type="number" required id="adult_price" onchange="updatePrice()" name="no_adult" placeholder="0" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
              <div class="pb-4 flex-1 lg:pl-8">
                <p class=" pl-2 pb-2">No. of Child</p>
                <input type="number" required id="child_price" onchange="updatePrice()" name="no_child" placeholder="0" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-2" fill="none" viewBox="0 0 24 24" stroke="gray">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <p class="mt-2 ml-2 text-sm text-gray-600">Child should be under age of 12</p>
                </div>
              </div>
            </div>


            <div class=" lg:flex justify-between items-center">
              <div class="lg:flex lg:w-1/2 lg:items-center pb-8 lg:pb-0">
                <p class="lg:pr-4 pb-2 pl-2 whitespace-nowrap">Total Amount</p>
                <input type="text" id="total_amount" value="0" placeholder="0" class="text-sm w-full lg:w-max border-2 rounded-lg shadow appearance-none py-2 px-3 bg-gray-400 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " disabled />
              </div>
              <button class="shadow w-full lg:w-40 lg:h-16 text-lg bg-green-900 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
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
  <script>
    const selected_ride = document.getElementById("selected_ride");
    const no_adult = document.getElementById("adult_price");
    const no_child = document.getElementById("child_price");
    const total_amount = document.getElementById("total_amount");

    var ride_list = <?php echo json_encode($ride_list); ?>;
    console.log(ride_list);
    let total;

    function updatePrice() {

      total = Number(ride_list[selected_ride.value]['adult_price']) * Number(no_adult.value) + Number(ride_list[selected_ride.value]["child_price"]) * Number(no_child.value)

      total_amount.value = total
    }
  </script>
</body>

</html>