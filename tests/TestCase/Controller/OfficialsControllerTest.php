<?php
namespace App\Test\TestCase\Controller;

use App\Controller\OfficialsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;


/**
 * App\Controller\OfficialsController Test Case
 */
class OfficialsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.officials'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
       // verifier la redirection vers le login
        $this->get ( '/officials' );
        $this->assertRedirectContains('/users/login');
    
    }

//     /**
//      * Test view method
//      *
//      * @return void
//      */
//     public function testView()
//     {
//         $this->markTestIncomplete('Not implemented yet.');
//     }

//     /**
//      * Test add method
//      *
//      * @return void
//      */
//     public function testAdd()
//     {
    	
//     	$this->session([
//     			'Auth' => [
//     					'User' => [
//     							'id' => 1,
//     							'username' => 'testing',
//     							'type' => '1',
//     					]
//     			]
//     	]);
    	
//     	$data = [
//     			'id_user' => 1,
//     			'first_name' => 'Test12323',
//     			'last_name' => 'test',
//     			'email' => 'derecklledo@gmail.com',
//     			'created' => '2018-11-06 22:49:56',
//     			'modified' => '2018-11-06 22:49:56',
//     			'verifier' => 1
//     	];
    	
//     	$this->post('/officials/add/', $data);
    	
//     	$officials = TableRegistry::get('Officials');
//     	$query = $officials->find()->where(['first_name' => $data['first_name']]);
//     	$this->assertEquals(1, $query->count());
//     }

//     /**
//      * Test edit method
//      *
//      * @return void
//      */
//     public function testEdit()
//     {
//         $this->markTestIncomplete('Not implemented yet.');
//     }

//     /**
//      * Test delete method
//      *
//      * @return void
//      */
//     public function testDelete()
//     {
//         $this->markTestIncomplete('Not implemented yet.');
//     }
}
