<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('操作') ?></li>
        <li><?= $this->Html->link(__('スケジュール一覧'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('新規タスク'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedules form large-9 medium-8 columns content">
    <?= $this->Form->create($schedule) ?>
    <fieldset>
        <legend><?= __('Add Schedule') ?></legend>
        <?php
            echo $this->Form->control('schedule_name',[
              'label' => 'スケジュール名',
              'type' => 'text',
            ]);
            echo $this->Form->control('estimate_start_date',[
              'label' => '開発開始日',
              'type' => 'date',
              'monthNames' => false,
            ]);
            echo $this->Form->control('estimate_end_date',[
              'label' => '開発終了日',
              'type' => 'date',
              'monthNames' => false,
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('作成')) ?>
    <?= $this->Form->end() ?>
</div>
