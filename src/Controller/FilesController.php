<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Exception\Exception;
use Cake\ORM\TableRegistry;
use PDOException;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesController extends AppController {

	public function initialize() {
		parent::initialize ();
		// Include the FlashComponent
		$this->loadComponent ( 'Flash' );
		// Load Files model
		$this->loadModel ( 'Files' );
		// Set the layout
		// $this->layout = 'frontend';
		$this->Auth->allow ( [ 
				'index', 'delete'
		] );
	}

	public function index($id_student = null) {
		$uploadData = '';
		$maxSize = 5000000;
		if ($this->request->is ( 'post' )) {
			if (! empty ( $this->request->data ['file'] ['name'] )) {
				$fileName = $this->request->data ['file'] ['name'];
				$uploadPath = 'uploads/files/';
				$uploadFile = $uploadPath . $fileName;
				$fileType = $this->request->data ['file'] ['type'];
				echo $fileType;
				if (strpos ( $fileType, 'word' ) !== false || strpos ( $fileType, 'pdf' ) !== false ) {
					$fileSize = $this->request->data ['file'] ['size'];
					if ($fileSize <= $maxSize) {
						if (move_uploaded_file ( $this->request->data ['file'] ['tmp_name'], $uploadFile )) {
							$uploadData = $this->Files->newEntity ();
							$uploadData->id_student = $id_student;
							$uploadData->name = $fileName;
							$uploadData->path = $uploadPath;
							$uploadData->created = date ( "Y-m-d H:i:s" );
							$uploadData->modified = date ( "Y-m-d H:i:s" );
							if ($this->Files->save ( $uploadData )) {
								$this->Flash->success ( __ ( 'File has been uploaded and inserted successfully.' ) );
								return $this->redirect ( [ 
										'controller' => 'Files','action' => 'index',$id_student
								] );
							} else {
								$this->Flash->error ( __ ( 'Unable to upload file, please try again.' ) );
							}
						} else {
							$this->Flash->error ( __ ( 'Unable to upload file, please try again.' ) );
						}
					} else {
						$this->Flash->error ( __ ( 'Unable to upload file, please use file smaller then 5mb' ) );
					}
				} else {
					$this->Flash->error ( __ ( 'Unable to upload file, please use doc, docx or pdf file.' ) );
				}
			} else {
				$this->Flash->error ( __ ( "Unable to upload file, make sure it's smaller than 5mb and a doc, docx or pdf file." ) );
			}
		}

		$this->set ( 'uploadData', $uploadData );

		$files = $this->Files->find ( 'all', [ 
				'order' => [ 
						'Files.created' => 'DESC'
				]
		] );
		$filesRowNum = $files->count ();
		$this->set ( 'files', $files );
		$this->set ( 'filesRowNum', $filesRowNum );
	}
	
	
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$file = $this->Files->get($id);
		if ($this->Files->delete($file)) {
			$this->Flash->success(__('The file has been deleted.'));
		} else {
			$this->Flash->error(__('The file could not be deleted. Please, try again.'));
		}
		
		return $this->redirect(['action' => 'index']);
	}
}