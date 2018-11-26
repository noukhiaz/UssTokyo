<script type="text/javascript" src="js/jquery.min.js"></script>

 

<!-- bootstrap -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>



<!-- mega-menu -->

<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>



<!-- appear -->

<script type="text/javascript" src="js/jquery.appear.js"></script>



<!-- counter -->

<script type="text/javascript" src="js/counter/jquery.countTo.js"></script>



<!-- owl-carousel -->

<script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>



<!-- select -->

<script type="text/javascript" src="js/select/jquery-select.js"></script>



<!-- revolution -->

<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>

<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->

<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>

<script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>

<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>

<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>

<script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>

<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>

<script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>

<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>

<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>



<!-- custom -->

<script type="text/javascript" src="js/custom.js"></script>



<script type="text/javascript">

  (function($){

  "use strict";



    var tpj=jQuery;

      var revapi4;

      tpj(document).ready(function() {

        if(tpj("#rev_slider_4_1").revolution == undefined){

          revslider_showDoubleJqueryError("#rev_slider_4_1");

        }else{

          revapi4 = tpj("#rev_slider_4_1").show().revolution({

            sliderType:"standard",

            sliderLayout:"fullwidth",

            dottedOverlay:"none",

            delay:9000,

            navigation: {

              keyboardNavigation:"off",

              keyboard_direction: "horizontal",

              mouseScrollNavigation:"off",

             mouseScrollReverse:"default",

              onHoverStop:"off",

              bullets: {

                enable:true,

                hide_onmobile:false,

                style:"uranus",

                hide_onleave:false,

                direction:"horizontal",

                h_align:"right",

                v_align:"bottom",

                h_offset:40,

                v_offset:40,

                                space:8,

                tmp:'<span class="tp-bullet-inner"></span>'

              }

            },

            visibilityLevels:[1240,1024,778,480],

            gridwidth:1170,

            gridheight:900,

            lazyType:"none",

            parallax: {

              type:"mouse",

              origo:"enterpoint",

              speed:400,

              levels:[2,5,7,10,12,35,40,42,45,46,47,48,49,50,51,55],

              type:"mouse",

            },

            shadow:0,

            spinner:"spinner3",

            stopLoop:"off",

            stopAfterLoops:-1,

            stopAtSlide:-1,

            shuffle:"off",

            autoHeight:"off",

            disableProgressBar:"on",

            hideThumbsOnMobile:"off",

            hideSliderAtLimit:0,

            hideCaptionAtLimit:0,

            hideAllCaptionAtLilmit:0,

            debugMode:false,

            fallbacks: {

              simplifyAll:"off",

              nextSlideOnWindowFocus:"off",

              disableFocusListener:false,

            }

          });

        }

      });  

 })(jQuery);



</script>