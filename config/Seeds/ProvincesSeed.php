<?php
use Migrations\AbstractSeed;

/**
 * Provinces seed.
 */
class ProvincesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '2',
                'country_id' => '1',
                'name' => 'Saskatchewan',
                'created' => '2018-09-28 13:58:57',
                'modified' => '2018-09-28 13:58:57',
            ],
            [
                'id' => '3',
                'country_id' => '1',
                'name' => 'Quebec',
                'created' => '2018-09-28 14:01:07',
                'modified' => '2018-09-28 14:01:07',
            ],
        ];

        $table = $this->table('provinces');
        $table->insert($data)->save();
    }
}
