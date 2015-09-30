<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>


 <style>
	.it_example_parent{
		width:350px;
		height:95px;
		border: 1px solid #0073aa !important;
		margin:2px;
		border-radius:5px;
	}
	.it_example{
		width:350px;
		height:90px;
		float:left;
	}
	#right_1{
		width:100px;
		height:280px;
		float:right;
		margin-top: -290px;
	}
	.it_example_select{
		display:block;
		margin-top:38px !important;
		
	}
	.for_radio_button{
		width:90px;
		height:95px;
	}
	.select_position_type{
		display:block;
		float:right;
		margin:38px 25px 0 0;
		text-align: left;

	}
	#position_procent{
		width:30px;
		float:right;
		height:20px;
		margin:-18px -6px 0 30px;
	}
	 </style>

<div id = 'page_edit_shortcode'>

	
	<fieldset id="shortcode_section"  style="position: absolute; top: 70px; left: 50px; width:300px; height:170px; padding:10px; box-shadow: 2px -2px 1px 1px #ddd; border: 1px solid #0073aa;border-radius:6px; background-color: white;  ">
 		<legend style="color: #B0AFAF;font-size:16px;color:#0073aa;"><i>Shortcode</i></legend>
 		<p style="font-size:14px; color:#0073aa; " id="copy">Copy & paste the shortcode directly into any WordPress post or page.</p>
 		<input type="text" style="font-size:14px;border-radius:2px;" id="shortcode_id" readonly value='[Juna_IT_Poll id="1"]'>
 		<select id="shortcode_select" onchange="myF()" style="margin-top:15px;border-radius:3px;">
			<option value="Do You Like Our plugin?">Do You Like Our plugin?</option> 			
 		</select>
 	</fieldset>
 		
	
	<fieldset   style="position: relative; margin-top:70x; margin-left: 450px; width:500px;height:395px; padding:10px; box-shadow: 2px -2px 1px 1px #ddd; border: 1px solid #0073aa;border-radius:6px; background-color: white;">
		<legend style="color: #B0AFAF;font-size:16px;color:#0073aa;"><i>Widget Position</i></legend>
		<div  style="width:350px; margin:0">
			<div class = 'it_example_parent'>
				<div class = 'it_example'>
					<div style = 'float:left;width:47px;height:38px;border:1px dotted gray;margin:10px 0 0 10px;padding-top:12px; padding-left:3px'>Widget</div>
					<p style = 'margin-top:15px;margin-left:70px;'>WordPress Plugin is an instrument for understanding visitor 's opinions. </p>
				</div>
				
			</div>
			<div class = 'it_example_parent'>
				<div class = 'it_example'>
					<div style = 'float:right;width:47px;height:38px;border:1px dotted gray;margin:10px 10px 0 10px; padding-top:12px; padding-left:3px'>Widget</div>
					<p style = 'margin: 15px 0 0 10px;'>WordPress Plugin is an instrument for understanding visitor 's opinions. </p>
				</div >
				
			</div>
			<div class = 'it_example_parent'>
				<div class = 'it_example'>
					<div style = 'width:47px;height:38px;border:1px dotted gray;margin: 10px 0 0 150px; padding-top:12px; padding-left:3px'>Widget</div>
					<p style = 'margin: -4px 0 0 10px;'>WordPress Plugin is an instrument for understanding visitor 's opinions. </p>
				</div >
				
			</div>
		</div>
		<div id = 'right_1'>
			<form  method = 'post' action = ''>
				<div class = 'for_radio_button'>
					<input type = 'checkbox' value = 'float:left' id = 'it_example_select' class = 'it_example_select' name ='it_example_select' > <span class  = 'select_position_type'>Left</span>
				</div>
				<div class = 'for_radio_button'>
					<input type = 'checkbox' class = 'it_example_select' id = 'it_example_select1' value = 'float:right' name ='it_example_select'> <span class  = 'select_position_type'>Right</span>
				</div><div class = 'for_radio_button'>
					<input type = 'checkbox' class = 'it_example_select' id = 'it_example_select2'  name ='it_example_select'> <span class  = 'select_position_type'>Center</span><input type = 'text' id = 'position_procent'><span style ="display:block;margin:-17px 0 0 97px;">%</span>
				</div>
				
				
				
		</div>

			<div style = 'width:100%;height:80px;'>
				<input type="button" id="Save_poll_position" name = 'Save_poll_position' onclick="Save_poll_position_clicked()" style="margin: 30px 20px 0 0; float: right; width:130px; border-radius: 10px; color: white; text-align: center; background-color: #0073aa;" value="Save Selection" ><br>
			</div>
				<span style="color:red; font-size:14px; float:right; margin-top:-10px;" id='Save_poll_position_span'></span>

		</form>
	</fieldset>

</div>