<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipOffer[]|\Cake\Collection\CollectionInterface $internshipOffers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Internship Offer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="internshipOffers index large-9 medium-8 columns content">
    <h3><?= __('Internship Offers') ?></h3>
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
            <?php foreach ($internshipOffers as $internshipOffer): ?>
            <tr>
                <td><?= $this->Number->format($internshipOffer->id) ?></td>
                <td><?= $this->Number->format($internshipOffer->id_official) ?></td>
                <td><?= h($internshipOffer->title) ?></td>
                <td><?= h($internshipOffer->remuneration) ?></td>
                <td><?= $this->Number->format($internshipOffer->number_of_hour) ?></td>
                <td><?= h($internshipOffer->category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $internshipOffer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $internshipOffer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internshipOffer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipOffer->id)]) ?>
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