<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'id' => '1',
                'name' => 'BLABLA',
                'path' => 'blabla.jpg',
                'created' => '2018-09-28 14:50:24',
                'modified' => '2018-09-28 14:50:24',
                'status' => '1',
            ],
            [
                'id' => '2',
                'name' => 'AnyDesk.jpg',
                'path' => 'Files/',
                'created' => '2018-10-04 17:59:26',
                'modified' => '2018-10-04 17:59:26',
                'status' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Zoho.jpg',
                'path' => 'Files/',
                'created' => '2018-10-10 15:09:59',
                'modified' => '2018-10-10 15:09:59',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
