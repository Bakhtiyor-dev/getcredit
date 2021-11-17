window.hideWarning = false;

window.addEventListener('beforeunload', (event) => {
    if (!hideWarning) {
        event.preventDefault();
        event.returnValue = '';
    }
});

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}


$('.answer input[type=radio]').on('click',function(e){
    var id = $(this).attr('name');
    $('#nav'+id).addClass('btn-primary');
});


$('.submit').on('click',(e) => {
    e.preventDefault();
    warn();
});

function warn(){
  Swal.fire({
    title: 'Действительно хотите завершить?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Завершить',
    cancelButtonText:'Отмена'
  }).then((result) => {
    if (result.isConfirmed) {
      $('#form').submit();
    }
  })
}


