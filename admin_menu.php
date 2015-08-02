 <?php

	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}

	$path_site = plugins_url("", __FILE__);
	
	
?>
<form method="post" id="AdminForm" enctype="multipart/form-data" onsubmit="if(Validate()==false) return false;" >
	<img style="float:left;" src=<?php echo $path_site . '/Images/icon.png' ; ?>><p style="font-size:20px; width:200px; margin-left:50px;"><b>Add Poll</b></p>

	<section style="position:relative;  width:800px; margin-bottom:15px; ">

 		<label id="spt"> Select Plugin Type: </label> <input type="text"  id="img_id" name="img_name" style="display:none; " value="1" /> <br><br>
 		<img id="img1" style="width:130px; margin-left:10px; height:130px; " src=<?php echo $path_site . '/Images/poll-11.png'; ?> onclick="SelectType('img1')" >
 		<img id="img2" style="width:120px; margin-left:10px; height:120px; " src=<?php echo $path_site . '/Images/poll-2.png'; ?> onclick="SelectType('img2')" >
 		<img id="img3" style="width:120px; margin-left:10px; height:120px; " src=<?php echo $path_site . '/Images/poll-3.png'; ?> onclick="SelectType('img3')" >
 		<img id="img4" style="width:120px; margin-left:10px; height:120px; " src=<?php echo $path_site . '/Images/poll-4.png'; ?> onclick="SelectType('img4')" >

 	</section>
 		<img id="coming_soon" style="float:right; width:300px; margin-right:550px; height:300px; display:none; " src=<?php echo $path_site . '/Images/coming_soon.png'; ?>  >

		<label style="font-size:14px;"> Question: </label> <br>
		<input type="text" name="question" id="question_id" style="width:500px;"/> <span id="span_question" style="color: red"></span> <br><br><br>
		<label style="font-size:14px;"> Answers: </label> <br>

	 	<select name="AnswersCount" id="AnswersCount" onchange="add_answers()"> 		
	 		<option value="2">2</option>
	 		<option value="3">3</option>
	 		<option value="4">4</option>
	 		<option value="5">5</option>
	 		<option value="6">6</option>
	 		<option value="7">7</option>
	 		<option value="8">8</option>
	 		<option value="9">9</option>
	 		<option value="10">10</option>
	 	</select> <br><br>

	<div id="Admin_Menu" style="position:relative; width:920px; height: 500px; margin-bottom: 20px; ">
		
			<div style="position: absolute; right: 0; top: 0; width: 500px; height: 500px;">
				
				<label id="labelUpload1" style="display:none; font-size:14px;  "> Include File</label>  
		 		<label id="bg_color1" style="display:none; font-size:14px;  "> Choose Background Color</label>  <br>

		 		<input type="file" disabled="true" name="upload1" id="upload1" style="display:none; padding: 0; height: 27px;" accept="image/*"/> 
		 		<input type="text" disabled="true" value="#000000" name="color1" id="color1" style="display:none; width: 170px; " onchange="ColorPicker('1',false);">
		 		<input type="color" disabled="true" id="color_div1" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('1',true)"> <br> 

		 		<label id="labelUpload2" style="display:none; font-size:14px;  "> Include File</label>  
		 		<label id="bg_color2"  style="display:none; font-size:14px;  "> Choose Background Color</label> <br>

			 	<input type="file" disabled="true" name="upload2" id="upload2" style="display:none; padding: 0; height: 27px;" accept="image/*"/> 
		 		<input type="text" disabled="true" value="#000000" name="color2" id="color2" style="display:none; width: 170px; " onchange="ColorPicker('2',false);">
		 		<input type="color" disabled="true" id="color_div2" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('2',true)"> <br> 

		 		<label id="labelUpload3" style="display:none; font-size:14px;  "> Include File</label>  
		 		<label id="bg_color3" style="display:none; font-size:14px;  "> Choose Background Color</label> <br>
		 	
		 		<input disabled="true" type="file" name="upload3" id="upload3" style=" display:none; padding: 0; height: 27px;" accept="image/*"/> 
		 		<input type="text" disabled="true" value="#000000" name="color3" id="color3" style="display:none; width: 170px; " onchange="ColorPicker('3',false);">
		 		<input type="color" disabled="true" id="color_div3" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('3',true)"> <br> 

		 		<label id="labelUpload4" style="display:none; font-size:14px;  "> Include File</label>  
		 		<label id="bg_color4" style="display:none; font-size:14px;  "> Choose Background Color</label> <br>

		 		<input disabled="true" type="file" name="upload4" id="upload4" style=" display:none; padding: 0; height: 27px;" accept="image/*"/> 
		 		<input type="text" disabled="true" value="#000000" name="color4" id="color4" style="display:none; width: 170px; " onchange="ColorPicker('4',false);">
		 		<input type="color" disabled="true" id="color_div4" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('4',true)"> <br>

		 		<label id="labelUpload5" style="display:none; font-size:14px;  "> Include File</label>  
		 		<label id="bg_color5" style="display:none; font-size:14px;  "> Choose Background Color</label> <br>

		 		<input disabled="true" type="file" name="upload5" id="upload5" style=" display:none; padding: 0; height: 27px;" accept="image/*"/> 
		 		<input type="text" disabled="true" value="#000000" name="color5" id="color5" style="display:none; width: 170px; " onchange="ColorPicker('5',false);">
		 		<input type="color" disabled="true" id="color_div5" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('5',true)"> <br> 

		 		<label id="labelUpload6" style="display:none; font-size:14px;  "> Include File</label>  
		 		<label id="bg_color6" style="display:none; font-size:14px;  "> Choose Background Color</label><br>

		 		<input disabled="true" type="file" name="upload6" id="upload6" style=" display:none; padding: 0; height: 27px;" accept="image/*"/> 
		 		<input type="text" disabled="true" value="#000000" name="color6" id="color6" style="display:none; width: 170px; " onchange="ColorPicker('6',false);">
		 		<input type="color" disabled="true" id="color_div6" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('6',true)"> <br> 

		 		<label id="labelUpload7" style="display:none; font-size:14px;  "> Include File</label>  
		 		<label id="bg_color7" style="display:none; font-size:14px;  "> Choose Background Color</label><br>

		 		<input disabled="true" type="file" name="upload7" id="upload7" style=" display:none; padding: 0; height: 27px;" accept="image/*"/> 
		 		<input type="text" disabled="true" value="#000000" name="color7" id="color7" style="display:none; width: 170px; " onchange="ColorPicker('7',false);">
		 		<input type="color" disabled="true" id="color_div7" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('7',true)"> <br>

		 		<label id="labelUpload8" style="display:none; font-size:14px;  "> Include File</label>  
		 		<label id="bg_color8" style="display:none; font-size:14px;  "> Choose Background Color</label> <br>

		 		<input disabled="true" type="file" name="upload8" id="upload8" style=" display:none; padding: 0; height: 27px;" accept="image/*"/> 
		 		<input type="text" disabled="true" value="#000000" name="color8" id="color8" style="display:none; width: 170px; " onchange="ColorPicker('8',false);">
		 		<input type="color" disabled="true" id="color_div8" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('8',true)"> <br>

		 		<label id="labelUpload9" style="display:none; font-size:14px;  "> Include File</label>  
		 		<label id="bg_color9" style="display:none; font-size:14px;  "> Choose Background Color</label>  <br>

		 		<input disabled="true" type="file" name="upload9" id="upload9" style=" display:none; padding: 0; height: 27px;" accept="image/*"/> 
		 		<input type="text" disabled="true" value="#000000" name="color9" id="color9" style="display:none; width: 170px; " onchange="ColorPicker('9',false);">
		 		<input type="color" disabled="true" id="color_div9" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('9',true)"> <br>

		 		<label id="labelUpload10" style="display:none; font-size:14px; "> Include File</label>  
		 		<label id="bg_color10" style="display:none; font-size:14px; "> Choose Background Color</label><br>

		 		<input disabled="true" type="file" name="upload10" id="upload10" style=" display:none; padding: 0; height: 27px;" accept="image/*"/>
		 		<input type="text" disabled="true" value="#000000" name="color10" id="color10" style="display:none; width: 170px; " onchange="ColorPicker('10',false);">
		 		<input type="color" disabled="true" id="color_div10" style="display:none; height: 23px; padding: 1px 3px;" onchange="ColorPicker('10',true)"> <br> 
			
			</div>

		<label id="labelAnswer1" style="font-size:14px; "> Answer 1: </label> <br>
 		<input type="text" name="answer1" id="answer1" style=" width:400px;"/>  <span id="span_answer1" style="color: red"></span><br>

	 	<label id="labelAnswer2" style="font-size:14px;   width:50px; "> Answer 2: </label> <br>
	 	<input type="text" name="answer2" id="answer2" style=" width:400px; "/> <span id="span_answer2" style="color: red"></span><br> 
 		 
	 	<label id="labelAnswer3" style="font-size:14px;"> Answer 3: </label>  <br>
	 	<input disabled="true" type="text" name="answer3" id="answer3" style="width:400px; "/> <span id="span_answer3" style="color: red"></span> <br>
 		
 		<label id="labelAnswer4" style="font-size:14px;"> Answer 4: </label>  <br>
 		<input disabled="true" type="text" name="answer4" id="answer4" style="width:400px; "/> <span id="span_answer4" style="color: red"></span> <br>
 		
 		<label id="labelAnswer5" style="font-size:14px;"> Answer 5: </label> <br>
 		<input disabled="true" type="text" name="answer5" id="answer5" style="width:400px; "/>  <span id="span_answer5" style="color: red"></span><br>

 		<label id="labelAnswer6" style="font-size:14px;"> Answer 6: </label> <br>
 		<input disabled="true" type="text" name="answer6" id="answer6" style="width:400px; "/>  <span id="span_answer6" style="color: red"></span><br>

 		<label id="labelAnswer7" style="font-size:14px;"> Answer 7: </label><br>
 		<input disabled="true" type="text" name="answer7" id="answer7" style="width:400px; "/>  <span id="span_answer7" style="color: red"></span><br>

 		<label id="labelAnswer8" style="font-size:14px;"> Answer 8: </label> <br>
 		<input disabled="true" type="text" name="answer8" id="answer8" style="width:400px; "/>  <span id="span_answer8" style="color: red"></span><br>

 		<label id="labelAnswer9" style="font-size:14px;"> Answer 9: </label> <br>
 		<input disabled="true" type="text" name="answer9" id="answer9" style="width:400px; "/>  <span id="span_answer9" style="color: red"></span><br>

 		<label id="labelAnswer10" style="font-size:14px;"> Answer 10: </label> <br>
 		<input disabled="true" type="text" name="answer10" id="answer10" style="width:400px; "/>  <span id="span_answer10" style="color: red"></span><br>
 	
 	</div>

 	<div id="Color_Picker" style="position:relative; margin-top: 25px; width:400px;">
 		<h3> Widget Style </h3><br>

 		<label style="font-size:14px;">Background Color:  </label> 
 		<input type="color"  id="bg_div" style="float:right; height: 23px; padding: 1px 3px;" onchange="ColorPicker('bg',true)">
 		<input type="text" value="#000000" name="bg_color" id="bg_color" style="width: 170px; float:right; margin-right:10px;" onchange="ColorPicker('bg',false)"> <br><br>		
 		
 		<label style="font-size:14px;">Border Color:  </label>
 		<input type="color"  id="border_div" style="float:right; height: 23px; padding: 1px 3px;" onchange="ColorPicker('border',true)"> 
 		<input type="text"  value="#000000" name="border_color" id="border_color" style="width: 170px; float:right; margin-right:10px;" onchange="ColorPicker('border',false)"><br><br>
 		
 		<label style="font-size:14px;">Answer Color:   </label> 
 		<input type="color"  id="answer_div" style="float:right; height: 23px; padding: 1px 3px;" onchange="ColorPicker('answer',true)">
 		<input type="text"  value="#000000" name="answer_color" id="answer_color" style="width: 170px; float:right; margin-right:10px;" onchange="ColorPicker('answer',false)"><br><br>
 		

 		<label style="font-size:14px;">Question Color:  </label>
 		<input type="color"  id="quest_div" style="float:right; height: 23px; padding: 1px 3px;" onchange="ColorPicker('question',true)"> 
 		<input type="text"  value="#000000" name="Question_color" id="Question_color" style="width: 170px; float:right; margin-right:10px;" onchange="ColorPicker('question',false)"><br><br>
 		 		 
 	</div>

 	<div style="position:relative; margin-top: 25px; width:448px;">

 		<label id="hoverColor_label" style="display:none; font-size:14px;">Hover Color: </label> 
		<input id="HoverCheck" type="checkbox"  style="float:right; opacity:0; height:20px; width:20px; margin-top:5px;" onchange="ActivateHover()">
		<input type="color"  disabled="true" id="colorPickerhover" style="display:none; float:right; margin-right: 25px; height: 23px; padding: 1px 3px; " onchange="ColorPicker('col_pick',true)">
		<input id="selectedHoverColor" disabled="true" type="text"   value="#000000" name="selectedHoverColor" style=" margin-right:10px; display:none; width: 170px; float:right;" onchange="ColorPicker('col_pick',false)">
		<br><br>

 	</div>

 	<div style="position: relative; width: 600px; margin: 0 auto 0 0; ">
 	<h3> Fonts </h3>
 	<div style="float: left; width: 600px; height: 23px;">
 	<label> Select Text Font: </label>

 	<select name="Text_Font" id="Text_Font" onchange="ChangeFont('false');">
 	
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
		
 	</select>
 	
 		<label style="font-size:14px;  " id="fontCheck">  Do You Like Our Plugin?  </label> 
 	</div>
 	<br> <br>
 	<label> Question's Font-Size: </label> <input type="number" min=12 max=20 name="fontSize" id="fontSize" value="14" style="margin-left:40px; width:50px;" onchange="ChangeFont('true');" /> <span> px </span> <br>
 	<br> <br> <input type="submit" enabled id="Save_button" style="margin-left: 40px; float: right;" value="Save Changes" /> 
 	</div>


 </form>
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
				//$wpdb->insert($table_name,array('id'=>'','Question'=>$question,'PluginType'=>$image));	

				//insert data to poll_wp_Answers

				$count=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name  WHERE id > %d order by id desc limit 1  ", 0));


				//$count=$wpdb->get_var("SELECT id FROM $table_name order by id desc limit 1");
			

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

					//$wpdb->insert($table_name2, array('id'=>'','Answer'=>$answers_array[$i], 'File'=>'','Answer_bg_color'=>$answerColors[$i],'QuestionID'=>$count));
					$answers_array[$i]=addslashes($answers_array[$i]);

					$ans_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name2 WHERE Answer= %s and QuestionID=(SELECT id FROM $table_name WHERE Question= %s) ", $answers_array[$i],$question ));

					//$ans_id=$wpdb->get_var("SELECT id FROM $table_name2 WHERE Answer='$answers_array[$i]' and QuestionID=(SELECT id FROM $table_name WHERE Question='$question')");
					
					$ques_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Question= %s",$question));

					//$ques_id=$wpdb->get_var("SELECT id FROM $table_name WHERE Question='$question'");

					//insert data to poll_wp_Results
					if(strlen($ques_id)>0 && strlen($ans_id)>0) 
					{	
						$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID,  count) VALUES (%d,%d,%d,%d)",'', $ques_id, $ans_id, 0));
					}
						else
					{
						return false;	
					}	

					//$wpdb->insert($table_name3, array('id'=>'','QuestionID'=>$ques_id, 'AnswerID'=>$ans_id, 'count'=>'0'));
				}

					//insert data to poll_wp_Settings

						$bgColor=sanitize_text_field($_POST['bg_color']);
						$borderColor=sanitize_text_field($_POST['border_color']);
						$fontFamily=sanitize_text_field($_POST['Text_Font']);
						$fontSize=sanitize_text_field($_POST['fontSize']);
						$answerColor=sanitize_text_field($_POST['answer_color']);
						$answerHoverColor=sanitize_text_field($_POST['selectedHoverColor']);
						$questionColor=sanitize_text_field($_POST['Question_color']);

						//if(strlen($bgColor)>0 && strlen($borderColor)>0 && strlen($fontFamily)>0 && strlen($fontSize)>0 && strlen($answerColor)>0 && strlen($answerHoverColor)>0 && strlen($questionColor)>0)
						//{	
						 	$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, border_color, bg_color, font_family, font_size, answer_color, answer_hover_color, question_color, QuestionID) VALUES (%d,%s,%s,%s,%d,%s,%s,%s,%d)", '', $borderColor, $bgColor, $fontFamily, $fontSize, $answerColor, $answerHoverColor, $questionColor, $count));
 						//}
 						//else
 						//{
 						//	return false;
 						//}

						//$wpdb->insert($table_name4, array('id'=>'','border_color'=>$borderColor, 'bg_color'=>$bgColor, 'font_family'=>$fontFamily, 'font_size'=>$fontSize, 'answer_color'=>$answerColor, 'answer_hover_color'=>$answerHoverColor, 'question_color'=>$questionColor, 'QuestionID'=>$count));		

			}
				else
			{
				
				$MyFiles=array();
				$allowedTypes=array('jpg','gif','png');
				$currentFiles=array();
				for($i=1; $i<=$k; $i++)
				{
					if(isset($_FILES['upload'.$i]))
					{
						$MyFiles[$i]=$_FILES['upload'.$i];
					}					
				}

				//insert data to poll_wp_Question	

				delete($question);

				if(strlen($question)>0 && strlen($image)>0) 
				{	
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id,Question,PluginType) VALUES (%d,%s,%s)", '', $question, $image));	
				}
					else
				{
					return false;
				}
				//$wpdb->insert($table_name,array('id'=>'','Question'=>$question,'PluginType'=>$image));

				$question=addslashes($question);

				$ques_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Question= %s",$question));
				 
				//$ques_id=$wpdb->get_var("SELECT id FROM $table_name WHERE Question='$question'");
								
				$count=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE id > %d order by id desc limit 1",0));
			
				//$count=$wpdb->get_var("SELECT id FROM $table_name order by id desc limit 1");

				for($i=1; $i<=$k; $i++)
				{
					$Currentfile=$_FILES['upload'.$i];
					$CurrentFile_Name=$Currentfile['name'];
					$currentFile_tmpName=$Currentfile['tmp_name'];
					$Currentfile_ext=explode('.',$CurrentFile_Name);

					$Currentfile_ext=strtolower(end($Currentfile_ext));

					if(in_array($Currentfile_ext, $allowedTypes))
					{
						$currentFile_newName=uniqid() . '.' . $Currentfile_ext;

						$currentFiles[$i]=$currentFile_newName;
						
						$file_destination=plugin_dir_path(__FILE__) ."Images\Uploads\ " . $currentFile_newName;
						$file_destination=trim($file_destination);
						
						 if(move_uploaded_file($currentFile_tmpName, $file_destination))
						 	{	
						 		//insert data to poll_wp_Answers
				
								$answers_array=array();

								$answers_array[0]=null;
								
									$answers_array[$i]=sanitize_text_field(stripslashes($_POST['answer' . $i]));

									if(strlen($answers_array[$i])>0 && strlen($currentFiles[$i])>0 && strlen($answerColors[$i])>0 && strlen($count)>0) 
									{
										$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Answer, File, Answer_bg_color, QuestionID) VALUES (%d,%s,%s,%s,%d)",'',$answers_array[$i],$currentFiles[$i],$answerColors[$i],$count));
									}
										else
									{
										return false;
									}
									//$wpdb->insert($table_name2, array('id'=>'','Answer'=>$answers_array[$i], 'File'=>$currentFiles[$i],'Answer_bg_color'=>$answerColors[$i],'QuestionID'=>$count));
									
									$answers_array[$i]=addslashes($answers_array[$i]);

									$ans_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name2 WHERE Answer= %s and QuestionID=(SELECT id FROM $table_name WHERE Question= %s) ", $answers_array[$i],$question ));
									
								//$ans_id=$wpdb->get_var("SELECT id FROM $table_name2 WHERE Answer='$answers_array[$i]' and QuestionID=(SELECT id FROM $table_name WHERE Question='$question')");

									//insert data to poll_wp_Results
									
									
								if(strlen($ques_id)>0 && strlen($ans_id)>0) 
								{
									$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, QuestionID, AnswerID, count) VALUES (%d,%d,%d,%d)",'', $ques_id, $ans_id, 0));
								}
									else
								{
									return false;
								}
								//$wpdb->insert($table_name3, array('id'=>'','QuestionID'=>$ques_id, 'AnswerID'=>$ans_id, 'count'=>'0'));								
							}

								
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
								$bgColorQuest=sanitize_text_field($_POST['selectedHoverColor']);
								

								if(strlen($borderColor)>0 && strlen($bgColor)>0 && strlen($fontFamily)>0 && strlen($fontSize)>0 && strlen($answerColor)>0 && strlen($bgColorQuest)>0 && strlen($questionColor)>0 && strlen($count)>0) 
								{
								$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, border_color, bg_color, font_family, font_size, answer_color, answer_hover_color, question_color, QuestionID) VALUES (%d,%s,%s,%s,%d,%s,%s,%s,%d)", '', $borderColor, $bgColor, $fontFamily, $fontSize, $answerColor, $bgColorQuest, $questionColor, $count));
								}
									else
								{
									return false;
								}
								//$wpdb->insert($table_name4, array('id'=>'','border_color'=>$borderColor, 'bg_color'=>$bgColor, 'font_family'=>$fontFamily, 'font_size'=>$fontSize, 'answer_color'=>$answerColor, 'answer_hover_color'=>$bgColorQuest, 'question_color'=>$questionColor, 'QuestionID'=>$count));		
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

					//$count=$wpdb->get_var("SELECT count(*) FROM  $table_name WHERE Question='$sql_question'");

					$id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE Question= %s limit 1",$sql_question));

					//$id=$wpdb->get_var("SELECT id FROM $table_name WHERE Question='$sql_question' limit 1");

					if($count!=0)
					{

						$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id= %d", $id));

						//$wpdb->delete($table_name,array('id'=>$id));

						$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE QuestionID= %d", $id));

						//$results=$wpdb->get_results("SELECT * FROM $table_name2 WHERE QuestionID='$id'");

						for($i=0;$i<count($results);$i++)
						{		
							$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE id= %d", $results[$i]->id));
							//$wpdb->delete($table_name2,array('id'=>$results[$i]->id));
						}

						$set_id=$wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name4 WHERE QuestionID= %d", $id));
						//$set_id=$wpdb->get_var("SELECT id FROM $table_name4 WHERE QuestionID='$id'");

						$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE id= %d",$set_id));
						//$wpdb->delete($table_name4,array('id'=>$set_id));

						$result_s=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE QuestionID= %d",$id));
						//$result_s=$wpdb->get_results("SELECT * FROM $table_name3 WHERE QuestionID='$id'");

						for($i=0;$i<count($result_s);$i++)
						{		
							$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE id= %d", $result_s[$i]->id));				
							//$wpdb->delete($table_name3,array('id'=>$result_s[$i]->id));
						}

					}
					else 
					{
						return;
					}
					
				}


?>