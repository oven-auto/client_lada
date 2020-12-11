<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style>
		@font-face {
			font-family: "Lada";
			src: url("Lada.otf") format("opentype");
		}
		.footer{
			position: fixed;bottom: 0px;left: 0px;
		}
		.footer img{
			width: 100%;
		}
		h1{
			font-family: "Lada";
			font-size: 3rem;
			color: rgb(115,120,125);
		}
	</style>
	<meta http-equiv="refresh" content="30">
</head>
<body>
	<div class="container-fluid">
		<div class="row d-flex align-items-center">
			<div class="col-7">
				<img src="back/vesta.png" id="car">
			</div>

			<div class="col-5">
				<h1>Уважаемый</h1>
				<h1>Виктор Борисович</h1>
				<h1>Поздравляем с Вашей новой</h1>
				<h1>{{$issue->car->name}}!!!</h1>
			</div>
		</div>	
	</div>

	<div class="footer">
		<img src="bottom.png">
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script>
		var footerHeight = $('.footer').height()
		var screenHeight = $(window).height()
		var carHeight = screenHeight - footerHeight - 50
		$('#car').css({'height':carHeight+'px'})
	</script>
</body>
</html>