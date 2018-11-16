<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
 $urlToLinkedListFilter = $this->Url->build([
    "controller" => "Countries",
    "action" => "getCountries",
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
        <li><?= $this->Html->link(__('List Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="books form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="countriesController">
    <?= $this->Form->create($book) ?>
    <fieldset>
        <legend><?= __('Add Book') ?></legend>
        <?php
            echo $this->Form->control('author_id', ['options' => $authors]);
            echo $this->Form->control('title');
			echo $this->Form->control('editor_id', ['id' => 'autocomplete', 'type' => 'text']);
            echo $this->Form->control('release_date');
            echo $this->Form->control('categories._ids', ['options' => $categories]);
        ?>
		<div>
			Countries: 
            <select name="Country_id"
                    id="country-id" 
                    ng-model="country" 
                    ng-options="country.name for country in countries track by country.id"
                    >
                <option value=''>Select</option>
            </select>
		</div>
		<div>
            Provinces: 
            <select name="province_id"
                    id="province-id" 
                    ng-disabled="!country" 
                    ng-model="province"
                    ng-options="province.name for province in country.provinces track by province.id"
                    >
                <option value=''>Select</option>
            </select>
			<pre ng-show='countries'>{{ countries | json }}</pre>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
