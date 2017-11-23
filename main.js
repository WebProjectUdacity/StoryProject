$( function() {

	$('#Home').click(function () {

		document.getElementById('Home').style.display = 'block';
		document.getElementById('Log').style.display = 'none';
		document.getElementById('Guide').style.display = 'none';
		document.getElementById('Game').style.display = 'none';
	})

	$('#Log').click(function () {
		
		document.getElementById('Home').style.display = 'none';
		document.getElementById('Log').style.display = 'block';
		document.getElementById('Guide').style.display = 'none';
		document.getElementById('Game').style.display = 'none';		
	})

	$('#Guide').click(function () {
		
		document.getElementById('Home').style.display = 'none';
		document.getElementById('Log').style.display = 'none';
		document.getElementById('Guide').style.display = 'block';
		document.getElementById('Game').style.display = 'none';
	})

	$('#Game').click(function () {
		
		document.getElementById('Home').style.display = 'none';
		document.getElementById('Log').style.display = 'none';
		document.getElementById('Guide').style.display = 'none';
		document.getElementById('Game').style.display = 'block';
	})


}