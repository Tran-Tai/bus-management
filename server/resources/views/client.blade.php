<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Client</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    {{--angular styles begin--}}
		<link rel="icon" type="image/x-icon" href="favicon.ico" src="favicon.ico">
		<link id="theme-style" rel="stylesheet" href="assets/css/portal.css" src="assets/css/portal.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
		<link rel="preconnect" href="https://fonts.gstatic.com" src="https://fonts.gstatic.com">
		<link rel="stylesheet" href="client/styles.e128233f64eb9e92b7d6.css" src="client/styles.e128233f64eb9e92b7d6.css">
		{{--angular styles end--}}

<body>
    <app-root></app-root>
    {{--angular scripts begin--}}
		<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
		<script src="client/runtime-es2015.5b53a7b48dec9482e6a7.js" type="module"></script>
		<script src="client/runtime-es5.5b53a7b48dec9482e6a7.js" nomodule="" defer=""></script>
		<script src="client/polyfills-es5.464c5ba5d19ba6086232.js" nomodule="" defer=""></script>
		<script src="client/polyfills-es2015.39da4852166aae81dc2b.js" type="module"></script>
		<script src="client/scripts.1b27f32a62046a731e09.js" defer=""></script>
		<script src="client/main-es2015.07c30c555874a4572664.js" type="module"></script>
		<script src="client/main-es5.07c30c555874a4572664.js" nomodule="" defer=""></script>
		{{--angular scripts end--}}
</body>

</html>
