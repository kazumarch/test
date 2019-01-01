<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\BelongsTo $Tasks
 *
 * @method \App\Model\Entity\Schedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Schedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Schedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Schedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule findOrCreate($search, callable $callback = null, $options = [])
 */
class SchedulesTable extends Table
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

        $this->setTable('schedules');
        $this->setDisplayField('schedule_id');
        $this->setPrimaryKey('schedule_id');

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
            ->scalar('schedule_id')
            ->maxLength('schedule_id', 6)
            ->allowEmpty('schedule_id', 'create');

        $validator
            ->scalar('schedule_name')
            ->allowEmpty('schedule_name')
            ->notEmpty('schedule_name');

        $validator
            ->date('estimate_start_date')
            ->requirePresence('estimate_start_date', 'create')
            ->notEmpty('estimate_start_date');

        $validator
            ->date('estimate_end_date')
            ->requirePresence('estimate_end_date', 'create')
            ->notEmpty('estimate_end_date');

        // $validator
        //     ->numeric('estimate_cost')
        //     ->requirePresence('estimate_cost', 'create')
        //     ->notEmpty('estimate_cost');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['task_id'], 'Tasks'));
    //
    //     return $rules;
    // }
}
