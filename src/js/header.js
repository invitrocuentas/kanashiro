(function(){

    function handleScroll(){

        let header = document.querySelector('header'),
            logo = header.querySelector('.logo'),
            targetSection = document.querySelector('.pt-body'),
            whiteLogo = header.querySelector('[name="white_logo"]').value,
            colorLogo = header.querySelector('[name="color_logo"]').value;

        if(!document.body.classList.contains('page-template-front-page')){
            header.classList.add('scrolled');
            logo.src = colorLogo;
            return;
        }

        let targetSectionHeight = targetSection.offsetHeight,
            halfHeight = targetSectionHeight / 2;

        if(window.matchMedia("(max-width: 768px)").matches){
            logo.src = colorLogo;
            return
        }

        if (window.scrollY >= targetSection.offsetTop + halfHeight) {
            header.classList.add('scrolled')
            logo.src = colorLogo
        }else{
            header.classList.remove('scrolled')
            logo.src = whiteLogo
        }
    }

    window.addEventListener('scroll', handleScroll);
    window.onpaint = handleScroll();

    if(document.querySelector('#toggle')){

        let menu = document.querySelector('.menu'),
            button = document.querySelector('#toggle'),
            closes = Array.from(document.querySelectorAll('.menu_close'));

        button.addEventListener('click', (e)=>{
            e.preventDefault();
            menu.classList.toggle('active');
        })

        closes.forEach(close => {
            close.addEventListener('click', (e)=>{
                e.preventDefault();
                menu.classList.toggle('active');
            })
        })

    }

})();