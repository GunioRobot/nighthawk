<?php
/**
 * Single Post Template.
 *
 * This template is loaded whenever a single
 * post having the post_type of "post" has been
 * queried.
 *
 * Child themes may overwrite standard posts by
 * defining one of the following templates:
 *
 * <ul>
 * <li>header-post.php</li>
 * <li>loop-post.php</li>
 * <li>biography-post.php</li>
 * <li>footer-post.php</li>
 * </ul>
 *
 * It is also possible to overwrite templates for each
 * individual post format by appending the format name
 * to the end of the template file. The following files
 * can be used to overwrite the "status" post format:
 *
 * <ul>
 * <li>header-post-status.php</li>
 * <li>loop-post-status.php</li>
 * <li>biography-post-status.php</li>
 * <li>footer-post-status.php</li>
 * </ul>
 *
 * @package      Nighthawk
 * @author       Michael Fields <michael@mfields.org>
 * @copyright    Copyright (c) 2011, Michael Fields
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0
 * @alter        1.1
 */

/* In the event that no posts are returned. */
if ( ! have_posts() ) {
	get_template_part( '404' );
}

/* Define context. */
$nighthawk_context = 'single-post';
$nighthawk_post_format = get_post_format();
if ( ! empty( $nighthawk_post_format ) ) {
	$nighthawk_context.= '-' . $nighthawk_post_format;
}
?>

<?php get_header( $nighthawk_context ); ?>

<div id="content" class="contain">

<?php get_template_part( 'loop', $nighthawk_context ); ?>

<?php get_template_part( 'biography', $nighthawk_context ); ?>

<?php comments_template( '', true ); ?>

</div><!--content-->

<?php get_footer( $nighthawk_context ); ?>