
<script>
window.onload = function() {
    if(/iP(hone|ad)/.test(window.navigator.userAgent)) {
    document.body.addEventListener('touchstart', function() {}, false);
    }
};

$('.navbutton').click(function(){
    $('.nav').toggleClass('open');
});

</script>
<?php echo $analytics."\n"; ?>