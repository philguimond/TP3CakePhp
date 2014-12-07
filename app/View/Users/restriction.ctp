
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
                                    <li class="list-group-item"><?php echo $this->Html->link(__('View Lists'), array('controller' => 'products', 'action' => 'index'), array('class' => '')); ?>
					 </li> 
                     <li class="list-group-item"><?php echo $this->Html->link(__('Add Products'), array('controller' => 'products','action' => 'index')); ?></li>
					 </li>              
				</ul>
				</li>
				
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					 <li class="list-group-item"><?php echo $this->Html->link(__('View Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?>
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
	<h1>Restriction</h1>
	</br>
	-You will have to be connected to be able to edit your products.
	</br></br>
	-Please confirm your account to have access to every feature. </br>
	-If you haven't received any confirmation email you can send back one.
	
	</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->