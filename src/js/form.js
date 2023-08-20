(function(){

    let plusButtons = Array.from(document.querySelectorAll('form .form-product button'));

    plusButtons.forEach(button=>{
        button.addEventListener('click', (e)=>{
            e.preventDefault();
            let caja = e.currentTarget.closest('.form-product').nextElementSibling;
            caja.classList.toggle('none')
        })
    })

})();