</section>
<?php wp_reset_query(); if ( is_home()) { ?>
<?php } ?>
<footer id="footer">
  <div class="footer_content"> &copy;<?php echo date('Y'); ?>&nbsp;<a href="<?php bloginfo('url'); ?>">
    <?php bloginfo('name'); ?>
    </a>
    <?php if( dopt('d_track_b') ) echo "  |  ".dopt('d_track'); ?>
  </div>
</footer>
<?php include 'share.php'; ?>
<?php wp_footer(); ?>
</body><?php if( dopt('d_footcode_b') ) echo dopt('d_footcode'); ?>
</html>