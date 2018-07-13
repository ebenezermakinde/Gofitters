/*
*Scope: This is the GoFitters Application for Team Management;
*Author: Ebenezer Makinde;
*Dev.Start Date: 09/06/2018;
*Dev. End Date: ongoing;
*Tel: 08033291570;
*Email: ebenezermakinde@yahoo.co.uk;
*/

//This is a function to change background images on refresh
var randimgs = 5;
function background_change() {
var imgcount = Math.ceil(Math.random()*randimgs);
document.body.background = "../images/myrandom/"+imgcount+".jpg";
document.body.style.backgroundRepeat = "no-repeat";
}

//Navbar active class function.
