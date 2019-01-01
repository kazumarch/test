<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id_num
 * @property string $user_id
 * @property string $username
 * @property string $email
 * @property \Cake\I18n\FrozenTime $create_date
 * @property \Cake\I18n\FrozenTime $up_date
 * @property string $password
 *
 * @property \App\Model\Entity\User[] $user
 * @property \App\Model\Entity\Task[] $task
 */
class User extends Entity
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
        'user_name' => true,
        'email' => true,
        'create_date' => true,
        'up_date' => true,
        'password' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
   {
       if (strlen($password) > 0) {
           return (new DefaultPasswordHasher)->hash($password);
       }
   }
}
