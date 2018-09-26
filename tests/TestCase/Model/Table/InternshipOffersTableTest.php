<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipOffersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternshipOffersTable Test Case
 */
class InternshipOffersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipOffersTable
     */
    public $InternshipOffers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.internship_offers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InternshipOffers') ? [] : ['className' => InternshipOffersTable::class];
        $this->InternshipOffers = TableRegistry::getTableLocator()->get('InternshipOffers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InternshipOffers);

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
