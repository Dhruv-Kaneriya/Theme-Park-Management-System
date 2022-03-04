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
</head>

<body style="background: #F3F3FF">
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
                              <div id="<?php echo $row['ride_id'] ?>"></div>
                                 <td class="py-1 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    <h1 class="text-xl font-bold"><?php echo $row['ride_name']?></h1>
                                    <p class="text-base text-gray-600"><?php echo $row['ride_description']?></p>
                                 </td>
                                 <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                    <h1 class="text-xl font-bold"><?php echo $row['adult_price']?></h1>
                                    <p class="text-base text-gray-600">Adult Price</p>
                                 </td>
                                 <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                    <h1 class="text-xl font-bold"><?php echo $row['child_price']?></h1>
                                    <p class="text-base text-gray-600">Child Price</p>
                                 </td>
                                 <td class="w-21 pr-4 py-1 text-sm text-gray-600 whitespace-nowrap dark:text-gray-400 flex justify-evenly">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#0066FF">
                                       <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                       <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                   <button class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#FF0000">
                                       <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                 </button>
                                 </td>
                                 </tr>
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
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
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
                  console.log('rowCount', rowCount)
                  console.log('count', count)
                  console.log('limit', limit)
                  console.log('row', row)
                  var rowCount = row + limit;
                  $('#postList').append(data);
                  console.log('rowCount', rowCount)
                  console.log('count', count)
                  console.log('limit', limit)
                  console.log('row', row)

                  if (rowCount >= count) {
                     $('#loadBtn').css("display", "none");
                  } else {
                     $("#loadBtn").val('Load More');
                  }
               }
            });
         });
      });
   </script>
   <script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).closest("tr").attr("ride_id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'util/delete.php',
               type: 'GET',
               data: {ride_id: ride_id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+ride_id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });
</body>

</html>
