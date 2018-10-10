<?php
use Migrations\AbstractSeed;

/**
 * I18n seed.
 */
class I18nSeed extends AbstractSeed
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
                'locale' => 'fr_CA',
                'model' => 'Books',
                'foreign_key' => '4',
                'field' => 'title',
                'content' => 'Les gentils',
            ],
            [
                'id' => '2',
                'locale' => 'es_CU',
                'model' => 'Books',
                'foreign_key' => '4',
                'field' => 'title',
                'content' => 'Los buenos',
            ],
        ];

        $table = $this->table('i18n');
        $table->insert($data)->save();
    }
}
