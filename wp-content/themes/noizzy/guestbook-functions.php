<?php
function guestbookSubmit() {
    session_start();
    if(!isset($_POST['captcha_challenge']) || $_SESSION['captcha_text'] != $_POST['captcha_challenge'] ) {
        echo json_encode(array(
            'success' => false,
            'message' => 'incorrect values in the captca. try again!',
        ));
        die();
    }
    
    // Count total files
    $countfiles = count($_FILES['guestbook_images']['name']);

    // Upload directory
    $wp_upload_dir = wp_upload_dir();
    $upload_location = $wp_upload_dir['path'] . '/';
    // $upload_location = "uploads/";
    // echo $upload_location;

    // To store uploaded files path
    $files_arr = array();
    $gallery = [];
    // Loop all files
    for($index = 0;$index < $countfiles;$index++){

        if(isset($_FILES['guestbook_images']['name'][$index]) && $_FILES['guestbook_images']['name'][$index] != ''){
            // File guestbook_images
            $filename = $_FILES['guestbook_images']['name'][$index];

            // Get extension
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            // Valid image extension
            $valid_ext = array("png","jpeg","jpg");

            // Check extension
            if(in_array($ext, $valid_ext)){

                // File path
                $path = $upload_location.$filename;

                // Upload file
                if(move_uploaded_file($_FILES['guestbook_images']['tmp_name'][$index],$path)){
                    $files_arr[] = $path;
                    $guids[] = $wp_upload_dir['url'].'/'.$filename;

                    $attachment = array(
                        'guid'=> $wp_upload_dir['url'].'/'.$filename, 
                        'post_mime_type' => 'image/'.$ext,
                        'post_title' => 'Guestbook Image Submitted-'.$filename,
                        'post_content' => 'Guestbook Image Description',
                        'post_status' => 'inherit'
                    );
                    $image_id = wp_insert_attachment($attachment, $wp_upload_dir['url'].'/'.$filename);
                    // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
                    require_once( ABSPATH . 'wp-admin/includes/image.php' ); 
                    // Generate the metadata for the attachment, and update the database record.
                    $attach_data = wp_generate_attachment_metadata( $image_id, $wp_upload_dir['url'].'/'.$filename );
                    wp_update_attachment_metadata( $image_id, $attach_data );

                    $gallery[] = $image_id;   
                }
            }
        }
    }

    $guestbook_id = wp_insert_post(array (
        'post_type' => 'guest_book',
        'post_title' => isset($_POST['guestbook_name']) ? str_replace('/', ' ', $_POST['guestbook_name']) : 'New',
        // 'post_content' => $your_content,
        'post_status' => 'draft',
        // 'post_status' => 'publish',
        'comment_status' => 'closed',   // if you prefer
        'ping_status' => 'closed',      // if you prefer
    ));
    
    if ($guestbook_id) {
        // insert post meta
        add_post_meta($guestbook_id, 'name', isset($_POST['guestbook_name']) ? str_replace('/', ' ', $_POST['guestbook_name']) : '');
        add_post_meta($guestbook_id, 'place', isset($_POST['guestbook_place']) ? str_replace('/', ' ', $_POST['guestbook_place']) : '');
        add_post_meta($guestbook_id, 'venue', isset($_POST['guestbook_venue']) ? str_replace('/', ' ', $_POST['guestbook_venue']) : '');
        add_post_meta($guestbook_id, 'date', isset($_POST['guestbook_date']) ? str_replace('/', ' ', $_POST['guestbook_date']) : '');
        add_post_meta($guestbook_id, 'gallery', $gallery);
        if(count($gallery) > 0) {
            set_post_thumbnail($yoink_id, $gallery[0]);
        }
        
    }

    echo json_encode(array(
        'success' => true,
        'files_arr' => $files_arr,
        'guids' => $guids,
        'guestbook_id' => $guestbook_id
    ));
    die;
}

add_action('wp_ajax_guestbook_submit', 'guestbookSubmit');
add_action('wp_ajax_nopriv_guestbook_submit', 'guestbookSubmit');