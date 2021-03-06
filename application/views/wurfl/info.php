<section>
	<h2>WURFL XML Info</h2>
	</br><div class="content-main">
		<div>
			<ul>
				<li><span class="bold-tag">Device ID</span>: <?php echo $requestingDevice->id; ?> </li>
				<li><span class="bold-tag">Device Model Name</span>: <?php echo $requestingDevice->getCapability('model_name'); ?> </li>
				<li><span class="bold-tag">Device Brand Name</span>: <?php echo $requestingDevice->getCapability('brand_name'); ?> </li>
				</br><li><span class="bold-tag">Device Is Handheld</span>: <?php echo $this->session->userdata($this->config->item('my_sess_is_handheld')) ? 'True' : 'False' ?> </li>
				</br><li><span class="bold-tag">Device Resolution Width</span>: <?php echo $requestingDevice->getCapability('resolution_width'); ?> </li>
				<li><span class="bold-tag">Device Resolution Height</span>: <?php echo $requestingDevice->getCapability('resolution_height'); ?> </li>
				</br><li><span class="bold-tag">Device Marketing Name</span>: <?php echo $requestingDevice->getCapability('marketing_name'); ?> </li>
				<li><span class="bold-tag">Device Preferred Markup</span>: <?php echo $requestingDevice->getCapability('preferred_markup'); ?> </li>
			</ul>
		</div>
		</br><div><span class="bold-tag">WURFL Version</span>: <?php echo $wurflInfo->version ?></div>
		</br><div><span class="bold-tag">User Agent</span>: <?php echo $ua ?></div>
		</br><div>The WURFL API is licensed under the <a href="http://www.gnu.org/licenses/agpl-3.0.html" target="_blank">GNU Affero General Public License</a>.</div>
		<div> As such, it's source files used in this website can be downloaded <a href="<?php echo base_url('files/WURFL-KMBlog.zip') ?>">here</a>.</div>
	</div>
</section>