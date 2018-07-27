<?php 
    $the_query = get_posts('post_type=youtubeslider');
?>

<div class="wrap">
    <h1 class="wp-heading-inline">Youtube Slider</h1>
    <a href="post-new.php?post_type=youtubeslider" class="page-title-action">Add New</a>
    <hr class="wp-header-end">
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
                <td>Title</td>
                <td>Thumbnail</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody id="the-list" data-wp-lists="list:post">
            <?php 
                $count = 0;
                foreach ( $the_query as $post ) : setup_postdata( $post );
                    $url_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
                    $mcpt_query[] = array(
                        'id'       => get_post_meta(get_the_ID(), 'idkey', true ),
                        'url_video'   => get_post_meta(get_the_ID(), 'url_video', true ),
                        'title'    => get_the_title($post->ID)
                    );
            ?>
                <tr>
                    <td><?php echo $mcpt_query[$count]['title']; ?></td>
                    <td><img src="<?php echo $url_image; ?>" width="100"></td>
                    <td>
                        <a href="post.php?post=<?php echo $post->ID ?>&action=edit" class="page-title-action">Edit</a>
                        <a href="?post.php?post=<?php echo $post->ID; ?>&action=trash" class="page-title-action">Move to Trash</a>
                    </td>
                </tr>
            <?
                    $count++;
                endforeach;
                wp_reset_postdata();

            ?>
        </tbody>
    </table>
    <?php 
        if($count == 0)
            echo "No found";
    ?>
</div>