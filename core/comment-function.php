<?php 
// code for comment
if ( ! function_exists( 'kadima_comment' ) ) :
function kadima_comment( $comment, $args, $depth ) 
{
	$GLOBALS['comment'] = $comment;
	//get theme data
	global $comment_data;
	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	__('Reply','kadima'); ?>
    <div class="media kadima_comment_box">
			<a class="pull_left_comment">
            <?php echo get_avatar($comment,$size = '60'); ?>
            </a>
           <div class="media-body">
			    <div class="kadima_comment_detail">
				<h4 class="kadima_comment_detail_title"><?php comment_author();?></h4>
				
				<span class="kadima_comment_date">
				<?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>				
				<?php comment_date('F j, Y');?>
				<?php else : ?>
				<?php comment_date(); ?>
				<?php endif; ?>
				<?php _e('at','kadima');?>&nbsp;<?php comment_time('g:i a'); ?></span>
				<?php comment_text() ; ?>				
				<div class="reply">
				<a href=""><i class="fa fa-mail-reply"></i><?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</a>
				</div>
				
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'kadima' ); ?></em>
				<br/>
				<?php endif; ?>
				</div>
			</div>							
	</div>		
<?php
}
endif;
?>