<?php include 'util/session.php' ?>
<?php include 'util/isadmin.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include 'util/links.php' ?>
   <link rel="stylesheet" href="styles/ridelist.css">
   <title>List Rides</title>
</head>

<body style="background: #F3F3FF">
   <div class="md:flex">
      <?php include 'components/sidebar.php'; ?>
      <div class="grow" style="flex-grow: 1;">
         <?php include 'components/navbar.php' ?>
         <div class=" bg-white m-4 rounded-lg mt-8 font-bold">
            <div class="border-b-2 p-4 lg:p-8 flex justify-between">
               <p class="text-2xl lg:text-3xl font-bold">Rides List</p>
               <button class="shadow w-25 bg-green-900 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">+ &nbsp; Add Ride</button>
            </div>
            <div class="flex flex-col">
               <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                     <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="ride-list-table min-w-full text-center">

                           <tbody class="mx-8 ">

                              <tr class="bg-transparent dark:bg-gray-800 dark:border-gray-700 text-left">
                                 <td class="py-1 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    <h1 class="text-xl font-bold">Bumper Boats</h1>
                                    <p class="text-base text-gray-600">Water Ride</p>
                                 </td>
                                 <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                    <h1 class="text-xl font-bold">$300</h1>
                                    <p class="text-base text-gray-600">Adult Price</p>
                                 </td>
                                 <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                    <h1 class="text-xl font-bold">$150</h1>
                                    <p class="text-base text-gray-600">Child Price</p>
                                 </td>
                                 <td class="w-21 pr-4 py-1 text-sm text-gray-600 whitespace-nowrap dark:text-gray-400 flex justify-evenly">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#0066FF">
                                       <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                       <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#FF0000">
                                       <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                 </td>
                              </tr>

                              <tr class="bg-transparent dark:bg-gray-800 dark:border-gray-700 text-left">
                                 <td class="py-1 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    <h1 class="text-xl font-bold">The Roller Coaster</h1>
                                    <p class="text-base text-gray-600">Thrill Ride</p>
                                 </td>
                                 <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                    <h1 class="text-xl font-bold">$250</h1>
                                    <p class="text-base text-gray-600">Adult Price</p>
                                 </td>
                                 <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                    <h1 class="text-xl font-bold">$200</h1>
                                    <p class="text-base text-gray-600">Child Price</p>
                                 </td>
                                 <td class="w-21 pr-4 py-1 text-sm text-gray-600 whitespace-nowrap dark:text-gray-400 flex justify-evenly">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#0066FF">
                                       <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                       <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#FF0000">
                                       <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                 </td>
                              </tr>

                              <tr class="bg-transparent dark:bg-gray-800 dark:border-gray-700 text-left">
                                 <td class="py-1 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    <h1 class="text-xl font-bold">The Mechanical Bull</h1>
                                    <p class="text-base text-gray-600">Thrill Ride</p>
                                 </td>
                                 <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                    <h1 class="text-xl font-bold">$200</h1>
                                    <p class="text-base text-gray-600">Adult Price</p>
                                 </td>
                                 <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                    <h1 class="text-xl font-bold">Not Allowed</h1>
                                    <p class="text-base text-gray-600">Child Price</p>
                                 </td>
                                 <td class="w-21 pr-4 py-1 text-sm text-gray-600 whitespace-nowrap dark:text-gray-400 flex justify-evenly">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#0066FF">
                                       <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                       <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#FF0000">
                                       <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                 </td>
                              </tr>

                           </tbody>
                        </table>
                        <p class="font-bold text-blue-700 text-base text-right pr-8 mb-6"> <a href="#">Show More Records</a> </p>
                     </div>
                  </div>


</body>

</html>