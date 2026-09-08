<?php
/**
 * Template Name: About page
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
if( have_rows('about_flexbox') ):

    // Loop through rows.
    while ( have_rows('about_flexbox') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'inner_banner' ):
            $banner_title = get_sub_field('banner_title');
            $banner_fild = get_sub_field('banner_fild');
            $url = get_the_post_thumbnail_url();
            ?>
      <section class="container inner-banner" style="background: url(<?php echo $url; ?>)  no-repeat top center;">
         <div class="row">
            <div class="table">
               <div class="table-cell">
                  <div class="banner-content">
                     <h1><?php echo $banner_title; ?></h1>
                     <ul class="breadcrumb">
                        <?php
                        foreach ($banner_fild as $b_label) {
                          ?>
                          <li><a href="<?php echo $b_label['banner_label']['url']; ?>" title="<?php echo $b_label['banner_label']['title']; ?>"><?php echo $b_label['banner_label']['title']; ?></a></li>
                          <?php
                        }
                        ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
            <?php

     // Case: Download layout.
     elseif( get_row_layout() == 'about_box_section' ): 
         $a_box_img = get_sub_field('a_box_img');
         $a_box_heading = get_sub_field('a_box_heading');
         $a_box_title = get_sub_field('a_box_title');
         $a_box_span = get_sub_field('a_box_span');
         $a_box_h4 = get_sub_field('a_box_h4');
         $a_box_h5 = get_sub_field('a_box_h5');
         $a_box_description = get_sub_field('a_box_description');
         $about_info = get_sub_field('about_info');
         $about_btn = get_sub_field('about_btn');
         ?>

      <section class="container about-section">
         <div class="row">
            <div class="about-flex">
               <div class="about-left">
                  <div class="about-img">
                     <img src="<?php echo $a_box_img; ?>" alt="">
                  </div>
               </div>
               <div class="about-right">
                  <div class="title-box">
                     <h2><?php echo $a_box_heading; ?></h2>
                     <h3><?php echo $a_box_title; ?></h3>
                  </div>
                  <span><?php echo $a_box_span; ?></span>
                  <h4><?php echo $a_box_h4; ?></h4>
                  <h5><?php echo $a_box_h5; ?></h5>
                  <p><?php echo $a_box_description; ?></p>
                  <ul class="about-info">
                     <?php
                     foreach ($about_info as $info) {
                     $class_name = $info['class_name'];
                     $about_name = $info['about_name'];
                     $about_date = $info['about_date'];
                     ?>
                     <li>
                        <i class="<?php echo $class_name; ?>"></i>
                        <strong><?php echo $about_name; ?></strong>
                        <span><?php echo $about_date; ?></span>
                     </li>
                     <?php
                     }
                     ?>
                  </ul>
                  <div class="about-btn">
                     <?php
                     foreach ($about_btn as $a_btn) {
                     $about_btn_link = $a_btn['about_btn_link'];
                     ?>
                     <a href="<?php echo $about_btn_link['url']; ?>" title="<?php echo $about_btn_link['title']; ?>"><?php echo $about_btn_link['title']; ?></a>
                     <?php
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </section>

         <?php

elseif( get_row_layout() == 'achievement_section' ): 
   $achievement_box = get_sub_field('achievement_box');
   $main_heading = get_sub_field('main_heading');
   $description_size = get_sub_field('description_size');
   $main_content = get_sub_field('main_content');
   $mrg_calss = get_sub_field('mrg_calss');
   ?>
<section class="container achievement-section">
   <div class="row">
       <div class="title-box">
         <?php
      if(!empty($main_heading)){ ?><h2><?php echo $main_heading; ?></h2> <?php }
      ?>
      <?php
      if(!empty($description_size)){ ?> <h3><?php echo $description_size; ?></h3> <?php }
      ?>
      <?php if(!empty($main_content)){ ?> <p><?php echo $main_content; ?></p> <?php }
      ?>
      </div>
      <div class="achievement-wrap <?php if (!empty($mrg_calss)) { echo esc_attr($mrg_calss); } ?>" style="">
      <?php
      foreach ($achievement_box as $achiev) {
      $achiev__icon_class = $achiev['achiev__icon_class'];
      $achiev_box_title = $achiev['achiev_box_title'];
      $achiev_box_description = $achiev['achiev_box_description'];
      $achiev_sub_title = $achiev['achiev_sub_title'];
      $achiev_sub_content = $achiev['achiev_sub_content'];
      ?>
      <div class="achievement-item">
            <div class="choose-icon">
            <i class="<?php echo $achiev__icon_class; ?>"></i>
         </div>
         <?php
         if(!empty($achiev_box_title)){ ?> <h2 class="achievement-number" data-number="<?php echo $achiev_box_title; ?>">0</h2> <?php  }
         ?>
          <?php
         if(!empty($achiev_sub_title)){ ?> <h3><?php echo $achiev_sub_title; ?></h3>  <?php }
         ?>
         <?php
         if(!empty($achiev_sub_content)){ ?> <p><?php echo $achiev_sub_content; ?></p> <?php }
         ?>
         <?php
          if(!empty($achiev_box_description)){ ?> <h4><?php echo $achiev_box_description; ?></h4> <?php }
         ?>
         </div>
      <?php
      }
      ?>
      </div>
   </div>
</section>
   <?php


elseif( get_row_layout() == 'skill__section' ): 
   $skill_heading = get_sub_field('skill_heading');
   $skill_title = get_sub_field('skill_title');
   $skill_descripstion = get_sub_field('skill_descripstion');
   $skill_item = get_sub_field('skill_item');
   ?>
<section class="container skills-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $skill_heading; ?></h2>
         <h3><?php echo $skill_title; ?></h3>
         <p><?php echo $skill_descripstion; ?></p>
      </div>
      <div class="skill-container">
         <?php
         foreach ($skill_item as $skill) {
         $skill_item_title = $skill['skill_item_title'];
         $skill_item_class = $skill['skill_item_class'];
         $skill_item_progress = $skill['skill_item_progress'];
         ?>
          <div class="skill-item">
            <label><?php echo $skill_item_title; ?></label>
            <div class="progress-bar">
               <div class="<?php echo $skill_item_class; ?>">
                  <span><?php echo $skill_item_progress; ?>%</span>
               </div>
            </div>
         </div>
         <?php
         }
         ?>
         </div>
      </div>
   </div>
</section>
   <?php

elseif( get_row_layout() == 'timeline_section' ): 
   $time_heading = get_sub_field('time_heading');
   $time_label = get_sub_field('time_label');
   $time_content = get_sub_field('time_content');
   $timeline_box = get_sub_field('timeline_box');
?>
<section class="container timeline-section">
   <div class="row">
      <div class="title-box">
         <h2>experience</h2>
         <h3>My Career Journey</h3>
         <p>
            Every project and every opportunity has helped me grow into a
            better designer and WordPress developer.
         </p>
      </div>
      <div class="timeline-wrap">
         <?php
         foreach ($timeline_box as $timeline) {
         $time_box_title = $timeline['time_box_title'];
         $timeline_icon = $timeline['timeline_icon'];
         $timeline_title = $timeline['timeline_title'];
         $timeline_company = $timeline['timeline_company'];
         $timeline_desc = $timeline['timeline_desc'];
         $timeline_class = $timeline['timeline_class'];
         ?>
         <div class="timeline-card <?php echo $timeline_class; ?>">
            <div class="timeline-year">
               <h2><?php echo $time_box_title; ?></h2>
            </div>
            <div class="timeline-content">
               <div class="timeline-icon">
                  <i class="<?php echo $timeline_icon; ?>"></i>
               </div>
               <h4 class="timeline-title"><?php echo $timeline_title; ?></h4>
               <span class="timeline-company"><?php echo $timeline_company; ?></span>
               <p class="timeline-desc"><?php echo $timeline_desc; ?></p>
            </div>
         </div>
         <?php
         }
         ?>
      </div>
   </div>
</section>
<?php


elseif( get_row_layout() == 'testimonial_section' ): 
   $testimonial_heading = get_sub_field('testimonial_heading');
   $testimonial_label = get_sub_field('testimonial_label');
   $testimonial_desc = get_sub_field('testimonial_desc');
   $testimonial_slider = get_sub_field('testimonial_slider');
?>
<section class="container testimonial-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $testimonial_heading; ?></h2>
         <h3><?php echo $testimonial_label; ?></h3>
         <p><?php echo $testimonial_desc; ?></p>
      </div>
      <div class="testimonial-slider owl-carousel">
         <?php
         foreach ($testimonial_slider as $slider) {
         $quote_icon = $slider['quote_icon'];
         $testimonial_slide_desc = $slider['testimonial_slide_desc'];
         $testimonial_rating = $slider['testimonial_rating'];
         $client_ing = $slider['client_ing'];
         $client_name = $slider['client_name'];
         $clinet_company = $slider['clinet_company'];
         }
         ?>
         <div class="testimonial-box">
            <div class="quote-icon">
               <i class="<?php echo $quote_icon; ?>"></i>
            </div>
            <p class="testimonial-desc"><?php echo $testimonial_slide_desc; ?></p>
            <ul class="rating">
               <?php
               foreach ($testimonial_rating as $rating) {
                ?>
                  <li><i class="<?php echo $rating['rating_icon']; ?>"></i></li>
                <?php
               }
               ?>
            </ul>
            <div class="client-info">
               <div class="client-img">
                  <img src="<?php echo $client_ing; ?>" alt="">
               </div>
               <div class="client-text">
                  <h4><?php echo $client_name; ?></h4>
                  <span><?php echo $clinet_company; ?></span>
               </div>
            </div>
         </div>
         <?php
         ?>
      </div>
   </div>
</section>
<?php

elseif( get_row_layout() == 'collaborators_section' ): 
   $collaborators_heading = get_sub_field('collaborators_heading');
   $collaborators_label = get_sub_field('collaborators_label');
   $collaborators_desc = get_sub_field('collaborators_desc');
   $collaborator_box = get_sub_field('collaborator_box');
?>
<section class="container collaborators-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $collaborators_heading; ?></h2>
         <h3><?php echo $collaborators_label; ?></h3>
         <p><?php echo $collaborators_desc; ?></p>
      </div>
      <div class="collaborators-wrap">
         <?php
         foreach ($collaborator_box as $slide_two) {
         $collaborator_box_img = $slide_two['collaborator_box_img'];
         $media_icon = $slide_two['media_icon']; 
         $collaborator_box_title = $slide_two['collaborator_box_title'];
         $collaborator_box_content = $slide_two['collaborator_box_content'];
         ?>
         <div class="collaborator-box">
            <div class="collaborator-img">
               <img src="<?php echo $collaborator_box_img; ?>" alt="">
               <div class="collaborator-overlay">
                  <ul class="social-icon">
                     <?php
                     foreach ($media_icon as $media) {
                     ?>
                      <li><a href="#"><i class="<?php echo $media['media_icon_class']; ?>"></i></a></li>
                     <?php
                     }
                     ?>
                  </ul>
               </div>
            </div>
            <div class="collaborator-content">
               <h4><?php echo $collaborator_box_title; ?></h4>
               <span><?php echo $collaborator_box_content; ?></span>
            </div>
         </div>
         <?php
         }
         ?>
      </div>
   </div>
</section>
<?php

elseif( get_row_layout() == 'cta-section' ): 
   $cta_label = get_sub_field('cta_label');
   $cta_heading = get_sub_field('cta_heading');
   $cta_desc = get_sub_field('cta_desc');
   $cta_btn = get_sub_field('cta_btn');
?>
<section class="container cta-section">
   <div class="row">
      <div class="cta-box">
         <span><?php echo $cta_label; ?></span>
         <h2><?php echo $cta_heading; ?></h2>
         <p><?php echo $cta_desc; ?></p>
         <div class="cta-btn">
            <?php
            foreach ($cta_btn as $cta_link) {
               ?>
               <a href="<?php echo $cta_link['cta_btn_link']['url']; ?>" title="<?php echo $cta_link['cta_btn_link']['title']; ?>" class="theme-btn"><?php echo $cta_link['cta_btn_link']['title']; ?></a>
               <?php
            }
            ?>
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
                  <li><a href="#" title="about me">About Me</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--     Inner Banner End      -->
<!--    About Section Start    -->
<!-- <section class="container about-section">
   <div class="row">
      <div class="about-flex">
         <div class="about-left">
            <div class="about-img">
               <img src="<?php echo get_template_directory_uri(); ?>/images/bg-1.jpg" alt="">
            </div>
         </div>
         <div class="about-right">
            <div class="title-box">
               <h2>about</h2>
               <h3>About Me</h3>
            </div>
            <span>Hello, I'm</span>
            <h4>Mayur Patel</h4>
            <h5>WordPress Developer</h5>
            <p>
               I am a passionate WordPress Developer with experience
               in creating responsive, modern and user-friendly websites.
               I enjoy converting HTML to WordPress themes using ACF
               Flexible Content and writing clean code.
            </p>
            <ul class="about-info">
               <li>
                  <i class="fa-solid fa-user"></i>
                  <strong>Name :</strong>
                  <span>Mayur Patel</span>
               </li>
               <li>
                  <i class="fa-solid fa-envelope"></i>
                  <strong>Email :</strong>
                  <span>demo@gmail.com</span>
               </li>
               <li>
                  <i class="fa-solid fa-phone"></i>
                  <strong>Phone :</strong>
                  <span>+91 9876543210</span>
               </li>
            </ul>
            <div class="about-btn">
               <a href="#">Download CV</a>
               <a href="#">Hire Me</a>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--    About Section End    -->
<!--    Achievement Section Start    -->
<!-- <section class="container achievement-section">
   <div class="row">
      <div class="achievement-wrap">
         <div class="achievement-item">
            <div class="choose-icon">
            <i class="fa-solid fa-briefcase"></i>
         </div>
            <h2 class="achievement-number" data-number="150">0</h2>
            <h4>Projects Completed</h4>
         </div>
         <div class="achievement-item">
            <div class="choose-icon">
            <i class="fa-solid fa-face-smile"></i>
         </div>
            <h2 class="achievement-number" data-number="95">0</h2>
            <h4>Happy Clients</h4>
         </div>
         <div class="achievement-item">
            <div class="choose-icon">
            <i class="fa-solid fa-award"></i>
         </div>
            <h2 class="achievement-number" data-number="5">0</h2>
            <h4>Years Experience</h4>
         </div>
         <div class="achievement-item">
            <div class="choose-icon">
            <i class="fa-solid fa-mug-hot"></i>
         </div>
            <h2>24/7</h2>
            <h4>Support</h4>
         </div>
      </div>
   </div>
</section> -->
<!--   Achievement Section End  -->
<!--    Skills Section Start    -->
<!-- <section class="container skills-section">
   <div class="row">
      <div class="title-box">
         <h2>skills</h2>
         <h3>Professional Skills</h3>
         <p>
            I specialize in modern web technologies and WordPress development
            with clean coding standards.
         </p>
      </div>
      <div class="skill-container">
         <div class="skill-item">
            <label>HTML5</label>
            <div class="progress-bar">
               <div class="fill html">
                  <span>95%</span>
               </div>
            </div>
         </div>
         <div class="skill-item">
            <label>CSS3</label>
            <div class="progress-bar">
               <div class="fill css">
                  <span>92%</span>  
               </div>
            </div>
         </div>
         <div class="skill-item">
            <label>JavaScript</label>
            <div class="progress-bar">
               <div class="fill js">
                  <span>85%</span>
               </div>
            </div>
         </div>
         <div class="skill-item">
            <label>WordPress</label>
            <div class="progress-bar">
               <div class="fill wp">
                  <span>95%</span>
               </div>
            </div>
         </div>
         <div class="skill-item">
            <label>PHP</label>
            <div class="progress-bar">
               <div class="fill php">
                  <span>88%</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--    Skills Section End    -->
<!--    Why Choose Me Start   -->
<!-- <section class="container choose-section">
   <div class="row">
      <div class="title-box">
         <h2>why choose me</h2>
         <h3>Why Work With Me</h3>
         <p>
            I create modern, responsive and SEO-friendly websites with clean
            coding standards and attention to every detail.
         </p>
      </div>
      <div class="choose-flex">
         <div class="choose-box">
            <div class="choose-icon">
               <i class="fa-solid fa-code"></i>
            </div>
            <h4>Clean Coding</h4>
            <p>
               I write clean, optimized and maintainable code following
               WordPress coding standards.
            </p>
         </div>
         <div class="choose-box">
            <div class="choose-icon">
               <i class="fa-solid fa-mobile-screen-button"></i>
            </div>
            <h4>Responsive Design</h4>
            <p>
               Every website is fully responsive and works perfectly on
               desktop, tablet and mobile devices.
            </p>
         </div>
         <div class="choose-box">
            <div class="choose-icon">
               <i class="fa-solid fa-rocket"></i>
            </div>
            <h4>Fast Performance</h4>
            <p>
               Optimized websites with fast loading speed and better user
               experience.
            </p>
         </div>
         <div class="choose-box">
            <div class="choose-icon">
               <i class="fa-solid fa-headset"></i>
            </div>
            <h4>24/7 Support</h4>
            <p>
               Quick communication and long-term support for every completed
               project.
            </p>
         </div>
      </div>
   </div>
</section> -->
<!--    Why Choose Me End   -->
<!--   Timeline Section Start   -->
<!-- <section class="container timeline-section">
   <div class="row">
      <div class="title-box">
         <h2>experience</h2>
         <h3>My Career Journey</h3>
         <p>
            Every project and every opportunity has helped me grow into a
            better designer and WordPress developer.
         </p>
      </div>
      <div class="timeline-wrap">
         <div class="timeline-card timeline-left">
            <div class="timeline-year">
               <h2>2025</h2>
            </div>
            <div class="timeline-content">
               <div class="timeline-icon">
                  <i class="fa-solid fa-laptop-code"></i>
               </div>
               <h4 class="timeline-title">
                  Senior WordPress Developer
               </h4>
               <span class="timeline-company">
               Freelancer
               </span>
               <p class="timeline-desc">
                  Developing custom WordPress themes, ACF Flexible
                  websites, WooCommerce stores and premium business
                  websites with modern UI/UX.
               </p>
            </div>
         </div>
         <div class="timeline-card timeline-right">
            <div class="timeline-year">
               <h2>2024</h2>
            </div>
            <div class="timeline-content">
               <div class="timeline-icon">
                  <i class="fa-solid fa-code"></i>
               </div>
               <h4 class="timeline-title">
                  Frontend Developer
               </h4>
               <span class="timeline-company">
               Creative Agency
               </span>
               <p class="timeline-desc">
                  Created responsive websites using HTML5, CSS3,
                  JavaScript, jQuery and Bootstrap with pixel-perfect
                  layouts.
               </p>
            </div>
         </div>
         <div class="timeline-card timeline-left">
            <div class="timeline-year">
               <h2>2023</h2>
            </div>
            <div class="timeline-content">
               <div class="timeline-icon">
                  <i class="fa-solid fa-wordpress"></i>
               </div>
               <h4 class="timeline-title">
                  WordPress Developer
               </h4>
               <span class="timeline-company">
               Self Learning
               </span>
               <p class="timeline-desc">
                  Started learning custom theme development, ACF,
                  WooCommerce and PHP while building portfolio projects.
               </p>
            </div>
         </div>
         <div class="timeline-card timeline-right">
            <div class="timeline-year">
               <h2>2022</h2>
            </div>
            <div class="timeline-content">
               <div class="timeline-icon">
                  <i class="fa-solid fa-graduation-cap"></i>
               </div>
               <h4 class="timeline-title">
                  Started Web Development
               </h4>
               <span class="timeline-company">
               Learning Journey
               </span>
               <p class="timeline-desc">
                  Started learning HTML, CSS and JavaScript while
                  exploring responsive web design and UI development.
               </p>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--   Timeline Section End    -->
<!--    Testimonial Section Start    -->
<!-- <section class="container testimonial-section">
   <div class="row">
      <div class="title-box">
         <h2>testimonial</h2>
         <h3>What Clients Say</h3>
         <p>
            Client satisfaction is my biggest achievement. Here's what my
            clients say about working with me.
         </p>
      </div>
      <div class="testimonial-slider owl-carousel">
         <div class="testimonial-box">
            <div class="quote-icon">
               <i class="fa-solid fa-quote-right"></i>
            </div>
            <p class="testimonial-desc">
               Working with Mayur was an outstanding experience. He delivered
               our WordPress website on time with excellent quality and
               clean coding.
            </p>
            <ul class="rating">
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
            </ul>
            <div class="client-info">
               <div class="client-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/slide-1.png" alt="">
               </div>
               <div class="client-text">
                  <h4>John Smith</h4>
                  <span>CEO, Creative Agency</span>
               </div>
            </div>
         </div>
         <div class="testimonial-box">
            <div class="quote-icon">
               <i class="fa-solid fa-quote-right"></i>
            </div>
            <p class="testimonial-desc">
               Amazing communication and pixel-perfect development.
               Highly recommended for WordPress custom theme projects.
            </p>
            <ul class="rating">
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
            </ul>
            <div class="client-info">
               <div class="client-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/slide-4.png" alt="">
               </div>
               <div class="client-text">
                  <h4>David Wilson</h4>
                  <span>Business Owner</span>
               </div>
            </div>
         </div>
         <div class="testimonial-box">
            <div class="quote-icon">
               <i class="fa-solid fa-quote-right"></i>
            </div>
            <p class="testimonial-desc">
               Professional, creative and always available for support.
               The website performance exceeded our expectations.
            </p>
            <ul class="rating">
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
               <li><i class="fa-solid fa-star"></i></li>
            </ul>
            <div class="client-info">
               <div class="client-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/slide-2.png" alt="">
               </div>
               <div class="client-text">
                  <h4>Emily Johnson</h4>
                  <span>Marketing Manager</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--    Testimonial Section End    -->
<!--    Collaborators Section Start    -->
<!-- <section class="container collaborators-section">
   <div class="row">
      <div class="title-box">
         <h2>Collaborators</h2>
         <h3>Meet the Creative Minds I Work With</h3>
         <p>
            Great projects are built through collaboration. I'm proud to
            work with talented professionals who bring creativity,
            innovation and expertise to every project.
         </p>
      </div>
      <div class="collaborators-wrap">
         <div class="collaborator-box">
            <div class="collaborator-img">
               <img src="<?php echo get_template_directory_uri(); ?>/images/slide1.png" alt="">
               <div class="collaborator-overlay">
                  <ul class="social-icon">
                     <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                     <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                  </ul>
               </div>
            </div>
            <div class="collaborator-content">
               <h4>John Smith</h4>
               <span>UI / UX Designer</span>
            </div>
         </div>
         <div class="collaborator-box">
            <div class="collaborator-img">
               <img src="<?php echo get_template_directory_uri(); ?>/images/slide5.png" alt="">
               <div class="collaborator-overlay">
                  <ul class="social-icon">
                     <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                     <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                  </ul>
               </div>
            </div>
            <div class="collaborator-content">
               <h4>Emily Wilson</h4>
               <span>Graphic Designer</span>
            </div>
         </div>
         <div class="collaborator-box">
            <div class="collaborator-img">
               <img src="<?php echo get_template_directory_uri(); ?>/images/slide2.png" alt="">
               <div class="collaborator-overlay">
                  <ul class="social-icon">
                     <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                     <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                  </ul>
               </div>
            </div>
            <div class="collaborator-content">
               <h4>David Johnson</h4>
               <span>SEO Specialist</span>
            </div>
         </div>
         <div class="collaborator-box">
            <div class="collaborator-img">
               <img src="<?php echo get_template_directory_uri(); ?>/images/slide4.png" alt="">
               <div class="collaborator-overlay">
                  <ul class="social-icon">
                     <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                     <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                  </ul>
               </div>
            </div>
            <div class="collaborator-content">
               <h4>Michael Brown</h4>
               <span>Backend Developer</span>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--   Collaborators Section End   -->
<!--   CTA Section Start   -->
<!-- <section class="container cta-section">
   <div class="row">
      <div class="cta-box">
         <span>Let's Build Something Great</span>
         <h2>Have Any Project In Mind?</h2>
         <p>
            I'm available for freelance projects, custom WordPress development,
            website redesign and long-term support. Let's discuss your next project.
         </p>
         <div class="cta-btn">
            <a href="#" class="theme-btn">Hire Me</a>
            <a href="#" class="border-btn">Download CV</a>
         </div>
      </div>
   </div>
</section> -->
<!--  CTA Section End  -->



<?php

get_footer();
