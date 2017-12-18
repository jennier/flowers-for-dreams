<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flowers For Dreams') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
    $('document').ready(function() {

        // Prepare reset.
        function resetModalFormErrors() {
            $('.form-group').removeClass('has-error');
            $('.form-group').find('.help-block').remove();
        }

        // Intercept submit.
        $('form.bootstrap-modal-form').on('submit', function(submission) {
            submission.preventDefault();

            // Set vars.
            var form   = $(this),
                url    = form.attr('id'),
                submit = form.find('[type=submit]'),
                data   = form.serialize();
            // Please wait.
            if (submit.is('button')) {
                var submitOriginal = submit.html();
                submit.html('Please wait...');
            } else if (submit.is('input')) {
                var submitOriginal = submit.val();
                submit.val('Please wait...');
            }

            // Request.
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'json',
                cache: false,

            // Response.
            }).always(function(response, status) {

                // Reset errors.
                resetModalFormErrors();

                // Check for errors.
                if (response.status == 422) {
                    var errors = $.parseJSON(response.responseText);
            
                    // Iterate through errors object.
                    $.each(errors.errors, function(field, message) {
                        console.error(field+': '+message);
                        var formGroup = $('[name='+field+']', form).closest('.form-group');
                        formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
                    });

                    // Reset submit.
                    if (submit.is('button')) {
                        submit.html(submitOriginal);
                    } else if (submit.is('input')) {
                        submit.val(submitOriginal);
                    }

                // If successful, reload.
                } else {
                    location.reload();
                }
            });
        });

        // Reset errors when opening modal.
        $('.bootstrap-modal-form-open').click(function() {
            resetModalFormErrors();
        });

    });
    </script>
</body>
</html>
