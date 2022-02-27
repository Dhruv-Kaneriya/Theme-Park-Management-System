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

                        $sql = "SELECT customer_name , no_adult , no_child , date_issued ,ride_list.ride_name FROM tickets_list,ride_list where ride_list.ride_id = tickets_list.ride_id order by date_issued DESC";

                        $result = mysqli_query($conn, $sql);

                        $i = 0;
                        function time_elapsed_string($datetime, $level = 7)
                        {
                            date_default_timezone_set('Asia/Kolkata');
                            $now = new DateTime;
                            $ago = new DateTime($datetime);
                            $diff = $now->diff($ago);

                            $diff->w = floor($diff->d / 7);
                            $diff->d -= $diff->w * 7;

                            $string = array(
                                'y' => 'year',
                                'm' => 'month',
                                'w' => 'week',
                                'd' => 'day',
                                'h' => 'hour',
                                'i' => 'minute',
                                's' => 'second',
                            );
                            foreach ($string as $k => &$v) {
                                if ($diff->$k) {
                                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                                } else {
                                    unset($string[$k]);
                                }
                            }

                            $string = array_slice($string, 0, $level);
                            return $string ? implode(', ', $string) . ' ago' : 'just now';
                        }
                        while ($res = mysqli_fetch_array($result)) {
                            if ($i < 5) {

                        ?>

                                <tr class="bg-transparent dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?php echo $res['customer_name']; ?>
                                    </td>
                                    <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                        <?php echo $res['no_adult'] + $res['no_child']; ?>
                                    </td>
                                    <td class="py-1 px-6 text-sm  whitespace-nowrap dark:text-gray-400">
                                        <?php echo $res['ride_name']; ?>
                                    </td>
                                    <td class="py-1 px-6 text-sm text-gray-600 whitespace-nowrap dark:text-gray-400">
                                        <?php


                                        echo time_elapsed_string($res['date_issued'], 2); ?>
                                    </td>

                                </tr>

                        <?php
                            }
                            $i++;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>