
var app = angular.module('Cavs', ['ngAnimate', 'cavs.yt', 'ngSanitize']);

//Twitter Controller
app.controller('TwitterCtrl', ['$scope','$timeout', '$http',function($scope, $timeout, $http){

	$scope.select = 0;
	$scope.tweets =  [];

	$scope.next = function(){
		$scope.select++; 

		if( $scope.select > ($scope.tweets.length - 1) )
			$scope.select = 0;
	}

	$scope.loop = function(){		
		$scope.promise = $timeout(function(){
			$scope.next(); 
			$scope.loop(); 
		}, 3500)
	}

	$scope.cancel = function(){
		$timeout.cancel($scope.promise); 
	}
	
	$http.get('http://novacavaliers.com/?tweets=1').success(function(data){
    	$scope.tweets = data; 
	})

	$scope.loop();

}]);

app.filter('twittify', function(){
	return function(text){
		return text.replace(/[\@\#]([a-zA-z0-9_]*)/g,
	        function(m,m1) {
	            var t = '<a href="http://twitter.com/';
	            if(m.charAt(0) == '#')
	                t += 'hashtag/';
	            return t + encodeURI(m1) + '" target="_blank">' + m + '</a>';
        });
	}
})




//Slider Controller
app.factory('SliderOptions', function(){
	return {
		sliderCount: 4, 
		current: 0, 
		hover: true
	}
})
app.controller('SliderCtrl', ['$scope', 'SliderOptions', '$timeout',function($scope, options, $timeout){
	$scope.hover = options.hover;
	$scope.options = options; 

	$scope.do = function(){	
		$scope.hover = !$scope.hover;		
	}

	$scope.next = function(){
		$scope.options.current++; 

		if( $scope.options.current > ($scope.options.sliderCount) )
			$scope.options.current = 0;
	}

	$scope.loop = function(){	
		$scope.promise = $timeout(function(){
			$scope.next(); 
			$scope.loop(); 
		}, 3500)
	}

	$scope.cancel = function(){
		$timeout.cancel($scope.promise); 
	}

	$scope.loop();	
}]); 

app.directive('slide', ['SliderOptions',function(Options){
	return {
		restrict: 'A',
		link: function(scope, element, attrs){
			scope.options = Options; 

			element.on('click', function(){				
				scope.$apply(function(){
					scope.options.current = attrs.slide;
				})				
			});

			scope.$watch('options.current', function(current, previous){
				if(attrs.slide == current){
					element.addClass('active');
				}
				else{
					element.removeClass('active');
				}
			})
		}
	}
}])



//YoutubeCtrl
app.controller('CavsYt', ['$scope', 'YoutubeAPI', '$http', 
	function($scope, yt, $http){
		$scope.yt = yt; 
		$scope.isPlayerVisible = false; 
		$scope.videos = []; 
		$scope.currentTitle = '';
		$scope.extras = vids

		$http.get('https://gdata.youtube.com/feeds/api/users/novacavs/'+
			'uploads?v=2&alt=jsonc').success(function(res){
				$scope.videos = res.data.items;

				$scope.extras.forEach(function(id) {
					$http.get('https://gdata.youtube.com/feeds/api/videos/'+id+'?v=2&alt=jsonc')
					.success(function(res) {
						if(res)
							$scope.videos.push(res.data)
					})						
				})			
			});
		$scope.log = function(){
			console.log($scope.extras);
		}

		$scope.showAndPlay = function(id, title){
			$scope.yt.loadVideo(id); 
			$scope.isPlayerVisible = true; 
			$scope.currentTitle = title; 
			$('body').css('overflow', 'hidden');
		}

		$scope.hideAndPause = function(){
			$scope.yt.pause(); 
			$scope.isPlayerVisible = false; 
			$('body').css('overflow', 'auto');
		}

}]);
//Youtube title filter	
app.filter('ytTitle', function() {
  return function(input, limit) {
  	var out;
    input = input || '';
		
		if(input.length > limit){
			var sub = input.substring(0, limit)
			out = sub + '...'
		}
		else{
			out = input
		}  
		return out  
  };
})



//Search
app.directive('searchs', ['$location', '$http',function($location, $http){
	return {
		controller: function($scope){
			$scope.q = "";
		},
		link: function(scope, element, attrs){
			element.on('submit', function(){
				return true; 
				// scope.$apply(function(){
				// 	$location
				// 		.path('/wordpress?q=' + scope.q)
				// 		.replace();
				// })					
			})
		}
	}
}])




//Bootstrap Mobile Menu 

function splitValue(value, index) {
    return value.substring(0, index) + "<br />" + value.substring(index);
}

jQuery(document).ready(function(){
	var menu = jQuery('#cavs-main-menu ul');
	var items = menu.find('li'); 
	items.each(function(key, item){
		var li = jQuery(item);
		var submenu = li.find('ul'); 
		if(submenu.length > 0 ){
			li.addClass('dropdown')
			li.children('a').addClass('dropdown-toggle');
			li.children('a').attr('data-toggle', 'dropdown');
			li.children('ul').addClass('dropdown-menu');
		}
	})
	
	var teamDropdown = jQuery('#menu-item-2083'); 
	teamDropdown.find('ul li').each(function(key, value){
	    var teamLink = jQuery(value).children('a');
	    teamLink.html( splitValue(teamLink.html(), 13) );
	})
	
})




