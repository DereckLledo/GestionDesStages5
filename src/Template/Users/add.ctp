<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Student $student
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add Student') ?></legend>
        <?php
        $options=array(0 => 'Student', 1=>'Coordinator', 2=>'Official');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            
           $loguser = $this->request->getSession()->read('Auth.User');
            if ($loguser['type'] == "1") {
            	
            	echo $this->Form->control('email');
            	
            	echo $this->Form->control('type', array('type'=>'select', 'options'=>$options, 'label'=>false, 'empty'=>'Category'));
            	
            }

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>