@extends('administrator::login')
@section('content')
<div class="simple-page-logo animated swing">
    <a href="index.html"><span><i class="fa fa-gg"></i></span> <span>Control Panel</span></a>
</div>

<div class="simple-page-form animated flipInY" id="login-form">
    <h4 class="form-title m-b-xl text-center">Sign In With Your Account</h4>
    {!! Form::open(['url' => 'session/dologin','id'=>'session_form']) !!}
        <div class="form-group">
            {!!Form::text('email', null, ['class' => 'form-control','id'=>'email','placeholder'=> Lang::get('user::app.email')]) !!}
        </div>
        <div class="form-group">
            {!!Form::password('password', ['class' => 'form-control','id'=>'password','placeholder'=>Lang::get('user::app.password')]) !!}
        </div>

        <div class="form-group m-b-xl">
            <div class="checkbox checkbox-primary"><input type="checkbox" id="keep_me_logged_in"><label
                    for="keep_me_logged_in">Keep me signed in</label></div>
        </div>
        <input type="submit" class="btn btn-primary" value="{!! Lang::get("action.sigin") !!}">
    {!! Form::close() !!}
</div>

<div class="simple-page-footer"><p><a href="password-forget.html">FORGOT YOUR PASSWORD ?</a></p>
    <!--<p><small>Don't have an account ?</small><a href="signup.html">CREATE AN ACCOUNT</a></p>-->
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function() {
        $('#session_form').on('submit', function(event) {
            event.preventDefault();
            $("div#divLoading").addClass('show');
            $.ajax({
                type : $(this).attr('method'),
                url : $(this).attr('action'),
                data : $(this).serialize(),
                dataType : "json",
                cache : false,
                beforeSend : function() { console.log($(this).serialize());},
                success : function(response) {
                    if(response.success == false) {
                        $(".help-block").remove();
                        $.each(response.message, function( index,message) {
                            var element = $('<p>' + message + '</p>').attr({'class' : 'help-block text-danger'}).css({display: 'none'});
                            $('#'+index).after(element);
                            $(element).fadeIn();
                        });
                    }
                    else {
                        $(".help-block").remove();
                        window.location = response.redirect;
                    }

                    $("div#divLoading").removeClass('show');
                },
                error : function() {
                    $("div#divLoading").removeClass('show');
                }
            });
            return false;
        });
    });
</script>
@endpush
