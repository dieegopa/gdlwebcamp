$(document).ready(function () {
    $('#guardar-registro').on('submit', function (e) {
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (data) {
                var resultado = data;
              console.log(resultado);
                if (resultado.respuesta == 'exito') {
                    Swal.fire(
                        'Correcto',
                        'Se guardo correctamente',
                        'success'
                    ).then(result => {
                        if (result.value) {
                            document.getElementById("guardar-registro").reset();
                            $('#password').parent().removeClass('has-success');
                            $('#repetir_password').parent().removeClass('has-success');
                            $('#resultado_password').text('');

                            if (resultado.accion == 'editar') {
                                location.reload();
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Hubo un error'
                    });
                }
            }

        })

    });

    $('.borrar-registro').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');

        Swal.fire({
            title: 'Estas seguro?',
            text: "No se podra revertir la accion!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'post',
                    data: {
                        'id': id,
                        'registro': 'eliminar'
                    },
                    url: 'modelo-' + tipo + '.php',
                    success: function (data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == 'exito') {
                            Swal.fire(
                                'Eliminado!',
                                'Registro eliminado',
                                'success'
                            );
                            jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'No se pudo eliminar'
                            });
                        }
                    }
                });
            }
        });
    });
    
    $('#guardar-registro-archivo').on('submit', function (e) {
        e.preventDefault();

        var datos = new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function (data) {
                var resultado = data;
                console.log(data);
                if (resultado.respuesta == 'exito') {
                    Swal.fire(
                        'Correcto',
                        'Se guardo correctamente',
                        'success'
                    ).then(result => {
                        if (result.value) {
                            document.getElementById("guardar-registro-archivo").reset();
                            $('#password').parent().removeClass('has-success');
                            $('#repetir_password').parent().removeClass('has-success');
                            $('#resultado_password').text('');

                            if (resultado.accion == 'editar') {
                                location.reload();
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Hubo un error'
                    });
                }
            }

        })

    });
});
