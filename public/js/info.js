//function info(kind,msg) {
//    $('#topbar').append(
//        "<div class='alert alert-" + kind + "'alert-dismissible fade in role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>" + msg + "</div>"
//    );
//}

function info(kind, msg){
    toastr.options.timeOut = 1500; // 3秒
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass":'',// "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    Command: toastr["info"]("", msg);
    $('#linkButton').click(function() {
        toastr.success('click');
    });
}

