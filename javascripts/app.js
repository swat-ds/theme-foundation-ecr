(function ($) {
  $(document).ready(function() {
    $('.search-toggle').on('click',function() {
      $('#search-container').toggleClass('open').toggleClass('closed');
    }); 

    /* for oral history view adds timeupdate listener */
    if ( $('audio').length ) {
      const $audio = $('audio');
      const idString = '#oral-history-item-type-metadata-transcription';
      const $transcript = $(idString);
      let currIndex = 0;
      let timestamps = $(idString + ' p')
            .map( (i,v) => [ 
              [Number(v.dataset.timestart), Number(v.dataset.timestop)] 
            ] );

      $audio.on('timeupdate', function(d) { 
        let currTime = d.currentTarget.currentTime * 1000;

        if ( 
          currTime > timestamps[currIndex][0] 
          && currTime <= timestamps[currIndex][1] 
        ) { 
          
          let currSection = $(`${idString} p[data-timestart=${timestamps[currIndex][0]}]`);

          currSection.toggleClass('active').delay(1000)
            .queue(function (next) { 
              $(this).toggleClass('active'); 
              next(); 
            });

            $transcript.scrollTo(currSection, {duration:250, offset: -75})
          currIndex++;
        }
      } );
    }
  });
})(jQuery)