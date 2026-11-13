<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PatientsFixture
 */
class PatientsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'patient_number' => 'Lorem ipsum dolor ',
                'name' => 'Lorem ipsum dolor sit amet',
                'name_kana' => 'Lorem ipsum dolor sit amet',
                'birth_date' => '2026-10-07',
                'gender' => 'Lorem ip',
                'postal_code' => 'Lorem ip',
                'address' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor ',
                'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2026-10-07 00:35:25',
                'modified' => '2026-10-07 00:35:25',
            ],
        ];
        parent::init();
    }
}
