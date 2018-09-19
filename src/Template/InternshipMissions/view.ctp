<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipMission $internshipMission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Internship Mission'), ['action' => 'edit', $internshipMission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Internship Mission'), ['action' => 'delete', $internshipMission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipMission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Internship Missions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internship Mission'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="internshipMissions view large-9 medium-8 columns content">
    <h3><?= h($internshipMission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($internshipMission->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Internship Place') ?></th>
            <td><?= $this->Number->format($internshipMission->id_internship_place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cdj') ?></th>
            <td><?= $this->Number->format($internshipMission->cdj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hopital') ?></th>
            <td><?= $this->Number->format($internshipMission->hopital) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Centre Jour') ?></th>
            <td><?= $this->Number->format($internshipMission->centre_jour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recherche') ?></th>
            <td><?= $this->Number->format($internshipMission->recherche) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Renforcement Travail') ?></th>
            <td><?= $this->Number->format($internshipMission->renforcement_travail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reeducation Travail') ?></th>
            <td><?= $this->Number->format($internshipMission->reeducation_travail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soins Externe') ?></th>
            <td><?= $this->Number->format($internshipMission->soins_externe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soins Hospitalise') ?></th>
            <td><?= $this->Number->format($internshipMission->soins_hospitalise) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soins Hebergee') ?></th>
            <td><?= $this->Number->format($internshipMission->soins_hebergee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soins Interne') ?></th>
            <td><?= $this->Number->format($internshipMission->soins_interne) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soins Domicile') ?></th>
            <td><?= $this->Number->format($internshipMission->soins_domicile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Soins Convalescence') ?></th>
            <td><?= $this->Number->format($internshipMission->soins_convalescence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UTRF') ?></th>
            <td><?= $this->Number->format($internshipMission->UTRF) ?></td>
        </tr>
    </table>
</div>
