function copyText () {
        var $target = document.querySelector('#copyTarget');
        if (!$target) {
                    return false;
                }
        var range = document.createRange();
        range.selectNode($target);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand('copy');
        popup();
}
document.querySelector('#copyBtn').addEventListener('click', copyText, false);

function popup() {
        
        toastr.options.timeOut = 1500;
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        Command: toastr["info"]("", "コピーしました");
        $('#linkButton').click(function() {
            toastr.success('click');
        });
}


