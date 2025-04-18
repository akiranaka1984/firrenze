const toast = swal.mixin({
    toast: true,
    position: 'center-center',
    showConfirmButton: false,
    timer: 5000,
    padding: '1em'
});


const simpleMessage = function(status, message){
    toast({ type: status, title: message, padding: '1em' })
}

const successMessageDialog = function(status, message){
    swal({
        title: 'Good job!',
        text: message,
        type: status,
        padding: '2em'
      })
}