<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipOffer $internshipOffer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Internship Offers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="internshipOffers form large-9 medium-8 columns content">
    <?= $this->Form->create($internshipOffer) ?>
    <fieldset>
        <legend><?= __('Add Internship Offer') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('task');
            echo $this->Form->control('remuneration');
            echo $this->Form->control('number_of_hour');
            echo $this->Form->control('category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
