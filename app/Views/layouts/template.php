<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    <link href="/css/print.min.css" rel="stylesheet">
    <link href="/css/cdn.datatables.net_1.13.6_css_jquery.dataTables.min.css" rel="stylesheet">
    <link href="/css/cdn.datatables.net_buttons_2.4.1_css_buttons.dataTables.min.css" rel="stylesheet">
    <link rel="icon" href="/images/ico.png">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        * {
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <?= $this->include('layouts/navbar') ?>

    <?= $this->renderSection('content'); ?>

    <script src="/js/print.min.js"></script>
    <script src="/js/code.jquery.com_jquery-3.7.0.js"></script>
    <script src="/js/cdn.datatables.net_1.13.6_js_jquery.dataTables.min.js"></script>
    <script src="/js/cdn.datatables.net_buttons_2.4.1_js_dataTables.buttons.min.js"></script>
    <script src="/js/jszip.min.js"></script>
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_pdfmake_0.1.53_pdfmake.min.js"></script>
    <script src="/js/vfs_fonts.js"></script>
    <script src="/js/cdn.datatables.net_buttons_2.4.1_js_buttons.html5.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#datatable').DataTable( {
            responsive: true,
            scrollX: true,
            scrollCollapse: true,
            autoWidth: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    footer: true,
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }   
                },
                'excel'
            ]
        });
    });
</script>
</body>

</html>