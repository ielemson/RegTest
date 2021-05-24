$(document).on('submit','form.registration-form',function(e){
    // $("#submit_form").click(function(e){
        e.preventDefault();
   
        var _token = $("input[name='_token']").val();
        var fname = $("input[name='fname']").val();
        var lname = $("input[name='lname']").val();
        var email = $("input[name='email']").val();
        var phone_number = $("input[name='phone_number']").val();
        var password = $("input[name='password']").val();
        var password_confirmation = $("input[name='password_confirmation']").val();
   
        $.ajax({
            url: "{{ route('store.user') }}",
            type:'POST',
            data: {_token:_token, fname:fname, lname:lname, email:email, phone_number:phone_number,password:password,password_confirmation:password_confirmation},
            success: function(data) {
                if($.isEmptyObject(data.errors)){
                    toastr.success(`${data.success}`);
                }else{

                    $.each(data.errors , function(index, error) { 
                       // Display a warning toast, with no title
                        toastr.error(`${error}`);
                    });
                }
            }
        });

});