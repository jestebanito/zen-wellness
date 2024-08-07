/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button doesn't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
			document.body.classList.remove('no-scroll');
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
			document.body.classList.add('no-scroll');
		}
	});

	const menuButton = document.getElementById('menu-btn');
	let isMenuOpen = true;
	menuButton.onclick = function() {

		if (isMenuOpen) {
			menuButton.innerHTML = '<svg class="disable-click" role="img" aria-label="menu-closed" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none"><path stroke="#fff" stroke-linecap="round" stroke-width="5" d="M3 22.795 22.881 3M3.09 3.176 23 23"/></svg>';
		} else {
			menuButton.innerHTML = '<svg class="disable-click" role="img" aria-label="menu-open" xmlns="http://www.w3.org/2000/svg" width="34" height="26" fill="none"><path stroke="#fff" stroke-linecap="round" stroke-width="5" d="M15 23h16M3 13h28M3 3h28"/></svg>';
		}
		
		isMenuOpen = !isMenuOpen;
	};
	
	// let prevScrollPos = window.scrollY;

	function handleScroll() {
		const header = document.getElementById('masthead');
		const headerMenu = document.querySelectorAll('#header-menu a');
		const svgElement = document.querySelectorAll('#zen-wellness-logo path');
		const footerNav = document.getElementById('site-navigation');
		// const currentScrollPos = window.scrollY;

		if (window.scrollY > 50) {
			header.classList.add('visible');
			header.style.backgroundColor = 'rgb(255, 255, 255)';
			header.style.boxShadow = '0 6px 6px rgba(0,0,0,0.25)';

			if (window.matchMedia('(min-width: 37.5em)').matches) {
				headerMenu.forEach(function(anchor) {
					anchor.style.color = 'rgb(115, 79, 150)';
				});
			} else if (!window.matchMedia('(min-width: 37.5em)').matches) {
				headerMenu.forEach(function(anchor) {
					anchor.style.color = 'rgb(255, 255, 255)';
				});
			} 
			
			svgElement.forEach(function(path) {
				path.style.fill = 'rgb(115, 79, 150)';
			});
				
		} else {
			header.style.backgroundColor = 'transparent';
			header.style.boxShadow = 'none';
			header.classList.remove('visible');
			
			svgElement.forEach(function(path) {
				path.style.fill = 'rgb(255, 255, 255)'; 
			});
				
			headerMenu.forEach(function(anchor) {
				anchor.style.color = 'rgb(255, 255, 255)';
			});
		}

		// if (prevScrollPos > currentScrollPos && window.matchMedia('(max-width: 37.5em)').matches) {
		// 	footerNav.classList.add('show');
		// 	footerNav.classList.remove('hide');
		// } else {
		// 	footerNav.classList.add('hide');
		// 	footerNav.classList.remove('show');
		// }

		// prevScrollPos = currentScrollPos;
	};
	
	window.addEventListener('scroll', handleScroll);
	window.addEventListener('resize', handleScroll);

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );
		const isButtonClick = menuButton.contains(event.target);

		if ( ! isClickInside && !isButtonClick ) {
			siteNavigation.classList.remove( 'toggled' );
			
			button.setAttribute( 'aria-expanded', 'false' );

			menuButton.innerHTML = '<svg class="disable-click" role="img" aria-label="menu-open" xmlns="http://www.w3.org/2000/svg" width="34" height="26" fill="none"><path stroke="#fff" stroke-linecap="round" stroke-width="5" d="M15 23h16M3 13h28M3 3h28"/></svg>';
			isMenuOpen = true;

			document.body.classList.remove('no-scroll');
		}
	});

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
}() );

// Function for handling the copy to clipboard for email address copy svg in Footer 

	const copyButton = document.getElementById('copy-button');
	const emailTextElement = document.getElementById('email-text');

	copyButton.addEventListener('click', () => {
		const emailText = emailTextElement.textContent;
		navigator.clipboard.writeText(emailText)
			.then(() => {
				console.log('Text copied to clipboard');
			})
			.catch((error) => {
				console.error('Failed to copy text: ', error);
			});
	});
