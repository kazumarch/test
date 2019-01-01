<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->schedule_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->schedule_id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->schedule_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->schedule_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Schedule Id') ?></th>
            <td><?= h($schedule->schedule_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Task') ?></th>
            <td><?= $schedule->has('task') ? $this->Html->link($schedule->task->task_id, ['controller' => 'Tasks', 'action' => 'view', $schedule->task->task_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estimate Cost') ?></th>
            <td><?= $this->Number->format($schedule->estimate_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estimate Start Date') ?></th>
            <td><?= h($schedule->estimate_start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estimate End Date') ?></th>
            <td><?= h($schedule->estimate_end_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Schedule Name') ?></h4>
        <?= $this->Text->autoParagraph(h($schedule->schedule_name)); ?>
    </div>
</div>
