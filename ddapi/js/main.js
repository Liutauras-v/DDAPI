let leftBtns = document.querySelectorAll('#left > .item');
let rightFields = document.querySelectorAll('#right > .item');

leftBtns.forEach((element) => {
    element.addEventListener('click', (element)=>{
        let id = element.target.getAttribute('info_id');
        rightFields.forEach((element) =>{
            element.style.display = 'none';
            if(element.getAttribute('info_id') == id){
                element.style.display = 'inline-block';
            }
        });
    })
});