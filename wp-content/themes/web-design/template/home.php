<?php
/**
 * Template Name: Home-Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web_design
 */

get_header(); ?>


<?php // Check value exists.
if (have_rows("hero_section")):
    // Loop through rows.
    while (have_rows("hero_section")):
        the_row();

        // Case: Paragraph layout.
        if (get_row_layout() == "banner_section"):

            $sub_title = get_sub_field("sub_title");
            $banner_title = get_sub_field("banner_title");
            $banner_description = get_sub_field("banner_description");
            $banner_btn = get_sub_field("banner_btn");

            // Do something...
            ?>
            <section class="banner-section container">
	<div class="row">
		<div class="banner">
			<span><?php echo $sub_title; ?></span>
			<h1><?php echo $banner_title; ?></h1>
			<p><?php echo $banner_description; ?></p>
			<div class="btn">
				<?php foreach ($banner_btn as $btn) { ?>
					<a href="<?php echo $btn["banner_link"]["url"]; ?>" title="<?php echo $btn[
    "banner_link"
]["title"]; ?>"><?php echo $btn["banner_link"]["title"]; ?></a>
					<?php } ?>
			</div>
				
			</div>
		</div>
</section>
            <?php

            // Case: Download layout.


        elseif (get_row_layout() == "banner_two"):

            $hero_img = get_sub_field("hero_img");
            $hero_title = get_sub_field("hero_title");
            $hero_description = get_sub_field("hero_description");
            $description_two = get_sub_field("description_two");
            $progress_bar = get_sub_field("progress_bar");
            ?>
            <section class="container hero-section">
	<div class="row">
		<div class="bg-flex">
			<div class="bg-left">
				<img src="<?php echo $hero_img; ?>" alt="">
			</div>
			<div class="bg-right">
				<h2><?php echo $hero_title; ?></h2>
				<p><?php echo $hero_description; ?></p>
				<span><?php echo $description_two; ?></span>
				<div class="skill-container">
					<?php
					foreach ($progress_bar as $progress) {
						?>
						<div class="skill-item">
						    <label class="label"><?php echo $progress['progress_label']; ?></label>
						    <div class="progress-bar"><div class="fill" style="width: <?php echo $progress['progress_number']; ?>%;"></div></div>
						  </div>
						<?php
					}
					?>
</div>
			</div> 
		</div>
		</div>
	</div>
</section>
            <?php
        elseif (get_row_layout() == "secvice-section"):

            $service_title = get_sub_field("service_title");
            $service_sub_title = get_sub_field("service_sub_title");
            $service_description = get_sub_field("service_description");
            $service_box = get_sub_field("service_box");
            ?>
            	<section class="container secvice-section">
	<div class="row">
		<div class="title-box">
			 <h2><?php echo $service_title; ?></h2>
			 <h3><?php echo $service_sub_title; ?></h3>
			 <p><?php echo $service_description; ?></p>
		</div>
		<div class="box-section">
			<?php foreach ($service_box as $box_date) {

       $box_img = $box_date["box_img"];
       $box_title = $box_date["box_title"];
       $box_description = $box_date["box_description"];
       $box_sub_img = $box_date["box_sub_img"];
       ?>
			 	<div class="box">
				<div class="space">
					<div class="box-left">
					<img src="<?php echo $box_img; ?>" alt="">
					<img src="<?php echo $box_sub_img; ?>" alt="">
				</div>
				<div class="box-right">
					<h4><?php echo $box_title; ?></h4>
					<P><?php echo $box_description; ?></P>
				</div>
				</div>
			</div>
			 	<?php
   } ?>
		</div>
	</div>	
</section>
            	<?php
        elseif (get_row_layout() == "tabing_section"):

            $tab_title = get_sub_field("tab_title");
            $tab_sub_title = get_sub_field("tab_sub_title");
            $tab_description = get_sub_field("tab_description");
            $tabing = get_sub_field("tabing");
            ?>
	          <section class="container resume-section">
	<div class="row">
		<div class="title-box">
			<h2><?php echo $tab_title; ?></h2>
			<h3><?php echo $tab_sub_title; ?></h3>
			<p><?php echo $tab_description; ?></p>
		</div>
		<div class="tab">
			<ul>
				<?php
    $i = 1;
    foreach ($tabing as $tab) {
        $tab_head = $tab["tab_head"]; ?>
					<li><a href="#tab<?php echo $i; ?>" title="Educations"><?php echo $tab_head; ?></a></li>
					<?php $i++;
    }
    ?>
			</ul>
		</div>
		<div class="tab-flex">
			<?php
   $i = 1;
   foreach ($tabing as $tab) {
       $tab_box = $tab["tab_box"]; ?>
				<div class="tab-content" id="tab<?php echo $i; ?>">
					<?php foreach ($tab_box as $date) {

         $tab_img = $date["tab_img"];
         $tab_img_two = $date["tab_img_two"];
         $title_one = $date["title_one"];
         $title_two = $date["title_two"];
         $tab_content = $date["tab_content"];
         ?>
					 	<div class="tab-first">
					<div class="f-tab">
						<div class="tab-img">
							<img src="<?php echo $tab_img; ?>" alt="">
							<img src="<?php echo $tab_img_two; ?>" alt="">
						</div>
						<h4><?php echo $title_one; ?></h4>
						<span><?php echo $title_two; ?></span>
						<p><?php echo $tab_content; ?></p>
					</div>
				</div>
					 	<?php
     } ?>
				</div>
				<?php $i++;
   }
   ?>
			</div>
		</div>
	</div>
</section>
	          <?php
        elseif (get_row_layout() == "counter_section"):

            $counter_title = get_sub_field("counter_title");
            $counter = get_sub_field("counter");
            ?>
	  <section class="container counter-section">
	<div class="row">
		<h2><?php echo $counter_title; ?></h2>
		<div class="counter-flex">
			<?php foreach ($counter as $count) { ?>
				<div id="counter-box" class="counter-bar">
				<span class="counter" data-number="<?php echo $count[
        "counter_number"
    ]; ?>"></span>
				<p><?php echo $count["counter_label"]; ?></p>
			</div>
				<?php } ?>
		</div>
	</div>
</section>
	  <?php
        elseif (get_row_layout() == "profile_section"):

            $profile_title = get_sub_field("profile_title");
            $profile_sub_title = get_sub_field("profile_sub_title");
            $profile_description = get_sub_field("profile_description");
            $tabing_sec = get_sub_field("tabing_sec");
            ?>
	 <section class="container protfolio-section">
				<div class="row">
					<div class="title-box">
						<h2><?php echo $profile_title; ?></h2>
						<h3><?php echo $profile_sub_title; ?></h3>
						<p><?php echo $profile_description; ?></p>
					</div>
					<div class="tabing-sec">
						<div class="tab-box">
						<ul>
							<?php
       $i = 1;
       foreach ($tabing_sec as $tab_sec) {
           $tabing_heading = $tab_sec["tabing_heading"]; ?>
								<li><a href="#tab<?php echo $i; ?>" title="All"><?php echo $tabing_heading; ?></a></li>
								<?php $i++;
       }
       ?>
			            </ul>
					</div>
					<div class="protfolio-sec">
						<?php
      $i = 1;
      foreach ($tabing_sec as $tab_sec) {

          $main_title = $tab_sec["main_title"];
          $main_label = $tab_sec["main_label"];
          $main_img = $tab_sec["main_img"];
          $sub_tab = $tab_sec["sub_tab"];
          $tab_link = $tab_sec["tab_link"];
          ?>
							<div class="protfolio" id="tab<?php echo $i; ?>">
							<div class="tab-sec">
								<div class="pro-img">
								<img src="<?php echo $main_img; ?>" alt="">
								<div class="bg-text">
									<div class="table">
										<div class="table-cell">
											<h2>t<?php echo $main_title; ?></h2>
						                    <p><?php echo $main_label; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-mack">
								<?php foreach ($sub_tab as $tab_box) {

            $sub_title = $tab_box["sub_title"];
            $sub_label = $tab_box["sub_label"];
            $sub_img = $tab_box["sub_img"];
            ?>
										<div class="img-one">
								<img src="<?php echo $sub_img; ?>" alt="">
								<div class="bg-text">
									<div class="table">
										<div class="table-cell">
											<h2><?php echo $sub_title; ?></h2>
						                    <p><?php echo $sub_label; ?></p>
										</div>
									</div>
								</div>
							</div>
									<?php
        } ?>
							</div>
							</div>
							<a class="button" href="<?php echo $tab_link["url"]; ?>" title="<?php echo $tab_link["title"]; ?>"><?php echo $tab_link["title"]; ?></a>
						</div>
							<?php $i++;
      }
      ?>
					</div>
					</div>
				</div>
</section>
    <?php
        elseif (get_row_layout() == "slider_section"):

            $protfolio_title = get_sub_field("protfolio_title");
            $protfolio_sub_title = get_sub_field("protfolio_sub_title");
            $protfolio_content = get_sub_field("protfolio_content");
            $protfolio_sub_content = get_sub_field("protfolio_sub_content");
            $main_slider = get_sub_field("main_slider");
            $sub_slider = get_sub_field("sub_slider");
            ?>
<section class="container profile-section">
	<div class="row">
		<div class="title-box">
			<h2><?php echo $protfolio_title; ?></h2>
			<h3><?php echo $protfolio_sub_title; ?></h3>
			<p><?php echo $protfolio_content; ?></p>
			<span><?php echo $protfolio_sub_content; ?></span>
		</div>
		<div class="wrapper">

    <!-- Main Slider -->
    <div id="big" class="owl-carousel owl-theme">
    	<?php foreach ($main_slider as $item) { ?>
    		<div class="item">
        	<div class="slide-box">
        		<h3><?php echo $item["slider_title"]; ?></h3>
        		<p><?php echo $item["slidr_label"]; ?></p>
        		<div class="slide-img">
        			<img src="<?php echo $item["slider_img"]; ?>" alt="">
        		</div>
        	</div>
        </div>
    		<?php } ?>
    </div>
    <!-- Thumbnail Slider -->
    <div id="thumbs" class="owl-carousel owl-theme">
    	<?php foreach ($sub_slider as $bg_item) { ?>
    		<div class="item">
        	<div class="slide-two">
        		<img src="<?php echo $bg_item["sub_img"]; ?>" alt="">
        	</div>
        </div>
    		<?php } ?>
    </div>

</div>
	</div>
</section>
	<?php
        elseif (get_row_layout() == "blog_section"):

            $blog_title = get_sub_field("blog_title");
            $blog_sub_title = get_sub_field("blog_sub_title");
            $blog_description = get_sub_field("blog_description");
            $blog_date = get_sub_field("blog_date");
            ?>
	<section class="container blog-section">
	<div class="row">
		<div class="title-box">
			<h2><?php echo $blog_title; ?></h2>
			<h3><?php echo $blog_sub_title; ?></h3>
			<p><?php echo $blog_description; ?></p>
		</div>
		<div class="top-box">
			<?php foreach ($blog_date as $blog) {

       $date_img = $blog["date_img"];
       $date_title = $blog["date_title"];
       $date_description = $blog["date_description"];
       $date_link = $blog["date_link"];
       $media_icon = $blog["media_icon"];
       ?>
				<div class="blog">
				<div class="blog-img">
					<img src="<?php echo $date_img; ?>" alt="">
				</div>
			<div class="blog-tx">
					<h3><?php echo $date_title; ?></h3>
					<p><?php echo $date_description; ?></p>
					<div class="blog-bottom">
						<a class="blog-btn" href="<?php echo $date_link[
          "url"
      ]; ?>" title="<?php echo $date_link["title"]; ?>"><?php echo $date_link[
    "title"
]; ?></a>
			<div class="blog-media">
				<ul>
					<?php foreach ($media_icon as $icon) {

            $icon_class = $icon["icon_class"];
            $icon_link = $icon["icon_link"];
                ?>
				<li><a href="<?php echo $icon_link["url"]; ?>" title="<?php echo $icon_link["title"]; ?>"><i class="<?php echo $icon_class; ?>"></i></a></li>
		<?php
        } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
				<?php
   } ?>
		</div>
	</div>
</section>
	<?php
        elseif (get_row_layout() == "contact_form"):

            $contact_title = get_sub_field("contact_title");
            $contact_sub_title = get_sub_field("contact_sub_title");
            $contact_description = get_sub_field("contact_description");
            $call_number = get_sub_field("call_number");
            $mobile_number = get_sub_field("mobile_number");
            $email_id = get_sub_field("email_id");
            $address_box = get_sub_field("address_box");
            ?>
         <section class="container contact-section">
	<div class="row">
		<div class="title-box">
			<h2><?php echo $contact_title; ?></h2>
			<h3><?php echo $contact_sub_title; ?></h3>
			<p><?php echo $contact_description; ?></p>
		</div>
		<div class="bottom-flex">
			<div class="detail-box">
				<h3><?php echo $call_number; ?></h3>
				<span><?php echo $mobile_number; ?></span>
				<a href="mailto:info@companyname.com" title="email"><?php echo $email_id["title"]; ?></a>
				<p><?php echo $address_box; ?></p>
			</div>
			<div class="contact-from">
				<?php echo do_shortcode(
        '[contact-form-7 id="4b51a83" title="footer form"]'
    ); ?></div>
		</div>
	</div>
</section>
         <?php
        endif;

        // End loop.
    endwhile;

    // No value.
else:

    // Do something...
endif; ?>

<?php get_footer();
