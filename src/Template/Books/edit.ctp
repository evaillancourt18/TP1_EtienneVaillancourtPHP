<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
 $urlToLinkedListFilter = $this->Url->build([
    "controller" => "provinces",
    "action" => "getByCountry",
    "_ext" => "json"
        ]);
 echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
 echo $this->Html->script('Books/add', ['block' => 'scriptBottom']);
 
 $urlToEditorsAutocompleteJson = $this->Url->build([
    "controller" => "books",
    "action" => "findEditors",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToEditorsAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Books/autocomplete', ['block' => 'scriptBottom']);

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $book->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="books form large-9 medium-8 columns content">
    <?= $this->Form->create($book) ?>
    <fieldset>
        <legend><?= __('Edit Book') ?></legend>
        <?php
            echo $this->Form->control('author_id', ['options' => $authors]);
			echo $this->Form->control('country_id', ['options' => $countries, 'value' => $country_id]);
            echo $this->Form->control('province_id', ['options' => $provinces]);
            echo $this->Form->control('title');
			echo $this->Form->control('editor_id', ['id' => 'autocomplete', 'type' => 'text']);
            echo $this->Form->control('release_date');
            echo $this->Form->control('categories._ids', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
