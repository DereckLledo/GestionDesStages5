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
        'app.internship_offers','app.users', 'app.officials'
    		
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
    
    
    //trouver les stages qui offrent une remuneration
    public function testFindRemuneration() {
    	$query = $this->InternshipOffers->find()->where(['remuneration' => true]);
    	$this->assertInstanceOf('Cake\ORM\Query', $query);
    	$result = $query->hydrate(false)->toArray();
    	$expected = [
    			[
    					'id' => 1,
    					'id_official' => 1,
    					'title' => 'Soutien informatique',
    					'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
    					'task' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
    					'remuneration' => true,
    					'number_of_hour' => 1,
    					'category' => 'Lorem ipsum dolor sit amet'
    			],
    			[
    					'id' => 2,
    					'id_official' => 1,
    					'title' => '2Lorem ipsum dolor sit amet',
    					'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
    					'task' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
    					'remuneration' => true,
    					'number_of_hour' => 1,
    					'category' => 'Lorem ipsum dolor sit amet'
    			],
    			
    	];
    	
    	$this->assertEquals($expected, $result);
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
