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

        

        <?php 
        
        // Split coordinates into lat and long
        $content = explode(',', theme_get_setting('map_center_coordinates'));
        $lat = $content[0];
        $long = $content[1];

        drupal_add_js(array('squeezable' => array(
            'iconPath' => path_to_theme() . '/img/marker-icon.png',
            'mapCenterLat' => $lat,
            'mapCenterLong' => $long,
            'mapZoomLevel' => theme_get_setting('map_zoom_level'),
            'streetAddress' => theme_get_setting('street_address'),
        )), 'setting'); ?>

        <div id="addresscontainier">

            <div id="map">
            </div>

            <div id="address" class="clearfix">
                <h1>Here we are</h1>
                Address: <?php echo theme_get_setting('street_address'); ?>
            </div>

        </div>

        <?php if($page['footer']): ?>
            <div id="userfooter">
                <?php print render($page['footer']); ?>
            </div>
        <?php endif; ?>

    </div>

</div>
