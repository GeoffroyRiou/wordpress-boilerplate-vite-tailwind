const InitResultsList = () => {

    let page = 2; // On initialise à 2 car la première page est déjà chargée
    const categoriesForm = document.getElementById('list-filters');
    const resetButton = document.getElementById('list-filters-reset');
    const searchFormInput = categoriesForm ? categoriesForm.querySelector('.search') : null;
    const categoriesFormCheckboxes = categoriesForm ? categoriesForm.querySelectorAll('.choice') : null;
    const loadMoreButton = document.getElementById('list-load-more');
    const resultsList = document.getElementById('list-form-results');
    const showFilters = document.querySelector('.list-head-filters');
    const filters = document.querySelector('.list-content-filters');


    let debounceSearchInput = null;

    if (!categoriesForm || !resultsList || !categoriesFormCheckboxes || !resetButton || !filters || !showFilters  ) return;

    categoriesForm.addEventListener('submit', (e) => {
        e.preventDefault();
        doSearch(true);
    });

    showFilters.addEventListener('click', (e) => {
        e.preventDefault();
        showFilters.classList.toggle('-active')
        filters.classList.toggle('-active')
    });

    categoriesFormCheckboxes.forEach((choice) => {
        choice.addEventListener('change', (e) => {
            e.preventDefault();
            doSearch(true);
        });
    });

    if(searchFormInput){
        searchFormInput.addEventListener('keyup', (e) => {
            e.preventDefault();
            clearTimeout(debounceSearchInput);
            debounceSearchInput = setTimeout(() => {
                doSearch(true);     
            }, 300);
        });
    }

    loadMoreButton.addEventListener('click', (e) => {
        e.preventDefault();
        doSearch();
    });

    resetButton.addEventListener('click', (e) => {
        e.preventDefault();
        categoriesForm.reset();
        doSearch(true);
    });

    const doSearch = (resetResults = false) => {

        if(resetResults) page = 1;

        // Création des données de filtrage
        const formdata = new FormData(categoriesForm);
        formdata.append('page', page);

        // Récupération des boutiques suivantes
        fetch(categoriesForm.getAttribute('action'), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
            },
            body: new URLSearchParams(formdata),
        })
            .then(response => response.json())
            .then(body => {

                // En cas d'erreur, on affiche un message
                if (!body.success) {
                    resultsList.innerHTML = 'Une erreur est survenue.';
                    return;
                }

                if(resetResults){
                    // On écrase la précédente liste
                    resultsList.innerHTML = body.data.html;
                }else{
                    // Ajout des nouveaux éléments à la liste
                    const elements = getDomFromHtmlString(body.data.html);
                    Array.from(elements).forEach((element) => {
                        resultsList.append(element);
                    });
                }                

                // Gestion de l'affichage du bouton en fonction du nombre de pages restantes à afficher
                loadMoreButton.style.display = body.data.max <= page ? 'none' : 'flex';

                // Mise à jour de la page courante
                if (body.data.max > page) page++;
            });
    }
}

/**
 * Converti une chaine de caractères représentant du html en éléments DOM
 */
const getDomFromHtmlString = (contentString) => {
    var div = document.createElement('div');
    div.innerHTML = contentString.trim();

    // Change this to div.childNodes to support multiple top-level nodes.
    return div.children;
}

export default InitResultsList;