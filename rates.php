<?php

include 'db/connect.php';
include 'views/head.php';
include 'views/navigation.php';

$user = $_SESSION['usr_id'];

/*$ids_sql = "SELECT user_id, challenge_id FROM pending_challenges limit 1";
$result_ids = $conn->query($ids_sql);
$ids = mysqli_fetch_assoc($result_ids); */

$user_image_sql = "SELECT pending_challenges.user_id, user.name, pending_challenges.challenge_id, user.images, pending_challenges.challenge_image, challenges.description FROM pending_challenges inner join user on pending_challenges.user_id=user.id inner join challenges on pending_challenges.challenge_id=challenges.challenge_id where  user.id !=$user limit 1";
$result_sql = $conn->query($user_image_sql);
$challenge_info = mysqli_fetch_assoc($result_sql);

$challengeUserName=$challenge_info['name'];
$challengeUserId = $challenge_info['user_id'];
$challengeCurrentId = $challenge_info['challenge_id'];
$challengeCurrentInfo = $challenge_info['challenge_image'];

$grade_sql = "SELECT grades_remaining FROM pending_challenges limit 1";
$result_grades = $conn->query($grade_sql);
$grades_remaining = mysqli_fetch_assoc($result_grades );

$score_sql = "SELECT score FROM pending_challenges limit 1";
$result_score = $conn->query($score_sql);
$score = mysqli_fetch_assoc($result_score );

if(isset($_POST['yes'])){
	$sql_grades = "UPDATE pending_challenges SET grades_remaining=grades_remaining-1 limit 1";

	$sql_score = "UPDATE pending_challenges SET score=score + 1 limit 1";
	if ($conn->query($sql_grades) && $conn->query($sql_score)){
		$score = mysqli_fetch_assoc($result_score );
	$grades_remaining = mysqli_fetch_assoc($result_grades );
		if ($grades_remaining['grades_remaining']==0){
				mysqli_query($conn, "INSERT INTO completed_challenges(user_id, challenge_id, challenge_image) 
									VALUES ('$challengeUserId', '$challengeCurrentId  ', '$challengeCurrentInfo')");
				
			
			mysqli_query($conn, "DELETE FROM pending_challenges limit 1");

		}

	//header('Location: account.php');
	}
	else echo "anti konti,brat";
}
if(isset($_POST['no'])){
	$sql_grades = "UPDATE pending_challenges SET grades_remaining=grades_remaining-1 limit 1";
	$sql_score = "UPDATE pending_challenges SET score=score-1 limit 1";
	if ($conn->query($sql_grades) && $conn->query($sql_score)){
		$score = mysqli_fetch_assoc($result_score );
	$grades_remaining = mysqli_fetch_assoc($result_grades );
		if ($grades_remaining['grades_remaining']==0){
			if ( $score['score']>0){
				mysqli_query($conn, "INSERT INTO completed_challenges(user_id, challenge_id, challenge_image) 
									VALUES ('$challengeUserId', '$challengeCurrentId  ', '$challengeCurrentInfo')");
				
			}
			mysqli_query($conn, "DELETE FROM pending_challenges limit 1");

		}

	header('Location: account.php');
	}
	else echo "anti konti,brat";
}
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
<div class="container" style="margin-top:25px;">
	<div class="col-sm-6">
		<div><img src="data:image/png;base64, <?php  echo $challenge_info['images']; ?>" alt="" class="img-thumb" onerror="this.style.display='none'"></div>
		<?php echo $challengeUserName; ?>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form" style="margin-top:20px" >
<div >
	<div>Did he really do it?</div>
	<input type="submit" name="yes" value="YES" class="btn btn-primary" />

	<input type="submit" name="no" value="NO" class="btn btn-primary" />
	</div>
</form>
	</div>
	<div class="col-sm-6">
		<div style="text-align:center"><?php echo $challenge_info['description']?></div>
		<div style="width:100%; text-align: center"><img src="data:image/png;base64, <?php  echo $challenge_info['challenge_image']; ?>" alt="" class="img img-responsive " onerror="this.style.display='none'" ></div>
	</div>
	

</div>
<?php include 'views/footer.php' ?>
