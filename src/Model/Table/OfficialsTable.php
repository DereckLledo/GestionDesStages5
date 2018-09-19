<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Officials Model
 *
 * @method \App\Model\Entity\Official get($primaryKey, $options = [])
 * @method \App\Model\Entity\Official newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Official[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Official|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Official|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Official patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Official[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Official findOrCreate($search, callable $callback = null, $options = [])
 */
class OfficialsTable extends Table
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

        $this->setTable('officials');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('id_internship_place')
            ->requirePresence('id_internship_place', 'create')
            ->notEmpty('id_internship_place');

        $validator
            ->scalar('appellation')
            ->requirePresence('appellation', 'create')
            ->notEmpty('appellation');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->scalar('title')
            ->allowEmpty('title');

        $validator
            ->scalar('place')
            ->maxLength('place', 255)
            ->allowEmpty('place');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmpty('address');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->allowEmpty('city');

        $validator
            ->scalar('province')
            ->maxLength('province', 255)
            ->allowEmpty('province');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 255)
            ->allowEmpty('postal_code');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmpty('phone');

        $validator
            ->scalar('extension')
            ->maxLength('extension', 255)
            ->allowEmpty('extension');

        $validator
            ->scalar('cell_phone')
            ->maxLength('cell_phone', 255)
            ->allowEmpty('cell_phone');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 255)
            ->allowEmpty('fax');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
