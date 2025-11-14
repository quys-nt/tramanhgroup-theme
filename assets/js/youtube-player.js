/**
 * YouTube Player Component Handler
 */
(function($) {
  'use strict';

  class YouTubePlayer {
    constructor(element) {
      this.$element = $(element);
      this.$iframe = this.$element.find('.js-youtube-player__iframe');
      this.$thumbnail = this.$element.find('.js-youtube-thumbnail');
      this.$playBtn = this.$element.find('.js-youtube-play');
      this.player = null;
      this.playerReady = false;
      this.playerId = this.$iframe.attr('id');
      
      this.init();
    }

    init() {
      // Load YouTube API if not loaded
      if (!window.YT) {
        this.loadYouTubeAPI();
      } else {
        this.initPlayer();
      }

      // Bind play button click
      this.$playBtn.on('click', () => this.handlePlay());
    }

    loadYouTubeAPI() {
      // Check if script is already added
      if (!$('script[src*="youtube.com/iframe_api"]').length) {
        const tag = document.createElement('script');
        tag.src = 'https://www.youtube.com/iframe_api';
        const firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      }

      // Wait for API to load
      const checkAPI = setInterval(() => {
        if (window.YT && window.YT.Player) {
          clearInterval(checkAPI);
          this.initPlayer();
        }
      }, 100);
    }

    initPlayer() {
      if (!window.YT || !window.YT.Player) return;

      this.player = new YT.Player(this.playerId, {
        events: {
          'onReady': () => {
            this.playerReady = true;
          }
        }
      });
    }

    handlePlay() {
      // Hide thumbnail and button
      this.$thumbnail.fadeOut(300);
      this.$playBtn.fadeOut(300);

      // Update iframe src to include autoplay
      const currentSrc = this.$iframe.attr('src');
      if (currentSrc.indexOf('autoplay=1') === -1) {
        const newSrc = currentSrc + (currentSrc.indexOf('?') > -1 ? '&' : '?') + 'autoplay=1';
        this.$iframe.attr('src', newSrc);
      }

      // Play video if player is ready
      if (this.playerReady && this.player && typeof this.player.playVideo === 'function') {
        this.player.playVideo();
      } else {
        // If player not ready, wait and try again
        setTimeout(() => {
          if (this.player && typeof this.player.playVideo === 'function') {
            this.player.playVideo();
          }
        }, 500);
      }
    }
  }

  // Initialize all YouTube players on page
  $(document).ready(function() {
    $('[data-youtube-player]').each(function() {
      new YouTubePlayer(this);
    });
  });

})(jQuery);