<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-14 17:19:16
  from '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/documentation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_622f6b04414666_97839783',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'babbc5f38bb07c93042361c570474e89a83fbcc3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/documentation.tpl',
      1 => 1647269300,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./sidenav.tpl' => 1,
  ),
),false)) {
function content_622f6b04414666_97839783 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LunaCore - Setup - Documentation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="/app/modules/assets/img/lunalogo.png" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="/app/modules/assets/css/theme.css" rel="stylesheet" type="text/css" media="all"/>
</head>

<body>

<div class="layout layout-nav-side">

    <?php $_smarty_tpl->_subTemplateRender("file:./sidenav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="main-container">

        <div class="breadcrumb-bar navbar bg-white sticky-top">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.html">Overview</a>
                    </li>
                    <li class="breadcrumb-item"><a href="index.html#">Documentation</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Getting Started</li>
                </ol>
            </nav>

        </div>
        <div class="container">
            <div class="row mt-3 mt-lg-5">
                <div class="col-xl-3 col-lg-3 mb-4">
                    <ul class="nav nav-tabs flex-lg-column" role="tablist">

                        <li class="nav-item">
                            <a href="#tab-getting-started" class="active nav-link" id="getting-started" data-toggle="tab" role="tab" aria-controls="tab-getting-started" aria-selected="true">Getting Started</a>
                        </li>

                        <li class="nav-item">
                            <a  href="#tab-file-structure" class="nav-link" id="file-structure" data-toggle="tab" role="tab" aria-controls="tab-file-structure" aria-selected="true">File Structure</a>
                        </li>

                        <li class="nav-item">
                            <a  href="#tab-update" class="nav-link" id="update" data-toggle="tab" role="tab" aria-controls="tab-update" aria-selected="true">Update LunaCore</a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-9 col-lg-9">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-getting-started" role="tabpanel" aria-labelledby="getting-started">
                                <div>
                                    <h1 class="display-4">Getting Started</h1>
                                    <span class="lead">
                                        A brief guide to working with LunaCore.
                                    </span>
                                </div>
                                <hr class="my-lg-4 my-3">

                                <article id="setting-up-dev-tools">
                                    <h3>
                                        <p>Installation and setup</p>
                                    </h3>
                                    <div>
                                        <p>Download the newest version from <a href="https://github.com/leonhausdorf/LunaCore/releases" target="_blank">GitHub</a> and extract the files into a directory that belongs to a webserver that is reachable for you.</p>
                                        <p>After extracting all files, open your webbrowser and go to the setup page found under <code>/setup/</code></p>
                                        <p>LunaCore asks you for setting up credentials to log in into the overview dashboard. Fill out the setup and login form and the dashboard opens.</p>


                                    </div>
                                </article>

                                <article id="support">
                                    <h3> <p>How to get support</p>
                                    </h3>
                                    <div>
                                        <p>LunaCore provides support for bugfixes and guidance on using it.</p>
                                        <p>To access support, find the discord link in the left sidebar.</p>

                                    </div>
                                </article>

                                <article id="feedback">
                                    <h3> <p>Giving Feedback</p>
                                    </h3>
                                    <div>
                                        <p>We strive to improve LunaCore and we rely on feedback from our users.</p>
                                        <p>Please feel free to share any feedback about LunaCore via Discord or feedback@lunacore.eu</p>

                                    </div>
                                </article>

                        </div>
                        <div class="tab-pane fade" id="tab-file-structure" role="tabpanel" aria-labelledby="file-structure">
                            <div>
                                <h1 class="display-4">File Structure</h1>
                                <span class="lead">
                                    A guide to understanding how LunaCore is structured.
                                </span>
                            </div>
                            <hr class="my-lg-4 my-3">

                            <article id="pages">
                                <h3> <p>Modules</p>
                                </h3>
                                <div>
                                    <p>📁 <code>app/modules</code> is the source for all backend classes written in PHP.</p>
                                    <p>All modules are registered in <code>LunaCore.php</code> and you can access every public function in every file of the project, unless you register it.</p>
                                    <p>Also you should not change any of the classes in <code>app/modles/core</code> because they could affect the safety of LunaCore and cause damage to your code.</p>
                                </div>
                            </article>

                            <article id="assets">
                                <h3> <p>Functions</p>
                                </h3>
                                <div>
                                    <p>📁 <code>app/functions</code> contains all of the functions used from the frontend.</p>
                                    <p>All functions they still exists are necessary and should not be changed so far. You can always add more functions to LunaCoe to access the backend via frontend.</p>
                                </div>
                            </article>

                            <article id="scss-and-css">
                                <h3> <p>Views</p>
                                </h3>
                                <div>
                                    <p>📁 <code>views</code> contains all php frontend pages that are connected to <code>templates</code></p>
                                    <p>All php files in views are the entrypoints for the template files that will displayed for the website. With the help of <code>Smarty</code> the PHP code is separated from HTML code.</p>

                                </div>
                            </article>

                            <article id="javascript">
                                <h3> <p>Templates</p>
                                </h3>
                                <div>
                                    <p>📁 <code>templates</code> contains all of the html code of the website.</p>
                                    <p>With the help of <code>Smarty</code> the PHP code is separated from the HTML code. All template files are ending with <code>.tpl</code> and acts like a normal <code>.html</code> file with a few specials, documentated in the Smarty documentation.</p>
                                    <p>If you want to know more about <code>Smarty</code> visit their <a href="https://www.smarty.net/docsv2/en/" target="_blank">documentation</a>.</p>

                                </div>
                            </article>
                        </div>

                        <div class="tab-pane fade" id="tab-update" role="tabpanel" aria-labelledby="update">
                            <div>
                                <h1 class="display-4">Update LunaCore</h1>
                                <span class="lead">
                                        A brief guide to working with LunaCore.
                                    </span>
                            </div>
                            <hr class="my-lg-4 my-3">

                            <article id="setting-up-dev-tools">
                                <h3>
                                    <p>Updating to a new version</p>
                                </h3>
                                <div>
                                    <p>Updates will be released periodically to add new features, provide fixes where necessary and maintain compatibility.</p>
                                    <p>In a few cases the updated files and your project should need little adjustment in order to stay up to date.</p>
                                    <p>The <a href="/setup/overview/">changelog</a> is be updated with each release and lists the updated files.</p>
                                    <p>To bring your project up to date with the latest version of LunaCore, simply download the latest version from GitHub, unzip the files and replace the old version in your project with the updated version of each LunaCore file.</p>
                                    <p>Otherwise you can use the implemented updater. LunaCore will advice you when a new update is available and you should use the automatic updater.</p>
                                    <p>Any breaking changes that affect compatibility with older versions of LuanCore will be noted, and further instructions on updating will be provided in the changelog.</p>
                                </div>
                            </article>


                    </div>
                </div>


            </div>
        </div>

    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" src="/app/modules/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/app/modules/assets/js/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/app/modules/assets/js/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/app/modules/assets/js/theme.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
