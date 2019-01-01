
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

      <div class="form-wrap">

        <p>
          <?php
          //フォームの作成
          echo $this->Form->create(
            "null", [ "type" => "post",
            "url" => [ "controller" => "Users",
            "action"=> "login" ] ] );

          //コントロールを配置
          echo $this->Form->control("user_id",[
            "type" => "text",
            "label" => 'ユーザID',
          ]);

          echo $this->Form->control("password",[
            "type" => "text",
            "label" => 'パスワード',
          ]);

          echo $this->Form->submit('Login');

          //フォームの終了
          echo $this->Form->end();


          ?>
        </p>

      </div>
		</div>
	</div>

</body>
</html>
