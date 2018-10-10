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
<h3>Utilisateur régulier</h3>
 <p>Vous créer un nouvel utilisateur. Vous pouvez seulement voir la liste de livres et d'auteurs.</p>
 
<h3>Super-Utilisateur (username: et_202@hotmail.com password:123321)</h3>

	<p>Une fois que vous confirmez avec votre adresse courriel votre compte créé devient un Super-Utilisateur.<br/>
	Même autorisation que les utilisateurs régulier. Mais en plus vous pouvez ajouter des livres et des auteurs, ajouter et voir des catégories, provinces, pays.</p>
	
<h3>Admin (username: admin@admin.com password:123321)</h3>
	<p>Même autorisation qu'un super-utilisateur. Mais en plus vous pouvez modifier et supprimer n'importe quel enregistrement en plus de pouvoir gérer les utilisateurs et les fichiers.</p>
	
<h3>Diagramme BD</h3>
<?php echo $this->Html->image('bd.png', ['alt' => 'Base de données']); ?>

</div>
</body>