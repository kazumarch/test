
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainMenu</title>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
  <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> -->
</head>

<body class="home">

  <div class="top">
		<div class="heading">
			<h1>MainMenu</h1>

      <div class="form-wrap">

        <p>
          <?php
          //フォームの作成
          echo $this->Form->create(
            "null", [ "type" => "post",
            "url" => [ "controller" => "Users",
            "action"=> "loginStart" ] ] );

          echo $this->Form->submit('ログインはこちら');

          //フォームの終了
          echo $this->Form->end();


          echo $this->Form->create(
            "null", [ "type" => "post",
            "url" => [ "controller" => "Users",
            "action"=> "index" ] ] );

          echo $this->Form->submit('新規登録はこちら');

          //フォームの終了
          echo $this->Form->end();

          ?>
        </p>

      </div>
		</div>
	</div>

</body>
</html>
