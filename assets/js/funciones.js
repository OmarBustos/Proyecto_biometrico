//Mostrar menu lateral en dispositivos móbiles
const menuBtn = document.getElementById("menu-btn");
const exitBtn = document.querySelector(".bi-x");
const enlace = document.querySelectorAll(".enlace");
const dashboard =document.querySelector(".menu-dashboard");

menuBtn.addEventListener("click", () => {
    dashboard.classList.toggle("open");
});

exitBtn.addEventListener("click", () => {
    dashboard.classList.remove("open");
});

enlace.forEach(opcion => opcion.addEventListener("click", () => {
    dashboard.classList.remove("open");
}));


//Mostrar opciones del usuario
const iconUser = document.getElementById("user-btn");
const optionUser = document.querySelector(".user-options");
iconUser.addEventListener("click", () => {
    optionUser.classList.toggle("active");
});



//Buscador
(function(document) {
    'buscador';

    var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
        });
        });
    }

    function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
        init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent; 
        });
        }
    };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
        LightTableFilter.init();
    }
    });

})(document);


//Mostrar boton arriba
let btnTop = document.getElementById("btn-arriba");
btnTop.addEventListener("click", () => {
    document.documentElement.scrollTop = 0;
});

window.addEventListener("scroll", () => {
    if(document.documentElement.scrollTop > 0){
    btnTop.style.display = "flex";
    }else{
    btnTop.style.display = "none";
    }
});