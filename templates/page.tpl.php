<!-- ______________________ HEADER _______________________ -->

<header class="header">
  <div class="row">
    <div class="small-9 medium-3 columns site-logo" role="banner" itemscope itemtype="http://schema.org/Organization">
      <?php if ($logo): ?>
        <a itemprop="url" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-logo__img">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
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

    <div class="small-3 columns navigation__toggler">
      <a href="#"><?php print t('Main navigation'); ?></a>
    </div>

    <div class="small-12 medium-9 columns">
      <?php if ($main_menu || $secondary_menu): ?>
        <nav aria-label="<?php print t('Main navigation'); ?>" class="navigation <?php if (!empty($main_menu)) {print "with-primary";}
          if (!empty($secondary_menu)) {print " with-secondary";} ?>">
          <?php print theme('links', array('links' => $main_menu, 'attributes' => array('id' => 'primary', 'class' => array('links', 'clearfix', 'navigation--main')))); ?>
          <?php print theme('links', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary', 'class' => array('links', 'clearfix', 'navigation--sub')))); ?>
        </nav> <!-- /navigation -->
      <?php endif; ?>

      <?php if ($page['header']): ?>
        <div class="header__region">
          <?php print render($page['header']); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</header> <!-- /header -->

<div id="page" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <!-- ______________________ MAIN _______________________ -->

  <div id="main" class="row clearfix">
  <div class="medium-12 columns">

    <section id="content">

        <?php if ($breadcrumb || $title|| $messages || $tabs || $action_links): ?>
          <div id="content-header">

            <?php print $breadcrumb; ?>

            <?php if ($page['highlighted']): ?>
              <div id="highlighted"><?php print render($page['highlighted']) ?></div>
            <?php endif; ?>

            <?php print render($title_prefix); ?>

            <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
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

        <div id="content-area">
          <?php print render($page['content']) ?>
        </div>

        <?php print $feed_icons; ?>

    </section> <!-- /content-inner /content -->

    <?php if ($page['sidebar_left']): ?>
      <aside id="sidebar-right" class="column sidebar first">
        <?php print render($page['sidebar_left']); ?>
      </aside>
    <?php endif; ?> <!-- /sidebar-first -->
    
    <?php if ($page['sidebar_right']): ?>
      <aside id="sidebar-second" class="column sidebar second">
        <?php print render($page['sidebar_right']); ?>
      </aside>
    <?php endif; ?> <!-- /sidebar-second -->

  </div>
  </div> <!-- /main -->

  <!-- ______________________ FOOTER _______________________ -->

  <?php if ($page['footer']): ?>
    <footer id="footer">
      <?php print render($page['footer']); ?>
    </footer> <!-- /footer -->
  <?php endif; ?>

</div> <!-- /page -->
