// loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    playerVars: {
        enablejsapi: 1,
        controls: 1
    },
    height: '620',
    width: '1000',
    videoId: 'wgBqVfRLG78',
    events: {
    }
  });
}

var playButton = document.querySelector('#play-button');
var fallbackImage = document.querySelector('.fallback-image');

if(playButton){
    playButton.addEventListener('click', function(){

        player.playVideo();
        setTimeout(function(){
            fallbackImage.style.opacity = 0;

        }, 500);
        setTimeout(function(){
            fallbackImage.style.zIndex = -99;
        }, 3000);
    })
}