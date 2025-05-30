document.addEventListener('DOMContentLoaded', function () {
	const thumbnails = document.querySelectorAll('.thumbnail')
	const splashscreen = document.getElementById('splashscreen')
	const splashImage = document.getElementById('splash-image')
	const closeSplash = document.getElementById('close-splash')
	const menuToggle = document.getElementById('menu-toggle')
	const menu = document.getElementById('menu')

	thumbnails.forEach(thumb => {
		thumb.addEventListener('click', e => {
			const imageSrc = e.target.getAttribute('data-sciezka')
			splashImage.src = imageSrc
			splashscreen.style.display = 'flex'
		})
	})

	splashscreen.addEventListener('click', e => {
		if (e.target === splashscreen) {
			splashscreen.style.display = 'none'
		}
	})

	closeSplash.addEventListener('click', () => {
		splashscreen.style.display = 'none'
	})

	menuToggle.addEventListener('click', () => {
		menu.classList.toggle('active')
	})
})
