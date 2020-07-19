jQuery(document).ready(function($){
  $('body').on('click', '.table .delete', function(e){
    var form = $(this).parent(form);

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $(form).submit();
      }
    });

    return false;
  });

  $('#datatable').DataTable({
    order: [],
    columnDefs: [
       { orderable: false, targets: [0, 2, 3, 6] }
    ]
  });
});