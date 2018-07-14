function info(kind,msg) {
    $('#topbar').append(
        "<div class='alert alert-" + kind + "'alert-dismissible fade in role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>" + msg + "</div>"
    );
}
