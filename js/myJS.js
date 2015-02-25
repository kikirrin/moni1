
//$( document ).bind( "mobileinit", function(){
//    $.mobile.page.prototype.options.degradeInputs.date = true;
//});	   


function cutStringNotHalfWords(str, length, delim, appendix) {
    if (str.length <= length)
        return str;

    var trimmedStr = str.substr(0, length + delim.length);

    var lastDelimIndex = trimmedStr.lastIndexOf(delim);
    if (lastDelimIndex >= 0)
        trimmedStr = trimmedStr.substr(0, lastDelimIndex);

    if (trimmedStr)
        trimmedStr += appendix;
    return trimmedStr;

}

            
//function aud_play_pause() {
//    var audio = document.getElementById("audio");
//    var boton = document.getElementById("pausa");	
//    if (audio.paused) {
//        boton.innerHTML = " ";
//        audio.play();
//    } else {
//        boton.innerHTML = " ";
//        audio.pause();
//    }
//}
  
   $('#Login').bind("pagebeforecreate", function() {
                //                      localStorage.clear();
                //                      alert("borrado");
                if (localStorage.getItem('status') == 'logueado') {
                    $('#username').val(localStorage.getItem('usernameMonitoreoMedios'));
                    $('#password').val(localStorage.getItem('passwordMonitoreoMedios'));
                    $('#formIndex').submit();
                }
            });