/**
 * Responsible for adding "open" classes to submenus with children when clicked or currently active page
 *
 * @class Navigation
 */
class Navigation {

    constructor(navigation = '.c-offcanvas-nav-list') {
        this.navigations = document.querySelectorAll(navigation) || [];

        this.init()
    }

    init() {
        // Add active state to anchor links
        const targetFragment = window.location.hash;
        console.log('TARGET: ' + targetFragment);
        if(targetFragment){
            const links = document.querySelectorAll('a[href*="#"]');
    
            links.forEach(link => {
                if (link.href.includes(targetFragment)) {
                    link.parentElement.classList.add('c-active');
                }
            });
        }

        // Select all elements with the class 'menu-item-link'
        const menuLinks = document.querySelectorAll('.menu-item-link');

        // Add a click event listener to each link
        menuLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                // console.log(`Clicked on: ${link.href}`);

                // Select the parent element with the id 'menu-main'
                const menuMain = document.getElementById('c-offcanvas-nav');
                const activeElements = menuMain.querySelectorAll('.c-active');
                activeElements.forEach(element => {
                    element.classList.remove('c-active');
                });

                link.parentElement.classList.add('c-active');

                window.location.href = link.href;

            });
        });

    }

}

export default Navigation;