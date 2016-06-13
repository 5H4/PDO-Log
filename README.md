# PDO-Log
PDO Connection save log

How to use:

  _db::_connection->query(_db::sql("QUERY STRING"))-> EXAMPLE;</br>
  _db::readLog();
  
  Example log... </br>
  06/08/2016 12:52:00 am:</br>
	string 'SELECT * FROM user' (length=18)</br>
	array (size=3)</br>
  		'id' => string '1' (length=1)</br>
		 'name' => string 'ramo' (length=4)</br>
		 'city' => string 'tesanj' (length=6)</br>
