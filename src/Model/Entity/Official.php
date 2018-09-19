<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Official Entity
 *
 * @property int $id
 * @property int $id_internship_place
 * @property string $appellation
 * @property string $first_name
 * @property string $last_name
 * @property string $title
 * @property string $place
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property string $email
 * @property string $phone
 * @property string $extension
 * @property string $cell_phone
 * @property string $fax
 */
class Official extends Entity
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
        'appellation' => true,
        'first_name' => true,
        'last_name' => true,
        'title' => true,
        'place' => true,
        'address' => true,
        'city' => true,
        'province' => true,
        'postal_code' => true,
        'email' => true,
        'phone' => true,
        'extension' => true,
        'cell_phone' => true,
        'fax' => true
    ];
}
