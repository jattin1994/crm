$(document).ready(function() {

    /*** NiceScroll ***/

    $(".sidebar-menu-inner").niceScroll({
        cursorwidth: 5,
        cursorcolor: '#2491eb',
        cursorborder: 'none',
    });

    /*** Check All Checkbox ***/

    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    /*** Sub Menu ToggleClass ***/

    $('.has-sub-menu a').click(function(e) {
        e.stopPropagation();
        if ($(this).hasClass('nav-active')) {
            $('.has-sub-menu').find('.sub-menu-item').slideUp('fast');
            $('.has-sub-menu a').removeClass('nav-active');
        } else {
            $('.has-sub-menu a').removeClass('nav-active');
            $('.has-sub-menu').find('.sub-menu-item').slideUp('fast');
            $(this).addClass('nav-active');
            $(this).parent('.has-sub-menu').find('.sub-menu-item').slideDown('fast');
        }
    });
    $('html').click(function() {
        $('.has-sub-menu a').removeClass('nav-active');
        $('.sub-menu-item').slideUp('fast');
    });

    /*** Toggle Menu ***/
    $('.toggle-btn').click(function() {
        $('aside').toggleClass('left-panel-show');
        $('.responsive-overlay').toggleClass('active');
        $('body').toggleClass('body-sm');
    });

    $(".responsive-overlay").click(function() {
        $('aside').removeClass('left-panel-show');
        $('.responsive-overlay').removeClass('active');
        $('body').removeClass('body-sm');
    });

    /*** User Profile Dropdown ***/

    $('.user-profile-info').click(function(e) {
        e.stopPropagation();
        if ($(this).hasClass('active')) {
            $('.user-profile-info').next('.account-dropdown').slideUp('fast');
            $('.user-profile-info').removeClass('active');
        } else {
            $('.user-profile-info').removeClass('active');
            $('.user-profile-info').next('.account-dropdown').slideUp('fast');
            $(this).addClass('active');
            $(this).next('.account-dropdown').slideDown('fast');
            $('.notifications-dropdown').slideUp('fast');
            $('.notify-icon').removeClass('active');
        }
    });

    $('html').click(function() {
        $('.user-profile-info').removeClass('active');
        $('.account-dropdown').slideUp('fast');
    });

    /*** Notification Dropdown ***/

    $('.notify-icon').click(function(e) {
        e.stopPropagation();
        if ($(this).hasClass('active')) {
            $('.notify-icon').next('.notifications-dropdown').slideUp('fast');
            $('.notify-icon').removeClass('active');
        } else {
            $('.notify-icon').removeClass('active');
            $('.notify-icon').next('.notifications-dropdown').slideUp('fast');
            $(this).addClass('active');
            $(this).next('.notifications-dropdown').slideDown('fast');
            $('.account-dropdown').slideUp('fast');
            $('.user-profile-info').removeClass('active');
        }
    });

    $('html').click(function() {
        $('.notify-icon').removeClass('active');
        $('.notifications-dropdown').slideUp('fast');
    });

    /*** Show hide password ***/

    $('body').on('click', '.view-pass', function() {
        if ($(this).prev().attr('type') === 'password') {
            $(this).prev().attr('type', 'text');
            $(this).find("i").removeClass('fa-eye').addClass('fa-eye-slash');
            $(this).addClass("active");
        } else {
            $(this).prev().attr('type', 'password');
            $(this).find("i").removeClass('fa-eye-slash').addClass('fa-eye');
            $(this).removeClass("active");
        }
    });

    /*** Custom Search ***/

    $('.search_by').on('keyup', function(e) {
        if ($(this).val().length > 1) {
            $(".rm-typed").addClass("active");
        } else {
            $(".rm-typed").removeClass("active");
        }
    });
    $(".rm-typed").click(function() {
        $('.search_by').val('');
        $(this).removeClass("active");
    });

    /*** Filter Js ***/

    $(".filter-icon").click(function(e) {
        e.preventDefault();
        $(".filter-overlay").toggleClass("active");
        $(".filter-form-section").toggleClass("active");
        $("html,body").css("overflow", "hidden");
    });
    $(".close-filter").click(function(e) {
        e.preventDefault();
        $(".filter-form-section").removeClass("active");
        $(".filter-overlay").removeClass("active");
        $("html,body").css("overflow", "visible");
    });
    $(".filter-overlay").click(function(e) {
        e.preventDefault();
        $(".filter-form-section").removeClass("active");
        $(".filter-overlay").removeClass("active");
        $("html,body").css("overflow", "visible");
    });

    $(".filter-game").on("click", function(e) {
        $(".filter-overlay").toggleClass("active");
        $(this).parents(".accordion-content").find(".comn-filter-form").toggleClass("active");
        $("html,body").css("overflow", "hidden");
    });
    $(".close-filter").click(function(e) {
        $(".filter-overlay").removeClass("active");
        $(".comn-filter-form").removeClass("active");
        $("html,body").css("overflow", "visible");
    });

    $(".filter-overlay").click(function(e) {
        e.preventDefault();
        $(".comn-filter-form").removeClass("active");
        $(".filter-overlay").removeClass("active");
        $("html,body").css("overflow", "visible");
    });

    /*** Filter for Dashes / Credits ***/

    $(".filter-dashes").on("click", function() {
        $(".filter-overlay").toggleClass("active");
        $(".comn-filter-form.dashes").toggleClass("active");
        $("html,body").css("overflow", "hidden");
    });
    $(".filter-credits").on("click", function() {
        $(".filter-overlay").toggleClass("active");
        $(".comn-filter-form.credit").toggleClass("active");
        $("html,body").css("overflow", "hidden");
    });

    /*** Custom Accordian ***/

    $('.accordion-list').find('.accordion-header').click(function(e) {
        e.preventDefault()
        $(this).next().slideToggle('fast');
        $(".accordion-content").not($(this).next()).slideUp('fast');
    });

    /*** Accordian Active Class ***/
    $(".accordion-header").click(function() {
        $(this).parent().toggleClass("active").siblings().removeClass('active');
    });

    $('.selectpicker').selectpicker();

    $(document).ready(function() {
        Dropzone.autoDiscover = false;
        $("#Dropzone").dropzone({
            //maxFiles: 8,
            url: "hn_SimpeFileUploader.ashx",
            addRemoveLinks: true,
            success: function(file, response) {
                var imgName = response;
                file.previewElement.classList.add("dz-success");
                Dropzone.prototype.defaultOptions.dictDefaultMessage = "Drop files here to upload";
            },
            error: function(file, response) {
                file.previewElement.classList.add("dz-error");
            }
        });
    });

});