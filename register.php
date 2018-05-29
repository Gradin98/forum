<?php
    require 'src/Register.php';

    Register::checkRegister();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Platforma Forum</title>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		
  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
	<link rel="stylesheet" href="lib/css/custom.css">
	
</head>
<body>

<div class="container header-height">
</div>
<div class="container">
	<center><p class="login-form-information font-size-20">Utilizator existent? Logheaza-te!</p></center>

	<div class="row justify-content-md-center">
		
		<div class="col-xl-5 col-lg-7 col-md-10 col-sm-12 post-container post-border-container margin-bottom-200">
			<div class=" margin-top-20">
                <?php
                    Register::registerForm()
                ?>

			</div>
		</div>
	</div>
</div>
</body>
</html>
