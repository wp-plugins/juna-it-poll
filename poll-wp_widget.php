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
 		 			<input type="submit" value="vote" id="voteButton" onclick="Vote_Click()" style="border-radius:7px; position:relative; height:40px; margin-bottom:5px; margin-top:8px; margin-left:50%; " />

 		 				</div> 
 		 				<?php
 		 		 	}

 		 		 	else if($plugintype[0]->PluginType==2)
 		 		 	{ 		 		 		
 		 		 		?>
 		 		 		<script>
					   		var cook =document.cookie;					   	
 		 		 					var cookie_question = jQuery('#ActiveQuestion').html();
 		 		 					
 		 		 					if(cook.indexOf(cookie_question.trim())>=0 && cook.indexOf('customer2')>=0)
 		 		 					{ 		
 		 		 						jQuery('#widgetDiv').css('display','none');
 		 		 						jQuery('answers_div').css('display','none');
 		 		 					}
 		 		 		</script>		
 		 		 		<input id="hover_color" type="text" style="display:none;" value=<?php  echo GetHoverColor($instance); ?>>
 		 		 		<div id="answers_div" style="position:relative; margin-top:0px;   " > 
	 		 		 	 <?php  
					    for($i=1; $i<=count($answers); $i++)
					    {
					   		 ?>
					   		 <section onmouseover="P2_answerHover(<?php echo $i; ?>)" onmouseout="P2_answerHoverOut(<?php echo $i; ?>)" onclick="F(<?php echo $i; ?>)" id="<?php echo "div_ans" . $i; ?>" style=" margin-top:5%; border:1px; border-style:dotted; border-color:<?php echo GetSettingsDataFromMySQL('border_color',$instance); ?>; border-radius:5px; background-color:<?php echo $answers[$i-1]->Answer_bg_color; ?>; width:100%; height:40px;"> <span id="<?php echo "span_ans" . $i; ?>" style="height:40px; line-height:40px; text-align:center;  float:left; text-align:center; width:100%; color:<?php echo GetSettingsDataFromMySQL('answer_color', $instance); ?>;"> <?php echo $answers[$i-1]->Answer; ?> </span> </section> 				   		
					   		 <?php 
					   	}	
					   	?> </div> 
					   	<script>
					   		var cook =document.cookie;
 		 		 					var cookie_question = jQuery('#ActiveQuestion').html();
 		 		 					if(cook.indexOf(cookie_question.trim())>=0 && cook.indexOf('customer2')>=0)
 		 		 					{ 		
 		 		 						jQuery('#widgetDiv').css('display','none');
 		 		 						jQuery('answers_div').css('display','none');
 		 		 					}
 		 		 		</script>		
					   	<?php				    
 		 		 	}
 		 		 	else if($plugintype[0]->PluginType==3)
 		 		 		{
 		 		 			$col=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)",$q));

 		 		 			$images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)",$q));
 		 		 			
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
 		 		 	else if($plugintype[0]->PluginType==4)
 		 		 		{
 		 		 			?>
 		 		 			<script>
 		 		 				var cook =document.cookie;
 		 		 				
	 		 		 					var cookie_question = jQuery('#ActiveQuestion').html();
	 		 		 					cookie_question=cookie_question.trim();
	 		 		 					if(cook.indexOf(cookie_question)>=0  && cook.indexOf('customer4')>=0)
	 		 		 					{ 	 		 		 						
	 		 		 						jQuery('#widgetDiv').css('display','none');
	 		 		 						jQuery('answers_div').css('display','none');
	 		 		 					}

 		 		 			</script>
 		 		 			<div id="answers_div" style="position:relative; margin:0 auto; width:100%; margin-top:0px;  " > 
	 		 		 			<?php   		 		 			 
			 		 			 	
								    for($i=1; $i<=count($answers); $i++)
								    {
								   		?>
									   		<div id="<?php echo "p4_div".$i; ?>"  onclick="p4_mouseClick(<?php echo $i; ?>)" style=" width:100%;   height:40px; border:1px; border-style:dotted; border-color:<?php echo $answers[$i-1]->Answer_bg_color; ?>;; margin-top:5%;"> 
									   		<span id="<?php echo "p4_span".$i; ?>" style="float:left; padding-left:10px; font-size:14px; margin-left:0%;  color:<?php echo  GetSettingsDataFromMySQL('answer_color',$instance); ?>;"> <?php echo $answers[$i-1]->Answer; ?> </span> 
									   		<section id="<?php echo "p4_section".$i; ?>" style="position:relative; float:right; width:15%; height:100%; background-color:<?php echo $answers[$i-1]->Answer_bg_color; ?>;">  </section>
									   		</div>

								   		<?php 
								   	}
								   		
								?>

 		 		 			</div>
 		 		 			<script>
 		 		 				var cook =document.cookie;
	 		 		 					var cookie_question = jQuery('#ActiveQuestion').html();
	 		 		 					cookie_question=cookie_question.trim();
	 		 		 					if(cook.indexOf(cookie_question)>=0  && cook.indexOf('customer4')>=0)
	 		 		 					{ 		
	 		 		 						jQuery('#widgetDiv').css('display','none');
	 		 		 						jQuery('answers_div').css('display','none');
	 		 		 					}

 		 		 			</script>
 		 		 			<?php
 		 		 		}
 		 		 	?>
 		 	</div>
 		 	<div id="chartDiv" style="display:none; width:300px; height: 400px;">  </div> 		
 		 		
 		 	</form>

 		 	<?php		 	

 		 	echo $after_widget;
 		 }			
 	}

 	function  GetHoverColor($instance)
		{
			global $wpdb;

			$table_name4 =  $wpdb->prefix . "poll_wp_Settings";
			$table_name  =  $wpdb->prefix . "poll_wp_Questions";

			$Question =$instance['Question'];
			$q=addslashes($Question);

			$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE QuestionID=(SELECT id FROM $table_name WHERE Question= %s)", $q));

			$color=$results[0]->answer_hover_color;

			return $color;
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