(function(){

    function handleScroll(){

        let header = document.querySelector('header'),
            logo = header.querySelector('.logo'),
            targetSection = document.querySelector('.pt-body'),
            whiteLogo = header.querySelector('[name="white_logo"]').value,
            colorLogo = header.querySelector('[name="color_logo"]').value;

        let targetSectionHeight = targetSection.offsetHeight,
            halfHeight = targetSectionHeight / 2;

        if (window.scrollY >= targetSection.offsetTop + halfHeight) {
            header.classList.add('scrolled')
            logo.src = colorLogo
        }else{
            header.classList.remove('scrolled')
            logo.src = whiteLogo
        }
    }

    window.addEventListener('scroll', handleScroll);

})();