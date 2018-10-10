<?php
use Migrations\AbstractSeed;

/**
 * Books seed.
 */
class BooksSeed extends AbstractSeed
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
                'id' => '4',
                'author_id' => '6',
                'province_id' => '2',
                'title' => 'The nice ones',
                'release_date' => '27/05/1991',
                'created' => '2018-09-28 15:01:24',
                'modified' => '2018-10-04 16:09:38',
            ],
        ];

        $table = $this->table('books');
        $table->insert($data)->save();
    }
}
