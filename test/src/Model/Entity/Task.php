<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $task_id
 * @property string $user_id
 * @property string $task
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property float $dev_cost
 * @property string $status
 * @property string $c_node_id
 * @property string $c_flag
 *
 * @property \App\Model\Entity\Task[] $tasks
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\CNode $c_node
 */
class Task extends Entity
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
        'user_id' => true,
        'schedule_id' => true,
        'task_name' => true,
        'start_date' => true,
        'end_date' => true,
        'dev_cost' => true,
        'status' => true,
        'c_node_id' => true,
        'c_flag' => true,
    ];
}
