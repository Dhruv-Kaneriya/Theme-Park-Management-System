<?php include 'util/session.php'?>
<?php include 'util/isadmin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'util/links.php' ?>
    
    <title>Add Ticket</title>
    <!--<style>
      .dropdown-ring{
        border: 2px solid #007355;
      }
     
      </style>-->
      <style>
  input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {  

   opacity: 1;

}
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
            </div >
            <div class="p-4 lg:p-8">
                <form action="#">
                <div class="mt-5 lg:flex">
                <div class="pb-4 flex-1 lg:pr-8">
                        <p class=" pl-2 pb-2">Customer Name</p>
                        <input type="text" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 "/>
                    </div>
                   <div class="pb-4 flex-1 lg:pl-8">
                    
                        <p class=" pl-2 pb-2">Select Ride</p>



    <select id="selected_ride" class="form-select appearance-none
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
        <option selected>Please select</option>
        <option value="1">Ride 1</option>
        <option value="2">Ride 2</option>
        <option value="3">Ride 3</option>
    </select>
  </div>
  

</div>
<div class="mt-8 lg:flex">
<div class="pb-4 flex-1 lg:pr-8">
                        <p class=" pl-2 pb-2">No. of Adult</p>
                        <input type="number" placeholder="0" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 "/>
                    </div>
                    <div class="pb-4 flex-1 lg:pl-8">
                        <p class=" pl-2 pb-2">No. of Child</p>
                        <input type="number" placeholder="0" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 "/>
                        <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-2" fill="none" viewBox="0 0 24 24" stroke="gray">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
                        <p class="mt-2 ml-2 text-sm text-gray-600">Child should be under age of 12</p>
</div>
                      </div>
    </div>


    <div class="mt-8 lg:flex">
    <div class="pb-4 flex justify-between">
                        <p class="pl-2 pb-2 mr-5 mt-2">Total Amount</p>
                        <input type="text" placeholder="0" class="text-sm w-max border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 "/>
                    


    
                    <button
                        class="shadow w-max lg:w-40 lg:h-16 text-lg bg-green-900 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 mt-4 rounded"
                        type="submit"
                    >
                        Submit
                    </button>
                    </div>
</div>
<!--
<button id="dropdownDividerButton" 
data-dropdown-toggle="dropdownDivider" 
class="dropdown-ring w-full text-gray-700 bg-gray-400 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" 
type="button">Please Select

<svg class="right-0 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
   
  </button>




<div id="dropdownDivider" class="hidden z-10 w-full text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-1" aria-labelledby="dropdownDividerButton">
      <li>
        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
      </li>
    </ul>
    <div class="py-1">
      <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated link</a>
    </div>
</div>
    -->
</form>
</div>
</div>
</div>
</div>
</body>
</html>
