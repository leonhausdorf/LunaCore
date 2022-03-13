<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LunaCore - Setup - Overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="/app/modules/assets/img/lunalogo.png" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="/app/modules/assets/css/theme.css" rel="stylesheet" type="text/css" media="all"/>
</head>

<body>

<div class="layout layout-nav-side">

    {{include file='./sidenav.tpl'}}

    <div class="main-container">

        <div class="breadcrumb-bar navbar bg-white sticky-top">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
                </ol>
            </nav>

        </div>
        <div class="mx-3">

            <div class="row mt-3">

                <div class="col-12 col-lg-8">

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h6 class="card-title mb-2">Routes</h6>

                                    <span class="card-text font-weight-bold text-dark" style="font-size: 24px">{{$COUNTROUTES}}</span>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h6 class="card-title mb-2">Activities</h6>

                                    <span class="card-text font-weight-bold text-dark" style="font-size: 24px">{{$COUNTACTIVITY}}</span>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title mb-3">Latest Changelog</h6>

                                    <article id="1323">
                                        <h4><p><code>1.4.4</code> - updater update - 13 March 2022</p></h4>
                                        <div>
                                            <ul>
                                                <li>Added an update function to LunaCore</li>
                                                <li>Changed and added new modules
                                                    <ul>
                                                        <li>Added Updater module <code>modules/core/Updater.php</code></li>
                                                    </ul>
                                                </li>
                                                <li>Added update notify</li>
                                                <li>New library for updater
                                                    <ul>
                                                        <li>Initial setup page</li>
                                                        <li>Login page</li>
                                                        <li>Overview page</li>
                                                        <li>Routes page for edit, remove and add routes</li>
                                                    </ul>
                                                </li>
                                                <li>Version storage in <code>app/storage/version.txt</code></li>
                                                <li>Minor bug fixes</li>
                                            </ul>
                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-12 col-lg-4">

                    <div class="row">
                        <div class="col-12">
                            <ol class="list-group list-group-activity">
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div>
                                                <span class="h6">Last Activities</span>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                {{FOREACH from=$ACTIVITY item=row}}
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary" style="background: {{$row['color']}} !important;">
                                                    <i class="material-icons">{{$row['icon']}}</i>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="media-body">
                                            <div>
                                                <span>{{$row['name']}}</span>
                                            </div>
                                            <span class="text-small">{{$row['date']}}</span>
                                        </div>

                                    </div>
                                </li>
                                {{/FOREACH}}

                            </ol>
                        </div>
                    </div>

                </div>

            </div>


        </div>

    </div>
</div>

{{IF $WANTUPDATE eq true}}
<div class="modal fade" tabindex="-1" role="dialog" id="updateModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New update available</h5>
                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">

                <div class="text-center">
                    <div class="mb-3 d-flex justify-content-center justify-content-md-center">
                        <h1 class="h3">LunaCore</h1>
                        <div>
                            <span class="badge badge-success ml-1">{$UPDATEVERSION}</span>
                        </div>
                    </div>

                    <p class="lead">
                        A newer version of LunaCore has been found and is ready to install.
                    </p>
                    <p class="lead">
                        This update is optional, but you should install it to make sure all functions are working and the safety of use is guaranteed.
                    </p>

                    <div class="mt-4">
                        <a href="/setup/update/" class="btn btn-block btn-primary">Install update</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{/IF}}

<script type="text/javascript" src="/app/modules/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/app/modules/assets/js/popper.min.js"></script>
<script type="text/javascript" src="/app/modules/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="/app/modules/assets/js/theme.js"></script>

{{IF $WANTUPDATE eq true}}
<script>
    $(window).on('load', function() {
        $('#updateModal').modal('show');
    });
</script>
{{/IF}}

</body>

</html>