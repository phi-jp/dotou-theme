</div> <!-- #container -->

<?php do_action( 'bp_after_container' ); ?>

</div>


<?php do_action( 'bp_before_footer'   ); ?>

<footer id="footer">
  <nav class="footer_nav">
    <?php wp_nav_menu( array( 'menu' => 'footer' ) ); ?>
  </nav>
  <nav class="sns">
    <ul>
      <li class="twitter_link"><a href=""><span class="icon">T</span>Twitter</a></li>
      <li class="facebook_link"><a href=""><span class="icon">F</span>Facebook</a></li>
    </ul>
  </nav>
  <address>
    Copyright &copy; <?php bloginfo('name'); ?>. All Rights Reserved.
  </address>

  <?php do_action( 'bp_footer' ); ?>

</footer>

<?php do_action( 'bp_after_footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
