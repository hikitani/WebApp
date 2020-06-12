<?php require 'Model/db.php' ?> 

<?php
	if (empty($_SESSION['logged_user'])) {
		header('Location: /index.php');
	}
	$my_quests = R::find('quests', 'id_user = ?', [$_SESSION['logged_user']->id])
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Main | Welcome</title>
	<meta charset="utf-8">
	<meta name="description" content="Sublime Stunning free HTML5/CSS3 website template"/>
	
	<link rel="stylesheet" type="text/css" href="/assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/animate.css">
  	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">

</head>
<body>

	<section class="billboard dark">
		<header class="wrapper light">
			<nav>
				<ul>
					<li><a>Привет, 
						<?php 
							// session_start();
							echo $_SESSION['logged_user']->login;
						?>
					</a></li>
					<li><a href="#">О нас</a></li>
					<li><a href="/view/start.html">Создать квест</a></li>
					<li id="log_out"><a href="/Controller/logout.php">Выйти</a></li>
					<li><a href="#"><span class="icon solid fa-user"></span></a></li>
				</ul>
			</nav>
		</header>

		<div class="caption light animated wow fadeInDown clearfix">
			<!-- <hr> -->
			<?php if (count($my_quests) != 0): ?>
				<h1>Мои квесты</h1>
				<ul>
					<?php foreach($my_quests as $quest): ?>
						<li><a href="/quest_info.php?id_quest=<?php echo $quest->id ?>&"><p><?php echo $quest->name ?></p></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<hr>
		</div>
		<!-- <div class="shadow"></div> -->
	</section><!--  End billboard  -->

	<div class="personal_area">
		
	</div>

	
	<section class="services wrapper">
		<ul class="clearfix">
			<li class="animated wow fadeInDown">
				<img class="icon" src="images//sakura.png" alt=""/>
				<span class="separator"></span>
				<h2>Title 1</h2>
			</li>
			<li class="animated wow fadeInDown"  data-wow-delay=".2s">
				<img class="icon" src="images/flowers.png" alt=""/>
				<span class="separator"></span>
				<h2>Title 2</h2>
			</li>
			<li class="animated wow fadeInDown"  data-wow-delay=".4s">
				<img class="icon" src="images/flower.png" alt=""/>
				<span class="separator"></span>
				<h2>Title 3</h2>
			</li>
		</ul>
	</section><!--  End services  -->


	<section class="video">
		<h3 class="animated wow fadeInDown">who we are & what we do</h3>
		<a href="/view/styles.html" id="play_btn" class="fancybox animated wow flipInX" data-wow-duration="2s"><img src="/images/Icon_1-512.png" width="71" height="71"></a></a>
	</section><!--  End video  -->


	<section class="testimonials wrapper">
		<div class="title animated wow fadeIn">
			<h2>Create your own quest-project</h2>
			<h3>thats everything for this page :)</h3>
			<hr class="separator"/>
		</div>

</body>
/
<script src="/assets/js/registration.js"></script>
</html>