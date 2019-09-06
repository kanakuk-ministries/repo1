jQuery(window).load(function() {
  var $ = jQuery;
  var changeButtonState = function(video, playpause) {
    if (video && playpause) {
      if (video.paused || video.ended) {
        playpause.setAttribute("data-state", "play");
      } else {
        playpause.setAttribute("data-state", "pause");
      }
    }
  };

  var setVideoControls = function(video, videoControls, playpause) {
    // Turn off the default controls
    video.controls = false;

    // Display the user defined video controls
    videoControls.setAttribute("data-state", "visible");

    video.addEventListener(
      "play",
      function(e) {
        changeButtonState(video, playpause);
      },
      false
    );

    video.addEventListener(
      "pause",
      function(e) {
        changeButtonState(video, playpause);
      },
      false
    );

    handlePlayPauseClick = function() {
      if (video.paused || video.ended) video.play();
      else video.pause();
    };

    playpause.addEventListener("click", handlePlayPauseClick);
  };

  // Videos for Executive Team members on About Team page about-teams.php
  if ($("#about-teams").length) {
    var video, handlePlayPauseClick;

    var videoModalButtons = document.getElementsByClassName(
      "video-modal-button"
    );
    var handleWatchInterview = function(e) {
      var current_key = e.target.dataset.key;
      var key = current_key;

      var this_staff_member = executive_staff.filter(function(staff_member) {
        var staff_member_name_key = staff_member.member_name
          .replace(/[^A-Z0-9]/gi, "")
          .toLowerCase();
        return staff_member_name_key === key;
      })[0];

      updateVideoElements(this_staff_member);
    };

    var updateVideoElements = function(this_staff_member) {
      if (this_staff_member) {
        var video_element = document.getElementById("custom-video");
        video_element.setAttribute(
          "poster",
          this_staff_member.video_splash_image.url
        );

        var video_source_element = document.getElementById("video-source");
        video_source_element.setAttribute("src", this_staff_member.video);

        var video_anchor = document.getElementById("video-anchor");
        video_anchor.setAttribute("href", this_staff_member.video);

        var video_quote = document.getElementById("video-quote");
        video_quote.innerHTML = this_staff_member.member_description;
      }
    };

    for (var i = 0, len = videoModalButtons.length; i < len; i++) {
      videoModalButtons[i].addEventListener("click", handleWatchInterview);
    }

    jQuery("[data-reveal]").on("open.zf.reveal", function() {
      video = document.getElementById("custom-video");
      var videoControls = document.getElementById("custom-video-controls");
      var playpause = document.getElementById("playpause");
      changeButtonState(video, playpause);

      setVideoControls(video, videoControls, playpause);
    });
  }

  // Videos for testimonials in content-testimonial.php
  if ($("#testimonial-block-container").length) {
    var keys = Object.keys(testimonials).map(function(key) {
      return {
        video: document.getElementById("testimonial-video-" + key),
        videoControls: document.getElementById(
          "testimonial-video-controls-" + key
        ),
        playpause: document.getElementById("playpause-" + key)
      };
    });

    var videos = keys.filter(function(key) {
      return key.video;
    });

    videos.forEach(function(videoObj) {
      var video = videoObj.video;
      var videoControls = videoObj.videoControls;
      var playpause = videoObj.playpause;

      setVideoControls(video, videoControls, playpause);
    });
  }

  // home hero parallax effect
  jQuery('.hero-container.inner').parallax({
    zIndex: 5,
    positionX: 'left',
    positionY: 'top',
  });
});
