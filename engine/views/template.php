<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $this->description; ?>">
<meta name="keywords" content="<?php echo $this->keywords; ?>">
<meta name="author" content="Ishutinov Dmitry">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="1 days">
<title><?php echo $this->title; ?> | <?php echo SiteName; ?></title>
<link rel="stylesheet" href="/design/css/bootstrap.min.css">
<link rel="stylesheet" href="/design/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/design/css/style.css">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/design/javascript/jquery.min.js"></script>
<script type="text/javascript" src="/design/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="/design/javascript/scripts.js"></script>
</head>
<body>
<!-- Navigation -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="/"><?php echo SiteName; ?></a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li><a href="/contacts">Список контактов</a></li>
<li><a href="/contacts/add">Добавить новую запись</a></li>
</ul>
</div>
</div>
</div>
<!-- Content -->
<div class="container">
<div id="indicator" style="display: none; text-align: center;">
Идет обработка данных...
</div>
<?php require_once('engine/views/'.$content.'.php'); ?>
<hr>
<!-- Footer -->
<footer>
<div class="row">
<div class="col-lg-12 text-center">
<p><?php echo SiteCopyright; ?></p>
</div>
</div>
</footer>
<div class="scroll-top-wrapper ">
<span class="scroll-top-inner">
<i class="glyphicon glyphicon-upload"></i>
</span>
</div>
</div>
</body>
</html>
