var images= [];

jQuery(document).ready(function() {	
		
	var img1=document.getElementById("img1");
	var img2=document.getElementById("img2");	
	var img3=document.getElementById("img3");	
	var img4=document.getElementById("img4");	
				
	images=[img1,img2,img3,img4];
	upload_files();	
	checkbox_selected();
	jQuery('#colors_div').css({"display":"none"});					
	jQuery('#upload_div').css({"display":"none"});

});
function upload_files(){
		jQuery('#img3').click(function(){
			for(var i = 1; i < 11; i++){
				jQuery('#upload'+i).fadeIn(100);
			}
		})
		jQuery('#img1').click(function(){
			for(var i = 1; i < 11; i++){
				jQuery('#upload'+i).fadeOut(100);
			}
		})
		jQuery('#img2').click(function(){
			for(var i = 1; i < 11; i++){
				jQuery('#upload'+i).fadeOut(100);
			}
		})
		jQuery('#img4').click(function(){
			for(var i = 1; i < 11; i++){
				jQuery('#upload'+i).fadeOut(100);
			}
		})
		for (var i = 1; i < 11; i++){
		jQuery('#upload'+i).click(function(){
				jQuery(this).css('color','red');
				jQuery(this).val('Get Pro Version');
			})	
		}	
	}

	function checkbox_selected(){
		jQuery('.it_example_select').click(function(){
			var id = jQuery(this).attr('id');
			jQuery('.it_example_select').each(function(){
				
				
			 	var id1 = jQuery(this).attr('id')
			 	if(id1!=id){
			 		jQuery(this).attr('checked',false);
			 	}else{
			 		jQuery(this).attr('checked', true);
				}
				
				
			})
		})
		jQuery('#it_example_select2').click(function(){
			var d = jQuery('#position_procent').val();
			jQuery('#it_example_select2').val('margin-left:'+d+'%');
		})
		
	}
jQuery(window).load(function() {
	jQuery('#fonts_div').append("<br><br><input type='submit'  id='Save_button' style='margin-right: 215px; float: right; width:130px; border-radius: 10px; color: white; text-align: center; background-color: #0073aa;' value='Save Changes' name='Add_new_Juna_IT_Poll_Save_button'/>");
})

function Save_poll_position_clicked()
{
	jQuery('#Save_poll_position_span').html('It works only with Pro Version(<a href="http://juna-it.com/index.php/features/elements/juna-it-plugin/" target="_blank" <abbr title="Click to get Pro version">Click here to get Pro version!)</a>');
}
function myF()
	{	
	var sel=document.getElementById('shortcode_select').value;

	var a=sel+'^';

	var ajaxurl = object.ajaxurl;

	var data = {
	action: 'GetIdForShortcode', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar:  a, // translates into $_POST['foobar'] in PHP				
	};
				
	jQuery.post(ajaxurl, data, function(response) {

		var old_id=document.getElementById('shortcode_id').value;

		var b=old_id.substr(0,18);

		var new_id=b+response+'"]';

		document.getElementById('shortcode_id').value="";
		document.getElementById('shortcode_id').value=new_id;
			
	})
}
function set(type){
	if(type=='widget')
		{
			var x=jQuery('#widg_width').val();
			jQuery('.plugins_type').css('width',x+'px');
		}
		else if(type=='width')
		{
			var x=jQuery('#image_width').val();
			for(var i=1;i<=10;i++)
			{
				jQuery('#set_file'+i).css('width',x+'px');
				jQuery('#file'+i).css('width',x+'px');
			}
		}
		else if(type=='height')
		{
			var x=jQuery('#image_height').val();
			for(var i=1;i<=10;i++)
			{
				jQuery('#set_file'+i).css('height',parseInt(x)+20+'px');
				jQuery('#file'+i).css('height',x+'px');
			}
		}
		else if(type=='border_width')
		{
			var x= jQuery('#image_border_width').val();
			for(var i=1;i<=10;i++)
			{
				jQuery('#set_file'+i).css('border-width',x+'px');
			}
		}
		else if(type=='border_radius')
		{
			var x= jQuery('#image_border_radius').val();
			for(var i=1;i<=10;i++)
			{
				jQuery('#file'+i).css('border-radius',x+'px');
			}
		}
		else if(type=='border_style')
		{
			var x= jQuery('#border_style_image').val();
			for(var i=1;i<=10;i++)
			{
				jQuery('#set_file'+i).css('border-style',x);
			}
		}
		else if(type=='border_radius_div')
		{
			var x= jQuery('#div_border_radius').val();
			for(var i=1;i<=10;i++)
			{
				jQuery('#set_file'+i).css('border-radius',x+'px');
			}
		}
}

function Add_answer()
	{
		var textbox_count=0;

		jQuery(document).ready(function() {
			for(var i=1;i<=10;i++)
			{
				jQuery('#answer'+i).each(function() {
				if(!jQuery(this).prop('disabled'))
					{
						textbox_count++;				
					}
				});	
			}
		});

		jQuery('#hidden_value').val(parseInt(textbox_count+1));

		if(textbox_count==9)
		{
			jQuery('#add_answer').css('display','none');
		}
		if(textbox_count==2)
		{
			jQuery('#remove_answer').css('display','inline');
		}

			jQuery('#Admin_Menu').append("<label id='labelAnswer"+parseInt(textbox_count+1)+"' style='font-size:14px;color:#0073aa; '>Answer "+parseInt(textbox_count+1)+":</label> <br class='br_class"+parseInt(textbox_count+1)+"'> <input type='text' name='answer"+parseInt(textbox_count+1)+"' id='answer"+parseInt(textbox_count+1)+"' style='width:400px; border-radius:3px;' onchange='change("+parseInt(textbox_count+1)+")'/> <span id='span_answer"+parseInt(textbox_count+1)+"' style='color: red'></span> <br class='br_class"+parseInt(textbox_count+1)+"'>");
			jQuery('#colors_div').append("<label id='bg_color"+parseInt(textbox_count+1)+"' style='font-size:14px; color:#0073aa; '> Choose Background Color</label> <br class='bg_color_br"+parseInt(textbox_count+1)+"'> <input type='text' value='#c0c0c0' name='color"+parseInt(textbox_count+1)+"' id='color"+parseInt(textbox_count+1)+"' style='width: 170px;' onchange='ColorPicker("+parseInt(textbox_count+1)+",false);' /> <input type='color' value='#c0c0c0' id='color_div"+parseInt(textbox_count+1)+"' style='height: 23px; padding: 1px 3px;' onchange='ColorPicker("+parseInt(textbox_count+1)+",true);'> <br class='bg_color_br"+parseInt(textbox_count+1)+"'>");
			jQuery('#upload_div').append("<label id='labelUpload"+parseInt(textbox_count+1)+"' style='font-size:14px; color:#0073aa; '> Include File</label> <br class='upload_file_br"+parseInt(textbox_count+1)+"'> <input type='button' id='upload"+parseInt(textbox_count+1)+"'  value = 'Add image/video'> <br class='upload_file_br"+parseInt(textbox_count+1)+"'>");
			
		add_answers(parseInt(textbox_count+1));
		
	}
	function Remove_answer()
	{
		var textbox_count=0;

		jQuery(document).ready(function() {
			for(var i=1;i<=10;i++)
			{
				jQuery('#answer'+i).each(function() {
				if(!jQuery(this).prop('disabled'))
					{
						textbox_count++;				
					}
				});	
			}
		});
		jQuery('#hidden_value').val(textbox_count-1);
		if(textbox_count==10)
		{
			jQuery('#add_answer').css('display','inline');
		}
		if(textbox_count==3)
		{
			jQuery('#remove_answer').css('display','none');
		}

		jQuery('#labelAnswer'+textbox_count).remove();
		jQuery('#answer'+textbox_count).remove();
		jQuery('#span_answer'+textbox_count).remove();
		jQuery('.br_class'+textbox_count).remove();

		jQuery('#bg_color'+textbox_count).remove();
		jQuery('.bg_color_br'+textbox_count).remove();
		jQuery('#color'+textbox_count).remove();
		jQuery('#color_div'+textbox_count).remove();

		jQuery('#labelUpload'+textbox_count).remove();
		jQuery('.upload_file_br'+textbox_count).remove();
		jQuery('#upload'+textbox_count).remove();


		for(i=1; i<=10; i++)
		{
			if(i<textbox_count)
			{

				jQuery("#answer"+i).removeAttr('disabled');
				jQuery("#an"+i).fadeIn(100);	
				jQuery(".votes"+i).fadeIn(100);
				jQuery("#a"+i).fadeIn(100);
				jQuery("#set_file"+i).fadeIn(100);
			}
			else
			{					
				jQuery("#answer"+i).prop('disabled','true');
				jQuery(".votes"+i).fadeOut(100);
				jQuery("#an"+i).fadeOut(100);	
				jQuery("#a"+i).fadeOut(100);
				jQuery("#set_file"+i).fadeOut(100);

				if(jQuery('#span_answer'+i).html()!="")
				{
					jQuery('#span_answer'+i).html("");						
				}
			}
		}
	}

function add_answers(answers_count)
	{
		
		for(i=1; i<=10; i++)
			{
				if(i<=answers_count)
				{

					jQuery("#answer"+i).removeAttr('disabled');
					jQuery("#an"+i).fadeIn(100);	
					jQuery(".votes"+i).fadeIn(100);
					jQuery("#a"+i).fadeIn(100);
					jQuery("#set_file"+i).fadeIn(100);
				}
				else
				{					
					jQuery("#answer"+i).prop('disabled','true');
					jQuery(".votes"+i).fadeOut(100);
					jQuery("#an"+i).fadeOut(100);	
					jQuery("#a"+i).fadeOut(100);
					jQuery("#set_file"+i).fadeOut(100);

					if(jQuery('#span_answer'+i).html()!="")
					{
						jQuery('#span_answer'+i).html("");						
					}
				}
			}
			EnableUploads(3);
			EnableColors(2,4);	
	}

	function SelectType(image){

			jQuery('#'+image).css("width","130px");
			jQuery('#'+image).css("height","130px");
			
			ClearImages(image);
			ChangePicture(image);

			EnableUploads(3);
			EnableColors(2,4);
			Set_image();
		
			if(image[image.length-1]==2 || image[image.length-1]==3 )
			{				
					jQuery('#hover_div').css({"display":"inline"});
					jQuery('#HoverCheck').css({"opacity":"1"});
			}			
			else
			{
					jQuery('#hover_div').css({"display":"none"});
					jQuery('#HoverCheck').css({"opacity":"0"});
			}
			if(image[image.length-1]==1 )
			{
				jQuery('#Save_button').remove();
				jQuery('#fonts_div').append("<input type='submit'  id='Save_button' style='margin-right: 215px; float: right; width:130px; border-radius: 10px; color: white; text-align: center; background-color: #0073aa;' value='Save Changes' />");
				jQuery('#vote_buttons_div').css('width','400px');
				jQuery('#vote_buttons_div').css({"display":"inline"});
			}
			else
			{
				jQuery('#Save_button').remove();
				jQuery('#vote_buttons_div').css({"display":"none"});
			}
			if(image[image.length-1]==3)
			{
				jQuery('#image_div').css({"display":"inline"});
				jQuery('#hoverColor_label').html('Question`s bg-color: ');
			}
			else
			{
				jQuery('#image_div').css({"display":"none"});
				jQuery('#hoverColor_label').html('Hover Color: ');
			}
		}	
		function ClearImages(image2)
		{
			var img1=document.getElementById("img1");
			var img2=document.getElementById("img2");	
			var img3=document.getElementById("img3");	
			var img4=document.getElementById("img4");	
					
			var images= [img1,img2,img3,img4];		

			for(i=0; i<=3; i++)
			{
				if(images[i].id!=image2)
				{				
					jQuery('#'+images[i].id).css("border-style","none");
					jQuery('#'+images[i].id).css("width","120px");
					jQuery('#'+images[i].id).css("height","120px");
				}
			}			
		}

		function ChangePicture(image)
		{		

			var PrimalSrc=[];
			var ChangedSrc=[];				
			
				PrimalSrc[0]='http://juna-it.com/image/poll-1.png';
				PrimalSrc[1]='http://juna-it.com/image/poll-2.png';
				PrimalSrc[2]='http://juna-it.com/image/poll-3.png';
				PrimalSrc[3]='http://juna-it.com/image/poll-4.png';

				ChangedSrc[0]='http://juna-it.com/image/poll-11.png';
				ChangedSrc[1]='http://juna-it.com/image/poll-22.png';					
				ChangedSrc[2]='http://juna-it.com/image/poll-33.png';					
				ChangedSrc[3]='http://juna-it.com/image/poll-44.png';	

			if(jQuery('#'+image).css('width')=="130px")
			{
				jQuery('#'+image).attr('src',ChangedSrc[image[image.length-1]-1]);

			}
			
			for(i=0; i<4; i++)
			{
				if(images[i].id!=image)
				{
				 	jQuery('#'+images[i].id).attr('src',PrimalSrc[i]);
				}
				
			}
			

		}

		function WidgetStyle(field)
		{
			if(field=="bg")
			{
				var bg_color = document.getElementById('bg_color').value;
				document.getElementById('bg_div').style.background=bg_color;				
			}
			else if(field=="border")
			{
				var border = document.getElementById('border_color').value;
				document.getElementById('border_div').style.background=border;
			}
			else if(field=="answer")
			{
				var answer = document.getElementById('answer_color').value;
				document.getElementById('answer_div').style.background=answer;
			}
			else if(field=="question")
			{
				var question = document.getElementById('Question_color').value;
				document.getElementById('question_div').style.background=question;
			}
			else
			{
				return false;
			}
		}

		function Check()
		{
			var index;

			var img1=document.getElementById("img1");
			var img2=document.getElementById("img2");	
			var img3=document.getElementById("img3");	
			var img4=document.getElementById("img4");	
		
			var images= [img1,img2,img3,img4];

			for(i=0; i<4; i++)
			{
				if(images[i].style.width=="130px")
				{
					index=images[i].id;
					index=index[index.length-1];
				}
			}
			document.getElementById('img_id').value=index;
			
			return index;

		}

		function EnableUploads(k)
		{
			if(Check()!=k)
			{
				jQuery('#upload_div').css('display','none');
			}
			else
			{
				jQuery('#upload_div').css('display','inline');
			}
		}

		function EnableColors(k1,k2)
		{
			if(Check()!=k1 && Check()!=k2)
			{
				jQuery('#colors_div').css({"display":"none"});					
			}
			else if(Check()==k1 || Check()==k2)
			{				
				jQuery('#colors_div').css({"display":"inline"});
			}
		}

function Validate()
		{

			var answer=false;

			var Question=document.getElementById("question_id").value;
			
			var Answers=new Array();		

			var AnswersCount=document.getElementById("AnswersCount").value;

			for(i=1; i<=AnswersCount; i++)
			{
				Answers[i]=document.getElementById('answer'+i).value;
			}			

			if(Question=="")
			{
				document.getElementById('span_question').innerHTML="*";

				for(i=1; i<=AnswersCount; i++)
				{
					if(Answers[i]=="")
					{						
						document.getElementById('span_answer'+i).innerHTML="*";
					}
					else 
					{
						document.getElementById('span_answer'+i).innerHTML="";
						
					}
				}

				answer=false;	
			}
			else if(Question!="")
			{
				document.getElementById('span_question').innerHTML="";


				for(i=1; i<=AnswersCount; i++)
				{
					if(Answers[i]=="")
					{						
						document.getElementById('span_answer'+i).innerHTML="*";
					}
					else 
					{
						document.getElementById('span_answer'+i).innerHTML="";
						document.getElementById('ans'+i).text=Answers[i];

						
					}
				}
				
				for(i=1; i<=AnswersCount; i++)
				{
					if(Answers[i]=="")
					{						
						answer=false;
						break;
					}
					else if(i==AnswersCount)
					{
						answer=true;
					}
				}

			}
			return answer;
}



		function ColorPicker(pickerID,type)
		{
			var colors = ["aliceblue:#f0f8ff","antiquewhite:#faebd7","aqua:#00ffff",
			"aquamarine:#7fffd4","azure:#f0ffff", "beige:#f5f5dc","bisque:#ffe4c4",
			"black:#000000","blanchedalmond:#ffebcd","blue:#0000ff","blueviolet:#8a2be2",
			"brown:#a52a2a","burlywood:#deb887", "cadetblue:#5f9ea0","chartreuse:#7fff00",
			"chocolate:#d2691e","coral:#ff7f50","cornflowerblue:#6495ed","cornsilk:#fff8dc",
			"crimson:#dc143c","cyan:#00ffff", "darkblue:#00008b","darkcyan:#008b8b",
			"darkgoldenrod:#b8860b","darkgray:#a9a9a9","darkgreen:#006400","darkkhaki:#bdb76b",
			"darkmagenta:#8b008b","darkolivegreen:#556b2f", "darkorange:#ff8c00","darkorchid:#9932cc",
			"darkred:#8b0000","darksalmon:#e9967a","darkseagreen:#8fbc8f","darkslateblue:#483d8b",
			"darkslategray:#2f4f4f","darkturquoise:#00ced1", "darkviolet:#9400d3","deeppink:#ff1493",
			"deepskyblue:#00bfff","dimgray:#696969","dodgerblue:#1e90ff", "firebrick:#b22222",
			"floralwhite:#fffaf0","forestgreen:#228b22","fuchsia:#ff00ff", "gainsboro:#dcdcdc",
			"ghostwhite:#f8f8ff","gold:#ffd700","goldenrod:#daa520","gray:#808080","green:#008000",
			"greenyellow:#adff2f", "honeydew:#f0fff0","hotpink:#ff69b4", "indianred :#cd5c5c",
			"indigo:#4b0082","ivory:#fffff0","khaki:#f0e68c", "lavender:#e6e6fa","lavenderblush:#fff0f5",
			"lawngreen:#7cfc00","lemonchiffon:#fffacd","lightblue:#add8e6","lightcoral:#f08080",
			"lightcyan:#e0ffff","lightgoldenrodyellow:#fafad2", "lightgrey:#d3d3d3","lightgreen:#90ee90",
			"lightpink:#ffb6c1","lightsalmon:#ffa07a","lightseagreen:#20b2aa","lightskyblue:#87cefa",
			"lightslategray:#778899","lightsteelblue:#b0c4de", "lightyellow:#ffffe0",
			"lime:#00ff00","limegreen:#32cd32","linen:#faf0e6", "magenta:#ff00ff","maroon:#800000",
			"mediumaquamarine:#66cdaa","mediumblue:#0000cd","mediumorchid:#ba55d3","mediumpurple:#9370d8",
			"mediumseagreen:#3cb371","mediumslateblue:#7b68ee", "mediumspringgreen:#00fa9a","mediumturquoise:#48d1cc",
			"mediumvioletred:#c71585","midnightblue:#191970","mintcream:#f5fffa","mistyrose:#ffe4e1",
			"moccasin:#ffe4b5", "navajowhite:#ffdead","navy:#000080", "oldlace:#fdf5e6","olive:#808000",
			"olivedrab:#6b8e23","orange:#ffa500","orangered:#ff4500","orchid:#da70d6", "palegoldenrod:#eee8aa",
			"palegreen:#98fb98","paleturquoise:#afeeee","palevioletred:#d87093","papayawhip:#ffefd5","peachpuff:#ffdab9",
			"peru:#cd853f","pink:#ffc0cb","plum:#dda0dd","powderblue:#b0e0e6","purple:#800080", "red:#ff0000",
			"rosybrown:#bc8f8f","royalblue:#4169e1", "saddlebrown:#8b4513","salmon:#fa8072","sandybrown:#f4a460",
			"seagreen:#2e8b57","seashell:#fff5ee","sienna:#a0522d","silver:#c0c0c0","skyblue:#87ceeb","slateblue:#6a5acd",
			"slategray:#708090","snow:#fffafa","springgreen:#00ff7f","steelblue:#4682b4", "tan:#d2b48c","teal:#008080",
			"thistle:#d8bfd8","tomato:#ff6347","turquoise:#40e0d0", "violet:#ee82ee", "wheat:#f5deb3","white:#ffffff",
			"whitesmoke:#f5f5f5", "yellow:#ffff00","yellowgreen:#9acd32"];   

			if(type==true)
			{
				if(pickerID=='1')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a'+pickerID).css('border-color',col);
					}
				if(pickerID=='2')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a'+pickerID).css('border-color',col);
						
					}
				if(pickerID=='3')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a3').css('border-color',col);
						
					}
				if(pickerID=='4')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a4').css('border-color',col);

					}
				if(pickerID=='5')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a'+pickerID).css('border-color',col);
					}
				if(pickerID=='6')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a'+pickerID).css('border-color',col);
					}
				if(pickerID=='7')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a'+pickerID).css('border-color',col);
					}
				if(pickerID=='8')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a'+pickerID).css('border-color',col);
					}
				if(pickerID=='9')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a'+pickerID).css('border-color',col);
					}
				if(pickerID=='10')
					{
						var col=jQuery('#color_div'+pickerID).val();
						jQuery('#color'+pickerID).val(col);
						jQuery('#an'+pickerID).css('background-color',col);
						jQuery('#set_color'+pickerID).css('background-color',col);
						jQuery('#a'+pickerID).css('border-color',col);
					}
				if (pickerID=='bg') 
					{
						var col=jQuery('#bg_div').val();
						jQuery('#bg_color').val(col);
						jQuery('.plugins_type').css('background-color',col);
					}
				if (pickerID=='answer') 
					{
						var col=jQuery('#answer_div').val();
						jQuery('#answer_color').val(col);
						jQuery('.set_answer').css('color',col);
					}
				if (pickerID=='border') 
					{
						var col=jQuery('#border_div').val();
						jQuery('#border_color').val(col);
						jQuery('.plugins_type').css('border-color',col);
					}
				if (pickerID=='question') 
					{
						var col=jQuery('#quest_div').val();
						jQuery('#Question_color').val(col);
						jQuery('.questions_title').css('color',col);
					}
				if (pickerID=='col_pick')
					{
						var col=jQuery('#colorPickerhover').val();
						jQuery('#selectedHoverColor').val(col);
					}
				if (pickerID=='vote_button_color') 
					{
						var col=jQuery('#vote_button_div').val();
						jQuery('#vote_button_color').val(col);
						jQuery('#vote_button').css('background-color',col);
					}
				if (pickerID=='buttons_text_color') 
					{
						var col=jQuery('#buttons_text_div').val();
						jQuery('#buttons_text_color').val(col);
						jQuery('#vote_button').css('color',col);
					}
				if (pickerID=='votes_color') 
					{
						var col=jQuery('#votes_color').val();
						jQuery('#votes_text_color').val(col);
					}
				if (pickerID=='border_color_image')
					{
						var col=jQuery('#border_div_image').val();
						jQuery('#border_color_image').val(col);
						for(var i=1;i<=10;i++)
						{
							jQuery('#set_file'+i+'').css('border-color',col);
						}
					}
			}
			else
			{
				if(pickerID=='1')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='2')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='3')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='4')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='5')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='6')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='7')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='8')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='9')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='10')
					{
						var text=jQuery('#color'+pickerID).val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#color_div'+pickerID).val(text);
							jQuery('#an'+pickerID).css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#color_div'+pickerID).val(k[1]);
										jQuery('#an'+pickerID).css('background-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='bg')
					{
						var text=jQuery('#bg_color').val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#bg_div').val(text);
							jQueryt('.plugins_type').css('background-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#bg_div').val(k[1]);
										jQueryt('.plugins_type').css('background-color',k[1])
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='border')
					{
						var text=jQuery('#border_color').val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#border_div').val(text);
							jQueryt('.plugins_type').css('border-color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#border_div').val(k[1]);
										jQueryt('.plugins_type').css('border-color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='answer')
					{
						var text=jQuery('#answer_color').val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#answer_div').val(text);
							jQuery('.set_answer').css('color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#answer_div').val(k[1]);
										jQuery('.set_answer').css('color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='question')
					{
						var text=jQuery('#Question_color').val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#quest_div').val(text);
							jQuery('.questions_title').css('color',text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#quest_div').val(k[1]);
										jQuery('.questions_title').css('color',k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='col_pick')
					{
						var text=jQuery('#selectedHoverColor').val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#colorPickerhover').val(text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#colorPickerhover').val(k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='vote_button_color')
					{
						var text=jQuery('#vote_button_color').val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#vote_button_div').val(text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#vote_button_div').val(k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='buttons_text_color')
					{
						var text=jQuery('#buttons_text_color').val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#buttons_text_div').val(text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#buttons_text_div').val(k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='votes_color')
					{
						var text=jQuery('#votes_text_color').val().toLowerCase();

						if(text[0]=="#")
						{
							jQuery('#votes_color').val(text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										jQuery('#votes_color').val(k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}
				if(pickerID=='border_color_image')
					{
						var text=jQuery('#border_color_image').val().toLowerCase();

						if(text[0]=="#")
						{
							for(var i=1;i<=10;i++)
							{
								jQuery('#set_file'+i+'').css('border-color',text);
							}
							jQuery('#border_div_image').val(text);
						}	
						else
						{
							for(i=0; i<colors.length;i++)
								{
									var k=colors[i].split(':');
									if(k[0]==text)
									{	
										for(var i=1;i<=10;i++)
										{
											jQuery('#set_file'+i+'').css('border-color',k[1]);
										}
										jQuery('#border_div_image').val(k[1]);
										break;
									}
									else
									{
										continue;
									}
								}
						}		
					}																					
			}
			
		}
function ActivateHover()
{
	if(jQuery('#HoverCheck').attr('checked'))
	{
			jQuery('#selectedHoverColor').removeAttr('disabled');
			jQuery('#colorPickerhover').removeAttr('disabled');				
	}
	else
	{
			jQuery('#selectedHoverColor').prop('disabled','true');
			jQuery('#colorPickerhover').prop('disabled','true');	
	}
}
function ChangeFont(type)
{			
	  if(type=="true")
	 {		
		var fontSize=jQuery('#fontSize').val();
	 	jQuery('.questions_title').css('font-size',fontSize+'px');
	 }
	 else if(type=="false")
	 {
	 	var fontFamily=jQuery('#Text_Font').val();
	 	jQuery('.questions_title').css('font-family',fontFamily);		 	
	 }
	 else if(type=='hoplo')
	 {
	 	var fontFamily=jQuery('#Answer_Font').val();
	 	jQuery('.set_answer').css('font-family',fontFamily);
	 }
	 else if(type=="yupi")
	 {
		var fontSize=jQuery('#AnswerSize').val();
	 	jQuery('.set_answer').css('font-size',fontSize+'px');		 	
	 }
}
function Set_image()
{
	var x=jQuery('#img_id').val();
	
	if(x==1)
	{	
		jQuery('#plugins_type4').css({"display":"none"});
		jQuery('#plugins_type3').css({"display":"none"});
		jQuery('#plugins_type2').css({"display":"none"});
		jQuery('#plugins_type1').css({"display":"inline"});
	}
	else if(x==2)
	{	
		jQuery('#plugins_type4').css({"display":"none"});
		jQuery('#plugins_type3').css({"display":"none"});
		jQuery('#plugins_type1').css({"display":"none"});
		jQuery('#plugins_type2').css({"display":"inline"});
	}

	else if(x==3)
	{
		jQuery('#plugins_type4').css({"display":"none"});
		jQuery('#plugins_type2').css({"display":"none"});
		jQuery('#plugins_type1').css({"display":"none"});
		jQuery('#plugins_type3').css({"display":"inline"});
	}
	else if(x==4)
	{
		jQuery('#plugins_type1').css({"display":"none"});
		jQuery('#plugins_type2').css({"display":"none"});
		jQuery('#plugins_type3').css({"display":"none"});
		jQuery('#plugins_type4').css({"display":"inline"});	
		
	}
}
function changed_question(){
	jQuery('#question_id').each(function(){
	var c=jQuery(this).val();
	jQuery(".questions_title").text(c);
	})
	}

function change(i){
	jQuery('#answer'+i).each(function(){
	var z=jQuery(this).val();
	jQuery('#ans'+i).text(z);
	jQuery('#an'+i).text(z);
	jQuery('#set_answer'+i).text(z);
	jQuery('#answ'+i).text(z);
	})

}	
function Juna_IT_Poll_Create_New_Poll_Clicked()
{
	jQuery('#Juna_IT_Poll_main_first_div').fadeOut();
	setTimeout(function(){
		jQuery('#AdminForm').fadeIn(); 
		jQuery('#plugins_type1').fadeIn();
		// jQuery('.Add_new_Video_Gallery_Save_button').fadeIn();
		// jQuery('.Add_new_Video_Gallery_Update_button').fadeOut();
	}, 500);
}
function Delete_Juna_IT_Poll(Juna_IT_Poll_id)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Delete_Juna_IT_Poll_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Juna_IT_Poll_id, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	});
}
function Edit_Juna_IT_Poll(Juna_IT_Poll_id,Juna_IT_Poll_PluginType)
{
	jQuery('#Juna_IT_Poll_main_first_div').fadeOut();
	setTimeout(function(){
		jQuery('#AdminForm').fadeIn(); 
		jQuery('#plugins_type'+Juna_IT_Poll_PluginType+'').fadeIn();
		// jQuery('.Add_new_Video_Gallery_Save_button').fadeIn();
		// jQuery('.Add_new_Video_Gallery_Update_button').fadeOut();
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'Edit_Juna_IT_Poll_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: Juna_IT_Poll_id, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var question_and_params=response.split('$#@#$');
			var quest_and_set=question_and_params[0].split('%^&^%');
			// question
			jQuery('#question_id').val(quest_and_set[0]);
				jQuery('.questions_title').html(quest_and_set[0]);
			// border_color
			jQuery('#border_color').val(quest_and_set[1]);
				jQuery('#border_div').val(quest_and_set[1]);
				jQuery('.plugins_type').css('border-color',quest_and_set[1]);
			// bg_color
			jQuery('#bg_color').val(quest_and_set[2]);
				jQuery('#bg_div').val(quest_and_set[2]);
				jQuery('.plugins_type').css('background-color',quest_and_set[2]);
			// font_family
			jQuery('#Text_Font').val(quest_and_set[3]);
				jQuery('.questions_title').css('font-family',quest_and_set[3]);
			// font_size
			jQuery('#fontSize').val(quest_and_set[4]);
				jQuery('.questions_title').css('font-size',quest_and_set[4]+'px');
			// answer_color
			jQuery('#answer_color').val(quest_and_set[5]);
				jQuery('#answer_div').val(quest_and_set[5]);
				jQuery('.set_answer').css('color',quest_and_set[5]);
			// answer_hover_color
			if(quest_and_set[6]!='none')
			{
				jQuery('#HoverCheck').attr('checked',true);
				ActivateHover();
				jQuery('#selectedHoverColor').val(quest_and_set[6]);
				jQuery('#colorPickerhover').val(quest_and_set[6]);
			}
			// question_color
			jQuery('#Question_color').val(quest_and_set[7]);
				jQuery('#quest_div').val(quest_and_set[7]);
				jQuery('.questions_title').css('color',quest_and_set[7]);
			// vote_button_color
			jQuery('#vote_button_color').val(quest_and_set[8]);
				jQuery('#vote_button_div').val(quest_and_set[8]);
				jQuery('#vote_button').css('background-color',quest_and_set[8]);
			// buttons_text_color
			jQuery('#buttons_text_color').val(quest_and_set[9]);
				jQuery('#buttons_text_div').val(quest_and_set[9]);
				jQuery('#vote_button').css('color',quest_and_set[9]);
			// widget_div_width
			jQuery('#widg_width').val(quest_and_set[10]);
				jQuery('.plugins_type').css('width',quest_and_set[10]+'px');
			// vote_type
			jQuery('.Votes_type_radio').each(function(){
				if(jQuery(this).val()==quest_and_set[11]){
					jQuery(this).attr('checked','checked');
				}
			})
			// vote_color
			jQuery('#votes_text_color').val(quest_and_set[12]);
				jQuery('#votes_color').val(quest_and_set[12]);
			// image_width
			if(quest_and_set[13]!=0)
			{
				jQuery('#image_width').val(quest_and_set[13]);
				for(var i=1;i<=10;i++)
				{
					jQuery('#set_file'+i).css('width',quest_and_set[13]+'px');
					jQuery('#file'+i).css('width',quest_and_set[13]+'px');
				}
			}				
			// image_height
			if(quest_and_set[14]!=0)
			{
				jQuery('#image_height').val(quest_and_set[14]);
				for(var i=1;i<=10;i++)
				{
					jQuery('#set_file'+i).css('height',parseInt(quest_and_set[14])+20+'px');
					jQuery('#file'+i).css('height',quest_and_set[14]+'px');
				}
			}	
			// answer_font_family
			jQuery('#Answer_Font').val(quest_and_set[15]);
				jQuery('.set_answer').css('font-family',quest_and_set[15]);
			// answer_font_size
			jQuery('#AnswerSize').val(quest_and_set[16]);
				jQuery('.set_answer').css('font-size',quest_and_set[16]+'px');
			//image_border_width
			jQuery('#image_border_width').val(quest_and_set[17]);
				for(var i=1;i<=10;i++)
				{
					jQuery('#set_file'+i).css('border-width',quest_and_set[17]+'px');
				}
			//image_border_radius
			jQuery('#image_border_radius').val(quest_and_set[18]);
			for(var i=1;i<=10;i++)
			{
				jQuery('#file'+i).css('border-radius',quest_and_set[18]+'px');
			}
			//div_border_radius
			jQuery('#div_border_radius').val(quest_and_set[19]);
				for(var i=1;i<=10;i++)
				{
					jQuery('#set_file'+i).css('border-radius',quest_and_set[19]+'px');
				}
			//border_color_image
			jQuery('#border_div_image').val(quest_and_set[20]);
				jQuery('#border_color_image').val(quest_and_set[20]);
				for(var i=1;i<=10;i++)
				{
					jQuery('#set_file'+i+'').css('border-color',quest_and_set[20]);
				}

			//border_style_image
			jQuery('#border_style_image').val(quest_and_set[21]);
				for(var i=1;i<=10;i++)
				{
					jQuery('#set_file'+i).css('border-style',quest_and_set[21]);
				}

			var answer_and_ansset=question_and_params[1].split(')^%^(');
						
			add_answers(quest_and_set[22]);
			jQuery('#hidden_value').val(quest_and_set[22]);
			if(quest_and_set[22]>2)
			{
				jQuery('#remove_answer').css('display','inline');
			}

			SelectType('img'+Juna_IT_Poll_PluginType);

			for(i=0;i<quest_and_set[22];i++)
			{
				if(parseInt(i+1)>2)
				{
					jQuery('#Admin_Menu').append("<label id='labelAnswer"+parseInt(i+1)+"' style='font-size:14px;color:#0073aa; '>Answer "+parseInt(i+1)+":</label> <br class='br_class"+parseInt(i+1)+"'> <input type='text' name='answer"+parseInt(i+1)+"' id='answer"+parseInt(i+1)+"' style='width:400px; border-radius:3px;' onchange='change("+parseInt(i+1)+")'/> <span id='span_answer"+parseInt(i+1)+"' style='color: red'></span> <br class='br_class"+parseInt(i+1)+"'>");
					jQuery('#colors_div').append("<label id='bg_color"+parseInt(i+1)+"' style='font-size:14px; color:#0073aa; '> Choose Background Color</label> <br class='bg_color_br"+parseInt(i+1)+"'> <input type='text' value='#c0c0c0' name='color"+parseInt(i+1)+"' id='color"+parseInt(i+1)+"' style='width: 170px;' onchange='ColorPicker("+parseInt(i+1)+",false);' /> <input type='color' value='#c0c0c0' id='color_div"+parseInt(i+1)+"' style='height: 23px; padding: 1px 3px;' onchange='ColorPicker("+parseInt(i+1)+",true);'> <br class='bg_color_br"+parseInt(i+1)+"'>");
					jQuery('#upload_div').append("<label id='labelUpload"+parseInt(i+1)+"' style='font-size:14px; color:#0073aa; '> Include File</label> <br class='upload_file_br"+parseInt(i+1)+"'> <input type='button' id='upload"+parseInt(i+1)+"'  value = 'Add image/video'> <br class='upload_file_br"+parseInt(i+1)+"'>");
				}		
				answers_and_anssets=answer_and_ansset[i].split('%***%');
				// answers
				jQuery('#answer'+parseInt(i+1)+'').val(answers_and_anssets[0]);
					jQuery('#ans'+parseInt(i+1)).text(answers_and_anssets[0]);
					jQuery('#an'+parseInt(i+1)).text(answers_and_anssets[0]);
					jQuery('#set_answer'+parseInt(i+1)).text(answers_and_anssets[0]);
					jQuery('#answ'+parseInt(i+1)).text(answers_and_anssets[0]);
				// Answer_bg_color
				jQuery('#color'+parseInt(i+1)+'').val(answers_and_anssets[2]);
					jQuery('#color_div'+parseInt(i+1)+'').val(answers_and_anssets[2]);
					jQuery('#an'+parseInt(i+1)).css('background-color',answers_and_anssets[2]);
					jQuery('#set_color'+parseInt(i+1)).css('background-color',answers_and_anssets[2]);
					jQuery('#a'+parseInt(i+1)).css('border-color',answers_and_anssets[2]);
				// file
				if(answers_and_anssets[1]!='none')
				{
					jQuery('#upload'+parseInt(i+1)+'11').val(answers_and_anssets[1]);
					jQuery('#file'+parseInt(i+1)+'').attr('src',answers_and_anssets[1]);
				}
			}
		});
	}, 500);
}
function Juna_IT_Poll_Search_Question()
{
	setInterval(function(){
		var Juna_IT_Poll_Searched_Question=jQuery('#Juna_IT_Poll_search_text_field').val();
		if(Juna_IT_Poll_Searched_Question!='')
		{
			var ajaxurl = object.ajaxurl;
			var data = {
			action: 'Search_Juna_IT_Poll_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
			foobar: Juna_IT_Poll_Searched_Question, // translates into $_POST['foobar'] in PHP
			};
			jQuery.post(ajaxurl, data, function(response) {
				if(response=='')
				{
					jQuery('#searched_question_does_not_exist').html('* Requested Question does not exist!');
					jQuery('.Juna_IT_Poll_Table1').hide();
					jQuery('.Juna_IT_Poll_Table').show();
				}
				else
				{
					jQuery('#searched_question_does_not_exist').html('');
					jQuery('.Juna_IT_Poll_Table').hide();
					jQuery('.Juna_IT_Poll_Table1').show();
					jQuery('.Juna_IT_Poll_Table1').empty();

					var searched_params=response.split(')&*&(');
					for(i=0;i<parseInt(searched_params.length-1);i++)
					{
						searched_params_callback=searched_params[i].split("^%^");
						if(searched_params_callback[2]==1)
						{
							var plugins_type_span='Standart Poll';
						}
						else if(searched_params_callback[2]==2)
						{
							var plugins_type_span='Pie Chart';
						}
						else if(searched_params_callback[2]==3)
						{
							var plugins_type_span='Image/Video';
						}
						else
						{
							var plugins_type_span='Column Chart';
						}

						jQuery('.Juna_IT_Poll_Table1').append("<tr><td class='Juna_IT_Poll_id_item'><B><I>"+parseInt(i+1)+"</I></B></td><td class='Juna_IT_Poll_title_item'><B><I>"+searched_params_callback[1]+"</I></B></td><td class='Juna_IT_Poll_type_item'><B><I>"+plugins_type_span+"</I></B></td><td class='Juna_IT_Poll_edit_item' onclick='Edit_Juna_IT_Poll("+searched_params_callback[0]+','+searched_params_callback[2]+")'><B><I>Edit</I></B></td><td class='Juna_IT_Poll_delete_item' onclick='Delete_Juna_IT_Poll("+searched_params_callback[0]+")'><B><I>Delete</I></B></td></tr>");
					}
				}
			});
		}
		else
		{
			jQuery('.Juna_IT_Poll_Table1').hide();
			jQuery('.Juna_IT_Poll_Table').show();
		}
	}, 600);
}
function Juna_IT_Poll_Reset_Button_Clicked()
{
	jQuery('#Juna_IT_Poll_search_text_field').val('');
	jQuery('#searched_question_does_not_exist').html('');
	jQuery('.Juna_IT_Poll_Table1').hide();
	jQuery('.Juna_IT_Poll_Table').show();
}	