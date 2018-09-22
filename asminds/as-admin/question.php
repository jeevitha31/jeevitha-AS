<?php
$link=mysqli_connect("localhost","root","","as_benchmark");
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Set Question</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="../bootstrap/jquery/3.3.1/jquery.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script>
			function myFunction(val){
				 document.getElementById("temp").style.display = "block";
				 document.getElementById("ques_type").value = val;
				 document.getElementById("span").innerHTML = val;
				 if(val == 1){ 
				 document.getElementById("temp").style.display = "none";
				 }
			}
			function QuesFunc(val){
				if(val == "true"){
				document.getElementById("option").style.display = "none";				
				document.getElementById("test").style.display = "block";				
				}
				else{
					document.getElementById("option").style.display = "block";
					document.getElementById("test").style.display = "none";
				}
			}
			
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row col-md-offset-2">
			<div class="row col-md-6">
			<form name="form1" action="" method="post">
				<?php
				$res = mysqli_query($link,"select package_name from as_package");
					if (mysqli_num_rows($res) >  0){ 
					?><select class="form-control" id="sel" onchange="myFunction(this.value)">
					<option value="1">Select Package</option>
					<?php
					while($row = mysqli_fetch_array($res))
					{
					?>
					<option value="<?php  echo  $row["package_name"];?>"  ><?php echo $row["package_name"]; ?></option>
					<?php
					}
					}
					else{
						
						echo '<h3>Package is not available.First create the package after set the Question<h3>';
					}
				?>
					</select>
			</form>
			</div>
			</div>
			<br/>				
			<div class="row " id="temp" style="display:none">
			<input  type="hidden" value="" id="ques_type" name="ques_type">
			
				<form action ="question.php" method="POST">
				<div class="row">
					<h3>Set Questions:<span id="span"></span></h3>
						<div class="col-md-6">
							<label for="question">Question:</label>
							<input type="text" id="question" name="question" class="form-control col-md-3">
							
							<br/><br/><br/><br/>
							<div id="test" style="display:none"><p>TYPE CORRECT OPTION:<p> TRUE -> 1 </p></p><p>FALSE -> 0 </p></div>
								<div class="row col-md-9" id="opt">
									<div id="option">
									<label for="option1">Option 1:</label>
									<input type="text" id="option1" name="option1" class="form-control col-md-3">
									<br/><br/>
									<label for="option2">Option 2:</label>
									<input type="text" id="option2" name="option2" class="form-control col-md-3">
									<br/><br/>
									<label for="option3">Option 3:</label>
									<input type="text" id="option3" name="option3" class="form-control col-md-3">
									<br/><br/>
									<label for="option4">Option 4:</label>
									<input type="text" id="option4" name="option4" class="form-control col-md-3"></div>
									<br/><br><br/>
									
									<label for="answer">Correct Option:</label>
									<input type="text" id="answer" name="answer" class="form-control col-md-3">
									
									<br/><br/>
									
								</div>
						</div>
						<div class="col-md-6">
						<div class="col-md-4">
							<div class="form-group">
							  <label for="questtype">Question Type:</label>
							  <select class="form-control" id="questtype" onchange ="QuesFunc(this.value)">
								<option>Select</option>
								<option value="radio">Radio Button</option>
								<option value="checkbox">Check Box</option>
								<option value="true">True/False</option>
							  </select>
							</div>
						</div>
						
						</div>
				
					
				</div>
				<br/>
			<div class="row col-md-3">
				<input type="submit" name="btn-save" class="btn btn-success" value="Save">
			</div>
				</form>
				
			
			
			</div>
		</div>
		
		
		
	</body>
</html>
<?php
   
?>
