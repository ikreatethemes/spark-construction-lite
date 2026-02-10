jQuery(document).ready(function ($) {
    var toggleSection = $('.sparkconstructionlite-toggle-section');

    // Initialize toggle icons and visibility on page load
    toggleSection.each(function () {
        var controlName = $(this).data('control');
        if (typeof controlName !== 'undefined' && controlName !== '') {
            var control = wp.customize.control(controlName);
            if (control) {
                var controlValue = control.setting.get();
                var parentHeader = $(this).parent();
                var iconClass = (controlValue === 'disable') ? 'dashicons-hidden' : 'dashicons-visibility';
                if (controlValue === 'disable') {
                    parentHeader.addClass('sparkconstructionlite-section-hidden').removeClass('sparkconstructionlite-section-visible');
                } else {
                    parentHeader.addClass('sparkconstructionlite-section-visible').removeClass('sparkconstructionlite-section-hidden');
                }
                $(this).children().attr('class', 'dashicons ' + iconClass);
            }
        }
    });

    // Handle clicks on toggle icon to change section visibility and update setting
    toggleSection.on('click', function (e) {
        e.stopPropagation();
        var controlName = $(this).data('control');
        if (typeof controlName !== 'undefined' && controlName !== '') {
            var control = wp.customize.control(controlName);
            if (control) {
                var currentValue = control.setting.get();
                var parentHeader = $(this).parent();
                if (currentValue === 'disable') {
                    control.setting.set('enable');
                    parentHeader.addClass('sparkconstructionlite-section-visible').removeClass('sparkconstructionlite-section-hidden');
                    $(this).children().attr('class', 'dashicons dashicons-visibility');
                } else {
                    control.setting.set('disable');
                    parentHeader.addClass('sparkconstructionlite-section-hidden').removeClass('sparkconstructionlite-section-visible');
                    $(this).children().attr('class', 'dashicons dashicons-hidden');
                }
            }
        }
    });

    // Listen for changes on onoffswitch (if toggled by other means) to sync icon and classes
    $('body').on('click', '.onoffswitch.switch-section', function () {
        var controlName = $(this).siblings('input').data('customize-setting-link');
        var controlValue = $(this).siblings('input').val();
        var iconClass = (controlValue === 'disable') ? 'dashicons-hidden' : 'dashicons-visibility';
        var toggleElem = $('[data-control=' + controlName + ']');
        if (controlValue === 'disable') {
            toggleElem.parent().addClass('sparkconstructionlite-section-hidden').removeClass('sparkconstructionlite-section-visible');
        } else {
            toggleElem.parent().addClass('sparkconstructionlite-section-visible').removeClass('sparkconstructionlite-section-hidden');
        }
        toggleElem.children().attr('class', 'dashicons ' + iconClass);
    });
});
