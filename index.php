<?php

require "./private/bootstrap.php";
require_once('./private/header.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

</div>

<?php require_once('./private/footer.php'); ?>

<script src="public/js/covid19form.js"></script>
<script>
    
    $(function() {
        
        if (window.location.pathname == '/' || window.location.pathname == '/covidwatch/') {
            // Index (home) page
            $('.content-wrapper').load("dashboard.php");
        } else {
            // Other page
            console.log(window.location.pathname);
        }

        $('.sidebar').find('.nav-item > a').click(function(e) {
            e.preventDefault();
            var pageToLoad = $(this).attr('href');
            $('.content-wrapper').load(pageToLoad);
        });
    })
</script>