<?php require 'Model/db.php' ?> 

<?php
    if (empty($_SESSION['logged_user'])) {
        header('Location: /index.php');
    }
    $my_quest = R::findOne('quests', 'id_user = ? and id = ?', [$_SESSION['logged_user']->id, $_GET['id_quest']]);
    $roles = R::find('roles', 'id_quest = ?', [$my_quest->id]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $my_quest->name ?></title>
	<meta charset="utf-8">
	<meta name="description" content="Sublime Stunning free HTML5/CSS3 website template"/>
	
	<link rel="stylesheet" type="text/css" href="/assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <style type="text/css">
        .left {
            text-align: left;
            float: left;
            margin-left: 10%;
		}
		table {
			margin-left: 40%;
		}
    </style>
</head>
<body>

	<section class="billboard dark">
		<header class="wrapper light">
			<nav>
				<ul>
                    <li><a href="/index.php">Главная</a></li>
					<li><a href="/create_role.php?id_quest=<?php echo $my_quest->id ?>">Новая роль</a></li>
					<li id="log_out"><a href="/Controller/logout.php">Выйти</a></li>
					<li><a href="#"><span class="icon solid fa-user"></span></a></li>
				</ul>
			</nav>
		</header>

		<div class="wrapper caption light animated wow fadeInDown clearfix">
			<h2><?php echo $my_quest->name ?></h2>
			<p><?php echo $my_quest->description ?></p>
		</div>
		
		<div class="wrapper caption light animated wow fadeInDown clearfix">
            <?php if (count($roles) != 0): ?>
				<h2>Роли</h2>
				<ul>
					<?php foreach($roles as $role): ?>
                        <li>
							<table border="0">
								<tr>
									<td width="10%"><p><?php echo $role->name ?></p></td>
									<td width="auto"><a href="/view_role.php?id_role=<?php echo $role->id ?>&"><p>Посмотреть</p></a></td>
									<td width="auto"><a href="/edit_role.php?id_role=<?php echo $role->id ?>&"><p>Настроить</p></a></td>
								</tr>
							</table>
                        </li>
					<?php endforeach; ?>
                </ul>
            <?php else: ?>
                <h2> Для данного квеста еще не созданы роли</h2>
			<?php endif; ?>
		</div>
		<!-- <div class="shadow"></div> -->
	</section><!--  End billboard  -->
</body>
/
<script src="/assets/js/registration.js"></script>
</html>