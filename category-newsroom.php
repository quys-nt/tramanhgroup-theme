<?php

/**
 * Template for Tin tức (Vietnamese version)
 */
get_header();


get_template_part('template-parts/category-layout');


get_footer();
?>

<script>
  function activateTab(tabId) {
    $('.js-tab-btn').removeClass('active');
    $('.tab-content').removeClass('active');

    var $targetBtn = $('.js-tab-btn[data-tab="' + tabId + '"]');
    if ($targetBtn.length) {
      $targetBtn.addClass('active');
      $('#tab-' + tabId).addClass('active');
    }
  }

  function handleTabChange(tabId, updateUrl, shouldScroll) {
    activateTab(tabId);

    if (updateUrl) {
      var newUrl = window.location.pathname + '?tab=' + tabId;
      window.history.pushState({
        path: newUrl
      }, '', newUrl);
    }

    if (shouldScroll) {
      var $targetSection = $('.p-archive__sec02');
      if ($targetSection.length) {
        $('html, body').animate({
          scrollTop: $targetSection.offset().top - 100
        }, 800);
      }
    }
  }

  function initTabFromUrl() {
    var urlParams = new URLSearchParams(window.location.search);
    var tabId = urlParams.get('tab');

    if (!tabId) {
      activateTab('all');
      return;
    }

    var $tabBtn = $('.js-tab-btn[data-tab="' + tabId + '"]');
    if ($tabBtn.length === 0) {
      tabId = 'all';
    }

    handleTabChange(tabId, false, true);
  }

  initTabFromUrl();

  $('.js-tab-btn').on('click', function() {
    var tabId = $(this).data('tab');
    handleTabChange(tabId, true, true);
  });

  window.addEventListener('popstate', function(event) {
    if (event.state && event.state.path) {
      var urlParams = new URLSearchParams(event.state.path.split('?')[1] || '');
      var tabId = urlParams.get('tab') || 'all';
      console.log(tabId);
      activateTab(tabId);
    } else {

      initTabFromUrl();
    }
  });
</script>