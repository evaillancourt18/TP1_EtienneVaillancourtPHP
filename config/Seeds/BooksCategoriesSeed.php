<?php
use Migrations\AbstractSeed;

/**
 * BooksCategories seed.
 */
class BooksCategoriesSeed extends AbstractSeed
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
                'book_id' => '4',
                'category_id' => '3',
            ],
        ];

        $table = $this->table('books_categories');
        $table->insert($data)->save();
    }
}
