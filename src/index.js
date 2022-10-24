import "./styles.scss";
import naja from 'naja';
import '../node_modules/materialize-css/dist/css/materialize.min.css';
import '../node_modules/materialize-css/dist/js/materialize.min.js';

document.addEventListener("DOMContentLoaded", () => {
    naja.initialize();
});

const addBrandButtonElement = document.getElementById("addBrandButton");
addBrandButtonElement.addEventListener("click", () =>{
    console.log("I clicked on addButton")
    });