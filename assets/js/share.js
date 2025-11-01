/**
 * Social Share Functions
 */
(function($) {
    'use strict';

    $(document).ready(function() {
        
        // ======================================
        // 1. FACEBOOK SHARE
        // ======================================
        $('.js-share-facebook').on('click', function(e) {
            e.preventDefault();
            var shareUrl = $(this).data('url');
            
            // Mở popup Facebook share
            window.open(
                shareUrl,
                'facebook-share-dialog',
                'width=626,height=436,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=0,left=' + (screen.width/2 - 313) + ',top=' + (screen.height/2 - 218)
            );
            
            return false;
        });

        // ======================================
        // 2. TWITTER/X SHARE
        // ======================================
        $('.js-share-twitter').on('click', function(e) {
            e.preventDefault();
            var shareUrl = $(this).data('url');
            
            // Mở popup Twitter share
            window.open(
                shareUrl,
                'twitter-share-dialog',
                'width=626,height=436,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=0,left=' + (screen.width/2 - 313) + ',top=' + (screen.height/2 - 218)
            );
            
            return false;
        });

        // ======================================
        // 3. COPY LINK TO CLIPBOARD
        // ======================================
        $('.js-copy-link').on('click', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            var $button = $(this);
            
            // Phương pháp 1: Sử dụng Clipboard API (modern browsers)
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(url).then(function() {
                    showCopySuccess($button);
                }).catch(function(err) {
                    // Fallback nếu Clipboard API thất bại
                    copyToClipboardFallback(url, $button);
                });
            } else {
                // Phương pháp 2: Fallback cho browsers cũ
                copyToClipboardFallback(url, $button);
            }
        });

        // ======================================
        // FALLBACK METHOD FOR OLD BROWSERS
        // ======================================
        function copyToClipboardFallback(text, $button) {
            // Tạo textarea tạm thời
            var $temp = $('<textarea>');
            $temp.css({
                position: 'absolute',
                left: '-9999px',
                top: '0'
            });
            $('body').append($temp);
            $temp.val(text).select();
            
            try {
                var successful = document.execCommand('copy');
                if (successful) {
                    showCopySuccess($button);
                } else {
                    showCopyError($button);
                }
            } catch (err) {
                showCopyError($button);
                console.error('Copy failed:', err);
            }
            
            $temp.remove();
        }

        // ======================================
        // SHOW SUCCESS NOTIFICATION
        // ======================================
        function showCopySuccess($button) {
            // Hiển thị toast notification
            var $toast = $('#copyToast');
            $toast.addClass('show');
            
            // Thay đổi text button tạm thời
            var originalText = $button.find('.btn-text').text();
            var lang = $('html').attr('lang') || 'en';
            var copiedText = (lang === 'vi') ? 'Đã sao chép!' : 'Copied!';
            
            $button.find('.btn-text').text(copiedText);
            $button.addClass('copied');
            
            // Reset sau 2 giây
            setTimeout(function() {
                $toast.removeClass('show');
                $button.find('.btn-text').text(originalText);
                $button.removeClass('copied');
            }, 2000);
        }

        // ======================================
        // SHOW ERROR NOTIFICATION
        // ======================================
        function showCopyError($button) {
            var lang = $('html').attr('lang') || 'en';
            var errorText = (lang === 'vi') ? 'Lỗi sao chép!' : 'Copy failed!';
            alert(errorText);
        }

        // ======================================
        // 4. NATIVE SHARE API (for mobile)
        // ======================================
        // Nếu trình duyệt hỗ trợ Web Share API (mobile)
        if (navigator.share) {
            $('.c-btn__09').each(function() {
                var $btn = $(this);
                if (!$btn.hasClass('icon-mail')) {
                    $btn.attr('data-has-native-share', 'true');
                }
            });

            // Thêm option để dùng native share trên mobile
            $('.js-share-facebook, .js-share-twitter').on('click', function(e) {
                if (window.innerWidth <= 768 && $(this).attr('data-has-native-share')) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    var shareData = {
                        title: document.title,
                        url: $(this).data('url')
                    };
                    
                    navigator.share(shareData).catch(function(err) {
                        console.log('Share cancelled or failed:', err);
                    });
                    
                    return false;
                }
            });
        }

    });

})(jQuery);