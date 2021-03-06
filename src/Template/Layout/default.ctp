<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
    <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
        </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    </head>
    <body>
        <nav class="top-bar expanded" data-topbar role="navigation">
            <ul class="title-area large-3 medium-4 columns">
                <li class="name">
                    <h1><a href=""><?= $this->fetch('title') ?></a></h1>
                </li>
            </ul>
            <div class="top-bar-section">
                <ul class="right">
                    <li> <?php
                    
                        echo $this->Html->link( 'Accueil  ' , ['controller'=>'InternshipOffers', 'action'=>'index'] );
                        echo "</li><li>";
				$loguser = $this->request->getSession()->read( 'Auth.User' );
				if ( $loguser ) {
					$TexteUser = $loguser['username'];
					$rank = "";
					$texteAdd= "";
                                        $type = "";
                                        
					if ($loguser['type'] == 0) {
                                                echo $this->Html->link( 'My applications  ' , ['controller'=>'Students', 'action'=>'findApplications'] );
                                                echo "</li><li>";
						$rank = __('Student - ');
                                                $type = "Students";
                                                
					} else if ($loguser['type'] == 1){
						$rank = __('Coordinator - ');
						$texteAdd = "Add a User";
                                                $type = "Coordinators";
                                                
					} else {
						$rank = __('Official - ');
                                                $type = "Officials";
					}
					echo $this->Html->link( $rank . $TexteUser . ' Logout', ['controller'=>'Users', 'action'=>'logout'] );
					echo "</li><li>";
					echo $this->Html->link( $texteAdd , ['controller'=>'Users', 'action'=>'add'] );
                                        echo "</li><li>";
                                        echo $this->Html->link( 'Modifier mon compte' , ['controller'=>$type, 'action'=>'modifier'] );
                                        if ($loguser['type'] == 0) {
                                        	echo "</li><li>";
                                        	echo $this->Html->link( 'Mes fichier' , ['controller'=>'Students', 'action'=>'fichier'] );
                                        }
                                        

                                        
                                        
				} else {
					echo $this->Html->link( __('Login'), ['controller'=>'Users', 'action'=>'login'] );
					echo "</li><li>";
					echo $this->Html->link( __('Register'), ['controller'=>'Users', 'action'=>'add'] );
					
					
				}
			?></li>

                </ul>

                  <?php  if ($loguser['type'] == 1){
                        echo "<ul class='left'>";
                                 echo "<li>";
                                 echo $this->Html->link('Tous les stages', ['controller'=>'InternshipOffers', 'action'=>'allOffers'] );
                                 echo "</li><li>";
                                 echo $this->Html->link('Stages actifs', ['controller'=>'InternshipOffers', 'action'=>'index'] );
                                 echo "</li><li>";
                                 echo $this->Html->link('Stages inactifs', ['controller'=>'InternshipOffers', 'action'=>'inactif'] );
                                 echo "</li><li>";
                                 echo $this->Html->link('Étudiants sans stage', ['controller'=>'Students', 'action'=>'noInternship'] );
                                 echo "</li><li>";
                                 echo $this->Html->link('Étudiants avec stage', ['controller'=>'Students', 'action'=>'withInternship'] );
                                 echo "</li>";
                                 
                        echo "</ul>";
                      
                            $rank = __('Coordinator - ');
                            $texteAdd = "Add a User";
                            $type = "Coordinators";
                  } else if (!$loguser){
                        echo "<ul class='left'>";
                                echo "<li>";
                                echo $this->Html->link('Récupérer mot de passe', ['controller'=>'Users', 'action'=>'recover'] );
                                echo "</li>";
                        echo "</ul>";
                                 
                  }
                  ?>

            </div>
        </nav>

    <?= $this->Flash->render() ?>
        <div class="container clearfix">
        <?= $this->fetch('content') ?>
        </div>
        <footer>
        </footer>
    </body>
</html>
