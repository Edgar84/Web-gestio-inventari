//globals
const boton = document.querySelector('#bMenu');
const menuLateral = document.querySelector('#menuLat');
const cerrar = document.querySelector('#dark');
const itemsMenu = document.querySelectorAll('.nav-link');
const tipus = document.querySelector('#tipus');

//listeners
listeners();
function listeners() {
    //inputForm.addEventListener('keyup', searchProduct);
    document.addEventListener('DOMContentLoaded', changeMenu);
    window.addEventListener('resize', changeMenu);
    boton.addEventListener('click', mostrarMenu);
    cerrar.addEventListener('click', esconderMenu);
    tipus.addEventListener('change', selectTipus);
    itemsMenu.forEach(function(item){
        item.addEventListener('click', function(e){
            //Recorrer todos de nuevo para eliminar cualquier active del menu
            itemsMenu.forEach(function(elem){
                if(elem.classList.contains('active')){
                    elem.classList.remove('active');
                }
            });
            e.preventDefault();
            item.classList.add('active');
            selectCategoy(item);
        });
    });

} 

//functions
function changeMenu(){
//|| (menuLateral.classList.contains('off-canvas-menu') && screen.width > 768)
    if(screen.width > 768 ){
        if(menuLateral.classList.contains('off-canvas-menu')){
            menuLateral.classList.remove('off-canvas-menu');
            menuLateral.classList.add('desktop-menu');
        }else{
            menuLateral.classList.add('desktop-menu');
        }
    }else{
        if(menuLateral.classList.contains('desktop-menu')){
            menuLateral.classList.remove('desktop-menu');
            menuLateral.classList.add('off-canvas-menu');
        }else{
            menuLateral.classList.add('off-canvas-menu');
        }
    }
}

function mostrarMenu() {
    menuLateral.classList.add("active");
    cerrar.style.display = "block";
    document.querySelector('body').style = "overflow-y: hidden;";
}

function esconderMenu() {
    menuLateral.classList.remove("active");
    cerrar.style.display = "none";
    document.querySelector('body').style = "overflow-y: initial;";
}

function selectTipus(){
    const productTipusActive = document.querySelectorAll('.active .product-desc .tipus');
    const productTipusNotActive = document.querySelectorAll('.product--not-selected .product-desc .tipus');

    document.querySelector('.alert').style.display = "none";
    
    productTipusActive.forEach(function(prod){
        prod.parentElement.parentElement.parentElement.classList.remove('d-none');
        if(prod.innerText != tipus.value) {
            prod.parentElement.parentElement.parentElement.classList.add('d-none');
        }
        if(tipus.value === ""){
            prod.parentElement.parentElement.parentElement.classList.remove('d-none'); 
        }
    });
    productTipusNotActive.forEach(function(prod){
        if(!prod.parentElement.parentElement.parentElement.classList.contains('active')){
            
            prod.parentElement.parentElement.parentElement.classList.remove('d-none');
            if(prod.innerText != tipus.value) {
                prod.parentElement.parentElement.parentElement.classList.add('d-none');
            }
            if(tipus.value === ""){
                prod.parentElement.parentElement.parentElement.classList.remove('d-none');
            }
        }
    });
    if(document.querySelector('.row-grid').offsetHeight < 200){
        document.querySelector('.alert').style.display = "block";
    }
}

function selectCategoy(item){
    const category = document.querySelectorAll('.category');
    tipus.value = ""; //reset al select Tipus
    document.querySelector('.alert').style.display = "none";
    
    category.forEach(function(cat){
        if(cat.parentElement.parentElement.parentElement.classList.contains('active')){
            cat.parentElement.parentElement.parentElement.classList.remove('active');
        }
        if(cat.parentElement.parentElement.parentElement.classList.contains('not-select')){
            cat.parentElement.parentElement.parentElement.classList.remove('not-select');
        }
        cat.parentElement.parentElement.parentElement.classList.add('d-none');
        if(cat.innerText == item.innerText){
            if(cat.parentElement.parentElement.parentElement.classList.contains('d-none')){
                cat.parentElement.parentElement.parentElement.classList.remove('d-none');
                cat.parentElement.parentElement.parentElement.classList.add('active');
                esconderMenu();
            }
        }
    }); 
}

