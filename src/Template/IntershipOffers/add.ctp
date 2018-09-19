<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IntershipOffer $intershipOffer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Intership Offers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="intershipOffers form large-9 medium-8 columns content">
    <?= $this->Form->create($intershipOffer) ?>
    <fieldset>
        <legend><?= __('Add Intership Offer') ?></legend>
        <?php
            echo $this->Form->control('id_official');
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
