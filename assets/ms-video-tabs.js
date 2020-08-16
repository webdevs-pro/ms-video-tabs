(function($) {


	var MSVideoTabs = function( $scope, $ ) {



      var $video = $($scope.find('.ms_video_tabs_content_pane video'));
      $video.trigger('play');



      var first_button = $scope.find('.ms_video_tabs_button:first-child');
      $(first_button).addClass('active');

      $scope.find('.ms_video_tabs_button').click(function(){

         $scope.find('.ms_video_tabs_button.active').removeClass('active');
         $(this).addClass('active');

         var heading = $(this).attr('data-tab-heading');
         var description = $(this).attr('data-tab-description');
         var video = $(this).attr('data-tab-video');


         $scope.find('.ms_video_tabs_heading').text(heading);
         $scope.find('.ms_video_tabs_description').text(description);
         $video.attr('src', video);

         $video.addClass('fade_in');
         setTimeout(function() {
            $video.removeClass('fade_in');
         }, 500);

         $video.trigger('play');




      });

      $video.on('playing', function() {
         maxduration = this.duration + 's';
         $('.ms_video_tabs_button.active .ms_video_tabs_button_progress').css({
            'animation-duration': maxduration,
            'animation-play-state': 'running'
         });
      });  
      
      $video.on('pause', function() {
         $('.ms_video_tabs_button.active .ms_video_tabs_button_progress').css({
            'animation-play-state': 'paused'
         });
      });      

      $video.on('ended', function() {
         console.log('ended');
         if($($scope.find('.ms_video_tabs_button.active').next('.ms_video_tabs_button')).length) {
            $scope.find('.ms_video_tabs_button.active').next('.ms_video_tabs_button').trigger('click').addClass('active');
            $scope.find('.ms_video_tabs_button.active').prev('.ms_video_tabs_button').removeClass('active');
         } else {
            $scope.find('.ms_video_tabs_button.active').removeClass('active');
            $(first_button).trigger('click');
         }

      });

      

   };

	$( window ).on( 'elementor/frontend/init', function() {
      elementorFrontend.hooks.addAction( 'frontend/element_ready/ms_video_tabs.default', MSVideoTabs );
   } );


})(jQuery);






