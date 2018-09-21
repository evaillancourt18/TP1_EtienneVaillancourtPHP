<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BooksCategory $booksCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $booksCategory->book_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booksCategory->book_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Books Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="booksCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($booksCategory) ?>
    <fieldset>
        <legend><?= __('Edit Books Category') ?></legend>
        <?php
            echo $this->Form->control('category_id', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
