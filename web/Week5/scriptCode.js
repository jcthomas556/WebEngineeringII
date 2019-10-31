
  type="text/javascript">
  jQuery.noConflict();
  jQuery(document).ready(function($) {
      $('.form-control').keyup(function(event) {
          var textBox = event.target;
          var start = textBox.selectionStart;
          var end = textBox.selectionEnd;
          textBox.value = textBox.value.charAt(0).toUpperCase() + textBox.value.slice(1).toLowerCase();
          textBox.setSelectionRange(start, end);
      });
  });

function deleteDefault(){
    for(i = 0; i < 8; i++) {
        var elmnt = document.getElementById("defaultList");
        elmnt.remove();
    }

   

//document.getElementById('defaultList').onclick = changeColor;

function changeColor(){
    document.body.style.color="green";
    return false;
}




}