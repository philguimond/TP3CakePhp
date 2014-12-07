
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
                                        <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users','action' => 'add'), array('class' => '')); ?> </li>          
				</ul>
				</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li class="list-group-item"><?php echo $this->Html->link(__('Edit Sale'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Sale'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Html->link(__('List Sale'), array('action' => 'index'), array('class' => '')); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Html->link(__('New Sale'), array('action' => 'add'), array('class' => '')); ?> </li>           
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
			</ul>
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="sales view">

			<h2><?php  echo __('Sale'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($sale['Sale']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Customer'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($sale['Customer']['customer_name'], array('controller' => 'customers', 'action' => 'view', $sale['Customer']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Sale Total Value'); ?></strong></td>
		<td>
			<?php echo h($sale['Sale']['sale_total_value']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Other Details'); ?></strong></td>
		<td>
			<?php echo h($sale['Sale']['other_details']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Products'); ?></h3>
				
				<?php if (!empty($sale['Product'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
										
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($sale['Product'] as $product): ?>
		<tr>
		
			<td><?php echo $product['title']; ?></td>
			<td><?php echo $product['description']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td><?php echo $product['email']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified']; ?></td>
			<td><?php echo $product['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Product'), array('controller' => 'products', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
