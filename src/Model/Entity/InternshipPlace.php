<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InternshipPlace Entity
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property string $administrative_region
 * @property bool $actif
 */
class InternshipPlace extends Entity
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
        'name' => true,
        'type' => true,
        'address' => true,
        'city' => true,
        'province' => true,
        'postal_code' => true,
        'administrative_region' => true,
        'actif' => true
    ];
}
