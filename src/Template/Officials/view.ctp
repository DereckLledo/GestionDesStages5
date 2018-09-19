<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Official $official
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Official'), ['action' => 'edit', $official->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Official'), ['action' => 'delete', $official->id], ['confirm' => __('Are you sure you want to delete # {0}?', $official->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Officials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Official'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="officials view large-9 medium-8 columns content">
    <h3><?= h($official->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Appellation') ?></th>
            <td><?= h($official->appellation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($official->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($official->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($official->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($official->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($official->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($official->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($official->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Code') ?></th>
            <td><?= h($official->postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($official->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($official->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extension') ?></th>
            <td><?= h($official->extension) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cell Phone') ?></th>
            <td><?= h($official->cell_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($official->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($official->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Internship Place') ?></th>
            <td><?= $this->Number->format($official->id_internship_place) ?></td>
        </tr>
    </table>
</div>
