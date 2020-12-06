<?php
    function phpMethods($method, $param) {
		global $connection;

		if (phpversion() < 6) {
			switch ($method) {
				case 'query':
					return mysql_query($param, $connection);
					break;
				case 'error':
					return mysql_error();
					break;
				case 'fetch-array':
					return mysql_fetch_array($param);
					break;
				case 'num-rows':
					return mysql_num_rows($param);
					break;
				case 'close':
					return mysql_close($connection);
					break;
				case 'affected-rows':
					return mysql_affected_rows();
					break;
			}
		}
		else {
			switch ($method) {
				case 'query':
					return mysqli_query($connection, $param);
					break;
				case 'error':
					return mysqli_error($connection);
					break;
				case 'fetch-array':
					return mysqli_fetch_array($param);
					break;
				case 'num-rows':
					return mysqli_num_rows($param);
					break;
				case 'close':
					return mysqli_close($connection);
					break;
				case 'affected-rows':
					return mysqli_affected_rows($connection);
					break;
			}
		}
	}

	function mysql_prep($value){
		global $connection;

		if (phpversion() < 6) {
			return $value;
		}

		return mysqli_real_escape_string($connection, $value);
	}
?>
