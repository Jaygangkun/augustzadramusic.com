<?php 
/**
* Template Name: Guestbook List Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/ 

$edge_sidebar_layout = noizzy_edge_sidebar_layout();

get_header();
noizzy_edge_get_title();
get_template_part( 'slider' );
do_action('noizzy_edge_before_main_content');
?>
<style>
.guestbook-img-wrap {
	width: 100%;
	height: 0px;
	padding-top: 120%;
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
}

.guestbook-list {
	display: flex;
	flex-wrap: wrap;
	margin-top: 50px;
	/* justify-content: center; */
}

.guestbook-wrap {
	width: calc(15% - 20px);
    margin-bottom: 40px;
    padding: 10px;
    box-shadow: rgb(0 0 0) 0px 0px 10px;
    transition: all 0.4s linear 0s;
    box-sizing: border-box;
    margin-left: 20px;
	margin-right: 20px;
	cursor: pointer;
	position: relative;
	background: #ffffff;
}

.edge-container {
	background-image: url('<?php echo get_template_directory_uri()?>/assets/img/guestbook-bk.jpg');
	background-size: cover;
	background-position: center;
}

.guestbook-wrap:nth-child(6n + 1) {
	transform: rotate(1.5deg);
}

.guestbook-wrap:nth-child(6n + 2) {
	transform: rotate(-0.8deg);
}

.guestbook-wrap:nth-child(6n + 3) {
	transform: rotate(1.1deg);
}

.guestbook-wrap:nth-child(6n + 4) {
	transform: rotate(0.7deg);
}

.guestbook-wrap:nth-child(6n + 5) {
	transform: rotate(-1.1deg);
}

.guestbook-wrap:nth-child(6n + 6) {
	transform: rotate(0.9deg);
}

.guestbook-wrap:hover {
	transform: scale(1.1) rotate(0deg)!important;
}

.guestbook-wrap::after {
	content: 'Click To See More';
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	display: flex;
    align-items: center;
    justify-content: center;
    background: #43323273;
	font-family: Oswald,sans-serif;
	font-size: 14px;
	font-weight: bold;
	display: none;
	color: #ffffff;
}

.guestbook-wrap:hover::after {
	display: flex;
	display: none;
}

.guestbook-name {
	font-family: Oswald,sans-serif;
	font-weight: bold;
	font-size: 16px;
	margin-bottom: 5px;
}

.guestbook-place {
	font-family: Oswald,sans-serif;
	font-size: 14px;
	margin-bottom: 5px;
}

.guestbook-date {
	font-family: Oswald,sans-serif;
	font-size: 12px;
}

.guestbook-meta {
	padding-top: 20px;
}

.fancybox__container {
	z-index: 9999999 !important;
}

.fancybox__button--zoom,
.fancybox__button--slideshow,
.fancybox__button--fullscreen {
	display: none !important;
}

#ui-datepicker-div {
	z-index: 10000!important
}

.guest-book-form-wrap--submit-btn {
	margin-top: 20px;
	text-align: center;
}

#guestbook_submit_btn {
	display: flex;
	align-items: center;
	justify-content: center;
}

#guestbook_submit_btn.loading {
	opacity: 0.8;
}

#guestbook_submit_btn .loader {
    border: 3px solid #f3f3f3;
    border-top: 3px solid #3498db;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    animation: spin 2s linear infinite;
	margin-left: 10px;
	display: none;
}

#guestbook_submit_btn.loading .loader {
	display: block;
}

.guest-book-form-wrap {
	margin-bottom: 30px;
}

.guest-book-form-wrap input {
	margin-bottom: 0px;
}

.captcha-row {
	display: flex;
	justify-content: space-between;
	margin-top: 10px;
	align-items: center;
}

.captcha-row input{
	width: 120px;
}

#captcha_refresh_btn {
	cursor: pointer;
}

.guestbook-submit-form textarea {
	width: 100%;
    border: 0;
    border-bottom: 1px solid #000;
    resize: none;
    height: 100px;
    appearance: none;
    outline: none;
}

.guestbook-popup-name {
	color: #ffffff;
	font-weight: bold;
    font-size: 16px;
	text-align: center;
}

.guestbook-popup-place {
	color: #ffffff;
	font-size: 14px;
    margin-bottom: 5px;
	text-align: center;
}

.guestbook-popup-date {
	color: #ffffff;
	font-size: 14px;
    margin-bottom: 5px;
	text-align: center;
}

.guestbook-popup-comment {
	color: #ffffff;
	font-size: 14px;
    margin-bottom: 5px;
	text-align: left;
    overflow: auto;
}

.fancybox__content,
.fancybox__image {
	/* min-height: 60vh !important; */
}

.fancybox__content {
	min-height: initial !important;
}

.guestbook-link-wrap {
	text-align: center;
}

#modal_guestbook_new .modal-title {
	color: #ff0000;
}

.guest-book-form-note {
	font-size: 12px;
	color: #ff0000;
}

@media screen and (max-width: 1280px) {
	.guestbook-wrap {
    	width: 22%;
		margin-left: 1.5%;
		margin-right: 1.5%;
	}
}

@media screen and (max-width: 1024px) {
	#guestbook_new_btn {
		margin-top: 20px;
	}
}

@media screen and (max-width: 768px) {
	.guestbook-wrap {
    	width: 30.33%;
	}
}

@media screen and (max-width: 680px) {
	.guestbook-wrap {
    	width: 47%;
	}
}

@media screen and (max-width: 480px) {
	/* .guestbook-wrap {
    	width: 100%;
		margin-left: 0px;
		margin-right: 0px;
	}

	.guestbook-img-wrap {
		width: 80%;
    	padding-top: 100%;
		margin: auto;
	} */

	.edge-container-inner {
		width: 90%;
	}

	.captcha-row input {
		width: 60px;
	}

}
</style>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/lib/fancybox.css" media="all">
<script src="<?php echo get_template_directory_uri()?>/assets/lib/fancybox.umd.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/lib/bootstrap.min.css" media="all">
<script src="<?php echo get_template_directory_uri()?>/assets/lib/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/lib/jquery-ui.css" media="all">
<script src="<?php echo get_template_directory_uri()?>/assets/lib/datepicker.min.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/lib/image-uploader.min.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/lib/image-uploader.min.js"></script>

<div class="edge-container edge-default-page-template">
	<?php do_action( 'noizzy_edge_after_container_open' ); ?>
	
	<div class="edge-container-inner clearfix">
        <?php do_action( 'noizzy_edge_after_container_inner_open' ); ?>
		<div class="guestbook-link-wrap">
			<div class="edge-btn edge-btn-medium edge-btn-solid" id="guestbook_new_btn">
				<span class="">Click to Share Photos and Comments</span>
			</div>
		</div>
		<div class="guestbook-list">
			<?php
			$guest_books = $posts = get_posts([
				'post_type' => 'guest_book',
				'post_status' => 'publish',
				'numberposts' => -1
				// 'order'    => 'ASC'
			]);

			$guestbook_index = 0;
			foreach($guest_books as $guest_book) {
				$img = '';

				$gallery = get_field('gallery', $guest_book->ID);

				if($gallery && count($gallery) > 0) {
					$img = wp_get_attachment_image_url($gallery[0], 'full');
				}
				else {
					$img = get_template_directory_uri()."/assets/img/zadra_guestbook_default.jpg";
				}
				?>
				<div class="guestbook-wrap" data-fancybox="gallery-<?php echo $guestbook_index?>" href="<?php echo $img ?>" data-name="<?php echo get_field('name', $guest_book->ID)?>" data-venue="<?php echo get_field('venue', $guest_book->ID)?>" data-place="<?php echo get_field('place', $guest_book->ID)?>" data-date="<?php echo get_field('date', $guest_book->ID)?>" data-comment="<?php echo get_field('comment', $guest_book->ID)?>">
					<div class="guestbook-img-wrap" style="background-image:url(<?php echo $img?>)"></div>
					<div class="guestbook-meta">
						<div class="guestbook-name"><?php the_field('name', $guest_book->ID)?></div>
						<div class="guestbook-place"><?php the_field('venue', $guest_book->ID)?> <?php the_field('place', $guest_book->ID)?></div>
						<div class="guestbook-date"><?php the_field('date', $guest_book->ID)?></div>
					</div>
				</div>
				<?php
				if($gallery && count($gallery) > 1) {
					$gallery_index = 0;
					foreach($gallery as $gallery_img) {
						if($gallery_index == 0) {
							$gallery_index ++;
							continue;
						}

						$img = wp_get_attachment_image_url($gallery_img, 'full');
						?>
						<div class="guestbook-wrap" style="display: none" data-fancybox="gallery-<?php echo $guestbook_index?>" href="<?php echo $img ?>">
						</div>
						<?php		
					}
				}

				$guestbook_index ++;
			}
			?>
		</div>
        <?php do_action( 'noizzy_edge_before_container_inner_close' ); ?>
	</div>
	
	<?php do_action( 'noizzy_edge_before_container_close' ); ?>
</div>

<script>
jQuery(document).ready(function() {
	Fancybox.bind(".guestbook-wrap", {
		on: {
			reveal: (fancybox, slide) => {
				jQuery('.fancybox__image').css('opacity', '0');
				jQuery('.fancybox__caption').css('opacity', '0');
			},
			done: (fancybox, slide) => {
				// console.log(jQuery('.fancybox__content').width());
				console.log(jQuery('.fancybox__image').width(), jQuery('.fancybox__image').height());
				var imgw = jQuery('.fancybox__image').width();
				var imgh = jQuery('.fancybox__image').height();
				var vh = jQuery(window).height();
				var vw = jQuery(window).width();

				var newimgh = vh * 0.6;
				var newimgw = newimgh * imgw / imgh;

				if(newimgw > vw) {
					newimgw = vw * 0.8;
					newimgh = newimgw * imgh / imgw;
				}

				jQuery('.fancybox__image').height(newimgh);
				jQuery('.fancybox__image').width(newimgw);

				jQuery('.fancybox__content').height(newimgh);
				jQuery('.fancybox__content').width(newimgw);

				jQuery('.fancybox__caption').width(jQuery('.fancybox__content').width());
				jQuery('.guestbook-popup-comment').height((vh - newimgh - jQuery('.guestbook-popup-name').height() - jQuery('.guestbook-popup-place').height() - jQuery('.guestbook-popup-date').height()) / 3);

				jQuery('.fancybox__image').css('opacity', '1');
				jQuery('.fancybox__caption').css('opacity', '1');
			},
		},
		// Your options go here
		caption : function(fancybox, carousel, slide) {
			
			var html = '';
			html = '<div class="guestbook-popup-content-wrap">';
			html += '<h3 class="guestbook-popup-name">' + slide.name + '</h3>';
			html += '<p class="guestbook-popup-place">' + slide.venue + ' ' + slide.place + '</p>';
			html += '<p class="guestbook-popup-date">' + slide.date + '</p>';
			html += '<p class="guestbook-popup-comment">' + slide.comment.replaceAll('\n', '<br>') + '</p>';
			html += '</div>';

			return html;
		}
	});

	jQuery(document).on('click', '#guestbook_new_btn', function() {
		jQuery('#modal_guestbook_new').modal('toggle');
	})

	// jQuery('#guestbook_date').datepicker({
	// 	// "dateFormat": "mm\/dd\/yy",
	// 	// "changeMonth": "true",
	// 	// "changeYear": "true",
	// 	// "yearRange": "2011:2031",
	// 	// "defaultDate": "",
	// 	// "beforeShowDay": null
	// });

	jQuery('#guestbook_images').imageUploader({
		label: 'Drag & Drop images or click to browse',
		imagesInputName: 'guestbook_images'
	});

	var guestbook_submitting = false;
	jQuery(document).on('click', '#guestbook_submit_btn', function() {
		if(guestbook_submitting) {
			return;
		}
		var btn_instance = this;
		var guestbook_form_data = new FormData(jQuery('#guestbook_submit_form')[0]);        
		guestbook_form_data.append('action', 'guestbook_submit');

		guestbook_submitting = true;

		jQuery(btn_instance).addClass('disabled');
		jQuery(btn_instance).addClass('loading');

		jQuery.ajax({
			url: "<?php echo admin_url('admin-ajax.php')?>",
			type: 'post',
			enctype: 'multipart/form-data',
			data: guestbook_form_data,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(resp){
				guestbook_submitting = false;
				jQuery(btn_instance).removeClass('disabled');
				jQuery(btn_instance).removeClass('loading');

				if(!resp.success) {
					alert(resp.message);
				}
				else {
					jQuery('#modal_guestbook_new').modal('toggle');
				}
				
			}
		})  
	})

	jQuery(document).on('click', '#captcha_refresh_btn', function() {
		jQuery('.captcha-image').attr('src', '<?php echo get_template_directory_uri()?>/captcha.php?' + Date.now());
	})
})
</script>
<?php get_footer(); ?>
<div class="modal" tabindex="-1" id="modal_guestbook_new">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Pics, Comments or Both Here</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="guestbook-submit-form">
					<form id="guestbook_submit_form">
						<div class="guest-book-form-wrap">
							<label>Name</label>
							<input type="text" name="guestbook_name" id="guestbook_name">
						</div>
						<div class="guest-book-form-wrap">
							<label>Venue</label>
							<input type="text" name="guestbook_venue" id="guestbook_venue">
						</div>
						<div class="guest-book-form-wrap">
							<label>Town/State</label>
							<input type="text" name="guestbook_place" id="guestbook_place">
						</div>
						<div class="guest-book-form-wrap">
							<label>Month/Year</label>
							<input type="text" name="guestbook_date" id="guestbook_date">
						</div>
						<div class="guest-book-form-wrap">
							<label>Comment</label>
							<textarea name="guestbook_comment" id="guestbook_comment"></textarea>
							<span class="guest-book-form-note">144 Characters Max</span>
						</div>
						<div class="guest-book-form-wrap">
							<div id="guestbook_images"></div>
						</div>
						<div class="guest-book-form-wrap">
							<label>Please Enter the Captcha Text</label>
							<div class="captcha-row">
								<input type="text" id="captcha_challenge" name="captcha_challenge" pattern="[A-Z]{6}">
								<img src="<?php echo get_template_directory_uri()?>/captcha.php" alt="CAPTCHA" class="captcha-image"><i class="material-icons" id="captcha_refresh_btn">refresh</i>
							</div>
						</div>
						<div class="guest-book-form-wrap guest-book-form-wrap--submit-btn">
							<div class="edge-btn edge-btn-medium edge-btn-solid" id="guestbook_submit_btn">
								<span class="">Submit</span>
								<span class="loader"></span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>