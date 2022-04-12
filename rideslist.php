<?php include 'util/session.php' ?>
<?php include 'util/isadmin.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include 'util/links.php' ?>
   <link rel="stylesheet" href="styles/ridelist.css">
   <title>List Rides</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" href="styles/general.css">
   <style>
      .bg-opacity-50 {
         /* background-color: rgb(48, 227, 143, 0.1); */
         background-color: rgb(0, 230, 34, 0.1);
      }
   </style>
</head>

<body style="background: #F3F3FF">
   <!-- model start  -->
   <div id="ride-edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
      <div class="relative p-4 w-full max-w-md h-full md:h-auto">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-end p-2">
               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="ride-edit-modal">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
               </button>
            </div>
            <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" action="util/ridelist_update.php" method="POST">
               <h3 class="text-xl font-medium text-gray-900 dark:text-white">Update Ride Details</h3>
               <div>
                  <label for="ride_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ride Name</label>
                  <input type="ride_name" name="ride_name" id="ride_name" class="bg-gray-50 border-2 border-green-700 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
               </div>
               <div>
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">ride_description</label>
                  <input type="ride_description" name="ride_description" id="ride_description" placeholder="" class="bg-gray-50 border-2 border-green-700 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
               </div>
               <input type="text" name="ride_id" id="ride_id" hidden>
               <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update Details</button>

            </form>
         </div>
      </div>
   </div>
   <!-- model end  -->
   <div class="md:flex">
      <?php include 'components/sidebar.php'; ?>
      <div class="grow" style="flex-grow: 1;">
         <?php include 'components/navbar.php' ?>
         <div class=" bg-white m-4 rounded-lg mt-8 font-bold">
            <div class="border-b-2 p-4 lg:p-8 flex justify-between">
               <p class="text-2xl lg:text-3xl font-bold">Rides List</p>
               <a href="addrides.php" class="shadow text-lg bg-green-900 flex items-center hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  <span class="text-sm "> Add Rides</span>
               </a>
            </div>
            <div class="flex flex-col">
               <div class="overflow-x-auto overflow-y-auto view-height sm:text-sm">
                  <div class="inline-block py-2 min-w-full sm:px-6 lg:px-3">
                     <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="ride-list-table min-w-full text-center">

                           <tbody id="postList" class="mx-8 ">
                              <?php
                              // path is from relative to dashboard 
                              include "Database/db_conn.php";


                              $count_query = "SELECT count(*) as allcount FROM ride_list";
                              $count_result = mysqli_query($conn, $count_query);

                              $count_fetch = mysqli_fetch_array($count_result);
                              $postCount = $count_fetch['allcount'];
                              $limit = 3;
                              $sql = "SELECT ride_id, ride_name, ride_description,adult_price,child_price from ride_list LIMIT 0," . $limit;


                              $res = mysqli_query($conn, $sql);
                              if ($res->num_rows > 0) {
                                 while ($row = mysqli_fetch_assoc($res)) {
                              ?>


                                    <tr class="bg-transparent dark:bg-gray-800 dark:border-gray-700 text-left">

                                       <td class="py-1 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                          <h1 class="text-xl font-bold"><?php echo $row['ride_name'] ?></h1>
                                          <p class="text-base text-gray-600"><?php echo $row['ride_description'] ?></p>
                                       </td>
                                       <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                          <h1 class="text-xl font-bold"><?php echo $row['adult_price'] ?></h1>
                                          <p class="text-base text-gray-600">Adult Price</p>
                                       </td>
                                       <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                          <h1 class="text-xl font-bold"><?php echo $row['child_price'] ?></h1>
                                          <p class="text-base text-gray-600">Child Price</p>
                                       </td>
                                       <td class="w-21 pr-4 py-1 text-sm text-gray-600 whitespace-nowrap dark:text-gray-400 flex justify-evenly">
                                          <button type="button" id="<?php echo $row['ride_id'] ?>" onclick="edit_onclick(this.id)" data-modal-toggle="ride-edit-modal">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#0066FF">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                             </svg>
                                          </button>

                                          <a href="util/deleteride.php?id=<?= $row['ride_id'] ?>" onclick='return deleterecord()'>
                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#FF0000">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                             </svg>

                                          </a>


                                       </td>

                                    </tr>

                              <?php
                                 }
                              }

                              ?>


                           </tbody>
                        </table>
                        <div class="m-4 flex justify-end">
                           <div class="load-more">
                              <input class="font-bold text-blue-700 text-base text-right pr-8 mb-6" type="button" id="loadBtn" value="Show More Records">
                              <input type="hidden" id="row" value="0">
                              <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
                           </div>
                        </div>
                        <div class="mt-8 flex justify-center">
                           <?php if (isset($_GET['status'])) { ?>
                              <p class="text-sm text-green-600"> <?php echo $_GET['status'] ?> </p>
                           <?php } ?>
                           <?php if (isset($_GET['error'])) { ?>
                              <p class="text-sm text-red-600"> <?php echo $_GET['error'] ?> </p>
                           <?php } ?>
                        </div>
                     </div>

                  </div>

               </div>
            </div>
         </div>
      </div>
      <!-- <div modal-backdrop="" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40"></div> -->
      <script>
         $(document).ready(function() {
            $(document).on('click', '#loadBtn', function() {
               var row = Number($('#row').val());
               var count = Number($('#postCount').val());
               var limit = 3;
               row = row + limit;
               $('#row').val(row);
               $("#loadBtn").val('Loading...');

               $.ajax({
                  type: 'POST',
                  url: 'util/load-rides-list.php',
                  data: 'row=' + row,
                  success: function(data) {
                     var rowCount = row + limit;
                     $('#postList').append(data);

                     if (rowCount >= count) {
                        $('#loadBtn').css("display", "none");
                     } else {
                        $("#loadBtn").val('Load More');
                     }
                     window.document.dispatchEvent(new Event("DOMContentLoaded", {
                        bubbles: true,
                        cancelable: true
                     }));
                  }
               });
            });
         });
      </script>

      <script>
         function edit_onclick(id) {
            const edit_ride_name = document.getElementById("ride_name");
            const edit_ride_description = document.getElementById("ride_description");
            const edit_ride_id = document.getElementById("ride_id")

            $.ajax({
               type: "POST",
               url: "util/ridelist_edit.php",
               data: {
                  ride_id: id
               },
               success: function(data) {
                  console.log(data)
                  data = JSON.parse(data)
                  edit_ride_name.value = data["ride_name"]
                  edit_ride_description.value = data["ride_description"]
                  edit_ride_id.value = id
               }
            });
         }

         function deleterecord() {
            return confirm('Are you sure you want to delete this record?');
         }
      </script>

</body>

</html>