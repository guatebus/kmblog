<div class="content-main">
	<?php echo form_open(site_url('login'), '', array('notice' => '')); ?>
		<?php echo form_fieldset('User Login', array('class' => 'fieldset-auto-width')); ?>
			
			<?php echo form_error('notice'); ?>

			<div class="textfield">
				<?php echo form_input(array('name' => 'user_name', 'value' => 'admin')); ?>
				<?php echo form_error('user_name'); ?>
			</div>

			<div class="textfield">
				<?php echo form_password(array('name' => 'user_pass', 'value' => 'password')); ?>
				<?php echo form_error('user_pass'); ?>
			</div>

			<div class="buttons">
				<?php echo form_submit(array('name' => 'login', 'class' => 'btn'), 'Login'); ?>
			</div>

		<?php echo form_fieldset_close(); ?>
	<?php echo form_close(); ?>
</div>