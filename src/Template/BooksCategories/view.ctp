<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BooksCategory $booksCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Books Category'), ['action' => 'edit', $booksCategory->book_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Books Category'), ['action' => 'delete', $booksCategory->book_id], ['confirm' => __('Are you sure you want to delete # {0}?', $booksCategory->book_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Books Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Books Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="booksCategories view large-9 medium-8 columns content">
    <h3><?= h($booksCategory->book_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Book') ?></th>
            <td><?= $booksCategory->has('book') ? $this->Html->link($booksCategory->book->title, ['controller' => 'Books', 'action' => 'view', $booksCategory->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $booksCategory->has('category') ? $this->Html->link($booksCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $booksCategory->category->id]) : '' ?></td>
        </tr>
    </table>
</div>
