<?php
function add_custom_meta_box(){
    add_meta_box("test-meta-box", "Custom Meta Box", "custom_meta_box_markup", "post", "side", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_box");


function custom_meta_box_markup($object){
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
        <div>
            <label for="meta-box-id">Custom Meta Box</label>
            <input name="meta-box-id" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-id", true); ?>">
        </div>
    <?php  
}


function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    if( "post" != $post->post_type)
        return $post_id;


	$meta_box_text_value = isset($_POST["meta-box-id"]) ? $_POST["meta-box-id"] : "";
    update_post_meta($post_id, "meta-box-id", $meta_box_text_value);

}

add_action("save_post", "save_custom_meta_box", 10, 3);
?>
