
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full text-center ">
                    <thead class="bg-transparent dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-bold tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                Customer Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-bold tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                Tickets
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-bold tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                Ride Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-bold tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                Time
                            </th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tickets -->
                        <?php 
                            // path is from relative to dashboard 
                            include "Database/db_conn.php";

                            $sql = "SELECT * FROM tickets_list";
                            
                            $result = mysqli_query($conn, $sql);

                            while($res = mysqli_fetch_array($result)){
                        ?>
        
                        <tr class="bg-transparent dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $res['customer_name']; ?>
                            </td>
                            <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                <?php echo $res['no_tickets']; ?>
                            </td>
                            <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                <?php echo $res['ride_name']; ?>
                            </td>
                            <td class="py-1 px-6 text-sm text-gray-600 whitespace-nowrap dark:text-gray-400">
                                <?php echo $res['date_issued']; ?>
                            </td>
                           
                        </tr>

                        <?php
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>