<header id="header">

    <div id="siteheader">
        <h1><?php print $site_name;?></h1>
        <?php if ($site_slogan): ?>
            <h2><?php print $site_slogan; ?></h2>
        <?php endif; ?>
    </div>

    <nav id="header-main-menu">
        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => 'links'))); ?>
    </nav>
    
    <a id="mobile-menu-dropdown" href="">M</a>

</header>

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

    <?php if($page['footer']): ?>
        <?php print render($page['footer']); ?>
    <?php endif; ?>

</div>