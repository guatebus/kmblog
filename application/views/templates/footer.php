<div class="footer">copyleft 2013 Alejandro Bustamante</div>
<?php if($this->session->userdata($this->config->item('my_sess_is_handheld'))): ?>
	<script type="text/javascript" src="<?php echo base_url().$js_location?>init.js"></script>
<?php endif; ?>
</body>
</html>
