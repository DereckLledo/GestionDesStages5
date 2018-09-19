<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipPlace $internshipPlace
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $internshipPlace->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $internshipPlace->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Internship Places'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="internshipPlaces form large-9 medium-8 columns content">
    <?= $this->Form->create($internshipPlace) ?>
    <fieldset>
        <legend><?= __('Edit Internship Place') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('type');
            echo $this->Form->control('address');
            echo $this->Form->control('city');
            echo $this->Form->control('province');
            echo $this->Form->control('postal_code');
            echo $this->Form->control('administrative_region');
            echo $this->Form->control('actif');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
