 <?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;	
	wp_enqueue_media();
	wp_enqueue_script( 'custom-header' );
	$table_name  =  $wpdb->prefix . "poll_wp_Questions"; 
	$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
	$table_name3 =  $wpdb->prefix . "poll_wp_Results";	
	$table_name4 =  $wpdb->prefix . "poll_wp_Settings"; 
	$table_name5 =  $wpdb->prefix . "poll_wp_position"; 
	$table_name6 =  $wpdb->prefix . "poll_wp_font_family"; 
	$table_name7 =  $wpdb->prefix . "poll_wp_Parameters"; 

	if(isset ($_POST['Add_new_Juna_IT_Poll_Save_button']))
	{
		$Juna_IT_Poll_Add_Question_Field=sanitize_text_field($_POST['Juna_IT_Poll_Add_Question_Field']);
		$Juna_IT_Poll_Plugin_Type_Text_Readonly=sanitize_text_field($_POST['Juna_IT_Poll_Plugin_Type_Text_Readonly']);

		if($Juna_IT_Poll_Plugin_Type_Text_Readonly==1)
		{
			$Juna_IT_Poll_Answers_Count=sanitize_text_field($_POST['Juna_IT_Poll_Answers_Count']);
			delete($Juna_IT_Poll_Add_Question_Field);

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, Juna_IT_Poll_Add_Question_Field, Juna_IT_Poll_Plugin_Type_Text_Readonly) VALUES (%d,%s,%s) ", '', $Juna_IT_Poll_Add_Question_Field,$Juna_IT_Poll_Plugin_Type_Text_Readonly));
			
			for($i=1; $i<=$Juna_IT_Poll_Answers_Count; $i++)
			{
				$Juna_IT_Poll_Answer_Colors[$i]='#ffffff';
			}
			
			for($i=1; $i<=$Juna_IT_Poll_Answers_Count; $i++)
			{
				$Juna_IT_Poll_Answers[$i]=sanitize_text_field($_POST['Juna_IT_Poll_Answers_Input_' . $i]);
			}

			$Juna_IT_Poll_Add_Question_FieldID=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name  WHERE id > %d order by id desc limit 1  ", 0));

			$Juna_IT_Poll_Question_Font_Family=sanitize_text_field($_POST['Juna_IT_Poll_Question_Font_Family']);
			$Juna_IT_Poll_Question_Font_Size=sanitize_text_field($_POST['Juna_IT_Poll_Question_Font_Size']).'px';
			$Juna_IT_Poll_Input_Bg_Color=sanitize_text_field($_POST['Juna_IT_Poll_Input_Bg_Color']);
			$Juna_IT_Poll_Input_Color=sanitize_text_field($_POST['Juna_IT_Poll_Input_Color']);
			$Juna_IT_Poll_Question_Border_Style='None';
			$Juna_IT_Poll_Question_Border_Width='0px';
			$Juna_IT_Poll_Question_Border_Radius='0px';
			$Juna_IT_Poll_Input_Border_Color='#000000';
			$Juna_IT_Poll_Answer_Font_Family=sanitize_text_field($_POST['Juna_IT_Poll_Answer_Font_Family']);
			$Juna_IT_Poll_Answer_Font_Size=sanitize_text_field($_POST['Juna_IT_Poll_Answer_Font_Size']).'px';
			$Juna_IT_Poll_Input_Answer_Bg_Color=sanitize_text_field($_POST['Juna_IT_Poll_Input_Answer_Bg_Color']);
			$Juna_IT_Poll_Input_Answer_Color=sanitize_text_field($_POST['Juna_IT_Poll_Input_Answer_Color']);
			$Juna_IT_Poll_Answer_Border_Style='None';
			$Juna_IT_Poll_Answer_Border_Width='0px';
			$Juna_IT_Poll_Answer_Border_Radius='0px';
			$Juna_IT_Poll_Input_Answer_Border_Color='#000000';
			$Juna_IT_Poll_Between_Answer='0px';

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, Juna_IT_Poll_Question_Font_Family, Juna_IT_Poll_Question_Font_Size, 
				Juna_IT_Poll_Input_Bg_Color, Juna_IT_Poll_Input_Color, Juna_IT_Poll_Question_Border_Style, Juna_IT_Poll_Question_Border_Width, 
				Juna_IT_Poll_Question_Border_Radius, Juna_IT_Poll_Input_Border_Color, Juna_IT_Poll_Answer_Font_Family, Juna_IT_Poll_Answer_Font_Size, 
				Juna_IT_Poll_Input_Answer_Bg_Color, Juna_IT_Poll_Input_Answer_Color, Juna_IT_Poll_Answer_Border_Style, Juna_IT_Poll_Answer_Border_Width, 
				Juna_IT_Poll_Answer_Border_Radius, Juna_IT_Poll_Input_Answer_Border_Color, Juna_IT_Poll_Between_Answer, Juna_IT_Poll_Add_Question_FieldID) 
			VALUES (%d,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%d) ", '', $Juna_IT_Poll_Question_Font_Family, $Juna_IT_Poll_Question_Font_Size, 
			$Juna_IT_Poll_Input_Bg_Color, $Juna_IT_Poll_Input_Color, $Juna_IT_Poll_Question_Border_Style, $Juna_IT_Poll_Question_Border_Width, 
			$Juna_IT_Poll_Question_Border_Radius, $Juna_IT_Poll_Input_Border_Color, $Juna_IT_Poll_Answer_Font_Family, $Juna_IT_Poll_Answer_Font_Size, 
			$Juna_IT_Poll_Input_Answer_Bg_Color, $Juna_IT_Poll_Input_Answer_Color, $Juna_IT_Poll_Answer_Border_Style, $Juna_IT_Poll_Answer_Border_Width, 
			$Juna_IT_Poll_Answer_Border_Radius, $Juna_IT_Poll_Input_Answer_Border_Color, $Juna_IT_Poll_Between_Answer, $Juna_IT_Poll_Add_Question_FieldID));

	 		$Juna_IT_Poll_Widget_Width=sanitize_text_field($_POST['Juna_IT_Poll_Widget_Width']).'px';
			$Juna_IT_Poll_Input_Background_Color=sanitize_text_field($_POST['Juna_IT_Poll_Input_Background_Color']);
			$Juna_IT_Poll_Widget_Border_Width='1px';
			$Juna_IT_Poll_Widget_Border_Radius='6px';
			$Juna_IT_Poll_Input_Border_Color=sanitize_text_field($_POST['Juna_IT_Poll_Input_Border_Color']);
			$Juna_IT_Poll_Widget_Border_Style='solid';
			$Juna_IT_Poll_Votes_Type_Radio=sanitize_text_field($_POST['Juna_IT_Poll_Votes_Type_Radio']);
			$Juna_IT_Poll_Input_Vote_Color=sanitize_text_field($_POST['Juna_IT_Poll_Input_Vote_Color']);
			$Juna_IT_Poll_Input_Vote_Button_Color=sanitize_text_field($_POST['Juna_IT_Poll_Input_Vote_Button_Color']);
			$Juna_IT_Poll_Input_Vote_Button_Color_Color=sanitize_text_field($_POST['Juna_IT_Poll_Input_Vote_Button_Color_Color']);
			$Juna_IT_Poll_Margin_Right='20px';
			$Juna_IT_Poll_Button_Width='62px';
			$Juna_IT_Poll_Button_Border_Radius='10px';
			$Juna_IT_Poll_Button_Font_Family='Abadi MT Condensed Light';
			$Juna_IT_Poll_Button_Font_Size='14px';
			$Juna_IT_Poll_Button_Text='VOTE';
			$Juna_IT_Poll_Image_Width='0px';
			$Juna_IT_Poll_Image_Height='0px';
			$Juna_IT_Poll_Image_Border_Width='0px';
			$Juna_IT_Poll_Image_Border_Radius='0px';
			$Juna_IT_Poll_Div_Border_Radius='0px';
			$Juna_IT_Poll_Input_Image_Border_Color='#000000';
			$Juna_IT_Poll_Image_Border_Style='None';

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Juna_IT_Poll_Widget_Width, Juna_IT_Poll_Input_Background_Color, 
				Juna_IT_Poll_Widget_Border_Width, Juna_IT_Poll_Widget_Border_Radius, Juna_IT_Poll_Input_Border_Color, Juna_IT_Poll_Widget_Border_Style, 
				Juna_IT_Poll_Votes_Type_Radio, Juna_IT_Poll_Input_Vote_Color, Juna_IT_Poll_Input_Vote_Button_Color, 
				Juna_IT_Poll_Input_Vote_Button_Color_Color, Juna_IT_Poll_Margin_Right, Juna_IT_Poll_Button_Width, 
				Juna_IT_Poll_Button_Border_Radius, Juna_IT_Poll_Button_Font_Family, Juna_IT_Poll_Button_Font_Size, Juna_IT_Poll_Button_Text, 
				Juna_IT_Poll_Image_Width, Juna_IT_Poll_Image_Height, Juna_IT_Poll_Image_Border_Width, Juna_IT_Poll_Image_Border_Radius, Juna_IT_Poll_Div_Border_Radius, 
				Juna_IT_Poll_Input_Image_Border_Color, Juna_IT_Poll_Image_Border_Style, Juna_IT_Poll_Add_Question_FieldID) 
			VALUES (%d,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%d) ", '', $Juna_IT_Poll_Widget_Width, $Juna_IT_Poll_Input_Background_Color, 
			$Juna_IT_Poll_Widget_Border_Width, $Juna_IT_Poll_Widget_Border_Radius, $Juna_IT_Poll_Input_Border_Color, $Juna_IT_Poll_Widget_Border_Style, $Juna_IT_Poll_Votes_Type_Radio, 
			$Juna_IT_Poll_Input_Vote_Color, $Juna_IT_Poll_Input_Vote_Button_Color, $Juna_IT_Poll_Input_Vote_Button_Color_Color, $Juna_IT_Poll_Margin_Right, $Juna_IT_Poll_Button_Width, 
			$Juna_IT_Poll_Button_Border_Radius, $Juna_IT_Poll_Button_Font_Family, $Juna_IT_Poll_Button_Font_Size, $Juna_IT_Poll_Button_Text, $Juna_IT_Poll_Image_Width, 
			$Juna_IT_Poll_Image_Height, $Juna_IT_Poll_Image_Border_Width, $Juna_IT_Poll_Image_Border_Radius, $Juna_IT_Poll_Div_Border_Radius, $Juna_IT_Poll_Input_Image_Border_Color, 
			$Juna_IT_Poll_Image_Border_Style, $Juna_IT_Poll_Add_Question_FieldID));

	 		if($Juna_IT_Poll_Plugin_Type_Text_Readonly!=3)
	 		{
	 			for($i=1; $i<=$Juna_IT_Poll_Answers_Count; $i++)
				{
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Juna_IT_Poll_Answers_Input, Juna_IT_Poll_Upload_File, Juna_IT_Poll_Input_Add_Answer_Bg, Juna_IT_Poll_Add_Question_FieldID) VALUES (%d,%s,%s,%s,%d)",'',$Juna_IT_Poll_Answers[$i],'',$Juna_IT_Poll_Answer_Colors[$i],$Juna_IT_Poll_Add_Question_FieldID));
					
					$Juna_IT_Poll_Answers_ID=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name2 WHERE Juna_IT_Poll_Answers_Input= %s and Juna_IT_Poll_Add_Question_FieldID= %d ", $Juna_IT_Poll_Answers[$i], $Juna_IT_Poll_Add_Question_FieldID ));
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Juna_IT_Poll_Add_Question_FieldID, Juna_IT_Poll_Answers_InputID, Juna_IT_Poll_Count) VALUES (%d,%d,%d,%d)",'', $Juna_IT_Poll_Add_Question_FieldID, $Juna_IT_Poll_Answers_ID, 0));
				}
	 		} 		
		}		
	}

	$Juna_IT_Poll_title_table=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d",1));
	$Juna_IT_Poll_Font_Family=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE id > %d",0));
?>
<div id="Juna_IT_Poll_main_first_div"> 
	<div class="Juna_IT_Poll_Add_Poll_Footer_Div">
		<a href="http://juna-it.com" target="_blank"<abbr title="Click to Visit"><img src="http://juna-it.com/image/logo-orange.png" class="Juna_IT_Logo_Orange"></a>
			<br><br><br><br><br>
		<span class="Polls_Title_Span">Question:</span> 
		<input type="text" class="Juna_IT_Poll_search_text_field" id="Juna_IT_Poll_search_text_field" onclick="Juna_IT_Poll_Search_Question()">
		<input type="button" class="Juna_IT_Poll_Reset_button" value="Reset" onclick="Juna_IT_Poll_Reset_Button_Clicked()">
		<span class="searched_question_does_not_exist" id="searched_question_does_not_exist"></span>
		<input type="button" class="Juna_IT_Poll_Add_Poll_button" value="Create New Poll" onclick="Juna_IT_Poll_Create_New_Poll_Clicked()">
	</div>
	<table class = 'Juna_IT_Poll_Main_Table'>
		<tr class="Juna_IT_Poll_first_row">
			<td class='Juna_IT_Poll_main_id_item'><B><I>No</I></B></td>
			<td class='Juna_IT_Poll_main_title_item'><B><I>Poll Title</I></B></td>
			<td class='Juna_IT_Poll_main_type_item'><B><I>Poll Type</I></B></td>			
			<td class='Juna_IT_Poll_main_actions_item'><B><I>Actions</I></B></td>
		</tr>
	</table>
	<table class = 'Juna_IT_Poll_Table'>
		<tr>
			<td class='Juna_IT_Poll_id_item'><B><I><?php echo 1 ;?></I></B></td>
			<td class='Juna_IT_Poll_title_item'><B><I><?php echo 'Do You Like Our Plugin?'; ?></I></B></td>	
			<td class='Juna_IT_Poll_type_item'><B><I><?php echo 'Standart Poll' ;?></I></B></td>			
			<td class='Juna_IT_Poll_edit_item1'><B><I>Edit</I></B></td>
			<td class='Juna_IT_Poll_delete_item1'><B><I>Delete</I></B></td>
		</tr>
		<?php for($i=0;$i<count($Juna_IT_Poll_title_table);$i++) {?>
		<tr>
			<td class='Juna_IT_Poll_id_item'><B><I><?php echo $i+2 ;?></I></B></td>
			<td class='Juna_IT_Poll_title_item'><B><I><?php echo $Juna_IT_Poll_title_table[$i]->Juna_IT_Poll_Add_Question_Field ; ?></I></B></td>	
			<td class='Juna_IT_Poll_type_item'><B><I><?php if($Juna_IT_Poll_title_table[$i]->Juna_IT_Poll_Plugin_Type_Text_Readonly==1){echo 'Standart Poll';}else if($Juna_IT_Poll_title_table[$i]->Juna_IT_Poll_Plugin_Type_Text_Readonly==2){echo 'Pie Chart';}else if($Juna_IT_Poll_title_table[$i]->Juna_IT_Poll_Plugin_Type_Text_Readonly==3){echo 'Image/Video';}else{echo 'Column Chart';} ;?></I></B></td>			
			<td class='Juna_IT_Poll_edit_item' onclick="Edit_Juna_IT_Poll(<?php echo $Juna_IT_Poll_title_table[$i]->id; ?>,<?php echo $Juna_IT_Poll_title_table[$i]->Juna_IT_Poll_Plugin_Type_Text_Readonly; ?>)"><B><I>Edit</I></B></td>
			<td class='Juna_IT_Poll_delete_item' onclick="Delete_Juna_IT_Poll(<?php echo $Juna_IT_Poll_title_table[$i]->id ; ?>)"><B><I>Delete</I></B></td>
		</tr>
		<?php } ?>
	</table>
	<table class = 'Juna_IT_Poll_Table1'>
			
	</table>
</div>
<!-- Stepan -->
<div id="Juna_IT_Poll_main_second_div">
	<form method="post" id="Juna_IT_Poll_Admin_Form" enctype="multipart/form-data">
		<div class="Juna_IT_Poll_Add_Poll_Footer_Div1">
			<a href="http://juna-it.com" target="_blank"<abbr title="Click to Visit"><img src="http://juna-it.com/image/logo-orange.png" class="Juna_IT_Logo_Orange1"></a>
			<br>
			<span class="Add_Polls_Title_Span">Question:</span> 
			<input type="text" class="Juna_IT_Poll_Add_Question_Field" id="Juna_IT_Poll_Add_Question_Field" name="Juna_IT_Poll_Add_Question_Field" onclick="Juna_IT_Poll_Add_Question_Field_Click()" required>
				<br><br><br>
			<input type="button" value="Choose Poll Type" id="Juna_IT_Poll_Admin_Menu_Button_1" class="Juna_IT_Poll_Choose_Poll_Type_Button">
			<input type="button" value="Question Style" id="Juna_IT_Poll_Admin_Menu_Button_2" class="Juna_IT_Poll_Question_Style_Button">
			<input type="button" value="Add Answers" id="Juna_IT_Poll_Admin_Menu_Button_3" class="Juna_IT_Poll_Add_Answers_Button">
			<input type="button" value="Answers Style" id="Juna_IT_Poll_Admin_Menu_Button_4" class="Juna_IT_Poll_Answers_Style_Button">
			<input type="button" value="Widget Style" id="Juna_IT_Poll_Admin_Menu_Button_5" class="Juna_IT_Poll_Widget_Style_Button">
			<input type="hidden" id="Juna_IT_Poll_hidden_Field_for_Number" value="1">
			<input type='submit' id='Juna_IT_Poll_Save_Button' class="Juna_IT_Poll_Save_Button" value='Save Poll' name="Add_new_Juna_IT_Poll_Save_button" />

		</div>
		<div id="Juna_IT_Poll_Next_Prev_Button_Div" class="Juna_IT_Poll_Next_Prev_Button_Div">
			<span style="display:none;color:red;margin-left:15px;font-size:16px;" id="Juna_IT_Poll_Free_Span_1">This is the free version of the plugin. Click <a href="http://juna-it.com/index.php/features/elements/juna-it-plugin/" target="_blank"<abbr title="Click to Buy">"GET THE FULL VERSION"</a> for more advanced options.</span><br>
			<span style="display:none;color:red;margin-left:250px;font-size:16px;" id="Juna_IT_Poll_Free_Span_2"> We appreciate every customer.</span>
			<span style="display:none;color:red;margin-left:150px;font-size:16px;" id="Juna_IT_Poll_Free_Span_3"> * This Symbols will work only with Full version.<a href="http://juna-it.com/index.php/features/elements/juna-it-plugin/" target="_blank" style="margin-left:5px;"><abbr title="Click to Buy">"GET THE FULL VERSION"</a></span>

			<input type="button" value="Next    >>" class="Juna_IT_Poll_Next_Button" onclick="Juna_IT_Poll_Next_Button()">
			<input type="button" value="<<    Prev" class="Juna_IT_Poll_Prev_Button" onclick="Juna_IT_Poll_Prev_Button()">
			<input type="hidden" id="Juna_IT_Poll_Plugin_Type_Text_Readonly" value="1" name="Juna_IT_Poll_Plugin_Type_Text_Readonly">
		</div><br><br>

		<div class='plugins_type' id='plugins_type1' >
			<p class='questions_title' style='text-align:center; color:black;'>Question?</p>	
			
			<div class='Juna_IT_Poll_PT1_Div1 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style="height:40px;margin-top:0px;"><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_1'>Answer1</span></div>
			<div class='Juna_IT_Poll_PT1_Div2 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style="height:40px;margin-top:0px;"><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_2'>Answer2</span></div>
			<div class='Juna_IT_Poll_PT1_Div3 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style='display:none;height:40px;margin-top:0px;'><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_3'>Answer3</span></div>
			<div class='Juna_IT_Poll_PT1_Div4 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style='display:none;height:40px;margin-top:0px;'><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_4'>Answer4</span></div>
			<div class='Juna_IT_Poll_PT1_Div5 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style='display:none;height:40px;margin-top:0px;'><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_5'>Answer5</span></div>
			<div class='Juna_IT_Poll_PT1_Div6 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style='display:none;height:40px;margin-top:0px;'><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_6'>Answer6</span></div>
			<div class='Juna_IT_Poll_PT1_Div7 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style='display:none;height:40px;margin-top:0px;'><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_7'>Answer7</span></div>
			<div class='Juna_IT_Poll_PT1_Div8 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style='display:none;height:40px;margin-top:0px;'><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_8'>Answer8</span></div>
			<div class='Juna_IT_Poll_PT1_Div9 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style='display:none;height:40px;margin-top:0px;'><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_9'>Answer9</span></div>
			<div class='Juna_IT_Poll_PT1_Div10 Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' style='display:none;height:40px;margin-top:0px;'><input class='Juna_IT_Poll_Radio' style="margin:9px;" type='radio' name="answer"><span id='Juna_IT_Poll_PT1_Answer_10'>Answer10</span></div>
			<input id='Juna_IT_Poll_Vote_Button' type='button' value='VOTE' style='background: #000000;width: 62px;color: #ffffff; float:right;padding:0px; margin-right: 20px;height:40px;border:0px; border-radius: 10px;margin-bottom:10px;margin-top:15px;'>
		</div>
		<div class='plugins_type' id='plugins_type2' >
			<p class='questions_title' style='text-align:center;color:black;'>Question?</p>	
			
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_1' style='color:black;height:30px; background-color: #49ff78;border-radius:10px; text-align:center;'>Answer1</p>
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_2' style='color:black;height:30px; background-color: #10ffff;border-radius:10px; text-align:center;'>Answer2</p>
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_3' style='display:none;color:black;height:30px; background-color: #ffa448;border-radius:10px; text-align:center;'>Answer3</p>
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_4' style='display:none;color:black;height:30px; background-color: #ffff80;border-radius:10px; text-align:center;'>Answer4</p>
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_5' style='display:none;color:black;height:30px; background-color: #ff4242;border-radius:10px; text-align:center;'>Answer5</p>
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_6' style='display:none;color:black;height:30px; background-color: #49ff78;border-radius:10px; text-align:center;'>Answer6</p>
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_7' style='display:none;color:black;height:30px; background-color: #10ffff;border-radius:10px; text-align:center;'>Answer7</p>
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_8' style='display:none;color:black;height:30px; background-color: #ffa448;border-radius:10px; text-align:center;'>Answer8</p>
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_9' style='display:none;color:black;height:30px; background-color: #ff4242;border-radius:10px; text-align:center;'>Answer9</p>
			<p class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT2_Answer_10' style='display:none;color:black;height:30px; background-color: #49ff78;border-radius:10px; text-align:center;'>Answer10</p>
		</div>
		<div class='plugins_type' id='plugins_type3' >
			<p class='questions_title' style='text-align:center;color:black; background-color:#cfcfcf; margin:10px 10px 10px 10px;'>Question?</p>
			
			<div id='Juna_IT_Poll_PT3_Div1' class="Juna_IT_Poll_PT3_Div" style='text-align:center;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/1.jpg" id='Juna_IT_Poll_Image_1' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_1' style='text-align:center;color:black;'>Answer1</span></div>
			<div id='Juna_IT_Poll_PT3_Div2' class="Juna_IT_Poll_PT3_Div" style='text-align:center;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/2.jpg" id='Juna_IT_Poll_Image_2' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_2' style='text-align:center;color:black;'>Answer2</span></div>
			<div id='Juna_IT_Poll_PT3_Div3' class="Juna_IT_Poll_PT3_Div" style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/3.jpg" id='Juna_IT_Poll_Image_3' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_3' style='text-align:center;color:black;'>Answer3</span></div>
			<div id='Juna_IT_Poll_PT3_Div4' class="Juna_IT_Poll_PT3_Div" style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/4.jpg" id='Juna_IT_Poll_Image_4' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_4' style='text-align:center;color:black;'>Answer4</span></div>
			<div id='Juna_IT_Poll_PT3_Div5' class="Juna_IT_Poll_PT3_Div" style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/5.jpg" id='Juna_IT_Poll_Image_5' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_5' style='text-align:center;color:black;'>Answer5</span></div>
			<div id='Juna_IT_Poll_PT3_Div6' class="Juna_IT_Poll_PT3_Div" style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/6.jpg" id='Juna_IT_Poll_Image_6' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_6' style='text-align:center;color:black;'>Answer6</span></div>
			<div id='Juna_IT_Poll_PT3_Div7' class="Juna_IT_Poll_PT3_Div" style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/7.jpg" id='Juna_IT_Poll_Image_7' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_7' style='text-align:center;color:black;'>Answer7</span></div>
			<div id='Juna_IT_Poll_PT3_Div8' class="Juna_IT_Poll_PT3_Div" style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/8.jpg" id='Juna_IT_Poll_Image_8' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_8' style='text-align:center;color:black;'>Answer8</span></div>
			<div id='Juna_IT_Poll_PT3_Div9' class="Juna_IT_Poll_PT3_Div" style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/9.jpg" id='Juna_IT_Poll_Image_9' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_9' style='text-align:center;color:black;'>Answer9</span></div>
			<div id='Juna_IT_Poll_PT3_Div10' class="Juna_IT_Poll_PT3_Div" style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/10.jpg" id='Juna_IT_Poll_Image_10' style='width:90px; height:66px;'><span class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT3_Answer_10' style='text-align:center;color:black;'>Answer10</span></div>
		</div>
		<div class='plugins_type' id='plugins_type4' >
			<p class='questions_title' style='text-align:center;color:black;'>Question?</p>
			
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div1' style='border: 1px solid #49ff78;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_1' style='float: left;margin: 5px;'>Answer1</p><div id='Juna_IT_Poll_Set_Color_1'style='float: right;background-color:#49ff78;display: inline-block;height: 40px; width: 32px;'></div></div>
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div2' style='border: 1px solid #10ffff;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_2' style='float: left;margin: 5px;'>Answer2</p><div id='Juna_IT_Poll_Set_Color_2'style='float: right;background-color:#10ffff;display: inline-block;height: 40px; width: 32px;'></div></div>
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div3' style='display:none;border: 1px solid #ffa448;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_3' style='float: left;margin: 5px;'>Answer3</p><div id='Juna_IT_Poll_Set_Color_3'style='float: right;background-color:#ffa448;display: inline-block;height: 40px; width: 32px;'></div></div>
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div4' style='display:none;border: 1px solid #ffff80;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_4' style='float: left;margin: 5px;'>Answer4</p><div id='Juna_IT_Poll_Set_Color_4'style='float: right;background-color:#ffff80;display: inline-block;height: 40px; width: 32px;'></div></div>
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div5' style='display:none;border: 1px solid #ff4242;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_5' style='float: left;margin: 5px;'>Answer5</p><div id='Juna_IT_Poll_Set_Color_5'style='float: right;background-color:#ff4242;display: inline-block;height: 40px; width: 32px;'></div></div>
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div6' style='display:none;border: 1px solid #49ff78;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_6' style='float: left;margin: 5px;'>Answer6</p><div id='Juna_IT_Poll_Set_Color_6'style='float: right;background-color:#49ff78;display: inline-block;height: 40px; width: 32px;'></div></div>
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div7' style='display:none;border: 1px solid #10ffff;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_7' style='float: left;margin: 5px;'>Answer7</p><div id='Juna_IT_Poll_Set_Color_7'style='float: right;background-color:#10ffff;display: inline-block;height: 40px; width: 32px;'></div></div>
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div8' style='display:none;border: 1px solid #ffa448;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_8' style='float: left;margin: 5px;'>Answer8</p><div id='Juna_IT_Poll_Set_Color_8'style='float: right;background-color:#ffa448;display: inline-block;height: 40px; width: 32px;'></div></div>
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div9' style='display:none;border: 1px solid #ffff80;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_9' style='float: left;margin: 5px;'>Answer9</p><div id='Juna_IT_Poll_Set_Color_9'style='float: right;background-color:#ffff80;display: inline-block;height: 40px; width: 32px;'></div></div>
			<div class='Juna_IT_Poll_Answer_Div_P Juna_IT_Poll_Answer_Div' id='Juna_IT_Poll_PT4_Div10' style='display:none;border: 1px solid #ff4242;height: 40px;margin-top:10px;'><p class='Juna_IT_Poll_Answer_Div_P' id='Juna_IT_Poll_PT4_Answer_10' style='float: left;margin: 5px;'>Answer10</p><div id='Juna_IT_Poll_Set_Color_10'style='float: right;background-color:#ff4242;display: inline-block;height: 40px; width: 32px;'></div></div>
		</div>

		<fieldset id="Juna_IT_Poll_Select_Poll_Type" class="Juna_IT_Poll_Select_Poll_Type">
			<legend><i>Poll Type</i> </legend>
			<fieldset class="Juna_IT_Poll_Image_Class1" onclick="Juna_IT_Poll_Image_Fieldset(1)">
				<legend class="Juna_IT_Poll_Image_Legend_Class1"><i>Standart Poll</i></legend>
				<img src="http://juna-it.com/image/standart.png" class='Juna_IT_Poll_Image' >
			</fieldset>
			<fieldset class="Juna_IT_Poll_Image_Class2" onclick="Juna_IT_Poll_Image_Fieldset(2)">
				<legend class="Juna_IT_Poll_Image_Legend_Class2"><i>Pie Chart</i></legend>
				<img src="http://juna-it.com/image/pie.png" class  = 'Juna_IT_Poll_Image'>
			</fieldset>
			<fieldset class="Juna_IT_Poll_Image_Class3" onclick="Juna_IT_Poll_Image_Fieldset(3)">
				<legend class="Juna_IT_Poll_Image_Legend_Class3"><i>Image/Video</i></legend>
				<img src="http://juna-it.com/image/image_video.png" class  = 'Juna_IT_Poll_Image'>
			</fieldset>
			<fieldset class="Juna_IT_Poll_Image_Class4" onclick="Juna_IT_Poll_Image_Fieldset(4)">
				<legend class="Juna_IT_Poll_Image_Legend_Class4"><i>Column Chart</i></legend>
				<img src="http://juna-it.com/image/column.png" class  = 'Juna_IT_Poll_Image'>
			</fieldset>
		</fieldset>

		<input type="hidden" id="hidden_video_src_1">	<div style = 'display:none' class ="hidden_video_src_1"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_1" name="Juna_IT_Poll_Upload_Image_1">
		<input type="hidden" id="hidden_video_src_2">	<div style = 'display:none' class ="hidden_video_src_2"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_2" name="Juna_IT_Poll_Upload_Image_2">
		<input type="hidden" id="hidden_video_src_3">	<div style = 'display:none' class ="hidden_video_src_3"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_3" name="Juna_IT_Poll_Upload_Image_3">
		<input type="hidden" id="hidden_video_src_4">	<div style = 'display:none' class ="hidden_video_src_4"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_4" name="Juna_IT_Poll_Upload_Image_4">
		<input type="hidden" id="hidden_video_src_5">	<div style = 'display:none' class ="hidden_video_src_5"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_5" name="Juna_IT_Poll_Upload_Image_5">
		<input type="hidden" id="hidden_video_src_6">	<div style = 'display:none' class ="hidden_video_src_6"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_6" name="Juna_IT_Poll_Upload_Image_6">
		<input type="hidden" id="hidden_video_src_7">	<div style = 'display:none' class ="hidden_video_src_7"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_7" name="Juna_IT_Poll_Upload_Image_7">
		<input type="hidden" id="hidden_video_src_8">	<div style = 'display:none' class ="hidden_video_src_8"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_8" name="Juna_IT_Poll_Upload_Image_8">
		<input type="hidden" id="hidden_video_src_9">	<div style = 'display:none' class ="hidden_video_src_9"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_9" name="Juna_IT_Poll_Upload_Image_9">
		<input type="hidden" id="hidden_video_src_10">	<div style = 'display:none' class ="hidden_video_src_10"></div>	<input type="hidden" id="Juna_IT_Poll_Upload_Image_10" name="Juna_IT_Poll_Upload_Image_10">


		<fieldset id="Juna_IT_Poll_Question_Style_Field" class="Juna_IT_Poll_Question_Style_Field">
			<legend><i>Question Style</i></legend>
			<table class="Juna_IT_Poll_Style_Table">
				<tr>
					<td>Font Family:</td>
					<td>
						<select name="Juna_IT_Poll_Question_Font_Family" id="Juna_IT_Poll_Question_Font_Family" onchange="Juna_IT_Poll_Change_Font('Question')">
						 	<?php for($i=0;$i<count($Juna_IT_Poll_Font_Family);$i++){?>
						 		<option value="<?php echo $Juna_IT_Poll_Font_Family[$i]->Font_family; ?>"><?php echo $Juna_IT_Poll_Font_Family[$i]->Font_family; ?></option>
						 	<?php } ?>
					 	</select>
					</td>
				</tr>
				<tr>
					<td>Font Size:</td>
					<td><input type="range"  id="Juna_IT_Poll_Question_Font_Size_Range"  onchange="Juna_IT_Poll_Change_Size('Question','false')" min='0' max='100' value="14" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Question_Font_Size_Number" onchange="Juna_IT_Poll_Change_Size('Question','true')"  min='0' max='100' value="14" name="Juna_IT_Poll_Question_Font_Size" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
				</tr>
				<tr>
					<td>Background Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Question_Bg_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Question_Bg','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Question_Bg_Color"  class="Juna_IT_Poll_Input_Color"      value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Question_Bg','false')" name="Juna_IT_Poll_Input_Bg_Color"></td>
				</tr>
				<tr>
					<td>Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Question_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#000000" onchange="Juna_IT_Poll_Change_Color('Question_Color','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Question_Color"  class="Juna_IT_Poll_Input_Color"      value="#000000" onchange="Juna_IT_Poll_Change_Color('Question_Color','false')" name="Juna_IT_Poll_Input_Color"></td>
				</tr>
				<tr>
					<td>Border Style:</td>
					<td>
						<select id="Juna_IT_Poll_Question_Border_Style" onchange="Juna_IT_Poll_Change_Font('Border_Style')">
				 			<option value='none' selected="select">     None                       </option>
				 			<option value='dotted'>                     Dotted                     </option>
				 			<option value='dashed'>                     Dashed                     </option>
				 			<option value='solid'>                      Solid                      </option>
				 			<option value='double'>                     Double                     </option>
				 			<option value='groove'>                     Groove                     </option>
				 			<option value='ridge'>                      Ridge                      </option>
				 			<option value='inset'>                      Inset                      </option>
				 			<option value='outset'>                     Outset                     </option>
				 			<option value='dotted solid'>               Dotted Solid               </option>
				 			<option value="dotted solid double dashed"> Dotted solid double dashed </option>
				 		</select>
					</td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Border Width:</td>
					<td><input type="range"  id="Juna_IT_Poll_Question_Border_Width_Range"  onchange="Juna_IT_Poll_Change_Size('Border_Width','false')" min='0' max='100' value="0" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Question_Border_Width_Number" onchange="Juna_IT_Poll_Change_Size('Border_Width','true')"  min='0' max='100' value="0" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>				
				</tr>
				<tr>
					<td>Border Radius:</td>
					<td><input type="range"  id="Juna_IT_Poll_Question_Border_Radius_Range"  onchange="Juna_IT_Poll_Change_Size('Border_Radius','false')" min='0' max='150' value="0" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Question_Border_Radius_Number" onchange="Juna_IT_Poll_Change_Size('Border_Radius','true')"  min='0' max='150' value="0" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>				
				</tr>
				<tr>
					<td>Border Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Question_Border_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#000000" onchange="Juna_IT_Poll_Change_Color('Border_Color','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Question_Border_Color"  class="Juna_IT_Poll_Input_Color"      value="#000000" onchange="Juna_IT_Poll_Change_Color('Border_Color','false')" ></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
			</table>			
		</fieldset>		

		<fieldset id='Juna_IT_Poll_Add_Answers_Field' class="Juna_IT_Poll_Add_Answers_Field">	
			<legend><i>Answers</i></legend> <input type="hidden" id="Juna_IT_Poll_Hidden_Value" name="Juna_IT_Poll_Answers_Count" value="2">
			<table class="Juna_IT_Poll_Style_Table" id="Juna_IT_Poll_Add_Answer_Table">
				<tr class="Juna_IT_Poll_Answer_1">
					<td class="Juna_IT_Poll_Answer_1">Answer 1:</td>
					<td><input type="text" class="Juna_IT_Poll_Answers_Input" id="Juna_IT_Poll_Answers_Input_1" name="Juna_IT_Poll_Answers_Input_1" onclick="Juna_IT_Poll_Add_Answer(1)"></td>
				</tr>
				<tr class="Juna_IT_Poll_Answer_2">
					<td class="Juna_IT_Poll_Answer_2">Answer 2:</td>
					<td><input type="text" class="Juna_IT_Poll_Answers_Input" id="Juna_IT_Poll_Answers_Input_2" name="Juna_IT_Poll_Answers_Input_2" onclick="Juna_IT_Poll_Add_Answer(2)"></td>
				</tr>				
			</table>
			<table class="Juna_IT_Poll_Style_Table" id="Juna_IT_Poll_Add_Answer_Bg_Color_Table">
				<tr class="Juna_IT_Poll_Answer_1">
					<td class="Juna_IT_Poll_Answer_1">Background 1:</td>
					<td><input type="text"  id="Juna_IT_Poll_Add_Answer_Bg_Text1"   class="Juna_IT_Poll_Input_Text_Color" value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Add_Answer_Bg1','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Add_Answer_Bg_Color1"  class="Juna_IT_Poll_Input_Color"      value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Add_Answer_Bg1','false')" name="Juna_IT_Poll_Input_Add_Answer_Bg1"></td>
				</tr>
				<tr class="Juna_IT_Poll_Answer_2">
					<td class="Juna_IT_Poll_Answer_2">Background 2:</td>
					<td><input type="text"  id="Juna_IT_Poll_Add_Answer_Bg_Text2"   class="Juna_IT_Poll_Input_Text_Color" value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Add_Answer_Bg2','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Add_Answer_Bg_Color2"  class="Juna_IT_Poll_Input_Color"      value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Add_Answer_Bg2','false')" name="Juna_IT_Poll_Input_Add_Answer_Bg2"></td>
				</tr>				
			</table>
			<table class="Juna_IT_Poll_Style_Table" id="Juna_IT_Poll_Add_Answer_File_Table">
				<tr class="Juna_IT_Poll_Answer_1">
					<td class="Juna_IT_Poll_Answer_1">Include File 1:</td>
					<td>
						<div id="wp-content-media-buttons" class="wp-media-buttons" >
													
							<a href="#" class="button insert-media add_media" data-editor="hidden_video_src_1" title="Add Media" id = "Juna_IT_Poll_Upload_1"  >
								<span class="wp-media-buttons-icon"></span> Add Media File
							</a>
						</div>
					</td>
				</tr>
				<tr class="Juna_IT_Poll_Answer_2">
					<td class="Juna_IT_Poll_Answer_2">Include File 2:</td>
					<td>
						<div id="wp-content-media-buttons" class="wp-media-buttons" >
													
							<a href="#" class="button insert-media add_media" data-editor="hidden_video_src_2" title="Add Media" id = "Juna_IT_Poll_Upload_2"  >
								<span class="wp-media-buttons-icon"></span> Add Media File
							</a>
						</div>
					</td>
				</tr>				
			</table> <br>			
			<table class="Juna_IT_Poll_Add_Remove_Button_Table">
				<tr>
					<td>
						<input type="button" id="Juna_IT_Poll_Add_Answer_Button"    value="Add Answer"    onclick="Juna_IT_Poll_Add_Answer_Button_Click()">
						<input type="button" id="Juna_IT_Poll_Remove_Answer_Button" value="Remove Answer" onclick="Juna_IT_Poll_Remove_Answer_Button_Click()">
					</td>
				</tr>
			</table>		 	
		</fieldset>

		<fieldset id="Juna_IT_Poll_Answers_Style_Field" class="Juna_IT_Poll_Answers_Style_Field">
			<legend><i>Answers Style</i></legend>
			<table class="Juna_IT_Poll_Style_Table">
				<tr>
					<td>Font Family:</td>
					<td>
						<select name="Juna_IT_Poll_Answer_Font_Family" id="Juna_IT_Poll_Answer_Font_Family" onchange="Juna_IT_Poll_Change_Font('Answer')">
						 	<?php for($i=0;$i<count($Juna_IT_Poll_Font_Family);$i++){?>
						 		<option value="<?php echo $Juna_IT_Poll_Font_Family[$i]->Font_family; ?>"><?php echo $Juna_IT_Poll_Font_Family[$i]->Font_family; ?></option>
						 	<?php } ?>
					 	</select>
					</td>
				</tr>
				<tr>
					<td>Font Size:</td>
					<td><input type="range"  id="Juna_IT_Poll_Answer_Font_Size_Range"  onchange="Juna_IT_Poll_Change_Size('Answer','false')" min='0' max='100' value="14" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Answer_Font_Size_Number" onchange="Juna_IT_Poll_Change_Size('Answer','true')"  min='0' max='100' value="14" name="Juna_IT_Poll_Answer_Font_Size" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
				</tr>
				<tr>
					<td>Background Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Answer_Bg_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Answer_Bg','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Answer_Bg_Color"  class="Juna_IT_Poll_Input_Color"      value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Answer_Bg','false')" name="Juna_IT_Poll_Input_Answer_Bg_Color"></td>
				</tr>
				<tr>
					<td>Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Answer_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#000000" onchange="Juna_IT_Poll_Change_Color('Answer_Color','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Answer_Color"  class="Juna_IT_Poll_Input_Color"      value="#000000" onchange="Juna_IT_Poll_Change_Color('Answer_Color','false')" name="Juna_IT_Poll_Input_Answer_Color"></td>
				</tr>				
				<tr>
					<td>Place Between Answers:</td>
					<td><input type="range"  id="Juna_IT_Poll_Between_Answer_Range"  onchange="Juna_IT_Poll_Change_Size('Between_Answer','false')" min='0' max='100' value="0" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Between_Answer_Number" onchange="Juna_IT_Poll_Change_Size('Between_Answer','true')"  min='0' max='100' value="0" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
			</table>
			<table class="Juna_IT_Poll_Style_Table" id="Juna_IT_Poll_Border_Table">
				<tr>
					<td>Border Style:</td>
					<td>
						<select id="Juna_IT_Poll_Answer_Border_Style" onchange="Juna_IT_Poll_Change_Font('Border_Style_Answer')">
				 			<option value='none' selected="select">     None                       </option>
				 			<option value='dotted'>                     Dotted                     </option>
				 			<option value='dashed'>                     Dashed                     </option>
				 			<option value='solid'>                      Solid                      </option>
				 			<option value='double'>                     Double                     </option>
				 			<option value='groove'>                     Groove                     </option>
				 			<option value='ridge'>                      Ridge                      </option>
				 			<option value='inset'>                      Inset                      </option>
				 			<option value='outset'>                     Outset                     </option>
				 			<option value='dotted solid'>               Dotted Solid               </option>
				 			<option value="dotted solid double dashed"> Dotted solid double dashed </option>
				 		</select>
					</td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Border Width:</td>
					<td><input type="range"  id="Juna_IT_Poll_Answer_Border_Width_Range"  onchange="Juna_IT_Poll_Change_Size('Border_Width_Answer','false')" min='0' max='100' value="0" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Answer_Border_Width_Number" onchange="Juna_IT_Poll_Change_Size('Border_Width_Answer','true')"  min='0' max='100' value="0" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Border Radius:</td>
					<td><input type="range"  id="Juna_IT_Poll_Answer_Border_Radius_Range"  onchange="Juna_IT_Poll_Change_Size('Border_Radius_Answer','false')" min='0' max='100' value="0" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Answer_Border_Radius_Number" onchange="Juna_IT_Poll_Change_Size('Border_Radius_Answer','true')"  min='0' max='100' value="0" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Border Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Answer_Border_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#000000" onchange="Juna_IT_Poll_Change_Color('Border_Color_Answer','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Answer_Border_Color"  class="Juna_IT_Poll_Input_Color"      value="#000000" onchange="Juna_IT_Poll_Change_Color('Border_Color_Answer','false')"></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
			</table>
			<table class="Juna_IT_Poll_Style_Table" id="Juna_IT_Poll_Image_Style_Table">
				<tr>
					<td>Image's width:</td>
					<td><input type="range"  id="Juna_IT_Poll_Image_Width_Range"  onchange="Juna_IT_Poll_Change_Size('Image_Width','false')" min='0' max='500' value="90" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Image_Width_Number" onchange="Juna_IT_Poll_Change_Size('Image_Width','true')"  min='0' max='500' value="90" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
				</tr>
				<tr>
					<td>Image's Height:</td>
					<td><input type="range"  id="Juna_IT_Poll_Image_Height_Range"  onchange="Juna_IT_Poll_Change_Size('Image_Height','false')" min='0' max='500' value="66" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Image_Height_Number" onchange="Juna_IT_Poll_Change_Size('Image_Height','true')"  min='0' max='500' value="66" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
				</tr>
				<tr>
					<td>Image's Border Width:</td>
					<td><input type="range"  id="Juna_IT_Poll_Image_Border_Width_Range"  onchange="Juna_IT_Poll_Change_Size('Image_Border_Width','false')" min='0' max='100' value="1" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Image_Border_Width_Number" onchange="Juna_IT_Poll_Change_Size('Image_Border_Width','true')"  min='0' max='100' value="1" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
				</tr>
				<tr>
					<td>Image's Border Radius:</td>
					<td><input type="range"  id="Juna_IT_Poll_Image_Border_Radius_Range"  onchange="Juna_IT_Poll_Change_Size('Image_Border_Radius','false')" min='0' max='150' value="0" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Image_Border_Radius_Number" onchange="Juna_IT_Poll_Change_Size('Image_Border_Radius','true')"  min='0' max='150' value="0" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
				</tr>
				<tr>
					<td>Div's Border Radius:</td>
					<td><input type="range"  id="Juna_IT_Poll_Div_Border_Radius_Range"  onchange="Juna_IT_Poll_Change_Size('Div_Border_Radius','false')" min='0' max='200' value="0" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Div_Border_Radius_Number" onchange="Juna_IT_Poll_Change_Size('Div_Border_Radius','true')"  min='0' max='200' value="0" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
				</tr>
				<tr>
					<td>Image's Border Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Image_Border_Color_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#0073aa" onchange="Juna_IT_Poll_Change_Color('Image_Border_Color','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Image_Border_Color_Color"  class="Juna_IT_Poll_Input_Color"      value="#0073aa" onchange="Juna_IT_Poll_Change_Color('Image_Border_Color','false')"></td>
				</tr>
				<tr>
					<td>Image's Border Style:</td>
					<td>
						<select id="Juna_IT_Poll_Image_Border_Style" onchange="Juna_IT_Poll_Change_Font('Border_Style_Image')">
				 			<option value='none'>                       None                       </option>
				 			<option value='dotted'>                     Dotted                     </option>
				 			<option value='dashed'>                     Dashed                     </option>
				 			<option value='solid' selected="select">    Solid                      </option>
				 			<option value='double'>                     Double                     </option>
				 			<option value='groove'>                     Groove                     </option>
				 			<option value='ridge'>                      Ridge                      </option>
				 			<option value='inset'>                      Inset                      </option>
				 			<option value='outset'>                     Outset                     </option>
				 			<option value='dotted solid'>               Dotted Solid               </option>
				 			<option value="dotted solid double dashed"> Dotted solid double dashed </option>
				 		</select>
					</td>
				</tr>	
			</table>		
		</fieldset>
					
		<fieldset id='Juna_IT_Poll_Widget_Style_Field' class="Juna_IT_Poll_Widget_Style_Field">
			<legend><i> Widget Style</i> </legend>
			<table class="Juna_IT_Poll_Style_Table">
				<tr>
					<td>Width:</td>
					<td><input type="range"  id="Juna_IT_Poll_Widget_Width_Range"  onchange="Juna_IT_Poll_Change_Size('Widget_Width','false')" min='200' max='1000' value="250" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Widget_Width_Number" onchange="Juna_IT_Poll_Change_Size('Widget_Width','true')"  min='200' max='1000' value="250" name="Juna_IT_Poll_Widget_Width" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
				</tr>				
				<tr>
					<td>Background Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Background_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Background','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Background_Color"  class="Juna_IT_Poll_Input_Color"      value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Background','false')" name="Juna_IT_Poll_Input_Background_Color"></td>
				</tr>
				<tr>
					<td>Border Width:</td>
					<td><input type="range"  id="Juna_IT_Poll_Widget_Border_Width_Range"  onchange="Juna_IT_Poll_Change_Size('Widget_Border_Width','false')" min='0' max='100' value="1" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Widget_Border_Width_Number" onchange="Juna_IT_Poll_Change_Size('Widget_Border_Width','true')"  min='0' max='100' value="1" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Border Radius:</td>
					<td><input type="range"  id="Juna_IT_Poll_Widget_Border_Radius_Range"  onchange="Juna_IT_Poll_Change_Size('Widget_Border_Radius','false')" min='0' max='150' value="6" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Widget_Border_Radius_Number" onchange="Juna_IT_Poll_Change_Size('Widget_Border_Radius','true')"  min='0' max='150' value="6" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Border Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Border_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#0073aa" onchange="Juna_IT_Poll_Change_Color('Widget_Border_Color','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Border_Color"  class="Juna_IT_Poll_Input_Color"      value="#0073aa" onchange="Juna_IT_Poll_Change_Color('Widget_Border_Color','false')" name="Juna_IT_Poll_Input_Border_Color"></td>
				</tr>
				<tr>
					<td>Border Style:</td>
					<td>
						<select id="Juna_IT_Poll_Widget_Border_Style" onchange="Juna_IT_Poll_Change_Font('Border_Style_Widget')">
				 			<option value='none'>                       None                       </option>
				 			<option value='dotted'>                     Dotted                     </option>
				 			<option value='dashed'>                     Dashed                     </option>
				 			<option value='solid' selected="select">    Solid                      </option>
				 			<option value='double'>                     Double                     </option>
				 			<option value='groove'>                     Groove                     </option>
				 			<option value='ridge'>                      Ridge                      </option>
				 			<option value='inset'>                      Inset                      </option>
				 			<option value='outset'>                     Outset                     </option>
				 			<option value='dotted solid'>               Dotted Solid               </option>
				 			<option value="dotted solid double dashed"> Dotted solid double dashed </option>
				 		</select>
					</td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>					
			</table>
			<table class="Juna_IT_Poll_Style_Table" id="Juna_IT_Poll_Vote_Type_Table">
				<tr>
					<td> </td>
					<td><input type="radio" class="Juna_IT_Poll_Votes_Type_Radio" name="Juna_IT_Poll_Votes_Type_Radio" value="percent" checked>By Percents</td>
					<td></td>
				</tr>
				<tr>
					<td>Vote's type:</td>
					<td><input type="radio" class="Juna_IT_Poll_Votes_Type_Radio" name="Juna_IT_Poll_Votes_Type_Radio" value="vote">By Votes Count</td>
				</tr>
				<tr>
					<td> </td>
					<td><input type="radio" class="Juna_IT_Poll_Votes_Type_Radio" name="Juna_IT_Poll_Votes_Type_Radio" value="both">Both</td>
				</tr>
				<tr>
					<td>Vote's Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Vote_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#000000" onchange="Juna_IT_Poll_Change_Color('Vote_Color','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Vote_Color"  class="Juna_IT_Poll_Input_Color"      value="#000000" onchange="Juna_IT_Poll_Change_Color('Vote_Color','false')" name="Juna_IT_Poll_Input_Vote_Color"></td>
				</tr>
			</table>
			<table class="Juna_IT_Poll_Style_Table" id="Juna_IT_Poll_Vote_Button_Table">
				<tr>
					<td>Vote Button Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Vote_Button_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#000000" onchange="Juna_IT_Poll_Change_Color('Vote_Button_Color','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Vote_Button_Color"  class="Juna_IT_Poll_Input_Color"      value="#000000" onchange="Juna_IT_Poll_Change_Color('Vote_Button_Color','false')" name="Juna_IT_Poll_Input_Vote_Button_Color"></td>
				</tr>
				<tr>
					<td>Button Text Color:</td>
					<td><input type="text"  id="Juna_IT_Poll_Vote_Button_Color_Text"   class="Juna_IT_Poll_Input_Text_Color" value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Vote_Button_Color_Color','true')"></td>
					<td><input type="color" id="Juna_IT_Poll_Vote_Button_Color_Color"  class="Juna_IT_Poll_Input_Color"      value="#ffffff" onchange="Juna_IT_Poll_Change_Color('Vote_Button_Color_Color','false')" name="Juna_IT_Poll_Input_Vote_Button_Color_Color"></td>
				</tr>
				<tr>
					<td>Button Margin Right:</td>
					<td><input type="range"  id="Juna_IT_Poll_Margin_Right_Range"  onchange="Juna_IT_Poll_Change_Size('Margin_Right','false')" min='0' max='500' value="20" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Margin_Right_Number" onchange="Juna_IT_Poll_Change_Size('Margin_Right','true')"  min='0' max='500' value="20" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Button Width:</td>
					<td><input type="range"  id="Juna_IT_Poll_Button_Width_Range"  onchange="Juna_IT_Poll_Change_Size('Button_Width','false')" min='0' max='200' value="62" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Button_Width_Number" onchange="Juna_IT_Poll_Change_Size('Button_Width','true')"  min='0' max='200' value="62" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Button Border Radius:</td>
					<td><input type="range"  id="Juna_IT_Poll_Button_Border_Radius_Range"  onchange="Juna_IT_Poll_Change_Size('Button_Border_Radius','false')" min='0' max='100' value="10" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Button_Border_Radius_Number" onchange="Juna_IT_Poll_Change_Size('Button_Border_Radius','true')"  min='0' max='100' value="10" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Button Font Family:</td>
					<td>
						<select id="Juna_IT_Poll_Button_Font_Family" onchange="Juna_IT_Poll_Change_Font('Button_Font_Family')">
						 	<?php for($i=0;$i<count($Juna_IT_Poll_Font_Family);$i++){?>
						 		<option value="<?php echo $Juna_IT_Poll_Font_Family[$i]->Font_family; ?>"><?php echo $Juna_IT_Poll_Font_Family[$i]->Font_family; ?></option>
						 	<?php } ?>
					 	</select>
					</td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Button Font Size:</td>
					<td><input type="range"  id="Juna_IT_Poll_Button_Font_Size_Range"  onchange="Juna_IT_Poll_Change_Size('Button_Font_Size','false')" min='0' max='100' value="14" step='1'></td>
					<td><input type="number" id="Juna_IT_Poll_Button_Font_Size_Number" onchange="Juna_IT_Poll_Change_Size('Button_Font_Size','true')"  min='0' max='100' value="14" class="Juna_IT_Poll_Input_Text_Size"/><span class="Juna_IT_Poll_Span_Px">px</span></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
				<tr>
					<td>Button Text:</td>
					<td><input type="text"  id="Juna_IT_Poll_Button_Text"  class="Juna_IT_Poll_Input_Text_Color" value="Vote" onchange="Juna_IT_Poll_Change_Button_Text()"></td>
					<td><span style='color:red; font-size:16px;margin-left:5px;'>*</span></td>
				</tr>
			</table>			
		</fieldset>		
	</form>
</div>
<!-- Stepan -->
<?php
	function delete($sql_question)
	{
		global $wpdb;		

		$table_name  =  $wpdb->prefix . "poll_wp_Questions";
		$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
		$table_name3 =  $wpdb->prefix . "poll_wp_Results";	
		$table_name4 =  $wpdb->prefix . "poll_wp_Settings";
		$table_name5 =  $wpdb->prefix . "poll_wp_position";
		$table_name6 =  $wpdb->prefix . "poll_wp_font_family";
		$table_name7 =  $wpdb->prefix . "poll_wp_Parameters";		

		$count=$wpdb->get_var($wpdb->prepare("SELECT count(*) FROM $table_name WHERE Juna_IT_Poll_Add_Question_Field= %s", $sql_question));
		$id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Juna_IT_Poll_Add_Question_Field= %s limit 1",$sql_question));

		if($count!=0)
		{
			$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id= %d", $id));
			$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Juna_IT_Poll_Add_Question_FieldID= %d", $id));

			for($i=0;$i<count($results);$i++)
			{		
				$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE id= %d", $results[$i]->id));
			}

			$set_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name4 WHERE Juna_IT_Poll_Add_Question_FieldID= %d", $id));

			$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE id= %d",$set_id));
			$wpdb->query($wpdb->prepare("DELETE FROM $table_name7 WHERE id= %d",$set_id));

			$result_s=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Juna_IT_Poll_Add_Question_FieldID= %d",$id));

			for($i=0;$i<count($result_s);$i++)
			{		
				$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE id= %d", $result_s[$i]->id));				
			}
		}
		else 
		{
			return;
		}
	}
?>