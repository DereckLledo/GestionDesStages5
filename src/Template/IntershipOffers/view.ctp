<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IntershipOffer $intershipOffer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Intership Offer'), ['action' => 'edit', $intershipOffer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Intership Offer'), ['action' => 'delete', $intershipOffer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intershipOffer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Intership Offers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Intership Offer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="intershipOffers view large-9 medium-8 columns content">
    <h3><?= h($intershipOffer->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($intershipOffer->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($intershipOffer->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($intershipOffer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Official') ?></th>
            <td><?= $this->Number->format($intershipOffer->id_official) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Hour') ?></th>
            <td><?= $this->Number->format($intershipOffer->number_of_hour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remuneration') ?></th>
            <td><?= $intershipOffer->remuneration ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($intershipOffer->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Task') ?></h4>
        <?= $this->Text->autoParagraph(h($intershipOffer->task)); ?>
    </div>
</div>
