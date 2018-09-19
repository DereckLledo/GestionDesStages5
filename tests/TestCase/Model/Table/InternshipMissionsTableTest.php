<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipMissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternshipMissionsTable Test Case
 */
class InternshipMissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipMissionsTable
     */
    public $InternshipMissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.internship_missions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InternshipMissions') ? [] : ['className' => InternshipMissionsTable::class];
        $this->InternshipMissions = TableRegistry::getTableLocator()->get('InternshipMissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InternshipMissions);

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
