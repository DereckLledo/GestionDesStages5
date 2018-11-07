<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentsTable Test Case
 */
class StudentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentsTable
     */
    public $Students;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.students'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Students') ? [] : ['className' => StudentsTable::class];
        $this->Students = TableRegistry::getTableLocator()->get('Students', $config);
    }
    
    
    //trouver les eleves actifes
    public function testFindActif() {
    	$query = $this->Students->find()->where(['actif' => true]);
    	$this->assertInstanceOf('Cake\ORM\Query', $query);
    	$result = $query->hydrate(false)->toArray();
    	$expected = [
    			[
    					'id' => 3,
    					'id_user' => 3,
    					'admission_number' => 24,
    					'first_name' => 'Dereck',
    					'last_name' => 'lledo',
    					'phone' => 'Lorem ipsum dolor sit amet',
    					'email' => 'derecklledo@gmail.com',
    					'other_detail' => 'Loree ut  duis vestibulum nunc mattis convallis.',
    					'note' => 'Lorem ipsum dolor sit amet',
    					'actif' => true
    			],
    			
    	];
    	
    	$this->assertEquals($expected, $result);
    }
    
    
    //trouver un eleve selon son email
    public function testFindEmail() {
    	$query = $this->Students->find()->where(['email' => 'derecklledo@gmail.com']);
    	$this->assertInstanceOf('Cake\ORM\Query', $query);
    	$result = $query->hydrate(false)->toArray();
    	$expected = [
    			[
    					'id' => 3,
    					'id_user' => 3,
    					'admission_number' => 24,
    					'first_name' => 'Dereck',
    					'last_name' => 'lledo',
    					'phone' => 'Lorem ipsum dolor sit amet',
    					'email' => 'derecklledo@gmail.com',
    					'other_detail' => 'Loree ut  duis vestibulum nunc mattis convallis.',
    					'note' => 'Lorem ipsum dolor sit amet',
    					'actif' => true
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
        unset($this->Students);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
