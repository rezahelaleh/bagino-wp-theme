
<div class="container-fluid text-right">





<div class="add-comment">
    <?php

$commenter = wp_get_current_commenter();

    $fields = array(
        'author' => '<div class=""><label for="author">نام</label><input id="author" name="author" class="form-control border-border bg-light" type="text" value=" '. esc_attr($commenter['comment_author']) .' " /></div>',
        'email' => '<div class=""><label for="email">ایمیل</label><input id="email" name="email" class="form-control border-border bg-light" type="email" value="'. esc_attr($commenter['comment_author_email']) .'" /></div>',
      
    );

    $args = array(
        'id_form' => 'custom-comments_form',
        'class_form' => 'custom-comments-form',
        'class_submit' => 'btn btn-primary btn-raised mt-2',
        'label_submit' => ('ارسال نظر'),
        'fields' => apply_filters('comment_form_default_fields',$fields),
        'comment_field' =>  '<div><textarea dir="rtl" id="comment"  name="comment" cols="45" rows="8"
         aria-required="true" class="form-control border-border bg-light px-2"></textarea></div>',
      
    );
    comment_form($args);
    ?>
</div>


<div class="comments-pagination">
    <div class="previous-comments">
        <?php previous_comments_link('<button class="btn btn-raised btn-warning mb-2">نظرات قدیمی تر</button>');?>
    </div>
    <div class="next-comments">
        <?php next_comments_link('<button class="btn btn-raised btn-success mb-2">نظرات جدید تر</button>');?>
    </div>
</div>
<ol class="comment-list" id="comments">
    <?php
    wp_list_comments(array(
        'style' => 'ol',
        'max_depth' => 5,
        'callback' => 'wp_learn_list_comments'
    ));
    ?>
</ol>
<!-- <div class="comments-pagination">
    <div class="previous-comments">
        <?php previous_comments_link('نظرات قدیمی تر');?>
    </div>
    <div class="next-comments">
        <?php next_comments_link('نظرات جدیدتر');?>
    </div>
</div> -->

</div>
