<?php

session_start();

include "../Database/db_conn.php";
if (isset($_POST['row'])) {
   $start = $_POST['row'];
   $limit = 3;
   $query = "SELECT * FROM ride_list LIMIT " . $start . "," . $limit;
   $result = mysqli_query($conn, $query);
   if ($result->num_rows > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
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



<?php }
   }
}
?>