$(document).ready(function () {
    $('.sidebar-menu').tree()
    $('#registros').DataTable({
        'paging': true,
        'pageLength': 10,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'language': {
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior',
                last: 'Ultimo',
                first: 'Primero'
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
            emptyTable: 'No hay registros',
            infoEmpty: '0 Registros',
            search: 'Buscar'
        }
    });

    $('#crear').attr('disabled', true);

    $('#repetir_password').on('blur', function () {
        var password_nuevo = $('#password').val();

        if ($(this).val() == password_nuevo) {
            $('#resultado_password').text('Correcto');
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('#crear').attr('disabled', false);
        } else {
            $('#resultado_password').text('No son iguales');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('#crear').attr('disabled', true);
        }

    });

    //Date picker
    $('#fecha_evento').datepicker({
        autoclose: true,
        changeYear: true,
        minDate: 0,
        beforeShowDay: function(date){ return [(date.getDay() == 2 || date.getDay() == 3 || date.getDay() == 4 || date.getDay() == 5 || date.getDay() == 6 || date.getDay() == 0), ""]; }
    });

    //Initialize Select2 Elements
    $('.seleccionar').select2();

    $('.hora_evento').timepicker({
        showInputs: false
    });

    $('#icono').iconpicker();

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    $.getJSON('servicio-registrados.php', function (data) {
        var line = new Morris.Line({
            element: 'grafica_registros',
            resize: true,
            data: data,
            xkey: 'fecha',
            ykeys: ['cantidad'],
            labels: ['Registros'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto',
            parseTime: false
        });
    });




});
