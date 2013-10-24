<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$css_location?>table.css" media="screen  and (min-width: 40.5em)" />
<!-- JavaScript -->
<?php if(!$this->session->userdata($this->config->item('my_sess_is_handheld'))): ?>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo base_url().$js_location?>jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?php echo site_url('datatables/loaddata') ?>"
				} );
			} );
</script>
<section>
	<h2>Datatables (jQuery plugin)</h2>
	<div class="content-main">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>
				<tr>
					<th width="15%">ID</th>
					<th width="35%">Title</th>
					<th width="35%">Slug</th>
					<th width="15%">Censored</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="5" class="dataTables_empty">Loading data from server</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Slug</th>
					<th>Censored</th>
				</tr>
			</tfoot>
		</table>
	</div>
</section>