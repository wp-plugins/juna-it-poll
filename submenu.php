 <?php

	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}

	

	global $wpdb;

		$table_name  =  $wpdb->prefix . "poll_wp_Questions";
		$table_name2 =  $wpdb->prefix . "poll_wp_Answers";
		$table_name3 =  $wpdb->prefix . "poll_wp_Results";
		$table_name4 =  $wpdb->prefix . "poll_wp_Settings";	

	$questions=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d ", 0));	
	//$questions=$wpdb->get_results("SELECT * from $table_name");

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$quest=sanitize_text_field($_POST["Question"]);

		$results=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE QuestionID=(SELECT id FROM $table_name WHERE Question= %s)", $quest));
		//$results=$wpdb->get_results("SELECT * from $table_name3 WHERE QuestionID=(SELECT id from $table_name Where Question='$quest')");

		$answers=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE QuestionID=(SELECT id FROM $table_name WHERE Question= %s)", $quest));
		//$answers=$wpdb->get_results("SELECT * from $table_name2 Where QuestionID=(Select id from $table_name Where Question='$quest')");
		$quest=sanitize_text_field(stripcslashes($_POST["Question"]));

	}

	?>
<style>
	table
	{
		border-radius: 10px;
	}
		table, th, td 
		{
	 	  	border:1px solid #98bf21;
	 	  	border-radius:10px;	
		}
	tr:nth-child(odd)
	{
		background-color:whitesmoke;		
	}
	tr:nth-child(even)
	{
		background-color:#EAF2D3;		
	}
	table
	{
		margin-top:30px;
		width:90%;
	}
	th
	{
		text-align:center;		
		vertical-align:center;
		padding:10px;
	}	

	select 
	{
		position:relative;
		border:1px solid white;
		background-color:#98bf21;
		color:white;
		border-radius:10px;
		margin: 5px auto;
	}	
	tr:nth-child(1)
	{
		font-size:20px;
		color:white;
		font-family: Consolas, Arial, Gabriola;
		background-color:#98bf21;
		width:100%;
	}
</style>

	<form method="post">
	<br>
		<Label> Select a Question </Label> <br>
		<select name="Question" onchange="this.form.submit()">
		<option> Select Question </option>
			<?php
				foreach($questions as $q)
				{											
					?>
						<option value="<?php echo $q->Question ?>"> <?php echo $q->Question; ?> </option> 
					<?php
				}
			?>
		</select>
		<?php
			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				?>
					 <table>
					 <tr>
					 <th colspan="3">
					  <?php echo $quest; ?> 
					  </th>
					 </tr>
				 	<tr>
				 		<th style="font-size:18px;"> <b> <i> ID </i> </b> </th>
				 		<th style="font-size:18px;"> <b> <i> Answer </i> </b> </th>
				 		<th style="font-size:18px;"> <b> <i> Votes  </i> </b> </th>	 		
				 	</tr>

				 	<?php
				 		for($i=0; $i<count($results); $i++) {
				 			?>
				 				<tr>
				 					<th> <?php echo $i+1; ?> </th>
				 					<th> 
				 						<?php echo $answers[$i]->Answer; ?> 
				 					</th>
				 					<th>  <?php echo $results[$i]->Count; ?> </th> 
				 				</tr> 
				 			<?php
				 		}
				 	?>	

				 </table> 
				<?php
			}
		 ?>
	</form>