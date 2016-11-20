<?php
include __DIR__. "/sqlite.php";
$db = new MyDB();

function getLastLandlordSet()
{
   global $db;
   return $db->getOne("SELECT * from landlord_set ORDER BY  id DESC");
}

function writeLandLordSet($data)
{
   global $db;
   $datetime = date("Y-m-d H:i:s", time());
   return $db->exec("INSERT INTO landlord_set (power_rate1, power_rate2, water_rate1, water_rate2, people_num, room_num, property_cost, net_cost, gas_cost, create_at) VALUES('{$data['power_rate1']}', '{$data['power_rate2']}', '{$data['water_rate1']}', '{$data['water_rate2']}', '{$data['people_num']}','{$data['room_num']}','{$data['property_cost']}','{$data['net_cost']}','{$data['gas_cost']}', '$datetime' ) ");
//echo "INSERT INTO landlord_set (power_rate1, power_rate2, water_rate1, water_rate2, people_num, room_num, property_cost, net_cost, gas_cost, create_at) VALUES('{$data['power_rate1']}', '{$data['power_rate2']}', '{$data['water_rate1']}', '{$data['water_rate2']}', '{$data['people_num']}','{$data['room_num']}','{$data['property_cost']}','{$data['net_cost']}','{$data['gas_cost']}', '$datetime' ) ";
}
