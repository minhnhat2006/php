<?php
/**
 * The template used for displaying page content of house
 */
?>

<div class="search-header search-header-single">
	<div class="row">
		<div class="columns">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<div class="sub-title">
				<ul>
					<li><a href="http://demo.leafthemes.com/hometown-1/property-location/miami/">TP. Hồ Chí Minh</a></li>
					<li><a href="http://demo.leafthemes.com/hometown-1/property-location/miami/">Quận 9</a></li>
					<li><a href="http://demo.leafthemes.com/hometown-1/property-type/villa/" rel="tag">Nhà ở</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div id="primary" class="content-area">

		<div class="row">
			<div class="large-8 columns">

				<div class="vspace3"></div>

				<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:900px;margin:0px auto 86px;">
			        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
						<ul class="amazingslider-slides" style="display:none;">
						<?php
						    //Get the images ids from the post_metadata
						    $images = acf_photo_gallery('image', $post->ID);
						    //Check if return array has anything in it
						    if( count($images) ):
						        //Cool, we got some data so now let's loop over it
						        foreach($images as $image):
						            $id = $image['id']; // The attachment id of the media
						            $title = $image['title']; //The title
						            $caption= $image['caption']; //The caption
						            $full_image_url= $image['full_image_url']; //Full size image url
						            //$full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
						            $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
						            $url= $image['url']; //Goto any link when clicked
						            $target= $image['target']; //Open normal or new tab
						            $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
						            $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
						?>

							<li>
								<a href="<?php echo $full_image_url; ?>" class="html5lightbox"><img src="<?php echo $full_image_url; ?>" alt="<?php echo $caption; ?>"  title="<?php echo $title; ?>" /></a>
							</li>
						<?php endforeach; endif; ?>
						</ul>

			            <ul class="amazingslider-thumbnails" style="display:none;">
			            <?php
						    //Check if return array has anything in it
						    if( count($images) ):
						        //Cool, we got some data so now let's loop over it
						        foreach($images as $image):
						            $title = $image['title']; //The title
						            $caption= $image['caption']; //The caption
						            $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
						?>

							<li><img src="<?php echo $thumbnail_image_url; ?>" alt="<?php echo $caption; ?>"  title="<?php echo $title; ?>" /></li>
						<?php endforeach; endif; ?>
			            </ul>
			        <div class="amazingslider-engine"><a href="http://amazingslider.com" title="Responsive Slider jQuery">Responsive Slider jQuery</a></div>
			        </div>
			    </div>

				<div class="vspace"></div>

				<ul class="meta-box-list">
					<li><span class="lt-icon flaticon-display6"></span> 100 ft<sup>2</sup><span class="tooltip">Area</span></li><li><i class="lt-icon flaticon-person1 big"></i> 2<span class="tooltip">Bedrooms</span></li><li><span class="lt-icon flaticon-shower5"></span> 1<span class="tooltip">Bathroom</span></li><li><i class="lt-icon flaticon-car95"></i> 1<span class="tooltip">Garage</span></li>
				</ul>

				<div class="vspace"></div>
				
				<div class="house-content">
					<?php the_content(); ?>
				</div>

				<div class="vspace"></div>
				
				<div class="vc_tta-tabs wpb_content_element property-features-tabs" data-interval="0">				
					<div class="vc_tta-tabs-container">
						<ul class="vc_tta-tabs-list">
							<li class="tab-details vc_active"><a href="#tab-details" data-vc-tabs="" data-vc-container=".vc_tta">DETAILS</a></li>
							<li class="tab-features"><a href="#tab-features" data-vc-tabs="" data-vc-container=".vc_tta">FEATURES</a></li>

							<li class="tab-location"><a href="#tab-location" data-vc-tabs="" data-vc-container=".vc_tta">LOCATION</a></li>
							<li class="tab-contact"><a href="#tab-contact" data-vc-tabs="" data-vc-container=".vc_tta">CONTACT</a></li>
						</ul>
					</div>

					<div class="vc_tta-panels-container">
						<div class="vc_tta-panels">
							<div id="tab-details" class="vc_tta-panel" data-vc-content=".vc_tta-panel-body">
								<ul class="table-list">
									<li><strong>AC</strong> <span>Ceiling Fan(s), Central</span></li>
									<li><strong>BATHROOM DESCRIPTION</strong> <span>Stall Shower</span></li>
									<li><strong>DISABILITY ACCESS</strong> <span>36 inch or more wide halls, Doors - Swing in, Entry Slope less than 1 foot, Grab Bars in Bathroom(s), Wheelchair Accessible, Wheelchair Adaptable, Wheelchair Modifications</span></li>
									<li><strong>FLOORS</strong> <span>Ceramic Tile, Wall-to-Wall Carpet</span></li>									
								</ul>
							</div>

							<div id="tab-features" class="vc_tta-panel">
								<ul class="large-block-grid-3 medium-block-grid-2 small-block-grid-1 amenity-list">
									<li class="active"><i class="flaticon-correct7"></i> Balcony</li>
									<li><i class="flaticon-cross37"></i> Bedding</li>
									<li><i class="flaticon-cross37"></i> Cable TV</li>
									<li class="active"><i class="flaticon-correct7"></i> Cleaning after Exit</li>
									<li><i class="flaticon-cross37"></i> Cofee pot</li>
									<li class="active"><i class="flaticon-correct7"></i> Cot</li>
									<li><i class="flaticon-cross37"></i> Fan</li>
									<li class="active"><i class="flaticon-correct7"></i> Fridge</li>
									<li class="active"><i class="flaticon-correct7"></i> Grill</li>
									<li class="active"><i class="flaticon-correct7"></i> Heating</li>
									<li><i class="flaticon-cross37"></i> Wifi</li>
								</ul>
							</div>

							<div id="tab-location" class="vc_tta-panel">
								<p>3029 Brickell Ave, Miami, FL 33129, USA</p>
								<div class="map-outer-wrap">
								</div>
							</div>

							<div id="tab-contact" class="vc_tta-panel vc_active">
								<div class="agent-card clearfix">
									<div class="card-head clearfix">
										<a href="http://demo.leafthemes.com/hometown-1/agent/marry-mayer/">
											<img width="150" height="150" src="http://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2014/12/a-1-150x150.jpg" class="thumb wp-post-image" alt="" srcset="http://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2014/12/a-1-150x150.jpg 150w, http://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2014/12/a-1-300x300.jpg 300w, http://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2014/12/a-1.jpg 500w" sizes="(max-width: 150px) 100vw, 150px">		</a>
										<div class="title"><a href="http://demo.leafthemes.com/hometown-1/agent/marry-mayer/">Marry Mayer</a></div>
										<div class="sub">
											<ul class="inline-list">
												<li>0831532190</li><li><a href="mailto:&amp;#109;&amp;#97;rr&amp;#121;&amp;#64;&amp;#101;&amp;#115;t&amp;#121;&amp;#46;&amp;#99;&amp;#111;&amp;#109;">marry@esty.com</a></li>			</ul>
										</div>
									</div>
								</div>

								<form method="post" class="validate-form agent-contact-form" id="agent-contact-form" novalidate="novalidate">
									<p><input type="text" name="from" placeholder="Email Address *" data-rule-required="true" data-rule-email="true" data-msg-required="Email Address is required." data-msg-email="Invalid Email address."></p>
									<p><input type="text" name="phone" placeholder="Phone Number"></p>
									<p><textarea name="message" placeholder="Message" rows="5"></textarea></p>
									<p>

									<input name="to" type="hidden" value="marry@esty.com">
									</p>

								     <script>
								       function onSubmit(token) {
								         document.getElementById("agent-contact-form").submit();
								       }
								     </script>
									 <span class="lt-button-wrap"><input type="submit" name="bt_submit" class="full-width primary lt-button g-recaptcha" value="SUBMIT" data-sitekey="6LfB2CcUAAAAAN_xLkbrLBiGcIldXQe0yo9_TqAp" data-callback="onSubmit" data-size="invisible"></span>
							 	</form>

							</div>

						</div>
					</div>
				</div>

				<div class="vspace2"></div>

				<?php echo do_shortcode('[TheChamp-Sharing]') ?>

			</div>

			<aside class="sidebar large-4 columns">
				<div class="section">
					<div id="property-compare-2" class="widget widget-property-compare">
						<div class="widget-title">PROPERTY COMPARE</div>

						<select name="compare_with" id="compare_with" value="<?php echo $_GET[ 'compare_with' ] ?>">
					      <option value="">So sánh với</option>
					      
					    </select>
						</div>

					<div id="property-search-2" class="widget widget-property-search"><div class="widget-title">PROPERTY SEARCH</div><div class="widget-body">
		<form method="get" action="http://demo.leafthemes.com/hometown-1/property-search/" class="property-search-form">



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
																</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 247px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="2" aria-labelledby="select2-s-location-82-container"><span class="select2-selection__rendered" id="select2-s-location-82-container" title="Any">Any</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
			</div>
			<div class="columns large-3 medium-4 small-6 search-status">
				<label>Property Status</label>
				<select class="select2 select2-hidden-accessible" name="s-status" tabindex="-1" aria-hidden="true">
					<option value="">Any</option>
								<option value="11">For Rent</option>
												<option value="12">For Sale</option>
											</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 247px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="3" aria-labelledby="select2-s-status-jp-container"><span class="select2-selection__rendered" id="select2-s-status-jp-container" title="Any">Any</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
			</div>
			<div class="columns large-3 medium-4 small-6 search-type">
				<label>Property Type</label>
				<select class="select2 select2-hidden-accessible" name="s-type" tabindex="-1" aria-hidden="true">
					<option value="">Any</option>
								<option value="7">Condo</option>
												<option value="16">House</option>
												<option value="21">Villa</option>
											</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 247px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="4" aria-labelledby="select2-s-type-42-container"><span class="select2-selection__rendered" id="select2-s-type-42-container" title="Any">Any</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
			</div>

			
			
			
				<div class="columns large-3 medium-6 search-price">
						<label>Price <small class="right"><span class="lower">$<span>0</span></span> - <span class="upper">$<span>30,000</span></span></small></label>
				<div class="rangeSlider noUi-target noUi-ltr noUi-horizontal noUi-background" data-min="0" data-max="30000" data-cmin="0" data-cmax="30000" data-step="10" data-margin="10" data-decimal-point="." data-thousands-sep="," data-direction="ltr"><div class="noUi-base"><div class="noUi-origin noUi-connect" style="left: 0%;"><div class="noUi-handle noUi-handle-lower"></div></div><div class="noUi-origin noUi-background" style="left: 100%;"><div class="noUi-handle noUi-handle-upper"></div></div></div></div>
				<input type="hidden" name="l-price" class="lower" value="0">
				<input type="hidden" name="u-price" class="upper" value="30000">
			</div>
			
				<div class="columns large-3 medium-6 search-area">
						<label>Area <small class="right"><span class="lower"><span>0</span> ft<sup>2</sup></span> - <span class="upper"><span>200</span> ft<sup>2</sup></span> </small></label>
				<div class="rangeSlider noUi-target noUi-ltr noUi-horizontal noUi-background" data-min="0" data-max="200" data-cmin="0" data-cmax="200" data-step="10" data-margin="10" data-decimal-point="." data-thousands-sep="," data-direction="ltr"><div class="noUi-base"><div class="noUi-origin noUi-connect" style="left: 0%;"><div class="noUi-handle noUi-handle-lower"></div></div><div class="noUi-origin noUi-background" style="left: 100%;"><div class="noUi-handle noUi-handle-upper"></div></div></div></div>
				<input type="hidden" name="l-area" class="lower" value="0">
				<input type="hidden" name="u-area" class="upper" value="200">
			</div>
			
			<div class="columns large-2 search-submit">
				<label class="hidden">SEARCH</label>
				<span class="lt-button-wrap"><input type="submit" value="SEARCH" class="lt-button primary"></span>
			</div>
		</div>
		</form>

		</div></div><div id="property-2" class="widget widget-property"><div class="widget-title">LATEST PROPERTY</div><ul><li><a href="http://demo.leafthemes.com/hometown-1/property/1450-cloudcroft-drop/"><img src="http://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-14-150x150.jpg"></a><a href="http://demo.leafthemes.com/hometown-1/property/1450-cloudcroft-drop/">1450 Cloudcroft Drop</a><span class="price">$<span>10,000</span> <small>/month</small></span></li><li><a href="http://demo.leafthemes.com/hometown-1/property/1200-cloudcroft-drop/"><img src="http://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-13-150x150.jpg"></a><a href="http://demo.leafthemes.com/hometown-1/property/1200-cloudcroft-drop/">420 Mountain View</a><span class="price">$<span>10,000</span> <small>/month</small></span></li><li><a href="http://demo.leafthemes.com/hometown-1/property/1540-cloudcroft-drop/"><img src="http://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-12-150x150.jpg"></a><a href="http://demo.leafthemes.com/hometown-1/property/1540-cloudcroft-drop/">1540 Green Vile</a><span class="price">$<span>10,000</span></span></li><li><a href="http://demo.leafthemes.com/hometown-1/property/1523-cloudcroft-drop/"><img src="http://demo.leafthemes.com/hometown-1/wp-content/uploads/sites/3/2015/01/p-11-150x150.jpg"></a><a href="http://demo.leafthemes.com/hometown-1/property/1523-cloudcroft-drop/">1523 Lake House</a><span class="price">$<span>10,000</span> <small>/month</small></span></li></ul></div>		</div>
			</aside>
		</div>

	</div><!-- .row -->

</article><!-- #post-## -->