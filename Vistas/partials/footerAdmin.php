

<!-- Agregar los archivos JS de Bootstrap y Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>

<script>
$(document).ready(function() {
    // Alternar la visualización de la contraseña
    $('#show-password-btn').click(function() {
        var passwordInput = $('#password');
        var passwordFieldType = passwordInput.attr('type');

        // ...

        if (passwordFieldType === 'password') {
            passwordInput.attr('type', 'text');
        } else {
            passwordInput.attr('type', 'password');
        }
    });

    // Validar las contraseñas al enviar el formulario
    $('form').submit(function() {
        var password = $('#password').val();
        var confirmPassword = $('#confirm-password').val();

        if (password !== confirmPassword) {
            $('#confirm-password').addClass('is-invalid');
            return false;
        }
    });
});
</script>








<!-- Agregar los archivos JS de Font Awesome -->

  <!-- Asegúrate de incluir las dependencias de Bootstrap y Font Awesome en tu proyecto -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


