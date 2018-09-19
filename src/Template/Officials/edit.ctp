<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Official $official
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $official->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $official->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Officials'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="officials form large-9 medium-8 columns content">
    <?= $this->Form->create($official) ?>
    <fieldset>
        <legend><?= __('Edit Official') ?></legend>
        <?php
            echo $this->Form->control('id_internship_place');
            echo $this->Form->control('appellation');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('title');
            echo $this->Form->control('place');
            echo $this->Form->control('address');
            echo $this->Form->control('city');
            echo $this->Form->control('province');
            echo $this->Form->control('postal_code');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('extension');
            echo $this->Form->control('cell_phone');
            echo $this->Form->control('fax');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
