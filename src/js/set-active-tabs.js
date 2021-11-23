class SetActiveTabs {

	constructor(buttonsContainer, tabs) {
		this.buttonsContainer = buttonsContainer;
		this.tabs = tabs;

		this.currentTab = document.querySelector('.second-container .nav-link');

	
		this.currentTab.addEventListener('click', function() {
			console.log('asd');
		})
		// this.buttonsContainer.addEventListener("click", event => {
			// document.querySelector('.second-container .nav-tabs .nav-item .nav-link').classList.remove('active');
			//    event.target.closest(".woocommerce-tabs__button").classList.add("woocommerce-tabs__button--active");

			//    const index = event.target.closest(".woocommerce-tabs__button").dataset
			// 	 .value;

			//    this.openTab(index);
			// })
			
			
			console.log('hello')
	}
}