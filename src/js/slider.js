(function(){

    if(document.querySelector('#hero')){
        new Splide('#hero', {
            // type: 'fade',
            direction: 'ttb',
            // wheel: true,
            // rewind: true,
            height: '100%',
            pagination: true,
            arrows: false,
            breakpoints: {
                942: {
                    type: 'loop',
                    direction: 'ltr',
                    // autoplay: true,
                    // interval: 5000
                }
            }
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

    if(document.querySelector('#valores')){
        new Splide('#valores', {
            type: 'slider',
            pagination: false,
            arrows: true,
            perPage: 1,
            perMove: 1,
            autoplay: true,
            interval: 5000
        }).mount();
    }

    if(document.querySelector('#clientes')){
        new Splide('#clientes', {
            type: 'loop',
            pagination: false,
            arrows: true,
            perPage: 5,
            gap: '1.75rem',
            perMove: 1,
            breakpoints: {
                1200: {
                    perPage: 4
                },
                1024: {
                    perPage: 3
                },
                850: {
                    gap: '1.5rem'
                },
                650: {
                    gap: '1.5rem',
                    perPage: 2,
                },
                630: {
                    gap: '1rem',
                    perPage: 1
                }
            }
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
            isNavigation: true,
            breakpoints: {
                1462: {
                    height: '14rem',
                },
                630: {
                    perPage: 1,
                    height: '5rem',
                    direction: 'ltr',
                }
            }
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
            drag: false,
            breakpoints: {
                942: {
                    pagination: false
                }
            }
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
            breakpoints: {
                768: {
                    type: 'slider',
                    pagination: false,
                    arrows: true
                }
            }
        });

        let ubication = new Splide('#ubication', {
            type: 'fade',
            pagination: false,
            arrows: false,
            perPage: 1,
            perMove: 1,
            drag: false,
            breakpoints: {
                768: {
                    pagination: true
                }
            }
        });
        

        photo.sync(ubication);

        photo.mount();
        ubication.mount();
    }

})();