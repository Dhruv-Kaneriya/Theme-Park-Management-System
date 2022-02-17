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
          <form action="#">
            <div class="pb-4">
              <p class=" pl-2 pb-2">Select Ride</p>
              <div class="flex justify-center">
                <div class="w-full">
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
            </div>
            <div class="lg:flex">
              <div class="pb-4 flex-1 lg:pr-8">
                <p class=" pl-2 pb-2">Adult Price</p>
                <input type="text" placeholder="eg. $400" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
              <div class="pb-4 flex-1 lg:pl-8">
                <p class=" pl-2 pb-2">Child Price</p>
                <input type="text" placeholder="eg. $200" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
            </div>
            <div class=" flex justify-end">
              <button class="shadow w-full lg:w-40 lg:h-16 text-lg bg-green-900 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 mt-4 rounded" type="submit">
                Submit
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>