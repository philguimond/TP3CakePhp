
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
		
			
				<ul class="nav nav-pills nav-stacked">
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
                                         <li class="list-group-item"><?php echo $this->Html->link(__('New Users'), array('controller' => 'users','action' => 'add'), array('class' => '')); ?>
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
                                          <li class="list-group-item"><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add'), array('class' => '')); ?>
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
          
				</ul>
				</li>
			</ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add Customer'); ?></h2>

		<div class="customers form">
		
			<?php echo $this->Form->create('Customer', array('role' => 'form')); ?>

				<fieldset>

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