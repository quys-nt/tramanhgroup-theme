<?php
/**
 * Template for Tin tức (Vietnamese version)
 */
get_header();

// Include shared category layout
get_template_part('template-parts/category-layout');

get_footer();
?>

<script>
  // Tab functionality
  function activateTab(tabId) {
    // Remove active class from all tabs
    $('.js-tab-btn').removeClass('active');
    $('.tab-content').removeClass('active');

    // Add active class to the specified tab
    var $targetBtn = $('.js-tab-btn[data-tab="' + tabId + '"]');
    if ($targetBtn.length) {
      $targetBtn.addClass('active');
      $('#tab-' + tabId).addClass('active');
    }
  }

  function handleTabChange(tabId) {
    activateTab(tabId);

    // Update URL without reload
    var newUrl = window.location.pathname + '?tab=' + tabId;
    window.history.pushState({
      path: newUrl
    }, '', newUrl);

    // Scroll to .p-archive__sec02
    var $targetSection = $('.p-archive__sec02');
    if ($targetSection.length) {
      $('html, body').animate({
        scrollTop: $targetSection.offset().top - 100 // Adjust offset as needed
      }, 800);
    }
  }

  // Handle initial load and popstate (back/forward)
  function initTabFromUrl() {
    var urlParams = new URLSearchParams(window.location.search);
    var tabId = urlParams.get('tab') || 'all'; // Default to 'all' if no tab param

    // Ensure the tab exists; fallback to 'all' if not
    var $tabBtn = $('.js-tab-btn[data-tab="' + tabId + '"]');
    if ($tabBtn.length === 0) {
      tabId = 'all';
    }

    handleTabChange(tabId);
  }

  // Initialize on load
  initTabFromUrl();

  // Handle browser back/forward
  window.addEventListener('popstate', function(event) {
    if (event.state && event.state.path) {
      var urlParams = new URLSearchParams(event.state.path.split('?')[1] || '');
      var tabId = urlParams.get('tab') || 'all';
      console.log(tabId)
      activateTab(tabId); // Only activate tab, no scroll on popstate to avoid jarring jumps
    } else {
      // Fallback: re-parse current URL
      initTabFromUrl();
    }
  });
  Í
</script>