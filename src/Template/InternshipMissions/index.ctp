<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipMission[]|\Cake\Collection\CollectionInterface $internshipMissions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Internship Mission'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="internshipMissions index large-9 medium-8 columns content">
    <h3><?= __('Internship Missions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_internship_place') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cdj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hopital') ?></th>
                <th scope="col"><?= $this->Paginator->sort('centre_jour') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recherche') ?></th>
                <th scope="col"><?= $this->Paginator->sort('renforcement_travail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reeducation_travail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('soins_externe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('soins_hospitalise') ?></th>
                <th scope="col"><?= $this->Paginator->sort('soins_hebergee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('soins_interne') ?></th>
                <th scope="col"><?= $this->Paginator->sort('soins_domicile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('soins_convalescence') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UTRF') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($internshipMissions as $internshipMission): ?>
            <tr>
                <td><?= $this->Number->format($internshipMission->id) ?></td>
                <td><?= $this->Number->format($internshipMission->id_internship_place) ?></td>
                <td><?= $this->Number->format($internshipMission->cdj) ?></td>
                <td><?= $this->Number->format($internshipMission->hopital) ?></td>
                <td><?= $this->Number->format($internshipMission->centre_jour) ?></td>
                <td><?= $this->Number->format($internshipMission->recherche) ?></td>
                <td><?= $this->Number->format($internshipMission->renforcement_travail) ?></td>
                <td><?= $this->Number->format($internshipMission->reeducation_travail) ?></td>
                <td><?= $this->Number->format($internshipMission->soins_externe) ?></td>
                <td><?= $this->Number->format($internshipMission->soins_hospitalise) ?></td>
                <td><?= $this->Number->format($internshipMission->soins_hebergee) ?></td>
                <td><?= $this->Number->format($internshipMission->soins_interne) ?></td>
                <td><?= $this->Number->format($internshipMission->soins_domicile) ?></td>
                <td><?= $this->Number->format($internshipMission->soins_convalescence) ?></td>
                <td><?= $this->Number->format($internshipMission->UTRF) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $internshipMission->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $internshipMission->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internshipMission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipMission->id)]) ?>
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
