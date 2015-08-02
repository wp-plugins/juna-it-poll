	
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
							
					 	jQuery('#widgetDiv').empty();
					 	
					 	jQuery('#widgetDiv').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color: "+ques_color+";'>"+ quest  +"</span> </div> ");

					 	for(i=1; i<=k; i++)
						 	{
						 		jQuery('#widgetDiv').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span> &nbsp; <i>("+ (parseFloat(widths[i-1]).toFixed(1)+'%') + ")</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
						 	}	
					}

		// 			else if(jQuery('#p_id').html()=='2' && cook[f+8]=='2')
		// 			{
		// 				var bgColor=jQuery('#widgetDiv').css("background-color");

		// 				var k=0;
		// 				jQuery('#answers_div').find("span").each(function() {
		// 					k++;
		// 				})	

		// 				var answers = [];

		// 		 	for(i=1; i<=k; i++)
		// 		 	{
		// 		 		answers[answers.length]=jQuery('#span_ans'+i).html();

		// 		 	}	

		// 		 	/* Results Data from Ajax */

		// 		 	var counts=response.split("^");	

		// 		 	var results=[];

		// 		 	for(i=0; i<counts.length; i++)
		// 		 	{
		// 		 		if(counts[i]=="")
		// 		 		{
		// 		 			continue;
		// 		 		}
		// 		 		else
		// 		 		{
		// 		 			results[results.length]=counts[i];
		// 		 		}
		// 		 	}	
		// 		 	var sum=0;
		// 		 	var widths = [];
		// 		 	for(i=0; i<results.length; i++)
		// 		 	{
		// 		 		sum=sum+parseInt(results[i]);
		// 		 	}

		// 		 	if(sum==0) sum=1;					
					
		// 		 	for(i=0; i<results.length; i++)
		// 		 	{			
		// 		 		widths[widths.length]=(results[i]*100)/sum;						
		// 		 	}	

		// 			var colors =[];
					
		// 				for(i=1; i<=k; i++)
		// 				{
		// 					colors[colors.length]=jQuery('#div_ans'+i).css('background-color');
		// 				}
					
		// 			var dataSource= [];					

		// 			for(i=0; i<k; i++)
		// 			{	
		// 				dataSource[dataSource.length]= {name: answers[i],  y: widths[i], sliced: false, selected: true, color: colors[i]};
		// 			}	

		// 			setTimeout(function() {

		// 			/* Drawing a chart */
					
		// 		jQuery('#chartDiv').css({"display":"inline"});

		// 		jQuery('#chartDiv').highcharts({
		//         chart: {
		//             type: 'pie',
		//             height: 500,
		//             backgroundColor: bgColor,		            
		//             options3d: {
		//                 enabled: true,
		//                 alpha: 45,
		//                 beta: 0
		//             }
		//         },
		//          legend:
  //                   {
  //                   	 	align: 'left',
		// 				    layout: 'horizontal',
		// 				    verticalAlign: 'bottom',
		// 				    x: 20,
		// 				    y: 20,
		// 				    itemMarginTop: 10,
  //           				itemMarginBottom: 10
  //                   } ,   
		//         title: {
		//             text: quest
		//         },
		//         tooltip: {
		//             pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		//         },
		//         plotOptions: {
		//             pie: {
		//                 allowPointSelect: true,
		//                 cursor: 'pointer',
		//                 depth: 35,
		//           dataLabels: {
  //                   enabled: true,
  //                   distance: -50,
  //                     format: ' {point.percentage:.1f} %',
  //                   style: {
  //                       fontWeight: 'bold',
  //                       color: 'white',
  //                       textShadow: '0px 1px 2px black'
  //                   } ,
  //               },
  //               showInLegend: true
		//             }
		//         },
		//         series: [{
		//             type: 'pie',
		//             name: 'Browser share',
		//             data: dataSource
		//         }]
		//     });
		// 		}, 500);
		// }

			else if(jQuery('#p_id').html()=='3' && cook[f+8]=='3' )
			{
								
				setTimeout(function() {
							jQuery('#widgetDiv').css('display','inline');
							jQuery('#answers_div').css('display','inline');
						},10)
				
					var Active_question=document.getElementById('ActiveQuestion').innerHTML;

					var k=0;
					jQuery('#AllAnswers').find("img").each(function() {
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

				var h=jQuery('#widgetDiv').css('height');

				jQuery('#widgetDiv').css('height',h);
				
					jQuery('#AllAnswers').fadeIn();

					for(i=1;i<=k;i++)
					{
						jQuery('#voteScreenDiv'+i).css('display','inline');	
						jQuery('#voteScreenDiv'+i).css('opacity','0.8');
						jQuery('#p3_CountSpan'+i).html(parseFloat(widths[i-1]).toFixed(1)+'%');

					}

			}

			// else if(jQuery('#p_id').html()=='4' && cook[f+8]=='4')
			// {
					
	 	// 		 var Active_question=document.getElementById('ActiveQuestion').innerHTML;

			// 		 var k=0;
			// 					jQuery('#answers_div').find("span").each(function() {
			// 						k++;
			// 					})	

			// 		var OldColors= [];

			// 		for(i=1;i<=k;i++)
			// 		{
			// 			OldColors[OldColors.length]=jQuery('#p4_section'+i).css('background-color');
			// 		}

			// 		var answers = [];

			// 	 	for(i=1; i<=k; i++)
			// 	 	{
			// 	 		answers[answers.length]=jQuery('#p4_span'+i).html();
			// 	 	}	

			// 	 	/* Results Data from Ajax */

			// 	 	var counts=response.split("^");

			// 	 	var results=[];

			// 	 	for(i=0; i<counts.length; i++)
			// 	 	{
			// 	 		if(counts[i]=="")
			// 	 		{
			// 	 			continue;
			// 	 		}
			// 	 		else
			// 	 		{
			// 	 			results[results.length]=counts[i];
			// 	 		}
			// 	 	}

			// 		var sum=0;
			// 	 	var widths = [];
			// 	 	for(i=0; i<results.length; i++)
			// 	 	{
			// 	 		sum=sum+parseInt(results[i]);
			// 	 	}

			// 	 	if(sum==0) sum=1;
						
			// 	 	for(i=0; i<results.length; i++)
			// 	 	{			
			// 	 		widths[widths.length]=(results[i]*100)/sum;						
			// 	 	}			 	

			// 	 	/* data that will be shown in the widget */

			// 	 	var colors =[];					

			// 		for(i=1; i<=k; i++)
			// 		{
			// 			colors[colors.length]=jQuery('#p4_section'+i).css('background-color');
			// 		}

			// 		var dataSource= [];					

			// 		for(i=0; i<k; i++)
			// 		{	
			// 			dataSource[dataSource.length]= {name: answers[i],  y: widths[i], color: OldColors[i]};
			// 		}	

			// 		setTimeout(function() {
			// 		jQuery('#widgetDiv').hide();	

			// 		/* Drawing a chart */

			// 			jQuery('#chartDiv').css({"display":"inline"});

			// 			   jQuery('#chartDiv').highcharts({
			// 			        chart: {
			// 			            type: 'column'
			// 			        },
			// 			        title: {
			// 			            text: Active_question
			// 			        },						        
			// 			        xAxis: {
			// 			            type: 'category',
			// 			            labels: {
			// 			                rotation: -45,
			// 			                style: {
			// 			                    fontSize: '12px',
			// 			                    fontFamily: 'Verdana, sans-serif'		                    
			// 			                }
			// 			            }
			// 			        },
			// 			        yAxis: {
			// 			            min: 0,						           
			// 			            enabled: false,
			// 			            title: {
						               
			// 			            }
			// 			        },
			// 			        legend: {
			// 			            enabled: false
			// 			        },
			// 			        tooltip: {
			// 			            pointFormat: 'Counts: <b>{point.y:.1f} %</b>'
			// 			        },
			// 			        series: [{
			// 			            name: 'Results',
			// 			            colorByPoint: true,
			// 			            data: dataSource,
			// 			            dataLabels: {
			// 			                enabled: true,
			// 			                rotation: -90,
			// 			                color: 'white',
			// 			                align: 'right',
			// 			                format: '{point.y:.1f}', // one decimal
			// 			                y: 10, // 10 pixels down from the top
			// 			                style: {
			// 			                    fontSize: '10px',
			// 			                    fontFamily: 'Verdana, sans-serif',
			// 			                }
			// 			            }
			// 	        }]
   //   });

			// 	},1);

			// }

				
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
				 		jQuery('#widgetDiv').empty();		 						 	

				 	jQuery('#widgetDiv').append("<div style='text-align:center; '><span style='font-family: " + ques_font_family +"; font-size:"+ ques_font_size +";font-weight: bold; color: "+ques_color+";'>"+ Active_question  +"</span> </div> ");

				 	for(i=1; i<=k; i++)
					 	{
					 		jQuery('#widgetDiv').append("<span  style='color:"+ ans_color + "'>"+ answers[i-1] + "</span>" + "<span> &nbsp; <i>("+ (parseFloat(widths[i-1]).toFixed(1)+'%') + ")</i> </span>" + "<br> <div style='margin-top:4px; background-color:" + ans_color + "; width:" + (parseFloat(widths[i-1]).toFixed(1)+'%') + "; height:10px; '> </div>");				 		
					 	}	
				 	
				 	jQuery('#widgetDiv').fadeIn();

				 	},500);

				 	document.cookie="username=customer1"+Active_question.trim()+";";

			});
		
		
}

	var p2_hover=false;

	// function F(x)
	// {	
	// 	var bgColor=jQuery('#widgetDiv').css("background-color");
	
	// 	var Active_question=document.getElementById('ActiveQuestion').innerHTML;

	// 	var selectedDiv=jQuery('#span_ans'+x).html();

	// 	var t=Active_question+'^'+selectedDiv;

	// 	var form = jQuery('#WidgetForm');

	// var ajaxurl = object.ajaxurl;
	// 	  	var data = {
	// 	    	action: 'Vote_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	// 			foobar: t, // translates into $_POST['foobar'] in PHP				
	// 		};
	// 		jQuery.post(ajaxurl, data, function(response) {
	// 			 var k=0;
	// 				jQuery('#answers_div').find("span").each(function() {
	// 					k++;
	// 				})				
					
	// 			 	var answers = [];

	// 			 	for(i=1; i<=k; i++)
	// 			 	{
	// 			 		answers[answers.length]=jQuery('#span_ans'+i).html();
	// 			 	}	

	// 			 	/* Results Data from Ajax */

	// 			 	var counts=response.split("^");
					
	// 			 	var results=[];

	// 			 	for(i=0; i<counts.length; i++)
	// 			 	{
	// 			 		if(counts[i]=="")
	// 			 		{
	// 			 			continue;
	// 			 		}
	// 			 		else
	// 			 		{
	// 			 			results[results.length]=counts[i];
	// 			 		}
	// 			 	}				 

	// 			 	/* data that will be shown in the widget */
				 	
	// 				var sum=0;
	// 			 	var widths = [];
	// 			 	for(i=0; i<results.length; i++)
	// 			 	{
	// 			 		sum=sum+parseInt(results[i]);
	// 			 	}

	// 			 	if(sum==0) sum=1;
					
	// 			 	for(i=0; i<results.length; i++)
	// 			 	{			
	// 			 		widths[widths.length]=(results[i]*100)/sum;						
	// 			 	}			 	
						
	// 				var colors =[];					

	// 				if(p2_hover==true)
	// 				{
	// 					colors=hinGuyner;
	// 				}
	// 				else
	// 				{
	// 					for(i=1; i<=k; i++)
	// 					{
	// 						colors[colors.length]=jQuery('#div_ans'+i).css('background-color');
	// 					}
	// 				}
					
	// 				var dataSource= [];					

	// 				for(i=0; i<k; i++)
	// 				{	
	// 					dataSource[dataSource.length]= {name: answers[i],  y: widths[i], sliced: false, selected: true, color: colors[i]};
	// 				}				

	// 				setTimeout(function() {
	// 				jQuery('#widgetDiv').hide();	

	// 				/* Drawing a chart */
	// 					jQuery('#chartDiv').css({"display":"inline"});
	// 					 jQuery('#chartDiv').highcharts({
	// 	        chart: {
	// 	            type: 'pie',
	// 	            height: 500,
	// 	            backgroundColor: bgColor,		            
	// 	            options3d: {
	// 	                enabled: true,
	// 	                alpha: 45,
	// 	                beta: 0
	// 	            }
	// 	        },
	// 	         legend:
 //                    {
 //                    	 align: 'left',
	// 					    layout: 'horizontal',
	// 					    verticalAlign: 'bottom',
	// 					    x: 20,
	// 					    y: 20,
	// 					    itemMarginTop: 10,
 //            				itemMarginBottom: 10
 //                    } ,   
	// 	        title: {
	// 	            text: Active_question
	// 	        },
	// 	        tooltip: {
	// 	            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	// 	        },
	// 	        plotOptions: {
	// 	            pie: {
	// 	                allowPointSelect: true,
	// 	                cursor: 'pointer',
	// 	                depth: 35,
	// 	          dataLabels: {
 //                    enabled: true,
 //                    distance: -50,
 //                      format: ' {point.percentage:.1f} %',
 //                    style: {
 //                        fontWeight: 'bold',
 //                        color: 'white',
 //                        textShadow: '0px 1px 2px black'
 //                    } ,
 //                },
                
 //                showInLegend: true
	// 	            }
	// 	        },
	// 	        series: [{
	// 	            type: 'pie',
	// 	            name: 'Browser share',
	// 	            data: dataSource
	// 	        }]
	// 	    });

	// 			},200);

	// 			 	document.cookie="username=customer2"+Active_question+";";
			// });
	// }

	var hinGuyner = [];

	function P2_answerHover(answerID)
	{	
		var col=jQuery('#hover_color').val();

		if(col=="")
		{
			p2_hover=false;
			return false;
		}
		p2_hover=true;
		var k=0;
		jQuery('#answers_div').find("span").each(function() {
				k++;
		})	

		for(i=1; i<=k; i++)
			{
				hinGuyner[hinGuyner.length]=jQuery('#div_ans'+i).css('background-color');
			}

		jQuery('#div_ans' + answerID).css('background-color',col);
	}

	function P2_answerHoverOut(answerID)
	{	
		jQuery('#div_ans' + answerID).css('background-color',hinGuyner[parseInt(answerID-1)]);
	}

	// function  p4_mouseClick(answerID)
	// {		
	//  	var Active_question=document.getElementById('ActiveQuestion').innerHTML;
	// 	var answer=jQuery('#p4_span'+answerID).html();

	// 	var t=Active_question+'^'+answer;

	// 	var form = jQuery('#WidgetForm');			
	// 	jQuery('#p4_span'+answerID).css('display','none');
	// 	jQuery('#p4_section'+answerID).animate({width: '285px', opacity: '1'}, "slow");

	// 	 var k=0;
	// 				jQuery('#answers_div').find("span").each(function() {
	// 					k++;
	// 				})	

	// 	var OldColors= [];

	// 	for(i=1;i<=k;i++)
	// 	{
	// 		OldColors[OldColors.length]=jQuery('#p4_section'+i).css('background-color');
	// 	}


	// var ajaxurl = object.ajaxurl;
	// 	  	var data = {
	// 	    	action: 'Vote_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	// 			foobar: t, // translates into $_POST['foobar'] in PHP				
	// 		};
	// 		jQuery.post(ajaxurl, data, function(response) {

	//				var answers = [];

	// 			 	for(i=1; i<=k; i++)
	// 			 	{
	// 			 		answers[answers.length]=jQuery('#p4_span'+i).html();
	// 			 	}	

	// 			 	/* Results Data from Ajax */

	// 			 	var counts=response.split("^");

	// 			 	var results=[];

	// 			 	for(i=0; i<counts.length; i++)
	// 			 	{
	// 			 		if(counts[i]=="")
	// 			 		{
	// 			 			continue;
	// 			 		}
	// 			 		else
	// 			 		{
	// 			 			results[results.length]=counts[i];
	// 			 		}
	// 			 	}

	// 				var sum=0;
	// 			 	var widths = [];
	// 			 	for(i=0; i<results.length; i++)
	// 			 	{
	// 			 		sum=sum+parseInt(results[i]);
	// 			 	}

	// 			 	if(sum==0) sum=1;
					
	// 			 	for(i=0; i<results.length; i++)
	// 			 	{			
	// 			 		widths[widths.length]=(results[i]*100)/sum;						
	// 			 	}			 	

	// 			 	/* data that will be shown in the widget */

	// 			 	var colors =[];					

	// 				for(i=1; i<=k; i++)
	// 				{
	// 					colors[colors.length]=jQuery('#p4_section'+i).css('background-color');
	// 				}

	// 				var dataSource= [];					

	// 				for(i=0; i<k; i++)
	// 				{	
	// 					dataSource[dataSource.length]= {name: answers[i],  y: widths[i], color: OldColors[i]};
	// 				}	

	// 				setTimeout(function() {
	// 				jQuery('#widgetDiv').hide();	

	// 				/* Drawing a chart */
	// 					jQuery('#chartDiv').css({"display":"inline"});

	// 					   jQuery('#chartDiv').highcharts({
	// 					        chart: {
	// 					            type: 'column'
	// 					        },
	// 					        title: {
	// 					            text: Active_question
	// 					        },						        
	// 					        xAxis: {
	// 					            type: 'category',
	// 					            labels: {
	// 					                rotation: -45,
	// 					                style: {
	// 					                    fontSize: '12px',
	// 					                    fontFamily: 'Verdana, sans-serif'		                    
	// 					                }
	// 					            }
	// 					        },
	// 					        yAxis: {
	// 					            min: 0,						           
	// 					            enabled: false,
	// 					            title: {
						               
	// 					            }
	// 					        },
	// 					        legend: {
	// 					            enabled: false
	// 					        },
	// 					        tooltip: {
	// 					            pointFormat: 'Counts: <b>{point.y:.1f} %</b>'
	// 					        },
	// 					        series: [{
	// 					            name: 'Results',
	// 					            colorByPoint: true,
	// 					            data: dataSource,
	// 					            dataLabels: {
	// 					                enabled: true,
	// 					                rotation: -90,
	// 					                color: 'white',
	// 					                align: 'right',
	// 					                format: '{point.y:.1f}', // one decimal
	// 					                y: 10, // 10 pixels down from the top
	// 					                style: {
	// 					                    fontSize: '10px',
	// 					                    fontFamily: 'Verdana, sans-serif',
	// 					                }
	// 					            }
	// 			        }]
 //     });
	// 			},200);

	// 			document.cookie="username=customer4"+Active_question.trim()+";";

	// });

	// }
		
	function GetWidgetBorderColor()
	{
		var col=jQuery('#p3_answerSpan1').css('color');
		return col;
	}

	function p3_mouseEnter(id)
	{
		var x =jQuery('#p3_CountSpan'+id).html();

		if(x.indexOf('%')>=0)
		{
			return false;
		}	

		var QuestCol=jQuery('#ActiveQuestion').css('color');
		jQuery('#p3_answerDiv'+id).css('border-color', QuestCol);

		if(jQuery('#p3_CountSpan'+id).html('Vote'))
		{
			jQuery('#p3_CountSpan'+id).html('Vote');
			setTimeout(function() {
					jQuery('#voteScreenDiv'+id).css('display','inline');				
					jQuery('#voteScreenDiv'+id).css('opacity','0.8');
			},50)
		}
	}

	function p3_mouseOut(id)
	{		
		var x =jQuery('#p3_CountSpan'+id).html();

		if(x.indexOf('%')>=0)
		{
			return false;
		}	
		
		if(jQuery('#p3_CountSpan'+id).html('Vote'))
		{
			jQuery('#p3_answerDiv'+id).css('border-color',GetWidgetBorderColor());	
			setTimeout(function() {			
				jQuery('#voteScreenDiv'+id).css('display','none');			
			},50);
		}
	}

	function p3_vote(answer_id)
	{

		if(jQuery('#p3_CountSpan'+answer_id).html().indexOf('%')>=0)
		{
			return false;
		}
		var Active_question=document.getElementById('ActiveQuestion').innerHTML;
		var selectedDiv=jQuery('#p3_answerSpan'+answer_id).html();
		var t=Active_question+'^'+selectedDiv;


		var ajaxurl = object.ajaxurl;
		  	var data = {
		    	action: 'Vote_Click', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: t, // translates into $_POST['foobar'] in PHP				
			};
			jQuery.post(ajaxurl, data, function(response) {
				 var k=0;
					jQuery('#AllAnswers').find("img").each(function() {
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

				var h=jQuery('#widgetDiv').css('height');
				jQuery('#AllAnswers').fadeOut();
				jQuery('#widgetDiv').css('height',h);
				setTimeout(function() {
					jQuery('#AllAnswers').fadeIn();

					for(i=1;i<=k;i++)
					{
						jQuery('#voteScreenDiv'+i).css('display','inline');	
						jQuery('#voteScreenDiv'+i).css('opacity','0.8');
						jQuery('#p3_CountSpan'+i).html(parseFloat(widths[i-1]).toFixed(1)+'%');
					}

				},1000)

				 document.cookie="username=customer3"+Active_question.trim()+";";
			});


	}