<?php
use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends AbstractSeed
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
                'id' => '3',
                'name' => 'Action',
                'created' => '2018-09-17 16:29:56',
                'modified' => '2018-09-17 16:29:56',
            ],
            [
                'id' => '4',
                'name' => 'Drame',
                'created' => '2018-09-17 16:30:03',
                'modified' => '2018-09-17 16:30:03',
            ],
            [
                'id' => '5',
                'name' => 'Aventure',
                'created' => '2018-09-28 14:03:32',
                'modified' => '2018-09-28 14:03:32',
            ],
        ];

        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
