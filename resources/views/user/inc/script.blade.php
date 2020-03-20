<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    if(window.scrollX > 50)
    {
        $('.main-nav').css('position', 'fixed');
    }
</script>

<script>
$(document).ready(function(e){
    $('.top-news-text').animate({'left': '55%'});
});
</script>
@yield('customScript')