<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InternshipOffers Model
 *
 * @method \App\Model\Entity\InternshipOffer get($primaryKey, $options = [])
 * @method \App\Model\Entity\InternshipOffer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InternshipOffer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InternshipOffer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InternshipOffer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InternshipOffer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InternshipOffer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InternshipOffer findOrCreate($search, callable $callback = null, $options = [])
 */
class InternshipOffersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('internship_offers');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Students', [
            'foreignKey' => 'internshipOffer_id',
            'targetForeignKey' => 'student_id',
            'joinTable' => 'internshipOffers_students'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
//         $validator
//             ->integer('id')
//             ->allowEmpty('id', 'create');
//         $validator
//             ->integer('id_official')
//             ->requirePresence('id_official', 'create')
//             ->notEmpty('id_official');

        $validator
                ->scalar('title')
                ->maxLength('title', 255)
                ->requirePresence('title', 'create')
                ->notEmpty('title');

        $validator
                ->scalar('description')
                ->requirePresence('description', 'create')
                ->notEmpty('description');

        $validator
                ->scalar('task')
                ->requirePresence('task', 'create')
                ->notEmpty('task');

        $validator
                ->boolean('remuneration')
                ->allowEmpty('remuneration');

        $validator
                ->numeric('number_of_hour')
                ->allowEmpty('number_of_hour');

        $validator
                ->scalar('category')
                ->maxLength('category', 255)
                ->allowEmpty('category');

        return $validator;
    }

}
