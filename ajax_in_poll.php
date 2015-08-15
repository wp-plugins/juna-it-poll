<?php
	add_action( 'wp_ajax_Vote_Click', 'Vote_Click_callback' );
	add_action( 'wp_ajax_nopriv_Vote_Click', 'Vote_Click_callback' ); // for use outside admin

	function Vote_Click_callback(){

		$data =array();
 
 		$data=explode('^',$_POST['foobar']);

 		$question=sanitize_text_field($data[0]);
		$answer=sanitize_text_field(trim($data[1]));

	 	global $wpdb;

	 	$table_name  =  $wpdb->prefix . "poll_wp_Questions";
		$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
		$table_name3 =  $wpdb->prefix . "poll_wp_Results";	
		
		$selected_quest=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Question= %s", $data[0]));
		//$selected_quest=$wpdb->get_var("SELECT id FROM $table_name Where Question='$data[0]'");

		$selected_ans=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name2 WHERE QuestionID= %d AND Answer= %s", $selected_quest, $answer));
		//$selected_ans=$wpdb->get_var("SELECT id FROM $table_name2 where QuestionID='$selected_quest' AND Answer='$answer'");
		
		$count=$wpdb->get_var($wpdb->prepare("SELECT Count FROM $table_name3 WHERE AnswerID= %s AND QuestionID= %s", $selected_ans, $selected_quest));
		//$count=$wpdb->get_var("SELECT Count FROM $table_name3 Where AnswerID='$selected_ans' and QuestionID='$selected_quest'");
		
		$count=$count+1;

		$ID=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name3 WHERE QuestionID= %s AND AnswerID= %s", $selected_quest, $selected_ans));
		//$ID=$wpdb->get_var("SELECT id from $table_name3 where QuestionID='$selected_quest' and AnswerID='$selected_ans'");

		$wpdb->query($wpdb->prepare("UPDATE  $table_name3 set Count= %s WHERE  id= %d ",$count, $ID));

		//Sending data to Ajax

		$counts_array=$wpdb->get_results($wpdb->prepare("SELECT count FROM $table_name3 WHERE id in (SELECT id FROM $table_name3 WHERE QuestionID= %s)", $selected_quest ));

		for($i=0; $i<count($counts_array); $i++)
		{
			echo $counts_array[$i]->count."^";
		}

		die(); // this is required to return a proper result
	}
	
	add_action( 'wp_ajax_GetResults', 'GetResults_callback' );
	add_action( 'wp_ajax_nopriv_GetResults', 'GetResults_callback' );

	function GetResults_callback()
	{
		global $wpdb;

	 	$data=sanitize_text_field($_POST["foobar"]); 

	 	$table_name  =  $wpdb->prefix . "poll_wp_Questions";
		$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
		$table_name3 =  $wpdb->prefix . "poll_wp_Results";
		$table_name4 =  $wpdb->prefix . "poll_wp_Settings";	
		
		$selected_quest=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Question= %s", $data ));

		$answers=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE QuestionID= %s", $selected_quest));

		$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE QuestionID= %s", $selected_quest));

		$answer_count=array();

		for($i=0;$i<count($answers);$i++)
		{
			$answer_count[$i]=$results[$i]->Count . "^";
		}

		for($i=0; $i<count($answer_count); $i++)
		{
			echo $answer_count[$i];
		}
	} 

	add_action( 'wp_ajax_GetOptionForShortcode', 'GetOptionForShortcode_callback' );
	add_action( 'wp_ajax_nopriv_GetOptionForShortcode', 'GetOptionForShortcode_callback' );

	function  GetOptionForShortcode_callback()
	{
		global $wpdb;

	 	$table_name  =  $wpdb->prefix . "poll_wp_Questions";

	 	$id=$wpdb->get_var($wpdb->prepare("SELECT count(*) FROM $table_name WHERE id > %d",0));
	 	
	 	$par=$wpdb->get_results($wpdb->prepare("SELECT * FROM  $table_name WHERE id > %d",0));

	 	for($i=0; $i<$id; $i++)
	 	{
	 		echo $par[$i]->Question . '^';
	 	}
	 	
	 	die();
	}

	add_action( 'wp_ajax_GetIdForShortcode', 'GetIdForShortcode_callback' );
	add_action( 'wp_ajax_nopriv_GetIdForShortcode', 'GetIdForShortcode_callback' );

	function GetIdForShortcode_callback()
	{
		global $wpdb;

	 	$table_name  =  $wpdb->prefix . "poll_wp_Questions";

	 	$data=explode('^',$_POST['foobar']);

	 	$id_short=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Question=%s",$data[0]));

	 	echo $id_short;

	 	die();
	}
?>