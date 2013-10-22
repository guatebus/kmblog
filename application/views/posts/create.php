<div class="content-main">
	<?php echo form_open(site_url('posts/create')); ?>
		<?php echo form_fieldset('Create a Blog Post', array('class' => 'fieldset-auto-width')); ?>

			<div class="textfield">
				<?php //echo form_label('Title', 'title'); ?>
				<?php echo form_input(array('name' => 'title', 'value' => set_value('title'), 'placeholder' => 'Title')); ?>
				<?php echo form_error('title'); ?>
			</div>

			<div class="textfield">
				<?php //echo form_label('Content', 'content'); ?>
				<?php echo form_textarea(array('name' => 'content', 'value' => set_value('content'), 'placeholder' => 'Content')); ?>
				<?php echo form_error('content'); ?>
			</div>

			<div class="buttons">
				<?php echo form_submit(array('name' => 'submit', 'class' => 'btn'), 'Create blog post'); ?>
			</div>

		<?php echo form_fieldset_close(); ?>
	<?php echo form_close(); ?>
<div>