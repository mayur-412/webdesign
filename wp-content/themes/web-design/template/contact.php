<?php
   /**
    * Template Name: Contact page
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
   
   get_header();
   ?>

<?php 
// Check value exists.
if( have_rows('contact_info') ):

// Loop through rows.
while ( have_rows('contact_info') ) : the_row();

// Case: Paragraph layout.
if( get_row_layout() == 'inner_banner' ):
$inner_title = get_sub_field('inner_title');
$inner_btn = get_sub_field('inner_btn');
$url = get_the_post_thumbnail_url();
?> <section class="container inner-banner" style="background: url(<?php echo $url; ?>)  no-repeat top center;">
   <div class="row">
      <div class="table">
         <div class="table-cell">
            <div class="banner-content">
               <h1><?php echo $inner_title; ?></h1>
               <ul class="breadcrumb">
                  <?php foreach ($inner_btn as $top_link) {
                    ?> <li><a href="<?php echo $top_link['inner_link']['url']; ?>" title="<?php echo $top_link['inner_link']['title']; ?>"><?php echo $top_link['inner_link']['title']; ?></a></li> <?php
                  } ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section> <?php


// Case: Download layout.
elseif( get_row_layout() == 'form_sec' ): 
   $form_label = get_sub_field('form_label');
   $form_title = get_sub_field('form_title');
   $form_desc = get_sub_field('form_desc');
   ?> <section class="container contact-form-section">
      <div class="row">
         <div class="contact-left">
            <span><?php echo $form_label; ?></span>
            <h2><?php echo $form_title; ?></h2>
            <p><?php echo $form_desc; ?></p>
            <?php echo do_shortcode('[contact-form-7 id="37aa855" title="Top Form"]'); ?>
         </div>
      </div>
   </section> <?php

elseif( get_row_layout() == 'available_section' ): 
   $available_label = get_sub_field('available_label');
   $available_title = get_sub_field('available_title');
   $available_desc = get_sub_field('available_desc');
   $available_box = get_sub_field('available_box');
   $available_link = get_sub_field('available_link');
?> <section class="container available-section">
   <div class="row">
      <div class="available-content">
         <span><?php echo $available_label; ?></span>
         <h2>><?php echo $available_title; ?></h2>
         <p>><?php echo $available_desc; ?></p>
      </div>
      <div class="available-wrapper">
         <?php foreach ($available_box as $box) {
            ?> <div class="available-box">
            <i class="<?php echo $box['available_icon']; ?>"></i>
            <h4><?php echo $box['available_heading']; ?></h4>
         </div> <?php
         } ?>
      </div>
      <div class="available-btn">
         <a href="<?php echo $available_link['url'] ?>" title="<?php echo $available_link['title'] ?>" class="theme-btn"><?php echo $available_link['title'] ?><i class="fa-solid fa-arrow-right"></i>
         </a>
      </div>
   </div>
</section> <?php

elseif( get_row_layout() == 'map_section' ): 
   $map_title = get_sub_field('map_title');
   $map_label = get_sub_field('map_label');
   $map_desc = get_sub_field('map_desc');
   $map_date = get_sub_field('map_date');
?> <section class="container map-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $map_title; ?></h2>
         <h3><?php echo $map_label; ?></h3>
         <p><?php echo $map_desc; ?></p>
      </div>
      <div class="map-wrapper">
         <iframe
            src="https://www.google.com/maps/embed?pb=YOUR_MAP_LINK"
            loading="lazy"
            allowfullscreen>
         </iframe>
      </div>
      <div class="map-info">
         <?php foreach ($map_date as $bottom) {
           ?> <div><i class="<?php echo $bottom['map_icon']; ?>"></i><?php echo $bottom['map_details']; ?> </div> <?php
         } ?>
      </div>
   </div>
</section> <?php



elseif( get_row_layout() == 'faq_section' ): 
   $faq_title = get_sub_field('faq_title');
   $faq_label = get_sub_field('faq_label');
   $faq_desc = get_sub_field('faq_desc');
   $faq_box = get_sub_field('faq_box');
?> <section class="container faq-section">
   <div class="row">
      <div class="faq-wrapper">
         <div class="faq-left">
            <div class="title-box">
               <h2><?php echo $faq_title ?></h2>
               <h3><?php echo $faq_label ?></h3>
               <p><?php echo $faq_desc ?></p>
            </div>
         </div>
         <div class="faq-right">
            <?php foreach ($faq_box as $card) {
               ?> <div class="faq-item <?php if(!empty($card['faq_class'])){ ?> <?php echo $card['faq_class']; ?> <?php } ?>">
               <button class="faq-question">
               <span><?php echo $card['faq_heading']; ?></span>
               <i class="<?php echo $card['faq_icon']; ?>"></i>
               </button>
               <div class="faq-answer">
                  <p><?php echo $card['faq_content']; ?></p>
               </div>
            </div> <?php
            } ?>
         </div>
      </div>
   </div>
</section> <?php

endif;

// End loop.
endwhile;

// No value.
else :
// Do something...
endif; ?>

<!--      Inner Banner Start     -->
<!-- <section class="container inner-banner">
   <div class="row">
      <div class="table">
         <div class="table-cell">
            <div class="banner-content">
               <h1>Contact Us</h1>
               <ul class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#" title="about me">Contact Us</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--     Inner Banner End      -->
<!--    Contact Form Start    -->
<!-- <section class="container contact-form-section">
   <div class="row">
      <div class="contact-left">
         <span>Get In Touch</span>
         <h2>
            Let's Build Something Amazing Together
         </h2>
         <p>
            Have a project idea or need a modern website?
            Fill out the form and I'll get back to you
            as soon as possible.
         </p>
         <form>
            <div class="form-group">
               <input type="text" placeholder="Your Name">
               <input type="email" placeholder="Email Address">
            </div>
            <div class="form-group">
               <input type="text" placeholder="Phone Number">
               <input type="text" placeholder="Subject">
            </div>
            <textarea placeholder="Write Your Message"></textarea>
            <button class="theme-btn">
            Send Message
            </button>
         </form>
      </div>
   </div>
</section> -->
<!--    Contact Form End    -->
<!--    Available Section Start    -->
<!-- <section class="container available-section">
   <div class="row">
      <div class="available-content">
         <span>Available For</span>
         <h2>
            Ready To Bring Your Ideas To Life
         </h2>
         <p>
            Whether you need a custom website, WordPress development,
            or ongoing website support, I'm available to help transform
            your vision into a modern digital experience.
         </p>
      </div>
      <div class="available-wrapper">
         <div class="available-box">
            <i class="fa-brands fa-wordpress-simple"></i>
            <h4>WordPress Development</h4>
         </div>
         <div class="available-box">
            <i class="fa-solid fa-code"></i>
            <h4>Custom PHP Development</h4>
         </div>
         <div class="available-box">
            <i class="fa-solid fa-laptop-code"></i>
            <h4>Website Redesign</h4>
         </div>
         <div class="available-box">
            <i class="fa-solid fa-globe"></i>
            <h4>Landing Pages</h4>
         </div>
         <div class="available-box">
            <i class="fa-solid fa-bug"></i>
            <h4>Bug Fixing</h4>
         </div>
         <div class="available-box">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <h4>Website Maintenance</h4>
         </div>
      </div>
      <div class="available-btn">
         <a href="#" class="theme-btn">
         Hire Me
         <i class="fa-solid fa-arrow-right"></i>
         </a>
      </div>
   </div>
</section>
 --><!--    Available Section End    -->
<!--    Google Map Start    -->
<!-- <section class="container map-section">
   <div class="row">
      <div class="title-box">
         <h2>Find My Office</h2>
         <h3>Let's Meet & Discuss Your Project</h3>
         <p>
            Whether you prefer a virtual meeting or an in-person discussion,
            I'm always ready to connect and explore your ideas.
         </p>
      </div>
      <div class="map-wrapper">
         <iframe
            src="https://www.google.com/maps/embed?pb=YOUR_MAP_LINK"
            loading="lazy"
            allowfullscreen>
         </iframe>
      </div>
      <div class="map-info">
         <div>
            <i class="fa-solid fa-location-dot"></i>
            Ahmedabad, Gujarat
         </div>
         <div>
            <i class="fa-solid fa-phone"></i>
            +91 98765 43210
         </div>
         <div>
            <i class="fa-solid fa-envelope"></i>
            hello@example.com
         </div>
      </div>
   </div>
</section> -->
<!--    Google Map End    -->
<!--    FAQ Start  -->
<!-- <section class="container faq-section">
   <div class="row">
      <div class="faq-wrapper">
         <div class="faq-left">
            <div class="title-box">
               <h2>FAQ</h2>
               <h3>Frequently Asked Questions</h3>
               <p>
                  Here are some common questions clients ask before starting
                  a project. If you have any other questions, feel free to
                  contact me anytime.
               </p>
            </div>
         </div>
         <div class="faq-right">
            <div class="faq-item active">
               <button class="faq-question">
               <span>How long does it take to complete a website?</span>
               <i class="fa-solid fa-plus"></i>
               </button>
               <div class="faq-answer">
                  <p>
                     Depending on the project scope, most websites are
                     completed within 7–15 working days.
                  </p>
               </div>
            </div>
            <div class="faq-item">
               <button class="faq-question">
               <span>Do you build responsive websites?</span>
               <i class="fa-solid fa-plus"></i>
               </button>
               <div class="faq-answer">
                  <p>
                     Yes. Every website is fully responsive and optimized
                     for desktop, tablet and mobile devices.
                  </p>
               </div>
            </div>
            <div class="faq-item">
               <button class="faq-question">
               <span>Do you provide WordPress development?</span>
               <i class="fa-solid fa-plus"></i>
               </button>
               <div class="faq-answer">
                  <p>
                     Yes, I develop custom WordPress themes using clean
                     coding standards and ACF.
                  </p>
               </div>
            </div>
            <div class="faq-item">
               <button class="faq-question">
               <span>Will I get support after project delivery?</span>
               <i class="fa-solid fa-plus"></i>
               </button>
               <div class="faq-answer">
                  <p>
                     Absolutely. I provide post-launch support and guidance
                     whenever required.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--    FAQ End  -->
<?php
get_footer();