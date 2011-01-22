<?php

/**
 * @file
 * Five theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<?php if ($main_menu): ?>
  <p class="skip"><a href="#navigation" class="skip">Skip to Navigation</a></p> 
<?php endif; ?>

<header role="banner" class="wrapper">
  <div class="stack clearfix">
    <?php if (!empty($logo)): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <hgroup>
        <?php if ($site_name): ?>
          <h1 class="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>
  
        <?php if ($site_slogan): ?>
          <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </hgroup>
    <?php endif; ?>
    
    <?php print render($page['header']); ?>
  </div>
  
  <?php if (!empty($feed_icons)) : ?>
    <aside class="stack clearfix extras">
      <?php print $feed_icons; ?>
    </aside>
  <?php endif; ?>
</header> <!-- /.stack, /header -->

<?php if ($primary_links): ?>
  <nav role="navigation" class="wrapper">
    <a name="navigation"></a>
    <div class="stack clearfix">
      <?php print $primary_links ?>
    </div>
  </nav> <!-- /.section, /#navigation -->
<?php endif; ?>

<?php if ($breadcrumb): ?>
  <nav class="wrapper breadcrumb">
    <div class="stack clearfix">
      <?php print $breadcrumb; ?>
    </div>
  </nav>
<?php endif; ?>

<?php if ($page['highlight']): ?>
  <aside role="complementary" class="wrapper highlight">
    <div class="stack clearfix">
      <?php print render($page['highlight']); ?>
    </div>
  </aside>
<?php endif; ?>

<?php if ($messages): ?>
  <div class="wrapper">
    <div class="stack clearfix">
      <?php print $messages; ?>
    </div>
  </div>
<?php endif; ?>

<hr />

<section class="wrapper">
  <?php if ($tabs || $page['help'] || $action_links) : ?>
    <footer class="stack clearfix">
      <?php if ($tabs): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
    </footer>
  <?php endif; ?>
  
  <div class="stack clearfix">
    <div class="clearfix" role="main">
      <?php print render($page['content']); ?>
    </div>
  
    <?php if ($page['sidebar_a']): ?>
      <hr />
      <aside class="sidebar clearfix" role="complementary">
        <?php print render($page['sidebar_a']); ?>
      </aside> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>
  
    <?php if ($page['sidebar_b']): ?>
      <hr />
      <aside class="sidebar clearfix" role="complementary">
        <?php print render($page['sidebar_b']); ?>
      </aside> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>
  </div>
</section>

<hr />

<footer role="contentinfo" class="wrapper">
  <div class="stack clearfix">
    <nav class="secondary">
      <?php /* print $secondary_links; */ ?>
    </nav> <!-- /.section, /#navigation -->
    <?php print render($page['footer']); ?>
  </div>
</footer> <!-- /.section, /#footer -->
