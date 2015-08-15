<?php

	global $wpdb;

		$table_name  =  $wpdb->prefix . "poll_wp_Questions";
		$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
		$table_name3 =  $wpdb->prefix . "poll_wp_Results";	
		$table_name4 =  $wpdb->prefix . "poll_wp_Settings";	

		if( $wpdb->get_var('SHOW TABLES LIKE' . $table_name) != $table_name )
		{
				$sql = 'CREATE TABLE ' .$table_name . '(
					id INTEGER(10) UNSIGNED AUTO_INCREMENT,
					Question VARCHAR(255) NOT NULL,
					PluginType INTEGER(10) UNSIGNED NOT NULL,			
					PRIMARY KEY  (id) )';

				$sql1 = 'CREATE TABLE ' .$table_name2 . '(
					id INTEGER(10) UNSIGNED AUTO_INCREMENT,
					Answer VARCHAR(255) NOT NULL,	
					File VARCHAR(255),
					Answer_bg_color VARCHAR(255) NOT NULL, 	
					QuestionID INTEGER(10),
					PRIMARY KEY  (id) )';

				$sql2 = 'CREATE TABLE ' .$table_name3 . '(
					id INTEGER(10) UNSIGNED AUTO_INCREMENT,
					QuestionID INTEGER(10) NOT NULL,					
					AnswerID INTEGER(10) NOT NULL,
					Count INTEGER(10) NOT NULL, 					
					PRIMARY KEY  (id) )';	

				$sql3 = 'CREATE TABLE ' .$table_name4 . '(
					id INTEGER(10) UNSIGNED AUTO_INCREMENT,
					border_color VARCHAR(255) NOT NULL,
					bg_color VARCHAR(255) NOT NULL,
					font_family VARCHAR(255) NOT NULL,
					font_size INTEGER(10) NOT NULL,
					answer_color VARCHAR(255) NOT NULL,
					answer_hover_color VARCHAR(255),
					question_color VARCHAR(255) NOT NULL,
					vote_button_color VARCHAR(255) NOT NULL,
					buttons_text_color VARCHAR(255) NOT NULL,
					widget_div_width VARCHAR(255) NOT NULL,
					QuestionID INTEGER(10) NOT NULL,			
					PRIMARY KEY  (id) )';
		
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

			dbDelta($sql);
			dbDelta($sql1);
			dbDelta($sql2);
			dbDelta($sql3);

			DefaultData();

			add_option('poll-wp_database_version','1.0'); 
	 	}
	 	
	function DefaultData()
		{
			global $wpdb;

			$table_name  =  $wpdb->prefix . "poll_wp_Questions";
			$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
			$table_name3 =  $wpdb->prefix . "poll_wp_Results";	
			$table_name4 =  $wpdb->prefix . "poll_wp_Settings";

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, Question, PluginType) VALUES (%d, %s, %d)", '','Do You Like Our Plugin?', 1));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d, %s, %s, %s, %d)", '', 'Yes', '', '#F5F5F5', 1));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d, %s, %s, %s, %d)", '', 'No', '', '#F5F5F5', 1));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d, %s, %s, %s, %d)", '', 'Not at All', '', '#F5F5F5', 1));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d, %s, %s, %s, %d)", '', 'Great', '', '#F5F5F5', 1));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID, Count) VALUES (%d, %d, %d, %d)", '', 1, 1, 0));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID, Count) VALUES (%d, %d, %d, %d)", '', 1, 2, 0));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID, Count) VALUES (%d, %d, %d, %d)", '', 1, 3, 0));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID, Count) VALUES (%d, %d, %d, %d)", '', 1, 4, 0));
			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, border_color, bg_color, font_family, font_size, answer_color, answer_hover_color, question_color, vote_button_color, buttons_text_color, widget_div_width, QuestionID) VALUES (%d, %s, %s, %s, %d, %s, %s, %s, %s, %s, %s, %d)", '', 'Black', '#FFFFFF', 'Consolas', '14', 'rgb(255,0,0)', '', 'rgba(0,0,255,0.5)', 'black', 'white', '200', 1));
		}

?>