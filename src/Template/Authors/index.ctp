<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author[]|\Cake\Collection\CollectionInterface $authors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Author'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="authors index large-9 medium-8 columns content">
    <h3><?= __('Authors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
				<th scope="col"><?= $this->Paginator->sort('user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authors as $author): ?>
            <tr>
                <td><?= $author->has('user') ? $this->Html->link($author->user->email, ['controller' => 'Users', 'action' => 'view', $author->user->id]) : '' ?></td>
                <td><?= h($author->name) ?></td>
                <td><?= h($author->email) ?></td>
                <td><?= h($author->image) ?></td>
                <td><?= h($author->created) ?></td>
                <td><?= h($author->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $author->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $author->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $author->id], ['confirm' => __('Are you sure you want to delete # {0}?', $author->id)]) ?>
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
