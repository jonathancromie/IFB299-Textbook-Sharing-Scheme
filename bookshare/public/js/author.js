$(document).ready(function() {
	$('#author').focusout(function() {
		format();
	});
});

function format() {
	var author = document.getElementById('author');
	var full_name = author.value;

	var names = full_name.split(' ');

	// if author has surname only
	if (names.length == 1) {
		// console.log(names[0]);
		author.value = names[0];
		author.disabled = true;
		$('#edit').html('Edit');
	}
	// else if author has first and last name
	else if (names.length == 2) {
		// console.log(names[1] + ", " + names[0].charAt(0));
		author.value = names[1] + ", " + names[0].charAt(0);
		author.disabled = true;
		$('#edit').html('Edit');
	}
	//else if author has first, middle and last name
	else if (names.length == 3) {
		// console.log(names[2] + ", " + names[0].charAt(0) + names[1].charAt(0));
		author.value = names[2] + ", " + names[0].charAt(0) + names[1].charAt(0);
		author.disabled = true;
		$('#edit').html('Edit');
	}	
}

function edit() {
	author.disabled = false;
}