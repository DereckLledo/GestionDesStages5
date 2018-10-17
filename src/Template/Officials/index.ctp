<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Official[]|\Cake\Collection\CollectionInterface $officials
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Official'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="officials index large-9 medium-8 columns content">
    <h3><?= __('Officials') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
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
            <?php foreach ($officials as $official): ?>
            <tr>
                <td><?= h($official->first_name) ?></td>
                <td><?= h($official->last_name) ?></td>
                <td><?= h($official->title) ?></td>
                <td><?= h($official->place) ?></td>
                <td><?= h($official->address) ?></td>
                <td><?= h($official->city) ?></td>
                <td><?= h($official->province) ?></td>
                <td><?= h($official->postal_code) ?></td>
                <td><?= h($official->email) ?></td>
                <td><?= h($official->phone) ?></td>
                <td><?= h($official->extension) ?></td>
                <td><?= h($official->cell_phone) ?></td>
                <td><?= h($official->fax) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $official->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $official->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $official->id], ['confirm' => __('Are you sure you want to delete # {0}?', $official->id)]) ?>
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
