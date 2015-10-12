$(document).ready(function() {
  $('#isbn').focusout(function() {
    parse();
  });
});

// function set(id, txt) {
//     document.getElementById(id).value = txt;
// }

function parse() {
  var txt = document.getElementById('isbn');
  var isbn = ISBN.parse(txt.value);
  if (isbn) {
    txt.value = isbn.asIsbn13(true);
    $('#isbnspan').html('');
    // set('isbnspan', 'good');
    // set('isbnspan', isbn.isIsbn10());
    // set('isbnspan', isbn.isIsbn13());
    // set('isbnspan', isbn.asIsbn10());
    // set('isbnspan', isbn.asIsbn13());
    // set('isbnspan', isbn.asIsbn10(true));
    // set('isbnspan', isbn.asIsbn13(true));
    // set('isbnspan', isbn.codes.groupname);
  } else {
    $('#isbnspan').html('Please input a correct ISBN');
  }
  }