<section>
	<h2>WURFL XML Info</h2>
	</br><div class="content-main">
		<div>
			<ul>
				<li><span class="bold-tag">ID</span>: <?php echo $requestingDevice->id; ?> </li>
				<li><span class="bold-tag">Model Name</span>: <?php echo $requestingDevice->getCapability('model_name'); ?> </li>
				<li><span class="bold-tag">Brand Name</span>: <?php echo $requestingDevice->getCapability('brand_name'); ?> </li>
				</br><li><span class="bold-tag">Is Handheld Device</span>: <?php echo $this->session->userdata($this->config->item('my_sess_is_handheld')) ? 'True' : 'False' ?> </li>
				</br><li><span class="bold-tag">Resolution Width</span>: <?php echo $requestingDevice->getCapability('resolution_width'); ?> </li>
				<li><span class="bold-tag">Resolution Height</span>: <?php echo $requestingDevice->getCapability('resolution_height'); ?> </li>
				</br><li><span class="bold-tag">Marketing Name</span>: <?php echo $requestingDevice->getCapability('marketing_name'); ?> </li>
				<li><span class="bold-tag">Preferred Markup</span>: <?php echo $requestingDevice->getCapability('preferred_markup'); ?> </li>
			</ul>
		</div>
		</br><div><span class="bold-tag">WURFL Version</span>: <?php echo $wurflInfo->version ?></div>
		</br><div><span class="bold-tag">User Agent</span>: <?php echo $ua ?></div>
	</div>
</section>