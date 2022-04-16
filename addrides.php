<?php include 'util/session.php' ?>
<?php include 'util/isadmin.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'util/links.php' ?>

    <title>Add Rides</title>
</head>

<body style="background: #F3F3FF">
    <div class="md:flex">
        <?php include 'components/sidebar.php'; ?>
        <div class="grow" style="flex-grow: 1;">
            <?php include 'components/navbar.php' ?>
            <div class=" bg-white m-4 rounded-lg mt-8 font-bold">
                <div class="border-b-2 p-4 lg:p-8">
                    <p class="text-2xl lg:text-3xl font-bold">Add Rides</p>
                </div>
                <div class="p-4 lg:p-8">
                    <form action="util/addride_functionality.php" method="POST">
                        <div class="pb-4">
                            <p class=" pl-2 pb-2">Ride Name</p>
                            <input pattern="[A-Za-z ]{3,40}" title="Only Letters allowed and between size of 3 to 40." required type="text" name="ride_name" placeholder="eg. Roller Coaster" class="text-sm w-full border-2 rounded-lg shadow appearance-none border-green-700 py-2 px-3 text-gray-700 focus:outline-none focus:border-green-700 " />
                        </div>
                        <div class="pb-4">
                            <p class=" pl-2 pb-2">Ride Description</p>
                            <input pattern="[A-Za-z ]{3,120}" title="Only Letters allowed and between size of 3 to 120." type="text" required name="ride_description" placeholder="eg. Child's ride for fun" class="text-sm w-full border-2 rounded-lg shadow appearance-none border-green-700 py-2 px-3 text-gray-700 focus:outline-none focus:border-green-700 " />
                        </div>
                        <div class="lg:flex">
                            <div class="pb-4 flex-1 lg:pr-8">
                                <p class=" pl-2 pb-2">Adult Price</p>
                                <input type="text" pattern="[0-9]{0,11}" title="Amount must be in digits" required name="adult_price" placeholder="eg. $400" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
                            </div>
                            <div class="pb-4 flex-1 lg:pl-8">
                                <p class=" pl-2 pb-2">Child Price</p>
                                <input type="text" pattern="[0-9]{0,11}" title="Amount must be in digits" required name="child_price" placeholder="eg. $200" class="text-sm w-full border-2 rounded-lg shadow appearance-none py-2 px-3 border-green-700 text-gray-700 focus:outline-none focus:border-green-700 " />
                            </div>
                        </div>
                        <div class="pb-4 flex justify-end">
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