<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule[]|\Cake\Collection\CollectionInterface $schedules
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('操作') ?></li>
        <li><?= $this->Html->link(__('新規スケジュール'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedules index large-9 medium-8 columns content">

    <h3>スケジュール一覧</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('開始日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('終了日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('工数') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
            <tr>
                <td><?= h($schedule->schedule_id) ?></td>
                <td><?= h($schedule->estimate_start_date) ?></td>
                <td><?= h($schedule->estimate_end_date) ?></td>
                <td><?= $this->Number->format($schedule->estimate_cost) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $schedule->schedule_id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $schedule->schedule_id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $schedule->schedule_id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->schedule_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
