<div class="comments_thread" id="<?php echo strtolower(get_class($record)); ?>_comments_thread_<?php echo $record->getId(); ?>">
  <div class='comment_thread_header'>
    Comments (<?php echo $record->getNumComments() ?>) 
    <?php echo link_to_add_new_comment('Add New Comment', $record); ?>
  </div>
  
  <div id="add_new_comment_form_holder"></div>

  <ul>
    <?php echo get_partial('csComments/comments', array('comments' => $comments, 'record' => $record)); ?>
  </ul>
</div>