$(document).ready(function() {
    function activateTabFromURL() {
        var urlParams = new URLSearchParams(window.location.search);
        var activeTab = urlParams.get('tab') || 'company'; // Default to 'company'

        var tabMapping = {
            'company': '#company-setting',
            'recaptcha': '#recaptcha-setting',
            'system': '#system-settings',
            'email': '#email-settings',
        };

        var activeTabSelector = tabMapping[activeTab] || '#company-setting';

        $('.col-xl-12 > div').hide(); // Hide all sections initially

        setTimeout(function() {
            $('.edit-loader').fadeOut(); // Hide loader
            $(activeTabSelector).fadeIn(); // Show the selected section
            $('a.profile-tab').removeClass('active');
            $('a[data-target="' + activeTabSelector + '"]').addClass('active');
        }, 100); // 1-second delay to simulate loading effect
    }

    activateTabFromURL(); // Load the correct tab immediately on page load

    $('a.profile-tab').on('click', function(e) {
        e.preventDefault();

        $('.edit-loader').fadeIn(); // Show loader on tab switch
        $('a.profile-tab').removeClass('active');
        $('.col-xl-12 > div').hide();

        $(this).addClass('active');

        var target = $(this).data('target');
        var queryValue = $(this).data('query');

        setTimeout(function() {
            $('.edit-loader').fadeOut();
            $(target).fadeIn();
        }, 100); // Shorter delay for smoother experience

        var newURL = window.location.pathname + '?tab=' + queryValue;
        window.history.pushState({ path: newURL }, '', newURL);
    });

    window.addEventListener('popstate', activateTabFromURL);

    function handleImageUpload(inputId, imgId, resetId) {
        let fileInput = $('#' + inputId);
        let imgElement = $('#' + imgId);
        let resetButton = $('#' + resetId);

        let originalSrc = imgElement.attr('src');

        fileInput.on('change', function() {
            if (this.files && this.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    imgElement.attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        resetButton.on('click', function() {
            fileInput.val('');
            imgElement.attr('src', originalSrc);
        });
    }

    handleImageUpload('upload1', 'uploadedLightLogo', 'reset1');
    handleImageUpload('upload2', 'uploadedDarkLogo', 'reset2');
    handleImageUpload('upload3', 'uploadedFavicon', 'reset3');

    const recaptchaType = $('#google_recaptcha_type');
    const recaptchaKey = $('#google_recaptcha_key');
    const recaptchaSecret = $('#google_recaptcha_secret');
    const recaptchaKeyLabel = $('#google_recaptcha_key_label');
    const recaptchaSecretLabel = $('#google_recaptcha_secret_label');

    recaptchaType.on('change', function() {
        if ($(this).val() === 'no_captcha') {
            recaptchaKey.val('').removeAttr('required');
            recaptchaSecret.val('').removeAttr('required');
            recaptchaKeyLabel.find('.text-danger').remove();
            recaptchaSecretLabel.find('.text-danger').remove();
        } else {
            recaptchaKey.attr('required', 'required');
            recaptchaSecret.attr('required', 'required');
            if (!recaptchaKeyLabel.find('.text-danger').length) {
                recaptchaKeyLabel.append('<span class="text-danger"> *</span>');
            }
            if (!recaptchaSecretLabel.find('.text-danger').length) {
                recaptchaSecretLabel.append('<span class="text-danger"> *</span>');
            }
        }
    }).trigger('change'); 

    $("#testMailForm").on("submit", function () {
        $("#sendTestMailBtn").prop("disabled", true); // Disable button
        // $("#sendTestMailText").addClass("d-none"); // Hide text
        $("#sendTestMailLoader").removeClass("d-none"); // Show spinner
    });

});

// Select2 (jquery)
$(function() {
    var select2 = $('.select2');
    // For all Select2
    if (select2.length) {
        select2.each(function() {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this.select2({
                dropdownParent: $this.parent()
            });
        });
    }
});