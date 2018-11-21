<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IntershipOffersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IntershipOffersTable Test Case
 */
class IntershipOffersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IntershipOffersTable
     */
    public $IntershipOffers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.intership_offers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('IntershipOffers') ? [] : ['className' => IntershipOffersTable::class];
        $this->IntershipOffers = TableRegistry::getTableLocator()->get('IntershipOffers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IntershipOffers);

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
