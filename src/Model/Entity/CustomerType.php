<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomerType Entity
 *
 * @property int $id
 * @property int $id_internship_place
 * @property int $cdj
 * @property int $hopital
 * @property int $client_hebergee
 * @property int $client_externe
 * @property int $perte_autonomie
 * @property int $neuro
 * @property int $ortho_rhumato
 * @property int $cardio
 * @property int $palliatif
 * @property int $convalescence
 * @property int $utrf
 * @property int $recherche
 * @property int $reeducation
 * @property int $renforcement
 */
class CustomerType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id' => true,
        'id_internship_place' => true,
        'cdj' => true,
        'hopital' => true,
        'client_hebergee' => true,
        'client_externe' => true,
        'perte_autonomie' => true,
        'neuro' => true,
        'ortho_rhumato' => true,
        'cardio' => true,
        'palliatif' => true,
        'convalescence' => true,
        'utrf' => true,
        'recherche' => true,
        'reeducation' => true,
        'renforcement' => true
    ];
}
