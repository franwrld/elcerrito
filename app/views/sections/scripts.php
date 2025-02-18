<script src="<?php echo URL;?>public_html/customjs/api.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function abrirManual() {
        window.open('public_html/manual/ManualDeUsuarioElCerrito.pdf', '_blank');
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      // Obtener el campo de fecha
      var fecha_entrada = document.getElementById('fecha_entrada');

      // Obtener la fecha actual en el formato YYYY-MM-DD
      var fechaActualE = new Date().toISOString().split('T')[0];

      // Establecer la fecha actual en el campo de fecha
      fecha_entrada.value = fechaActualE;
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      // Obtener el campo de fecha
      var fecha_salida = document.getElementById('fecha_salida');

      // Obtener la fecha actual en el formato YYYY-MM-DD
      var fechaActualS = new Date().toISOString().split('T')[0];

      // Establecer la fecha actual en el campo de fecha
      fecha_salida.value = fechaActualS;
    });
</script>