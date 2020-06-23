var button = document.getElementsByClassName('filters');
var clicked = false;
console.log('script is here');

button.onclick = function(){
    console.log(click)
    if(!clicked){
        (button.style.color) = '#ce897a';
        clicked = true;
        console.log("clicked");
    }
    else{
        (button.style.color) = '#256d69';
        clicked = false;
        console.log(unclicked);
    }
}