<?php

function _var_dump($result)
{
    echo "<pre>";
    var_dump($result);
    exit();
}

function _namepic($data){

    $a = explode("_" , $data);
    return $a[0];
}
function _extpic($data){

    $a = explode("." , $data);
    return end($a);
}
function _getDate($time = null)

{

    $CI = & get_instance();

    return

    empty($time) ? $CI->jdate->date("Y-m-d" , time()) : $CI->jdate->date("Y-m-d" , $time);

}
function _getDateTime($time = null)

{
    $CI = & get_instance();
    return
    empty($time) ? $CI->jdate->date("Y-m-d H:i:s" , time()) : $CI->jdate->date("Y-m-d H:i:s" , $time);

}

function _getTimeText($time)

{

    return gmdate("H:i:s" , $time);

}

function _getPastDateTime($time)

{

    $remain_time = time() - $time;

    $hour   = (int)gmdate("H" , $remain_time);

    $minute = (int)gmdate("i" , $remain_time);



    $text = null;

    if (!empty($hour)) {

        $text .= $hour . " ساعت و ";

    }



    if (!empty($minute)) {

        $text .= $minute . " دقیقه ";

    }



    return $text;

}
function latinNumber($value)

{

	if (empty($value)) {

		return $value;

	}



	$number = [

		'0',

		'1',

		'2',

		'3',

		'4',

		'5',

		'6',

		'7',

		'8',

		'9'

	];

	$persian = [

		'۰',

		'۱',

		'۲',

		'۳',

		'۴',

		'۵',

		'۶',

		'۷',

		'۸',

		'۹'

	];



	return str_replace($persian, $number, $value);

}
function persianNumber($value)

{

	$number = [

		'0',

		'1',

		'2',

		'3',

		'4',

		'5',

		'6',

		'7',

		'8',

		'9'

	];

	$persian = [

		'۰',

		'۱',

		'۲',

		'۳',

		'۴',

		'۵',

		'۶',

		'۷',

		'۸',

		'۹'

	];



	return str_replace($number, $persian, $value);

}
