		<?php do_action('sidebar_right') ?>
		
		</div> <!-- #container -->		

		<?php do_action( 'bp_after_container' ) ?>
		
		<?php do_action( 'bp_before_footer' ) ?>
		
		    <footer>
        <nav>
            <ul>
                <li><a class="top" href="#" title="Back to top">Top</a></li>
            </ul>
        </nav>
    </footer>
		<div id="footer">
			<?php do_action( 'bp_first_inside_footer' ) ?>

			<?php do_action( 'bp_footer' ) ?>
			<?php do_action( 'bp_last_inside_footer' ) ?>
		</div><!-- #footer -->

		<?php do_action( 'bp_after_footer' ) ?>

	</div><!-- #outerrim -->

	<?php wp_footer(); ?>

	</body>

</html>