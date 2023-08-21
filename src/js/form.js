(function(){

    let plusButtons = Array.from(document.querySelectorAll('form .form-product button'));

    plusButtons.forEach(button=>{
        button.addEventListener('click', (e)=>{
            e.preventDefault();
            e.currentTarget.classList.toggle('minus');
            let caja = e.currentTarget.closest('.form-product').nextElementSibling;
            caja.classList.toggle('none')
        })
    })

})();