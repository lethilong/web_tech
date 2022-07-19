<?php


function show($data) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function check_error() {

	if(isset($_SESSION['error']) && $_SESSION['error'] != "")
	{
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
}
function esc($data)
{
	return addslashes($data);
}

function redirect($link)
{
	header("Location: " . ROOT . $link);
	die;
}

function get_total($ROWS){

	$total = 0;
	foreach ($ROWS as $key => $row) {
		# code...
		$total += $row->cart_qty * $row->price;
	}

	return $total;
}

function get_order_id(){

	$order = 1;
	$DB = Database::newInstance();
	$ROWS = $DB->read("select id from orders order by id desc limit 1");

	if(is_array($ROWS)){
		$order = "order " . ($ROWS[0]->id + 1);
	}

	return $order;
}


