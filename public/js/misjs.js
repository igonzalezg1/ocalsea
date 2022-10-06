//Datatables
let año = (new Date).getFullYear();
let mes = (new Date).getMonth() + 1;
let start = moment('' + año + '-' + mes + '').startOf('month');
let end = moment('' + año + '-' + mes + '').endOf('month');
let label = '';
var logo = 'data:image/png;base64,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';
var firma = 'data:image/jpeg;base64,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';

$(document).ready(function () {
    var DataTable = $('#tablageneral').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        scrollX: "true",
        dom: "Bfrtilp",
        buttons: [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> Excel',
            tittleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: [ 0,1,2,3,4,5,6,7,8]
            }
        },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                tittleAttr: 'Imprimir',
                className: 'btn btn-info',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8]
                }
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fas fa-file-csv"></i> CSV',
                tittleAttr: 'Exportar a CSV',
                className: 'btn btn-success',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8]
                }
            },
        ]
    });

    var DataTable = $('#DataTable').DataTable({
        "ajax": '',
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        scrollX: "true",
        dom: "Bfrtilp",
        buttons: [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> Excel',
            tittleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: [ 0,1,2,3,4,5,6,7,8]
            }
        },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                tittleAttr: 'Imprimir',
                className: 'btn btn-info',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8]
                }
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fas fa-file-csv"></i> CSV',
                tittleAttr: 'Exportar a CSV',
                className: 'btn btn-success',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7,8]
                }
            },
        ]
    });

    let año = (new Date).getFullYear();
    let mes = (new Date).getMonth() + 1;
    let start = moment('' + año + '-' + mes + '').startOf('month');
    let end = moment('' + año + '-' + mes + '').endOf('month');
    let label = '';

    $('#daterange-btn').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            },
            startDate: moment(start),
            endDate: moment(end),
            ranges: {
                'Hoy': [moment(), moment()],
                'Este año': [moment().subtract(1, 'days').startOf('year'), moment()],
                'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
                'Este mes': [moment().startOf('month'), moment().endOf('month')],
                'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')],
            }
        },
        function (start, end, label) {
            if (isDate(start)) {
                $('#daterange-btn span').html(start.format('YYYY/MM/DD') + ' - ' + end.format(
                    'YYYY/MM/DD'));
                minDateFilter = start;
                maxDateFilter = end;
                $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                    var date = Date.parse(data[8]);
                    if (
                        (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
                        (isNaN(minDateFilter) && date <= maxDateFilter) ||
                        (minDateFilter <= date && isNaN(maxDateFilter)) ||
                        (minDateFilter <= date && date <= maxDateFilter)
                    ) {
                        return true;
                    }
                    return false;
                });
                DataTable.draw();
            }
        });


    function isDate(val) {
        return Date.parse(val);
    }

    function IncDecMonth(Action) {
        if (!isDate(start)) {
            start = moment().startOf('month');
        }
        if (Action == 'Inc') {
            start = moment(start).add(0, 'month').startOf('month');
            end = moment(start).endOf('month')
        } else {
            start = moment(start).subtract(0, 'month').startOf('month');
            end = moment(start).endOf('month')
        }
        if (isDate(start)) {
            $('#daterange-btn span').html(start.format('DD MMM YYYY') + ' - ' + end.format('DD MMM YYYY'));
        }
        minDateFilter = start;
        maxDateFilter = end;
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var date = Date.parse(data[8]);
            if (
                (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
                (isNaN(minDateFilter) && date <= maxDateFilter) ||
                (minDateFilter <= date && isNaN(maxDateFilter)) ||
                (minDateFilter <= date && date <= maxDateFilter)
            ) {
                return true;
            }
            return false;
        });
        DataTable.draw();
    }

    IncDecMonth();
});
//Alerta para subir archivos.
$('.formulario-oc').submit(function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Estas seguro de subir este archivo?',
        text: "Revisa antes que el formato sea correcto, este proceso puede tardar hasta 5 minutos.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si es correcto!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var n = 0;
            Swal.fire({
                title: 'Cargando',
                text: 'Espera un momento porfavor esto puede tardar hasta 5 minutos',
                didOpen: () => {
                    Swal.showLoading();
                },
                allowOutsideClick: false,
            });
            this.submit();
        }
    });
});

//Funcion para mostrar que el archivo se subio de forma correcta.
function mostraroc() {
    Swal.fire(
        'Se subio el excel correctamente!',
        'Se ha subido el excel de forma correcta.',
        'success'
    );
}

//Funciones para modales
//Mostrar datos en modal OC
$(document).on("click",".btninformacion", function (){
    var id = $(this).data('id');
    var oc = $(this).data('oc');
    var remision = $(this).data('remision');
    var centro_costos = $(this).data('centrocostos');
    var factura = $(this).data('factura');
    var status = $(this).data('status');
    $('#id').val(id);
    $('#oc').val(oc);
    $('#remision').val(remision);
    $('#centro_costos').val(centro_costos);
    $('#factura').val(factura);
    $('#status').val(status);
});

//Mostrar datos en modal tiendas
$(document).on("click",".btntiendasedit", function (){
    var id = $(this).data('id');
    var no_tienda = $(this).data('numero');
    var nombre = $(this).data('nombre');
    var marca = $(this).data('marca');
    $('#no_tiendae').val(no_tienda);
    $('#nombree').val(nombre);
    $('#marcae').val(marca);
    $('#idtienda').val(id);
});

//Ventana para mostrar que se edito una orden de compra
function mostrareditaroc(oc){
    Swal.fire(
        'Se edito correctamente la orden de compra ' + oc,
        'Se ha subido el excel de forma correcta la orden de compra.',
        'success'
    );
}

//Ventana para indicar que se creo una nueva tienda
function tiendacreada(tiendacreada){
    Swal.fire(
        'Se creo la tienda ' + tiendacreada,
        'Se ha creado correctamente la tienda.',
        'success'
    );
}
//Ventana para indicar que se edito una tienda
function tiendaeditada(tiendaeditada){
    Swal.fire(
        'Se edito correctamente la tienda ' + tiendaeditada,
        'Se ha editado la tienda de forma correcta.',
        'success'
    );
}
//Ventana para indicar que se borro una tienda
function tiendaeliminada(){
    Swal.fire(
        'Se borro satisfactoriamente la tienda',
        'Se ha borrado de forma correcta la tienda.',
        'success'
    );
}
