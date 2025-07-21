fetch('assets/movies-data.json')
    .then(response => response.json())
    .then(data => {
        const movies = data.movies_data;
        const container = document.getElementById('all-movies-container');

        movies.forEach(movie => {
            const cardCol = document.createElement('div');
            cardCol.className = 'col-6 col-sm-6 col-md-4 col-lg-3 mb-3';

            cardCol.innerHTML = `
                    <div class="card">
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

            container.appendChild(cardCol);
        });
    })
    .catch(error => {
        console.error('Failed to load movie data:', error);
    });