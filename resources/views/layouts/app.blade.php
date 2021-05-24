<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Font Icon -->
   <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
   
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <!--====== Toaster Alert css ======-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- bootstrap 4 file --}}

   <!-- Main css -->
   <link rel="stylesheet" href="/css/style.css">
        <title>{{$title ?? 'Home - Welcome'}}</title>

       
    </head>
    <body >
       
          <!--====== PREALOADER  START ======-->
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <!--====== PREALOADER  ENDS  ======-->

        <div class="main">

           @yield('content')
    
        </div>
    
        <!-- JS -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/js/main.js"></script>
           {{-- Toaster Alert Js --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        
        $(document).on('submit','form.registration-form',function(e){
    // $("#submit_form").click(function(e){
        e.preventDefault();
   
        var _token = $("input[name='_token']").val();
        var fname = $("input[name='fname']").val();
        var lname = $("input[name='lname']").val();
        var email = $("input[name='email']").val();
        var phone_number = $("input[name='phone_number']").val();
        var age = $("input[name='age']").val();
        var password = $("input[name='password']").val();
        var password_confirmation = $("input[name='password_confirmation']").val();
   
        $.ajax({
            url: "{{ route('store.user') }}",
            type:'POST',
            data: {_token:_token, fname:fname, lname:lname, email:email, phone_number:phone_number,password:password,password_confirmation:password_confirmation,age:age},
            success: function(data) {
                if($.isEmptyObject(data.errors)){
                    toastr.success(`${data.success}`);
                    $(".registration-form")[0].reset();
                }else{

                    $.each(data.errors , function(index, error) { 
                       // Display a warning toast, with no title
                        toastr.error(`${error}`);
                    });
                }
            }
        });
        });

            // LOADER TIMER
        $(window).on('load',function(){
        setTimeout(function(){ // allowing 3 secs to fade out loader
        $('.preloader').fadeOut('slow');
        },800);
        });
    //END---------------------->
        </script>
    </body>
</html>
