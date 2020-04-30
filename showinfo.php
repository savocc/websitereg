<?php
session_start();
include_once("index.php");
# Получение выбранного пользователем языка из предыдущей страницы
 $lang = $_SESSION["lang"];
 if($lang == "Russian"){
     $display = array(
         "greetings" => "Здравствуйте! Меня зовут",
     );
 }
 else{
    $display = array(
        "greetings" => "Hello Everybody, i am",
    );
 }
 # Получение данных из базы данных. Заполнение переменных
$sql = "SELECT firstName, lastName, birthday, gender, email, phonenum, picture from userinfo";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $fname =  $row["firstName"];
        $lname = $row["lastName"];
        $birthday = $row["birthday"];
        $gender = $row["gender"];
        $email = $row["email"];
        $phonenum = $row["phonenum"];
        $picture = $row["picture"];
        $picture = ltrim($picture);
    }
}
else{
    $message2 = "ERROR";
    echo "<script>
alert('$message2');
</script>";
}
# В завимости от выбранного пола, высвечивается или мужская или женская картинка
if($gender == "female"){
    $picSource = "img/female.png";
}
else{
    $picSource = "img/male.png";
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Savochkina Project</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>


        <!--================Home Banner Area =================-->
        <section class="profile_area">
           	<div class="container">
           		<div class="profile_inner p_120">
					<div class="row">
						<div class="col-lg-5">
                             <?php echo "<img class='navbar-brand logo_h' src= 'img/".$picture."'  style='width:530px;height:400px;'>  ";

                             ?>

						</div>
						<div class="col-lg-7">
							<div class="personal_text">
								<h6><?php echo $display["greetings"];?></h6>
								<h3><?php echo $fname.$lname;   ?></h3>
								<h4> <?php echo "<img src= '".$picSource."'  style='width:50px;height:50px;border-radius: 50%;'>  ";

                                    ?>
                                </h4>
								<p></p>
								<ul class="list basic_info">
									<li><a href="#"><i class="lnr lnr-calendar-full"></i> <?php echo $birthday;   ?></a></li>
									<li><a href="#"><i class="lnr lnr-phone-handset"></i> <?php echo $phonenum;   ?></a></li>
									<li><a href="#"><i class="lnr lnr-envelope"></i> <?php echo $email;   ?></a></li>
 								</ul>


							</div>
						</div>
					</div>
           		</div>
            </div>
        </section>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
<?php



