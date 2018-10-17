<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coordinator[]|\Cake\Collection\CollectionInterface $coordinators
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Coordinator'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coordinators index large-9 medium-8 columns content">
    <h3><?= __('Coordinators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('appellation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extension') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cell_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fax') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coordinators as $coordinator): ?>
            <tr>
                <td><?= $this->Number->format($coordinator->id) ?></td>
                <td><?= $this->Number->format($coordinator->id_user) ?></td>
                <td><?= h($coordinator->appellation) ?></td>
                <td><?= h($coordinator->first_name) ?></td>
                <td><?= h($coordinator->last_name) ?></td>
                <td><?= h($coordinator->title) ?></td>
                <td><?= h($coordinator->place) ?></td>
                <td><?= h($coordinator->address) ?></td>
                <td><?= h($coordinator->city) ?></td>
                <td><?= h($coordinator->province) ?></td>
                <td><?= h($coordinator->postal_code) ?></td>
                <td><?= h($coordinator->email) ?></td>
                <td><?= h($coordinator->phone) ?></td>
                <td><?= h($coordinator->extension) ?></td>
                <td><?= h($coordinator->cell_phone) ?></td>
                <td><?= h($coordinator->fax) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $coordinator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coordinator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coordinator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coordinator->id)]) ?>
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
