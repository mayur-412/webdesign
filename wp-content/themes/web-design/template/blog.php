<?php
   /**
    * Template Name: Blog page
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

if( have_rows('blog_content') ):

    // Loop through rows.
    while ( have_rows('blog_content') ) : the_row();
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
               <?php foreach ($inner_btn as $btn) {
                ?> <li><a href="<?php echo $btn['inner_link']['url']; ?>" title="<?php echo $btn['inner_link']['title']; ?>"><?php echo $btn['inner_link']['title']; ?></a></li> <?php
               } ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section> <?php

   // Case: Download layout.
   elseif( get_row_layout() == 'articles_section' ): 
      $articles_title = get_sub_field('articles_title');
      $articles_label = get_sub_field('articles_label');
      $articles_desc = get_sub_field('articles_desc');
      $articles_box = get_sub_field('articles_box');
?> <section class="container blog-section">
   <div class="row">
      <div class="title-box">
         <h2>Latest Articles</h2>
         <h3>Insights & Tutorials</h3>
         <p>
            Discover web development tips, WordPress tutorials and modern UI/UX insights.
         </p>
      </div>
      <div class="blog-grid">
         <?php foreach($articles_box as $articl){
          $articles_top = $articl['articles_top'];
          ?> <article class="blog-card">
            <div class="blog-image">
               <img src="<?php echo $articl['articles_bg']; ?>" alt="">
               <span><?php echo $articl['articles_span']; ?></span>
            </div>
            <div class="blog-content">
               <ul class="blog-meta">
                  <?php foreach ($articles_top as $top) {
                    ?>  <li><i class="<?php echo $top['top_class']; ?>"></i><?php echo $top['top_text']; ?></li> <?php
                  } ?>
               </ul>
               <h4><?php echo $articl['articles_heading']; ?></h4>
               <p><?php echo $articl['articles_content']; ?></p>
               <a href="<?php echo $articl['articles_link']['url']; ?>" title="<?php echo $articl['articles_link']['title']; ?>"><?php echo $articl['articles_link']['title']; ?><i class="<?php echo $articl['articles_icon']; ?>"></i>
               </a>
            </div>
         </article> <?php
         } ?>
      </div>
   </div>
</section> <?php

elseif( get_row_layout() == 'newsletter_section' ): 
   $newsletter_label = get_sub_field('newsletter_label');
   $newsletter_title = get_sub_field('newsletter_title');
   $newsletter_desc = get_sub_field('newsletter_desc');
?> <section class="container newsletter-section">
   <div class="row">
      <div class="newsletter-wrapper">
         <span><?php echo $newsletter_label; ?></span>
         <h2><?php echo $newsletter_title; ?></h2>
         <p><?php echo $newsletter_desc; ?></p>
         <?php echo do_shortcode('[contact-form-7 id="8423235" title="Blog form"]'); ?>
      </div>
   </div>
</section> <?php



elseif( get_row_layout() == 'cta_section' ): 
   $cta_title = get_sub_field('cta_title');
   $cta_label = get_sub_field('cta_label');
   $cta_desc = get_sub_field('cta_desc');
   $cta_btn = get_sub_field('cta_btn');

?> <section class="container cta-section">
   <div class="row">
      <div class="cta-wrapper">
         <span><?php echo $cta_label; ?></span>
         <h2><?php echo $cta_title; ?></h2>
         <p><?php echo $cta_desc; ?></p>
         <div class="cta-btn">
            <?php foreach ($cta_btn as $link) {
              ?> <a href="<?php echo $link['cta_link']['url']?>;" title="<?php echo $link['cta_link']['title']?>" class="theme-btn"><?php echo $link['cta_link']['title']?></a> <?php
            } ?>
            </a>
         </div>
      </div>
   </div>
</section> <?php



elseif( get_row_layout() == 'post_section' ):
   $post_title = get_sub_field('post_title');
   $post_label = get_sub_field('post_label');
   $post_desc = get_sub_field('post_desc');
   $post_box = get_sub_field('post_box');
?> <section class="container recent-post-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $post_title; ?></h2>
         <h3><?php echo $post_label; ?></h3>
         <p><?php echo $post_desc; ?></p>
      </div>
      <div class="recent-post-grid">
         <?php foreach ($post_box as $post_date) {
           ?> <article class="recent-post-card">
            <div class="recent-post-image">
               <img src="<?php echo $post_date['post_bg']; ?>" alt="">
            </div>
            <div class="recent-post-content">
               <span><?php echo $post_date['post_span']; ?></span>
               <h4><?php echo $post_date['post_heading']; ?></h4>
               <a href="<?php echo $post_date['post_link']['url']; ?>" title="<?php echo $post_date['post_link']['title']; ?>"><?php echo $post_date['post_link']['title']; ?><i class="<?php echo $post_date['post_icon']; ?>"></i></a>
            </div>
         </article> <?php
         } ?>
      </div>
   </div>
</section>
 <?php

elseif( get_row_layout() == 'profile_section' ): 
   $profile_bg = get_sub_field('profile_bg');
   $profile_label = get_sub_field('profile_label');
   $profile_title = get_sub_field('profile_title');
    $profile_span = get_sub_field('profile_span');
   $profile_desc = get_sub_field('profile_desc');
   $profile_media = get_sub_field('profile_media');
?>
 <section class="container author-section">
   <div class="row">
      <div class="author-wrapper">
         <div class="author-image">
            <img src="<?php echo $profile_bg; ?>" alt="Author">
         </div>
         <div class="author-content">
            <span><?php echo $profile_label; ?></span>
            <h2><?php echo $profile_title; ?></h2>
            <h4><?php echo $profile_span; ?></h4>
            <p><?php echo $profile_desc; ?></p>
            <div class="author-social">
               <?php foreach($profile_media as $pro_link){
                  ?> <a href="<?php echo $pro_link['media_link']['url']; ?>" title="<?php echo $pro_link['media_link']['title']; ?>"><i class="<?php echo $pro_link['profile_icon']; ?>"></i></a> <?php
               } ?>
            </div>
         </div>
      </div>
   </div>
</section>
<?php

elseif( get_row_layout() == 'category_section' ): 
   $category_title = get_sub_field('category_title');
   $category_label = get_sub_field('category_label');
   $category_desc = get_sub_field('category_desc');
   $category_box = get_sub_field('category_box');
?>  <section class="container topics-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $category_title; ?></h2>
         <h3><?php echo $category_label; ?></h3>
         <p><?php echo $category_desc; ?></p>
      </div>
      <div class="topics-slider">
         <div class="topics-track">
            <?php foreach ($category_box as $on_top) {
             ?> <a href="#" title=""><?php echo $on_top['category_media']; ?></a> <?php
            } ?>
         </div>
      </div>
   </div>
</section> <?php


elseif( get_row_layout() == 'github_section' ): 
   $github_title = get_sub_field('github_title');
   $github_label = get_sub_field('github_label');
   $github_desc = get_sub_field('github_desc');
   $github_box = get_sub_field('github_box');
?> <section class="container github-section">
   <div class="row">
      <div class="title-box">
         <h2><?php echo $github_title; ?></h2>
         <h3><?php echo $github_label; ?></h3>
         <p><?php echo $github_desc; ?></p>
      </div>
      <?php foreach ($github_box as $git) {
         $source_link = $git['source_link'];
       ?> <div class="github-wrapper">
         <div class="github-content">
            <span><?php echo $git['github_span']; ?>;</span>
            <h4><?php echo $git['github_heading']; ?></h4>
            <p><?php echo $git['github_content']; ?></p>
            <div class="tech-stack">
              <?php foreach ($source_link as $source) {
                ?> <span><?php echo $source['source_text']; ?></span> <?php
              } ?>
            </div>
            <a href="<?php echo $git['github_link']['url']; ?>" class="theme-btn" title="<?php echo $git['github_link']['title']; ?>"><?php echo $git['github_link']['title']; ?></a>
         </div>
         <div class="github-image">
            <img src="<?php echo $git['github_bg']; ?>" alt="">
         </div>
      </div> <?php
      } ?>
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
            <?php foreach ($faq_box as $answer) {
              ?> <div class="faq-item <?php if(!empty($answer['faq_class'])){ ?> <?php echo $answer['faq_class'];?> <?php } ?>">
               <button class="faq-question">
               <span><?php echo $answer['faq_heading'];?></span>
               <i class="<?php echo $answer['faq_icon'];?>"></i>
               </button>
               <div class="faq-answer">
                  <p><?php echo $answer['faq_content'];?></p>
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
               <h1>Our Blog</h1>
               <ul class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#" title="about me">Our Blog</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--     Inner Banner End      -->
<!--Latest Articles Start  -->
<!-- <section class="container blog-section">
   <div class="row">
      <div class="title-box">
         <h2>Latest Articles</h2>
         <h3>Insights & Tutorials</h3>
         <p>
            Discover web development tips, WordPress tutorials and modern UI/UX insights.
         </p>
      </div>
      <div class="blog-grid">
         <article class="blog-card">
            <div class="blog-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/post-1.jpg" alt="">
               <span>Development</span>
            </div>
            <div class="blog-content">
               <ul class="blog-meta">
                  <li>
                     <i class="fa-regular fa-calendar"></i>
                     24 June 2026
                  </li>
                  <li>
                     <i class="fa-regular fa-user"></i>
                     Admin
                  </li>
               </ul>
               <h4>
                  Modern WordPress Development Best Practices
               </h4>
               <p>
                  Learn modern techniques to build secure, responsive and high-performance WordPress websites.
               </p>
               <a href="#">
               Read More
               <i class="fa-solid fa-arrow-right-long"></i>
               </a>
            </div>
         </article>
         <article class="blog-card">
            <div class="blog-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/post-5.jpg" alt="">
               <span>Design</span>
            </div>
            <div class="blog-content">
               <ul class="blog-meta">
                  <li>
                     <i class="fa-regular fa-calendar"></i>
                     20 June 2026
                  </li>
                  <li>
                     <i class="fa-regular fa-user"></i>
                     Admin
                  </li>
               </ul>
               <h4>
                  UI/UX Trends Every Designer Should Know
               </h4>
               <p>
                  Explore the latest UI trends that improve user experience and increase engagement.
               </p>
               <a href="#">
               Read More
               <i class="fa-solid fa-arrow-right-long"></i>
               </a>
            </div>
         </article>
         <article class="blog-card">
            <div class="blog-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/post-6.jpg" alt="">
               <span>WordPress</span>
            </div>
            <div class="blog-content">
               <ul class="blog-meta">
                  <li>
                     <i class="fa-regular fa-calendar"></i>
                     18 June 2026
                  </li>
                  <li>
                     <i class="fa-regular fa-user"></i>
                     Admin
                  </li>
               </ul>
               <h4>
                  ACF Tips For Faster WordPress Development
               </h4>
               <p>
                  Save development time using Advanced Custom Fields with flexible content layouts.
               </p>
               <a href="#">
               Read More
               <i class="fa-solid fa-arrow-right-long"></i>
               </a>
            </div>
         </article>
      </div>
   </div>
</section> -->
<!--    Latest Articles End    -->
<!--    Newsletter Start   -->
<!-- <section class="container newsletter-section">
   <div class="row">
      <div class="newsletter-wrapper">
         <span>Stay Updated</span>
         <h2>Subscribe To My Newsletter</h2>
         <p>
            Get the latest web development tips, WordPress tutorials,
            UI/UX inspiration and coding resources delivered directly
            to your inbox.
         </p>
         <form class="newsletter-form">
            <input type="email" placeholder="Enter Your Email Address">
            <button type="submit" class="theme-btn">
            Subscribe
            </button>
         </form>
      </div>
   </div>
</section> -->
<!--
   Newsletter End
   -->
<!--
   CTA Start
   -->
<!-- <section class="container cta-section">
   <div class="row">
      <div class="cta-wrapper">
         <span>Let's Connect</span>
         <h2>
            Have A Project Idea? Let's Make It Reality
         </h2>
         <p>
            Looking for a modern website, WordPress development or a custom web solution?
            Let's discuss your ideas and create something amazing together.
         </p>
         <div class="cta-btn">
            <a href="contact.html" class="theme-btn">
            Get In Touch
            </a>
            <a href="portfolio.html" class="theme-btn-outline">
            View Portfolio
            </a>
         </div>
      </div>
   </div>
</section> -->
<!--
   CTA End
   -->
<!--
   Recent Posts Start
   -->
<!-- <section class="container recent-post-section">
   <div class="row">
      <div class="title-box">
         <h2>Recent Posts</h2>
         <h3>Continue Reading</h3>
         <p>
            Explore more articles about WordPress, web development and modern UI design.
         </p>
      </div>
      <div class="recent-post-grid">
         <article class="recent-post-card">
            <div class="recent-post-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/post-2.jpg" alt="">
            </div>
            <div class="recent-post-content">
               <span>WordPress</span>
               <h4>
                  How To Build Custom WordPress Themes From Scratch
               </h4>
               <a href="#">
               Read More
               <i class="fa-solid fa-arrow-right-long"></i>
               </a>
            </div>
         </article>
         <article class="recent-post-card">
            <div class="recent-post-image">
               <img src="<?php echo get_template_directory_uri(); ?>/images/post-3.jpg" alt="">
            </div>
            <div class="recent-post-content">
               <span>Development</span>
               <h4>
                  Improve Website Speed With Simple Optimization Tips
               </h4>
               <a href="#">
               Read More
               <i class="fa-solid fa-arrow-right-long"></i>
               </a>
            </div>
         </article>
      </div>
   </div>
</section> -->
<!--
   Recent Posts End
   -->
<!--
   Author Section Start
   -->
<!-- <section class="container author-section">
   <div class="row">
      <div class="author-wrapper">
         <div class="author-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/person.jpg" alt="Author">
         </div>
         <div class="author-content">
            <span>About The Author</span>
            <h2>Mayur Patel</h2>
            <h4>WordPress & Front-End Developer</h4>
            <p>
               I'm passionate about creating modern, responsive and user-friendly websites using WordPress, HTML, CSS, JavaScript and PHP. Through this blog, I share practical development tips, tutorials and real-world experiences to help developers build better websites.
            </p>
            <div class="author-social">
               <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
               <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
               <a href="#"><i class="fa-brands fa-github"></i></a>
               <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
         </div>
      </div>
   </div>
</section> -->
<!--
   Author Section End
   -->
 <!-- <section class="container topics-section">
   <div class="row">
      <div class="title-box">
         <h2>Popular Topics</h2>
         <h3>Explore By Category</h3>
         <p>
            Browse articles based on the technologies and topics you're interested in.
         </p>
      </div>
      <div class="topics-slider">
         <div class="topics-track">
            <a href="#">WordPress</a>
            <a href="#">HTML5</a>
            <a href="#">CSS3</a>
            <a href="#">JavaScript</a>
            <a href="#">PHP</a>
            <a href="#">Bootstrap</a>
            <a href="#">ACF</a>
            <a href="#">UI / UX</a>
            <a href="#">SEO</a>
            <a href="#">Performance</a>
            <a href="#">Hosting</a>
            <a href="#">Figma</a>
           
            <a href="#">WordPress</a>
            <a href="#">HTML5</a>
            <a href="#">CSS3</a>
            <a href="#">JavaScript</a>
            <a href="#">PHP</a>
            <a href="#">Bootstrap</a>
            <a href="#">ACF</a>
            <a href="#">UI / UX</a>
            <a href="#">SEO</a>
            <a href="#">Performance</a>
            <a href="#">Hosting</a>
            <a href="#">Figma</a>
         </div>
      </div>
   </div>
</section> -->
<!--
   Open Source Start
   -->
<!-- <section class="container github-section">
   <div class="row">
      <div class="title-box">
         <h2>Open Source</h2>
         <h3>Technologies I Work With</h3>
         <p>
            I enjoy building scalable websites and continuously learning modern
            web technologies. These are the tools and technologies I use
            in my daily development workflow.
         </p>
      </div>
      <div class="github-wrapper">
         <div class="github-content">
            <span>Developer Stack</span>
            <h4>
               Building Modern & Responsive Websites With The Right Technologies
            </h4>
            <p>
               From WordPress theme development to responsive front-end
               interfaces and custom PHP solutions, I focus on clean code,
               performance and maintainability.
            </p>
            <div class="tech-stack">
               <span>HTML5</span>
               <span>CSS3</span>
               <span>JavaScript</span>
               <span>jQuery</span>
               <span>Bootstrap</span>
               <span>PHP</span>
               <span>MySQL</span>
               <span>WordPress</span>
               <span>ACF</span>
               <span>Git</span>
               <span>GitHub</span>
               <span>Figma</span>
            </div>
            <a href="#" class="theme-btn">
            Visit GitHub
            </a>
         </div>
         <div class="github-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/git.jpg" alt="">
         </div>
      </div>
   </div>
</section> -->
<!--
   Open Source End
   -->
<!--
   FAQ Start
   -->
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