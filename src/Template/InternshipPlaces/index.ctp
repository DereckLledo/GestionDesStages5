<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipPlace[]|\Cake\Collection\CollectionInterface $internshipPlaces
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Internship Place'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="internshipPlaces index large-9 medium-8 columns content">
    <h3><?= __('Internship Places') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('administrative_region') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actif') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($internshipPlaces as $internshipPlace): ?>
            <tr>
                <td><?= $this->Number->format($internshipPlace->id) ?></td>
                <td><?= h($internshipPlace->name) ?></td>
                <td><?= h($internshipPlace->type) ?></td>
                <td><?= h($internshipPlace->address) ?></td>
                <td><?= h($internshipPlace->city) ?></td>
                <td><?= h($internshipPlace->province) ?></td>
                <td><?= h($internshipPlace->postal_code) ?></td>
                <td><?= h($internshipPlace->administrative_region) ?></td>
                <td><?= h($internshipPlace->actif) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $internshipPlace->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $internshipPlace->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internshipPlace->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipPlace->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
