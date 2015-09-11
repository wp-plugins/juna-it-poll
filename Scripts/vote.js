	jQuery(document).ready(function(){

		var cook=document.cookie;
		var f=cook.indexOf("customer");
		if(cook.indexOf("customer")>=0)
		{			
			var quest=jQuery('#ActiveQuestion').html();
			if(cook.indexOf(quest.trim())<0)
			{				
				return false;
			}	

			var ajaxurl = object.ajaxurl;
		  	var data = {
		    	action: 'GetResults', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: quest, // translates into $_POST['foobar'] in PHP				
			};
			jQuery.post(ajaxurl, data, function(response) {	

					if(jQuery('#p_id').html()=='1' && cook[f+8]=='1')
					{

						setTimeout(function() {
							jQuery('#widgetDiv').css('display','inline');
							jQuery('#answers_div').css('display','inline');
						},200)

						var ques_color=document.getElementById('ActiveQuestion').style.color;
						var ques_font_family=document.getElementById('ActiveQuestion').style.fontFamily;
						var ques_font_size=document.getElementById('ActiveQuestion').style.fontSize;

						var ans_color=document.getElementById('span_ans_id').style.color;

					 var k=0;

					 	jQuery(':radio').each(function() {
					 		k++;
					 	});					

					 	var answers = [];

					 	for(i=1; i<=k; i++)
					 	{
					 		answers[answers.length]=jQuery('#answer'+i).val();
					 	}	

					 	var hoplo=response.split('%^&^%');
					 	var counts=hoplo[2].split("^");

					 	var results=[];

					 	for(i=0; i<counts.length; i++)
					 	{
					 		if(counts[i]=="")
					 		{
					 			continue;
					 		}
					 		else
					 		{
					 			results[results.length]=counts[i];
					 		}
					 	}

					 	var sum=0;
					 	var widths = [];
					 	for(i=0; i<results.length; i++)
					 	{
					 		sum=sum+parseInt(results[i]);
					 	}

					 	if(sum==0) sum=1;
						
					 	for(i=0; i<results.length; i++)
					 	{			
					 		widths[widths.length]=(results[i]*100)/sum;						
					 	}				
							
					 	if(hoplo[0]=='percent')
					 	{
					 		jQuery('#widgetDiv').empty();
					 						 	
						 	jQuery('#widgetDiv').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color:"+ ques_color +"'>"+ quest +"</span></div>");

						 	for(i=1; i<=k; i++)
							{
								jQuery('#widgetDiv').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span style='color:"+hoplo[1]+"'> &nbsp; <i>("+ (parseFloat(widths[i-1]).toFixed(1)+'%') + ")</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
							}
					 	}
					 	else if(hoplo[0]=='vote')
					 	{

					 		jQuery('#widgetDiv').empty();
					 						 	
						 	jQuery('#widgetDiv').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color:"+ ques_color +"'>"+ quest +"</span></div>");

						 	for(i=1; i<=k; i++)
							{
								jQuery('#widgetDiv').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span style='color:"+hoplo[1]+"'> &nbsp; <i>"+ (parseInt(results[i-1])+' votes') + "</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
							}
					 	}	
					 	else
					 	{
					 		jQuery('#widgetDiv').empty();
					 						 	
						 	jQuery('#widgetDiv').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color:"+ ques_color +"'>"+ quest +"</span></div>");

						 	for(i=1; i<=k; i++)
							{
								jQuery('#widgetDiv').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span style='color:"+hoplo[1]+"'> &nbsp; <i>"+ parseFloat(widths[i-1]).toFixed(1)+'%' +' ('+ (parseInt(results[i-1])+' votes') + ')'+ "</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
							}
					 	}			
					}
			});
		}
	})
	
	function Vote_Click()
	{
			 var Active_question=document.getElementById('ActiveQuestion').innerHTML;
			 var x;		
			jQuery(':radio').each(function() {
				
				if(jQuery(this).is(':checked'))
				{			
					x=jQuery(this).val();
				}
			});
			 var t=Active_question+'^'+x;

			 if(typeof x === 'undefined')
			 {
			 	alert("Please Select Answer");
			 	return false;
			 }


			var ajaxurl = object.ajaxurl;
		  	var data = {
		    	action: 'Vote_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: t, // translates into $_POST['foobar'] in PHP				
			};
			jQuery.post(ajaxurl, data, function(response) {

				 var ques_color=document.getElementById('ActiveQuestion').style.color;
				 var ques_font_family=document.getElementById('ActiveQuestion').style.fontFamily;
				 var ques_font_size=document.getElementById('ActiveQuestion').style.fontSize;

				 var ans_color=document.getElementById('span_ans_id').style.color;
				
				/* answers */
				 var k=0;

				 	jQuery(':radio').each(function() {
				 		k++;
				 	});					

				 	var answers = [];

				 	for(i=1; i<=k; i++)
				 	{
				 		answers[answers.length]=jQuery('#answer'+i).val();
				 	}				

				 	setTimeout(function() {
				 		jQuery('#widgetDiv').fadeOut();
				 	},100);

				 	/* Results Data from Ajax */

				 	var hoplo=response.split('%^&^%');
					var counts=hoplo[2].split("^");
					
				 	var results=[];

				 	for(i=0; i<counts.length; i++)
				 	{
				 		if(counts[i]=="")
				 		{
				 			continue;
				 		}
				 		else
				 		{
				 			results[results.length]=counts[i];
				 		}
				 	}

				 	/* data that will be shown in the widget */
				 	var sum=0;
				 	var widths = [];
				 	for(i=0; i<results.length; i++)
				 	{
				 		sum=sum+parseInt(results[i]);
				 	}

				 	if(sum==0) sum=1;
					
				 	for(i=0; i<results.length; i++)
				 	{			
				 		widths[widths.length]=(results[i]*100)/sum;						
				 	}				
						
				 	window.clearInterval();

				 	if(hoplo[0]=='percent')
				 	{
				 		setTimeout(function() {
						 	jQuery('#widgetDiv').empty();		 						 	

						 	jQuery('#widgetDiv').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color: "+ques_color+";'>"+ Active_question  +"</span> </div> ");

						 	for(i=1; i<=k; i++)
							 	{
							 		jQuery('#widgetDiv').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span style='color:"+hoplo[1]+"'> &nbsp; <i>("+ (parseFloat(widths[i-1]).toFixed(1)+'%') + ")</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
							 	}	
						 	
						 	jQuery('#widgetDiv').fadeIn();

				 		},500);
				 	}
				 	else if(hoplo[0]=='vote')
				 	{
				 		setTimeout(function() {
						 	jQuery('#widgetDiv').empty();		 						 	

						 	jQuery('#widgetDiv').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color: "+ques_color+";'>"+ Active_question  +"</span> </div> ");

						 	for(i=1; i<=k; i++)
							 	{
							 		jQuery('#widgetDiv').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span style='color:"+hoplo[1]+"'> &nbsp; <i>"+ (parseInt(results[i-1])+' votes') + "</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
							 	}	
						 	
						 	jQuery('#widgetDiv').fadeIn();

				 		},500);
				 	}
				 	else
				 	{
				 		setTimeout(function() {
						 	jQuery('#widgetDiv').empty();		 						 	

						 	jQuery('#widgetDiv').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color: "+ques_color+";'>"+ Active_question  +"</span> </div> ");

						 	for(i=1; i<=k; i++)
							 	{
							 		jQuery('#widgetDiv').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span style='color:"+hoplo[1]+"'> &nbsp; <i>"+ parseFloat(widths[i-1]).toFixed(1)+'%' +' ('+ (parseInt(results[i-1])+' votes') + ')' + "</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
							 	}	
						 	
						 	jQuery('#widgetDiv').fadeIn();

				 		},500);
				 	}

				 	document.cookie="username=customer1"+Active_question.trim()+";";
			});
}	