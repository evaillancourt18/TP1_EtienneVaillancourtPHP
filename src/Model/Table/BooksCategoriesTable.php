<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BooksCategories Model
 *
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\BelongsTo $Books
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\BooksCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\BooksCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BooksCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BooksCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BooksCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BooksCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BooksCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BooksCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class BooksCategoriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('books_categories');
        $this->setDisplayField('book_id');
        $this->setPrimaryKey(['book_id', 'category_id']);

        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['book_id'], 'Books'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}