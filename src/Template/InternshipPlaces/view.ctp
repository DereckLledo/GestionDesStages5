<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipPlace $internshipPlace
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Internship Place'), ['action' => 'edit', $internshipPlace->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Internship Place'), ['action' => 'delete', $internshipPlace->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipPlace->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Internship Places'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internship Place'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="internshipPlaces view large-9 medium-8 columns content">
    <h3><?= h($internshipPlace->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($internshipPlace->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($internshipPlace->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($internshipPlace->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($internshipPlace->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($internshipPlace->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Code') ?></th>
            <td><?= h($internshipPlace->postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Administrative Region') ?></th>
            <td><?= h($internshipPlace->administrative_region) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($internshipPlace->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= $internshipPlace->actif ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
