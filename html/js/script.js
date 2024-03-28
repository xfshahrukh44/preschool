$(document).ready(function () {
  setTimeout(function () {
    $('.loadermain').fadeOut()
  }, 4000)
})

// Wrap every letter in a span
// var textWrapper = document.querySelector('.ml3')
// textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>")

// anime.timeline({loop: true})
//   .add({
//     targets: '.ml3 .letter',
//     opacity: [0,1],
//     easing: "easeInOutQuad",
//     duration: 2250,
//     delay: (el, i) => 150 * (i+1)
//   }).add({
//     targets: '.ml3',
//     opacity: 0,
//     duration: 1000,
//     easing: "easeOutExpo",
//     delay: 1000
//   })


// Wrap every letter in a span
// var textWrapper = document.querySelector('.ml4')
// textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>")

// anime.timeline({loop: true})
//   .add({
//     targets: '.ml4 .letter',
//     opacity: [0,1],
//     easing: "easeInOutQuad",
//     duration: 2250,
//     delay: (el, i) => 150 * (i+1)
//   }).add({
//     targets: '.ml4',
//     opacity: 0,
//     duration: 1000,
//     easing: "easeOutExpo",
//     delay: 1000
//   })

// anime.timeline({loop: true})
//   .add({
//     targets: '.ml15 .word',
//     scale: [14,1],
//     opacity: [0,1],
//     easing: "easeOutCirc",
//     duration: 800,
//     delay: (el, i) => 800 * i
//   }).add({
//     targets: '.ml15',
//     opacity: 0,
//     duration: 1000,
//     easing: "easeOutExpo",
//     delay: 1000
//   })

// Wrap every letter in a span
// var textWrapper = document.querySelector('.ml33')
// textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>")

// anime.timeline({loop: true})
//   .add({
//     targets: '.ml33 .letter',
//     opacity: [0,1],
//     easing: "easeInOutQuad",
//     duration: 2250,
//     delay: (el, i) => 150 * (i+1)
//   }).add({
//     targets: '.ml33',
//     opacity: 0,
//     duration: 1000,
//     easing: "easeOutExpo",
//     delay: 1000
//   })

'use strict'
$('#menu').css('right', '-300px')
$('.menu_icon').on('click', function () {
  if ($('.menu_icon').hasClass('open')) {
    $(this).removeClass('open')
    $(this).animate({
      'left': '10px',
      'top': '10px',
      'background-position': '0px'
    })
    $('#menu').animate({ 'right': '-300px' })
    $('body').css('position', 'absolute')
    $('body').animate({
      'right': '0px',
      'z-index': '999'
    })
  }else {
    $(this).addClass('open')
    $(this).animate({
      // "right": "310px",
      'background-position': '-40px'
    })
    $('#menu').animate({ 'right': '0px' })
    $('body').css('position', 'absolute')
    $('body').animate({
      'right': '300px',
      'z-index': '999'
    })
  }
})

'use strict'
$('#message_menu').css('right', '-300px')
$('.message_menu_icon').on('click', function () {
  if ($('.message_menu_icon').hasClass('open')) {
    $(this).removeClass('open')
    $(this).animate({
      'left': '700px',
      'top': '55px',
      'background-position': '0px'
    })
    $('#message_menu').animate({ 'right': '-300px' })
    $('body').css('position', 'absolute')
    $('body').animate({
      'right': '0px',
      'z-index': '999'
    })
  }else {
    $(this).addClass('open')
    $(this).animate({
      // "right": "310px",
      'background-position': '-40px'
    })
    $('#message_menu').animate({ 'right': '0px' })
    $('body').css('position', 'absolute')
    $('body').animate({
      'right': '300px',
      'z-index': '999'
    })
  }
})
