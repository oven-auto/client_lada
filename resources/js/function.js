var footerHeight = $('.footer').height()

var screenHeight = $(window).height()

var carHeight = screenHeight - footerHeight - 50

$('#car').css({'height':carHeight+'px'})

$('.bannersSlider').find('img').height(screenHeight)