<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property int $id_user
 * @property int $admission_number
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $other_detail
 * @property string $note
 * @property bool $actif
 */
class Student extends Entity
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
        'id_user' => true,
        'admission_number' => true,
        'first_name' => true,
        'last_name' => true,
        'phone' => true,
        'email' => true,
        'other_detail' => true,
        'note' => true,
        'actif' => true
    ];
}
