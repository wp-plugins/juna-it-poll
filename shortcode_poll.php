<?php
add_shortcode('Juna_IT_Poll','Juna_IT_Poll_Shortcode');
	function Juna_IT_Poll_Shortcode($atts)
	{
		  extract(shortcode_atts(array(
        'id' => 'no Juna_It Poll',
    
    	), $atts));

    	return Juna_it_Poll_shortcode_draw($atts['id']);
	}

	function Juna_it_Poll_shortcode_draw($selected_id)
	{
		
		global $wpdb;

 		$table_name  = $wpdb->prefix . "poll_wp_Answers";	
 		$table_name1 = $wpdb->prefix . "poll_wp_Questions";	
 		$table_name3 = $wpdb->prefix . "poll_wp_Results";	
		$table_name4 = $wpdb->prefix . "poll_wp_Settings";

		$Question=$wpdb->get_var($wpdb->prepare("SELECT Question FROM $table_name1 WHERE id=%d",$selected_id));

		$params=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE QuestionID=%d",$selected_id));

		$q=addslashes($Question);

		$selected_quest=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE Question= %s", $q));

		$selected_quest=$selected_quest[0]->id;

		$answers=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE QuestionID= %s", $selected_quest));
				   
		$sum=$wpdb->get_var($wpdb->prepare("SELECT Sum(Count) FROM $table_name3 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)", $q));

		$result_data=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE QuestionID=(SELECT id FROM $table_name1 WHERE Question= %s)", $q));

 		$plugintype=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE Question= %s", $q));

 		$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE QuestionID=(SELECT id FROM $table_name WHERE Question= %s)", $q));

		$color=$results[0]->answer_hover_color;

 		?>
 		<script>
 		
 		function DrawDivAfterVote()
 		{

		var cook=document.cookie;
		var f=cook.indexOf("visitor");
		if(cook.indexOf("visitor")>=0)
		{			
			var quest=jQuery('#Active_Question').html();

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
			
		

					if(jQuery('#pt_id').html()=='1' && cook[f+7]=='1')
					{

						setTimeout(function() {
							jQuery('#widget_div').css('display','inline');
							jQuery('#AnswersDiv').css('display','inline');
						},200)

						var ques_color=document.getElementById('Active_Question').style.color;
						var ques_font_family=document.getElementById('Active_Question').style.fontFamily;
						var ques_font_size=document.getElementById('Active_Question').style.fontSize;

						var ans_color=document.getElementById('span_answer_id').style.color;

					 var k=0;

					 	jQuery(':radio').each(function() {
					 		k++;
					 	});					

					 	var answers = [];

					 	for(i=1; i<=k; i++)
					 	{
					 		answers[answers.length]=jQuery('#answer'+i).val();
					 	}	

					 	var counts=response.split("^");

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
							
					 	jQuery('#widget_div').empty();
					 						 	
					 	jQuery('#widget_div').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color:"+ ques_color +"'>"+ quest +"</span></div>");

					 	for(i=1; i<=k; i++)
						 	{
						 		jQuery('#widget_div').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span> &nbsp; <i>("+ (parseFloat(widths[i-1]).toFixed(1)+'%') + ")</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
						 	}	
					}

					else if(jQuery('#pt_id').html()=='2' && cook[f+7]=='2')
					{
						var bgColor=jQuery('#widget_div').css("background-color");

						var k=0;
						jQuery('#AnswersDiv').find("span").each(function() {
							k++;
						})	

						var answers = [];

					 	for(i=1; i<=k; i++)
					 	{
					 		answers[answers.length]=jQuery('#span_answer'+i).html();

					 	}	

				 	/* Results Data from Ajax */

					 	var counts=response.split("^");	

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

						var colors =[];
						
							for(i=1; i<=k; i++)
							{
								colors[colors.length]=jQuery('#div_answer'+i).css('background-color');
							}
					
						var dataSource= [];					

						for(i=0; i<k; i++)
						{	
							dataSource[dataSource.length]= {name: answers[i],  y: widths[i], sliced: false, selected: true, color: colors[i]};
						}	

						setTimeout(function() {

					/* Drawing a chart */
								
							jQuery('#DrawDiagramDiv').css({"display":"inline"});

							jQuery('#DrawDiagramDiv').drawdiagram({
					        chart: {
					            type: 'pie',
					            height: 500,
					            backgroundColor: bgColor,		            
					            options3d: {
					                enabled: true,
					                alpha: 45,
					                beta: 0
					            }
					        },
					         legend:
			                    {
			                    	 	align: 'left',
									    layout: 'horizontal',
									    verticalAlign: 'bottom',
									    x: 20,
									    y: 20,
									    itemMarginTop: 10,
			            				itemMarginBottom: 10
			                    } ,   
					        title: {
					            text: quest
					        },
					        tooltip: {
					            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					        },
					        plotOptions: {
					            pie: {
					                allowPointSelect: true,
					                cursor: 'pointer',
					                depth: 35,
					          dataLabels: {
			                    enabled: true,
			                    distance: -50,
			                      format: ' {point.percentage:.1f} %',
			                    style: {
			                        fontWeight: 'bold',
			                        color: 'white',
			                        textShadow: '0px 1px 2px black'
			                    } ,
			                },
			                showInLegend: true
					            }
					        },
					        series: [{
					            type: 'pie',
					            name: 'Browser share',
					            data: dataSource
					        }]
					    });
							}, 500);
					}

			else if(jQuery('#pt_id').html()=='3' && cook[f+7]=='3' )
			{
								
				setTimeout(function() {
							jQuery('#widget_div').css('display','inline');
							jQuery('#AnswersDiv').css('display','inline');
						},10)
				
					var Active_question=document.getElementById('Active_Question').innerHTML;

					var k=0;
					jQuery('#All_Answers').find("img").each(function() {
						k++;
					})	
						var counts=response.split("^");
					
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

				var h=jQuery('#widget_div').css('height');

				jQuery('#widget_div').css('height',h);
				
					jQuery('#All_Answers').fadeIn();

					for(i=1;i<=k;i++)
					{
						jQuery('#Vote_Screen_Div'+i).css('display','inline');	
						jQuery('#Vote_Screen_Div'+i).css('opacity','0.8');
						jQuery('#P3SpanCount'+i).html(parseFloat(widths[i-1]).toFixed(1)+'%');

					}

			}

			else if(jQuery('#pt_id').html()=='4' && cook[f+7]=='4')
			{
					
	 			 var Active_question=document.getElementById('Active_Question').innerHTML;

					 var k=0;
								jQuery('#AnswersDiv').find("span").each(function() {
									k++;
								})	

					var OldColors= [];

					for(i=1;i<=k;i++)
					{
						OldColors[OldColors.length]=jQuery('#P4SectionID'+i).css('background-color');
					}

					var answers = [];

				 	for(i=1; i<=k; i++)
				 	{
				 		answers[answers.length]=jQuery('#P4SpanID'+i).html();
				 	}	

				 	/* Results Data from Ajax */

				 	var counts=response.split("^");

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

				 	/* data that will be shown in the widget */

				 	var colors =[];					

					for(i=1; i<=k; i++)
					{
						colors[colors.length]=jQuery('#P4SectionID'+i).css('background-color');
					}

					var dataSource= [];					

					for(i=0; i<k; i++)
					{	
						dataSource[dataSource.length]= {name: answers[i],  y: widths[i], color: OldColors[i]};
					}	

					setTimeout(function() {
					jQuery('#widget_div').hide();	

					/* Drawing a chart */

						jQuery('#DrawDiagramDiv').css({"display":"inline"});

						   jQuery('#DrawDiagramDiv').drawdiagram({
						        chart: {
						            type: 'column'
						        },
						        title: {
						            text: Active_question
						        },						        
						        xAxis: {
						            type: 'category',
						            labels: {
						                rotation: -45,
						                style: {
						                    fontSize: '12px',
						                    fontFamily: 'Verdana, sans-serif'		                    
						                }
						            }
						        },
						        yAxis: {
						            min: 0,						           
						            enabled: false,
						            title: {
						               
						            }
						        },
						        legend: {
						            enabled: false
						        },
						        tooltip: {
						            pointFormat: 'Counts: <b>{point.y:.1f} %</b>'
						        },
						        series: [{
						            name: 'Results',
						            colorByPoint: true,
						            data: dataSource,
						            dataLabels: {
						                enabled: true,
						                rotation: -90,
						                color: 'white',
						                align: 'right',
						                format: '{point.y:.1f}', // one decimal
						                y: 10, // 10 pixels down from the top
						                style: {
						                    fontSize: '10px',
						                    fontFamily: 'Verdana, sans-serif',
						                }
						            }
				        }]
     });

				},1);

			}
			});
		}
	}
	
	function Vote_Cllick()
	{

			 var Active_question=document.getElementById('Active_Question').innerHTML;
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

				 var ques_color=document.getElementById('Active_Question').style.color;
				 var ques_font_family=document.getElementById('Active_Question').style.fontFamily;
				 var ques_font_size=document.getElementById('Active_Question').style.fontSize;

				 var ans_color=document.getElementById('span_answer_id').style.color;
				
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
				 		jQuery('#widget_div').fadeOut();
				 	},100);

				 	/* Results Data from Ajax */

				 	var counts=response.split("^");
					
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

				 	setTimeout(function() {
				 		jQuery('#widget_div').empty();		 						 	

				 	jQuery('#widget_div').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color: "+ques_color+";'>"+ Active_question  +"</span> </div> ");

				 	for(i=1; i<=k; i++)
					 	{
					 		jQuery('#widget_div').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span> &nbsp; <i>("+ (parseFloat(widths[i-1]).toFixed(1)+'%') + ")</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
					 	}	
				 	
				 	jQuery('#widget_div').fadeIn();

				 	},500);

				 	document.cookie="username=visitor1"+Active_question.trim()+";";

			});

}

	var p2_hover=false;

	function Func(x)
	{	
		var bgColor=jQuery('#widget_div').css("background-color");
	
		var Active_question=document.getElementById('Active_Question').innerHTML;

		var selectedDiv=jQuery('#span_answer'+x).html();

		var t=Active_question+'^'+selectedDiv;

	var ajaxurl = object.ajaxurl;
		  	var data = {
		    	action: 'Vote_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: t, // translates into $_POST['foobar'] in PHP				
			};
			jQuery.post(ajaxurl, data, function(response) {
				 var k=0;
					jQuery('#AnswersDiv').find("span").each(function() {
						k++;
					})				
					
				 	var answers = [];

				 	for(i=1; i<=k; i++)
				 	{
				 		answers[answers.length]=jQuery('#span_answer'+i).html();
				 	}	

				 	/* Results Data from Ajax */

				 	var counts=response.split("^");
					
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
						
					var colors =[];					

					if(p2_hover==true)
					{
						colors=hinGuyner;
					}
					else
					{
						for(i=1; i<=k; i++)
						{
							colors[colors.length]=jQuery('#div_answer'+i).css('background-color');
						}
					}
					
					var dataSource= [];					

					for(i=0; i<k; i++)
					{	
						dataSource[dataSource.length]= {name: answers[i],  y: widths[i], sliced: false, selected: true, color: colors[i]};
					}				

					setTimeout(function() {
					jQuery('#widget_div').hide();	

					/* Drawing a chart */
						jQuery('#DrawDiagramDiv').css({"display":"inline"});
						 jQuery('#DrawDiagramDiv').drawdiagram({
		        chart: {
		            type: 'pie',
		            height: 500,
		            backgroundColor: bgColor,		            
		            options3d: {
		                enabled: true,
		                alpha: 45,
		                beta: 0
		            }
		        },
		         legend:
                    {
                    	 align: 'left',
						    layout: 'horizontal',
						    verticalAlign: 'bottom',
						    x: 20,
						    y: 20,
						    itemMarginTop: 10,
            				itemMarginBottom: 10
                    } ,   
		        title: {
		            text: Active_question
		        },
		        tooltip: {
		            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		        },
		        plotOptions: {
		            pie: {
		                allowPointSelect: true,
		                cursor: 'pointer',
		                depth: 35,
		          dataLabels: {
                    enabled: true,
                    distance: -50,
                      format: ' {point.percentage:.1f} %',
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    } ,
                },
                
                showInLegend: true
		            }
		        },
		        series: [{
		            type: 'pie',
		            name: 'Browser share',
		            data: dataSource
		        }]
		    });

				},200);

				 	document.cookie="username=visitor2"+Active_question+";";
			});
	}

	var hinGuyner = [];

	function P2AnswerHover(answerID)
	{	
		var col=jQuery('#hover_color').val();

		if(col=="")
		{
			p2_hover=false;
			return false;
		}
		p2_hover=true;
		var k=0;
		jQuery('#AnswersDiv').find("span").each(function() {
				k++;
		})	

		for(i=1; i<=k; i++)
			{
				hinGuyner[hinGuyner.length]=jQuery('#div_answer'+i).css('background-color');
			}

		jQuery('#div_answer' + answerID).css('background-color',col);
	}

	function P2AnswerHoverOut(answerID)
	{	
		jQuery('#div_answer' + answerID).css('background-color',hinGuyner[parseInt(answerID-1)]);
	}

	function  P4MouseClick(answerID)
	{		
	 	var Active_question=document.getElementById('Active_Question').innerHTML;
		var answer=jQuery('#P4SpanID'+answerID).html();

		var t=Active_question+'^'+answer;

		jQuery('#P4SpanID'+answerID).css('display','none');
		jQuery('#P4SectionID'+answerID).animate({width: '285px', opacity: '1'}, "slow");

		 var k=0;
					jQuery('#AnswersDiv').find("span").each(function() {
						k++;
					})	

		var OldColors= [];

		for(i=1;i<=k;i++)
		{
			OldColors[OldColors.length]=jQuery('#P4SectionID'+i).css('background-color');
		}


			var ajaxurl = object.ajaxurl;
		  	var data = {
		    	action: 'Vote_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: t, // translates into $_POST['foobar'] in PHP				
			};
			jQuery.post(ajaxurl, data, function(response) {

					var answers = [];

				 	for(i=1; i<=k; i++)
				 	{
				 		answers[answers.length]=jQuery('#P4SpanID'+i).html();
				 	}	

				 	/* Results Data from Ajax */

				 	var counts=response.split("^");

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

				 	/* data that will be shown in the widget */

				 	var colors =[];					

					for(i=1; i<=k; i++)
					{
						colors[colors.length]=jQuery('#P4SectionID'+i).css('background-color');
					}

					var dataSource= [];					

					for(i=0; i<k; i++)
					{	
						dataSource[dataSource.length]= {name: answers[i],  y: widths[i], color: OldColors[i]};
					}	

					setTimeout(function() {
					jQuery('#widget_div').hide();	

					/* Drawing a chart */
						jQuery('#DrawDiagramDiv').css({"display":"inline"});

						   jQuery('#DrawDiagramDiv').drawdiagram({
						        chart: {
						            type: 'column'
						        },
						        title: {
						            text: Active_question
						        },						        
						        xAxis: {
						            type: 'category',
						            labels: {
						                rotation: -45,
						                style: {
						                    fontSize: '12px',
						                    fontFamily: 'Verdana, sans-serif'		                    
						                }
						            }
						        },
						        yAxis: {
						            min: 0,						           
						            enabled: false,
						            title: {
						               
						            }
						        },
						        legend: {
						            enabled: false
						        },
						        tooltip: {
						            pointFormat: 'Counts: <b>{point.y:.1f} %</b>'
						        },
						        series: [{
						            name: 'Results',
						            colorByPoint: true,
						            data: dataSource,
						            dataLabels: {
						                enabled: true,
						                rotation: -90,
						                color: 'white',
						                align: 'right',
						                format: '{point.y:.1f}', // one decimal
						                y: 10, // 10 pixels down from the top
						                style: {
						                    fontSize: '10px',
						                    fontFamily: 'Verdana, sans-serif',
						                }
						            }
				        }]
     });
				},200);

				document.cookie="username=visitor4"+Active_question.trim()+";";

	});

	}
		
	function GetWidgetBorderColor()
	{
		var col=jQuery('#P3_Span_Answer1').css('color');
		return col;
	}

	function P3MouseEnter(id)
	{
		var x =jQuery('#P3SpanCount'+id).html();

		if(x.indexOf('%')>=0)
		{
			return false;
		}	

		var QuestCol=jQuery('#Active_Question').css('color');
		jQuery('#P3AnswerDiv'+id).css('border-color', QuestCol);

		if(jQuery('#P3SpanCount'+id).html('Vote'))
		{
			jQuery('#P3SpanCount'+id).html('Vote');
			setTimeout(function() {
					jQuery('#Vote_Screen_Div'+id).css('display','inline');				
					jQuery('#Vote_Screen_Div'+id).css('opacity','0.8');
			},50)
		}
	}

	function P3MouseOut(id)
	{		
		var x =jQuery('#P3SpanCount'+id).html();

		if(x.indexOf('%')>=0)
		{
			return false;
		}	
		
		if(jQuery('#P3SpanCount'+id).html('Vote'))
		{
			jQuery('#P3AnswerDiv'+id).css('border-color',GetWidgetBorderColor());	
			setTimeout(function() {			
				jQuery('#Vote_Screen_Div'+id).css('display','none');			
			},50);
		}
	}

	function P3Vote(answer_id)
	{

		if(jQuery('#P3SpanCount'+answer_id).html().indexOf('%')>=0)
		{
			return false;
		}
		var Active_question=document.getElementById('Active_Question').innerHTML;
		var selectedDiv=jQuery('#P3_Span_Answer'+answer_id).html();
		var t=Active_question+'^'+selectedDiv;


		var ajaxurl = object.ajaxurl;
		  	var data = {
		    	action: 'Vote_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: t, // translates into $_POST['foobar'] in PHP				
			};
			jQuery.post(ajaxurl, data, function(response) {
				 var k=0;
					jQuery('#All_Answers').find("img").each(function() {
						k++;
					})	
						var counts=response.split("^");

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

				var h=jQuery('#widget_div').css('height');
				jQuery('#All_Answers').fadeOut();
				jQuery('#widget_div').css('height',h);
				setTimeout(function() {
					jQuery('#All_Answers').fadeIn();

					for(i=1;i<=k;i++)
					{
						jQuery('#Vote_Screen_Div'+i).css('display','inline');	
						jQuery('#Vote_Screen_Div'+i).css('opacity','0.8');
						jQuery('#P3SpanCount'+i).html(parseFloat(widths[i-1]).toFixed(1)+'%');
					}

				},1000)

				 document.cookie="username=visitor3"+Active_question.trim()+";";
			});


	}
 		 	</script>

 		 	<p id="pt_id" style="display:none;"><?php echo $plugintype[0]->PluginType; ?></p>
 		
 		<form method="post" onsubmit="return false;" >

 		 	<div id="widget_div" style="position:relative; border:1px; border-style:dotted; padding:15px; border-radius:7px;  float:left; width:<?php echo  $params[0]->widget_div_width . "px"; ?> ; border-color: <?php echo  $params[0]->border_color; ?>; background-color: <?php echo  $params[0]->bg_color; ?>; ">

 		 	<section id="Question_Div" style="margin-bottom:0px; text-align:center; ">	
 		 	<span id="Active_Question" style="margin-bottom:0px; font-weight: bold; 
 		 	font-family: <?php echo  $params[0]->font_family; ?>; 
 		 	font-size: <?php echo $params[0]->font_size .'px'; ?>;
 		 	color: <?php echo  $params[0]->question_color; ?>;"><?php echo $Question; ?></span > </section>
 		 				 		
 		 		
 		 		 	<?php

 		 		 	if($plugintype[0]->PluginType==1)
 		 		 	{
 		 		 		?>	
 		 		 		<script>
					   		var cook =document.cookie;
 		 		 					var cookie_question = jQuery('#Active_Question').html();
 		 		 					if(cook.indexOf(cookie_question.trim())>=0 && cook.indexOf('visitor1')>=0)
 		 		 					{ 		
 		 		 						jQuery('#widget_div').css('display','none');
 		 		 						jQuery('AnswersDiv').css('display','none');
 		 		 						DrawDivAfterVote();
 		 		 					}
 		 		 		</script>		 
 		 		 		
 		 		 		<div id="AnswersDiv" style="position:relative; margin-top:0px; " > 
	 		 		 	 <?php  
					    for($i=0; $i<count($answers); $i++)
					    {
					   		 ?>
					   		<input type="radio" id="<?php echo 'answer' . ($i+1); ?>" name="answer"  
					   		value="<?php echo $answers[$i]->Answer; ?>" > <span id="span_answer_id" style="font-family: <?php echo  $params[0]->font_family; ?>; 
					   				 color:<?php echo  $params[0]->answer_color; ?>;"> <?php echo $answers[$i]->Answer; ?> </span> </input> <br>  
					   				<script>
	 		 		 					var cook =document.cookie;
	 		 		 				
	 		 		 					if(cook.indexOf(jQuery('#Active_Question').html())>=0  && cook.indexOf('visitor1')>=0)
	 		 		 					{
	 		 		 							jQuery('#widget_div').css('display','none');
	 		 		 							jQuery('#AnswersDiv').css('display','none');
	 		 		 							DrawDivAfterVote();
	 		 		 					} 		 		 				
 		 		 					</script>		
					   		 <?php 
					   	 }
					    ?>	
 		 			<input type="submit" value="vote" id="voteButton" onclick="Vote_Cllick()" style="border-radius:7px; background-color: <?php echo $params[0]->vote_button_color; ?>; color:<?php echo $params[0]->buttons_text_color; ?>; position:relative; height:40px; margin-bottom:5px; margin-top:8px; margin-left:70%; " />

 		 				</div> 
 		 				<?php
 		 		 	}

 		 		 	else if($plugintype[0]->PluginType==2)
 		 		 	{ 		 		 		
 		 		 		?>
 		 		 		<script>
					   		var cook =document.cookie;					   	
 		 		 					var cookie_question = jQuery('#Active_Question').html();
 		 		 					
 		 		 					if(cook.indexOf(cookie_question.trim())>=0 && cook.indexOf('visitor2')>=0)
 		 		 					{ 		
 		 		 						jQuery('#widget_div').css('display','none');
 		 		 						jQuery('AnswersDiv').css('display','none');
 		 		 						DrawDivAfterVote();
 		 		 					}
 		 		 		</script>		
 		 		 		<input id="hover_color" type="text" style="display:none;" value=<?php  echo $color; ?>>
 		 		 		<div id="AnswersDiv" style="position:relative; margin-top:0px;   " > 
	 		 		 	 <?php  
					    for($i=1; $i<=count($answers); $i++)
					    {
					   		 ?>
					   		 <section onmouseover="P2AnswerHover(<?php echo $i; ?>)" onmouseout="P2AnswerHoverOut(<?php echo $i; ?>)" onclick="Func(<?php echo $i; ?>)" id="<?php echo "div_answer" . $i; ?>" style=" margin-top:5%; border:1px; border-style:dotted; border-color:<?php echo $params[0]->border_color; ?>; border-radius:5px; background-color:<?php echo $answers[$i-1]->Answer_bg_color; ?>; width:100%; height:40px;"> <span id="<?php echo "span_answer" . $i; ?>" style="height:40px; line-height:40px; text-align:center;  float:left; text-align:center; width:100%; color:<?php echo $params[0]->answer_color; ?>;"> <?php echo $answers[$i-1]->Answer; ?> </span> </section> 				   		
					   		 <?php 
					   	}	
					   	?> </div> 
					   	<script>
					   		var cook =document.cookie;
 		 		 					var cookie_question = jQuery('#Active_Question').html();
 		 		 					if(cook.indexOf(cookie_question.trim())>=0 && cook.indexOf('visitor2')>=0)
 		 		 					{ 		
 		 		 						jQuery('#widget_div').css('display','none');
 		 		 						jQuery('AnswersDiv').css('display','none');
 		 		 						DrawDivAfterVote();
 		 		 					}
 		 		 		</script>		
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
	 		 		 					jQuery('#Question_Div').css('background-color', '<?php echo $col[0]->answer_hover_color; ?>');
	 		 		 					jQuery('#Question_Div').css('border-radius','5px');
	 		 		 					jQuery('#Question_Div').css('padding','6px');	
	 		 		 					DrawDivAfterVote(); 		 		 					

	 		 		 				})
	 		 		 			</script>
	 		 		 			<div id="All_Answers">
 		 		 			<?php
 		 		 			
 		 		 		 	for($i=1; $i<=count($answers); $i++)
 		 		 		 	{
 		 		 		 		?>

 		 		 		 		<div onclick="P3Vote('<?php echo $i; ?>')" id="<?php echo 'P3AnswerDiv' . $i; ?>" onmouseout="P3MouseOut(<?php echo $i; ?>)" onmouseover="P3MouseEnter(<?php echo $i; ?>)" style="position:relative; margin 0 auto; padding:5px; width:140px; float:<?php if($i%2==0) echo "right"; else echo "left"; ?>;   border:1px; border-style:dotted; border-color: <?php echo $params[0]->answer_color; ?>; border-radius:7px; margin: 10px auto;  ">
 		 		 		  		<div id="<?php echo 'Vote_Screen_Div' .$i; ?>" style="display:none; position:absolute; width:130px; height:90px; background-color:gray; "> 
 		 		 		  			<span id="<?php echo 'P3SpanCount' . $i; ?>" style="font-size:18px; color:white; text-align:center; float:left; margin-top:25%; width:100%;"> </span>
 		 		 		  		</div>
 		 		 		  		<img    style="height:90px; width:130px;" src="<?php echo trim(plugins_url('\Images\Uploads\ ',__FILE__) . $images[$i-1]->File ); ?>"> 
 		 		 		  		<span id="<?php echo 'P3_Span_Answer' . $i; ?>" style="font-size:12px; text-align:center; color:<?php echo $params[0]->answer_color; ?>; width:100%; float:left;"> <?php echo $answers[$i-1]->Answer ;?> </span>

 		 		 		 		</div>
 		 		 		 		  	<script>
						   				var cook =document.cookie;
	 		 		 					var cookie_question = jQuery('#Active_Question').html();
	 		 		 					if(cook.indexOf(cookie_question)>=0  && cook.indexOf('visitor3')>=0)
	 		 		 					{ 		
	 		 		 						jQuery('#widget_div').css('display','none');
	 		 		 						jQuery('AnswersDiv').css('display','none');
	 		 		 						DrawDivAfterVote();
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
 		 		 				
	 		 		 					var cookie_question = jQuery('#Active_Question').html();
	 		 		 					cookie_question=cookie_question.trim();
	 		 		 					if(cook.indexOf(cookie_question)>=0  && cook.indexOf('visitor4')>=0)
	 		 		 					{ 	 		 		 						
	 		 		 						jQuery('#widget_div').css('display','none');
	 		 		 						jQuery('AnswersDiv').css('display','none');
	 		 		 						DrawDivAfterVote();
	 		 		 					}

 		 		 			</script>
 		 		 			<div id="AnswersDiv" style="position:relative; margin:0 auto; width:100%; margin-top:0px;  " > 
 		 		 			 <?php   		 		 			 
		 		 			 	
							    for($i=1; $i<=count($answers); $i++)
							    {
							   		 ?>
							   		 <div id="<?php echo "p4_div".$i; ?>"  onclick="P4MouseClick(<?php echo $i; ?>)" style=" width:100%;   height:40px; border:1px; border-style:dotted; border-color:<?php echo $answers[$i-1]->Answer_bg_color; ?>;; margin-top:5%;"> 
							   		 <span id="<?php echo "P4SpanID".$i; ?>" style="float:left; padding-left:10px; font-size:14px; margin-left:0%;  color:<?php echo  $params[0]->answer_color; ?>;"> <?php echo $answers[$i-1]->Answer; ?> </span> 
							   		 <section id="<?php echo "P4SectionID".$i; ?>" style="position:relative; float:right; width:15%; height:100%; background-color:<?php echo $answers[$i-1]->Answer_bg_color; ?>;">  </section>
							   		  </div>

							   		 <?php 
							   	}
							   		
							?>

 		 		 			</div>
 		 		 			<script>
 		 		 				var cook =document.cookie;
	 		 		 					var cookie_question = jQuery('#Active_Question').html();
	 		 		 					cookie_question=cookie_question.trim();
	 		 		 					if(cook.indexOf(cookie_question)>=0  && cook.indexOf('visitor4')>=0)
	 		 		 					{ 		
	 		 		 						jQuery('#widget_div').css('display','none');
	 		 		 						jQuery('AnswersDiv').css('display','none');
	 		 		 						DrawDivAfterVote();
	 		 		 					}
 		 		 			</script>
 		 		 			<?php
 		 		 		}
 		 		 		
 		 		 	?>
 		 	</div>
 		 	<div id="DrawDiagramDiv" style="display:none; width:300px; height: 400px;">  </div> 		
 		 		
 		 	</form>

 		 <?php

	}

?>