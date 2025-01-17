<?php
session_start();

require_once "classes/Member.php";
require_once "classes/Util.php";
require_once "classes/Auth.php";
$messaggio = "";

if(isset($_POST['member_email']) && isset($_POST['member_token']))
{
    $auth = new Auth();
    $member = new Member();
    $util = new Util();
    $token = $_POST['member_token'];
    $email = $_POST['member_email'];
    if($member->verify($email, $token)){
        $_SESSION['verified'] = true;
        $user = $auth->getMemberByUsername($email);
        $admin = $user[0]["is_admin"];
        $_SESSION['mail'] = $_POST['member_email'];
        if($admin == 1)
        {
            $_SESSION['admin'] = true;
            $util->redirect("newAdmin.php");
        }
        else
            $util->redirect("newDashboard.php");
    }
    else {
        $messaggio = "Errore: email o token non validi";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- MetaData -->
    <link rel="shortcut icon" type="image/x-icon" href="./img/logo.svg">

    <!-- Better mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Belle Foto srl - Login</title>
    <!-- BootStrap -->
    <link rel="stylesheet" href="./dependences/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="./dependences/jquery.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- BootStrap things again -->
    <script src="./dependences/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="./dependences/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Page Css -->
    <link rel="stylesheet" href="./css/main.css" >
    <style>


        /* Html Body normal css */
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            scroll-behavior: smooth;
            height: 100vh;
            background-image: url("./img/background.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Nav Things */
        #top {
            margin-left: 0 !important;
            margin-right: 0 !important;
            width: 100%;
            max-width: 100%;
            height: 20%;
            margin-top: 0 !important;;
        }

        @keyframes rainbow {
            0% {
                filter: invert(50%) sepia(100%) saturate(1000%) hue-rotate(100deg) brightness(102%) contrast(102%);
                transform: rotate(0deg);
            }
            100% {
                filter: invert(50%) sepia(50%) saturate(1000%) hue-rotate(200deg) brightness(102%) contrast(102%);
                transform: rotate(360deg);
            }
        }

        /* Logo sizes */
        #logoSmall {
            height: 50px;
            width: 80px;
            animation: rainbow 2s infinite;
            animation-direction: alternate-reverse;
        }

        /* Inside nav */
        #nav {
            background-color: blue !important;
            border-bottom: solid #ececec 0px;
            width: 100%;
            z-index: 2;
        }

        /* Add line when we press the button in small screen */
        @media (max-width: 988px) {
            #navbarResponsive {
                border-top: 1px #acacac solid;
                margin-top: 8px;
            }
        }

        /* Main Content, we use display: Flex and flex-flow: column for making the actual content
           full size
         */
        #content {
            height: 100%;
            display: flex;
            flex-flow: column;

        }


        /* Padding for the nav */
        #padding-header {
            min-height: 76px;
        }

        /* Main Content CSS */
        #mainContent {
            background-color: transparent;
            flex-grow: 1;
            z-index: 1;
            left:0;
            top:0;
            right:0;
            bottom:0;
            width:calc(100% - 100px);
            box-sizing: border-box;
            height:auto;
            margin-bottom:50px;
            margin-top:50px;
            margin-left: 50px;
            margin-right: 50px;
        }

        .nav-link {
            color: white !important;
        }

        .custom-toggler.navbar-toggler {
            border-color: transparent;
        }
        /* Setting the stroke to green using rgb values (0, 128, 0) */

        .custom-toggler .navbar-toggler-icon {
            background-image: url(
            "data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='3' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
        }
        #contenitoreForm {
            height: 100%;
            max-width: 600px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 50px 1fr;
            grid-template-rows: 1fr;
            gap: 0px 0px;

        }
        #divForm {
            background-color: white;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;

        }
        #bottoni {
            writing-mode: vertical-rl;
            display: flex;
        }
        .scelte {
            background-color: #005eff;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            text-align: center;
            padding-right: 5px;
            color: white;
            margin-bottom: 10px;
        }
        #loginScelta {
            height: 75px;
        }
        #registrazioneScelta {
            height: 125px;
        }
        .popover {
            display: none;
        }
    </style>
</head>
<body>



<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-absolute " id="nav">

    <div class="container" id="top">
        <a class="navbar-brand" id="logo" href="#">
            <img src="./img/logo.svg" alt="Belle Foto srl logo" id="logoSmall"> Belle Foto srl       </a>

        <button class="navbar-toggler ml-auto custom-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crediti.html">Crediti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FAQ.html">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="terms.html">Terms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacts.html">Contacts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="content">
    <!-- Since we have an header that is absolute, we have to simulate his height, and we'll do this is a padding  -->
    <div id="padding-header">
    </div>
    <!-- Main Content -->
    <div id="mainContent">

        <style>
            .Titolo {
                text-align: center;
                padding-top: 10px;
                font-size: 75px;
                margin-bottom: 0;
            }
            .loginReg {
                height: 100%;

            }
            .cointainerForm {
                height: 70%;
                margin-left: 20px;
                margin-right: 20px;
            }
            .sottoTitolo {
                text-align: center;
                font-size: 30px;
            }

            form{
                padding: 0 2em;
            }
            .form__input{
                width: 100%;
                border:0px solid transparent;
                border-radius: 0;
                border-bottom: 1px solid #aaa;
                padding: 1em .5em .5em;
                padding-left: 2em;
                outline:none;
                margin:1.5em auto;
                transition: all .5s ease;
            }
            .form__input:focus{
                border-bottom-color: #005eff;
                box-shadow: 0 0 5px rgba(0,80,80,.4);
                border-radius: 4px;
            }
            .btn{
                transition: all .5s ease;
                width: 70%;
                border-radius: 30px;
                color:#005eff;
                font-weight: 600;
                background-color: #fff;
                border: 1px solid #005eff;
                margin-top: 1.5em;
                margin-bottom: 1em;
            }
            .btn:hover, .btn:focus{
                background-color: #005eff;
                color:#fff;
            }

            @keyframes fadeout {
                from { opacity: 1; }
                to   { opacity: 0; }
            }

            /* Firefox < 16 */
            @-moz-keyframes fadeout {
                from { opacity: 1; }
                to   { opacity: 0; }
            }

            /* Safari, Chrome and Opera > 12.1 */
            @-webkit-keyframes fadeout {
                from { opacity: 1; }
                to   { opacity: 0; }
            }

            /* Internet Explorer */
            @-ms-keyframes fadeout {
                from { opacity: 1; }
                to   { opacity: 0; }
            }

            /* Opera < 12.1 */
            @-o-keyframes fadeout {
                from { opacity: 1; }
                to   { opacity: 0; }
            }


            /* Fadin */
            @keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Firefox < 16 */
            @-moz-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Safari, Chrome and Opera > 12.1 */
            @-webkit-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Internet Explorer */
            @-ms-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Opera < 12.1 */
            @-o-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            .regReg {
                display: none;
                overflow-y: scroll;
            }
            .container{
                margin-top:20px;
            }
            .image-preview-input {
                position: relative;
                overflow: hidden;
                margin: 0px;
                color: #333;
                background-color: #fff;
                border-color: #ccc;
            }
            .image-preview-input input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);
            }
            .image-preview-input-title {
                margin-left:2px;
            }
            #dynamic {
                width: 100px;
            }

        </style>



        <div id="contenitoreForm">
            <div id="bottoni">
                <div id="loginScelta" class="scelte"  onclick="window.location.href = 'newLogin.php'">Login</div>
                <div id="registrazioneScelta" class="scelte" onclick="window.location.href = 'newRegister.php'">Registrazione</div>
            </div>
            <div id="divForm">
                <div class="loginReg">
                    <h1 class="Titolo">Benvenuto!</h1>
                    <h2 class="sottoTitolo">Verifica il tuo account</h2>
                    <div class="cointainerForm">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="frmLogin">
                            <div class="row">
                                <input name="member_email" type="text"
                                       class="input-field form__input" placeholder="Email">
                            </div>
                            <div class="row">
                                <!-- <span class="fa fa-lock"></span> -->
                                <input name="member_token" type="text"
                                       class="input-field form__input" placeholder="Token">
                            </div>
                            <center>
                                <input type="submit" name="login" value="Submit" class="form-submit-button btn">
                            </center>
                        </form>
                    </div>
                </div>
                <div class="regReg">
                    <h1 class="Titolo">Benvenuto</h1>
                    <form control="" class="form-group" style="height: 90%; overflow-y: scroll">
                        <div class="row">
                            <input type="text" name="Email" id="Email" class="form__input" placeholder="Email">
                        </div>
                        <div class="row">
                            <div class="col sm-12">
                                <input type="text" name="Nome" id="Nome" class="form__input" placeholder="Nome">
                            </div>
                            <div class="col sm-12">
                                <input type="text" name="Cognome" id="Cognome" class="form__input" placeholder="Cognome">
                            </div>
                        </div>
                        <div class="row">
                            <!-- <span class="fa fa-lock"></span> -->
                            <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                        </div>
                        <div class="row">
                            <!-- <span class="fa fa-lock"></span> -->
                            <input type="password" name="passwordConferma" id="passwordConferma" class="form__input" placeholder="Conferma Password">
                        </div>
                        <div class="row">
                            <div class="col-sm-12" id="divInput">
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="input-group image-preview">
                                    <input id="inputFile" type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                                        <!-- image-preview-input -->
                                        <div class="btn btn-default image-preview-input" style="width: 100%">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title">Browse</span>
                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <center>

                            <input type="submit" value="Submit" class="btn">
                        </center>
                    </form>
                </div>
            </div>

            <script>
                /*
                var display = "login";
                document.getElementById("registrazioneScelta").addEventListener("click", () => {
                    display = "registrazione";
                    document.getElementsByClassName("regReg")[0].style.display = "initial";
                    document.getElementsByClassName("loginReg")[0].style.display = "none"
                });
                document.getElementById("loginScelta").addEventListener("click", () => {
                    if (display !== "login") {
                        display = "login";
                        document.getElementsByClassName("loginReg")[0].style.display = "initial";
                        document.getElementsByClassName("regReg")[0].style.display = "none";
                    }
                });*/

                var item = document.getElementById("divInput");
                item.addEventListener("mouseover", () => {
                    //alert("dentro")
                    var all = document.getElementsByClassName('popover');
                    for (var i = 0; i < all.length; i++) {
                        all[i].style.display = 'initial';
                    }
                }, false);
                item.addEventListener("mouseout", () => {
                    //alert("fuori")
                    var all = document.getElementsByClassName('popover');
                    for (var i = 0; i < all.length; i++) {
                        all[i].style.display = 'none';
                    }
                }, false);

                $(function() {

                    // Set the popover default content
                    $('.image-preview').popover({
                        trigger:'manual',
                        html:true,
                        title: "<strong>Preview</strong>",
                        content: "There's no image",
                        placement:'bottom'
                    });

                    // Create the preview image
                    $(".image-preview-input input:file").change(function (){
                        var img = $('<img/>', {
                            id: 'dynamic',
                            width:250,
                            height:200
                        });
                        var file = this.files[0];
                        var reader = new FileReader();
                        // Set preview image into the popover data-content
                        reader.onload = function (e) {
                            $(".image-preview-input-title").text("Change");
                            $(".image-preview-clear").show();
                            $(".image-preview-filename").val(file.name);
                            img.attr('src', e.target.result);
                            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                        }
                        reader.readAsDataURL(file);
                    });
                });
            </script>

        </div>

    </div>
</div>

<!--Modal: modalCookie-->
<div class="modal fade top" id="modalCookie1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Body-->
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">

                    <p class="pt-3 pr-2"><?php echo $messaggio ?></p>

                    <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Chiudi</a>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<script>
    <?php
    if ($messaggio != "") {
        echo "$('#modalCookie1').modal('show');";
    }
    ?>
</script>


</body>
</html>