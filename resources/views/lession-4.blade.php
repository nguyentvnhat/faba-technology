@php
function sortLargestNumberOfArray($arrayNumbers = [])
{
    sort($arrayNumbers);
    $length = count($arrayNumbers);
    $check = 0; $count = 1;

    for ($i = 1; $i <= $length ; $i ++) 
    { 
        if ($count < 4) 
        { 
            if($check != $arrayNumbers[$length-$i])  
            { 
                echo $arrayNumbers[$length - $i].', ';
                $check = $arrayNumbers[$length-$i]; 
                $count++; 
            } 
        } 
        else 
            break; 
    }
}
$arrayExample = [14, 11, 20, 19, 17, 5, 1, 12, 13];
// echo 'sortLargestNumberOfArray: ';
// sortLargestNumberOfArray($arrayExample);


detectRoomForRent();
function generateRoomSlot($n) {
    $arrayIndex = [];
   
    if ($n == 0) 
        return "array is invalid";
    
    for ($i = 1; $i <= $n; $i++) {
        $item = [
            'index' => $i,
            'start_time' => rand(1, 9),
            'end_time' => rand(1, 9),
            'rental' => rand(1, 9),
        ];
        array_push($arrayIndex, $item);
    }
    return $arrayIndex;
}
function detectRoomForRent()
{
    // $rooms = generateRoomSlot(4);
    $rooms = [
        [
            'index' => 1,
            'start_time' => 2,
            'end_time' => 3, 
            'rental' => 4,
        ],
        [
            'index' => 2,
            'start_time' => 1,
            'end_time' => 3, 
            'rental' => 6,
        ],
        [
            'index' => 3,
            'start_time' => 1,
            'end_time' => 2, 
            'rental' => 3,
        ],
        [
            'index' => 4,
            'start_time' => 3,
            'end_time' => 4, 
            'rental' => 2,
        ],
    ];
    echo "<table>
    <tr>
        <td width='15%'>Index</td>
        <td width='35%'>Start Time</td>
        <td width='35%'>End Time</td>
        <td width='25%'>Rental fee</td>
    </tr>";
        
    foreach ($rooms as $room)
    {
        echo " 
        <tr>
            <td>".$room['index']."</td>
            <td>".$room['start_time']."</td>
            <td>".$room['end_time']."</td>
            <td>".$room['rental']."</td>
        </tr>";
    }
    echo '</table>';

    $slots = [];

    $maxCurrent = 0;
    $currentIndex = '';

    foreach ($rooms as $key => $room) {
        if ($room['start_time'] >= $room['end_time'] || $room['rental'] <= 0)
            continue;

        $roomIndex = 'index_'.$room['index'];
        if (empty($slots))
        {
            $slots[$roomIndex][] = $room;
            $slots[$roomIndex]['total_rental'] = $room['rental'];


            if ($maxCurrent < $slots[$roomIndex]['total_rental']) {
                $maxCurrent = $slots[$roomIndex]['total_rental'];
                $currentIndex = $room['index'];
            }
            continue;
        } 
       
        for ($i = 1; $i <= count($slots); $i++) {
            if(isset($slots['index_'.$i])) {
                foreach($slots['index_'.$i] as $k => $s) {

                    if ($s['start_time'] == $room['start_time'] || $s['end_time'] == $room['end_time']) {
                        $slots[$roomIndex][] = $room;
                        $slots[$roomIndex]['total_rental'] = $room['rental'];
                        continue 3;

                    } else if ($s['start_time'] != $room['start_time'] || $s['end_time'] != $room['end_time']) {
                        $roomIndexChild = $slots['index_'.$i];
                        foreach($slots['index_'.$i] as $item) {
                            
                            if ($item['index'] != $rooms[$key]['index'] )
                            {
                                $slots['index_'.$i][] = $room;
                               
                                $slots['index_'.$i]['total_rental'] = $slots['index_'.$i]['total_rental'] + $room['rental'];

                                if ($maxCurrent < $slots['index_'.$i]['total_rental']) {
                                    $maxCurrent = $slots['index_'.$i]['total_rental'];
                                    $currentIndex = $i;
                                }
                                
                                continue 3;
                            } else {
                                if ($maxCurrent < $slots['index_'.$i]['total_rental']) {
                                    $maxCurrent = $slots['index_'.$i]['total_rental'];
                                    $currentIndex = $i;
                                }
                            }
                        }
                    }
                }
            }
            
        }
    }

    echo '====================================<br/>';
    echo "<table>
    <tr>
        <td width='15%'>Index</td>
        <td width='35%'>Start Time</td>
        <td width='35%'>End Time</td>
        <td width='25%'>Rental fee</td>
    </tr>";

    if (isset($slots['index_'.$currentIndex])) {
        echo 'Total: '.$maxCurrent;
        foreach ($slots['index_'.$currentIndex] as $slot)
        {
            echo " 
            <tr>
                <td>".$slot['index']."</td>
                <td>".$slot['start_time']."</td>
                <td>".$slot['end_time']."</td>
                <td>".$slot['rental']."</td>
            </tr>";
        }
        echo '</table>';
    }
}

@endphp