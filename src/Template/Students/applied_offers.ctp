<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

    </ul>
</nav>
<div class="students view large-9 medium-8 columns content">


    <div class="related">
        <h4><?= __('Applied offers') ?></h4>
        <?php if (!empty($student->internship_offers )): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Remuneration') ?></th>
                <th scope="col"><?= __('Number of hour') ?></th>
                <th scope="col"><?= __('Actions') ?></th>
            </tr>
                <?php foreach ($student->internship_offers as $internshipOffer): ?>
            <tr>
                <td><?= h($internshipOffer->title) ?></td>
                <td><?= h($internshipOffer->remuneration) ?></td>
                <td><?= h($internshipOffer->number_of_hour) ?></td>
                <td><?=$this->Html->link(__('View'), ['controller'=>'internshipOffers', 'action' => 'view', $internshipOffer->id]); ?> |
                     <?=$this->Form->postLink(__('Remove'), ['action' => 'removeApplication',$student->id, $internshipOffer->id], ['confirm' => __('Are you sure you want to delete {0}?', $internshipOffer->title)]);?>   </td>
            </tr>
                <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>   

</div>


