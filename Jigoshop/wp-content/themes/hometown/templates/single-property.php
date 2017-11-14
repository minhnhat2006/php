<div class="section-title  element-dark" style="background-color:#f5f5f5; background-image: url(<?php echo get_theme_file_uri('/assets/img/title-bg.jpg') ?>); background-size:cover;">
	<div class="row">
		<div class="columns">
			<h1 class="page-title"><?php echo get_the_title(); ?></h1>
			<div class="sub-title">
				<ul>
					<?php
					$location = get_field('location');
					if(!empty($location)) {
						$addresses = preg_split('/,/', $location['address'], -1, PREG_SPLIT_NO_EMPTY);
						foreach ($addresses as $idx => $address) {
							if ($idx == sizeof($addresses) - 1) {
								continue;
							}
							?>
							<li><a href="<?php echo site_url('/property-location/' . slugify($address)); ?>" rel="tag"><?php echo $address; ?></a></li>
							<?php
						}
					} else {
						?>
						<li><a href="<?php echo site_url('/property-location/' . slugify($address)); ?>" rel="tag">&nbsp;</a></li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="main-content">
	<div class="row">
		<div class="large-8 columns">
			<div class="section">

				<?php include( get_template_directory() . '/template-parts/property-item-slider.php' ); ?>

				<ul class="meta-box-list">
					<li><?php echo get_field('id'); ?><span class="tooltip">ID</span>
					</li>
					<li>
						<span class="lt-icon flaticon-display6">
						</span> <?php echo get_field('area'); ?> ft<sup>2</sup>
						<span class="tooltip">Area</span>
					</li>
					<li>
						<i class="lt-icon flaticon-person1 big">
						</i> <?php echo get_field('bedrooms'); ?><span class="tooltip">Bedrooms</span>
					</li>
					<li>
						<span class="lt-icon flaticon-shower5">
						</span> <?php echo get_field('bathrooms'); ?><span class="tooltip">Bathroom</span>
					</li>
					<li>
						<i class="lt-icon flaticon-car95">
						</i> <?php echo get_field('garage'); ?><span class="tooltip">Garage</span>
					</li>
				</ul>

				<div class="vspace"></div>

				<?php echo get_the_content('garage'); ?>

				<div class="vspace"></div><div class="vspace"></div>

				<div class="vc_tta-tabs wpb_content_element property-features-tabs" data-interval="0">
					<div class="vc_tta-tabs-container">
						<ul class="vc_tta-tabs-list">
							<li class="tab-details vc_active">
								<a href="#tab-details" data-vc-tabs="" data-vc-container=".vc_tta">DETAILS</a>
							</li>
							<li class="tab-features">
								<a href="#tab-features" data-vc-tabs="" data-vc-container=".vc_tta">FEATURES</a>
							</li>
							<li class="tab-location">
								<a href="#tab-location" data-vc-tabs="" data-vc-container=".vc_tta">LOCATION</a>
							</li>
							<li class="tab-contact">
								<a href="#tab-contact" data-vc-tabs="" data-vc-container=".vc_tta">CONTACT</a>
							</li>
						</ul>
					</div>
					<div class="vc_tta-panels-container">
						<div class="vc_tta-panels">
							<div id="tab-details" class="vc_tta-panel vc_active" data-vc-content=".vc_tta-panel-body">
								<ul class="table-list">
									<li>
										<strong>AC</strong>
										<span>Ceiling Fan(s), Central</span>
									</li>
									<li>
										<strong>BATHROOM DESCRIPTION</strong>
										<span>Stall Shower</span>
									</li>
									<li>
										<strong>DISABILITY ACCESS</strong>
										<span>36 inch or more wide halls, Doors - Swing in, Entry Slope less than 1 foot, Grab Bars in Bathroom(s), Wheelchair Accessible, Wheelchair Adaptable, Wheelchair Modifications</span>
									</li>
									<li>
										<strong>FLOORS</strong>
										<span>Ceramic Tile, Wall-to-Wall Carpet</span>
									</li>
								</ul>
							</div>
							<div id="tab-features" class="vc_tta-panel">
								<ul class="large-block-grid-3 medium-block-grid-2 small-block-grid-1 amenity-list">
									<li class="active">
										<i class="flaticon-correct7">
										</i> Balcony</li>
										<li>
											<i class="flaticon-cross37">
											</i> Bedding</li>
											<li>
												<i class="flaticon-cross37">
												</i> Cable TV</li>
												<li class="active">
													<i class="flaticon-correct7">
													</i> Cleaning after Exit</li>
													<li>
														<i class="flaticon-cross37">
														</i> Cofee pot</li>
														<li class="active">
															<i class="flaticon-correct7">
															</i> Cot</li>
															<li>
																<i class="flaticon-cross37">
																</i> Fan</li>
																<li class="active">
																	<i class="flaticon-correct7">
																	</i> Fridge</li>
																	<li class="active">
																		<i class="flaticon-correct7">
																		</i> Grill</li>
																		<li class="active">
																			<i class="flaticon-correct7">
																			</i> Heating</li>
																			<li>
																				<i class="flaticon-cross37">
																				</i> Wifi</li>
																			</ul>
																		</div>
																		<div id="tab-location" class="vc_tta-panel">
																			<p>1237 Brickell Ave, Miami, FL 33131, USA</p>
																			<div class="map-outer-wrap">
																				<div class="map-wrap" data-zoom="15" style="height: 500px; position: relative; overflow: hidden;" data-latitude="25.7616798" data-longitude="-80.19179020000001" data-style="bw" id="map-25">
																					<div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
																						<div class="" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
																							<div tabindex="0" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;">
																								<div style="z-index: 1; position: absolute; top: 0px; left: 0px; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);">
																									<div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
																										<div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
																											<div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;">
																												<div style="width: 256px; height: 256px; position: absolute; left: 120px; top: 29px;">
																												</div>
																												<div style="width: 256px; height: 256px; position: absolute; left: -136px; top: 29px;">
																												</div>
																												<div style="width: 256px; height: 256px; position: absolute; left: 120px; top: -227px;">
																												</div>
																												<div style="width: 256px; height: 256px; position: absolute; left: 120px; top: 285px;">
																												</div>
																												<div style="width: 256px; height: 256px; position: absolute; left: 376px; top: 29px;">
																												</div>
																												<div style="width: 256px; height: 256px; position: absolute; left: -136px; top: -227px;">
																												</div>
																												<div style="width: 256px; height: 256px; position: absolute; left: -136px; top: 285px;">
																												</div>
																												<div style="width: 256px; height: 256px; position: absolute; left: 376px; top: -227px;">
																												</div>
																												<div style="width: 256px; height: 256px; position: absolute; left: 376px; top: 285px;">
																												</div>
																											</div>
																										</div>
																									</div>
																									<div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;">
																									</div>
																									<div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;">
																									</div>
																									<div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
																									</div>
																									<div style="position: absolute; z-index: 0; left: 0px; top: 0px;">
																										<div style="overflow: hidden;">
																										</div>
																									</div>
																									<div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
																										<div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;">
																											<div style="position: absolute; left: 120px; top: 29px; transition: opacity 200ms ease-out;">
																												<img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i9084!3i13955!4i256!2m3!1e0!2sm!3i399096185!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2sp.s%3A-100!4e0&amp;token=60578" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																											</div>
																											<div style="position: absolute; left: -136px; top: 29px; transition: opacity 200ms ease-out;">
																												<img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i9083!3i13955!4i256!2m3!1e0!2sm!3i399096185!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2sp.s%3A-100!4e0&amp;token=68171" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																											</div>
																											<div style="position: absolute; left: 120px; top: -227px; transition: opacity 200ms ease-out;">
																												<img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i9084!3i13954!4i256!2m3!1e0!2sm!3i399096185!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2sp.s%3A-100!4e0&amp;token=50310" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																											</div>
																											<div style="position: absolute; left: 120px; top: 285px; transition: opacity 200ms ease-out;">
																												<img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i9084!3i13956!4i256!2m3!1e0!2sm!3i399096185!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2sp.s%3A-100!4e0&amp;token=70846" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																											</div>
																											<div style="position: absolute; left: 376px; top: 29px; transition: opacity 200ms ease-out;">
																												<img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i9085!3i13955!4i256!2m3!1e0!2sm!3i399096173!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2sp.s%3A-100!4e0&amp;token=68721" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																											</div>
																											<div style="position: absolute; left: -136px; top: -227px; transition: opacity 200ms ease-out;">
																												<img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i9083!3i13954!4i256!2m3!1e0!2sm!3i399096185!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2sp.s%3A-100!4e0&amp;token=57903" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																											</div>
																											<div style="position: absolute; left: -136px; top: 285px; transition: opacity 200ms ease-out;">
																												<img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i9083!3i13956!4i256!2m3!1e0!2sm!3i399096185!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2sp.s%3A-100!4e0&amp;token=78439" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																											</div>
																											<div style="position: absolute; left: 376px; top: -227px; transition: opacity 200ms ease-out;">
																												<img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i9085!3i13954!4i256!2m3!1e0!2sm!3i399096173!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2sp.s%3A-100!4e0&amp;token=58453" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																											</div>
																											<div style="position: absolute; left: 376px; top: 285px; transition: opacity 200ms ease-out;">
																												<img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i9085!3i13956!4i256!2m3!1e0!2sm!3i399096173!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2sp.s%3A-100!4e0&amp;token=78989" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																											</div>
																										</div>
																									</div>
																								</div>
																								<div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;">
																									<p class="gm-style-pbt">
																									</p>
																								</div>
																								<div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;">
																									<div style="z-index: 1; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;">
																									</div>
																								</div>
																								<div style="z-index: 4; position: absolute; top: 0px; left: 0px; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);">
																									<div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;">
																										<div style="position: absolute; top: 231.811px; left: 297.853px;">
																											<div>
																												<div class="marker center-marker" data-lat="25.7616798" data-lng="-80.19179020000001">
																													<div class="dot">
																													</div>
																												</div>
																											</div>
																										</div>
																									</div>
																									<div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;">
																									</div>
																									<div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
																										<div class="cluster">
																										</div>
																									</div>
																									<div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;">
																									</div>
																								</div>
																							</div>
																							<div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
																								<a target="_blank" href="https://maps.google.com/maps?ll=25.76168,-80.19179&amp;z=15&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;">
																									<div style="width: 66px; height: 26px; cursor: pointer;">
																										<img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_white5.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
																									</div>
																								</a>
																							</div>
																							<div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 166px; top: 160px;">
																								<div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div>
																								<div style="font-size: 13px;">Map data ©2017 Google</div>
																								<div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;">
																									<img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																								</div>
																							</div>
																							<div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 0px; bottom: 0px; width: 12px;">
																								<div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;">
																									<div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
																										<div style="width: 1px;">
																										</div>
																										<div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
																										</div>
																									</div>
																									<div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
																										<a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a>
																										<span style="">Map data ©2017 Google</span>
																									</div>
																								</div>
																							</div>
																							<div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;">
																								<div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2017 Google</div>
																							</div>
																							<div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;">
																								<div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
																									<div style="width: 1px;">
																									</div>
																									<div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
																									</div>
																								</div>
																								<div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
																									<a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a>
																								</div>
																							</div>
																							<button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" style="background: none; border: 0px; margin: 10px 14px; padding: 0px; position: absolute; cursor: pointer; user-select: none; width: 25px; height: 25px; overflow: hidden; top: 0px; right: 0px;">
																								<img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/sv9.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 175px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
																							</button>
																							<div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;">
																								<div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
																									<div style="width: 1px;">
																									</div>
																									<div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
																									</div>
																								</div>
																								<div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
																									<a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@25.7616798,-80.1917902,15z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a>
																								</div>
																							</div>
																							<div class="gmnoprint gm-bundled-control" draggable="false" controlwidth="28" controlheight="55" style="margin: 10px; user-select: none; position: absolute; top: 45px; right: 28px;">
																								<div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 0px;">
																									<div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 28px; height: 55px;">
																										<button draggable="false" title="Zoom in" aria-label="Zoom in" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;">
																											<div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;">
																												<img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;">
																											</div>
																										</button>
																										<div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230); top: 0px;">
																										</div>
																										<button draggable="false" title="Zoom out" aria-label="Zoom out" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;">
																											<div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;">
																												<img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;">
																											</div>
																										</button>
																									</div>
																								</div>
																							</div>
																							<div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="0" controlheight="0" style="margin: 10px; user-select: none; position: absolute; display: none; bottom: 0px; right: 0px;">
																								<div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;">
																									<div title="Rotate map 90 degrees" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; cursor: pointer; background-color: rgb(255, 255, 255); display: none;">
																										<img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																									</div>
																									<div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);">
																										<img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																				<a href="https://www.google.com/maps/?q=25.7616798,-80.19179020000001&amp;z=10" rel="no-follow" class="overlay-link" target="_blank">View on Google Map</a>
																			</div>
																		</div>
																		<div id="tab-contact" class="vc_tta-panel">
																			<div class="agent-card clearfix">
																				<div class="card-head clearfix">
																					<a href="https://demo.leafthemes.com/hometown-1/agent/john-doe/">
																						<img width="150" height="150" src="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2014/12/a-2-150x150.jpg" class="thumb wp-post-image" alt="" srcset="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2014/12/a-2-150x150.jpg 150w, https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2014/12/a-2-300x300.jpg 300w, https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2014/12/a-2.jpg 500w" sizes="(max-width: 150px) 100vw, 150px">
																					</a>
																					<div class="title">
																						<a href="https://demo.leafthemes.com/hometown-1/agent/john-doe/">John Doe</a>
																					</div>
																					<div class="sub">
																						<ul class="inline-list">
																							<li>0831532190</li>
																							<li>
																								<a href="mailto:john@esty.com">john@esty.com</a>
																							</li>
																						</ul>
																					</div>
																				</div>
																			</div>
																			<form method="post" class="validate-form agent-contact-form" id="agent-contact-form" novalidate="novalidate">
																				<p>
																					<input type="text" name="from" placeholder="Email Address *" data-rule-required="true" data-rule-email="true" data-msg-required="Email Address is required." data-msg-email="Invalid Email address.">
																				</p>
																				<p>
																					<input type="text" name="phone" placeholder="Phone Number">
																				</p>
																				<p>
																					<textarea name="message" placeholder="Message" rows="5">
																					</textarea>
																				</p>
																				<p>
																					<input name="to" type="hidden" value="john@esty.com">
																				</p>
																				<div class="form-response">
																				</div>

																				<script>function onSubmit(token) {
																					document.getElementById("agent-contact-form").submit();
																				}</script>
																				<span class="lt-button-wrap">
																					<div>
																						<div class="grecaptcha-badge" style="width: 256px; height: 60px; transition: right 0.3s ease; position: fixed; bottom: 14px; right: -186px; box-shadow: gray 0px 0px 5px;">
																							<div class="grecaptcha-logo">
																								<iframe src="https://www.google.com/recaptcha/api2/anchor?k=6LfB2CcUAAAAAN_xLkbrLBiGcIldXQe0yo9_TqAp&amp;co=aHR0cHM6Ly9kZW1vLmxlYWZ0aGVtZXMuY29tOjQ0Mw..&amp;hl=en&amp;v=r20171109115411&amp;size=invisible&amp;cb=jtbnq4yg660m" width="256" height="60" role="presentation" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox">
																								</iframe>
																							</div>
																							<div class="grecaptcha-error">
																							</div>
																							<textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; ">
																							</textarea>
																						</div>
																					</div>
																					<input type="submit" name="bt_submit" class="full-width primary lt-button g-recaptcha" value="SUBMIT" data-sitekey="6LfB2CcUAAAAAN_xLkbrLBiGcIldXQe0yo9_TqAp" data-callback="onSubmit" data-size="invisible">
																				</span>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
															<div class="share-box clearfix jssocials">
																<div class="jssocials-shares">
																	<div class="jssocials-share jssocials-share-facebook">
																		<a target="_blank" href="https://facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdemo.leafthemes.com%2Fhometown-1%2Fproperty%2F1523-cloudcroft-drop%2F" class="jssocials-share-link">
																			<i class="nt-icon-facebook jssocials-share-logo">
																			</i>
																		</a>
																		<div class="jssocials-share-count-box jssocials-share-no-count">
																			<span class="jssocials-share-count">
																			</span>
																		</div>
																	</div>
																	<div class="jssocials-share jssocials-share-twitter">
																		<a target="_blank" href="https://twitter.com/share?url=https%3A%2F%2Fdemo.leafthemes.com%2Fhometown-1%2Fproperty%2F1523-cloudcroft-drop%2F&amp;text=1523%20Lake%20House%20%7C%20Hometown%20%231" class="jssocials-share-link">
																			<i class="nt-icon-twitter jssocials-share-logo">
																			</i>
																		</a>
																		<div class="jssocials-share-count-box jssocials-share-no-count">
																			<span class="jssocials-share-count">
																			</span>
																		</div>
																	</div>
																	<div class="jssocials-share jssocials-share-googleplus">
																		<a target="_blank" href="https://plus.google.com/share?url=https%3A%2F%2Fdemo.leafthemes.com%2Fhometown-1%2Fproperty%2F1523-cloudcroft-drop%2F" class="jssocials-share-link">
																			<i class="nt-icon-gplus jssocials-share-logo">
																			</i>
																		</a>
																		<div class="jssocials-share-count-box jssocials-share-no-count">
																			<span class="jssocials-share-count">
																			</span>
																		</div>
																	</div>
																	<div class="jssocials-share jssocials-share-pinterest">
																		<a target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?&amp;url=https%3A%2F%2Fdemo.leafthemes.com%2Fhometown-1%2Fproperty%2F1523-cloudcroft-drop%2F&amp;description=1523%20Lake%20House%20%7C%20Hometown%20%231" class="jssocials-share-link">
																			<i class="nt-icon-pinterest-circled jssocials-share-logo">
																			</i>
																		</a>
																		<div class="jssocials-share-count-box jssocials-share-no-count">
																			<span class="jssocials-share-count">
																			</span>
																		</div>
																	</div>
																	<div class="jssocials-share jssocials-share-email">
																		<a target="_self" href="mailto:?subject=1523%20Lake%20House%20%7C%20Hometown%20%231&amp;body=https%3A%2F%2Fdemo.leafthemes.com%2Fhometown-1%2Fproperty%2F1523-cloudcroft-drop%2F" class="jssocials-share-link">
																			<i class="nt-icon-mail-alt jssocials-share-logo">
																			</i>
																		</a>
																		<div class="jssocials-share-count-box jssocials-share-no-count">
																			<span class="jssocials-share-count">
																			</span>
																		</div>
																	</div>
																	<div class="jssocials-share jssocials-share-print">
																		<a target="_blank" href="javascript:window.print()" class="jssocials-share-link">
																			<i class="nt-icon-doc-inv jssocials-share-logo">
																			</i>
																		</a>
																		<div class="jssocials-share-count-box jssocials-share-no-count">
																			<span class="jssocials-share-count">
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<aside class="sidebar large-4 columns">
														<div class="section">
															<div id="property-compare-2" class="widget widget-property-compare">
																<div class="widget-title">PROPERTY COMPARE</div>
																<form action="" method="get" class="compare-form">
																	<select name="compare-with" class="property-select2 select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
																		<option value="" selected="">Compare with</option>
																		<option data-img="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-14.jpg" value="39">1450 Cloudcroft Drop</option>
																		<option data-img="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-13.jpg" value="416">420 Mountain View</option>
																		<option data-img="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-12.jpg" value="417">1540 Green Vile</option>
																		<option data-img="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-10.jpg" value="159">4321 Clear Sky</option>
																		<option data-img="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-9.jpg" value="146">140 Small Town</option>
																	</select>
																	<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 297px;">
																		<span class="selection">
																			<span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-compare-with-r1-container">
																				<span class="select2-selection__rendered" id="select2-compare-with-r1-container" title="Compare with">Compare with</span>
																				<span class="select2-selection__arrow" role="presentation">
																					<b role="presentation">
																					</b>
																				</span>
																			</span>
																		</span>
																		<span class="dropdown-wrapper" aria-hidden="true">
																		</span>
																	</span>
																</form>
															</div>
															<div id="property-search-2" class="widget widget-property-search">
																<div class="widget-title">PROPERTY SEARCH</div>
																<div class="widget-body">
																	<form method="get" action="https://demo.leafthemes.com/hometown-1/property-search/" class="property-search-form">
																		<input type="hidden" name="property-search" value="true">
																		<div class="row">
																			<div class="columns large-4 medium-4 search-location">
																				<label>Property Location</label>
																				<select class="select2 select2-hidden-accessible" name="s-location" tabindex="-1" aria-hidden="true">
																					<option value="">Any</option>
																					<option value="17">Miami</option>
																					<option value="23">- Little Havana</option>
																					<option value="18">Palo Alto</option>
																					<option value="24">- Pacific Coast</option>
																					<option value="19">- Santa Monica</option>
																				</select>
																				<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 247px;">
																					<span class="selection">
																						<span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="2" aria-labelledby="select2-s-location-ik-container">
																							<span class="select2-selection__rendered" id="select2-s-location-ik-container" title="Any">Any</span>
																							<span class="select2-selection__arrow" role="presentation">
																								<b role="presentation">
																								</b>
																							</span>
																						</span>
																					</span>
																					<span class="dropdown-wrapper" aria-hidden="true">
																					</span>
																				</span>
																			</div>
																			<div class="columns large-3 medium-4 small-6 search-status">
																				<label>Property Status</label>
																				<select class="select2 select2-hidden-accessible" name="s-status" tabindex="-1" aria-hidden="true">
																					<option value="">Any</option>
																					<option value="11">For Rent</option>
																					<option value="12">For Sale</option>
																				</select>
																				<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 247px;">
																					<span class="selection">
																						<span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="3" aria-labelledby="select2-s-status-5h-container">
																							<span class="select2-selection__rendered" id="select2-s-status-5h-container" title="Any">Any</span>
																							<span class="select2-selection__arrow" role="presentation">
																								<b role="presentation">
																								</b>
																							</span>
																						</span>
																					</span>
																					<span class="dropdown-wrapper" aria-hidden="true">
																					</span>
																				</span>
																			</div>
																			<div class="columns large-3 medium-4 small-6 search-type">
																				<label>Property Type</label>
																				<select class="select2 select2-hidden-accessible" name="s-type" tabindex="-1" aria-hidden="true">
																					<option value="">Any</option>
																					<option value="7">Condo</option>
																					<option value="16">House</option>
																					<option value="21">Villa</option>
																				</select>
																				<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 247px;">
																					<span class="selection">
																						<span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="4" aria-labelledby="select2-s-type-xn-container">
																							<span class="select2-selection__rendered" id="select2-s-type-xn-container" title="Any">Any</span>
																							<span class="select2-selection__arrow" role="presentation">
																								<b role="presentation">
																								</b>
																							</span>
																						</span>
																					</span>
																					<span class="dropdown-wrapper" aria-hidden="true">
																					</span>
																				</span>
																			</div>
																			<div class="columns large-3 medium-6 search-price">
																				<label>Price <small class="right">
																					<span class="lower">$<span>0</span>
																				</span> - <span class="upper">$<span>30,000</span>
																			</span>
																		</small>
																	</label>
																	<div class="rangeSlider noUi-target noUi-ltr noUi-horizontal noUi-background" data-min="0" data-max="30000" data-cmin="0" data-cmax="30000" data-step="10" data-margin="10" data-decimal-point="." data-thousands-sep="," data-direction="ltr">
																		<div class="noUi-base">
																			<div class="noUi-origin noUi-connect" style="left: 0%;">
																				<div class="noUi-handle noUi-handle-lower">
																				</div>
																			</div>
																			<div class="noUi-origin noUi-background" style="left: 100%;">
																				<div class="noUi-handle noUi-handle-upper">
																				</div>
																			</div>
																		</div>
																	</div>
																	<input type="hidden" name="l-price" class="lower" value="0">
																	<input type="hidden" name="u-price" class="upper" value="30000">
																</div>
																<div class="columns large-3 medium-6 search-area">
																	<label>Area <small class="right">
																		<span class="lower">
																			<span>0</span> ft<sup>2</sup>
																		</span> - <span class="upper">
																			<span>200</span> ft<sup>2</sup>
																		</span>
																	</small>
																</label>
																<div class="rangeSlider noUi-target noUi-ltr noUi-horizontal noUi-background" data-min="0" data-max="200" data-cmin="0" data-cmax="200" data-step="10" data-margin="10" data-decimal-point="." data-thousands-sep="," data-direction="ltr">
																	<div class="noUi-base">
																		<div class="noUi-origin noUi-connect" style="left: 0%;">
																			<div class="noUi-handle noUi-handle-lower">
																			</div>
																		</div>
																		<div class="noUi-origin noUi-background" style="left: 100%;">
																			<div class="noUi-handle noUi-handle-upper">
																			</div>
																		</div>
																	</div>
																</div>
																<input type="hidden" name="l-area" class="lower" value="0">
																<input type="hidden" name="u-area" class="upper" value="200">
															</div>
															<div class="columns large-2 search-submit">
																<label class="hidden">SEARCH</label>
																<span class="lt-button-wrap">
																	<input type="submit" value="SEARCH" class="lt-button primary">
																</span>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div id="property-2" class="widget widget-property">
												<div class="widget-title">LATEST PROPERTY</div>
												<ul>
													<li>
														<a href="https://demo.leafthemes.com/hometown-1/property/1450-cloudcroft-drop/">
															<img src="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-14-150x150.jpg">
														</a>
														<a href="https://demo.leafthemes.com/hometown-1/property/1450-cloudcroft-drop/">1450 Cloudcroft Drop</a>
														<span class="price">$<span>10,000</span>
														<small>/month</small>
													</span>
												</li>
												<li>
													<a href="https://demo.leafthemes.com/hometown-1/property/1200-cloudcroft-drop/">
														<img src="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-13-150x150.jpg">
													</a>
													<a href="https://demo.leafthemes.com/hometown-1/property/1200-cloudcroft-drop/">420 Mountain View</a>
													<span class="price">$<span>10,000</span>
													<small>/month</small>
												</span>
											</li>
											<li>
												<a href="https://demo.leafthemes.com/hometown-1/property/1540-cloudcroft-drop/">
													<img src="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-12-150x150.jpg">
												</a>
												<a href="https://demo.leafthemes.com/hometown-1/property/1540-cloudcroft-drop/">1540 Green Vile</a>
												<span class="price">$<span>10,000</span>
											</span>
										</li>
										<li>
											<a href="https://demo.leafthemes.com/hometown-1/property/1523-cloudcroft-drop/">
												<img src="https://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-11-150x150.jpg">
											</a>
											<a href="https://demo.leafthemes.com/hometown-1/property/1523-cloudcroft-drop/">1523 Lake House</a>
											<span class="price">$<span>10,000</span>
											<small>/month</small>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</aside>
				</div>
			</div>