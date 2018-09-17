var flag = false;
var obj = document.f1.elements['check[]'];
var len = obj.length;
var target = document.getElementById('popup');
function show() {
    if (!len) {
        flag = obj.checked ? true : false;
    }
    for (i = 0; i < len; i++) {
        flag = obj[i].checked ? true : false;
        if(flag) break;
    }
    return toggle();
}

function toggle() {
  return target.style.visibility = flag ? "visible" : "hidden";
}


