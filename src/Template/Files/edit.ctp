<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File $file
 */
?>
<div class="airlines form large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
    <div class="upload-frm">
        <?php echo $this->Form->create($file, ['type' => 'file']); ?>
        <fieldset>
        <legend><?= __("#2 Edit the files (Not obligatory)") ?></legend>
            <?php echo $this->Form->control('file', ['type' => 'file', 'class' => 'form-control']); ?>
            <?php echo $this->Form->button(__('Done'), ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
        <?php echo $this->Form->postButton('Delete the files', ['controller' => 'files', 'action' => 'delete', $this->request->getParam('pass.0')]); ?>
    </div>
</div>