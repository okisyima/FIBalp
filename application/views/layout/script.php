<!-- Start of script -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="<?php echo base_url(); ?>assets/js/easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/hoverIntent.js"></script>
<script src="<?php echo base_url(); ?>assets/js/superfish.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/mn-accordion.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.circlechart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/mail-script.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {

  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
  var slidesPerPage = 4; //globaly define number of elements per page
  var syncedSecondary = true;

  sync1.owlCarousel({
    items : 1,
    slideSpeed : 2000,
    nav: true,
    autoplay: true,
    dots: true,
    loop: true,
    responsiveRefreshRate : 200,
    navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
  }).on('changed.owl.carousel', syncPosition);

  sync2
    .on('initialized.owl.carousel', function () {
      sync2.find(".owl-item").eq(0).addClass("current");
    })
    .owlCarousel({
    items : slidesPerPage,
    dots: true,
    nav: true,
    smartSpeed: 200,
    slideSpeed : 500,
    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
    responsiveRefreshRate : 100
  }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;

    //if you disable loop you have to comment this block
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);

    if(current < 0) {
      current = count;
    }
    if(current > count) {
      current = 0;
    }

    //end block

    sync2
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();

    if (current > end) {
      sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
    }
  }

  sync2.on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);
  });
});owl.owlCarousel({
  items:1,
  loop:true,
  margin:10,
  autoplay:true,
  autoplayTimeout:1000,
  autoplayHoverPause:true
});
$('.play').on('click',function(){
  owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
  owl.trigger('stop.owl.autoplay')
})
</script>
</script>
</body>
</html>


<!-- End of script -->
