<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipOffer $internshipOffer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Internship Offer'), ['action' => 'edit', $internshipOffer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Internship Offer'), ['action' => 'delete', $internshipOffer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipOffer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Internship Offers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internship Offer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="internshipOffers view large-9 medium-8 columns content">
    <h3><?= h($internshipOffer->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($internshipOffer->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($internshipOffer->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Hour') ?></th>
            <td><?= $this->Number->format($internshipOffer->number_of_hour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remuneration') ?></th>
            <td><?= $internshipOffer->remuneration ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($internshipOffer->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Task') ?></h4>
        <?= $this->Text->autoParagraph(h($internshipOffer->task)); ?>
    </div>
    
        <div class="row">
        <h4><?= __('Contact') ?></h4>
        <?= $this->Html->link($official->first_name." ".$official->last_name, '/Officials/view/'.$official->id);?>
        
        
    </div>
</div>
