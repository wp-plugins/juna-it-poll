<?php
	
	global $wpdb;

		$table_name  =  $wpdb->prefix . "poll_wp_Questions";
		$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
		$table_name3 =  $wpdb->prefix . "poll_wp_Results";	
		$table_name4 =  $wpdb->prefix . "poll_wp_Settings";

		$sql1="DROP table $table_name";
		$sql2="DROP table $table_name2";
		$sql3="DROP table $table_name3";
		$sql4="DROP table $table_name4";

		$wpdb->query($sql1);
		$wpdb->query($sql2);
		$wpdb->query($sql3);
		$wpdb->query($sql4);

?>