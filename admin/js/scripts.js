
function loadUsersOnline() {


	$.get("functions.php?onlineusers=result", function(data){

		$(".usersonline").text(data);


	});



}


setInterval(function(){

	loadUsersOnline();


},500);

