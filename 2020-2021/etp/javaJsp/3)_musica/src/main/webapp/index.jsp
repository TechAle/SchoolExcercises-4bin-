<!--
    File: index.jsp

    Autore: Alessandro Condello
    Ultima modifica: 13/04/2021
-->
<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ page import="com.example.musica.Carrello" %>
<%
    HttpSession sessions = request.getSession(false);
    String id = (String) sessions.getAttribute("id");
    Carrello zip = (Carrello) sessions.getAttribute("zip");
    Boolean isDemo = (Boolean) sessions.getAttribute("demo");
%>
<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="icon" href="logo/logo.png">
    <!-- Per mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MusikBox</title>
    <!-- BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Pagina corrente css -->
    <link rel="stylesheet" href="./css/main.css" >
    <style>
        /* Video css */
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: 0;
        }

        /* Font */
        @font-face {

            font-family: "Arkanoid Solid";
            src: url('./font/Arka_solid.ttf') format("truetype");

        }

        /* Testo */
        .gs {
            stroke-width: 4px;
            letter-spacing: 3px;
            font-weight: 400;
            /*noinspection CssNoGenericFontName*/
            font-family : "Arkanoid Solid";
            fill : transparent;
            stroke-dasharray:100%;
            stroke-dashoffset:0;
            animation-name: outline;
            animation-duration: 3.5s;
            animation-timing-function: ease-in;
            animation-fill-mode: forwards;
        }

        /* Descrizione */
        .gsDesc {
            stroke-width: 4px;
            letter-spacing: 3px;
            font-weight: 400;
            /*noinspection CssNoGenericFontName*/
            font-family : Arial;
            fill : transparent;
            stroke-dasharray:100%;
            stroke-dashoffset:0;
            animation-name: outline;
            animation-duration: 3.5s;
            animation-timing-function: ease-in;
            animation-fill-mode: forwards;
        }

        /* Container titolo/descrizione */
        #gs {
            width: 100%;
            height: 25vw;
            margin-top: 35px;
        }

        /* Dimensioni */
        .small {
            font-size: 13vw;
        }
        .large {
            font-size: 10vw;
        }
        #largeDesc {
            stroke-width: 2px;
            font-size: 7vw;
        }
        #smallDesc {
            stroke-width: 1px;
            font-size: 7vw;
        }


        /* Dobbiamo rendere invisibile il piccolo */
        .small { display: none; }

        /* per mobile */
        @media (max-width: 988px) {
            .small { display: inline-block; }
            .large { display: none; }
            #myVideo {
                left: -350px
            }
        }

        /* Animazioni */
        @keyframes outline{
            from{
                stroke-dashoffset:100%;
            }

            to{
                stroke-dashoffset:0;
            }
        }

        /* bottone css */
        .btn-outline {
            color: white;
            background-color: transparent;
            border-color: #40934d;
            font-weight: bold;
            letter-spacing: 0.05em;
        }

        .btn-outline {
            color: #00ff28;
            background-color: transparent;
            border-color: #40934d;
            font-weight: bold;
            border-radius: 3px;
            border-width: 2px;
            transition: color .4s linear;
        }

        .btn-outline:hover,
        .btn-outline:active,
        .btn-outline:focus {
            color: cyan;
        }
        #buttonDiv {
            text-align: center;
            margin-left: 1vw !important;
            width: 98vw !important;
            max-width: 98vw !important;
        }
        .btn {
            width: 100%;
            max-width: 300px;
            height: 50px;
            margin-top: 15px !important;
            padding-top: 10px !important;
        }
        /* footer */
        footer {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #292929;
        }

        footer > div {
            color: white;
            text-align: center;
        }
        /* Add the padding when med col */
        @media (max-width: 992px) {
            #pad {
                display: none !important;
            }
        }
    </style>
</head>
<body>
<!-- Il video in background -->
<video autoplay muted loop id="myVideo">
    <source src="./background/back.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
</video>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-absolute " id="nav">
    <!-- Vai al top -->
    <div class="container" id="top">
        <!-- Immagine -->
        <a class="navbar-brand" id="logo" href="index.jsp">
            <img src="./logo/logo.png" alt="MusicBox logo" id="logoSmall">        </a>
        <!-- Toggle per mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- NavBar -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.jsp">Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<%= id == null ? "login.jsp" : "logout.jsp" %>"><%= id == null ? "Login" : "Logout" %></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="informazioni.jsp">Informazioni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="negozio.jsp">Negozio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crediti.jsp">Crediti</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="content">
    <!-- Aggiungiamo un pò di padding per l'header siccome è assoluto  -->
    <div id="padding-header">
    </div>
    <!-- Main Content -->
    <div id="mainContent">


        <!-- Animazione testo -->
        <svg id="gs">
            <!-- Colore gradiente -->
            <defs>
                <linearGradient id="gradient" x1="0" x2="1">
                    <stop stop-color="#2ffd33" offset="0"/>
                    <stop stop-color="white" offset="1"/>
                </linearGradient>
            </defs>
            <!-- Titolo -->
            <symbol id="GsTitle">
                <!-- Il primo è il grande, il secondo piccolo -->
                <text text-anchor="middle" x="50%"  y="50%" class="text--line gs large" >
                    MusikBox
                </text>
                <text text-anchor="middle" x="50%"  y="50%" class="text--line gs small" >
                    mb
                </text>
                <!-- Description, one is for big screen, the other is for small -->
                <text text-anchor="middle" x="50%"  y="80%" class="text--line gsDesc large" id="largeDesc">
                    Shop Musica Online
                </text>
                <text text-anchor="middle" x="50%"  y="80%" class="text--line gsDesc small" id="smallDesc">
                    Shop Musica
                </text>
            </symbol>

            <!-- Mostriamo -->
            <g class="g-ants">
                <!-- Usiamo stroke= anzichè un css siccome, nel css, stroke non funziona
                     se stiamo usando svg
                 -->
                <use xlink:href="#GsTitle"
                     class="text-copy" id="outLineGs" stroke="url(#gradient)"></use>
            </g>


        </svg>
        <!-- Fine animazione -->

        <!-- Lista bottoni -->
        <div id="buttonDiv" class="container">
            <div class="row">
                <!--
                    Il col è fatto così:
                    screen largo, tutti in 1 linea
                    screen medio, 2 in 1 linea
                    screen piccolo, ognuno una nuova linea
                 -->
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="<%= id == null ? "login.jsp" : "logout.jsp" %>" class="btn btn-outline"><%= id == null ? "Login" : "Logout" %></a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="informazioni.jsp" class="btn btn-outline">Informazioni</a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="negozio.jsp" class="btn btn-outline">Negozio</a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="crediti.jsp" class="btn btn-outline">Crediti</a>
                </div>
                <%=
                    // Se è demo, aggiungi il pulsante reset password
                    isDemo == null ? "" :
                    "<div class=\"col-sm-12 col-md-6 col-lg-3\">\n" +
                            "                    <a href=\"reset.jsp\" class=\"btn btn-outline\">Reset</a>\n" +
                            "                </div>"
                %>

                <%=
                // Se abbiamo comprato, mostra il pulsante "download". Aggiungiamo un div per il padding per una migliore grafica
                zip == null ? "" :
                                "                <div class=\"col-md-6\" id=\"pad\"></div><div class=\"col-sm-12 col-md-6 col-lg-3\">\n" +
                                "                    <a href=\"zip\" class=\"btn btn-outline\">Scarica</a>\n" +
                                "                </div>"
                %>
            </div>
        </div>
    </div>
</div>

<footer>
    <div>
        Creato da condello alessandro per fini didattici
    </div>
</footer>


</body>
</html>