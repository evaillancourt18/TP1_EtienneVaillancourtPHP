<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Editor $editor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Editor'), ['action' => 'edit', $editor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Editor'), ['action' => 'delete', $editor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $editor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Editors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Editor'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="editors view large-9 medium-8 columns content">
    <h3><?= h($editor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($editor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($editor->id) ?></td>
        </tr>
    </table>
</div>
