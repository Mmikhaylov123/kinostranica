// регистрирую плагины ScrollTrigger (отвечает за манипуляцию с элементами в окне просмотра)
// и ScrollSmoother (плавный скролл)
gsap.registerPlugin(ScrollTrigger, ScrollSmoother)

//настройку скролла мы применяем на устройствах БЕЗ touch
if (ScrollTrigger.isTouch !==1){ 

	ScrollSmoother.create({
		wrapper: '.wrapper', //оболочка
		content: '.content', //внутренняя часть, которая будет плавно двигаться внутри оболочки
		smooth: 1.5, //скорость
		effects: true //подключаю эффекты, чтоб дальше настроить их для item (через data-speed)
	})
//работаю с анимацией, перегоняя ШАПКУ из "видной" в "скрытую"
//scrollTrigger описываю, чтоб более тонко настроить анимацию
	gsap.fromTo('.hero-section', { opacity: 1 }, { 
		opacity: 0 ,
		scrollTrigger: {
			trigger: '.hero-section',
			start: 'center',
			end: 'bottom', 
			scrub: true // возврат предыдущего значения
		}
	})
//работаю с анимацией, чтоб список афиш изначально был прозрачным, а затем становился НЕпроразнчым
//scrollTrigger описываю, чтоб более тонко настроить анимацию
	gsap.fromTo('.gallery__left, .gallery__item', {opacity: 0}, {
		opacity: 1,
		scrollTrigger: {
			trigger: '.gallery__item',
			start: '-1300',
			end: '0',
			scrub: true
		}
	})

}




