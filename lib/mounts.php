<?php

function getmount(int $horse = 0) {
	if (!file_exists('dbconnect.php')) return [];
	$mounts = db_prefix('mounts');
	$sql = "SELECT * FROM $mounts WHERE mountid = '$horse';";
	$result = db_query_cached($sql, "mountdata-$horse", 3600);
	if (db_num_rows($result) > 0) {
		return db_fetch_assoc($result);
	}
	else {
		return [];
	}
}
