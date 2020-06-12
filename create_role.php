<!DOCTYPE html>
<html lang="en">
  <head>
		<title>Background</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../assets/css/start-page.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
		<style>
			.main {
				padding-bottom: 0px;
			}
			#title {
				padding-bottom: 10px;
			}
			button {
				margin-top: 2%;
				font-size: 20px;
			}
			h1 {
				margin-bottom: 10px;
			}
			.container {
				margin-top: 3%;
			}
		</style>	
	</head>
	<body>
    
    <!--project start-->    
    <form id="project" action="/Controller/create_role.php?id_quest=<?php echo $_GET['id_quest'] ?>" method="POST"> 
		<div class='main' id="title" align="center">
			<h1>Назовите роль</h1>
			<input type="text" name="role_name" id="name" placeholder="Name" />
		</div>  
		
		<div id="title" align="center">
			<h1>Выберите цветовое оформление</h1>
		</div>
    
       <div class="container">
		
		<div class="row">
			<div class="portfolio_block columns3 pretty" data-animated="fadeIn">	
					<div class="element col-sm-4   gall branding">
						<a class="plS">
                            <img class="img-responsive picsGall" src="../images/bgprev1.jpg" width="356" height="276" />
                        </a>
                        <input type="radio" name="bg" value="bgprev1.jpg">
					</div>
					<div class="element col-sm-4  gall branding">
						<a class="plS">
							<img class="img-responsive picsGall" src="../images/bgprev2.jpg" width="356" height="276"/>
                        </a>
                        <input type="radio" name="bg" value="bgprev2.jpg">
					</div>
					<div class="element col-sm-4  gall web">
						<a class="plS">
							<img class="img-responsive picsGall" src="../images/bgprev3.jpg" width="356" height="276"/>
                        </a>
                        <input type="radio" name="bg" value="bgprev3.jpg">
					</div>		
				</div>
			</div>
			
		</div>

		<div id="title" align="center">
			<button type="submit" align="center">Создать</button>
		</div>
    </form>    
    
	<script src="/assets/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/jquery.slicknav.js"></script>


	</body>
	
</html>