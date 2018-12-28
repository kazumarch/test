
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
  <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> -->
</head>

<body class="home">

  <div class="login">
		<div class="heading">
			<h1>Login</h1>
			<form action="post">

	      <div class="input-group">
	        <span class="input-group-addon"><i class="fa fa-user"></i></span>
	        <input type="text" class="form-control" placeholder="User ID">
	      </div>

				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" class="form-control" placeholder="Password">
				</div>

				<div class="button">
					<button type="button" class="float">Login</button>
				</div>

			</form>
		</div>
	</div>

</body>
</html>
