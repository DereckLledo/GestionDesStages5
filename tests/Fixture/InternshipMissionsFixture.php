<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InternshipMissionsFixture
 *
 */
class InternshipMissionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_internship_place' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cdj' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Centre de jour', 'precision' => null],
        'hopital' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Hôpital de jour', 'precision' => null],
        'centre_jour' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Possibilité de Centre de jour', 'precision' => null],
        'recherche' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Recherche clinique', 'precision' => null],
        'renforcement_travail' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Renforcement au travail', 'precision' => null],
        'reeducation_travail' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Rééducation au travail', 'precision' => null],
        'soins_externe' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Soins clientèle externe', 'precision' => null],
        'soins_hospitalise' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Soins clientèle hospitalisée', 'precision' => null],
        'soins_hebergee' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Soins clientèle hébergée', 'precision' => null],
        'soins_interne' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Soins clientèle interne', 'precision' => null],
        'soins_domicile' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Soins clientèle à domicile', 'precision' => null],
        'soins_convalescence' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Soins de clientèle en convalescence', 'precision' => null],
        'UTRF' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'UTRF', 'precision' => null],
        '_indexes' => [
            'id_internship_place_key' => ['type' => 'index', 'columns' => ['id_internship_place'], 'length' => []],
            'id_internship_mission_key' => ['type' => 'index', 'columns' => ['id_internship_place'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id_internship_mission_key' => ['type' => 'foreign', 'columns' => ['id_internship_place'], 'references' => ['internship_places', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
                'centre_jour' => 1,
                'recherche' => 1,
                'renforcement_travail' => 1,
                'reeducation_travail' => 1,
                'soins_externe' => 1,
                'soins_hospitalise' => 1,
                'soins_hebergee' => 1,
                'soins_interne' => 1,
                'soins_domicile' => 1,
                'soins_convalescence' => 1,
                'UTRF' => 1
            ],
        ];
        parent::init();
    }
}
