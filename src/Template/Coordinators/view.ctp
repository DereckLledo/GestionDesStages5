<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coordinator $coordinator
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Coordinator'), ['action' => 'edit', $coordinator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coordinator'), ['action' => 'delete', $coordinator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coordinator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Coordinators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coordinator'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="coordinators view large-9 medium-8 columns content">
    <h3><?= h($coordinator->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Appellation') ?></th>
            <td><?= h($coordinator->appellation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($coordinator->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($coordinator->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($coordinator->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($coordinator->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($coordinator->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($coordinator->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($coordinator->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Code') ?></th>
            <td><?= h($coordinator->postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($coordinator->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($coordinator->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extension') ?></th>
            <td><?= h($coordinator->extension) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cell Phone') ?></th>
            <td><?= h($coordinator->cell_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($coordinator->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($coordinator->id) ?></td>
        </tr>
    </table>
</div>
