$(document).ready(function() {
    $('.table').DataTable({
      responsive: true,
      language: {
        "emptyTable": "Esta tabela está vazia.",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ de entidades",
        "search": "Pesquise:",
        "infoEmpty": "Mostrando 0 a 0 de 0 entidades",
        "lengthMenu":"Mostrar _MENU_ entidades",
        "loadingRecords": "Carregando...",
        "zeroRecords": "Nenhum registro encontrado",
        "paginate": {
          "first": "Primeira",
          "last": "última",
          "next": "Próxima",
          "previous": "Anterior"
        },
        "infoFiltered": "(filtrado de _MAX_ total de registros)"
      }
    });
});