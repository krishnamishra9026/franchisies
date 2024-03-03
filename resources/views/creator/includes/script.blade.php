<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
{{--  <script src="{{ asset('assets/js/app.min.js') }}"></script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/5.6.3/js/jquery.mmenu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('dropdown-toggle').dropdown()
    });
    </script>

<script>
    var myMenu = $("#menu");

    // initialize mmenu
    myMenu.mmenu({});

    // initialize mmenu API
    var myMenuAPI = myMenu.data( "mmenu" );


    // function to set to specific subMenu
    function setMMenu(subMenu) {
      // set to subMenu
      var current = myMenu.find(subMenu);

      // myMenuAPI.setSelected(current.first());
      myMenuAPI.openPanel(current.closest(".mm-panel"));
    }

    // function to open mmmenu to specific subMenu
    function openMMenu() {
      myMenuAPI.open();
    }


</script>
<script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "320px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }
  </script>

<script>
    $(document).ready(function(){
        $('.showhide').click(function(){
            $('.showhide').show();
            $(this).hide();
        });
    });
    </script>
<script>
    $(".alert-dismissible").fadeTo(6000, 500).slideUp(500, function() {
        $(".alert-dismissible").slideUp(500);
    });
</script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>



<script>
    var mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        // delay between transitions in ms
        autoplay: 5000,
        // init: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,

            },
            768: {
                slidesPerView: 1,

            },
            1024: {
                slidesPerView: 1,

            },
        }
    });
</script>
<script>
    var swiper1 = new Swiper('.swiper1', {
        slidesPerView: 4,
        spaceBetween: 10,
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        // delay between transitions in ms
        autoplay: 5000,
        // init: false,
        pagination: {
            el: 'swiper-pagination1',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 50,
            },
        }
    });
</script>

<script type="text/javascript">
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 50) {
            $(".header").addClass("active");
            $('.after').show();
            $('.before').hide();

        } else {
            $(".header").removeClass("active");
            $('.before').show();
            $('.after').hide();
        }
    });
</script>

@stack('scripts')

