<?php include 'util/session.php' ?>
<?php include 'util/isadmin.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'util/links.php' ?>


  <title>Add Staff</title>

</head>

<body style="background: #F3F3FF">
  <div class="md:flex">
    <?php include 'components/sidebar.php'; ?>
    <div class="grow" style="flex-grow: 1;">
      <?php include 'components/navbar.php' ?>
      <div class=" bg-white m-4 rounded-lg mt-8 font-bold">
        <div class="border-b-2 p-4 lg:p-8">
          <p class="text-2xl lg:text-3xl font-bold">Add Staff</p>
        </div>
        <div class="p-4 lg:p-8">
          <form onsubmit="return validatePassword()" action="util/addstaff_functionality..php" method="POST">
            <div class=" lg:flex">
              <div class="pb-4 flex-1 lg:pr-8">
                <p class=" pl-2 pb-2">First Name</p>
                <input pattern="[A-Za-z ]{3,30}" title="Only Letters allowed and between size of 3 to 30." type="text" required name="first_name" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
              <div class="pb-4 flex-1 lg:pl-8">
                <p class=" pl-2 pb-2">Email Id</p>
                <input type="email" required name="email_id" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
            </div>
            <div class=" lg:flex">
              <div class="pb-4 flex-1 lg:pr-8">
                <p class=" pl-2 pb-2">Last Name</p>
                <input type="text" name="last_name" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
              <div class="pb-4 flex-1 lg:pl-8">
                <p class=" pl-2 pb-2">Password</p>
                <input type="password" required id="password" name="password" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
            </div>
            <div class=" lg:flex">
              <div class="pb-4 flex-1 lg:pr-8">
                <p class=" pl-2 pb-2">User Role</p>
                <select id="selected_role" required name="user_role" class="form-select appearance-none
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
                  <option selected value="1">Admin</option>
                  <option value="2">Staff</option>
                </select>
              </div>
              <div class="pb-4 flex-1 lg:pl-8">
                <p class=" pl-2 pb-2">Confirm Password</p>
                <input type="password" required id="confirm_password" name="confirm_password" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
              </div>
            </div>


            <div class=" flex justify-end content-center">
              <button class="mt-5 w-full shadow lg:w-40 lg:h-16 text-lg bg-green-900 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Save
              </button>

            </div>
            <div class="hidden" id="password_match">
              <p">Password Does not match</p>
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
  <script src="js/addstaff.js"></script>
</body>

</html>