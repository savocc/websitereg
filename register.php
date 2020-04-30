<?php
session_start();
# Переменная проверяет, проходит ли файл проверку php и js
$valid = 0;
# В зависимости от выбранного пользователем значения(Russian/English) в коде используется значения
# из массива с русскими названиями или из массива с английскими
$lang = @$_GET["language"];
# Сессия передает данные на следующую страницу для изменения языка
$_SESSION["lang"] = $lang;
if($lang == "Russian") {
    $input = array(
        "formname" => "Форма для регистрации",
        "sellanguage" => "Выберите язык",
        "firstn"=>"Имя",
        "lastn"=>"Фамилия",
        "birth"=>"День Рождения",
        "gend"=>"Пол",
        "male"=>"Мужчина",
        "female"=>"Женщина",
        "mail"=>"Электронная почта",
        "phonen"=>"Телефон",
        "upload"=>"Загрузите фотографию профиля",
        "submit"=>"Открыть профиль",
        "alertPhone"=>"Неверный формат телефона.",
        "alertEmail"=>"Неверный формат электронной почты.",

    );
}
else{
    $input = array(
        "formname" => "Registration form",
        "sellanguage" => "Select language",
        "firstn"=>"First Name",
        "lastn"=>"Last Name",
        "birth"=>"Birthday",
        "gend"=>"Gender",
        "male"=>"Male",
        "female"=>"Female",
        "mail"=>"Email",
        "phonen"=>"Phone Number",
        "upload"=>"Upload Profile Picture",
        "submit"=>"Submit",
        "alertPhone"=>"Invalid Phone.",
        "alertEmail"=>"Invalid Email",
    );
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>Savochkina Project</title>
    <link href="form1/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="form1/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Vendor CSS-->
    <link href="form1/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="form1/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="form1/css/main.css" rel="stylesheet" media="all">
</head>

<body>
<script>
    // функции отвечают за uncheck кнопок
    function radio1(radio){
        if( radio.checked === true){
            document.getElementById("gender2").checked= false;
        }
    }
    function radio2(radio){
        if( radio.checked === true){
            document.getElementById("gender1").checked= false;
        }
    }
    // функции отвечают за проверку ввода почты и телефона
    function emailValid(mail) {
        let isValidEmail = mail.checkValidity();
        if(isValidEmail === false){
            alert("<?php echo $input["alertEmail"];?>");
        }
    }
    function phoneValid(phone){
        let isValidPhone = phone.checkValidity();
        if(isValidPhone === false){
            alert("<?php echo $input["alertPhone"];?>");
        }
    }

</script>
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title"><?php echo $input["formname"];?></h2>
                <form method = "GET">
                    <! ––когда пользователь меняет язык в списке, страница обновляется и меняется язык страницы  ––>
                    <select id='lang' onchange="document.location.href='register.php?language='+this.options[this.selectedIndex].value">
                        <option name = "select language" ><?php echo $input["sellanguage"];?></option>
                        <option name = "English" value = "English">English</option>
                        <option name = "Russian" value = "Russian">Russian</option>
                    </select>
                </form>
                <form action="" method="POST" enctype="multipart/form-data">
                    <br><br>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label"><?php echo $input["firstn"] ;?></label>
                                <input class="input--style-4" type="text" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label"><?php echo $input["lastn"] ;?></label>
                                <input class="input--style-4" type="text" name="last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label"><?php echo $input["birth"] ;?></label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" type="text" name="birthday" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label"><?php echo $input["gend"] ;?></label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45"><?php echo $input["male"] ;?>
                                        <input type="radio" onchange = "radio1(this)" name="gender1" id ="gender1" checked = "checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container"><?php echo $input["female"] ;?>
                                        <input type="radio" onchange = "radio2(this)" name="gender2" id ="gender2">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label"><?php echo $input["mail"] ;?></label>
                                <input class="input--style-4" type="email" name="email" id ="email" onchange="emailValid(this)">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label" title="Input number without a country code"><?php echo $input["phonen"] ;?></label>
                                <input class="input--style-4" type="text" name="phone" id ="phone" onchange="phoneValid(this)" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="label"><?php echo $input["upload"] ;?></label>
                        <div class="rs-select2 js-select-simple select--no-search">
                        <br>
                                <input type="file" name = "pict" id="pict">

                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="p-t-15">

                        <button class="btn btn--radius-2 btn--blue" onclick="forHeader()" name = "submitbutton"  type="submit"><?php echo $input["submit"] ;?></button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="form1/vendor/jquery/jquery.min.js"></script>
<script src="form1/vendor/select2/select2.min.js"></script>
<script src="form1/vendor/datepicker/moment.min.js"></script>
<script src="form1/vendor/datepicker/daterangepicker.js"></script>
<script src="form1/js/global.js"></script>

</body>


<?php
# файл с подключением к базе данных
include("index.php");
# проверка введения данных в форму
if(!empty($_POST['first_name'])  and !empty($_POST['last_name']) and !empty($_POST['birthday']) and !empty($_POST['email']) and !empty($_POST['phone']) ) {
     $fname = @$_POST['first_name'];
     $lname = @$_POST['last_name'];
     $birtd = @$_POST['birthday'];
     $phone = @$_POST['phone'];
     $email = @$_POST['email'];
     $pict = $_FILES['pict']['name'];
# в зависимости от выбора пользователя определяется переменная gender
     if (@$_POST['gender1'] == "on") {
         $gender = "Male";
     } else {
         $gender = "Female";
     }
# картинка загружается в папку img
     $upload_dir = 'img/';
     $image = addslashes(@file_get_contents($_FILES['pict']['tmp_name']));
     $tmp_dir = $_FILES['pict']['tmp_name'];
     $imgExt = strtolower(pathinfo($pict, PATHINFO_EXTENSION)); // get image extension
     move_uploaded_file($tmp_dir, $upload_dir . $pict);
# удаление существующих данных из базы данных
     $forDel = "DELETE FROM userinfo";
     $conn->query($forDel);
# вставление новых данных в базу данных
     $sql = "INSERT INTO userinfo(firstName, lastName, birthday, gender, email, phonenum, picture) VALUES (' $fname', ' $lname', ' $birtd', ' $gender',' $email', ' $phone', ' $pict')";

     if ($conn->query($sql) === TRUE) {
# переменная valid отвечает за открытие следующей страницы. Если значение - 1 - данные верны и при нажатии кнопки страница откроется
$valid = 1;
?>
<?php
     } else {
$valid = 0;
         echo "Error: " . $sql . "<br>" . $conn->error;
         echo "<script>
alert('ERROR');
 </script>";
     }
 }
$submitButton= @$_POST['submitbutton'];
# условие выполняется при нажатии пользователем кнопки submit
if(isset($submitButton)){
?>
         <script>
             var b = "<?php echo $valid; ?>";
             if(b === "1") {
                 window.open('showinfo.php');
             }
             else{
                 alert("Input Invalid!");
             }
         </script>
<?php } ?>


