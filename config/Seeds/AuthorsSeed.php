<?php
use Migrations\AbstractSeed;

/**
 * Authors seed.
 */
class AuthorsSeed extends AbstractSeed
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
                'id' => '6',
                'user_id' => '8',
                'name' => 'Etienne Vaillancourt',
                'email' => 'et_202@hotmail.com',
                'created' => '2018-09-28 14:52:55',
                'modified' => '2018-10-10 15:14:38',
            ],
            [
                'id' => '7',
                'user_id' => '8',
                'name' => 'Linda lemay',
                'email' => 'l.lemay@mail.com',
                'created' => '2018-09-28 14:53:42',
                'modified' => '2018-09-28 14:53:42',
            ],
            [
                'id' => '8',
                'user_id' => '8',
                'name' => 'jeremy demay',
                'email' => 'j.demay@mail.com',
                'created' => '2018-10-04 18:01:20',
                'modified' => '2018-10-04 18:01:20',
            ],
            [
                'id' => '9',
                'user_id' => '8',
                'name' => 'Jean guy',
                'email' => 'j.salut@mail.com',
                'created' => '2018-10-10 15:15:25',
                'modified' => '2018-10-10 15:15:25',
            ],
        ];

        $table = $this->table('authors');
        $table->insert($data)->save();
    }
}
