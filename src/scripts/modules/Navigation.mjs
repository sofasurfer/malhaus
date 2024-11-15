/**
 * Responsible for adding "open" classes to submenus with children when clicked or currently active page
 *
 * @class Navigation
 */
class Navigation {

    constructor(navigation = '.c-offcanvas-nav-list') {
        this.navigations = document.querySelectorAll(navigation) || [];
        this.scrollPos = 0;
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

                var offcanvas = document.getElementById('open-navigation');
                offcanvas.classList.remove('open');
                
                window.location.href = link.href;

            });
        });

        var offcanvasElements = document.querySelectorAll('.c-offcanvas-trigger');
        if(offcanvasElements){
            offcanvasElements.forEach(offcanvas => {
                offcanvas.addEventListener('click', (event) => this.handleOffcanvas(event));
            });            
        }

    }    
    
    handleOffcanvas(event){
        event.preventDefault(); 
        var offcanvas = document.getElementById('open-navigation');
        if( offcanvas.classList.contains('open') ){
            offcanvas.classList.remove('open');
        }else{
            this.scrollPos = window.scrollY;
            offcanvas.classList.add('open');
        }
    }

}

export default Navigation;