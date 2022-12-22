<html>
<head>
<title>Countdown</title>
<script type="text/javascript">
 // set minutes
var mins = 1;

 // calculate the seconds (don't change this! unless time progresses at a         different speed for you...)
var secs = mins * 0;
var timeout;

function countdown() {
  timeout = setTimeout('Increment()', 1000);
}


function colorchange(minutes, seconds)
{
 if(minutes.value =="14" && seconds.value =="59")
 {
    minutes.style.color="black";
    seconds.style.color="black";
 }
 else if(minutes.value =="15" && seconds.value =="00")
 {
    minutes.style.color="red";
    seconds.style.color="red";
 }

}

function Increment() {
  if (document.getElementById) {
    minutes = document.getElementById("minutes");
    seconds = document.getElementById("seconds");
    // if less than a minute remaining

    if (seconds > 0) {
    seconds.value = secs;

    } else {
      minutes.value = getminutes();
      seconds.value = getseconds();
    }
    colorchange(minutes,seconds);

    secs++;
    if (secs > 1800) {
      clearTimeout(timeout);
      return;
    }
    countdown();
  }
}

function getminutes() {
  // minutes is seconds divided by 60, rounded down
  mins = Math.floor(secs / 60);
  return ("0" + mins).substr(-2);
}

function getseconds() {
  // take mins remaining (as seconds) away from total seconds remaining
  return ("0" + (secs - Math.round(mins * 60))).substr(-2);
}

</script>
</head>
<body>

<div id="timer">
<input id="minutes" type="text" style="width: 40px; border: none; background-color:none; font-size: 30px; font-weight: bold;"> :
 <input id="seconds" type="text" style="width: 40px; border: none; background-color:none; font-size: 30px; font-weight: bold;"> 
 </div>
<script>
countdown();
</script>