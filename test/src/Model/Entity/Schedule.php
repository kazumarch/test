<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity
 *
 * @property string $schedule_id
 * @property string $task_id
 * @property string $schedule_name
 * @property \Cake\I18n\FrozenDate $estimate_start_date
 * @property \Cake\I18n\FrozenDate $estimate_end_date
 * @property float $estimate_cost
 *
 * @property \App\Model\Entity\Task $task
 */
class Schedule extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'schedule_name' => true,
        'estimate_start_date' => true,
        'estimate_end_date' => true
        // ,
        // 'estimate_cost' => true
        // ,
        // 'task' => true
    ];
}
