function getDate() {
    return [15,07,2015];
}

var [d,m] = getDate();

console.log(d);


var getDate = () => [15,07,2015];
var [d,m] = getDate();

console.log(m);

function func(name = 'Alex'){
    console.log(name);
}
func();

var func = (name = 'Alex') => name;
console.log(func());

"use strict";

var course = {
    name: "Learn ES6 fast",
    publisher: "Some indian guy"
};

function courseDetails(s){
    let {name,publisher,price} = s;
    console.log(name + " from " + publisher);
}

courseDetails(course);

//import {cube,foo} from 'module.js';
//
//console.log(cube(3));
//console.log(foo);
