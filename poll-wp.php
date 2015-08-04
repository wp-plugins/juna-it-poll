<?php

/*
Plugin Name: Juna IT Poll
Plugin URI: http://juna-it.com/index.php/features/elements/juna-it-plugin/
Description: Juna IT Poll - Wordpress Plugin is an instrument for understanding visitor 's opinions.
Version: 1.0.0
Author: Juna IT
Author: http://juna-it.com/
License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/	





 	require_once('poll-wp_widget.php');

 	
 	add_action('wp_enqueue_scripts',function() {

 		wp_register_style( 'poll-wp', plugins_url( '/Styles/WidgetStyle.css',__FILE__ ) );
		wp_enqueue_style( 'poll-wp' );	

		//wp_enqueue_script('cwp-main', plugins_url('/Scripts/highcharts.js', __FILE__), array('jquery', 'jquery-ui-core'));
		//wp_enqueue_script('cwp-main', plugins_url('/Scripts/highcharts-3d.js', __FILE__), array('jquery', 'jquery-ui-core'));

		wp_register_script('poll-wp',plugins_url('/Scripts/vote.js',__FILE__));
		wp_localize_script( 'poll-wp', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script( 'poll-wp' );
		wp_enqueue_script( "jquery" );

 	});

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
		//$wpdb->update($table_name3, array('Count'=>$count),array('id'=>$ID));

		//Sending data to Ajax

		$counts_array=$wpdb->get_results($wpdb->prepare("SELECT count FROM $table_name3 WHERE id in (SELECT id FROM $table_name3 WHERE QuestionID= %s)", $selected_quest ));
		//$counts_array=$wpdb->get_results("SELECT count from $table_name3 WHERE id in (SELECT id from $table_name3 where QuestionID='$selected_quest')");

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
	 //$selected_quest=$wpdb->get_var("SELECT id FROM $table_name Where Question='$data'");

	$answers=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE QuestionID= %s", $selected_quest));
	 //$answers=$wpdb->get_results("SELECT * FROM $table_name2 Where QuestionID='$selected_quest'");

	$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE QuestionID= %s", $selected_quest));
	 //$results=$wpdb->get_results("SELECT * FROM $table_name3 Where QuestionID='$selected_quest'");
	

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

 	add_action('widgets_init', function() {
 		register_widget('Juna_IT_Poll');
 	} );

	add_action("admin_menu", function() {

		add_menu_page('poll-wp_Admin_Menu','Juna_IT_Poll', 'manage_options','Juna_IT_Poll', 'Add_Poll',plugins_url("/Images/Admin.png", __FILE__));

 		add_submenu_page('Juna_IT_Poll', 'poll-wp_Admin_Menu', 'Add Poll', 'manage_options', 'Juna_IT_Poll', 'Add_Poll');

		add_submenu_page('Juna_IT_Poll', 'poll-wp_Admin_Menu_Results', 'Results', 'manage_options', 'Admin_Menu_Results', 'See_Results');

	});

	function Add_Poll()
	{
		require_once('admin_menu.php');
	}
	function See_Results()
	{
		require_once('submenu.php');
	}

	add_action('admin_init', function() {
		wp_register_script('poll-wp', plugins_url('/Scripts/poll-wp_admin.js',__FILE__));
		wp_enqueue_script( 'poll-wp' );
				
	});

	function poll_wp_activate()
	{
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
	 	
	}
	
		register_activation_hook(__FILE__,'poll_wp_activate');

		register_deactivation_hook( __FILE__, 'poll_wp_deactivate');

		function poll_wp_deactivate()
		{
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

		}

		function GetSettingsDataFromMySQL($col, $instance)
		{
			global $wpdb;

				$Question=empty($instance['Question']) ? '' : $instance['Question'];
				$q=addslashes($Question);

 		 		$table_name1=$wpdb->prefix . "poll_wp_Questions";	
 		 		$table_name2=$wpdb->prefix . "poll_wp_Settings";

 		 		$settings=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)",$q));
 		 		//$settings=$wpdb->get_results("SELECT * FROM $table_name2 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question='$q' )");

 		 		return $settings[0]->$col;	 		
		}

		function DefaultData()
		{
			global $wpdb;

			$table_name  =  $wpdb->prefix . "poll_wp_Questions";
			$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
			$table_name3 =  $wpdb->prefix . "poll_wp_Results";	
			$table_name4 =  $wpdb->prefix . "poll_wp_Settings";

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, Question, PluginType) VALUES (%d, %s, %d)", '','Do You Like Our Plugin?', 1));
			//$wpdb->insert($table_name, array('id'=>'','Question'=>'Do You Like Our Plugin?','PluginType'=>'1'));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d, %s, %s, %s, %d)", '', 'Yes', '', '#F5F5F5', 1));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d, %s, %s, %s, %d)", '', 'No', '', '#F5F5F5', 1));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d, %s, %s, %s, %d)", '', 'Not at All', '', '#F5F5F5', 1));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d, %s, %s, %s, %d)", '', 'Great', '', '#F5F5F5', 1));
			//$wpdb->insert($table_name2, array('id'=>'','Answer'=>'Yes', 'File'=>'','Answer_bg_color'=>'#F5F5F5','QuestionID'=>'1' ));
			//$wpdb->insert($table_name2, array('id'=>'','Answer'=>'No', 'File'=>'','Answer_bg_color'=>'#F5F5F5', 'QuestionID'=>'1'));		
			//$wpdb->insert($table_name2, array('id'=>'','Answer'=>'Not at All','Answer_bg_color'=>'#F5F5F5', 'File'=>'', 'QuestionID'=>'1'));		
			//$wpdb->insert($table_name2, array('id'=>'','Answer'=>'Great', 'File'=>'','Answer_bg_color'=>'#F5F5F5', 'QuestionID'=>'1'));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID, Count) VALUES (%d, %d, %d, %d)", '', 1, 1, 0));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID, Count) VALUES (%d, %d, %d, %d)", '', 1, 2, 0));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID, Count) VALUES (%d, %d, %d, %d)", '', 1, 3, 0));
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID, Count) VALUES (%d, %d, %d, %d)", '', 1, 4, 0));
			//$wpdb->insert($table_name3, array('id'=>'','QuestionID'=>'1', 'AnswerID'=>'1', 'Count'=>'0'));	
			//$wpdb->insert($table_name3, array('id'=>'','QuestionID'=>'1', 'AnswerID'=>'2', 'Count'=>'0'));		
			//$wpdb->insert($table_name3, array('id'=>'','QuestionID'=>'1', 'AnswerID'=>'3', 'Count'=>'0'));		
			//$wpdb->insert($table_name3, array('id'=>'','QuestionID'=>'1', 'AnswerID'=>'4', 'Count'=>'0'));	
			
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, border_color, bg_color, font_family, font_size, answer_color, answer_hover_color, question_color, QuestionID) VALUES (%d, %s, %s, %s, %d, %s, %s, %s, %d)", '', 'Black', '#FFFFFF', 'Consolas', '14', 'rgb(255,0,0)', '', 'rgba(0,0,255,0.5)', 1));
			//$wpdb->insert($table_name4, array('id'=>'','border_color'=>'Black', 'bg_color'=>'#FFFFFF', 'font_family'=>'Consolas', 'font_size'=>'14', 'answer_color'=>'rgb(255,0,0)', 'question_color'=>'rgba(0,0,255,0.5)','QuestionID'=>'1' ));		
		}

		function  GetHoverColor($instance)
		{
			global $wpdb;

			$table_name4 =  $wpdb->prefix . "poll_wp_Settings";
			$table_name  =  $wpdb->prefix . "poll_wp_Questions";

			$Question =$instance['Question'];
			$q=addslashes($Question);

			$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE QuestionID=(SELECT id FROM $table_name WHERE Question= %s)", $q));
			//$results=$wpdb->get_results("SELECT * FROM  $table_name4 where QuestionID=(SELECT id from $table_name where Question='$q')");

			$color=$results[0]->answer_hover_color;

			return $color;

		}
?>