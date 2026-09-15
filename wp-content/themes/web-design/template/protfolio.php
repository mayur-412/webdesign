<?php
   /**
    * Template Name: Protfolio
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
if( have_rows('portfolio_page') ):

    // Loop through rows.
    while ( have_rows('portfolio_page') ) : the_row();

  // Case: Paragraph layout.
  if( get_row_layout() == 'portfolio_banner' ):
      $portfolio_title = get_sub_field('portfolio_title');
      $portfolio_btn = get_sub_field('portfolio_btn');
      $url = get_the_post_thumbnail_url();
?> <section class="container inner-banner" style="background: url(<?php echo $url; ?>)  no-repeat top center;">
   <div class="row">
      <div class="table">
         <div class="table-cell">
            <div class="banner-content">
               <h1><?php echo $portfolio_title; ?></h1>
               <ul class="breadcrumb">
                  <?php foreach ($portfolio_btn as $btn) {
                  ?> <li><a href="<?php echo $btn['portfolio_link']['url']; ?>" title="<?php echo $btn['portfolio_link']['title']; ?>"><?php echo $btn['portfolio_link']['title']; ?></a></li> <?php
                  } ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section> <?php

  // Case: Download layout.
  elseif( get_row_layout() == 'project_section' ): 
      $project_title = get_sub_field('project_title');
      $project_label = get_sub_field('project_label');
      $project_desc = get_sub_field('project_desc');
      $project_img = get_sub_field('project_img');
      $project_box = get_sub_field('project_box');
?> <section class="container featured-project-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $project_title; ?></h2>
         <h3><?php echo $project_label; ?></h3>
         <p><?php echo $project_desc; ?></p>
      </div>
      <div class="featured-project-wrapper">
         <div class="featured-project-image">
            <img src="<?php echo $project_img; ?>" alt="">
         </div>
         <div class="featured-project-content">
            <?php foreach ($project_box as $box) {
               $project_date = $box['project_date'];
               $project_btn = $box['project_btn'];
             ?> <span><?php echo $box['project_button']; ?></span>
            <h4><?php echo $box['project_heading']; ?></h4>
            <p><?php echo $box['project_content']; ?></p>
            <ul class="project-info">
               <?php foreach ($project_date as $date) {
                   ?> <li><strong><?php echo $date['project_detail']; ?></strong> <?php echo $date['project_name']; ?></li> <?php
                  } ?>
            </ul>
            <div class="project-btn">
               <?php foreach ($project_btn as $link) {
                  ?> <a href="<?php echo $link['project_link']['url']; ?>" title="<?php echo $link['project_link']['title']; ?>"><?php echo $link['project_link']['title']; ?></a> <?php
                ?> <?php
               } ?>
            </div> <?php
            } ?>
         </div>
      </div>
   </div>
</section> <?php

 elseif( get_row_layout() == 'gallery_section' ): 
      $gallery_title = get_sub_field('gallery_title');
      $gallery_label = get_sub_field('gallery_label');
      $gallery_desc = get_sub_field('gallery_desc');
      $gallery_card = get_sub_field('gallery_card');
?> <section class="container portfolio-gallery-section">
   <div class="row">
      <div class="title-box">
         <h2>My Portfolio</h2>
         <h3>Selected Projects</h3>
         <p>
            Explore some of my recent web design and WordPress development projects crafted with modern technologies and creative solutions.
         </p>
      </div>
      <div class="portfolio-gallery">
         <?php foreach ($gallery_card as $key => $card) {
           ?> <div class="portfolio-item">
            <div class="portfolio-image">
               <img src="<?php echo $card['gallery_bg']; ?>" alt="">
               <div class="portfolio-overlay">
                  <span><?php echo $card['gallery_span']; ?></span>
                  <h4><?php echo $card['gallery_heading']; ?></h4>
                  <a href="<?php echo $card['gallery_btn']['url']; ?>" title="<?php echo $card['gallery_btn']['title']; ?>"><?php echo $card['gallery_btn']['title']; ?><i class="<?php echo $card['gallery_icon']; ?>"></i></a>
               </div>
            </div>
         </div> <?php
         } ?>
      </div>
   </div>
</section> <?php

 elseif( get_row_layout() == 'casestudy__sec' ): 
      $casestudy_title = get_sub_field('casestudy_title');
      $casestudy_label = get_sub_field('casestudy_label');
      $casestudy_desc = get_sub_field('casestudy_desc');
      $casestudy_box = get_sub_field('casestudy_box');
?> <section class="container case-study-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $casestudy_title; ?></h2>
         <h3><?php echo $casestudy_label; ?></h3>
         <p><?php echo $casestudy_desc; ?></p>
      </div>
      <?php foreach ($casestudy_box as $case) {
         $casestudy_part = $case['casestudy_part'];
        ?> <div class="case-study-wrapper">
         <div class="case-study-image">
            <img src="<?php echo $case['casestudy_bg']; ?>" alt="Case Study">
         </div>
         <div class="case-study-content">
            <span><?php echo $case['casestudy_span']; ?></span>
            <h4><?php echo $case['casestudy_heading']; ?></h4>
            <p><?php echo $case['casestudy_contetn']; ?></p>
            <?php foreach ($casestudy_part as $casebox) {
               ?> <div class="case-box">
               <h5><?php echo $casebox['part_title']; ?></h5>
               <p><?php echo $casebox['part_desc']; ?></p>
               <ul>
               <?php
                $part_box = $casebox['part_box'];
                if(!empty($part_box)){ foreach ($part_box as $main) {
                    ?>  <li><?php echo $main['part_label']; ?></li> <?php } } ?>
               </ul>
            </div> <?php
            } ?>
            <a href="<?php echo $case['casestudy_link']['url']; ?>" title="<?php echo $case['casestudy_link']['title']; ?>" class="theme-btn"><?php echo $case['casestudy_link']['title']; ?></a>
         </div>
      </div> <?php
      } ?>
   </div>
</section> <?php


 elseif( get_row_layout() == 'highlights_section' ): 
      $highlights_title = get_sub_field('highlights_title');
      $highlights_label = get_sub_field('highlights_label');
      $highlights_desc = get_sub_field('highlights_desc');
      $highlights_box = get_sub_field('highlights_box');
?> <section class="container highlights-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $highlights_title; ?></h2>
         <h3><?php echo $highlights_label; ?></h3>
         <p><?php echo $highlights_desc; ?></p>
      </div>
      <div class="highlights-wrapper">
         <?php foreach ($highlights_box as $highlight) {
           ?> <div class="highlight-box">
            <i class="<?php echo $highlight['highlights_icon']; ?>"></i>
            <h4><?php echo $highlight['highlights_heading']; ?></h4>
            <p><?php echo $highlight['highlights_content']; ?></p>
         </div> <?php
         } ?>
      </div>
   </div>
</section> <?php


 elseif( get_row_layout() == 'discussion_section' ): 
      $discussion_sec = get_sub_field('discussion_sec');
?> <section class="container project-discussion-section">
   <div class="row">
      <?php foreach ($discussion_sec as $discus) {
        $discussion_date = $discus['discussion_date']
        ?> <div class="project-discussion-wrapper">
         <div class="project-discussion-content">
            <span><?php echo $discus['discussion_label']; ?></span>
            <h2><?php echo $discus['discussion_title']; ?></h2>
            <p><?php echo $discus['discussion_desc']; ?></p>
            <ul>
               <?php foreach ($discussion_date as $text)
               ?> <li><i class="<?php echo $text['discussion_icon']; ?>"></i> <?php echo $text['discussion_text']; ?></li> <?php ?>
            </ul>
            <a href="<?php echo $discus['discussion_link']['url']; ?>" title="<?php echo $discus['discussion_link']['title']; ?>" class="theme-btn"><?php echo $discus['discussion_link']['title']; ?></a>
         </div>
         <div class="project-discussion-image">
            <img src="<?php echo $discus['discussion_bg']; ?>" alt="">
         </div>
      </div> <?php
      } ?>
   </div>
</section> <?php

elseif( get_row_layout() == 'workflow_section' ): 
      $workflow_title = get_sub_field('workflow_title');
      $workflow_label = get_sub_field('workflow_label');
      $workflow_desc = get_sub_field('workflow_desc');
      $workflow_box = get_sub_field('workflow_box');
?> <section class="container workflow-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $workflow_title; ?></h2>
         <h3><?php echo $workflow_label; ?></h3>
         <p><?php echo $workflow_desc; ?></p>
      </div>
      <div class="workflow-wrapper">
         <?php foreach ($workflow_box as $flow) {
           ?> <div class="workflow-item <?php echo $flow['workflow_class']; ?>">
            <div class="workflow-icon">
               <i class="<?php echo $flow['workflow_icon']; ?>"></i>
            </div>
            <div class="workflow-content">
               <span><?php echo $flow['workflow_id']; ?></span>
               <h4><?php echo $flow['workflow_heading']; ?></h4>
               <p><?php echo $flow['workflow_content']; ?></p>
            </div>
         </div> <?php
         } ?>
      </div>
   </div>
</section> <?php


elseif( get_row_layout() == 'project_highlights' ): 
      $pro_title = get_sub_field('pro_title');
      $pro_label = get_sub_field('pro_label');
      $pro_desc = get_sub_field('pro_desc');
      $pro_box = get_sub_field('pro_box');
?> <section class="container project-highlight-section">
   <div class="row">
      <div class="title-box">
         <h2>Project Highlights</h2>
         <h3>Quality That Makes Every Project Better</h3>
         <p>
            I focus on creating websites that are fast, user-friendly,
            visually appealing and built with modern development standards.
         </p>
      </div>
      <div class="project-highlight-wrapper">
         <?php foreach($pro_box as $pro){
          ?> <div class="highlight-card">
            <div class="highlight-icon">
               <i class="<?php echo $pro['pro_icon']; ?>"></i>
            </div>
            <h4><?php echo $pro['pro_heading']; ?></h4>
            <p><?php echo $pro['pro_content']; ?></p>
         </div> <?php
         } ?>
      </div>
   </div>
</section> <?php


elseif( get_row_layout() == 'categories_section' ): 
      $category_title = get_sub_field('category_title');
      $category_label = get_sub_field('category_label');
      $category_desc = get_sub_field('category_desc');
      $category_type = get_sub_field('category_type');
?> <section class="container project-category-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $category_title; ?></h2>
         <h3><?php echo $category_label; ?></h3>
         <p><?php echo $category_desc; ?></p>
      </div>
      <div class="topics-slider">
         <div class="topics-track">
         <?php foreach ($category_type as $type) {
          ?> <a href="#"><?php echo $type['category']; ?></a> <?php
         } ?>
         </div>
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
               <h2><?php echo $faq_title; ?></h2>
               <h3><?php echo $faq_label; ?></h3>
               <p><?php echo $faq_desc; ?></p>
            </div>
         </div>
         <div class="faq-right">
            <?php foreach ($faq_box as $faq) {
         ?> <div class="faq-item <?php if(!empty($faq['class_name'])){ ?> <?php echo $faq['class_name']; ?>
              <?php } ?>">
               <button class="faq-question">
               <span><?php echo $faq['faq_heading']; ?></span>
               <i class="<?php echo $faq['faq_icon']; ?>"></i>
               </button>
               <div class="faq-answer">
                  <p><?php echo $faq['faq_content']; ?></p>
               </div>
            </div> <?php
            } ?>
            </div>
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
endif;
?>
<!--      Inner Banner Start     -->
<!-- <section class="container inner-banner">
   <div class="row">
      <div class="table">
         <div class="table-cell">
            <div class="banner-content">
               <h1>My Protfolio</h1>
               <ul class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#" title="about me">My Protfolio</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--     Inner Banner End      -->
<!--   Featured Project Start    -->
<!-- <section class="container featured-project-section">
   <div class="row">
      <div class="title-box">
         <h2>Featured Project</h2>
         <h3>Recent Work Showcase</h3>
         <p>
            A glimpse of one of my latest projects, built with modern technologies,
            responsive layouts and clean development standards.
         </p>
      </div>
      <div class="featured-project-wrapper">
         <div class="featured-project-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/project-1.jpg" alt="">
         </div>
         <div class="featured-project-content">
            <span>Corporate Website</span>
            <h4>
               Modern Business Website Development
            </h4>
            <p>
               Designed and developed a responsive corporate website using
               WordPress, Bootstrap, PHP and ACF with performance optimization,
               clean UI and SEO-friendly structure.
            </p>
            <ul class="project-info">
               <li>
                  <strong>Client :</strong>
                  Business Agency
               </li>
               <li>
                  <strong>Category :</strong>
                  WordPress Development
               </li>
               <li>
                  <strong>Duration :</strong>
                  3 Weeks
               </li>
               <li>
                  <strong>Technologies :</strong>
                  HTML, CSS, JavaScript, PHP, WordPress
               </li>
            </ul>
            <div class="project-btn">
               <a href="#" class="theme-btn">
               Live Preview
               </a>
               <a href="#" class="theme-btn-outline">
               View Details
               </a>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--   Featured Project End    -->
<!-- Portfolio Gallery Start  -->
<!-- <section class="container portfolio-gallery-section">
   <div class="row">
      <div class="title-box">
         <h2>My Portfolio</h2>
         <h3>Selected Projects</h3>
         <p>
            Explore some of my recent web design and WordPress development projects crafted with modern technologies and creative solutions.
         </p>
      </div>
      <div class="portfolio-gallery">
         <div class="portfolio-item">
            <div class="portfolio-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/project-2.jpg" alt="">
               <div class="portfolio-overlay">
                  <span>WordPress</span>
                  <h4>Business Website</h4>
                  <a href="#">
                  View Project
                  <i class="fa-solid fa-arrow-right-long"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="portfolio-item">
            <div class="portfolio-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/project-3.jpg" alt="">
               <div class="portfolio-overlay">
                  <span>UI / UX</span>
                  <h4>Landing Page</h4>
                  <a href="#">
                  View Project
                  <i class="fa-solid fa-arrow-right-long"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="portfolio-item">
            <div class="portfolio-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/project-4.jpg" alt="">
               <div class="portfolio-overlay">
                  <span>E-Commerce</span>
                  <h4>Online Store</h4>
                  <a href="#">
                  View Project
                  <i class="fa-solid fa-arrow-right-long"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="portfolio-item">
            <div class="portfolio-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/project-5.jpg" alt="">
               <div class="portfolio-overlay">
                  <span>Portfolio</span>
                  <h4>Personal Website</h4>
                  <a href="#">
                  View Project
                  <i class="fa-solid fa-arrow-right-long"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="portfolio-item">
            <div class="portfolio-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/project-6.jpg" alt="">
               <div class="portfolio-overlay">
                  <span>Dashboard</span>
                  <h4>Admin Panel</h4>
                  <a href="#">
                  View Project
                  <i class="fa-solid fa-arrow-right-long"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="portfolio-item">
            <div class="portfolio-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/project-7.jpg" alt="">
               <div class="portfolio-overlay">
                  <span>Corporate</span>
                  <h4>Company Website</h4>
                  <a href="#">
                  View Project
                  <i class="fa-solid fa-arrow-right-long"></i>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!-- Portfolio Gallery End  -->
<!--     Case Study Start  -->
<!-- <section class="container case-study-section">
   <div class="row">
      <div class="title-box">
         <h2>Case Study</h2>
         <h3>From Challenge To Successful Solution</h3>
         <p>
            Every project starts with understanding the client's goals and
            delivering a modern, responsive and high-performing website.
         </p>
      </div>
      <div class="case-study-wrapper">
         <div class="case-study-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/protfolio.jpg" alt="Case Study">
         </div>
         <div class="case-study-content">
            <span>Featured Project</span>
            <h4>Corporate Business Website</h4>
            <p>
               A complete redesign and development of a corporate website
               focused on improving performance, user experience and online
               visibility.
            </p>
            <div class="case-box">
               <h5>Challenge</h5>
               <p>
                  The previous website had an outdated design, poor mobile
                  experience and slow loading speed.
               </p>
            </div>
            <div class="case-box">
               <h5>Solution</h5>
               <p>
                  Developed a fully responsive WordPress website using
                  HTML5, CSS3, Bootstrap, PHP and ACF with optimized code.
               </p>
            </div>
            <div class="case-box">
               <h5>Results</h5>
               <ul>
                  <li>98+ Google PageSpeed Score</li>
                  <li>100% Responsive Design</li>
                  <li>SEO Friendly Structure</li>
                  <li>40% Faster Loading Time</li>
               </ul>
            </div>
            <a href="#" class="theme-btn">
            View Project
            </a>
         </div>
      </div>
   </div>
</section> -->
<!--     Case Study End  -->
<!--     Professional Highlights Start  -->
<!-- <section class="container highlights-section">
   <div class="row">
      <div class="title-box">
         <h2>Professional Highlights</h2>
         <h3>What Makes My Work Different</h3>
         <p>
            Every project is developed with attention to quality,
            performance and long-term maintainability.
         </p>
      </div>
      <div class="highlights-wrapper">
         <div class="highlight-box">
            <i class="fa-solid fa-code"></i>
            <h4>Clean Code</h4>
            <p>
               Well-structured and maintainable code following best practices.
            </p>
         </div>
         <div class="highlight-box">
            <i class="fa-solid fa-mobile-screen"></i>
            <h4>Responsive Design</h4>
            <p>
               Pixel-perfect layouts optimized for every screen size.
            </p>
         </div>
         <div class="highlight-box">
            <i class="fa-solid fa-gauge-high"></i>
            <h4>High Performance</h4>
            <p>
               Fast loading websites with optimized assets and SEO structure.
            </p>
         </div>
         <div class="highlight-box">
            <i class="fa-brands fa-wordpress"></i>
            <h4>WordPress Expert</h4>
            <p>
               Custom themes, ACF development and scalable WordPress solutions.
            </p>
         </div>
      </div>
   </div>
</section> -->
<!--     Professional Highlights End  -->
<!--     Project Discussion Start  -->
<!-- <section class="container project-discussion-section">
   <div class="row">
      <div class="project-discussion-wrapper">
         <div class="project-discussion-content">
            <span>Let's Work Together</span>
            <h2>
               Have A Project In Mind?
            </h2>
            <p>
               Whether you need a modern business website, WordPress
               development or a completely custom web solution, I'm ready
               to help transform your ideas into reality.
            </p>
            <ul>
               <li>
                  <i class="fa-solid fa-circle-check"></i>
                  Modern UI / UX Design
               </li>
               <li>
                  <i class="fa-solid fa-circle-check"></i>
                  Responsive Development
               </li>
               <li>
                  <i class="fa-solid fa-circle-check"></i>
                  WordPress Custom Theme
               </li>
               <li>
                  <i class="fa-solid fa-circle-check"></i>
                  SEO Friendly Structure
               </li>
            </ul>
            <a href="contact.html" class="theme-btn">
            Start Your Project
            </a>
         </div>
         <div class="project-discussion-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/meeting.jpg" alt="">
         </div>
      </div>
   </div>
</section> -->
<!--     Project Discussion End  -->
<!--     Project Workflow Start  -->
<!-- <section class="container workflow-section">
   <div class="row">
      <div class="title-box">
         <h2>Project Workflow</h2>
         <h3>How I Turn Ideas Into Reality</h3>
         <p>
            Every project follows a structured workflow to ensure quality,
            performance and a smooth client experience from start to finish.
         </p>
      </div>
      <div class="workflow-wrapper">
         <div class="workflow-item left">
            <div class="workflow-icon">
               <i class="fa-solid fa-lightbulb"></i>
            </div>
            <div class="workflow-content">
               <span>01</span>
               <h4>Discovery</h4>
               <p>
                  Understanding your business goals, audience and project requirements.
               </p>
            </div>
         </div>
         <div class="workflow-item right">
            <div class="workflow-icon">
               <i class="fa-solid fa-sitemap"></i>
            </div>
            <div class="workflow-content">
               <span>02</span>
               <h4>Planning</h4>
               <p>
                  Preparing sitemap, structure and development strategy.
               </p>
            </div>
         </div>
         <div class="workflow-item left">
            <div class="workflow-icon">
               <i class="fa-solid fa-pen-ruler"></i>
            </div>
            <div class="workflow-content">
               <span>03</span>
               <h4>UI / UX Design</h4>
               <p>
                  Creating a modern, clean and user-friendly interface.
               </p>
            </div>
         </div>
         <div class="workflow-item right">
            <div class="workflow-icon">
               <i class="fa-solid fa-code"></i>
            </div>
            <div class="workflow-content">
               <span>04</span>
               <h4>Development</h4>
               <p>
                  Converting designs into fast, responsive and scalable websites.
               </p>
            </div>
         </div>
         <div class="workflow-item left">
            <div class="workflow-icon">
               <i class="fa-solid fa-vial-circle-check"></i>
            </div>
            <div class="workflow-content">
               <span>05</span>
               <h4>Testing</h4>
               <p>
                  Checking responsiveness, browser compatibility and performance.
               </p>
            </div>
         </div>
         <div class="workflow-item right">
            <div class="workflow-icon">
               <i class="fa-solid fa-rocket"></i>
            </div>
            <div class="workflow-content">
               <span>06</span>
               <h4>Launch</h4>
               <p>
                  Deploying the website and providing post-launch support.
               </p>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--     Project Workflow End  -->
<!--     Project Highlights Start  -->
<!-- <section class="container project-highlight-section">
   <div class="row">
      <div class="title-box">
         <h2>Project Highlights</h2>
         <h3>Quality That Makes Every Project Better</h3>
         <p>
            I focus on creating websites that are fast, user-friendly,
            visually appealing and built with modern development standards.
         </p>
      </div>
      <div class="project-highlight-wrapper">
         <div class="highlight-card">
            <div class="highlight-icon">
               <i class="fa-solid fa-bolt"></i>
            </div>
            <h4>Fast Performance</h4>
            <p>
               Optimized websites with clean code and better loading speed.
            </p>
         </div>
         <div class="highlight-card">
            <div class="highlight-icon">
               <i class="fa-solid fa-palette"></i>
            </div>
            <h4>Modern UI Design</h4>
            <p>
               Creative layouts with attractive and user-friendly interfaces.
            </p>
         </div>
         <div class="highlight-card">
            <div class="highlight-icon">
               <i class="fa-solid fa-mobile-screen"></i>
            </div>
            <h4>Responsive Layout</h4>
            <p>
               Websites that work smoothly on desktop, tablet and mobile.
            </p>
         </div>
         <div class="highlight-card">
            <div class="highlight-icon">
               <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <h4>SEO Friendly</h4>
            <p>
               Proper structure and optimized development for search engines.
            </p>
         </div>
         <div class="highlight-card">
            <div class="highlight-icon">
               <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h4>Secure Code</h4>
            <p>
               Clean and maintainable development with security practices.
            </p>
         </div>
         <div class="highlight-card">
            <div class="highlight-icon">
               <i class="fa-solid fa-gears"></i>
            </div>
            <h4>Easy Management</h4>
            <p>
               Flexible WordPress solutions that are easy to manage.
            </p>
         </div>
      </div>
   </div>
</section> -->
<!--     Project Highlights End  -->
<!--     Project Categories Start  -->
<!-- <section class="container project-category-section">
   <div class="row">
      <div class="title-box">
         <h2>Project Categories</h2>
         <h3>Explore My Work By Type</h3>
         <p>
            Browse projects based on different technologies,
            industries and development solutions.
         </p>
      </div>
      <div class="topics-slider">
         <div class="topics-track">
         <a href="#">All Projects</a>
         <a href="#">WordPress</a>
         <a href="#">Business Website</a>
         <a href="#">E-Commerce</a>
         <a href="#">Landing Page</a>
         <a href="#">Portfolio</a>
         <a href="#">UI / UX</a>
         <a href="#">Custom PHP</a>
         <a href="#">All Projects</a>
         <a href="#">WordPress</a>
         <a href="#">Business Website</a>
         <a href="#">E-Commerce</a>
         <a href="#">Landing Page</a>
         <a href="#">Portfolio</a>
         <a href="#">UI / UX</a>
         <a href="#">Custom PHP</a>
         </div>
      </div>
   </div>
</section> -->
<!--     Project Categories End  -->
<!--   FAQ Start    -->
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
<?php
get_footer();