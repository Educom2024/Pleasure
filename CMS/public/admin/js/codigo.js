$(document).ready(function(){
    $('.delete_link').on('click', function(){
        const id = $(this).attr('rel');
        const titulo = $(this).attr('titulo');
        const tabla = $(this).attr('tabla');
        const accion = $(this).attr('accion');


        const delete_url = `index.php?${tabla}&${accion}=${id}`;
        $('.delete-title').html(titulo);
        $('.delete-body').html('¿Estas seguro de eliminar el item?');
        $('.btn-delete').attr('href', delete_url);
        $('#deleteModal').modal('show');
    })
});