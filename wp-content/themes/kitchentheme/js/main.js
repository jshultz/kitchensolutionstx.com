/** * Created by jshultz on 9/26/13. */// Change background depending on user's timefunction applyclass(){	var d = new Date();	var n = d.getHours();	if (n > 19)// If time is 7PM or later apply night theme to 'body'	$('body').addClass('night');	else if (n > 16 && n < 19)// If time is between 4PM – 7PM sunset theme to 'body'	$('body').addClass('sunset');	else// Else use 'day' theme	$('body').addClass('day');	}window.onload = applyclass;