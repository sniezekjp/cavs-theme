



function onYouTubePlayerReady(id){

    setTimeout(function(){
		  var scope  = angular.element('#ytApi').scope();
    	var yt     = scope.yt;    	
    	var player = document.getElementById(yt.playerId);
    	
    	//load player into YoutubeApi
		yt.loadApi(player);
		yt.ready = true;
		yt.cueVideo( yt.defaultVid );
		scope.$apply();

	    //Add Youtube Event Listeners
	    player.addEventListener('onStateChange', 'ytEvent.onStateChange' );
	    player.addEventListener('onError', 'ytEvent.onError');

    }, 50)    

	return ytEvent = {

		  yt    : yt		
		, onStateChange : function (state){						
			this.yt.setPlayerState(state);
		}
		, onError : function(error){
			this.yt.setError(state);
		}
	}
}



var yt = angular.module('cavs.yt', [])


yt.factory('YoutubeAPI', ['$timeout','$rootScope', function($timeout, $rootScope){
	
	var yt = {
		  api         : null
		, ready       : false
		, apiId       : 'ytApi'
		, playerId    : 'ytPlayer' 
		, container   : 'ytContainer'
		, defaultVid  : 'hhTP8eWiIkI'
		, playerState : null
		, prevState   : null
		, ytError     : null
		, currentTime : 0
		, duration    : 0
		, isPlayerVisible : false

		, loadSwf : function(){
			var params = { allowScriptAccess: "always", allowFullScreen: true };
			var attrs  = { id : this.playerId };

			swfobject.embedSWF("http://www.youtube.com/v/" + this.defaultVid + "?version=3&enablejsapi=1&playerapiid=player1", 
                   this.container, "100%", "350", "9", null, null, params, attrs);

			// swfobject.embedSWF("http://www.youtube.com/apiplayer?" +
			// "version=3&enablejsapi=1&playerapiid=player1", 
			// this.container, "100%", "350", "9", null, null, params, attrs);
		}

		, loadApi : function(player){			
			this.api = player;			
		}

		, setError : function(error){
			this.ytError = error;
			console.log(error); 
		}

		, setPlayerState : function(state){
			this.prevState = this.playerState;			
			if(state == 1 && this.prevState != 1){				
				this.duration = this.api.getDuration();
				this.getCurrentTime();
			}
			this.playerState = state; 
		}

		, loadVideo : function(id){
			this.api.loadVideoById(id);			
		}

		, cueVideo : function(id){
			this.api.cueVideoById(id);			
		}		
		
		, play : function(){
			if(this.ready)
				this.api.playVideo();
			$timeout(function(){
				yt.play();
			}, 300)
		}

		, pause : function(){
			this.api.pauseVideo();
		}

		, seekTo : function(seconds){			
			this.api.seekTo(seconds, true);						
		}

		, getCurrentTime : function(loop){
			function getTime(){
				$timeout(function(){
					if(yt.playerState == 1){						
						yt.currentTime = yt.api.getCurrentTime();
						getTime();
					}					
				}, 1000)
			}

			getTime();
		}
	}

	return yt;
}]);


yt.controller('YtCtrl', ['$scope','YoutubeAPI', function($scope, yt){
	$scope.yt = yt; 
}])


yt.directive('ytApi', ['YoutubeAPI', function(yt){
	return{
		restrict: 'EAC',
		link: function(scope, element, attrs){
			element.attr('id', yt.apiId);
			scope.yt = yt; 
		}
	}
}]);






yt.directive('ytPlayer', ['YoutubeAPI', function(yt){
	return {
		restrict: 'EA',
		template: '<p>Youtube player.. click to play</p>',
		link: function(scope, element, attrs){
			//scope.yt = yt;
			element.attr('id', yt.container );
            google.setOnLoadCallback( yt.loadSwf() );
		}
	}
}]);









yt.directive('ytPlay', ['YoutubeAPI', function(yt){
	return {
		restrict: 'EA',
		template: '<a href="javascript:void(0);">Play</a>',
		link: function(scope, element, attrs){
			scope.yt = yt; 
			element.on('click', function(){
				scope.$apply(function(){
					yt.play(); 
				})
			})
		}
	}	
}])


yt.directive('ytPause', ['YoutubeAPI', function(yt){
	return {
		restrict: 'EA',
		template: '<a href="javascript:void(0);">Pause</a>',
		link: function(scope, element, attrs){
			scope.yt = yt; 
			element.on('click', function(){
				scope.$apply(function(){
					yt.play(); 
				})
			})
		}
	}	
}])



yt.directive('ytDo', ['YoutubeAPI', function(yt){
	return {
		restrict: 'EA',
		template: '<a href="javascript:void(0);">{{action}}</a>',
		scope: {
			ytDo : '@'
		},
		link: function(scope, element, attrs){
			scope.yt = yt;		
				if(attrs.ytDo == 'play'){
					scope.action = 'Play'; 
				}
				else if(attrs.ytDo == 'pause'){
					scope.action = 'Pause';
				}			
			
			element.on('click', function(){
				if(attrs.ytDo == 'play'){
					yt.play(); 
				}
				else if(attrs.ytDo == 'pause'){
					yt.pause();
				}				
			});
		}
	}
}])