<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InternshipMissions Model
 *
 * @method \App\Model\Entity\InternshipMission get($primaryKey, $options = [])
 * @method \App\Model\Entity\InternshipMission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InternshipMission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InternshipMission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InternshipMission|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InternshipMission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InternshipMission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InternshipMission findOrCreate($search, callable $callback = null, $options = [])
 */
class InternshipMissionsTable extends Table
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

        $this->setTable('internship_missions');
        $this->setDisplayField('id');
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
//         $validator
//             ->integer('id')
//             ->allowEmpty('id', 'create');

//         $validator
//             ->integer('id_internship_place')
//             ->allowEmpty('id_internship_place');

        $validator
            ->allowEmpty('cdj');

        $validator
            ->allowEmpty('hopital');

        $validator
            ->allowEmpty('centre_jour');

        $validator
            ->allowEmpty('recherche');

        $validator
            ->allowEmpty('renforcement_travail');

        $validator
            ->allowEmpty('reeducation_travail');

        $validator
            ->allowEmpty('soins_externe');

        $validator
            ->allowEmpty('soins_hospitalise');

        $validator
            ->allowEmpty('soins_hebergee');

        $validator
            ->allowEmpty('soins_interne');

        $validator
            ->allowEmpty('soins_domicile');

        $validator
            ->allowEmpty('soins_convalescence');

        $validator
            ->allowEmpty('UTRF');

        return $validator;
    }
}
