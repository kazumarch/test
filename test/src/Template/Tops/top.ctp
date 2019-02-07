
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メインメニュー</title>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('menu.css') ?>
  <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> -->
</head>


<body class="substance">
	<header class="head">
		<div class="heading">
			<h1 class="topmenu">メインメニュー</h1>
		</div>
		<div class="form-wrap">
			<ul>
				<li>
			      	<?php
			          //フォームの作成
			          echo $this->Form->create(
			            "null", [ "type" => "post",
			            "class" => "login",
			            "url" => [ "controller" => "Users",
			            "action"=> "loginStart" ] ] );

			          echo $this->Form->submit('ログイン');

			          //フォームの終了
			          echo $this->Form->end();
			          ?>
		         </li>
	         </ul>
	         <ul>
		         <li>
			     	<?php
			          echo $this->Form->create(
			            "null", [ "type" => "post",
			            "class" => "newcustomer",
			            "url" => [ "controller" => "Users",
			            "action"=> "index" ] ] );

			          echo $this->Form->submit('新規登録');

			          //フォームの終了
			          echo $this->Form->end();

			          ?>
				</li>
			</ul>
		</div>
	</header>



		
	
</body>
</html>
