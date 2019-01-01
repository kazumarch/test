<style>
  #main {
    width: 100%;
    border: 1px solid #000;
  }
  #main div {
    width: 80%;
    margin: 0 auto;
  }
</style>
<h1>
  タスク登録
</h1>
<div class="form_wrap">

  <?php
  // フォーム開始
  echo $this->Form->create("null", [
    'type' => 'post',
    'url' => ['controller' => 'Tasks', 'action' => 'add'],
    'id' => 'main'
  ]);

  // ユーザー選択
  $user_list = array();
  foreach($users_data as $row) {
      $data = [
          'text' => $row->user_name,
          'value' => $row->user_id,
      ];
      $user_list[] = $data;
  }
  echo $this->Form->control('user_id', [
    'type' => 'select',
    'label' => 'ユーザー選択',
    'required' => true,
    'options' => $user_list,
    'multiple' => false,
    'empty' => '選択してください',
  ]);

  // スケジュール選択
  $schedule_list = array();
  foreach($schedules_data as $row) {
      $data = [
          'text' => $row->schedule_name,
          'value' => $row->schedule_id,
      ];
      $schedule_list[] = $data;
  }
  echo $this->Form->control('schedule_id', [
    'type' => 'select',
    'label' => 'スケジュール選択',
    'required' => true,
    'options' => $schedule_list,
    'multiple' => false,
    'empty' => '選択してください',
  ]);

  // タスク名入力
  echo $this->Form->control('task_name', [
    'label' => 'タスク名',
    'required' => true
  ]);

  // 見積_開始日入力
  echo $this->Form->control('estimate_start_date', [
    'label' => '開始日(見積)',
    'type' => 'date',
    'required' => true,
    'monthNames' => false,
  ]);

  // 見積_終了日入力
  echo $this->Form->control('estimate_end_date', [
      'label' => '終了日(見積)',
      'type' => 'date',
      'required' => true,
      'monthNames' => false,
  ]);

  echo $this->Form->control('status', [
      'label' => 'ステータス',
      //'default' =>
  ]);

  echo $this->Form->control('c_node_id', [
      'type' => 'text',
      'label' => 'ノード',
      //'default' =>
  ]);

  echo $this->Form->control('c_flag', [
    'label' => 'フラグ',
    //'default' =>
  ]);

  echo $this->Form->submit('登録');

  echo $this->Form->end();

  ?>
</div>
