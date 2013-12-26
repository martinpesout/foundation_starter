<!-- ______________________ NAV BAR _______________________ -->
<nav aria-label="<?php print t('Main navigation'); ?>" class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <?php if ($site_name): ?>
        <h1><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a></h1>
      <?php endif; ?>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span><?php print t('Menu'); ?></span></a></li>
  </ul>

  <section class="top-bar-section">
    <?php if ($main_menu || $secondary_menu): ?>
      <?php print theme('links', array('links' => $main_menu, 'attributes' => array('class' => array('right', 'navigation--main')))); ?>
      <?php print theme('links', array('links' => $secondary_menu, 'attributes' => array('class' => array('left', 'navigation--sub')))); ?>
    <?php endif; ?>
  </section>
</nav>
<!-- /nav bar -->

<!-- ______________________ HEADER _______________________ -->
<header class="header">
  <div class="row">
    <div class="medium-12 columns site-logo" role="banner" itemscope itemtype="http://schema.org/Organization">
      <?php if ($logo): ?>
        <a itemprop="url" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-logo__img">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div class="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 class="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>

      <?php endif; ?>
    </div>

    <?php if ($page['header']): ?>
      <div class="medium-12 columns">
        <?php print render($page['header']); ?>
      </div>
    <?php endif; ?>
  </div>
</header> <!-- /header -->

<div class="row <?php print $classes; ?>"<?php print $attributes; ?>>

  <?php if ($page['sidebar_left']): ?>
    <aside class="sidebar--left medium-3 columns" role="complementary">
      <?php print render($page['sidebar_left']); ?>
    </aside>
  <?php endif; ?> <!-- /sidebar-first -->
  
  <?php if ($page['sidebar_right']): ?>
    <aside class="sidebar--right medium-3 columns" role="complementary">
      <?php print render($page['sidebar_right']); ?>
    </aside>
  <?php endif; ?> <!-- /sidebar-second -->

  <!-- ______________________ MAIN _______________________ -->
  <div class="medium-12 columns page-content">

    <?php if ($breadcrumb || $title|| $messages || $tabs || $action_links): ?>
      <div id="page-content__header">

        <?php print $breadcrumb; ?>

        <?php if ($page['highlighted']): ?>
          <div class="page-content__highlighted"><?php print render($page['highlighted']) ?></div>
        <?php endif; ?>

        <?php print render($title_prefix); ?>

        <?php if ($title): ?>
          <h1 class="page-content__title"><?php print $title; ?></h1>
        <?php endif; ?>

        <?php print render($title_suffix); ?>
        <?php print $messages; ?>
        <?php print render($page['help']); ?>

        <?php if ($tabs): ?>
          <div class="tabs"><?php print render($tabs); ?></div>
        <?php endif; ?>

        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>

      </div> <!-- /#content-header -->
    <?php endif; ?>

    <article role="main" class="page-content__body">
      <?php print render($page['content']) ?>
    </article>

    <?php print $feed_icons; ?>

  </div> <!-- /main -->

</div>

<?php if ($page['footer']): ?>
  <!-- ______________________ FOOTER _______________________ -->
  <footer class="footer" role="contentinfo">
    <?php print render($page['footer']); ?>
  </footer> 
  <!-- /footer -->
<?php endif; ?>
