<?php

/**
 * @file
 * Five theme implementation of comment-wrapper.tpl.php.
 *
 * Available variables:
 * - $content: The array of content-related elements for the node. Use
 *   render($content) to print them all, or
 *   print a subset such as render($content['comment_form']).
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default value has the following:
 *   - comment-wrapper: The current template type, i.e., "theming hook".
 *
 * The following variables are provided for contextual information.
 * - $node: Node object the comments are attached to.
 * The constants below the variables show the possible values and should be
 * used for comparison.
 * - $display_mode
 *   - COMMENT_MODE_FLAT
 *   - COMMENT_MODE_THREADED
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_comment_wrapper()
 * @see theme_comment_wrapper()
 */
?>
<section id="node-<?php print $node->nid; ?>-comments" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($node->type != 'forum' && !empty($content['comments'])) : ?>
    <h1><a id="comments"><?php print t('Comments'); ?></a></h1>
  <?php endif; ?>
  
  <?php print render($content['comments']); ?>
  
  <a id="edit-comment"></a>

  <?php if ($content['comment_form']): ?>
  <div id="comment-new" class="comment-new-form">
    <!-- @todo, need to vary the h3 with h2 when no comments are present. Or just make it an h2 always? -->
    <h3 class="title"><?php print t('Post new comment'); ?></h3>
    <div>
      <?php print render($content['comment_form']); ?>
    </div>
  </div>
  <?php endif; ?>
 
</section>
