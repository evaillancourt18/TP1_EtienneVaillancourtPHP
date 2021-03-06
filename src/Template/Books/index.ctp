<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
  $loguser = $this->request->session()->read('Auth.User');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
		<?php
		if($loguser['type']==2||$loguser['type']==1){
		?>
        <li><?= $this->Html->link(__('New Book'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
		<?php
		}
		?>
		<?php
		if($loguser['type']==2){
			?>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
		<?php
		}
		?>
		<li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="books index large-9 medium-8 columns content">
    <h3><?= __('Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('author_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('release_date') ?></th>
				<th scope="col"><?= $this->Paginator->sort('editor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
		<?php
		if($loguser['type']==2||$loguser['type']==1){
		?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
		<?php
		}
		?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book->has('author') ? $this->Html->link($book->author->name, ['controller' => 'Authors', 'action' => 'view', $book->author->id]) : '' ?></td>
                <td><?= $book->has('province') ? $this->Html->link($book->province->name, ['controller' => 'Provinces', 'action' => 'view', $book->province->id]) : '' ?></td>
                <td><?= h($book->title) ?></td>
                <td><?= h($book->release_date) ?></td>
				<td><?= $book->has('editor') ? $this->Html->link($book->editor->name, ['controller' => 'Editors', 'action' => 'view', $book->editor->id]) : '' ?></td>
                <td><?= h($book->created) ?></td>
                <td><?= h($book->modified) ?></td>
				<?php
		if($loguser['type']==2||$loguser['type']==1){
		?>
                <td class="actions">
		
                    <?= $this->Html->link(__('View'), ['action' => 'view', $book->id]) ?>
					<?= $this->Html->link(__('(pdf)'), ['action' => 'view', $book->id . '.pdf']) ?>
					<?php
		if($loguser['type']==2){
		?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
					<?php
		}
		?>
                </td>
		<?php
		}
		?>
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
