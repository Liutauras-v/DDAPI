document.querySelector('.fa-gear').addEventListener('click', e =>{
    if(e.target.classList.contains('fa-gear')){
        document.querySelector('#dropdown').classList.toggle('dropdown-not-visable'); 
        document.querySelector('.fa-gear').classList.toggle('gear-is-open'); 
    } 
});
