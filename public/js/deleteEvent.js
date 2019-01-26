$(function() {
  // 'use strict';
  var cmds = $('.del');
  var i;
  $(document).on('click', '.del', function(e){
    e.preventDefault();
    if(confirm('are you sure?')){
      $('#form_'+this.dataset.id).submit();
    }
  })
  // for (i = 0; i < cmds.length; i++) {
  //   cmds[i].addEventListener('click', function(e) {
  //     e.preventDefault();
  //     if (confirm('are you sure?')) {
  //       document.getElementById('form_' + this.dataset.id).submit();
  //     }
  //   });
  // }
});