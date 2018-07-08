var flag;
var obj = document.f1.elements['check[]'];
var len = obj.length;
var target = document.getElementById('popup');
function show() {
    for (i = 0; i < len; i++) {
        if (obj[i].checked === true) {
            flag = true;
            break;
        } else {
            flag=false;
        }

    }
    if (flag === true) {
        target.style.visibility = "visible";
        } else {
        target.style.visibility = "hidden";
    }
}
