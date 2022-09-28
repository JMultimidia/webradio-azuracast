var mediaMetadata = navigator.mediaSession.metadata;
var nowPlaying;
var myJSon;
var myJSonColor;
var colorJson;

var old_cover = "";
var duracao = 0;
var atual = 0;

function toTimeString(seconds) {
	var retorno = (new Date(seconds * 1000)).toUTCString().match(/(\d\d:\d\d:\d\d)/)[0]
	return (seconds > 3600 ? retorno : retorno.substring(3, 8));
}

function setaCores() {
	
	$.ajax({
        cache: false,
        dataType: "json",
        url: "color.php?image=" + btoa(old_cover),
        success: function(result) {
            colorJson = result;
			console.log(colorJson);
			myJSonColor = JSON.parse(JSON.stringify(colorJson));
			if (myJSonColor["color"]){
				$(".cp-circle-back").fadeOut("slow", function () {
					$(this).css("background-color", "#" + myJSonColor["color"]);
					$(this).fadeIn("slow");
				});
			}
        }
    }).fail(function() {
		setTimeout("setaCores();", 1000);
    });
	
}

function atualizaProgresso(){
	
	var duracao = parseInt($('#duracao_total').val());
	var atual = parseInt($('#tempo_atual').val());
	
	$("#progresso").css("width", Math.trunc(((atual * 200) / duracao)) + "px");
	
	$("#relogio_total").html((duracao == 0 ? "00:00" : toTimeString(duracao)));
	$("#relogio_atual").html((atual == 0 ? (duracao > 3600 ? "00:00:00" : "00:00") : toTimeString(atual)));
	
	if (atual < duracao){
		$("#duracao_total").val(duracao);
		$("#tempo_atual").val((atual + 1));
	}
	
	setTimeout("atualizaProgresso();", 1000);
	
}

function secondsToTime(secs) {
	
	console.log(secs);
	
    secs = Math.round(secs);
    var hours = Math.floor(secs / (60 * 60));

    var divisor_for_minutes = secs % (60 * 60);
    var minutes = Math.floor(divisor_for_minutes / 60);

    var divisor_for_seconds = divisor_for_minutes % 60;
    var seconds = Math.ceil(divisor_for_seconds);

	return (hours > 0 ? "há " + hours + " hora" + (hours > 1 ? "s" : "") : (minutes > 0 ? "há " + minutes + " minuto" + (minutes > 1 ? "s" : "") : "há " + seconds + " segundo" + (seconds > 1 ? "s" : "")));
    
}

function loadLastMusic() {
	
	var contador = 1;
	
	var res = JSON.parse(JSON.stringify(nowPlaying));
	
	var seconds = Math.floor(new Date().getTime() / 1000);
	
	Object.entries(res["song_history"]).forEach((entry) => {
		const [key, value] = entry;
		console.log(contador + " - " + secondsToTime((seconds - value["played_at"])) + " - " + value["song"]["title"] + " - " + value["song"]["artist"] + " - " + value["song"]["album"] + " - " + value["song"]["art"]);
		contador++;
	});
	
}

function loadNowPlaying() {
	
    $.ajax({
        cache: false,
        dataType: "json",
        url: 'https://demo.azuracast.com/api/nowplaying_static/azuratest_radio.json',
        success: function(np) {
            nowPlaying = np;
			
			console.log(nowPlaying);
			
			myJSon = JSON.parse(JSON.stringify(nowPlaying));
			
			navigator.mediaSession.metadata = new MediaMetadata({
			  title: myJSon["now_playing"]["song"]["title"],
			  artist: myJSon["now_playing"]["song"]["artist"],
			  album: myJSon["now_playing"]["song"]["album"],
			  artwork: [
				{ src: myJSon["now_playing"]["song"]["art"], sizes: '256x256', type: 'image/jpg' }
			  ]
			});
				
			$("#musica_atual").html(myJSon["now_playing"]["song"]["text"]);
			$("#proxima_musica").html(myJSon["playing_next"]["song"]["text"]);
			
			if (old_cover != myJSon["now_playing"]["song"]["art"]){
				
				$("#duracao_total").val(myJSon["now_playing"]["duration"]);
				$("#tempo_atual").val(myJSon["now_playing"]["elapsed"]);
					
				$("#myImage").fadeOut("slow", function () {
					$("body").css("background-color", "#000000");
					$("html").css("background-color", "#000000");
					$(this).css("background-image", "url('" + myJSon["now_playing"]["song"]["art"] + "')");
					$(this).fadeIn("slow");
				});
					
				old_cover = myJSon["now_playing"]["song"]["art"];
				
				loadLastMusic();
				setaCores();
					
			}
			
			setTimeout("loadNowPlaying();", 15000);
        }
    }).fail(function() {
		setTimeout("loadNowPlaying();", 30000);
    });
}

function muda_bitrate(){
	
	var bitrate = $('#bitrate').val();
	
	$.ajax({
        cache: false,
        dataType: "json",
        url: "bitrate.php?br=" + bitrate,
        success: function(result) {
            bitrateJson = result;
			console.log(bitrateJson);
			myJSonBitrate = JSON.parse(JSON.stringify(bitrateJson));
			if (myJSonBitrate["bitrate"]){
				document.location.reload(true);
			}
        }
    }).fail(function() {
		setTimeout("muda_bitrate();", 1000);
    });

}

$(function() {
	atualizaProgresso();
    loadNowPlaying();
});