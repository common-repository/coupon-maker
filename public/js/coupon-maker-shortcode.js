/**
 * Coupon Maker Plugin
 * 
 * by Bishoy A.
 * hi@bishoy.me
 */

jQuery(document).on('click', '.cg-coupon-url', function() {
    var url = jQuery(this).attr('href');
    jQuery(this).parent().find('.cover').remove();

    if ( url ) {
        window.open(url, '_blank');
    }

    jQuery(this).removeAttr('href');
});

jQuery(document).on("mousemove", ".cg-copy:not(.cg-deal) > a", function(o) {
var i = jQuery(this),
    e = jQuery(this).offset(),
    n = 180 - (o.pageX - e.left) - 6;
    30 > n && n > 0 ? (i.find(".peel").css("right", n + "px"), i.find(".peel").css("width", parseInt(n / 4) + 6 + "px"), i.find(".cg-copy-cover").css("width", 180 - n + "px")) : n > 30 && (i.find(".peel").css("right", "30px").css("width", "24px"), i.find(".cg-copy-cover").css("width", "80%"))
}), jQuery(document).on("mouseout", ".cg-copy:not(.cg-deal) > a", function() {
    var o = jQuery(this);
    o.find(".peel").css("right", "6px").css("width", "6px"), o.find(".cg-copy-cover").css("width", "96%")
}), jQuery(document).on("click", ".cg-copy:not(.cg-deal):not(.opened) > a", function() {
    var o = jQuery(this);
    o.parent().addClass("opened"), o.closest(".cg-coupon-box").addClass("opened"), o.find(".peel").animate({
        right: "160px",
        opacity: 0,
        width: "30px"
    }, 350, function() {
        jQuery(this).remove()
    }), o.find(".cg-copy-cover").animate({
        width: "0px",
        opacity: 0
    }, 350, function() {
        jQuery(this).remove()
    })
});
