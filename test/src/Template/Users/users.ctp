
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('login-newcustomer.css') ?>
  <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> -->
</head>

<body class="substance">

<header class="head">
	<div class="heading">
		<h1 class="topmenu">新規登録</h1>
  </div>
</header>
  

  <div class="form-wrap">

  <p>
    <?php
    //フォームの作成
    echo $this->Form->create(
      "null", [ "type" => "post",
      "url" => [ "controller" => "Users",
      "action"=> "add" ] ] );

    //コントロールを配置
    echo $this->Form->control("user_name",[
      "label" => 'ユーザ名',
    ]);

    echo $this->Form->control("email",[
      "type" => "text",
      "label" => 'メール',
    ]);

    echo $this->Form->control("user_id",[
      "type" => "text",
      "label" => 'ユーザID',
    ]);

    echo $this->Form->control("password",[
      "type" => "password",
      "label" => 'パスワード',
    ]);

    echo $this->Form->submit('登録');

    //フォームの終了
    echo $this->Form->end();


    ?>
  </p>

  </div>


</body>


</html>
