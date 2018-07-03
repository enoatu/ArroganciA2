var flag;
var obj = document.f1.elements['check[]'];
var len = obj.length;
function show() {
    if (!len) {
        // checkboxが一つしかないときはこちらの処理
        // 有効なcheckboxだけチェックする
        if(obj.checked === true){
            flag = true;
        }else{flag=false;}
        if (flag === true) {
            document.getElementById("submit_btn").style.visibility = "visible";
        } else {
            document.getElementById("submit_btn").style.visibility = "hidden";
        }
    }
    else {
        // checkboxが複数あるときはこちらの処理
        for (i = 0; i < len; i++) {
            if (obj[i].checked === true) {
                flag = true;
                break;
            }else{flag=false;}

        }
        if (flag === true) {
            document.getElementById("submit_btn").style.visibility = "visible";
        } else {
            document.getElementById("submit_btn").style.visibility = "hidden";
        }

    }
}

