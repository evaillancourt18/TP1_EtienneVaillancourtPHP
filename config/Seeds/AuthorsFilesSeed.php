<?php
use Migrations\AbstractSeed;

/**
 * AuthorsFiles seed.
 */
class AuthorsFilesSeed extends AbstractSeed
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
                'file_id' => '2',
                'author_id' => '6',
            ],
            [
                'file_id' => '3',
                'author_id' => '9',
            ],
        ];

        $table = $this->table('authors_files');
        $table->insert($data)->save();
    }
}
