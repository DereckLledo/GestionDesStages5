<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipPlacesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternshipPlacesTable Test Case
 */
class InternshipPlacesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipPlacesTable
     */
    public $InternshipPlaces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.internship_places'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InternshipPlaces') ? [] : ['className' => InternshipPlacesTable::class];
        $this->InternshipPlaces = TableRegistry::getTableLocator()->get('InternshipPlaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InternshipPlaces);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
