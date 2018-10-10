<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
    </ul>
</nav>
<body>
<div class="users form large-9 medium-8 columns content">
<h2>Étienne Vaillancourt</h2>
<p>420-5B7-MO , Automne 2018 , Collège Montmorency</p>
<h3>Visiteur</h3>
 <p>Vous pouvez seulement voir la liste de livres et d'auteurs.</p>
 
<h3>Utilisateur régulier</h3>

	<p>Même autorisations que les visiteurs en plus de pouvoir ajouter des livres et des auteurs vous pouvez voir et ajouter des categories, provinces, pays</p>
	
<h3>Super-Utilisateur</h3>
	<p>Même autorisation qu'un utilisateur régulier mais en plus vous pouvez modifier et supprimer n'importe quel enregistrement en plus de pouvoir gérer les utilisateurs et les fichiers</p>
	
<h3>Diagramme BD</h3>
<?php echo $this->Html->image('bd.png', ['alt' => 'CakePHP']); ?>

</div>
</body>