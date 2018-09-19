<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InternshipMission Entity
 *
 * @property int $id
 * @property int $id_internship_place
 * @property int $cdj
 * @property int $hopital
 * @property int $centre_jour
 * @property int $recherche
 * @property int $renforcement_travail
 * @property int $reeducation_travail
 * @property int $soins_externe
 * @property int $soins_hospitalise
 * @property int $soins_hebergee
 * @property int $soins_interne
 * @property int $soins_domicile
 * @property int $soins_convalescence
 * @property int $UTRF
 */
class InternshipMission extends Entity
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
        'id_internship_place' => true,
        'cdj' => true,
        'hopital' => true,
        'centre_jour' => true,
        'recherche' => true,
        'renforcement_travail' => true,
        'reeducation_travail' => true,
        'soins_externe' => true,
        'soins_hospitalise' => true,
        'soins_hebergee' => true,
        'soins_interne' => true,
        'soins_domicile' => true,
        'soins_convalescence' => true,
        'UTRF' => true
    ];
}
