<style>
  #main {
    width: 100%;
    border: 1px solid #000;
  }
  #main div {
    width: 80%;
    margin: 0 auto;
  }
  .btn {
      margin: 0 10px;
  }
</style>
<h1>
  タスク一覧
</h1>
<div class="form_wrap">
    <div>
        <?php
        echo $this->Html->link('新規登録', [
            'controller' => 'tasks',
            'action' => 'input',
        ]);
        ?>
    </div>

    <?php
    foreach($tasks_data as $data) {
    ?>
    <div>
        <?php
        echo $data->task_name;
        $edit_url = [
            'controller' => 'tasks',
            'action' => 'edit',
            $data->id,
        ];
        $edit_class = [
            'class' => 'btn btn-primary',
            'role' => 'button',
        ];
        echo $this->Html->link('編集', $edit_url, $edit_class);

        $delete_url = [
            'controller' => 'tasks',
            'action' => 'delete',
            $data->id,
        ];
        $delete_class = [
            'class' => 'btn btn-primary',
            'role' => 'button',
        ];
        echo $this->Html->link('削除', $delete_url, $delete_class);
        ?>
    </div>
    <?php
    }
    ?>
</div>
