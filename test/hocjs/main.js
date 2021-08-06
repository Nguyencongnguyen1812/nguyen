var h1element =
    document.querySelector('h1');
h1element.onclick = function (even) {
    console.log(h1element);
    console.log(even);
}
var headingelement = document.querySelector('.body');
console.log(headingelement.textContent);