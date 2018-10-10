<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'email' => 'et_202@hotmail.com',
                'password' => '$2y$10$FuvYAxfet.npPzGdQMKff.zFIbKyynjQtuBYOg0UZyKZwihhVWQzS',
                'created' => '2018-09-24 15:49:25',
                'modified' => '2018-09-24 15:49:25',
                'type' => '1',
            ],
            [
                'id' => '7',
                'email' => 'linda@hotmail.com',
                'password' => '$2y$10$r8vueIp6oXVwplBOHYPdKu4BeLNiDwYsDaa5O5ELvWmdC0NRshkqm',
                'created' => '2018-09-28 13:00:52',
                'modified' => '2018-09-28 13:00:52',
                'type' => '0',
            ],
            [
                'id' => '8',
                'email' => 'e.vaillancourt@hotmail.ca',
                'password' => '$2y$10$PfQz7lVuwr/A2vAGKbxqJ.yQlHu2IqW6uReLfmYS0ClhoY/sXzGDG',
                'created' => '2018-09-28 13:36:32',
                'modified' => '2018-09-28 13:36:32',
                'type' => '2',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
