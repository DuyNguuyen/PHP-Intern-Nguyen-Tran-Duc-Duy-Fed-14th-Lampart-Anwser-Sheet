
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?= ASSETS?>/css/main.css" rel="stylesheet" type="text/css">

    <title><?= $data['page_title']?> | Login_System</title>
 </head><!--/head-->



<body>
<div id="page-container"> 
<div id="content-wrap">
<header id="header"><!--header-->
    <div class="d-flex align-items-center ml-3">
            <a href="<?=ROOT?>home" class="btn <?= ($data['page_title'] === 'Home') ? "btn btn-primary m-1" : "btn btn-light m-1" ?>" role="button"></i>Home</a>
        <?php if(isset($data['user_data'])): ?>
            <a href="<?=ROOT?>logout" class="btn <?= ($data['page_title'] !== 'Home') ? "btn btn-primary m-1" : "btn btn-light m-1" ?>" role="button">Logout</a>
        <?php else: ?>
            <a href="<?=ROOT?>login" class="btn <?= ($data['page_title'] !== 'Home') ? "btn btn-primary m-1" : "btn btn-light m-1" ?>" role="button">Login</a>
        <?php endif; ?>
        <img src="<?= ASSETS?>images/logo.png" class="ml-auto" alt="This is website logo">
    </div>
</header><!--/header-->

	