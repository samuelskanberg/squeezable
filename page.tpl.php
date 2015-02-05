<div id="page">

    <header id="header">

        <div id="siteheader">
            <a href="/">
                <h1 id="sitename"><?php print $site_name;?></h1>
            </a>
            <?php if ($site_slogan): ?>
                <h2 id="slogan"><?php print $site_slogan; ?></h2>
            <?php endif; ?>
        </div>

        <nav id="header-main-menu">
            <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => 'links'))); ?>
        </nav>
        
        <a id="mobile-menu-dropdown" href="">M</a>

    </header>

    <div id="hero">

    </div>

    <div id="wrapper">


        <div id="content">
            <?php print render($title_prefix); ?>
            <?php if ($title): ?><h1><?php print $title; ?></h1><?php endif; ?>
            <?php print render($title_suffix); ?>

            <?php print render($page['content']); ?>
        </div>

        <div id="sidebar">
            <?php if ($page['sidebar_first']): ?>
                <div id="sidebar">
                    <?php print render($page['sidebar_first']); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

    <div id="footer">
        <nav id="footer-main-menu">
            <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => 'links'))); ?>
        </nav>

        <?php drupal_add_js(array('squeezable' => array(
            'iconPath' => path_to_theme() . '/img/marker-icon.png',
            'mapCenterLat' => theme_get_setting('map_center_lat'),
            'mapCenterLong' => theme_get_setting('map_center_long'),
            'streetAddress' => theme_get_setting('street_address'),
        )), 'setting'); ?>

        <div id="addresscontainier">

            <div id="map">
            </div>

            <div id="address">
                Address: <?php echo theme_get_setting('street_address'); ?>
                Lat: <?php echo theme_get_setting('map_center_lat'); ?>
                Long: <?php echo theme_get_setting('map_center_long'); ?>
            </div>

        </div>

        <?php if($page['footer']): ?>
            <?php print render($page['footer']); ?>
        <?php endif; ?>

    </div>

</div>
