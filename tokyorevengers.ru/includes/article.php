<?php
require "/includes/config.php";
?>

<title><?php echo $config['title']; ?></title>

<!-- Bootstrap Grid -->
<link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

<!-- Custom -->
<link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

<div id="wrapper">

<?php include "/includes/header.php";?>

<?php 
 $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = "  . (int) $_GET['id'] );

 if( mysqli_num_rows($article) <=0 )
 {
    ?>
    <div id="content">
    <div class="container">
      <div class="row">
        <section class="content__left col-md-8">
          <div class="block">
            <h3>Статья не найдена</h3>
            <div class="block__content">
                Запрашиваемая Вами статья не существует :(
              <div class="full-text">

              </div>
            </div>
          </div> 
        </section>
        <section class="content__right col-md-4">
          <?php include "/includes/sidebar.php"; ?>
        </section>
      </div>
    </div>
  </div>

    <?php
 } else
 
 {
    $art = mysqli_fetch_assoc($article);
    ?>
<div id="content">
    <div class="container">
      <div class="row">
        <section class="content__left col-md-8">
          <div class="block">
            <a><?php echo $art['views'] ?>просмотров</a>
            <h3><?php echo $art['title'];?></h3>
            <div class="block__content">
              <div class="full-text"><?php echo $art['text']; ?></div>
            </div>
          </div> 
        </section>
        <section class="content__right col-md-4">
          <?php include "/includes/sidebar.php"; ?>
        </section>
      </div>
    </div>
  </div>
    <?php
 }

?>

  <?php include "/includes/footer.php"; ?>

</div>

</body>
</html>