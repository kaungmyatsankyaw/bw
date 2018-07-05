<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="Shortcut Icon" type="image/png" href="{{ asset('post/bblogo.png')}}"/>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/matrix-media.css') }}">
    <link rel="stylesheet" href="{{ asset('css/matrix-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-wysihtml5.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/uniform.css') }}"/>
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>



    <script src="{{ asset('js/app.js') }}"></script>



    <title>@yield('title')</title>

</head>
<body>

@include('layouts/header')
@include('layouts/sidebar')

<div id="content">
    <!--breadcrumbs-->

    <?php
    $page = Request::path();
    $page_show = '';
    if ($page == 'admin') {
        $page_show = "Home";
    } else {

        $page_show = strtoupper($page);
        $page_show = str_replace('/', ' > ', $page_show);
    }
    ?>

    @yield('section')

</div>

<!--<script src="{{ asset('js/jquery.min.js') }}"></script>-->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/matrix.js') }}"></script>
<script src="{{ asset('js/matrix.dashboard.js') }}"></script>
<script src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/matrix.tables.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script>

<script>
    $(document).ready(function () {
        let path = window.location.pathname;
        if (path == '/public/admin') {
            $('.index').addClass('active');
        } else if (path == '/public/admin/post') {
            $('.post').addClass('active');
        }
        else if (path == '/public/admin/post/create') {
            $('.post').addClass('active');
        }
        else if (path == '/public/admin/cate') {
            $('.cate').addClass('active');
        } else if (path == '/public/admin/user') {
            $('.user').addClass('active');
        } else if (path == '/public/admin/postanalyst') {
            $('.post_analyst').addClass('active');
        } else if (path == '/public/admin/artist') {
            $('.artist').addClass('active');
        }else if(path=='/public/admin/client_user'){
            $('.client_user').addClass('active');
        }else if(path=='/public/admin/post/comment'){
            $('.comment').addClass('active');
        }else if(path=='/public/admin/fullmon'){
            $('.fullmon').addClass('active');
        }else if(path=='/public/admin/advertise'){
            $('.advertise').addClass('active');
        }else if(path=='/public/admin/member'){
            $('.member').addClass('active');
        }
        else if(path=='/public/admin/pagoda'){
            $('.pagoda').addClass('active');
        }

        $('#blah').hide();
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            $('#blah').show();
            readURL(this);
        });

    });
</script>

<script type="text/javascript">
$(document).ready( function () {
      $('.data-table1').dataTable( {
        "bSort": false
      } );
    } );
</script>

<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
