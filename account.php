<?php
include 'db/connect.php';
include 'views/head.php';
include 'views/navigation.php';


$user = $_SESSION['usr_id'];

$sql = "SELECT image FROM animals a INNER JOIN user u ON a.type_of_animal = u.type_of_animal WHERE id = '$user'";
$result = $conn->query($sql);
$images = mysqli_fetch_assoc($result);

$sql_name= "SELECT  name from user where id='$user'";
$result_name=$conn->query($sql_name);
$name=mysqli_fetch_assoc($result_name);

$sql_completed = "SELECT  date_complete, description FROM completed_challenges c INNER JOIN challenges v ON c.challenge_id = v.challenge_id  WHERE user_id = '$user' ORDER BY date_complete DESC Limit 3 ";
$result2 = $conn->query($sql_completed);


$sql_stats_query="SELECT SUM(strength) as strength, SUM(intellect) as intellect, SUM(creativity) as creativity, SUM(spirit) as spirit, SUM(dexterity) as dexterity FROM completed_challenges c INNER JOIN challenges v ON c.challenge_id = v.challenge_id  WHERE user_id = '$user'";
$result_stats=$conn->query($sql_stats_query);
$stats=mysqli_fetch_assoc($result_stats); 



?>
<div id="container-nav">
	<div class="container" >
		<div class="row">
	               <div class="lower-nav"><a href="challanges.php">Challenges</a></div>
	                <div class="lower-nav"><a href="rivals.php">Rivals</a></div>
	                <div class="lower-nav"><a href="rates.php">Rate</a></div>
	                <div class="lower-nav"><a href="accessories.php">Accessories</a></div>
	                <div class="lower-nav"><a href="help.php">Help</a></div>
	    </div>
	</div>
</div>	
<div class="container">
	<div class="row">
		<div class="col-xs-12" style="text-align:center; font-size:280%"><?php echo $name['name']?></div>
	</div>
	<div class="row">
		<div class="col-sm-3" >
			<img src="<?php echo $images['image']; ?>" alt="image" class="img-thumb" style="position: absolute; margin: 10px 0; ">
			<img src="images/layout/aceup-13.png" alt="frame" class="img-thumb" style="margin: 10px 0;">
			</div>
			<div class="col-sm-9" style="padding-top:10px;">
				<div class="col-xs-8">
				<div class="icons col-xs-6"> 
					<img src="images/layout/aceupAssets-14.png" alt="strength" class="attributes img-thumb" >
					<div class="icon-label" style="left:7px;"><?php  if(is_null($stats['strength'])){echo 0;} echo $stats['strength'];?></div>
				</div>
				<div class="icons col-xs-6"> 
					<img src="images/layout/aceupAssets-16.png" alt="dexterity" class="attributes img-thumb" >
					<div class="icon-label" style="left:14px;"><?php if(is_null($stats['dexterity'])){echo 0;} echo $stats['dexterity'];?></div>
				</div>
				<div class="icons col-xs-6"> 
					<img src="images/layout/aceupAssets-15.png" alt="intellect" class="attributes img-thumb" >
					<div class="icon-label" style="left:9px;" ><?php  if(is_null($stats['intellect'])){echo 0;}echo $stats['intellect'];?></div>
				</div>
				<div class="icons col-xs-6"> 
					<img src="images/layout/aceupAssets-17.png" alt="creativity" class="attributes img-thumb">
					<div class="icon-label" style="left: 12px;"><?php if(is_null($stats['creativity'])){echo 0;} echo $stats['creativity'];?></div>
				</div>
				</div>
				<div class="col-xs-4">

					<img src="images/layout/aceupAssets-18.png" alt="spirit" class="attributes img-thumb" style="margin-top:40px">
					<div class="icon-label" style="margin-top:40px"><?php if(is_null($stats['spirit'])){echo 0;} echo $stats['spirit'];?></div>
				</div>
			</div>
			
		<div class="col-sm-7" style="float: left;">
		
		</div>
	</div>
	
</div>
<div style="background-color:#e87126; height:35px; line-height:35px;">
    <div class="container"><strong style="color:#fff">Your completed challenges:</strong></div>
 </div>
 <div class="container ">
        <?php 
     	while  ($complete = mysqli_fetch_assoc($result2)){
          		echo "<p class='completed_challenges' style='color:#d37f11 '>" . $complete['description'] .  "</p>";          
      		}
       ?>
       </div>
<?php include 'views/footer.php' ?>
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/menu-nav.js"></script>
</body>
</html>