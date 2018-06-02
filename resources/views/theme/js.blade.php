<script>
    function show(){

        $(".search-bar .notification-list").addClass("search-r");
    $("#input-search").focusout(function() {


        $(".search-bar .notification-list").removeClass("search-r");
    });

    }
</script>
<script src="{{asset('js/js/webfontloader.min.js')}}"></script>
<script>
    WebFont.load({
        google: {
            families: ['Roboto:300,400,500,700:latin']
        }
    });
</script>


<!-- JS Scripts -->
<script src="{{asset('js/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('js/js/jquery.appear.js')}}"></script>
<script src="{{asset('js/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('js/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('js/js/jquery.matchHeight.js')}}"></script>
<script src="{{asset('js/js/svgxuse.js')}}"></script>
<script src="{{asset('js/js/imagesloaded.pkgd.js')}}"></script>
<script src="{{asset('js/js/Headroom.js')}}"></script>
<script src="{{asset('js/js/velocity.js')}}"></script>
<script src="{{asset('js/js/ScrollMagic.js')}}"></script>
<script src="{{asset('js/js/jquery.waypoints.js')}}"></script>
<script src="{{asset('js/js/jquery.countTo.js')}}"></script>
<script src="{{asset('js/js/popper.min.js')}}"></script>
<script src="{{asset('js/js/material.min.js')}}"></script>
<script src="{{asset('js/js/bootstrap-select.js')}}"></script>
<script src="{{asset('js/js/smooth-scroll.js')}}"></script>
<script src="{{asset('js/js/selectize.js')}}"></script>
<script src="{{asset('js/js/swiper.jquery.js')}}"></script>
<script src="{{asset('js/js/moment.js')}}"></script>
<script src="{{asset('js/js/daterangepicker.js')}}"></script>
<script src="{{asset('js/js/simplecalendar.js')}}"></script>
<script src="{{asset('js/js/fullcalendar.js')}}"></script>
<script src="{{asset('js/js/isotope.pkgd.js')}}"></script>
<script src="{{asset('js/js/ajax-pagination.js')}}"></script>
<script src="{{asset('js/js/Chart.js')}}"></script>
<script src="{{asset('js/js/chartjs-plugin-deferred.js')}}"></script>
<script src="{{asset('js/js/circle-progress.js')}}"></script>
<script src="{{asset('js/js/loader.js')}}"></script>
<script src="{{asset('js/js/run-chart.js')}}"></script>
<script src="{{asset('js/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('js/js/jquery.gifplayer.js')}}"></script>
<script src="{{asset('js/js/mediaelement-and-player.js')}}"></script>
<script src="{{asset('js/js/mediaelement-playlist-plugin.min.js')}}"></script>

<script src="{{asset('js/js/base-init.js')}}"></script>
<script defer src="{{asset('fonts/fontawesome-all.js')}}"></script>

<script src="{{asset('Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>

<script>
    $('#profile-image').on('click', function() {
        $('#profile-image-upload').click();
    });


</script>
<script>

    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#my-awesome-dropzone");

    myDropzone.on("success", function(file, response) {
        var body=document.getElementById('body').value ;
        document.getElementById('postform').innerHTML += ('<input type="hidden" name="image[]" value="'+ response +'">');
        document.getElementById('body').value =body;

    });


</script>
<script>
    window.trans =<?php
    // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
    $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
    $trans = [];
    foreach ($lang_files as $f) {
        $filename = pathinfo($f)['filename'];
        $trans[$filename] = trans($filename);
    }
    echo json_encode($trans);
    ?>;



</script>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
@if(config('app.locale')=='ar')
<script> toastr.options.rtl = true;</script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
