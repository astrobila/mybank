<meta name="description" content="">

<title><?=$pageTitle?></title>

<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
<!--link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"-->
    <!--link href="./public/index_docs/lib/animate/animate.min.css" rel="stylesheet"-->
    <!--link href="./public/index_docs/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"-->
    <!--link href="./public/index_docs/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /!-->
<style>
<?php
  if (!isset($mainCSSStyle)) {
?>
body {
  font-size: .875rem;
  background-color: #F7F8FB;
}

.feather {
  width: 16px;
  height: 16px;
}
/*
:root {
    --primary: #000000;
    --secondary: #FE8800;
    --light: #000000;
    --dark: #14141F;
}

.fw-medium {
    font-weight: 600 !important;
}

.fw-semi-bold {
    font-weight: 700 !important;
}

.back-to-top {
    position: fixed;
    display: none;
    right: 45px;
    bottom: 45px;
    z-index: 99;
}

.ini{
    margin-left: 6rem;
    width: 43rem;
}
.itu{
    background-color: #70C86E;
    margin-right: 33rem;
    width: 12rem;
}
.situ{
    background-color: #5c8cd2;
    width: 11rem;
}
.sini{
    margin-right: -15rem;
    margin-top: -20rem;
    margin: -24rem 0rem 0rem -13rem;
}
.foto img{
    width: 32%;
    margin-right: 20rem;
}
.wis{
    margin-right: 70rem;
}
.orca img{
    width: 45%;
}
.orca{
    width: 30rem;
}
.orca 
h5{
    margin-left: 1rem;
    margin-top: 2px;
}
.orca 
p{
    color: #000000;
    margin-left: 1rem;
    font-size: 25px;
    margin-top: 11px;
}
.progress-bar{
    background-color: #ea882d;
}

/*** Button ***/
/*
.btn {
    font-family: 'Nunito', sans-serif;
    border-radius: 19px;
    transition: .5s;
    width: 7rem;
}

.btn.btn-success {
    color: #FFFFFF;
    margin: 14rem 0rem 0rem 10rem;
    
}

.btn.btn-outline-success{
    margin: 16rem 0rem 1rem 0rem;
}
.btn-lg-square{
    width: 50px;
    border-radius: 50%;
}

.col-6{
    width: 57%;
    margin: -36% 50% 0% 44%;
    text-align: center;
    box-shadow: 0px 0px 6px 2px #435438;
}
h5{
    margin-top: -30px;
    font-family: "Nunito",sans-serif;
    font-weight: bold;
    font-size: 25px;
    color: #000000;
}
*/
@media (max-width: 767.98px) {
  .navbar-nav {
    display: none;
  }

  .sidebar {
    top: 0rem;
  }

  .nav-item-topitem {
    display: block !important;
  }
}

.nav-item-divider {
  border-top: 1px solid #c0c0c0;
}

.sidebar-sticky {
  height: calc(100vh - 48px);
  overflow-x: hidden;
  overflow-y: auto;
}

.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  /*background-color: rgba(0, 0, 0, .25);
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);*/
}

.nav-link {
  font-size: large;
  color: white;
}

.navbar .navbar-toggler {
  top: .25rem;
  right: 1rem;
}

.navbar .form-control {
  padding: .75rem 1rem;
}
/*
.service-item {
    box-shadow: 0 0 45px rgba(0, 0, 0, .08);
    transition: .5s;
}

.service-item * {
    transition: .5s;
}

.service-item:hover * {
    color: var(--light) !important;
}


.footer .btn.btn-social {
    margin-right: 5px;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--light);
    font-weight: normal;
    border: 1px solid #FFFFFF;
    border-radius: 35px;
    transition: .3s;
}

.footer .btn.btn-social:hover {
    color: var(--primary);
}

.footer .btn.btn-link {
    display: block;
    margin-bottom: 5px;
    padding: 0;
    text-align: left;
    color: #FFFFFF;
    font-size: 15px;
    font-weight: normal;
    text-transform: capitalize;
    transition: .3s;
}

.footer .btn.btn-link::before {
    position: relative;
    content: "\f105";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 10px;
}

.footer .btn.btn-link:hover {
    letter-spacing: 1px;
    box-shadow: none;
}

.footer .copyright {
    padding: 25px 0;
    font-size: 15px;
    border-top: 1px solid rgba(256, 256, 256, .1);
}

.footer .copyright a {
    color: var(--light);
}

.footer .footer-menu a {
    margin-right: 15px;
    padding-right: 15px;
    border-right: 1px solid rgba(255, 255, 255, .1);
}

.footer .footer-menu a:last-child {
    margin-right: 0;
    padding-right: 0;
    border-right: none;
}

*/
<?php 
  } else { 
    echo $mainCSSStyle;
  } 
?>
</style>

</head>


<body>