
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
						<ul class="nav nav-pills nav-stacked">
						<?php if ($this->Session->check('Auth.User')){ 
				if($this->Session->read('Auth.User.active') == 0){ ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Confirm your email!
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							 <li class="list-group-item"><?php echo $this->Html->link(__('Send a new confirmation'),
										array('controller' => 'users', 'action' => 'confirmation')); ?>
							 </li>    
								 <li class="list-group-item"><?php echo $this->Html->link(__('Restriction'),
										array('controller' => 'users', 'action' => 'restriction')); ?>
							 </li>  
						</ul>
						</li>
			<?php }} ?>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
                                    <li class="list-group-item"><?php echo $this->Html->link(__('View Products'), array('controller' => 'products', 'action' => 'index'), array('class' => '')); ?>
					 </li> 
                     <li class="list-group-item"><?php echo $this->Html->link(__('New Product'), array('controller' => 'products','action' => 'add'), array('class' => '')); ?>
					 </li>              
				</ul>
				</li>
				
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
                     <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users','action' => 'add'), array('class' => '')); ?>
					 </li>              
				</ul>
				</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
                     <li class="list-group-item"><?php echo $this->Html->link(__('View Sales'), array('controller' => 'sales', 'action' => 'index'), array('class' => '')); ?>
					 </li>        
					 <li class="list-group-item"><?php echo $this->Html->link(__('New sale'), array('controller' => 'sales','action' => 'add'), array('class' => '')); ?>
					 </li>        
				</ul>
				</li>
				
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Customers 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
				<li class="list-group-item"><?php echo $this->Html->link(__('View Customers'), array('controller' => 'customers', 'action' => 'index'), array('class' => '')); ?>
					 </li>
                     <li class="list-group-item"><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add'), array('class' => '')); ?>
					 </li>              
				</ul>
				</li>
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	<div id="page-content" class="col-sm-9">
				<?php include('../logo.svg'); ?>
				</br>
				<h1>Information </h1>
				</br>
				Nom : Philippe Guimond
				</br></br>
				Cours: 420-267 MO Développer un site Web et une application pour Internet.
				</br>
				Automne 2014, Collège Montmorency.
				</br></br>
				Ce prototype de site peu s'adresser aux compagnies qui désire faire de la gestion sur leurs produits,</br> afin de faire des suivis. 
				
				<h3>Étapes d'utilisation </h3>
				<ol>
				  <li>Créer un utilisateur</li>
				  <li>Confirmer son email</li>
				  <li>Se connecter</li>
				  <li>Ajouter un client</li>
				  <li>Ajouter un produit</li>
				  <li>Ajouter une vente</li>
				</ol>
				
				<h3>Restriction</h3>
				<ul>
				  <li>Si l'utilisateur n'est pas connecté, il aura accès seulement aux indexes et au vues</li>
				  <li>Si le compte n'est pas activé, l'utilisateur ne pourra pas modifier ses produits</li>
				  <li>Un compte employee peu seulement modifier ses propres ajouts</li>
				  <li>Un compte admin peu modifier l'ajouts qu'il veut</li>
				</ul>
				</br>
				Le diagramme sur lequel je me suis basé
				<?php echo $this->Html->Image("data_model.gif"); ?>
				</br>Lien vers le diagramme : </br>
				<a href="http://databaseanswers.org/data_models/dell_computer_sales/index.htm">DataBaseAnswers</a>
				</div>
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->