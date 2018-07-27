<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet"  href="<?php echo plugins_url( '../style/style.css', __FILE__ ); ?>" type="text/css" media="all">
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo plugins_url( '../script/main.js', __FILE__ )  ?>"></script>

<div class="col-sm-12 col-lg-12 col-md-12">
    <div class="row-video">
        <?php 
            $the_query  =  array(
                    'post_type'   => 'youtubeslider',
                    'orderby'     => 'meta_value',
                    'order'       => 'ASC',
                    'showposts'   => 1,
                    'meta_key'		=> 'featured',
	                'meta_value'	=> '1'
            );

            $the_query = get_posts($the_query);
            foreach ( $the_query as $post ) : setup_postdata( $post );
                $video_id =  get_post_meta($post->ID, 'video_id', true );
            endforeach;
            wp_reset_postdata();
        ?>
        <iframe width="100%" id="video-frame"  src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <div class="row-slide">
        <div class="row">
            <div class="col-left"><div class="arrow-left"><img src="<?php echo plugins_url( '../img/arrow-left.png', __FILE__ ) ?>" class="img-fluid"></div></div>
            <div class="col-center">
                <div class="row" id="slide-video">
                <?php 
                    $the_query = get_posts('post_type=youtubeslider');
                    $count = 0;
                    foreach ( $the_query as $post ) : setup_postdata( $post );
                        $url_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
                        $mcpt_query[] = array(
                            'video_id'   => get_post_meta($post->ID, 'video_id', true ),
                            'title'    => get_the_title($post->ID)
                        );
                ?>
                    <div class="col-sm-3">
                        <div class="video-slide-item" videoid="<?php echo $mcpt_query[$count]['video_id']?>">
                            <img src="<?php echo $url_image  ?>" class="img-fluid">
                        </div>
                    </div>
                <?php
                    $count++;
                    endforeach;
                    wp_reset_postdata();
                ?>    
                </div>
            </div>
            <div class="col-right"><div class="arrow-right"><img src="<?php echo plugins_url( '../img/arrow-right.png', __FILE__ ) ?>" class="img-fluid"></div></div>
        </div>
    </div>
</div>