$(document).ready(function() {
	projekktor('#player_a', {
		poster: 'reproductor/media/intro.png',
		width: 848,
		height: 400,
		playlist: [
		{
			0: {src: "reproductor/media/1.mp4", type: "video/mp4"}
		},
        //0: {src: "media/2.mp4", type: "video/mp4"}
        {
        	1: {src: 'reproductor/media/2.mp4', escriba: 'video/mp4'}
        },
        {
        	2: {src: "reproductor/media/3.mp4", type: "video/mp4"}
        },

        ]    
    }, function(player) {} // on ready 
    );
});