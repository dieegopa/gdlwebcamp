(function () {
    'use strict';

    var regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function () {

        //campos datos usuario

        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        //Campos pases

        var pase_dia = document.getElementById('pase_dia');
        var pase_completo = document.getElementById('pase_completo');
        var pase_2dia = document.getElementById('pase_2dia');

        //botones y divs

        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var botonRegistro = document.getElementById('botonRegistro');
        var lista_productos = document.getElementById('lista_productos');
        var suma = document.getElementById('suma_total');

        //Extras
        var camisas = document.getElementById('camisa_evento');
        var etiquetas = document.getElementById('etiquetas_evento');

        if (botonRegistro) {
            botonRegistro.disabled = true;
        }


        if (document.getElementById('calcular')) {

            calcular.addEventListener('click', calcularMontos);

            pase_dia.addEventListener('blur', mostrarDias);
            pase_2dia.addEventListener('blur', mostrarDias);
            pase_completo.addEventListener('blur', mostrarDias);


            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarMail);

            var formulario_editar = document.getElementsByClassName('editar_registrado');
            if (formulario_editar.length > 0) {
                if (pase_dia.value || pase_2dia.value || pase_completo.value) {
                    mostrarDias();
                }
            }


            function validarMail() {
                if (this.value.indexOf("@") > -1) {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid black';
                } else {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = "Debe tener un @";
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                }
            }

            function validarCampos() {
                if (this.value == '') {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = "Este campo es obligatorio";
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                } else {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid black';
                }
            }


            function calcularMontos(event) {
                event.preventDefault();
                if (regalo.value === '') {
                    alert('Debes elegir un regalo');
                    regalo.focus();
                } else {
                    var boletosDia = parseInt(pase_dia.value, 10) || 0;
                    var boletos2Dias = parseInt(pase_2dia.value, 10) || 0;
                    var boletoCompleto = parseInt(pase_completo.value, 10) || 0;
                    var cantidadCamisas = parseInt(camisa_evento.value, 10) || 0;
                    var cantidadEtiquetas = parseInt(etiquetas_evento.value, 10) || 0;


                    var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + (cantidadCamisas * 10) * (0.93) + (cantidadEtiquetas * 2);

                    var listadoProductos = new Array();

                    if (boletosDia >= 1) {
                        listadoProductos.push(boletosDia + ' Pases por dia');
                    }

                    if (boletos2Dias >= 1) {
                        listadoProductos.push(boletos2Dias + ' Pases por 2 dias');

                    }

                    if (boletoCompleto >= 1) {

                        listadoProductos.push(boletoCompleto + ' Pases completos');
                    }

                    if (cantidadCamisas >= 1) {

                        listadoProductos.push(cantidadCamisas + ' Camisas');
                    }

                    if (cantidadEtiquetas >= 1) {

                        listadoProductos.push(cantidadEtiquetas + ' Etiquetas');
                    }

                    lista_productos.style.display = "block";
                    lista_productos.innerHTML = '';

                    for (var nodo of listadoProductos) {
                        lista_productos.innerHTML += nodo + '<br/>';
                    }

                    suma.innerHTML = "$ " + totalPagar.toFixed(2);
                    
                    if(botonRegistro){
                     
                    botonRegistro.disabled = false;   
                    }
                    if (document.getElementById('total_pedido')) {

                        document.getElementById('total_pedido').value = totalPagar;
                    }


                }
            }

            function mostrarDias() {
                var boletosDia = parseInt(pase_dia.value, 10) || 0;
                var boletos2Dias = parseInt(pase_2dia.value, 10) || 0;
                var boletoCompleto = parseInt(pase_completo.value, 10) || 0;

                var diasElegidos = new Array();

                if (boletosDia >= 1) {
                    diasElegidos.push('Viernes');
                }

                if (boletos2Dias >= 1) {
                    diasElegidos.push('Viernes', 'Sabado');

                }

                if (boletoCompleto >= 1) {

                    diasElegidos.push('Viernes', 'Sabado', 'Domingo');
                }


                if (boletosDia === 0 && boletos2Dias === 0 && boletoCompleto === 0) {
                    var auxDias = new Array();
                    auxDias.push('Viernes', 'Sabado', 'Domingo');
                    for (var nodo1 of auxDias) {
                        document.getElementById(nodo1).style.display = "none";
                    }
                }



                for (var nodo of diasElegidos) {
                    document.getElementById(nodo).style.display = "block";
                }
            }

        }

    }); //DOM CONTEN LOADED

})();
