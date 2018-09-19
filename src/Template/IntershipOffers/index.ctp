<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IntershipOffer[]|\Cake\Collection\CollectionInterface $intershipOffers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Intership Offer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="intershipOffers index large-9 medium-8 columns content">
    <h3><?= __('Intership Offers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_official') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remuneration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_hour') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($intershipOffers as $intershipOffer): ?>
            <tr>
                <td><?= $this->Number->format($intershipOffer->id) ?></td>
                <td><?= $this->Number->format($intershipOffer->id_official) ?></td>
                <td><?= h($intershipOffer->title) ?></td>
                <td><?= h($intershipOffer->remuneration) ?></td>
                <td><?= $this->Number->format($intershipOffer->number_of_hour) ?></td>
                <td><?= h($intershipOffer->category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $intershipOffer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $intershipOffer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $intershipOffer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intershipOffer->id)]) ?>
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
