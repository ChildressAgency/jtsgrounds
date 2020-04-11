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

  new LeaderLine(bubble1, bubble2, lineOptions);
  new LeaderLine(bubble2, bubble3, lineOptions);
  new LeaderLine(bubble3, bubble4, lineOptions);
  new LeaderLine(bubble1, bubble5, lineOptions);
});