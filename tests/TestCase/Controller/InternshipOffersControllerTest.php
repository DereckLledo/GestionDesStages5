<?php

namespace App\Test\TestCase\Controller;

use App\Controller\InternshipOffersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\InternshipOffersController Test Case
 */
class InternshipOffersControllerTest extends IntegrationTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = [ 
			'app.internship_offers'
	];

	/**
	 * Test index method
	 *
	 * @return void
	 */
	public function testIndex() {
		// verifier si l'access est authoriser
		$this->get ( '/internship-offers' );
		$this->assertResponseOk ();

		// verifie si il y a 'soutien informatique' dans la page
		$this->assertResponseContains ( 'Soutien informatique' );
		
		$this->assertTemplate('index');
	}

// 	/**
// 	 * Test view method
// 	 *
// 	 * @return void
// 	 */
// 	public function testView() {
		
// 		$this->session ( [ 
// 				'Auth' => [ 
// 						'User' => [ 
// 								'id' => 1,
// 								'username' => 'Testing',
// 								'password' => '123',
// 								'type' => '1'
// 						]
// 				]
// 		] );

// 		$this->get ( '/users/view/2' );
// 		$this->assertResponseOk();
// 	}

	// /**
	// * Test add method
	// *
	// * @return void
	// */
	// public function testAdd()
	// {
	// $this->markTestIncomplete('Not implemented yet.');
	// }

	// /**
	// * Test edit method
	// *
	// * @return void
	// */
	// public function testEdit()
	// {
	// $this->markTestIncomplete('Not implemented yet.');
	// }

	// /**
	// * Test delete method
	// *
	// * @return void
	// */
	// public function testDelete()
	// {
	// $this->markTestIncomplete('Not implemented yet.');
	// }
}
