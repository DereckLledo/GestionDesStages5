<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerTypes Model
 *
 * @method \App\Model\Entity\CustomerType get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomerType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomerType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomerType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomerType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomerType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomerType findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerTypesTable extends Table
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

        $this->setTable('customer_types');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
//         $validator
//             ->integer('id')
//             ->requirePresence('id', 'create')
//             ->notEmpty('id');

//         $validator
//             ->integer('id_internship_place')
//             ->requirePresence('id_internship_place', 'create')
//             ->notEmpty('id_internship_place');

        $validator
            ->allowEmpty('cdj');

        $validator
            ->allowEmpty('hopital');

        $validator
            ->allowEmpty('client_hebergee');

        $validator
            ->allowEmpty('client_externe');

        $validator
            ->allowEmpty('perte_autonomie');

        $validator
            ->allowEmpty('neuro');

        $validator
            ->allowEmpty('ortho_rhumato');

        $validator
            ->allowEmpty('cardio');

        $validator
            ->allowEmpty('palliatif');

        $validator
            ->allowEmpty('convalescence');

        $validator
            ->allowEmpty('utrf');

        $validator
            ->allowEmpty('recherche');

        $validator
            ->allowEmpty('reeducation');

        $validator
            ->allowEmpty('renforcement');

        return $validator;
    }
}
