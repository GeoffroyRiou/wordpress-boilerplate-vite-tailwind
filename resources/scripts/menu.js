

export default () => {
    const menuItems = document.querySelectorAll('.menu-item-has-children');

    menuItems.forEach(item => {

        const firstLevelLink = item.querySelector(':scope > a');

        if(!firstLevelLink) return;

        firstLevelLink.addEventListener('click', function(e) {
            
            e.preventDefault();
            e.stopPropagation();
            
            // Ferme tous les autres sous-menus
            menuItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('-active');
                }
            });

            // Toggle le sous-menu actuel
            item.classList.toggle('-active');
        });
    });

    // Ajoute un événement de clic sur le document
    document.addEventListener('click', () => {
        // Ferme tous les sous-menus
        menuItems.forEach(item => {
            item.classList.remove('-active');
        });
    });
}