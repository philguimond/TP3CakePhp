
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
		<li class="list-group-item"><?php echo $this->Html->link(__('List Products'), array('controller' => 'products','action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Product'), array('controller' => 'products','action' => 'add'), array('class' => '')); ?> </li>
					 </li>              
				</ul>
				</li>
				
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
		<li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?> </li>
                     <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users','action' => 'add'), array('class' => '')); ?>
					 </li>              
				</ul>
				</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
		<li class="list-group-item"><?php echo $this->Html->link(__('List Sales'), array('controller' => 'sales','action' => 'index'), array('class' => '')); ?> </li>
                     <li class="list-group-item"><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales','action' => 'add'), array('class' => '')); ?>
					 </li>      
				</ul>
				</li>
				
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Customers 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
				<li class="list-group-item">
                                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete customer'), array('controller' => 'customers','action' => 'delete', $this->Form->Value('Customer.id')),null, __('Are you sure you want to delete # %s?', $this->Form->Value('Customer.id'))); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Html->link(__('List customers'), array('controller' => 'customers','action' => 'index'), array('class' => '')); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Html->link(__('New customer'), array('controller' => 'customers','action' => 'add'), array('class' => '')); ?>
					 </li>          
				</ul>
				</li>
			</ul>
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Edit Customer'); ?></h2>

		<div class="customers form">
		
			<?php echo $this->Form->create('Customer', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('customer_name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('other_details', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->