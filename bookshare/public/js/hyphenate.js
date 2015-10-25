$(document).ready(function() {
  $('#isbn').focusout(function() {
    parse();
  });
});

function parse() {
  var txt = document.getElementById('isbn');
  var isbn = ISBN.parse(txt.value);

  if (isbn) {
    txt.value = isbn.asIsbn13(true);
    $('#isbnspan').hide();
  }
  else {
    $('#isbnspan').html('Please input a correct ISBN');
  }
}