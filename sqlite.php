<?php

// create table landlord_set(
// 	id integer not null primary key autoincrement,
// 	power_rate1 decimal(8,2) not null default 0,
// 	power_rate2 decimal(8,2) not null default 0,
// 	water_rate1 decimal(8,2) not null default 0,
// 	water_rate2 decimal(8,2) not null default 0,
// 	people_num integer not null default 0,
// 	room_num integer not null default 0,
// 	property_cost integer not null default 0,
// 	gas_cost integer not null default 0,
// 	net_cost integer not null default 0,
// 	create_at datetime 
// );
   class MyDB extends SQLite3
   {
      function __construct()
      {
       	$this->open('dorm.db');
      }

      function __destruct() {
      	 $this->close();
      }

      public function getAll($sql) 
      {
      	$ret = $this->query($sql);
      	$arr = array();
      	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      		$arr[] = $row;
      	}
      	return $arr;
      }

      public function getOne($sql) 
      {
      	$ret = $this->query($sql);
      	$row = $ret->fetchArray(SQLITE3_ASSOC);
      	return $row;
      }

      public function exec($sql)
      {
      	return parent::exec($sql);
      }
   }
   // $db = new MyDB();
   //echo '<pre>';
   //  print_r($db->getAll(' SELECT * from landlord_set;'));
  