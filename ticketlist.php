<?php include 'util/session.php' ?>

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
                <div class="border-b-2 p-4 lg:p-8 flex justify-between">
                    <p class="text-2xl lg:text-3xl font-bold">Ticket list</p>

                    <a href="addticket.php" class="shadow text-lg bg-green-900 flex items-center hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span class="text-sm"> Add Tickets</span>
                    </a>
                </div>
                <div class="p-4 lg:p-8">
                    <div class="lg:flex">
                        <div date-rangepicker class="flex items-center">
                            <span class="mr-4 ">from</span>
                            <div class="relative w-40">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-green-700 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input name="start" type="text" class="bg-gray-200 border-2 border-green-700 text-gray-700 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="start date">
                            </div>
                            <span class="mx-4 ">to</span>
                            <div class="relative w-40">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-green-700 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input name="end" type="text" class="bg-gray-200 border-2 border-green-700 text-gray-700 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="end date">
                            </div>
                        </div>
                        <div class="mt-4 lg:mt-0 lg:ml-32 w-full flex">
                            <div class="relative w-72  flex-1">
                                <input type="text" placeholder="Search..." class="w-full border-2 rounded-lg border-green-700 focus:border-green-500 focus:ring-green-500">
                                <div class="absolute right-0 top-0 pt-2 pr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex justify-between ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#0066FF">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="#FF0000">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="py-8 w-full">
                        <div class="shadow overflow-x-auto rounded border-b border-gray-200">
                            <table class="min-w-full bg-white ">
                                <thead class="bg-green-800 text-white">
                                    <tr>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer Name</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Date</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Adults</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Children</td>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ride Name</td>

                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    <tr>
                                        <td class=" text-left py-3 px-4 whitespace-nowrap ">
                                            <input type="checkbox" name="name" class=" w-5 h-5 mr-2 bg-gray-50 rounded border border-gray-400 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                            <span>Batman</span>
                                        </td>
                                        <td class="text-left py-3 px-4">1/2/2021 6:43PM</td>
                                        <td class="text-left py-3 px-4">1</td>
                                        <td class="text-left py-3 px-4">2</td>

                                        <td class="text-left py-3 px-4">Roller Coaster</td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                        <td class=" text-left py-3 px-4">
                                            <input type="checkbox" name="name" class=" w-5 h-5 mr-2 bg-gray-50 rounded border border-gray-400 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                            <span>Batman</span>
                                        </td>
                                        <td class="text-left py-3 px-4">1/2/2021 6:43PM</td>
                                        <td class="text-left py-3 px-4">1</td>
                                        <td class="text-left py-3 px-4">2</td>

                                        <td class="text-left py-3 px-4">Roller Coaster</td>
                                    </tr>
                                    <tr>
                                        <td class=" text-left py-3 px-4">
                                            <input type="checkbox" name="name" class=" w-5 h-5 mr-2 bg-gray-50 rounded border border-gray-400 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                            <span>Batman</span>
                                        </td>
                                        <td class="text-left py-3 px-4">1/2/2021 6:43PM</td>
                                        <td class="text-left py-3 px-4">1</td>
                                        <td class="text-left py-3 px-4">2</td>

                                        <td class="text-left py-3 px-4">Roller Coaster</td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                        <td class=" text-left py-3 px-4">
                                            <input type="checkbox" name="name" class=" w-5 h-5 mr-2 bg-gray-50 rounded border border-gray-400 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                            <span>Batman</span>
                                        </td>
                                        <td class="text-left py-3 px-4">1/2/2021 6:43PM</td>
                                        <td class="text-left py-3 px-4">1</td>
                                        <td class="text-left py-3 px-4">2</td>

                                        <td class="text-left py-3 px-4">Roller Coaster</td>
                                    </tr>
                                    <tr class="bg-gray-200 text-sm">
                                        <td colspan="5" class="text-right  py-3 px-4">
                                            <span class=" mx-2 text-gray-400"> previous</span>
                                            <span class="mx-2 text-gray-700">2</span>
                                            <span class="mx-2 text-blue-600">next</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pb-4 flex justify-end">
                        <button class="shadow w-full lg:w-40 lg:h-16 text-lg bg-green-900 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 mt-4 rounded" type="submit">
                            Export
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>