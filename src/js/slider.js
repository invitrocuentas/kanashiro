(function(){

    if(document.querySelector('#hero')){
        new Splide('#hero', {
            // type: 'fade',
            direction: 'ttb',
            // wheel: true,
            // rewind: true,
            height: '100%',
            pagination: true,
            arrows: false
        }).mount();
    }

    if(document.querySelector('#bg_nosotros')){
        new Splide('#bg_nosotros', {
            type: 'fade',
            pagination: true,
            arrows: false,
            perPage: 1,
            perMove: 1,
            drag: false
        }).mount();
    }

    if(document.querySelector('#localizaciones')){
        new Splide('#localizaciones', {
            type: 'fade',
            rewind: true,
            pagination: false,
            arrows: true,
            perPage: 1,
            perMove: 1,
        }).mount();
    }

    if(document.querySelector('#clientes')){
        new Splide('#clientes', {
            type: 'loop',
            pagination: false,
            arrows: true,
            perPage: 5,
            gap: '1.75rem',
            perMove: 1
        }).mount();
    }

    if(document.querySelector('#sedes')){
        let sedes = new Splide('#sedes', {
            type: 'slide',
            pagination: false,
            arrows: false,
            height: '18rem',
            perPage: 3,
            perMove: 1,
            direction: 'ttb',
            isNavigation: true
        })

        let mapa = new Splide('#mapa', {
            type: 'fade',
            pagination: false,
            arrows: false,
            perPage: 1,
            perMove: 1,
            drag: false
        })
        
        sedes.sync(mapa)

        sedes.mount();
        mapa.mount();
    }

    if(document.querySelector('#single')){
        let single = new Splide('#single', {
            type: 'fade',
            rewind: true,
            pagination: true,
            arrows: false,
            perPage: 1,
            start: 0,
            perMove: 1,
            drag: false
        })

        let information = new Splide('#information', {
            type: 'fade',
            rewind: true,
            pagination: false,
            start: 0,
            arrows: false,
            perPage: 1,
            perMove: 1,
            drag: false
        })

        let extra = new Splide('#extra', {
            type: 'fade',
            rewind: true,
            pagination: false,
            arrows: false,
            perPage: 1,
            perMove: 1,
            start: 0,
            drag: false
        })

        let thumbnails = new Splide('#thumbnails', {
            type: 'loop',
            isNavigation: true,
            rewind: true,            
            arrows: false,
            perPage: 3,
            start: 0,
            perMove: 1,
            pagination: false,
            arrows: false
        })

        single.sync(information)
        information.sync(extra)
        extra.sync(thumbnails)
        thumbnails.sync(single)

        single.mount();
        information.mount();
        extra.mount();
        thumbnails.mount();
    }

    if(document.querySelector('#photo')){
        let photo = new Splide('#photo', {
            type: 'loop',
            pagination: true,
            arrows: false,
            perPage: 1,
            perMove: 1,
        });

        let ubication = new Splide('#ubication', {
            type: 'fade',
            pagination: false,
            arrows: false,
            perPage: 1,
            perMove: 1,
            drag: false,
        });
        

        photo.sync(ubication);

        photo.mount();
        ubication.mount();
    }

})();