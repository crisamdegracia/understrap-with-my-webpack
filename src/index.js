import '../node_modules/@fortawesome/fontawesome-free/css/all.css'
import './vendor/bootstrap/bootstrap.min.js';
import ConsoleMo from './js/custom-js-here.js';
import SetActiveTabs from './js/set-active-tabs';
import './css/style.css';
import $ from 'jquery';

const consoleMo = new ConsoleMo();
// const setActiveTabs = new SetActiveTabs();

// setActiveTabs();
// consoleMo.ilogMo();
console.log('123ssss');


document.querySelector('.skwaku').addEventListener('click', function (event) {
	if (event.target.classList.contains == 'active')
	{
		// console.log('yes!');
	} else
	{
		// console.log('oh no!');
		// console.log(event.target);
	}
})

// $('.skwama').on('click', (e) => {
// 	if ($(e.target).hasClass('nav-link-trigger'))
// 	{
// 		$('.tab-pane-trigger').addClass('active');
// 		console.log($('.nav-link-trigger').length);


// 	} else
// 	{

// 	}
// })

const elTag = $('.nav-link-trigger')
const arrEl = [];

// elTag.foreach(() => {
	console.log(elTag.length)
// })

for (let i = 0; i < elTag.length; i++ ){
	arrEl.push(elTag[i]);
}

if ( arrEl.includes(arrEl[0].hasClass('nav-link-trigger')) ){
	console.log('hey')
	
} else {
	
	console.log('yow')
}

