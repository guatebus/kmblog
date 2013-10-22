<section>
	<h2>WURFL XML Info</h2>
	<div class="content-main">
		<ul>
			<li>WURFL Version: <?php //echo $wurflInfo->version ?></li>
		</ul>
		<div>User Agent: <?php echo $ua ?></div>
		<div>
			<ul>
				<li>ID: <?php echo $requestingDevice->id; ?> </li>
				<li>Brand Name: <?php echo $requestingDevice->getCapability('brand_name'); ?> </li>
				<li>Model Name: <?php echo $requestingDevice->getCapability('model_name'); ?> </li>
				<li>Marketing Name: <?php echo $requestingDevice->getCapability('marketing_name'); ?> </li>
				<li>Preferred Markup: <?php echo $requestingDevice->getCapability('preferred_markup'); ?> </li>
				<li>Resolution Width: <?php echo $requestingDevice->getCapability('resolution_width'); ?> </li>
				<li>Resolution Height: <?php echo $requestingDevice->getCapability('resolution_height'); ?> </li>
			</ul>
		</div>
	</div>
</section>