<meta name="description" content="">

<title><?=$pageTitle?></title>

<link href="./assets/css/bootstrap.min.css" rel="stylesheet">

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

<?php 
  } else { 
    echo $mainCSSStyle;
  } 
?>
</style>

</head>


<body>