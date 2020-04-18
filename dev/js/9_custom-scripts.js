/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  AOS.init();

  var bubble1 = document.getElementById('bubble-1'),
      bubble2 = document.getElementById('bubble-2'),
      bubble3 = document.getElementById('bubble-3'),
      bubble4 = document.getElementById('bubble-4'),
      bubble5 = document.getElementById('bubble-5');
  var lineOptions = {
    color: '#fff',
    size: 4,
    outline: false,
    path: 'magnet',
    endPlug: 'behind',
    dash: {len:8, gap:6}
  };

  if((typeof(bubble1) !== 'undefined' && bubble1 !== null)
    || (typeof (bubble2) !== 'undefined' && bubble2 !== null)
    || (typeof (bubble3) !== 'undefined' && bubble3 !== null)
    || (typeof (bubble4) !== 'undefined' && bubble4 !== null)
    || (typeof (bubble5) !== 'undefined' && bubble5 !== null)){
    new LeaderLine(bubble1, bubble2, lineOptions);
    new LeaderLine(bubble2, bubble3, lineOptions);
    new LeaderLine(bubble3, bubble4, lineOptions);
    new LeaderLine(bubble1, bubble5, lineOptions);
  }

  $('a[data-toggle="modal"').on('click', function(e){
    e.preventDefault();
  });

  $('#gallery-carousel').on('slid.bs.carousel', function(e){
    var curSlide = $(e.relatedTarget);
    var imgTitle = curSlide.data('image_title');
    var imgCaption = curSlide.data('image_caption');
    var modal = $('#gallery-modal');

    modal.find('#image-title').text(imgTitle);
    modal.find('#image-caption').text(imgCaption);
  });

  $(window).on('scroll', function(){
    if(this.isInViewport($('.stats'), 100)){
      $('.stat-number').each(function(index){
        var topNumber = $(this).data('top_number');
        $(this).text(topNumber);
      });
    }
  });

  var testimonials = new Swiper('#testimonials .swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });
}); //end jquery

function isInViewport(element, offset){
  if(element.length == 0){ return; }

  var $window = $(window);
  var viewportTop = $window.scrollTop();
  var viewportHeight = $window.height();
  var viewportBottom = viewportTop + viewportHeight - offset;
  var $element = $(element);
  var top = $element.offset().top;
  var height = $element.height();
  var bottom = top + height;

  return (bottom > viewportTop) && (top < viewportBottom);
}