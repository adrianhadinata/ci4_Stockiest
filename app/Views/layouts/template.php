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
        }

        * {
            box-sizing: border-box;
        }

        .card-animate {
            cursor: pointer;
            animation: cubic-bezier(0.215, 0.610, 0.355, 1);
            transition: 0.5s;
        }

        .card-animate:hover {
            scale: 1.1;
        }

        @media (max-width: 991px) {
            .vr-line {
                display: none;
            }
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 25px;
        }
    </style>
</head>

<body data-bs-theme="dark">

    <?= $this->include('layouts/navbar') ?>
    
    <script src="/js/print.min.js"></script>
    <script src="/js/code.jquery.com_jquery-3.7.0.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/cdn.datatables.net_1.13.6_js_jquery.dataTables.min.js"></script>
    <script src="/js/cdn.datatables.net_buttons_2.4.1_js_dataTables.buttons.min.js"></script>
    <script src="/js/jszip.min.js"></script>
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_pdfmake_0.1.53_pdfmake.min.js"></script>
    <script src="/js/vfs_fonts.js"></script>
    <script src="/js/cdn.datatables.net_buttons_2.4.1_js_buttons.html5.min.js"></script>
    <script src="/js/sweetalert2@11.js"></script>
    <script src="/js/jquery.mask.js"></script>

    <?= $this->renderSection('content'); ?>

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

        $("#Switch").on("click", function(){
            if($(this).hasClass('checked')) {
                $('body').attr('data-bs-theme', 'dark');
                $(this).removeClass('checked');
                $('footer').removeClass('bg-white');
                $('footer').addClass('bg-dark');
            } else {
                $('body').removeAttr('data-bs-theme');
                $(this).addClass('checked');
                $('footer').removeClass('bg-dark');
                $('footer').addClass('bg-white');
            }
        })
    });
</script>

<footer class="text-center bg-dark">Copyright &copy; Your Company Name </footer>

</body>

</html>