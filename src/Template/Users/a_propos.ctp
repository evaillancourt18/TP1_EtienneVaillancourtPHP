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
<p>https://github.com/evaillancourt18/TP1_EtienneVaillancourtPHP</p>
<h3>Utilisateur régulier</h3>
 <p>Vous créer un nouvel utilisateur. Vous pouvez seulement voir la liste de livres et d'auteurs.</p>
 
<h3>Super-Utilisateur (username: et_202@hotmail.com password:123321)</h3>

	<p>Une fois que vous confirmez avec votre adresse courriel votre compte créé devient un Super-Utilisateur.<br/>
	Même autorisation que les utilisateurs régulier. Mais en plus vous pouvez ajouter des livres et des auteurs, ajouter et voir des catégories, provinces, pays.</p>
	
<h3>Admin (username: admin@admin.com password:123321)</h3>
	<p>Même autorisation qu'un super-utilisateur. Mais en plus vous pouvez modifier et supprimer n'importe quel enregistrement en plus de pouvoir gérer les utilisateurs et les fichiers.</p>
	
<h3>TP2</h3>
	<p>Le plus simple est de se connecter en tant qu'administrateur pour avoir accès à toute les fonctionnalités.<br/>
	Comme nous en avons parler mon phpUnit ne fonctionne pas alors je n'ai pas réussi a sortir un coverage mais mes test ont été fait dans Books pour mon modèle et dans Countries pour mon controlleur.<br/>
	Mon one page app à été fait pour la table Categories donc les requêtes ajax s'y retrouve.<br/>
	Mes pdf sont dans la table Books pour l'index et mes liste liées et mon autocomplete pour le add/edit.<br/>
	Les interfaces sont adapté à la grandeur de la fenêtre grace a bootstrap.<br/>
	Finalement pour la démonstration de mon application vous me direz ce que vous voudrez que je fasse pour pouvoir avoir mes points vu que je ne peux pas être à la démonstration aux portes ouvertes.</p>
	
<h3>Diagramme BD</h3>
<?php echo $this->Html->image('bd.png', ['alt' => 'Base de données']); ?>

</div>
</body>