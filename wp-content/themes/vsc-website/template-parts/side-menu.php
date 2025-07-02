
    <?php
            $theParent = wp_get_post_parent_id(get_the_ID());
            $test_array = get_pages(array(
                'child_of' => get_the_ID()
            ));
            
            if ($theParent or $test_array) { ?>             

    <div class="page-links side-menu-background content-box">
        <h2 class="page-links-header"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
        <div class="links-box">
            <ul class="links-list">
            <?php 
            
                if ($theParent) {
                    $findChildrenOf = $theParent;
                } else {
                    $findChildrenOf = get_the_ID();
                }

            wp_list_pages(array(
                'title_li' => NULL,
                'child_of' => $findChildrenOf,
            ));

            ?>
            </ul>
        </div>
    </div>
            <?php } ?>