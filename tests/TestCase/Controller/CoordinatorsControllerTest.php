<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CoordinatorsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CoordinatorsController Test Case
 */
class CoordinatorsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coordinators',
		'app.users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
    	//verifier la redirection si on est pas authoriser
    	$this->get ( '/coordinators' );
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
//         $this->markTestIncomplete('Not implemented yet.');
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
