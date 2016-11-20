<?php

include 'db/connect.php';
include 'views/head.php';
include 'views/navigation.php';


$user = $_SESSION['usr_id'];
$sql_recommended = "SELECT v.challenge_id, description FROM completed_challenges c RIGHT JOIN challenges v ON c.challenge_id = v.challenge_id  WHERE user_id != '$user' or user_id IS NULL Limit 3  ";
$result1 = $conn->query($sql_recommended);


if(isset($_POST['submit_photo'])){

	$data = file_get_contents($_FILES["upload"]["tmp_name"]);
    $encoded_data = base64_encode($data);


    mysqli_query($conn, "INSERT INTO pending_challenges(challenge_image,user_id,challenge_id) 
			VALUES ('". $encoded_data . "', '".$user."',7)");
 

}

?>
<div id="container-nav">
  <div class="container" >
    <div class="row">
                 <div class="lower-nav" ><a style="color:#000; " href="challanges.php">Challenges</a></div>
                  <div class="lower-nav"><a href="rivals.php">Rivals</a></div>
                  <div class="lower-nav"><a href="rates.php">Rate</a></div>
                  <div class="lower-nav"><a href="accessories.php">Accessories</a></div>
                  <div class="lower-nav"><a href="help.php">Help</a></div>
      </div>
  </div>
</div>  
<div class="container" style="margin-top:25px">
	<div class="row">
		<div class='container'>
          Challenges recommended for you:

          
       </div>
       <div class='container ' >
       <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
       	<?php 
          	while ($recommended = mysqli_fetch_assoc($result1)) {

          		echo '<div>' .$recommended['description']. '<input type="radio" name="check_image" class="pull-right" > </div>';
          	
          		
          	
          	}
          ?>
          		<input type="file" name="upload" >
             <input type="submit" name="submit_photo" class="btn btn-primary pull-right"   />

          </form>
       </div>
	</div>
</div>
<div style="background-color:#e87126; height:35px; line-height:35px; margin-top:20px">
    <div class="container"><strong style="color:#fff">Your completed challenges:</strong></div>
 </div>
 <div class="container" style="margin-top:15px;"> 
  <div class="row">
    <div class="col-sm-6"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10"><img src="images/layout/example_photo.png" class="img-thumb"/></div><div class="col-sm-1"></div></div></div>
     <div class="col-sm-6"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10"><img src="images/layout/example_photo.png" class="img-thumb"/></div><div class="col-sm-1"></div></div></div>
  </div>
  <div class="row">
    <div class="col-sm-6" style="text-align:center">This is an example description</div>
    <div class="col-sm-6" style="text-align:center">This is an example description</div>
  </div>
 </div> 
<?php include 'views/footer.php' ?>
