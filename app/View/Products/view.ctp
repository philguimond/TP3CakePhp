
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="nav nav-pills nav-stacked">
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products 
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
                     						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Products'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Product'), array('action' => 'add'), array('class' => '')); ?> </li>
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
			</ul>
			
			
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="products view">

			<h2><?php  echo __('Product'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Title'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['title']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Price'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['price']); ?>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Picture'); ?></strong></td>
		<td>
			<?php echo $this->Html->image('imgProduit/' . $product['Product']['id'] . '.' . $product['Product']['image'], array('width'=>80,'height'=>'80','alt'=>'Open')); ?>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Color'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['color']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Rating'); ?></strong></td>
		<td>
			<?php echo h($product['Subcategory']['rating']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($product['Product']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($product['User']['username'], array('controller' => 'users', 'action' => 'view', $product['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Sales'); ?></h3>
				
				<?php if (!empty($product['Sale'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Sale Total Value'); ?></th>
		<th><?php echo __('Other Details'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($product['Sale'] as $sale): ?>
		<tr>
			<td><?php echo $sale['id']; ?></td>
			<td><?php echo $sale['customer_id']; ?></td>
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
