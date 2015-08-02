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
				   			//$questions=$wpdb->get_results("SELECT Question FROM $table_name");

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
 		 	<form method="post" onload="MyFunction()" id="WidgetForm" onsubmit="return false;"  action=<?php echo plugins_url('/count.php',__FILE__); ?>>

 		 	<div id="widgetDiv" class="widget_div"  style="position:relative;  float:left; width:320px; border-color: <?php echo  GetSettingsDataFromMySQL('border_color',$instance); ?>; background-color: <?php echo  GetSettingsDataFromMySQL('bg_color',$instance); ?>; ">

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
				   	//$selected_quest=$wpdb->get_results("SELECT * FROM $table_name1 WHERE Question='$q'");

				   	$selected_quest=$selected_quest[0]->id;

				   	$answers=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE QuestionID= %s", $selected_quest));
				   	//$answers=$wpdb->get_results("SELECT * FROM $table_name WHERE QuestionID='$selected_quest'");
				   
				   	$sum=$wpdb->get_var($wpdb->prepare("SELECT Sum(Count) FROM $table_name3 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)", $q));
				   	//$sum=$wpdb->get_var("SELECT Sum(Count) FROM  $table_name3 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question='$q')");

				   	$result_data=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)", $q));
 		 		 	//$result_data=$wpdb->get_results("SELECT * from $table_name3 where QuestionID=(SELECT id from $table_name1 where Question='$q')");

 		 		 	$plugintype=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE Question= %s", $q));
 		 		 	//$plugintype=$wpdb->get_results("SELECT * FROM $table_name1 WHERE Question='$q'");
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
					   		value="<?php echo $answers[$i]->Answer; ?>" > <span id="span_ans_id" style="font-family: <?php echo  GetSettingsDataFromMySQL('font_family',$instance); ?>; 
					   				 color:<?php echo  GetSettingsDataFromMySQL('answer_color',$instance); ?>;"> <?php echo $answers[$i]->Answer; ?> </span> </input> <br>  
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
 		 			<input type="submit" value="vote" id="voteButton" onclick="Vote_Click()" style="border-radius:7px; position:relative; height:40px; margin-bottom:5px; margin-top:8px; margin-left:70%; " />

 		 				</div> 
 		 				<?php
 		 		 	}
 		 		 	

 		 		 		else if($plugintype[0]->PluginType==3)
 		 		 		{
 		 		 			$col=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)",$q));
 		 		 			//$col=$wpdb->get_results("SELECT * FROM $table_name4 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question='$q')");

 		 		 			$images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)",$q));
 		 		 			//$images=$wpdb->get_results("SELECT * FROM $table_name WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question='$q')");
 		 		 			
 		 		 			?>
	 		 		 			<script type="text/javascript">
	 		 		 				jQuery(document).ready(function() {
	 		 		 					jQuery('#QuestionDiv').css('background-color', '<?php echo $col[0]->answer_hover_color; ?>');
	 		 		 					jQuery('#QuestionDiv').css('border-radius','5px');
	 		 		 					jQuery('#QuestionDiv').css('padding','6px');	 		 		 					

	 		 		 				})
	 		 		 			</script>
	 		 		 			<div id="AllAnswers">
 		 		 			<?php
 		 		 			
 		 		 		 	for($i=1; $i<=count($answers); $i++)
 		 		 		 	{
 		 		 		 		?>

 		 		 		 		<div onclick="p3_vote('<?php echo $i; ?>')" id="<?php echo 'p3_answerDiv' . $i; ?>" onmouseout="p3_mouseOut(<?php echo $i; ?>)" onmouseover="p3_mouseEnter(<?php echo $i; ?>)" style="position:relative; margin 0 auto; padding:5px; width:140px; float:<?php if($i%2==0) echo "right"; else echo "left"; ?>;   border:1px; border-style:dotted; border-color: <?php echo GetSettingsDataFromMySQL('answer_color',$instance); ?>; border-radius:7px; margin: 10px auto;  ">
 		 		 		  		<div id="<?php echo 'voteScreenDiv' .$i; ?>" style="display:none; position:absolute; width:130px; height:90px; background-color:gray; "> 
 		 		 		  			<span id="<?php echo 'p3_CountSpan' . $i; ?>" style="font-size:18px; color:white; text-align:center; float:left; margin-top:25%; width:100%;"> </span>
 		 		 		  		</div>
 		 		 		  		<img    style="height:90px; width:130px;" src="<?php echo trim(plugins_url('\Images\Uploads\ ',__FILE__) . $images[$i-1]->File ); ?>"> 
 		 		 		  		<span id="<?php echo 'p3_answerSpan' . $i; ?>" style="font-size:12px; text-align:center; color:<?php echo GetSettingsDataFromMySQL('answer_color',$instance); ?>; width:100%; float:left;"> <?php echo $answers[$i-1]->Answer ;?> </span>

 		 		 		 		</div>
 		 		 		 		  	<script>
						   				var cook =document.cookie;
	 		 		 					var cookie_question = jQuery('#ActiveQuestion').html();
	 		 		 					if(cook.indexOf(cookie_question)>=0  && cook.indexOf('customer3')>=0)
	 		 		 					{ 		
	 		 		 						jQuery('#widgetDiv').css('display','none');
	 		 		 						jQuery('answers_div').css('display','none');
	 		 		 					}
 		 		 					</script>	
 		 		 		 		<?php
 		 		 		 	}
 		 		 		 	?> </div> <?php
 		 		 		}
 		 		 		
 		 		 	?>
 		 	
 		 	</div>
 		 	<div id="chartDiv" style="display:none; width:300px; height: 400px;">  </div> 		
 		 		
 		 	</form>



 		 	<?php		 	

 		 	echo $after_widget;
 		 }			

 	}


?>