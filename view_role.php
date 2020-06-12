<?php require 'Model/db.php' ?> 

<?php
	if (empty($_SESSION['logged_user'])) {
		header('Location: /index.php');
	}
	$role = R::findOne('roles', 'id = ?', [$_GET['id_role']])
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/page.css" />
		<link rel="stylesheet" href="../assets/css/new_items.css" />
		<link rel="stylesheet" href="../assets/jquery-ui-1.12.1.custom/jquery-ui.css" />
        <link rel="stylesheet" href="../assets/jquery-ui-1.12.1.custom/jquery-ui.structure.css" />
				<link rel="stylesheet" href="../assets/jquery-ui-1.12.1.custom/jquery-ui.theme.css" />
				<link rel="stylesheet" href="../assets/css/help.css" />
	</head>
	<body class="is-preload">
	<div id="mainbox" onclick="openFunction()" >&#9776; Menu</div>

	<!--form for img-upload-->
	<form id="fimg" method="post">
		<label >image URL:</label>
		<input type="url" id="imgURL"/>
		<button id="imgAdd">add</button>
	</form>
	
	<!--input video by link-->
	<form id="video_form">
	<button id="vid_btn" onclick="create_video()"> add</button>
	<input type="url" id="vidoURL" />

		<iframe id="ifr" width="420" height="345" >
		</iframe>
    </form>
    
        <script type="text/javascript">
            var id_role = <?php echo $role->id ?>;
        </script>

		<!-- Header -->
			<div id="header">
					<!-- Nav -->
						<nav id="nav">
							<ul>
                                <li><a id="arrow-link" href="/quest_info.php?id_quest=<?php echo $role->id_quest ?>"><span class="icon solid fa-arrow-left">Вернуться</span></a></li>

								<a href="#" class="closebtn" onclick="closeFunction()">&times</a>
							</ul>
						</nav>

						<!-- <button class="newpage" id="newPage"> Перейти к ролям </button> -->
						<button class="save" onclick="window.location.href='/edit_role.php?id_role='+id_role"> Изменить </button>
            </div>
            
            <!-- placeholder -->
            <div id="place">
                <?php echo $role->page ?>
            </div>

            <script type="text/javascript">
				function openFunction(){
					document.getElementById("header").style.width="375px";
				}
	
				function closeFunction(){
					document.getElementById("header").style.width="0px";
				}
			</script>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
			<script src="../assets/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

	</body>
</html>