<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomerTypesFixture
 *
 */
class CustomerTypesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_internship_place' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cdj' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Centre de jour', 'precision' => null],
        'hopital' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Hopital de jour', 'precision' => null],
        'client_hebergee' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Clientele hebergee', 'precision' => null],
        'client_externe' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Clientele a domicile', 'precision' => null],
        'perte_autonomie' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'perte autonomie', 'precision' => null],
        'neuro' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Neurologie', 'precision' => null],
        'ortho_rhumato' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'orthopedie/rhumatologie', 'precision' => null],
        'cardio' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'soins cardiorespiratoire', 'precision' => null],
        'palliatif' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'soins palliatif', 'precision' => null],
        'convalescence' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'soins en convalescence', 'precision' => null],
        'utrf' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'UTRF', 'precision' => null],
        'recherche' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Recherche clinique', 'precision' => null],
        'reeducation' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Reeducation', 'precision' => null],
        'renforcement' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Renforcement au travail', 'precision' => null],
        '_indexes' => [
            'id_internship_place_key' => ['type' => 'index', 'columns' => ['id_internship_place'], 'length' => []],
        ],
        '_constraints' => [
            'id_internship_place_key' => ['type' => 'foreign', 'columns' => ['id_internship_place'], 'references' => ['internship_places', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'id_internship_place' => 1,
                'cdj' => 1,
                'hopital' => 1,
                'client_hebergee' => 1,
                'client_externe' => 1,
                'perte_autonomie' => 1,
                'neuro' => 1,
                'ortho_rhumato' => 1,
                'cardio' => 1,
                'palliatif' => 1,
                'convalescence' => 1,
                'utrf' => 1,
                'recherche' => 1,
                'reeducation' => 1,
                'renforcement' => 1
            ],
        ];
        parent::init();
    }
}
