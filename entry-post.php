<?php
/**
 * Display a post in the blog view.
 *
 * @package      Nighthawk
 * @author       Michael Fields <michael@mfields.org>
 * @copyright    Copyright (c) 2011, Michael Fields
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0
 */
?>

<div id="<?php nighthawk_entry_id(); ?>" <?php post_class( 'contain' ); ?>>

<?php
	do_action( 'nighthawk_entry_start' );

	switch ( get_post_format() ) {
		case 'status' :
			$avatar = get_avatar( get_the_author_meta( 'user_email' ), $size = '70' );
			if ( ! is_single() ) {
				$avatar = '<a href="' . esc_url( get_permalink() ) . '" class="image">' . $avatar . '</a>';
			}
			else {
				$avatar = '<span class="image">' . $avatar . '</span>';
			}
			print $avatar;
			print "\n" . '<div class="content">';
			the_content();
			print "\n" . '</div><!--content-->';

			print '<div class="entry-meta">';
			nighthawk_entry_meta_taxonomy();
			print '</div><!--meta-->';

			/*print '<a href="' . esc_url( get_permalink() . '#respond' ) . '" class="comment-icon" title="' . esc_attr__( 'Add a comment', 'nighthawk' ) . '"><img src="' . get_template_directory_uri() . '/images/comment.png" alt="" /></a>';*/
			break;
		default :
			$featured_image = get_the_post_thumbnail();
			if ( ! empty( $featured_image ) ) {
				print "\n" . '<div class="featured-image">';
				print '<a href="' . esc_url( get_permalink() ) . '">' . $featured_image . '</a>';
				print '</div>';
			}

			if ( ! is_singular() ) {
				the_title( "\n" . '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			}

			print "\n" . '<div class="entry-content">';
			the_content( __( 'Continue Reading', 'nighthawk' ) );
			print "\n" . '</div><!--entry-content-->';

			wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'nighthawk' ), 'after' => '</div>' ) );

			print '<div class="entry-meta">';
			nighthawk_entry_meta_taxonomy();
			print '</div><!--meta-->';
			break;
	}

	do_action( 'nighthawk_entry_end' );
?>

</div><!--entry-->

<?php do_action( 'nighthawk_append_to_entry_template' ); ?>
