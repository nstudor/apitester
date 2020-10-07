<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
        <title>API Tester</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">API Tester</h5>
        </div>
        <form id="frm">
            <div class="container">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="url" class="form-control">
                            </div>
                            <div class="col-2">
                                <div class="btn-group btn-block">
                                    <button type="button" class="btn btn-danger" id="tipbtn" onclick="doTest()"><input type="hidden" name="tip" value="POST">POST</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <span class="dropdown-item" onclick="$('#tipbtn').html('<input type=\'hidden\' name=\'tip\' value=\'POST\'>POST')">POST</span>
                                        <span class="dropdown-item" onclick="$('#tipbtn').html('<input type=\'hidden\' name=\'tip\' value=\'GET\'>GET')">GET</span>
                                        <span class="dropdown-item"  onclick="$('#tipbtn').html('<input type=\'hidden\' name=\'tip\' value=\'PUT\'>PUT')">PUT</span>
                                        <span class="dropdown-item"  onclick="$('#tipbtn').html('<input type=\'hidden\' name=\'tip\' value=\'DELETE\'>DELETE')">DELETE</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tab1" data-toggle="tab" href="#pane1" role="tab" aria-controls="pane1" aria-selected="true">PARAMS</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab2" data-toggle="tab" href="#pane2" role="tab" aria-controls="pane2" aria-selected="false">JSON</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab3" data-toggle="tab" href="#pane3" role="tab" aria-controls="pane3" aria-selected="false">HEADER</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pane1" role="tabpanel" aria-labelledby="tab1">
                                <textarea name="params" class="form-control" style="height: 150px" placeholder="{key1}={value1} NewLine {key2}={value2}..."></textarea>
                            </div>
                            <div class="tab-pane fade" id="pane2" role="tabpanel" aria-labelledby="tab2">
                                <textarea name="json" class="form-control" style="height: 150px" placeholder='{"key1":"value1", "key2":"value2"}'></textarea>
                            </div>
                            <div class="tab-pane fade" id="pane3" role="tabpanel" aria-labelledby="tab3">
                                <textarea name="heads" class="form-control" style="height: 150px" placeholder="{key1}={value1} NewLine {key2}={value2}..."></textarea>
                            </div>
                        </div>
                        <hr>
                        <div id="result" class="text-monospace font-weight-bold">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script>
            function doTest() {
                $("#result").html('Wait...');
                $.post('test.php',
                        $('#frm').serialize(),
                        function (result, status, xhr) {
                            $("#result").html(result);
                        }
                );
            }
        </script>
    </body>
</html>
