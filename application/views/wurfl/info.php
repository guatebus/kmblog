<section>
	<h2>WURFL XML Info</h2>
	</br><div class="content-main">
		<div>
			<ul>
				<li>ID: <?php echo $requestingDevice->id; ?> </li>
				<li>Model Name: <?php echo $requestingDevice->getCapability('model_name'); ?> </li>
				<li>Brand Name: <?php echo $requestingDevice->getCapability('brand_name'); ?> </li>
				</br><li>Is Handheld Device: <?php echo $this->session->userdata($this->config->item('my_sess_is_handheld')) ? 'True' : 'False' ?> </li>
				</br><li>Resolution Width: <?php echo $requestingDevice->getCapability('resolution_width'); ?> </li>
				<li>Resolution Height: <?php echo $requestingDevice->getCapability('resolution_height'); ?> </li>
				</br><li>Marketing Name: <?php echo $requestingDevice->getCapability('marketing_name'); ?> </li>
				<li>Preferred Markup: <?php echo $requestingDevice->getCapability('preferred_markup'); ?> </li>
			</ul>
		</div>
		</br><div>WURFL Version: <?php echo $wurflInfo->version ?></div>
		</br><div>User Agent: <?php echo $ua ?></div>
	</div>
</section>