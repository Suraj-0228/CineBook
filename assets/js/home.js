fetch('assets/movies-data.json')
    .then(response => response.json())
    .then(data => {
        const movies = data.movies_data;
        const container = document.getElementById('movie-container');

        movies.forEach(movie => {
            const col = document.createElement('div');
            col.className = 'col-6 col-sm-6 col-md-4 col-lg-3';

            col.innerHTML = `
                    <div class="card mx-2">
                        <img src="${movie.poster_url}" class="card-img-top" alt="${movie.title}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">${movie.title}</h5>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span><i class="fa-solid fa-star text-danger"></i> ${movie.rating}/10.0</span>
                                <span>${movie.language}</span>
                            </div>
                            <a href="movies-details.html" class="btn w-100">View Details</a>
                        </div>
                    </div>
                `;

            container.appendChild(col);
        });
        $('.card-slider').slick({
            arrows: true,
            infinite: false,
            slidesToShow: 5,
            slidesToScroll: 2,
            centermode: true,
            centerPadding: '60px',
            dots: false,
            speed: 200,
            responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    arrows: false
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    arrows: false
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                    arrows: false
                }
            }
            ]
        });
    })
    .catch(error => {
        console.error('Error loading movie data:', error);
    });