var timer = new easytimer.Timer();
var time = 20 * 60;

progress(time);
timer.start({countdown: true, startValues: {seconds: time}});

$('#countdown .values').html(timer.getTimeValues().toString(['minutes','seconds']));

timer.addEventListener('secondsUpdated', function (e) {
    $('#countdown .values').html(timer.getTimeValues().toString(['minutes','seconds']));
});

timer.addEventListener('targetAchieved', function (e) {
    window.hideWarning = true;
    $('#form').submit();
    $('#countdown .values').html('<span class="text-danger">Время истек!</span>');
});


function progress(time) {

    var elem = document.getElementById("progress");
    var width = 100;
    var loop = setInterval(frame, time*10);
    
    function frame() {
      if (width == 0) {
        clearInterval(loop);
      } else {
        width--;
        elem.style.width = width + "%";
      }
    }

}
