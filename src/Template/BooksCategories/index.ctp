<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BooksCategory[]|\Cake\Collection\CollectionInterface $booksCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Books Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="booksCategories index large-9 medium-8 columns content">
    <h3><?= __('Books Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('book_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($booksCategories as $booksCategory): ?>
            <tr>
                <td><?= $booksCategory->has('book') ? $this->Html->link($booksCategory->book->title, ['controller' => 'Books', 'action' => 'view', $booksCategory->book->id]) : '' ?></td>
                <td><?= $booksCategory->has('category') ? $this->Html->link($booksCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $booksCategory->category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $booksCategory->book_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booksCategory->book_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booksCategory->book_id], ['confirm' => __('Are you sure you want to delete # {0}?', $booksCategory->book_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
