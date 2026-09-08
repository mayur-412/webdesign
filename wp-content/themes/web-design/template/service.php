<?php
   /**
    * template Name: Service page
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
if( have_rows('service_top_sec') ):

    // Loop through rows.
    while ( have_rows('service_top_sec') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'service_innner_banner' ):
           $service_top_title = get_sub_field('service_top_title');
           $service_top_btn = get_sub_field('service_top_btn');
           $url = get_the_post_thumbnail_url();
            ?>
            <section class="container inner-banner" style="background: url(<?php echo $url; ?>)  no-repeat top center;">
               <div class="row">
                  <div class="table">
                     <div class="table-cell">
                        <div class="banner-content">
                           <h1><?php echo $service_top_title; ?></h1>
                           <ul class="breadcrumb">
                              <?php foreach ($service_top_btn as $ser_btn) {
      ?> <li><a href="<?php echo $ser_btn['service_top_link']['url']; ?>" title="<?php echo $ser_btn['service_top_link']['title']; ?>"><?php echo $ser_btn['service_top_link']['title']; ?></a></li> <?php
                              } ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <?php

// Case: Download layout.
elseif( get_row_layout() == 'our_service_sec' ): 
   $our_service_title = get_sub_field('our_service_title');
   $our_service_label = get_sub_field('our_service_label');
   $our_service_desc = get_sub_field('our_service_desc');
   $services_box = get_sub_field('services_box');
?> 
<section class="container service-section">
   <div class="row">
      <div class="title-box">
         <h2>Services</h2>
         <h3>What I Do</h3>
         <p>I provide high-quality digital solutions that help businesses grow online with modern design and development.</p>
      </div>
      <div class="service-wrap">
         <?php foreach ($services_box as $service) {
           $serv_box_icon = $service['serv_box_icon'];
           $serv_box_title = $service['serv_box_title'];
           $serv_box_desc = $service['serv_box_desc'];
           ?>
         <div class="service-box">
            <div class="service-icon">
               <i class="<?php echo $serv_box_icon; ?>"></i>
            </div>
            <h4><?php echo $serv_box_title; ?></h4>
            <p><?php echo $serv_box_desc; ?></p>
         </div>
           <?php
         } ?>
      </div>
   </div>
</section>
<?php

elseif( get_row_layout() == 'process_section' ): 
   $process_title = get_sub_field('process_title');
   $process_label = get_sub_field('process_label');
   $process_desc = get_sub_field('process_desc');
   $process_box = get_sub_field('process_box');
?>
<section class="container process-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $process_title; ?></h2>
         <h3><?php echo $process_label; ?></h3>
         <p><?php echo $process_desc; ?></p>
      </div>
      <div class="process-wrap">
         <?php foreach ($process_box as $process) {
           $process_icon = $process['process_icon'];
           $process_box_title = $process['process_box_title'];
           $process_box_desc = $process['process_box_desc'];
           ?> <div class="process-item">
            <div class="process-top">
               <div class="process-icon">
                  <i class="<?php echo $process_icon; ?>"></i>
               </div>
               <span class="process-arrow"></span>
            </div>
            <div class="process-content">
               <h4><?php echo $process_box_title; ?></h4>
               <p><?php echo $process_box_desc; ?></p>
            </div>
         </div> <?php
         } ?>
      </div>
   </div>
</section>
<?php


elseif( get_row_layout() == 'featured_section' ): 
   $process_title = get_sub_field('process_title');
   $featured_label = get_sub_field('featured_label');
   $featured_desc = get_sub_field('featured_desc');
   $featured_box = get_sub_field('featured_box');
?>
<section class="container featured-services">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $process_title; ?></h2>
         <h3><?php echo $featured_label; ?></h3>
         <p><?php echo $featured_desc; ?></p>
      </div>
      <div class="service-grid">
         <?php foreach ($featured_box as $featur) {
           $featured_icon = $featur['featured_icon'];
           $featured_sub_title = $featur['featured_sub_title'];
           $featured_sub_desc = $featur['featured_sub_desc'];
           $featured_link = $featur['featured_link'];
           ?> <div class="service-card">
            <div class="service-icon">
               <i class="<?php echo $featured_icon; ?>"></i>
            </div>
            <h4><?php echo $featured_sub_title; ?></h4>
            <p><?php echo $featured_sub_desc; ?></p>
            <a href="<?php echo $featured_link['url']; ?>" title="<?php echo $featured_link['title']; ?>"> <?php echo $featured_link['title']; ?><i class="fa-solid fa-arrow-right-long"></i></a>
         </div> <?php
         } ?>
      </div>
   </div>
</section>
<?php


elseif( get_row_layout() == 'technology_section' ): 
   $technology_title = get_sub_field('technology_title');
   $technology_label = get_sub_field('technology_label');
   $technology_desc = get_sub_field('technology_desc');
   $technology_box = get_sub_field('technology_box');
   ?>
<section class="container technology-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $technology_title; ?></h2>
         <h3><?php echo $technology_label; ?></h3>
         <p><?php echo $technology_desc; ?></p>
      </div>
      <div class="technology-grid">
         <?php foreach ($technology_box as $technology) {
          ?> <div class="technology-box">
            <i class="<?php echo $technology['technology_icon']; ?>"></i>
            <h4><?php echo $technology['technology_heading']; ?></h4>
         </div> <?php
         } ?>
      </div>
   </div>
</section>
   <?php


elseif( get_row_layout() == 'choose_service' ): 
   $choose_label = get_sub_field('choose_label');
   $choose_title = get_sub_field('choose_title');
   $choose_desc = get_sub_field('choose_desc');
   $choose_link = get_sub_field('choose_link');
   $choose_box = get_sub_field('choose_box');
?>
<section class="container choose-service-section">
   <div class="row">
      <div class="choose-service-wrapper">
         <div class="choose-service-left">
            <span><?php echo $choose_label; ?></span>
            <h2><?php echo $choose_title; ?></h2>
            <p><?php echo $choose_desc; ?> </p>
            <a href="<?php echo $choose_link['url']; ?>" title="<?php echo $choose_link['title']; ?>" class="theme-btn">
            <?php echo $choose_link['title']; ?>
            </a>
         </div>
         <div class="choose-service-right">
            <?php foreach ($choose_box as $card) {
             ?> <div class="choose-card">
               <div class="choose-icon">
                  <i class="<?php echo $card['choose_icon']; ?>"></i>
               </div>
               <div class="choose-content">
                  <h4><?php echo $card['choose_heading']; ?></h4>
                  <p><?php echo $card['choose_content']; ?></p>
               </div>
            </div> <?php
            } ?>
         </div>
      </div>
   </div>
</section>
<?php


elseif( get_row_layout() == 'faq_section_' ): 
   $faq_title = get_sub_field('faq_title');
   $faq_label = get_sub_field('faq_label');
   $faq_desc = get_sub_field('faq_desc');
   $faq_box = get_sub_field('faq_box');
?> 
<section class="container faq-section">
   <div class="row">
      <div class="faq-wrapper">
         <div class="faq-left">
            <div class="title-box">
               <h2><?php echo $faq_title; ?></h2>
               <h3><?php echo $faq_label; ?></h3>
               <p><?php echo $faq_desc; ?></p>
            </div>
         </div>
         <div class="faq-right">
            <?php foreach ($faq_box as $faq) {
              ?> <div class="faq-item <?php if(!empty($faq['faq_class'])){ ?> <?php echo $faq['faq_class']; ?> <?php } ?> ">
               <button class="faq-question">
               <span><?php echo $faq['faq_heading']; ?></span>
               <i class="<?php echo $faq['faq_icon_']; ?>"></i>
               </button>
               <div class="faq-answer">
                  <p><?php echo $faq['faq_content']; ?></p>
               </div>
            </div> <?php
            } ?>
         </div>
      </div>
   </div>
</section>
 <?php

elseif( get_row_layout() == 'cta_section' ): 
   $cta_label = get_sub_field('cta_label');
   $cta_title = get_sub_field('cta_title');
   $cta_desc = get_sub_field('cta_desc');
   $cta_btn = get_sub_field('cta_btn');
?>
<section class="container cta-section">
   <div class="row">
      <div class="cta-wrapper">
         <span><?php echo $cta_label; ?></span>
         <h2><?php echo $cta_title; ?></h2>
         <p><?php echo $cta_desc; ?></p>
         <div class="cta-btn">
            <?php foreach ($cta_btn as $cta) {
             ?>
             <a href="<?php echo $cta['cta_link']['url']; ?>" title="<?php echo $cta['cta_link']['title']; ?>" class="<?php echo $cta['cta_class']; ?>">
            <?php echo $cta['cta_link']['title']; ?>
            </a>
             <?php
            } ?>
         </div>
      </div>
   </div>
</section>
<?php
        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>



<!--      Inner Banner Start     -->
<!-- <section class="container inner-banner">
   <div class="row">
      <div class="table">
         <div class="table-cell">
            <div class="banner-content">
               <h1>About Me</h1>
               <ul class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#" title="Our Service">Our Service</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--     Inner Banner End      -->
<!--    What I Do Start    -->
<!-- <section class="container service-section">
   <div class="row">
      <div class="title-box">
         <h2>Services</h2>
         <h3>What I Do</h3>
         <p>I provide high-quality digital solutions that help businesses grow online with modern design and development.</p>
      </div>
      <div class="service-wrap">
         <div class="service-box">
            <div class="service-icon">
               <i class="fa-solid fa-laptop-code"></i>
            </div>
            <h4>Web Design</h4>
            <p>Modern, responsive and creative website designsfocused on user experience.</p>
         </div>
         <div class="service-box">
            <div class="service-icon">
               <i class="fa-brands fa-wordpress"></i>
            </div>
            <h4>WordPress Development</h4>
            <p>Custom WordPress themes with clean coding and optimized performance.</p>
         </div>
         <div class="service-box">
            <div class="service-icon">
               <i class="fa-solid fa-code"></i>
            </div>
            <h4>Web Development</h4>
            <p>Fast and scalable websites using modern web technologies.</p>
         </div>
         <div class="service-box">
            <div class="service-icon">
               <i class="fa-solid fa-mobile-screen-button"></i>
            </div>
            <h4>Responsive Design</h4>
            <p>Websites that look perfect on desktop, tablet and mobile devices.</p>
         </div>
         <div class="service-box">
            <div class="service-icon">
               <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <h4>SEO Optimization</h4>
            <p>Improve your search ranking with clean,optimized website structure.</p>
         </div>
         <div class="service-box">
            <div class="service-icon">
               <i class="fa-solid fa-palette"></i>
            </div>
            <h4>UI / UX Design</h4>
            <p>
               Attractive interfaces with user-focused
               experiences.
            </p>
         </div>
         <div class="service-box">
            <div class="service-icon">
               <i class="fa-solid fa-gauge-high"></i>
            </div>
            <h4>Speed Optimization</h4>
            <p>
               Optimize loading speed for better performance
               and user experience.
            </p>
         </div>
         <div class="service-box">
            <div class="service-icon">
               <i class="fa-solid fa-headset"></i>
            </div>
            <h4>Support</h4>
            <p>
               Reliable maintenance and technical support
               after project delivery.
            </p>
         </div>
      </div>
   </div>
</section> -->
<!--  What I Do End  -->
<!--   Work Process Start     -->
<!-- <section class="container process-section">
   <div class="row">
      <div class="title-box">
         <h2>Work Process</h2>
         <h3>How I Complete Every Project</h3>
         <p>
            I follow a simple and organized workflow to deliver modern,
            responsive and high-quality websites.
         </p>
      </div>
      <div class="process-wrap">
         <div class="process-item">
            <div class="process-top">
               <div class="process-icon">
                  <i class="fa-solid fa-comments"></i>
               </div>
               <span class="process-arrow"></span>
            </div>
            <div class="process-content">
               <h4>Discussion</h4>
               <p>
                  Understanding your requirements and discussing project goals before starting.
               </p>
            </div>
         </div>
         <div class="process-item">
            <div class="process-top">
               <div class="process-icon">
                  <i class="fa-solid fa-pen-ruler"></i>
               </div>
               <span class="process-arrow"></span>
            </div>
            <div class="process-content">
               <h4>Planning</h4>
               <p>
                  Creating a proper strategy, wireframe and project roadmap.
               </p>
            </div>
         </div>
         <div class="process-item">
            <div class="process-top">
               <div class="process-icon">
                  <i class="fa-solid fa-code"></i>
               </div>
               <span class="process-arrow"></span>
            </div>
            <div class="process-content">
               <h4>Development</h4>
               <p>
                  Developing a fast, responsive and user-friendly website.
               </p>
            </div>
         </div>
         <div class="process-item">
            <div class="process-top">
               <div class="process-icon">
                  <i class="fa-solid fa-vial-circle-check"></i>
               </div>
               <span class="process-arrow"></span>
            </div>
            <div class="process-content">
               <h4>Testing</h4>
               <p>
                  Testing every page carefully for quality and performance.
               </p>
            </div>
         </div>
         <div class="process-item">
            <div class="process-top">
               <div class="process-icon">
                  <i class="fa-solid fa-rocket"></i>
               </div>
            </div>
            <div class="process-content">
               <h4>Launch</h4>
               <p>
                  Launching the website successfully with complete support.
               </p>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--    Work Process End    -->
<!--    Featured Services Start    -->
<!-- <section class="container featured-services">
   <div class="row">
      <div class="title-box">
         <h2>Featured Services</h2>
         <h3>Solutions I Can Build For You</h3>
         <p>
            I create modern, responsive and performance-driven websites tailored to your business needs.
         </p>
      </div>
      <div class="service-grid">
         <div class="service-card">
            <div class="service-icon">
               <i class="fa-solid fa-globe"></i>
            </div>
            <h4>Business Website</h4>
            <p>
               Professional websites designed to establish your online presence and grow your business.
            </p>
            <a href="#">
            Learn More
            <i class="fa-solid fa-arrow-right-long"></i>
            </a>
         </div>
         <div class="service-card">
            <div class="service-icon">
               <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <h4>E-Commerce Store</h4>
            <p>
               Fast and secure online stores with payment integration and responsive layouts.
            </p>
            <a href="#">
            Learn More
            <i class="fa-solid fa-arrow-right-long"></i>
            </a>
         </div>
         <div class="service-card">
            <div class="service-icon">
               <i class="fa-brands fa-wordpress"></i>
            </div>
            <h4>WordPress Development</h4>
            <p>
               Custom WordPress themes with clean code, speed optimization and flexibility.
            </p>
            <a href="#">
            Learn More
            <i class="fa-solid fa-arrow-right-long"></i>
            </a>
         </div>
         <div class="service-card">
            <div class="service-icon">
               <i class="fa-solid fa-mobile-screen"></i>
            </div>
            <h4>Landing Page</h4>
            <p>
               High-converting landing pages built for marketing campaigns and lead generation.
            </p>
            <a href="#">
            Learn More
            <i class="fa-solid fa-arrow-right-long"></i>
            </a>
         </div>
      </div>
   </div>
</section> -->
<!--     Featured Services End    -->
<!--     Technologies Start     -->
<!-- <section class="container technology-section">
   <div class="row">
      <div class="title-box">
         <h2>Technologies</h2>
         <h3>Tools & Technologies I Work With</h3>
         <p>
            I use modern technologies and development tools to build fast,
            responsive and scalable websites.
         </p>
      </div>
      <div class="technology-grid">
         <div class="technology-box">
            <i class="fa-brands fa-html5"></i>
            <h4>HTML5</h4>
         </div>
         <div class="technology-box">
            <i class="fa-brands fa-css3-alt"></i>
            <h4>CSS3</h4>
         </div>
         <div class="technology-box">
            <i class="fa-brands fa-js"></i>
            <h4>JavaScript</h4>
         </div>
         <div class="technology-box">
            <i class="fa-brands fa-bootstrap"></i>
            <h4>Bootstrap</h4>
         </div>
         <div class="technology-box">
            <i class="fa-brands fa-wordpress"></i>
            <h4>WordPress</h4>
         </div>
         <div class="technology-box">
            <i class="fa-brands fa-php"></i>
            <h4>PHP</h4>
         </div>
         <div class="technology-box">
            <i class="fa-solid fa-database"></i>
            <h4>MySQL</h4>
         </div>
         <div class="technology-box">
            <i class="fa-brands fa-git-alt"></i>
            <h4>Git</h4>
         </div>
         <div class="technology-box">
            <i class="fa-brands fa-figma"></i>
            <h4>Figma</h4>
         </div>
         <div class="technology-box">
            <i class="fa-solid fa-layer-group"></i>
            <h4>ACF</h4>
         </div>
      </div>
   </div>
</section> -->
<!--     Technologies End     -->
<!--      Why Choose My Services     -->
<!-- <section class="container choose-service-section">
   <div class="row">
      <div class="choose-service-wrapper">
         <div class="choose-service-left">
            <span>Why Choose Me</span>
            <h2>Why Choose My Services</h2>
            <p>
               I build fast, responsive and user-friendly websites with clean
               code, modern UI and the latest web technologies. Every project
               is developed with quality, performance and long-term support in
               mind.
            </p>
            <a href="contact.html" class="theme-btn">
            Let's Work Together
            </a>
         </div>
         <div class="choose-service-right">
            <div class="choose-card">
               <div class="choose-icon">
                  <i class="fa-solid fa-gauge-high"></i>
               </div>
               <div class="choose-content">
                  <h4>Fast Performance</h4>
                  <p>Optimized websites with excellent loading speed.</p>
               </div>
            </div>
            <div class="choose-card">
               <div class="choose-icon">
                  <i class="fa-solid fa-code"></i>
               </div>
               <div class="choose-content">
                  <h4>Clean Coding</h4>
                  <p>Well-structured and maintainable source code.</p>
               </div>
            </div>
            <div class="choose-card">
               <div class="choose-icon">
                  <i class="fa-solid fa-mobile-screen-button"></i>
               </div>
               <div class="choose-content">
                  <h4>Responsive Design</h4>
                  <p>Perfect experience across desktop, tablet and mobile.</p>
               </div>
            </div>
            <div class="choose-card">
               <div class="choose-icon">
                  <i class="fa-solid fa-headset"></i>
               </div>
               <div class="choose-content">
                  <h4>Free Support</h4>
                  <p>Reliable support even after project delivery.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--    Client Testimonials Start    -->
<!-- <section class="container testimonial-section">
   <div class="row">
      <div class="title-box">
         <h2>Testimonials</h2>
         <h3>What My Clients Say</h3>
         <p>
            Client satisfaction is my biggest achievement. Here are some
            words from people I've worked with.
         </p>
      </div>
      <div class="testimonial-slider owl-carousel">
         <div class="testimonial-item">
            <div class="quote-icon">
               <i class="fa-solid fa-quote-right"></i>
            </div>
            <div class="rating">
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
            </div>
            <p>
               Working with Mayur was an amazing experience. The website was
               delivered on time with excellent quality and clean coding.
            </p>
            <div class="client-info">
               <div class="client-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/slide-1.png" alt="">
               </div>
               <div class="client-details">
                  <h4>John Smith</h4>
                  <span>CEO, Creative Agency</span>
               </div>
            </div>
         </div>
         <div class="testimonial-item">
            <div class="quote-icon">
               <i class="fa-solid fa-quote-right"></i>
            </div>
            <div class="rating">
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
            </div>
            <p>
               Professional developer with excellent communication skills.
               Highly recommended for WordPress projects.
            </p>
            <div class="client-info">
               <div class="client-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/slide-4.png" alt="">
               </div>
               <div class="client-details">
                  <h4>David Wilson</h4>
                  <span>Founder, Startup Hub</span>
               </div>
            </div>
         </div>
         <div class="testimonial-item">
            <div class="quote-icon">
               <i class="fa-solid fa-quote-right"></i>
            </div>
            <div class="rating">
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
               <i class="fa-solid fa-star"></i>
            </div>
            <p>
               Great attention to detail and modern design approach. I will
               definitely work with him again.
            </p>
            <div class="client-info">
               <div class="client-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/slide.png" alt="">
               </div>
               <div class="client-details">
                  <h4>Sarah Johnson</h4>
                  <span>Marketing Manager</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--   Client Testimonials End    -->
<!--    FAQ Start      -->
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
<!--   FAQ End    -->
<!--    CTA Start   -->
<!-- <section class="container cta-section">
   <div class="row">
      <div class="cta-wrapper">
         <span>Let's Build Something Great</span>
         <h2>
            Ready To Start Your Next Project?
         </h2>
         <p>
            Whether you need a business website, WordPress development or a
            custom web solution, I'm here to help turn your ideas into reality.
         </p>
         <div class="cta-btn">
            <a href="contact.html" class="theme-btn">
            Get Free Consultation
            </a>
            <a href="portfolio.html" class="theme-btn-outline">
            View Portfolio
            </a>
         </div>
      </div>
   </div>
</section> -->
<!--    CTA End    -->
<?php
get_footer();