<?php
/**
 * You wont learn anything from this script. 
 */

$words = array();
$words['H'] = Array(
  '20002',
  '20002',
  '22222',
  '20002',
  '20002');

$words['I'] = Array(
  '22222',
  '00200',
  '00200',
  '00200',
  '22222');


$words['M'] = Array(
  '20002',
  '22022',
  '20202',
  '20002',
  '20002');

$words['A'] = Array(
  '01210',
  '02020',
  '21012',
  '22222',
  '20002');

$words['R'] = Array(
  '22222',
  '20002',
  '22222',
  '20210',
  '20022');

$words['Y'] = Array(
  '20002',
  '20002',
  '12221',
  '00200',
  '00200');

$words['E'] = Array(
  '22222',
  '20000',
  '22210',
  '20000',
  '22222');

$words['?'] = Array(
  '22222',
  '00002',
  '00222',
  '00100',
  '00200');

$words['!'] = Array(
  '00200',
  '00200',
  '00200',
  '00100',
  '00200');
  
$firstDayOfGrid = strtotime('last sunday', strtotime('tomorrow - 1 year'));
// echo $firstDayOfGrid;
// exit;
#print_r($sunday);
#print_r(date('d-m-Y',$sunday));
#exec('git -c user.name="Yash Sharma" -c user.email="yks.nit@gmail.com" commit -m "test" --date "'.$firstDayOfGrid.'"', $out);
#print_r($firstDayOfGrid);
#print_r($out);

#print_r( $firstDayOfGrid );
#print_r( date('d-m-Y', $firstDayOfGrid) );
#$nextDate = strtotime('+7 day', $firstDayOfGrid);
#print_r( date('d-m-Y', $nextDate) );

$firstDayOfGrid = strtotime('+7 day', $firstDayOfGrid);
$timeStamp = strtotime('+8 day', $firstDayOfGrid);
$timeStamp = goToNextLetter($timeStamp);
printLetter('H',$timeStamp);

$timeStamp = goToNextLetter($timeStamp);
printLetter('I',$timeStamp);

$timeStamp = goToNextLetter($timeStamp);
printLetter('R',$timeStamp);

$timeStamp = goToNextLetter($timeStamp);
printLetter('E',$timeStamp);

$timeStamp = goToNextLetter($timeStamp);
$timeStamp = goRight($timeStamp);
printLetter('M',$timeStamp);

$timeStamp = goToNextLetter($timeStamp);
printLetter('E',$timeStamp);

$timeStamp = goToNextLetter($timeStamp);
printLetter('!',$timeStamp);


#exit;
// commitFile();


function commitFile($date='', $file_name='temp.txt'){
	$dateParam = '';
	if(!empty($date)){
		$dateParam = "--date $date";
	}
	file_put_contents($file_name,'1',FILE_APPEND);
	exec('git add '. $file_name);
	exec('git -c user.name="Yash Sharma" -c user.email="yks.nit@gmail.com" commit -m "test" '. $dateParam);
}

function printLetter($letter='A', $startDate){
	global $words;
	$j=0;
	$i=0;
	$front = 1;
	$timeStamp = $startDate;
	foreach ($words[$letter] as $rows) {
		while(isset($rows[$j]) && $j >= 0){
		  // print_r($rows[$j] . "  ");
		  // print_r($i . "," . $j . "  " . $front . " == ");
		  // printDate($timeStamp);print_r("\r\n");

			$numberOfCommit = $rows[$j];
			while($numberOfCommit--){
				commitFile($timeStamp);
			}
			$timeStamp = ($front > 0)? goRight($timeStamp):goLeft($timeStamp);

			$j= $j+$front;
		}
		$i++;
		$j -= $front;
		$front *= -1;
		$timeStamp = ($front > 0)? goRight($timeStamp):goLeft($timeStamp);
		$timeStamp = goDown($timeStamp);
		#print_r("\r\n");
	}
}

function goDown($timeStamp){
	return strtotime('+1 day', $timeStamp);
}

function goUp($timeStamp){
	return strtotime('-1 day', $timeStamp);
}

function goRight($timeStamp){
	return strtotime('+7 day', $timeStamp);
}

function goLeft($timeStamp){
	return strtotime('-7 day', $timeStamp);
}

function goToNextLetter($timeStamp){
	return strtotime('+42 day', $timeStamp);
}

function printDate($timeStamp){
	echo date('d-m-Y', $timeStamp);
}