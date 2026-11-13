<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property string $patient_number
 * @property string $name
 * @property string $name_kana
 * @property \Cake\I18n\Date $birth_date
 * @property string $gender
 * @property string|null $postal_code
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $note
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class Patient extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'patient_number' => true,
        'name' => true,
        'name_kana' => true,
        'birth_date' => true,
        'gender' => true,
        'postal_code' => true,
        'address' => true,
        'phone' => true,
        'note' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
    ];
}
