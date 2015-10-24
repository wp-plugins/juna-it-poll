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
		$table_name4 =  $wpdb->prefix . "poll_wp_Settings";	
		
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

		$vote_type=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE QuestionID= %s", $selected_quest));

		echo  $vote_type[0]->vote_type . '%^&^%' . $vote_type[0]->vote_color . '%^&^%' . $answer_count;

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

		$vote_type=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE QuestionID= %s", $selected_quest));

		echo  $vote_type[0]->vote_type . '%^&^%' . $vote_type[0]->vote_color . '%^&^%' . $answer_count;

		for($i=0;$i<count($answers);$i++)
		{
			$answer_count=$results[$i]->Count . "^";
			echo $answer_count;
		}

		die();
	} 

	add_action( 'wp_ajax_Delete_Juna_IT_Poll_Click', 'Delete_Juna_IT_Poll_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Delete_Juna_IT_Poll_Click', 'Delete_Juna_IT_Poll_Click_Callback' );

	function Delete_Juna_IT_Poll_Click_Callback()
	{
		$Delete_Juna_IT_Poll_id = sanitize_text_field($_POST['foobar']);
		
		global $wpdb;		

		$table_name  =  $wpdb->prefix . "poll_wp_Questions";
		$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
		$table_name3 =  $wpdb->prefix . "poll_wp_Results";
		$table_name4 =  $wpdb->prefix . "poll_wp_Settings";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id= %d", $Delete_Juna_IT_Poll_id));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE QuestionID= %d", $Delete_Juna_IT_Poll_id));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE QuestionID= %d", $Delete_Juna_IT_Poll_id));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE QuestionID= %d", $Delete_Juna_IT_Poll_id));

		die();
	}
	add_action( 'wp_ajax_Edit_Juna_IT_Poll_Click', 'Edit_Juna_IT_Poll_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Edit_Juna_IT_Poll_Click', 'Edit_Juna_IT_Poll_Click_Callback' );

	function Edit_Juna_IT_Poll_Click_Callback()
	{
		$Edit_Juna_IT_Poll_id = sanitize_text_field($_POST['foobar']);
		
		global $wpdb;		

		$table_name  =  $wpdb->prefix . "poll_wp_Questions";
		$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
		$table_name3 =  $wpdb->prefix . "poll_wp_Results";
		$table_name4 =  $wpdb->prefix . "poll_wp_Settings";

		$Edited_Quest=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id= %d", $Edit_Juna_IT_Poll_id));
		$Edited_Answer=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE QuestionID= %d", $Edit_Juna_IT_Poll_id));
		$Edited_Results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE QuestionID= %d", $Edit_Juna_IT_Poll_id));
		if($Edited_Results[0]->answer_hover_color=='')
		{
			$Edited_Results[0]->answer_hover_color='none';
		}

		echo $Edited_Quest[0]->Question . '%^&^%' . $Edited_Results[0]->border_color . '%^&^%' . $Edited_Results[0]->bg_color . '%^&^%' . 
			$Edited_Results[0]->font_family . '%^&^%' . $Edited_Results[0]->font_size . '%^&^%' . $Edited_Results[0]->answer_color . '%^&^%' . 
			$Edited_Results[0]->answer_hover_color . '%^&^%' . $Edited_Results[0]->question_color . '%^&^%' . 
			$Edited_Results[0]->vote_button_color . '%^&^%' . $Edited_Results[0]->buttons_text_color . '%^&^%' . 
			$Edited_Results[0]->widget_div_width . '%^&^%' . $Edited_Results[0]->vote_type . '%^&^%' . $Edited_Results[0]->vote_color . '%^&^%' . 
			$Edited_Results[0]->image_width . '%^&^%' . $Edited_Results[0]->image_height . '%^&^%' . $Edited_Results[0]->answer_font_family . '%^&^%' . 
			$Edited_Results[0]->answer_font_size . '%^&^%' . count($Edited_Answer) . '$#@#$' . $Edited_Answers;

		for($i=0;$i<count($Edited_Answer);$i++)
		{
			if($Edited_Answer[$i]->File=='')
			{
				$Edited_Answer[$i]->File='none';
			}
			echo $Edited_Answers=$Edited_Answer[$i]->Answer . '%***%' . $Edited_Answer[$i]->File . '%***%' . $Edited_Answer[$i]->Answer_bg_color . ')^%^(';
		}

		die();
	}
	add_action( 'wp_ajax_Search_Juna_IT_Poll_Click', 'Search_Juna_IT_Poll_Click_Callback' );
	add_action( 'wp_ajax_nopriv_Search_Juna_IT_Poll_Click', 'Search_Juna_IT_Poll_Click_Callback' );

	function Search_Juna_IT_Poll_Click_Callback()
	{
		$Search_Juna_IT_Poll_Question = strtolower(sanitize_text_field($_POST['foobar']));
		global $wpdb;		

		$table_name  =  $wpdb->prefix . "poll_wp_Questions";

		$Searched_Juna_IT_Quest=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d",1));

		for($i=0;$i<count($Searched_Juna_IT_Quest);$i++)
		{
			for($j=1;$j<strlen($Searched_Juna_IT_Quest[$i]->Question);$j++)
			{
				if($Search_Juna_IT_Poll_Question==substr(strtolower($Searched_Juna_IT_Quest[$i]->Question),0,$j))
				{
					echo $Searched_Juna_IT_Quest[$i]->id . "^%^" . $Searched_Juna_IT_Quest[$i]->Question . "^%^" . $Searched_Juna_IT_Quest[$i]->PluginType . ')&*&(';
				}
				else
				{
					echo "";
				}
			}
		}
		die();
	}
?>