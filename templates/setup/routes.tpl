<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LunaCore - Setup - Routes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="/app/modules/assets/img/lunalogo.png" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="/app/modules/assets/css/theme.css" rel="stylesheet" type="text/css" media="all"/>
</head>

<body>

<div class="layout layout-nav-side">

    {{include file="./sidenav.tpl"}}

    <div class="main-container">

        <div class="breadcrumb-bar navbar bg-white sticky-top">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/setup/">Setup</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Routes</li>
                </ol>
            </nav>

        </div>
        <div class="row mx-3 mt-3">
            <div class="col-12">
                <h1 class="display-5 mb-0">Routes</h1>
                <p class="lead">Manage your routes for LunaCore.</p>
            </div>
        </div>
        <hr class="my-4">
        <div class="mx-3">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="card-options">
                                <a class="btn btn-primary btn-sm mr-2" data-toggle="modal" href="#addRouteModal">
                                    Add new route
                                </a>
                                <div class="modal fade" tabindex="-1" role="dialog" id="addRouteModal">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add new route</h5>
                                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="/setup/routes/add/" method="post">

                                                    <div class="form-group">
                                                        <label>Route</label>
                                                        <input name="route" type="text" class="form-control" placeholder="/index/">
                                                        <small class="form-text text-muted">You can change the access route here. Use :param: for using it as $_GET['param']</small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>File Path</label>
                                                        <input name="path" type="text" class="form-control" placeholder="index.php">
                                                        <small class="form-text text-muted">This is the path to the file you want to access.</small>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary mt-2">Save</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-title pt-3 pl-3">
                                <h5 data-filter-by="text">Active Routes</h5>
                            </div>
                            <table class="table table-responsive-sm m-0">
                                <thead>
                                <tr>
                                    <th class="pl-3" scope="col">Number</th>
                                    <th scope="col">Route</th>
                                    <th scope="col">File Path</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                {{FOREACH item=row key=key from=$ROUTES}}

                                <tr>
                                    <th class="pl-3" scope="row">#{{$key}}</th>
                                    <td>{{$row['route']}}</td>
                                    <td>{{$row['file']}}</td>
                                    <td class="text-right pr-3">
                                        <a href="#editModal{{$key}}" class="btn btn-sm btn-primary mr-1" data-toggle="modal">Edit</a>
                                        <a href="#deleteModal{{$key}}" class="btn btn-sm btn-danger mr-1" data-toggle="modal">Delete</a>
                                    </td>
                                </tr>

                                <div class="modal fade" tabindex="-1" role="dialog" id="editModal{{$key}}">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit route</h5>
                                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="/setup/routes/edit/" method="post">

                                                    <input name="number" hidden type="number" value="{{$key}}">

                                                    <div class="form-group">
                                                        <label>Route</label>
                                                        <input name="route" type="text" class="form-control" placeholder="/index/" value="{{$row['route']}}">
                                                        <small class="form-text text-muted">You can change the access route here. Use :param: for using it as $_GET['param']</small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>File Path</label>
                                                        <input name="path" type="text" class="form-control" placeholder="index.php" value="{{$row['file']}}">
                                                        <small class="form-text text-muted">This is the path to the file you want to access.</small>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary mt-2">Save</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal{{$key}}">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title">Delete route</h5>
                                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <p class="lead text-center">Are you sure to delete this route?</p>

                                                <form action="/setup/routes/delete/" method="post">

                                                    <input name="number" hidden type="number" value="{{$key}}">
                                                    <input name="route" hidden type="text" value="{{$row['route']}}">

                                                    <button type="submit" class="btn btn-danger btn-block mt-2">Delete</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{/FOREACH}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="/app/modules/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/app/modules/assets/js/popper.min.js"></script>
<script type="text/javascript" src="/app/modules/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="/app/modules/assets/js/theme.js"></script>

</body>

</html>