<?php

	class  Juna_IT_Poll extends WP_Widget
 	{
 		function __construct()
	 	  {
	 			$params=array('name'=>'Juna_IT_Poll','description'=>'This is the widget of poll-wp plugin');
				parent::__construct('Juna_IT_Poll','',$params);
	 	  }

	 	  public function update( $new_instance, $old_instance )
	 	   {
				$instance = $old_instance;
		              
				$instance['Question'] = $new_instance['Question']; 	
				return $instance;
		   }

 		 function form($instance)
 		 {
 		 		$defaults = array('Question'=>'');
			    $instance=wp_parse_args((array)$instance, $defaults);

			   	$Question =$instance['Question'];
			   
			   	?>
			   	<div>			  
			   	<p >

			   		Question:
			   		<select name="<?php echo $this->get_field_name('Question'); ?>" class="widefat" > 
				   		<?php

				   			global $wpdb;

				   			$table_name=$wpdb->prefix . "poll_wp_Questions";	

				   			$questions=$wpdb->get_results($wpdb->prepare("SELECT Question FROM $table_name WHERE id > %d", 0));

				   			foreach ($questions as $quest)
				   			{
				   				?> <option value="<?php echo $quest->Question;  ?>">  <?php echo  $quest->Question;  ?>  </option> <?php 
				   			}

				   		 ?>			   		
			   		</select>
			   	</p>
			   
			   	</div>
			   	<?php
 		 }

 		 function widget($args, $instance)
 		 {
 		 	extract($args);
 		  	$Question=empty($instance['Question']) ? '' : $instance['Question'];
 		 	
 		 	echo $before_widget;

 		 	?> 		 	
 		 	<form method="post" onload="MyFunction()" id="WidgetForm" onsubmit="return false;"  action=''>

 		 	<div id="widgetDiv" class="widget_div"  style="position:relative;  float:left; width: <?php echo  GetSettingsDataFromMySQL('widget_div_width',$instance) . 'px'; ?>; border-color: <?php echo  GetSettingsDataFromMySQL('border_color',$instance); ?>; background-color: <?php echo  GetSettingsDataFromMySQL('bg_color',$instance); ?>; ">

 		 	<section id="QuestionDiv" style="margin-bottom:0px; text-align:center; ">	
 		 	<span id="ActiveQuestion" class="Question" 	style="margin-bottom:0px; font-weight: bold; 
 		 	font-family: <?php echo  GetSettingsDataFromMySQL('font_family',$instance); ?>; 
 		 	font-size: <?php echo  GetSettingsDataFromMySQL('font_size',$instance) .'px'; ?>;
 		 	 color: <?php echo  GetSettingsDataFromMySQL('question_color',$instance); ?>;"><?php echo $Question; ?></span > </section>
 		 				 		
 		 		<?php

 		 			global $wpdb;

 		 			$table_name  = $wpdb->prefix . "poll_wp_Answers";	
 		 			$table_name1 = $wpdb->prefix . "poll_wp_Questions";	
 		 			$table_name3 = $wpdb->prefix . "poll_wp_Results";	
					$table_name4 = $wpdb->prefix . "poll_wp_Settings";

					$q=addslashes($Question);

					$selected_quest=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE Question= %s", $q));
				   
				   	$selected_quest=$selected_quest[0]->id;

				   	$answers=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE QuestionID= %s", $selected_quest));
				   
				   	$sum=$wpdb->get_var($wpdb->prepare("SELECT Sum(Count) FROM $table_name3 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)", $q));

				   	$result_data=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)", $q));

 		 		 	$plugintype=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE Question= %s", $q));
 		 		 	?>
 		 		 		<p id="p_id" style="display:none;"><?php echo $plugintype[0]->PluginType; ?></p>
 		 		 	<?php

 		 		 	if($plugintype[0]->PluginType==1)
 		 		 	{
 		 		 		?>	
 		 		 		<script>
					   		var cook =document.cookie;
 		 		 					var cookie_question = jQuery('#ActiveQuestion').html();
 		 		 					if(cook.indexOf(cookie_question.trim())>=0 && cook.indexOf('customer1')>=0)
 		 		 					{ 		
 		 		 						jQuery('#widgetDiv').css('display','none');
 		 		 						jQuery('answers_div').css('display','none');
 		 		 					}
 		 		 		</script>		 
 		 		 		
 		 		 		<div id="answers_div" style="position:relative; margin-top:0px; " > 
	 		 		 	 <?php  
					    for($i=0; $i<count($answers); $i++)
					    {
					   		?>
						   		<input type="radio" id="<?php echo 'answer' . ($i+1); ?>" name="answer"  
						   		value="<?php echo $answers[$i]->Answer; ?>" > <span id="span_ans_id" style="font-family: <?php echo  GetSettingsDataFromMySQL('answer_font_family',$instance); ?>; 
						   				color:<?php echo  GetSettingsDataFromMySQL('answer_color',$instance); ?>; font-size: <?php echo  GetSettingsDataFromMySQL('answer_font_size',$instance) .'px'; ?>;"> <?php echo $answers[$i]->Answer; ?> </span> </input> <br>  
					   				<script>
	 		 		 					var cook =document.cookie;
	 		 		 				
	 		 		 					if(cook.indexOf(jQuery('#ActiveQuestion').html())>=0  && cook.indexOf('customer1')>=0)
	 		 		 					{
	 		 		 							jQuery('#widgetDiv').css('display','none');
	 		 		 							jQuery('#answers_div').css('display','none');
	 		 		 					} 		 		 				
 		 		 					</script>		
					   		<?php 
					   	 }
					    ?>	

 		 				<input type="submit" value="vote" id="voteButton" onclick="Vote_Click()" style="color: <?php echo  GetSettingsDataFromMySQL('buttons_text_color',$instance); ?>;background-color:<?php echo  GetSettingsDataFromMySQL('vote_button_color',$instance); ?>; border-radius:7px; position:relative; height:40px; margin-bottom:5px; margin-top:8px; margin-left:50%; " />

 		 				</div> 
 		 				<?php
 		 		 	}
 		 		 ?>
 		 		</div>
 		 	</form>
 		 	<?php		 	

 		 	echo $after_widget;
 		 }			
 	}
	function GetSettingsDataFromMySQL($col, $instance)
		{
			global $wpdb;

			$Question=empty($instance['Question']) ? '' : $instance['Question'];
			$q=addslashes($Question);

 		 	$table_name1=$wpdb->prefix . "poll_wp_Questions";	
 		 	$table_name2=$wpdb->prefix . "poll_wp_Settings";

 		 	$settings=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)",$q));

 		 	return $settings[0]->$col;	 		
		}
?>