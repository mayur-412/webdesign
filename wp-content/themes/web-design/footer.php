<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web_design
 */

?>

	<footer class="container">
		<div class="row">
			<?php
			$company_label = get_field('company_label', 'option');
			$footer_icon = get_field('footer_icon', 'option');
			?>
			<div class="text-box">
				<p><?php echo $company_label; ?></p>
			</div>
			<div class="footer-media">
				<ul>
					<?php
					foreach ($footer_icon as $footer) {
							$icon_class = $footer['icon_class'];
							$footer_icon_link = $footer['footer_icon_link'];
						?>
						<li><a href="<?php echo $footer_icon_link['url']; ?>" title="<?php echo $footer_icon_link['title']; ?>"><i class="<?php echo $icon_class; ?>"></i></a></li>
						<?php
					}
					?>
			</ul>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
