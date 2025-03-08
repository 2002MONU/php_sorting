<?php 
 
//    echo "Monu Kumar";

//$a = array('Monu','Sonu','Sunil','Nitin');
$food = array('d'=>'lemon',
  'b'=> 'chips',
    'f' => 'banana',
    'm'=>'apple'
);
//  sort($a); // ascending array in indexes array
 //rsort($a); // descending array in indexes array

//    asort($food);// ascending on asscoatives array sort value
   arsort($food);// desscending on asscoatives array sort value


// ksort($food);// ascending on asscoatives array sort value
//    krsort($food);// desscending on asscoatives array sort value
echo "<pre>";
print_r($food);
echo "</pre>";



?>