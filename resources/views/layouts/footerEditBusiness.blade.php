<!--about_section-->


<!--footer_section-->

<div class="footer_section">

<!--footer_top_section-->

<div class="footer_top_section">
<div class="row">
<div class="container">
<div class="col-md-12">
<div class="col-lg-7">
<ul>
<li><a href="{{url('about-us',['id'=>1,])}}">ABOUT ME</a></li>
<li><a href="{{action('ArticleController@index')}}">ARTICLES</a></li>
<li><a href="{{action('BusinessController@advanceSearch')}}">SEARCH A PRODUCT OR SERVICE</a></li>
<li><a href="{{action('BusinessController@searchProduct')}}">PRODUCTS AND SERVICES NEAR YOU </a></li>
<li><a href="{{action('BlogController@index')}}">BLOGS</a></li>
</ul>
</div>
<div class="col-lg-5">
<ul class="footer_top_ul">
<li><a href="#"><img src="{{ url('images/footer_fb.png') }}" alt="" border="0" title="FACEBOOK"/></a></li>
<li><a href="#"><img src="{{ url('images/footer_tw.png') }}" alt="" border="0" title="TWITTER" /></a></li>
<li><a href="#"><img src="{{ url('images/footer_you.png') }}" alt="" border="0" title="YOUTUBE" /></a></li>
<li><a href="#"><img src="{{ url('images/footer_link.png') }}" alt="" border="0"  title="LINKEDIN"/></a></li>
<li><a href="#"><img src="{{ url('images/footer_instagram.png') }}" alt="" border="0" title="INSTAGRAM"/></a></li>
<li><a href="#"><img src="{{ url('images/footer_google.png') }}" alt="" border="0"  title="GOOGLEPLUS"/></a></li>
</ul>
</div>
<div class="clearfix"></div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>

<!--footer_top_section-->

<!--footer_bottom_section-->

<div class="footer_bottom_section">
<div class="row">
<div class="container">
Copyright © 2016 MARCET ME Projects. All Rights Reserved.
</div>
</div>
</div>

<!--footer_bottom_section-->

</div>

<!--footer_section-->

<div class="clearfix"></div> 

</div>
    
<!--js section-->

<!--slider section-->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!--slider section-->

<!--menu section-->

<script src="{{ asset('/js/jquery.dlmenu.js') }}"></script>		
<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>
        
<!--menu section-->

<!--carousel section-->

<script type="text/javascript">
    
    $(window).load(function() {
    
        $("#flexiselDemo3").flexisel({
            visibleItems:6,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,    		
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
                tablet: { 
                    changePoint:800,
                    visibleItems: 2
                }
            }
        });
		
		
		/*$("#flexiselDemo4").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,    		
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
                tablet: { 
                    changePoint:800,
                    visibleItems: 2
                }
            }
        });*/
		
        
    });
    </script>
    
<!--carousel section-->

<!--menu section-->

<script src="{{ asset('/js/simpleMobileMenu.js') }}"></script>

<script type="text/javascript">

		jQuery(document).ready(function($) {
			$('.smobitrigger').smplmnu();
		});

	</script>

<!--menu section-->

<!--tab section-->

<script src="{{ asset('/js/easy-responsive-tabs.js') }}"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
var assetUrl="{{asset('')}}"
</script>

<script src="{{ asset('/js/ajaxAppEditBusiness.js') }}"></script>

<!--tab section-->

</body>
</html>