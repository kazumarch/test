<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * User Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TaskTable|\Cake\ORM\Association\HasMany $Task
 * @property \App\Model\Table\UserTable|\Cake\ORM\Association\HasMany $User
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('users', [
            'foreignKey' => 'user_id'
        ]);
        // $this->hasMany('task', [
        //     'foreignKey' => 'user_id'
        // ]);
        $this->hasMany('users', [
            'foreignKey' => 'user_id'
        ]);
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('user_id')
            ->allowEmpty('user_id', 'create');

        $validator
            ->scalar('user_name')
            ->allowEmpty('user_name');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->dateTime('create_date')
            ->allowEmpty('create_date');

        $validator
            ->dateTime('up_date')
            ->allowEmpty('up_date');

        $validator
            ->scalar('password')
            ->allowEmpty('password');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['user_name']));
        $rules->add($rules->isUnique(['email']));
        //$rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
