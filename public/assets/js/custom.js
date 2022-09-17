$(document).ready(function() {
  $('.bar').click( function() {
    $('#mobile_menu').toggleClass('open');
  });

  $('.menu ul li a').click(function() {
    $('.menu ul li a').removeClass('active');
    $(this).addClass('active');
  });


//Code Verification
var verificationCode = [];
$(".otp input[type=text]").keyup(function (e) {

  // Get Input for Hidden Field
  $(".otp input[type=text]").each(function (i) {
  	verificationCode[i] = $(".otp input[type=text]")[i].value; 
  	$('#verificationCode').val(Number(verificationCode.join('')));
    //console.log( $('#verificationCode').val() );
  });

  //console.log(event.key, event.which);

  if ($(this).val() > 0) {
  	if (event.key == 1 || event.key == 2 || event.key == 3 || event.key == 4 || event.key == 5 || event.key == 6 || event.key == 7 || event.key == 8 || event.key == 9 || event.key == 0) {
  		$(this).next().focus();
  	}
  }else {
  	if(event.key == 'Backspace'){
  		$(this).prev().focus();
  	}
  }

});
});


$(document).ready(function() {
  $('.trending_slider').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    navText: ["<img src='assets/images/arrow-left.svg'>","<img src='assets/images/arrow-right.svg'>"],
    responsive:{
      0:{
        items:1,
        stagePadding: 100,
        nav:false,
      },
      600:{
        items:3
      },
      1000:{
        items:4
      }
    }
  });


  $('.trad_slider').owlCarousel({
    loop:true,
    dots:true,
    margin:20,
    nav:false,
    responsive:{
      0:{
        items:1.5,
        margin:20
      },
      1200:{
        items:2,
        margin:15
      },
      1400:{
        items:2,
        margin:30
      }
    }
  });
});




$(document).ready(function(){
  $('.signUp').click(function(){
    $('.main_box.active_box_2').show();
    $('.main_box.active_box_1').hide();
    $('.main_box.active_box_3').hide();
    $('.main_box.active_box_4').hide();
    $('.main_box.active_box_5').hide();
  });

  $('.signIn').click(function(){
    $('.main_box.active_box_2').hide();
    $('.main_box.active_box_3').hide();
    $('.main_box.active_box_4').hide();
    $('.main_box.active_box_5').hide();
    $('.main_box.active_box_1').show();
  });

  $('.reset').click(function(){
    $('.main_box.active_box_2').hide();
    $('.main_box.active_box_1').hide();
    $('.main_box.active_box_4').hide();
    $('.main_box.active_box_5').hide();
    $('.main_box.active_box_3').show();
  });

  $('.next_1').click(function(){
    $('.main_box.active_box_2').hide();
    $('.main_box.active_box_1').hide();
    $('.main_box.active_box_5').hide();
    $('.main_box.active_box_3').hide();
    $('.main_box.active_box_4').show();
  });

  $('.next_2').click(function(){
    $('.main_box.active_box_2').hide();
    $('.main_box.active_box_1').hide();
    $('.main_box.active_box_4').hide();
    $('.main_box.active_box_3').hide();
    $('.main_box.active_box_5').show();
  });

  $('.next_3').click(function(){
    $('.main_box.active_box_2').hide();
    $('.main_box.active_box_5').hide();
    $('.main_box.active_box_4').hide();
    $('.main_box.active_box_3').hide();
    $('.main_box.active_box_1').show();
  });
});

