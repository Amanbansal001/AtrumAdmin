<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atrumart Art | Admin Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
        body:not(.layout-fixed) .main-sidebar {
            height: 1400px !important;
        }

        .svgLoader {
            animation: spin 0.5s linear infinite;
            margin: auto;
        }

        .divLoader {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            z-index: 9999999;
            overflow: hidden;
        }

        .divLoader-post {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            z-index: 9999999;
            overflow: hidden;
        }

        #dataTableEl td {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            max-width: 200px;
        }

        .hide {
            display: none !important;
        }

        #notifications{
            max-height: 300px;
            overflow-x: auto;
        }

        .dropdown-item{
            
            white-space: break-spaces;

        }
    </style>
</head>


<div class="divLoader-post" id="postLoader">
    <svg class="svgLoader" viewBox="0 0 100 100" width="10em" height="10em">
        <path ng-attr-d="{{config.pathCmd}}" ng-attr-fill="{{config.color}}" stroke="none" d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#51CACC" transform="rotate(179.719 50 51)">
            <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 51;360 50 51" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform>
        </path>
    </svg>
</div>

<!-- init
<?php

$breadcrumbActive = "";
$breadcrumbs = [];
$dtTagLine = "";
$heading = "";
$title = "";
$apiCall = "";
$apiCall2="";
$columns = [];
$columnsFace = [];
$columnsImg = "";
$isTblAdd = true;
$actionDel = false;
$tblId = "";
$updateShippingAmount = "";
?>