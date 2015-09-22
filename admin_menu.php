<?php

	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}

?>
	<form method="post" id="AdminForm" enctype="multipart/form-data" onsubmit="if(Validate()==false) return false;" >
		<div id = 'display_media_button'  >
			<span id = 'close_display_media_button' ></span>
			<h2 id = 'h2_1'>Вставить медиафайл</h2>
				<div  class = 'border_bottom_none' id = 'select-file-pc' >
					Загрузить файлы
				</div>
				<div  class = 'border_bottom' id ='select-file-library'>
					Библиотека файлов
				</div>
				<div  id= 'display_for_selected_file'>
					<input type="file"   id="upload11" name = 'upload11' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type="file"   id="upload21" name = 'upload21' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type="file"   id="upload31" name = 'upload31' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type="file"   id="upload41" name = 'upload41' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type="file"   id="upload51" name = 'upload51' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type="file"   id="upload61" name = 'upload61' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type="file"   id="upload71" name = 'upload71' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type="file"   id="upload81" name = 'upload81' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type="file"   id="upload91" name = 'upload91' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type="file"   id="upload101" name = 'upload101' value = '' style = 'display:none;' accept=".jpg,.png,.gif,.WMV,.FLV,.MP4,.3gp,.AVI"/>
					<input type = 'text'  id = 'alt_file_pc'  placeholder ='Добавить атрибут alt'>

					<input type="hidden"   id="upload41"  value = '' />
					<input type="hidden"   id="upload41"  value = '' />
					<div  id = 'select_file_library'>
						<?php 
							global $wpdb;


							$table_name2 =  $wpdb->prefix . "poll_wp_Answers";

							$hoplo=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d",0));

							for($i=0;$i<count($hoplo);$i++)
							{
								if(strlen($hoplo[$i]->File)>0)
								{
									echo '<img src="' .esc_url( wp_upload_dir()['baseurl']) .'/' . $hoplo[$i]->File .'" class = "image_select_file_library" >';
								}
							}
							
						?>
					</div>
					<input type = 'button' id = 'confirm_selection' value = 'Save'  name = 'confirm_selection'  >
				</div>
		</div>

	<img style="float:left;" src='http://juna-it.com/image/icon.png'><p style="font-size:20px; width:200px; margin-left:50px;"><b>Add Poll</b></p><a href="http://juna-it.com/index.php/features/elements/juna-it-plugin/" target="_blank"><img src="http://juna-it.com/wp-content/uploads/2015/07/juna-logo.png" style="float:right; width:150px;height:70px; margin-top:-70px;"><p style="float:right; margin-right:25px;margin-top:2px; font-size:14px;"><b>Get Pro Version</b></p></a>
	
	<fieldset style="position:relative; margin-bottom:15px;background-color: white;border-radius: 6px;width: 675px; height: 190px;box-shadow: 2px -2px 1px 1px #ddd;border: 1px solid #0073aa;">

 		<legend id="spt"style='margin-left: 10px;color: #B0AFAF; font-size:16px;margin-left:10px;color:#0073aa;'><i> Select Plugin Type </i></legend> <input type="text"  id="img_id" name="img_name" style="display:none;" value="1"/> <br><br>
 		<img id="img1" style="width:130px; margin-left:10px; height:130px; " src="http://juna-it.com/image/poll-1.png" onclick="SelectType('img1')" >
 		<img id="img2" style="width:120px; margin-left:10px; height:120px; " src="http://juna-it.com/image/poll-2.png" onclick="SelectType('img2')" >
 		<img id="img3" style="width:120px; margin-left:10px; height:120px; " src="http://juna-it.com/image/poll-3.png" onclick="SelectType('img3')" >
 		<img id="img4" style="width:120px; margin-left:10px; height:120px; " src="http://juna-it.com/image/poll-4.png" onclick="SelectType('img4')" >

 	</fieldset>
 	<fieldset id="shortcode_section"  style="position: absolute; top: 70px;margin-left: 695px; width:300px; height:170px; padding:10px; box-shadow: 2px -2px 1px 1px #ddd; border: 1px solid #0073aa;border-radius:6px; background-color: white; padding: 10px; ">
 		<legend style="color: #B0AFAF;font-size:16px; color:#0073aa;"><i>Shortcode</i></legend>
 		<p style="font-size:14px;color:#0073aa;" id="copy">Copy & paste the shortcode directly into any WordPress post or page.</p>
 		<input type="text" style="font-size:14px;border-radius:2px;" id="shortcode_id" readonly value='[Juna_IT_Poll id="1"]'>
 		<select id="shortcode_select" onchange="myF()" style="margin-top:15px;border-radius:3px;">
			<option value="Do You Like Our plugin?">Do You Like Our plugin?</option> 			
 		</select>
 	</fieldset>
 	<fieldset id='question_section' style='background-color: white;border-radius: 6px;box-shadow: 2px -2px 1px 1px #ddd; width: 675px;border-radius:6px;border:1px solid #0073aa;'>
		<legend style="color: #B0AFAF;font-size:16px;margin-left:10px;color:#0073aa;"><i> Question</i> </legend>
		<input type="text" name="question" id="question_id" style="width:500px;margin-left: 10px;border-radius: 4px;margin-top:25px;" onchange="changed_question()" /> <span id="span_question" style="color: red"></span> <br><br><br>
	</fieldset>
	<fieldset id='answers_section' style='width:656px;background-color:white;margin-top: 20px;border-radius:6px;padding: 10px;box-shadow: 2px -2px 1px 1px #ddd;border: 1px solid #0073aa;'>	
		<legend style="color: #B0AFAF;font-size:16px; color:#0073aa;"><i> Answers</i> </legend> <input type="hidden" id="hidden_value" name="AnswersCount" value="2">
		 	
		 <div id="Admin_Menu" style="position:relative; width:658px; margin-bottom: 20px;">
			<div style="display:none; position: absolute; right: 0; top: 0; width: 230px; z-index:0;" id="upload_div">
				<input type="hidden" id="upload111" name = 'upload111' value = '' />
				<input type="hidden" id="upload211" name = 'upload211' value = '' />
				<input type="hidden" id="upload311" name = 'upload311' value = '' />
				<input type="hidden" id="upload411" name = 'upload411' value = '' />
				<input type="hidden" id="upload511" name = 'upload511' value = '' />
				<input type="hidden" id="upload611" name = 'upload611' value = '' />
				<input type="hidden" id="upload711" name = 'upload711' value = '' />
				<input type="hidden" id="upload811" name = 'upload811' value = '' />
				<input type="hidden" id="upload911" name = 'upload911' value = '' />
				<input type="hidden" id="upload1011" name = 'upload1011' value = '' />
				
				<label id="labelUpload1" style="font-size:14px; color:#0073aa;  "> Include File</label> <br>
		 		<input type="button"  id="upload1"  value = 'Add image' /> <br>
		 		
		 		<label id="labelUpload2" style="font-size:14px; color:#0073aa; "> Include File</label> <br>
			 	<input type="button"  id="upload2"  value = 'Add image'/> <br>
			</div> 

			<div style="position: absolute; right: 0; top: 0; width: 230px; z-index:0;" id="colors_div">
		 		<label id="bg_color1" style="font-size:14px; color:#0073aa; "> Choose Background Color</label>  <br>
		 		<input type="text" value="#c0c0c0" name="color1" id="color1" style=" width: 170px; " onchange="ColorPicker('1',false);">
		 		<input type="color" value="#c0c0c0" id="color_div1" style=" height: 23px; padding: 1px 3px;" onchange="ColorPicker('1',true)"> <br> 

		 		<label id="bg_color2"  style="font-size:14px; color:#0073aa; "> Choose Background Color</label> <br>
		 		<input type="text" value="#c0c0c0" name="color2" id="color2" style="width: 170px; " onchange="ColorPicker('2',false);">
		 		<input type="color"  value="#c0c0c0" id="color_div2" style="height: 23px; padding: 1px 3px;" onchange="ColorPicker('2',true)"> <br> 
			</div>

				<label id="labelAnswer1" style="font-size:14px; color:#0073aa; "> Answer 1: </label> <br>
		 		<input type="text" name="answer1" id="answer1" style=" width:400px;border-radius:3px;" onchange='change(1)'/> <span id="span_answer1" style="color: red"></span><br>

			 	<label id="labelAnswer2" style="font-size:14px; color:#0073aa; "> Answer 2: </label> <br>
			 	<input type="text" name="answer2" id="answer2" style=" width:400px;border-radius:3px;" onchange='change(2)'/> <span id="span_answer2" style="color: red"></span><br> 
		 	
	 	</div>

	 	<input type="button" id="add_answer" value="Add Answer" onclick="Add_answer()" style="z-index:1000000; cursor:pointer; float:right; margin-right:20px; width:130px; border-radius: 10px; color: white; background-color: #0073aa;">
	 	<input type="button" id="remove_answer" value="Remove Answer" onclick="Remove_answer()" style="cursor:pointer; display:none; float:right; margin-right:20px; width:130px; border-radius: 10px; color: white; text-align: center; background-color: #0073aa;">
	
	</fieldset>
	<fieldset id='widget_section' style=' background-color:white;box-shadow: 2px -2px 1px 1px #ddd;border: 1px solid #0073aa;border-radius:6px;margin-top: 10px;width: 655px;padding: 10px;'>
		<legend style="color: #B0AFAF;font-size:16px;color:#0073aa;"><i> Widget Style</i> </legend>

	 	<div id="Color_Picker" style="position:relative; margin-top: 25px; width:400px;">
	 		
	 		<label style="font-size:14px;color:#0073aa;">Background Color:  </label> 
	 		<input type="color" value="#ffffff" id="bg_div" style="float:right; height: 23px; padding: 1px 3px;" onchange="ColorPicker('bg',true)">
	 		<input type="text" value="#ffffff" name="bg_color" id="bg_color" style="width: 170px; float:right; margin-right:10px;" onchange="ColorPicker('bg',false)"> <br><br>		
	 		
	 		<label style="font-size:14px;color:#0073aa;">Border Color:  </label>
	 		<input type="color" value="#c0c0c0" id="border_div" style="float:right; height: 23px; padding: 1px 3px;border-radius:3px;" onchange="ColorPicker('border',true)"> 
	 		<input type="text" value="#c0c0c0" name="border_color" id="border_color" style="width: 170px; float:right; margin-right:10px;border-radius:3px;" onchange="ColorPicker('border',false)"><br><br>
	 		
	 		<label style="font-size:14px;color:#0073aa;">Answer Color:   </label> 
	 		<input type="color" value="#c0c0c0" id="answer_div" style="float:right; height: 23px; padding: 1px 3px;border-radius:3px;" onchange="ColorPicker('answer',true)">
	 		<input type="text" value="#c0c0c0" name="answer_color" id="answer_color" style="width: 170px; float:right; margin-right:10px;border-radius:3px;" onchange="ColorPicker('answer',false)"><br><br>
	 		
	 		<label style="font-size:14px;color:#0073aa;">Question Color:  </label>
	 		<input type="color" value="#c0c0c0" id="quest_div" style="float:right; height: 23px; padding: 1px 3px;border-radius:3px;" onchange="ColorPicker('question',true)"> 
	 		<input type="text" value="#c0c0c0" name="Question_color" id="Question_color" style="width: 170px; float:right; margin-right:10px;border-radius:3px;" onchange="ColorPicker('question',false)"><br><br>
	 		 		 
	 		<label style='font-size:14px;color:#0073aa;'>Widget's width: </label> <input type="number" onchange="set('widget')" name="widg_width" id="widg_width" min="250" value='250' style="margin-left:71px; width:80px;border-radius:3px;" /> <span> px </span> <br><br>		 
	 		
	 		<label style='font-size:14px;color:#0073aa;'>Vote's type: </label> <input type="radio" name="votes_type" style="margin-left:50px;" value="percent" checked>By Percents<input type="radio" name="votes_type" style="margin-left:5px;" value="vote">By Votes Count<input type="radio" name="votes_type" style="margin-left:5px;" value="both">Both<br><br>
	 	
	 		<label style="font-size:14px;color:#0073aa;">Vote's Color: </label>
	 		<input type="color" value="#ffffff" id="votes_color" style="float:right; height: 23px; padding: 1px 3px;border-radius:3px;" onchange="ColorPicker('votes_color',true)"> 
	 		<input type="text" value="#ffffff" name="votes_color" id="votes_text_color" style="width: 170px; float:right; margin-right:10px;border-radius:3px;" onchange="ColorPicker('votes_color',false)"> <br><br>
	 	</div>
	 	<div style="position:relative;" id="vote_buttons_div">
	 		<label style="font-size:14px;color:#0073aa;">Vote Button Color:  </label>
	 		<input type="text" value="#000000" name="vote_button_color" id="vote_button_color" style="margin-left:50px; width: 170px; border-radius:3px;" onchange="ColorPicker('vote_button_color',false)">
	 		<input type="color"  id="vote_button_div" style="margin-left:8px; height: 23px; padding: 1px 3px;border-radius:3px;" onchange="ColorPicker('vote_button_color',true)"> <br><br>
	 		
	 		<label style="font-size:14px;color:#0073aa;">Button`s Text Color:  </label>
	 		<input type="text" value="#ffffff" name="buttons_text" id="buttons_text_color" style="margin-left:38px; width: 170px; border-radius:3px;" onchange="ColorPicker('buttons_text_color',false)">
	 		<input type="color" value="#ffffff" id="buttons_text_div" style="margin-left:8px; height: 23px; padding: 1px 3px;border-radius:3px;" onchange="ColorPicker('buttons_text_color',true)"> <br><br>
	 	</div>
	 	<div id="image_div" style=" display:none; position:relative; margin-top: 25px; width:400px;">
	 		<label id="width_image" style='font-size:14px; color:#0073aa; '>Image's width: </label> <input type="number" onchange="set('width')" name="image_width" id="image_width" min='0' value='90' style="margin-left:76px; width:80px;border-radius:3px;" /> <span> px </span> <br><br>
	 		<label id="height_image" style='font-size:14px; color:#0073aa; '>Image's height: </label> <input type="number" onchange="set('height')" name="image_height" id="image_height" min='0' value='66' style="margin-left:72px; width:80px;border-radius:3px;" /> <span> px </span> <br><br>
	 	</div>
	 	<div id="hover_div" style=" display:none; position:relative; margin-top: 25px; width:400px;">
	 		<label id="hoverColor_label" style="font-size:14px;color:#0073aa;">Hover Color: </label> 
			<input id="HoverCheck" type="checkbox"  style="float:right; margin-right:231px; margin-top:3px; opacity:0; height:20px; width:20px; border-radius:3px;" onchange="ActivateHover()">
			<input type="color"  disabled="true" id="colorPickerhover" style="float:right; margin-right: 5px;margin-top:2px; height: 23px; padding: 1px 3px;border-radius:3px; " onchange="ColorPicker('col_pick',true)">
			<input id="selectedHoverColor" disabled="true" type="text" value="#000000" name="selectedHoverColor" style="float:right; border-radius:3px; margin-right:10px; width: 170px; border-radius:3px;" onchange="ColorPicker('col_pick',false)">
	 	</div>
	</fieldset>
 	<fieldset id='font_section' style='box-shadow: 2px -2px 1px 1px #ddd; background-color:white; border:1px solid #0073aa;border-radius:6px;margin-top: 10px;width: 655px;padding: 10px;'>
 		<legend style="color: #B0AFAF;font-size:16px; color:#0073aa;"> <i>Fonts</i> </legend>
	 	<div id="fonts_div" style="position: relative; width: 600px; margin: 0 auto 0 0; ">
		 	<label style='color:#0073aa;'> Select Text Font For Question: </label>
		 	<select name="Text_Font" id="Text_Font" onchange="ChangeFont('false');" style="margin-left:15px">
		 		<option value='Abadi MT Condensed Light'> Abadi MT Condensed Light </option>
				<option value='Aharoni'> Aharoni </option>
				<option value='Aldhabi'> Aldhabi </option>
				<option value='Andalus'> Andalus </option>
				<option value='Angsana New'> Angsana New </option>
				<option value='AngsanaUPC'> AngsanaUPC </option>
				<option value='Aparajita'> Aparajita </option>
				<option value='Arabic Typesetting'> Arabic Typesetting </option>
				<option value='Arial'> Arial </option>
				<option value='Arial Black'> Arial Black </option>
				<option value='Batang'> Batang </option>
				<option value='BatangChe'> BatangChe </option>
				<option value='Browallia New'> Browallia New </option>
				<option value='BrowalliaUPC'> BrowalliaUPC </option>
				<option value='Calibri'> Calibri </option>
				<option value='Calibri Light'> Calibri Light </option>
				<option value='Calisto MT'> Calisto MT </option>
				<option value='Cambria'> Cambria </option>
				<option value='Candara'> Candara </option>
				<option value='Century Gothic'> Century Gothic </option>
				<option value='Comic Sans MS'> Comic Sans MS </option>
				<option value='Consolas'> Consolas </option>
				<option value='Constantia'> Constantia </option>
				<option value='Copperplate Gothic'> Copperplate Gothic </option>
				<option value='Copperplate Gothic Light'> Copperplate Gothic Light </option>
				<option value='Corbel'> Corbel </option>
				<option value='Cordia New'> Cordia New </option>
				<option value='CordiaUPC'> CordiaUPC </option>
				<option value='Courier New'> Courier New </option>
				<option value='DaunPenh'> DaunPenh </option>
				<option value='David'> David </option>
				<option value='DFKai-SB'> DFKai-SB </option>
				<option value='DilleniaUPC'> DilleniaUPC </option>
				<option value='DokChampa'> DokChampa </option>
				<option value='Dotum'> Dotum </option>
				<option value='DotumChe'> DotumChe </option>
				<option value='Ebrima'> Ebrima </option>
				<option value='Estrangelo Edessa'> Estrangelo Edessa </option>
				<option value='EucrosiaUPC'> EucrosiaUPC </option>
				<option value='Euphemia'> Euphemia </option>
				<option value='FangSong'> FangSong </option>
				<option value='Franklin Gothic Medium'> Franklin Gothic Medium </option>
				<option value='FrankRuehl'> FrankRuehl </option>
				<option value='FreesiaUPC'> FreesiaUPC </option>
				<option value='Gabriola'> Gabriola </option>
				<option value='Gadugi'> Gadugi </option>
				<option value='Gautami'> Gautami </option>
				<option value='Georgia'> Georgia </option>
				<option value='Gisha'> Gisha </option>
				<option value='Gulim'> Gulim </option>
				<option value='GulimChe'> GulimChe </option>
				<option value='Gungsuh'> Gungsuh </option>
				<option value='GungsuhChe'> GungsuhChe </option>
				<option value='Impact'> Impact </option>
				<option value='IrisUPC'> IrisUPC </option>
				<option value='Iskoola Pota'> Iskoola Pota </option>
				<option value='JasmineUPC'> JasmineUPC </option>
				<option value='KaiTi'> KaiTi </option>
				<option value='Kalinga'> Kalinga </option>
				<option value='Kartika'> Kartika </option>
				<option value='Khmer UI'> Khmer UI </option>
				<option value='KodchiangUPC'> KodchiangUPC </option>
				<option value='Kokila'> Kokila </option>
				<option value='Lao UI'> Lao UI </option>
				<option value='Latha'> Latha </option>
				<option value='Leelawadee'> Leelawadee </option>
				<option value='Levenim MT'> Levenim MT </option>
				<option value='LilyUPC'> LilyUPC </option>
				<option value='Lucida Console'> Lucida Console </option>
				<option value='Lucida Handwriting Italic'> Lucida Handwriting Italic </option>
				<option value='Lucida Sans Unicode'> Lucida Sans Unicode </option>
				<option value='Malgun Gothic'> Malgun Gothic </option>
				<option value='Mangal'> Mangal </option>
				<option value='Manny ITC'> Manny ITC </option>
				<option value='Marlett'> Marlett </option>
				<option value='Meiryo'> Meiryo </option>
				<option value='Meiryo UI'> Meiryo UI </option>
				<option value='Microsoft Himalaya'> Microsoft Himalaya </option>
				<option value='Microsoft JhengHei'> Microsoft JhengHei </option>
				<option value='Microsoft JhengHei UI'> Microsoft JhengHei UI </option>
				<option value='Microsoft New Tai Lue'> Microsoft New Tai Lue </option>
				<option value='Microsoft PhagsPa'> Microsoft PhagsPa </option>
				<option value='Microsoft Sans Serif'> Microsoft Sans Serif </option>
				<option value='Microsoft Tai Le'> Microsoft Tai Le </option>
				<option value='Microsoft Uighur'> Microsoft Uighur </option>
				<option value='Microsoft YaHei'> Microsoft YaHei </option>
				<option value='Microsoft YaHei UI'> Microsoft YaHei UI </option>
				<option value='Microsoft Yi Baiti'> Microsoft Yi Baiti </option>
				<option value='MingLiU_HKSCS'> MingLiU_HKSCS </option>
				<option value='MingLiU_HKSCS-ExtB'> MingLiU_HKSCS-ExtB </option>
				<option value='Miriam'> Miriam </option>
				<option value='Mongolian Baiti'> Mongolian Baiti </option>
				<option value='MoolBoran'> MoolBoran </option>
				<option value='MS UI Gothic'> MS UI Gothic </option>
				<option value='MV Boli'> MV Boli </option>
				<option value='Myanmar Text'> Myanmar Text </option>
				<option value='Narkisim'> Narkisim </option>
				<option value='Nirmala UI'> Nirmala UI </option>
				<option value='News Gothic MT'> News Gothic MT </option>
				<option value='NSimSun'> NSimSun </option>
				<option value='Nyala'> Nyala </option>
				<option value='Palatino Linotype'> Palatino Linotype </option>
				<option value='Plantagenet Cherokee'> Plantagenet Cherokee </option>
				<option value='Raavi'> Raavi </option>
				<option value='Rod'> Rod </option>
				<option value='Sakkal Majalla'> Sakkal Majalla </option>
				<option value='Segoe Print'> Segoe Print </option>
				<option value='Segoe Script'> Segoe Script </option>
				<option value='Segoe UI Symbol'> Segoe UI Symbol </option>
				<option value='Shonar Bangla'> Shonar Bangla </option>
				<option value='Shruti'> Shruti </option>
				<option value='SimHei'> SimHei </option>
				<option value='SimKai'> SimKai </option>
				<option value='Simplified Arabic'> Simplified Arabic </option>
				<option value='SimSun'> SimSun </option>
				<option value='SimSun-ExtB'> SimSun-ExtB </option>
				<option value='Sylfaen'> Sylfaen </option>
				<option value='Tahoma'> Tahoma </option>
				<option value='Times New Roman'> Times New Roman </option>
				<option value='Traditional Arabic'> Traditional Arabic </option>
				<option value='Trebuchet MS'> Trebuchet MS </option>
				<option value='Tunga'> Tunga </option>
				<option value='Utsaah'> Utsaah </option>
				<option value='Vani'> Vani </option>
				<option value='Vijaya'> Vijaya </option>
		 	</select> <br> 
		 	<label style='color:#0073aa;'> Question's Font-Size: </label> <input type="number" min=12 name="fontSize" id="fontSize" value="14" style="margin-left:69px; width:50px;" onchange="ChangeFont('true');" /> <span> px </span> <br>
		 	
		 	<label style='color:#0073aa;'> Select Text Font For Answers: </label>
		 	<select name="Answer_Font" id="Answer_Font" onchange="ChangeFont('hoplo');" style="margin-left:19px">
		 		<option value='Abadi MT Condensed Light'> Abadi MT Condensed Light </option>
				<option value='Aharoni'> Aharoni </option>
				<option value='Aldhabi'> Aldhabi </option>
				<option value='Andalus'> Andalus </option>
				<option value='Angsana New'> Angsana New </option>
				<option value='AngsanaUPC'> AngsanaUPC </option>
				<option value='Aparajita'> Aparajita </option>
				<option value='Arabic Typesetting'> Arabic Typesetting </option>
				<option value='Arial'> Arial </option>
				<option value='Arial Black'> Arial Black </option>
				<option value='Batang'> Batang </option>
				<option value='BatangChe'> BatangChe </option>
				<option value='Browallia New'> Browallia New </option>
				<option value='BrowalliaUPC'> BrowalliaUPC </option>
				<option value='Calibri'> Calibri </option>
				<option value='Calibri Light'> Calibri Light </option>
				<option value='Calisto MT'> Calisto MT </option>
				<option value='Cambria'> Cambria </option>
				<option value='Candara'> Candara </option>
				<option value='Century Gothic'> Century Gothic </option>
				<option value='Comic Sans MS'> Comic Sans MS </option>
				<option value='Consolas'> Consolas </option>
				<option value='Constantia'> Constantia </option>
				<option value='Copperplate Gothic'> Copperplate Gothic </option>
				<option value='Copperplate Gothic Light'> Copperplate Gothic Light </option>
				<option value='Corbel'> Corbel </option>
				<option value='Cordia New'> Cordia New </option>
				<option value='CordiaUPC'> CordiaUPC </option>
				<option value='Courier New'> Courier New </option>
				<option value='DaunPenh'> DaunPenh </option>
				<option value='David'> David </option>
				<option value='DFKai-SB'> DFKai-SB </option>
				<option value='DilleniaUPC'> DilleniaUPC </option>
				<option value='DokChampa'> DokChampa </option>
				<option value='Dotum'> Dotum </option>
				<option value='DotumChe'> DotumChe </option>
				<option value='Ebrima'> Ebrima </option>
				<option value='Estrangelo Edessa'> Estrangelo Edessa </option>
				<option value='EucrosiaUPC'> EucrosiaUPC </option>
				<option value='Euphemia'> Euphemia </option>
				<option value='FangSong'> FangSong </option>
				<option value='Franklin Gothic Medium'> Franklin Gothic Medium </option>
				<option value='FrankRuehl'> FrankRuehl </option>
				<option value='FreesiaUPC'> FreesiaUPC </option>
				<option value='Gabriola'> Gabriola </option>
				<option value='Gadugi'> Gadugi </option>
				<option value='Gautami'> Gautami </option>
				<option value='Georgia'> Georgia </option>
				<option value='Gisha'> Gisha </option>
				<option value='Gulim'> Gulim </option>
				<option value='GulimChe'> GulimChe </option>
				<option value='Gungsuh'> Gungsuh </option>
				<option value='GungsuhChe'> GungsuhChe </option>
				<option value='Impact'> Impact </option>
				<option value='IrisUPC'> IrisUPC </option>
				<option value='Iskoola Pota'> Iskoola Pota </option>
				<option value='JasmineUPC'> JasmineUPC </option>
				<option value='KaiTi'> KaiTi </option>
				<option value='Kalinga'> Kalinga </option>
				<option value='Kartika'> Kartika </option>
				<option value='Khmer UI'> Khmer UI </option>
				<option value='KodchiangUPC'> KodchiangUPC </option>
				<option value='Kokila'> Kokila </option>
				<option value='Lao UI'> Lao UI </option>
				<option value='Latha'> Latha </option>
				<option value='Leelawadee'> Leelawadee </option>
				<option value='Levenim MT'> Levenim MT </option>
				<option value='LilyUPC'> LilyUPC </option>
				<option value='Lucida Console'> Lucida Console </option>
				<option value='Lucida Handwriting Italic'> Lucida Handwriting Italic </option>
				<option value='Lucida Sans Unicode'> Lucida Sans Unicode </option>
				<option value='Malgun Gothic'> Malgun Gothic </option>
				<option value='Mangal'> Mangal </option>
				<option value='Manny ITC'> Manny ITC </option>
				<option value='Marlett'> Marlett </option>
				<option value='Meiryo'> Meiryo </option>
				<option value='Meiryo UI'> Meiryo UI </option>
				<option value='Microsoft Himalaya'> Microsoft Himalaya </option>
				<option value='Microsoft JhengHei'> Microsoft JhengHei </option>
				<option value='Microsoft JhengHei UI'> Microsoft JhengHei UI </option>
				<option value='Microsoft New Tai Lue'> Microsoft New Tai Lue </option>
				<option value='Microsoft PhagsPa'> Microsoft PhagsPa </option>
				<option value='Microsoft Sans Serif'> Microsoft Sans Serif </option>
				<option value='Microsoft Tai Le'> Microsoft Tai Le </option>
				<option value='Microsoft Uighur'> Microsoft Uighur </option>
				<option value='Microsoft YaHei'> Microsoft YaHei </option>
				<option value='Microsoft YaHei UI'> Microsoft YaHei UI </option>
				<option value='Microsoft Yi Baiti'> Microsoft Yi Baiti </option>
				<option value='MingLiU_HKSCS'> MingLiU_HKSCS </option>
				<option value='MingLiU_HKSCS-ExtB'> MingLiU_HKSCS-ExtB </option>
				<option value='Miriam'> Miriam </option>
				<option value='Mongolian Baiti'> Mongolian Baiti </option>
				<option value='MoolBoran'> MoolBoran </option>
				<option value='MS UI Gothic'> MS UI Gothic </option>
				<option value='MV Boli'> MV Boli </option>
				<option value='Myanmar Text'> Myanmar Text </option>
				<option value='Narkisim'> Narkisim </option>
				<option value='Nirmala UI'> Nirmala UI </option>
				<option value='News Gothic MT'> News Gothic MT </option>
				<option value='NSimSun'> NSimSun </option>
				<option value='Nyala'> Nyala </option>
				<option value='Palatino Linotype'> Palatino Linotype </option>
				<option value='Plantagenet Cherokee'> Plantagenet Cherokee </option>
				<option value='Raavi'> Raavi </option>
				<option value='Rod'> Rod </option>
				<option value='Sakkal Majalla'> Sakkal Majalla </option>
				<option value='Segoe Print'> Segoe Print </option>
				<option value='Segoe Script'> Segoe Script </option>
				<option value='Segoe UI Symbol'> Segoe UI Symbol </option>
				<option value='Shonar Bangla'> Shonar Bangla </option>
				<option value='Shruti'> Shruti </option>
				<option value='SimHei'> SimHei </option>
				<option value='SimKai'> SimKai </option>
				<option value='Simplified Arabic'> Simplified Arabic </option>
				<option value='SimSun'> SimSun </option>
				<option value='SimSun-ExtB'> SimSun-ExtB </option>
				<option value='Sylfaen'> Sylfaen </option>
				<option value='Tahoma'> Tahoma </option>
				<option value='Times New Roman'> Times New Roman </option>
				<option value='Traditional Arabic'> Traditional Arabic </option>
				<option value='Trebuchet MS'> Trebuchet MS </option>
				<option value='Tunga'> Tunga </option>
				<option value='Utsaah'> Utsaah </option>
				<option value='Vani'> Vani </option>
				<option value='Vijaya'> Vijaya </option>
		 	</select> <br> 
		 	<label style='color:#0073aa;'> Answer's Font-Size: </label> <input type="number" min=12 name="AnswerSize" id="AnswerSize" value="14" style="margin-left:79px; width:50px;" onchange="ChangeFont('yupi');" /> <span> px </span>

	 	</div>
 	</fieldset>
 </form>
 	<div class='plugins_type' id='plugins_type1' style='padding:0 10px 0 10px; border: 1px solid #0073aa; position: absolute;top: 415px; width: 250px;left: 695px;border-radius:6px;background:#ffffff;'>
	 	
		 	<p class='questions_title'style='text-align:center;color:black;'>Question?</p>	
		 	<div class='votes1'><input class='radio' type='radio'style='float:left;' name="answer"><p class='set_answer' id='ans1' style="margin-left:20px;color:black;width:260px;height:20px;">Answer1</p></div>
		 	<div class='votes2'><input class='radio' type='radio'style='float:left;' name="answer"><p class='set_answer' id='ans2' style='margin-left:20px;color:black;width:260px;height:20px;'>Answer2</p></div>
		 	<div class='votes3' style='display:none;'><input class='radio' type='radio' style='float:left;' name="answer"><p class='set_answer' id='ans3' style='margin-left:20px;color:black;width:260px;height:20px;'>Answer3</p></div>
		 	<div class='votes4' style='display:none;'><input class='radio' type='radio' style='float:left;' name="answer"><p class='set_answer' id='ans4' style='margin-left:20px;color:black;width:260px;height:20px;'>Answer4</p></div>
		 	<div class='votes5' style='display:none;'><input class='radio' type='radio' style='float:left;' name="answer"><p class='set_answer' id='ans5' style='margin-left:20px;color:black;width:260px;height:20px;'>Answer5</p></div>
		 	<div class='votes6' style='display:none;'><input class='radio' type='radio' style='float:left;' name="answer"><p class='set_answer' id='ans6' style='margin-left:20px;color:black;width:260px;height:20px;'>Answer6</p></div>
		 	<div class='votes7' style='display:none;'><input class='radio' type='radio' style='float:left;' name="answer"><p class='set_answer' id='ans7' style='margin-left:20px;color:black;width:260px;height:20px;'>Answer7</p></div>
		 	<div class='votes8' style='display:none;'><input class='radio' type='radio' style='float:left;' name="answer"><p class='set_answer' id='ans8' style='margin-left:20px;color:black;width:260px;height:20px;'>Answer8</p></div>
		 	<div class='votes9' style='display:none;'><input class='radio' type='radio' style='float:left;' name="answer"><p class='set_answer' id='ans9' style='margin-left:20px;color:black;width:260px;height:20px;'>Answer9</p></div>
		 	<div class='votes10' style='display:none;'><input class='radio'type='radio' style='float:left;' name="answer"><p class='set_answer' id='ans10' style='margin-left:20px;color:black;width:260px;height:20px;'>Answer10</p></div>
		 	<input id='vote_button' type='button'value='Vote' style='background: #000000;width: 62px;color: #ffffff;margin-left: 109px; border-radius: 10px;margin-bottom:10px;'>
	 
 	</div>
 	<div class='plugins_type'id='plugins_type2'style='padding:0 10px 10px 10px; display:none; border: 1px solid #0073aa; position: absolute;top: 415px; width: 250px;left: 695px;border-radius:6px;background:#ffffff;'>
 		<p class='questions_title'style='text-align:center;color:black;'>Question?</p>	
 		
 		<p class='set_answer' id='an1' style='color:black;height:30px; background-color: #49ff78;border-radius:10px; text-align:center;'>Answer1</p>
 		<p class='set_answer' id='an2' style='color:black;height:30px; background-color: #10ffff;border-radius:10px; text-align:center;'>Answer2</p>
 		<p class='set_answer' id='an3' style='display:none;color:black;height:30px; background-color: #ffa448;border-radius:10px; text-align:center;'>Answer3</p>
 		<p class='set_answer' id='an4' style='display:none;color:black;height:30px; background-color: #ffff80;border-radius:10px; text-align:center;'>Answer4</p>
 		<p class='set_answer' id='an5' style='display:none;color:black;height:30px; background-color: #ff4242;border-radius:10px; text-align:center;'>Answer5</p>
 		<p class='set_answer' id='an6' style='display:none;color:black;height:30px; background-color: #49ff78;border-radius:10px; text-align:center;'>Answer6</p>
 		<p class='set_answer' id='an7' style='display:none;color:black;height:30px; background-color: #10ffff;border-radius:10px; text-align:center;'>Answer7</p>
 		<p class='set_answer' id='an8' style='display:none;color:black;height:30px; background-color: #ffa448;border-radius:10px; text-align:center;'>Answer8</p>
 		<p class='set_answer' id='an9' style='display:none;color:black;height:30px; background-color: #ff4242;border-radius:10px; text-align:center;'>Answer9</p>
 		<p class='set_answer' id='an10' style='display:none;color:black;height:30px; background-color: #49ff78;border-radius:10px; text-align:center;'>Answer10</p>
 	</div>
 	<div class='plugins_type'id='plugins_type3'style=' display:none; border: 1px solid #0073aa; position: absolute;top: 415px; width: 250px; left: 695px;border-radius:6px;background-color:#ffffff;padding:20px;'>
 		
 		<p class='questions_title'style='text-align:center;color:black; background-color:#cfcfcf; margin:10px 10px 10px 10px;'>Question?</p>
 		<div id='set_file1' style='text-align:center;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/1.jpg" id='file1' style='width:90px; height:66px;'><span class='set_answer' id='set_answer1' style='text-align:center;color:black;'>Answer1</span></div>
 		<div id='set_file2' style='text-align:center;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/2.jpg" id='file2' style='width:90px; height:66px;'><span class='set_answer' id='set_answer2' style='text-align:center;color:black;'>Answer2</span></div>
 		<div id='set_file3' style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/3.jpg" id='file3' style='width:90px; height:66px;'><span class='set_answer' id='set_answer3' style='text-align:center;color:black;'>Answer3</span></div>
 		<div id='set_file4' style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/4.jpg" id='file4' style='width:90px; height:66px;'><span class='set_answer' id='set_answer4' style='text-align:center;color:black;'>Answer4</span></div>
 		<div id='set_file5' style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/5.jpg" id='file5' style='width:90px; height:66px;'><span class='set_answer' id='set_answer5' style='text-align:center;color:black;'>Answer6</span></div>
 		<div id='set_file6' style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/6.jpg" id='file6' style='width:90px; height:66px;'><span class='set_answer' id='set_answer6' style='text-align:center;color:black;'>Answer6</span></div>
 		<div id='set_file7' style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/7.jpg" id='file7' style='width:90px; height:66px;'><span class='set_answer' id='set_answer7' style='text-align:center;color:black;'>Answer7</span></div>
 		<div id='set_file8' style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/8.jpg" id='file8' style='width:90px; height:66px;'><span class='set_answer' id='set_answer8' style='text-align:center;color:black;'>Answer8</span></div>
 		<div id='set_file9' style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/9.jpg" id='file9' style='width:90px; height:66px;'><span class='set_answer' id='set_answer9' style='text-align:center;color:black;'>Answer9</span></div>
 		<div id='set_file10' style='text-align:center;display:none;float:left; margin:5px 10px 5px 10px;width:90px;border:1px solid #0073aa;padding:2px;'><img src="http://juna-it.com/image/10.jpg" id='file10' style='width:90px; height:66px;'><span class='set_answer' id='set_answer10' style='text-align:center;color:black;'>Answer10</span></div>
 	</div>
	 	<div class='plugins_type' id='plugins_type4' style='padding:0 10px 10px 10px; display:none; border: 1px solid #0073aa; position: absolute;top: 415px; width: 250px;left: 695px;border-radius:6px;background:#ffffff;'>
	 	<p class='questions_title' style='text-align:center;color:black;margin:10px 20px 0 10px;'>Question?</p>
	 	<div class='set_answer' id='a1' style='border: 1px solid #49ff78;height: 28px;margin-top:10px;'><p class='set_answer' id='answ1' style='float: left;margin: 5px;'>Answer1</p><div id='set_color1'style='float: right;background-color:#49ff78;display: inline-block;height: 28px; width: 32px;'></div></div>
	 	<div class='set_answer' id='a2' style='border: 1px solid #10ffff;height: 28px;margin-top:10px;'><p class='set_answer' id='answ2' style='float: left;margin: 5px;'>Answer2</p><div id='set_color2'style='float: right;background-color:#10ffff;display: inline-block;height: 28px; width: 32px;'></div></div>
	 	<div class='set_answer' id='a3' style='display:none;border: 1px solid #ffa448;height: 28px;margin-top:10px;'><p class='set_answer' id='answ3' style='float: left;margin: 5px;'>Answer3</p><div id='set_color3'style='float: right;background-color:#ffa448;display: inline-block;height: 28px; width: 32px;'></div></div>
	 	<div class='set_answer' id='a4' style='display:none;border: 1px solid #ffff80;height: 28px;margin-top:10px;'><p class='set_answer' id='answ4' style='float: left;margin: 5px;'>Answer4</p><div id='set_color4'style='float: right;background-color:#ffff80;display: inline-block;height: 28px; width: 32px;'></div></div>
	 	<div class='set_answer' id='a5' style='display:none;border: 1px solid #ff4242;height: 28px;margin-top:10px;'><p class='set_answer' id='answ5' style='float: left;margin: 5px;'>Answer5</p><div id='set_color5'style='float: right;background-color:#ff4242;display: inline-block;height: 28px; width: 32px;'></div></div>
	 	<div class='set_answer' id='a6' style='display:none;border: 1px solid #49ff78;height: 28px;margin-top:10px;'><p class='set_answer' id='answ6' style='float: left;margin: 5px;'>Answer6</p><div id='set_color6'style='float: right;background-color:#49ff78;display: inline-block;height: 28px; width: 32px;'></div></div>
	 	<div class='set_answer' id='a7' style='display:none;border: 1px solid #10ffff;height: 28px;margin-top:10px;'><p class='set_answer' id='answ7' style='float: left;margin: 5px;'>Answer7</p><div id='set_color7'style='float: right;background-color:#10ffff;display: inline-block;height: 28px; width: 32px;'></div></div>
	 	<div class='set_answer' id='a8' style='display:none;border: 1px solid #ffa448;height: 28px;margin-top:10px;'><p class='set_answer' id='answ8' style='float: left;margin: 5px;'>Answer8</p><div id='set_color8'style='float: right;background-color:#ffa448;display: inline-block;height: 28px; width: 32px;'></div></div>
	 	<div class='set_answer' id='a9' style='display:none;border: 1px solid #ffff80;height: 28px;margin-top:10px;'><p class='set_answer' id='answ9' style='float: left;margin: 5px;'>Answer9</p><div id='set_color9'style='float: right;background-color:#ffff80;display: inline-block;height: 28px; width: 32px;'></div></div>
	 	<div class='set_answer' id='a10' style='display:none;border: 1px solid #ff4242;height: 28px;margin-top:10px;'><p class='set_answer' id='answ10' style='float: left;margin: 5px;'>Answer10</p><div id='set_color10'style='float: right;background-color:#ff4242;display: inline-block;height: 28px; width: 32px;'></div></div>
 	</div>

<?php
		
	 global $wpdb;		

		$table_name  =  $wpdb->prefix . "poll_wp_Questions";
		$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
		$table_name3 =  $wpdb->prefix . "poll_wp_Results";
		$table_name4 =  $wpdb->prefix . "poll_wp_Settings";		

		$question=sanitize_text_field(stripslashes($_POST["question"]));

		$k=sanitize_text_field($_POST['AnswersCount']);

		$image=sanitize_text_field($_POST["img_name"]);

		$answerColors=array();

			if($image==2 || $image==4)
			{
				for($i=1; $i<=$k; $i++)
				{
					$answerColors[$i]=sanitize_text_field($_POST['color' . $i]);
				}
			}			
			else
			{
				for($i=1; $i<=$k; $i++)
				{
					$answerColors[$i]='white';
				}
			}		

			if($image!=3)
			{
					//insert data to poll_wp_Question	

				delete($question);

				if(strlen($question)>0 && strlen($image)>0)
				{	
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, Question, PluginType) VALUES (%d,%s,%s) ", '', $question,$image ));
				}	
					else 
				{
					return false;
				}	

				//insert data to poll_wp_Answers

				$count=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name  WHERE id > %d order by id desc limit 1  ", 0));

				$answers_array=array();

				$answers_array[0]=null;

				$question=addslashes($question);

				for($i=1; $i<=$k; $i++)
				{
					$answers_array[$i]=sanitize_text_field(stripslashes($_POST['answer' . $i]));

					if(strlen($answers_array[$i])>0 && strlen($answerColors[$i])>0 && strlen($count)>0)
					{
						$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d,%s,%s,%s,%d)",'',$answers_array[$i],'',$answerColors[$i],$count));
					}	
						else 
					{
						return false;
					}

					$answers_array[$i]=addslashes($answers_array[$i]);

					$ans_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name2 WHERE Answer= %s and QuestionID=(SELECT id FROM $table_name WHERE Question= %s) ", $answers_array[$i],$question ));

					$ques_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Question= %s",$question));

					//insert data to poll_wp_Results
					if(strlen($ques_id)>0 && strlen($ans_id)>0) 
					{	
						$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID,  count) VALUES (%d,%d,%d,%d)",'', $ques_id, $ans_id, 0));
					}
						else
					{
						return false;	
					}	

				}

					//insert data to poll_wp_Settings

						$bgColor=sanitize_text_field($_POST['bg_color']);
						$borderColor=sanitize_text_field($_POST['border_color']);
						$fontFamily=sanitize_text_field($_POST['Text_Font']);
						$fontSize=sanitize_text_field($_POST['fontSize']);
						$answerColor=sanitize_text_field($_POST['answer_color']);
						$answerHoverColor=sanitize_text_field($_POST['selectedHoverColor']);
						$questionColor=sanitize_text_field($_POST['Question_color']);
						$vote_button_color=sanitize_text_field($_POST['vote_button_color']);
						$buttons_text=sanitize_text_field($_POST['buttons_text']);
						$widg_width=sanitize_text_field($_POST['widg_width']);
						$type_vote=sanitize_text_field($_POST['votes_type']);
						$votes_color=sanitize_text_field($_POST['votes_color']);
						$answer_font_size=sanitize_text_field($_POST['AnswerSize']);
						$answer_font_family=sanitize_text_field($_POST['Answer_Font']);

						if(strlen($bgColor)>0 && strlen($borderColor)>0 && strlen($fontFamily)>0 && strlen($fontSize)>0 && strlen($answerColor)>0 && strlen($questionColor)>0 && strlen($vote_button_color)>0 && strlen($buttons_text)>0 && strlen($widg_width)>0)
						{	
						 	$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, border_color, bg_color, font_family, font_size, answer_color, answer_hover_color, question_color, vote_button_color, buttons_text_color, widget_div_width, vote_type, vote_color, image_width, image_height, answer_font_family, answer_font_size, QuestionID) VALUES (%d,%s,%s,%s,%d,%s,%s,%s,%s,%s,%s,%s,%s,%d,%d,%s,%d,%d)", '', $borderColor, $bgColor, $fontFamily, $fontSize, $answerColor, $answerHoverColor, $questionColor, $vote_button_color, $buttons_text, $widg_width, $type_vote, $votes_color, '', '', $answer_font_family, $answer_font_size, $count));
 						}
 						else
 						{
 							return false;
 						}
			}
		function delete($sql_question)
				{
					global $wpdb;

					$sql_question=addslashes($sql_question);

					$table_name  =  $wpdb->prefix . "poll_wp_Questions";
					$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
					$table_name3 =  $wpdb->prefix . "poll_wp_Results";
					$table_name4 =  $wpdb->prefix . "poll_wp_Settings";		

					$count=$wpdb->get_var($wpdb->prepare("SELECT count(*) FROM  $table_name WHERE Question= %s", $sql_question));

					$id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Question= %s limit 1",$sql_question));

					if($count!=0)
					{

						$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id= %d", $id));

						$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE QuestionID= %d", $id));

						for($i=0;$i<count($results);$i++)
						{		
							$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE id= %d", $results[$i]->id));
						}

						$set_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name4 WHERE QuestionID= %d", $id));

						$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE id= %d",$set_id));

						$result_s=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE QuestionID= %d",$id));

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