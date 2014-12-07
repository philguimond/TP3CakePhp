
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
					 <li class="list-group-item"><?php echo $this->Html->link(__('View Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?>
					 </li> 
                     <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users','action' => 'add'), array('class' => '')); ?>
					 </li>              
				</ul>
				</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					 <li class="list-group-item"><?php echo $this->Html->link(__('New sale'), array('controller' => 'sales','action' => 'add'), array('class' => '')); ?>
					 </li>        
				</ul>
				</li>
				
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Customers 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
                     <li class="list-group-item"><?php echo $this->Html->link(__('View customers'), array('controller' => 'customers', 'action' => 'index'), array('class' => '')); ?>
					 </li> 
                     <li class="list-group-item"><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add'), array('class' => '')); ?>
					 </li>              
				</ul>
				</li>
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="sales index">
		
			<h2><?php echo __('Sales'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							
							<th><?php echo $this->Paginator->sort('customer_id'); ?></th>
							<th><?php echo $this->Paginator->sort('sale_total_value'); ?></th>
							<th><?php echo $this->Paginator->sort('Products'); ?></th>
							<th><?php echo $this->Paginator->sort('other_details'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($sales as $sale): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($sale['Customer']['customer_name'], array('controller' => 'customers', 'action' => 'view', $sale['Customer']['id'])); ?>
		</td>
		<td><?php echo h($sale['Sale']['sale_total_value']); ?>&nbsp;</td>
		
			<td>
		<?php foreach ($sale['Product'] as $product): 
		echo $this->Html->link( $product['title'] .' ',array('controller' => 'products', 'action' => 'view', $product['id']), array('class' => 'label label-info'));
		endforeach
		?>&nbsp;</td>
		</td>
		
		<td><?php echo h($sale['Sale']['other_details']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sale['Sale']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sale['Sale']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sale['Sale']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $sale['Sale']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->