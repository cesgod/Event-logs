
$(function() {
    "use strict";
     
	 
//sidebar menu js
$.sidebarMenu($('.sidebar-menu'));

// === toggle-menu js
$(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });	 
	   
// === sidebar menu activation js

$(function() {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function() {
            return this.href == i;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }), 	   
	   

/* Top Header */

$(document).ready(function(){ 
    $(window).on("scroll", function(){ 
        if ($(this).scrollTop() > 60) { 
            $('.topbar-nav .navbar').addClass('bg-dark'); 
        } else { 
            $('.topbar-nav .navbar').removeClass('bg-dark'); 
        } 
    });

 });


/* Back To Top */

$(document).ready(function(){ 
    $(window).on("scroll", function(){ 
        if ($(this).scrollTop() > 300) { 
            $('.back-to-top').fadeIn(); 
        } else { 
            $('.back-to-top').fadeOut(); 
        } 
    }); 

    $('.back-to-top').on("click", function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
})






//AAGREGAR FILAS DE INPUT
var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            //$(wrapper).append('<div><div class="form-group row"><label class="col-lg-3 col-form-label form-control-label">Acciones</label><div class="col-lg-9"><input class="form-control" type="number" value="" name="mytext[]" placeholder="" min="1" max=""  ><a href="#" class="delete">Delete</a></div></div></div>');
            //$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
            //$(wrapper).append('<div class="col-lg-9"><input class="form-control" type="number" value="" name="mytext[]"  min="1"  ><a href="#" class="delete">Delete</a></div> ');
              $(wrapper).append('<br><br><div class="form-group row"><label class="col-lg-3 col-form-label form-control-label">Usuario</label><div class="col-lg-9"><select class="form-control second" type="number" value="" name="userdata'+ x +'"></select></div></div><div class="form-group row"><label class="col-lg-3 col-form-label form-control-label">Acciones</label><div class="col-lg-9"><input class="form-control out" type="number" value="" name="n_accion'+ x +'"  min="1"  > </div></div>');
              $('.count').remove();
              $(wrapper).append(' <input class="count" name="count" type="hidden" value="'+ x +'" readonly>');
        } else {
            alert('You Reached the limits')
        }
            $('.out').change(function() {
                var total;
                var numOut = 0;
                var numIn=$('.inn').val();
                $('.out').map(function() {
                    return numOut += (parseFloat(this.value) || 0);
                });
                total = numIn - numOut;
                    //alert(numOut);
                console.log(total);
                $(".in").val(total);
               
                //total=numIn;
                return false;
             });

    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })

//restar acciones con INPUT



//DUPLICAR OPTION A OTROS INPUTS    
$('.cloneBtn').click(function() {
    var $options = $(".myselect > option").clone();
    console.log('changed');
    $('.second').parent('option').remove();
    $('.second').append($options);
});



;


	    
   
$(function () {
  $('[data-toggle="popover"]').popover()
})


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


	 // theme setting
	 $(".switcher-icon").on("click", function(e) {
        e.preventDefault();
        $(".right-sidebar").toggleClass("right-toggled");
    });
	
	$('#theme1').click(theme1);
    $('#theme2').click(theme2);
    $('#theme3').click(theme3);
    $('#theme4').click(theme4);
    $('#theme5').click(theme5);
    $('#theme6').click(theme6);
    $('#theme7').click(theme7);
    $('#theme8').click(theme8);
    $('#theme9').click(theme9);
    $('#theme10').click(theme10);
    $('#theme11').click(theme11);
    $('#theme12').click(theme12);
    $('#theme13').click(theme13);
    $('#theme14').click(theme14);
    $('#theme15').click(theme15);

    function theme1() {
      $('body').attr('class', 'bg-theme bg-theme1');
    }

    function theme2() {
      $('body').attr('class', 'bg-theme bg-theme2');
    }

    function theme3() {
      $('body').attr('class', 'bg-theme bg-theme3');
    }

    function theme4() {
      $('body').attr('class', 'bg-theme bg-theme4');
    }
	
	function theme5() {
      $('body').attr('class', 'bg-theme bg-theme5');
    }
	
	function theme6() {
      $('body').attr('class', 'bg-theme bg-theme6');
    }

    function theme7() {
      $('body').attr('class', 'bg-theme bg-theme7');
    }

    function theme8() {
      $('body').attr('class', 'bg-theme bg-theme8');
    }

    function theme9() {
      $('body').attr('class', 'bg-theme bg-theme9');
    }

    function theme10() {
      $('body').attr('class', 'bg-theme bg-theme10');
    }

    function theme11() {
      $('body').attr('class', 'bg-theme bg-theme11');
    }

    function theme12() {
      $('body').attr('class', 'bg-theme bg-theme12');
    }
	
	function theme13() {
      $('body').attr('class', 'bg-theme bg-theme13');
    }
	
	function theme14() {
      $('body').attr('class', 'bg-theme bg-theme14');
    }
	
	function theme15() {
      $('body').attr('class', 'bg-theme bg-theme15');
    }




});


