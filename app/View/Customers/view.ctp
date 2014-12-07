
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
                                        <li class="list-group-item"><?php echo $this->Html->link(__('List Sale'), array('action' => 'index'), array('class' => '')); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Html->link(__('New Sale'), array('action' => 'add'), array('class' => '')); ?> </li>           
				</ul>
				</li>
				
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Customers 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
                                    					<li class="list-group-item"><?php echo $this->Html->link(__('Customer Sale'), array('action' => 'edit', $user['Customer']['id']), array('class' => '')); ?> </li>
                                        <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Customer'), array('action' => 'delete', $user['Customer']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['Customer']['id'])); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('View List'), array('controller' => 'customers', 'action' => 'index'), array('class' => '')); ?>
					 </li>
                     <li class="list-group-item"><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add'), array('class' => '')); ?>
					 </li>              
				</ul>
				</li>
			</ul>
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="customers view">

			<h2><?php  echo __('Customer'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Customer Name'); ?></strong></td>
		<td>
			<?php echo h($customer['Customer']['customer_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Other Details'); ?></strong></td>
		<td>
			<?php echo h($customer['Customer']['other_details']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Sales'); ?></h3>
				
				<?php if (!empty($customer['Sale'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											
		<th><?php echo __('Sale Total Value'); ?></th>
		<th><?php echo __('Other Details'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($customer['Sale'] as $sale): ?>
		<tr>
			<td><?php echo $sale['sale_total_value']; ?></td>
			<td><?php echo $sale['other_details']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sales', 'action' => 'view', $sale['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sales', 'action' => 'edit', $sale['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sales', 'action' => 'delete', $sale['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $sale['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Sale'), array('controller' => 'sales', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
