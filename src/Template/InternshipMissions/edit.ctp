<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipMission $internshipMission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $internshipMission->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $internshipMission->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Internship Missions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="internshipMissions form large-9 medium-8 columns content">
    <?= $this->Form->create($internshipMission) ?>
    <fieldset>
        <legend><?= __('Edit Internship Mission') ?></legend>
        <?php
            echo $this->Form->control('id_internship_place');
            echo $this->Form->control('cdj');
            echo $this->Form->control('hopital');
            echo $this->Form->control('centre_jour');
            echo $this->Form->control('recherche');
            echo $this->Form->control('renforcement_travail');
            echo $this->Form->control('reeducation_travail');
            echo $this->Form->control('soins_externe');
            echo $this->Form->control('soins_hospitalise');
            echo $this->Form->control('soins_hebergee');
            echo $this->Form->control('soins_interne');
            echo $this->Form->control('soins_domicile');
            echo $this->Form->control('soins_convalescence');
            echo $this->Form->control('UTRF');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
