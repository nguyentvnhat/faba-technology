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
    $rooms = generateRoomSlot(6);
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
   
    foreach ($rooms as $key => $room) {
        if ($room['start_time'] > $room['end_time'] || $room['rental'] <= 0)
            continue;

        if (empty($slots))
        {
            $slots['items'][$key+1] = $room;
            $slots['total_rental'] = $room['rental'];
        } else {
            foreach($slots['items'] as $k => $slot) 
            {        
                if($slots['items'][$k]['start_time'] != $rooms[$key]['start_time'] && $slots['items'][$k]['end_time'] != $rooms[$key]['end_time'] ) {
                    
                    $slots['total_rental'] = $slots['total_rental'] + $room['rental'];
                    
                    $slots['items'][$room['index']] = $room;
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
     
    echo 'total: '.$slots['total_rental'];
    foreach ($slots['items'] as $slot)
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

@endphp