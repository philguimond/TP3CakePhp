<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link('DELL SALES',array('controller' => 'products', 'action' => 'index') ,array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
                    
                               <?php 
                                if (!$this->Session->check('Auth.User')){
								  echo '<li>' . $this->Html->Link('Log in',array('controller' => 'users', 'action' => 'login')) . '</li>';
                                } else {
                                  echo '<li>' . $this->Html->Link('Log out',array('controller' => 'users', 'action' => 'logout')) . '</li>';
                                } 
								  echo '<li>' . $this->Html->Link('Sign in',array('controller' => 'users', 'action' => 'add')) . '</li>';
								  echo '<li>' . $this->Html->Link('Customers',array('controller' => 'customers', 'action' => 'index')) . '</li>';
								  echo '<li>' . $this->Html->Link('Sales',array('controller' => 'sales', 'action' => 'index')) . '</li>';
								?>
								
								
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Language') ?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
                                    <?php
                                        echo $this->I18n->flagSwitcher(array(
                                        'class' => 'languages',
                                        'id' => 'language-switcher'
                                    ));
                                    ?>
				</ul>
                                <?php 
                                if ($this->Session->check('Auth.User')){
                                    echo 'Username: ';
                                    echo $this->Session->read('Auth.User.username');
                                    echo ' - Role: ';
                                    echo $this->Session->read('Auth.User.role');
                                } ?>
			</li>
		</ul><!-- /.nav navbar-nav -->
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->