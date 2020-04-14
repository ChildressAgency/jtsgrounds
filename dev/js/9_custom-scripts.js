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

  var $masonryGrid = $('.grid').masonry({
    itemSelector: '.grid-item',
    //columnWidth: 200
  });

  /*$masonryGrid.on('click', 'img', function(event){
    $('.grid-item').not(this.parent()).each(function(){
      $(this).removeClass('grid-item--expanded');
    });
    $(event.currentTarget).parent('.grid-item').toggleClass('grid-item--expanded');

    $masonryGrid.masonry();
  });*/

  $masonryGrid.on('click', '.grid-item', function(e){
    $('.grid-item').not(this).each(function(){
      $(this).removeClass('grid-item--expanded');
    });

    $(e.currentTarget).toggleClass('grid-item--expanded');

    $masonryGrid.masonry();
  });

  $('.gallery-item').on('click', function(e){
    e.preventDefault();
  });

  $('#gallery-modal').on('show.bs.modal', function(e){
    var galleryItem = $(e.relatedTarget);
    var jtsFullSize = galleryItem.data('jts_full_size');
    var jtsJobTitle = galleryItem.data('jts_job_title');
    //var jtsJobSite = galleryItem.data('jts_job_site');
    var modal = $(this);

    modal.find('#job-title').text(jtsJobTitle);
    //modal.find('#job-site').text(jtsJobSite);
    modal.find('#gallery-image').attr('src', jtsFullSize);
  });

  $(window).on('scroll', function(){
    if(this.isInViewport($('.stats'), 100)){
      $('.stat-number').each(function(index){
        var topNumber = $(this).data('top_number');
        $(this).text(topNumber);
      });
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