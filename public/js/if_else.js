// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];
console.log(color)
var favorite = 'indigo'; // TODO: change this to your favorite color from the list
var message = (color==favorite)? "Favorite" : "Not Favorite"
console.log(message)

if (color=='red') {
    	console.log('Red is the color of an apple.');
    }else if (color=='orange') {
		console.log('Orange is the color of a pumpkin.');
	}else if (color=='yellow') {
		console.log('Yellow is the color of a lemon.');
	}else if (color=='green') {
		console.log('Green is the color of grass.');
	}else if (color=='blue') {
		console.log('Blue is the color of the sky.');
	}else /*if (color=='indigo') */{
		console.log=('I do not know anything by that color');	
	}/*else if (color=='violet') {
		console.log=('I do not know anything by that color');
	}*/



// TODO: Create a block of if/else statements to check for every color except indigo and violet.
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
