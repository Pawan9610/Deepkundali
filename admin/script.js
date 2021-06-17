function showCard(){
	var x = document.getElementById("add-astro");
	if (x.style.display == "none") {
        x.style.display = "block";
    }
    else
        x.style.display = "none";
        
}

(function() {
	var popup = document.getElementById('popup');
	var popupContainer = document.getElementById('popup-container');
	var springSystem = new rebound.SpringSystem();
	var spring = springSystem.createSpring(35, 3);
	
	var force = {x: 0, y: 0};
	var pressStart = {x: 0, y: 0};
	//var pressed = false;
	
	spring.addListener({
		onSpringUpdate: function(spr) {
			var val = spr.getCurrentValue();
			rot = rebound.MathUtil.mapValueInRange(val, 0, 1, 0, 40);
			var transform = 'rotateX(' + rot * force.y / 3 + 'deg) ' 
				+ 'rotateY(' + rot * force.x + 'deg)';
			
			var vendors = ['Webkit', 'Moz', 'ms'];
			for(var vendor in vendors) {
				popup.style[vendors[vendor] + 'Transform'] = transform;	
			}
		}
	});
	
	function updateRotation(relX, relY) {
		var rect = popup.getBoundingClientRect();
		var x = Math.max(Math.min(relX, rect.width), 0);
		var y = Math.max(Math.min(relY, rect.height), 0);
		force.x = (x/rect.width) - 0.5;
		force.y = -((y/rect.height) - 0.5);
		
		spring.setEndValue(Math.max(Math.abs(force.x), Math.abs(force.y)));
		//spring.setEndValue(Math.sqrt(Math.pow(Math.abs(force.x), 2) + Math.abs(Math.abs(force.y), 2)));
	}
	
	var hammertime = new Hammer(popupContainer);
	hammertime.get('pan').set({ threshold: 0 });
	
	popupContainer.addEventListener('pointerdown', function(ev) {
		//ev.preventDefault();
		var rect = popup.getBoundingClientRect();
		pressStart.x = ev.pageX - (rect.left + document.body.scrollLeft);
		pressStart.y = ev.pageY - (rect.top + document.body.scrollTop);
		
		updateRotation(pressStart.x, pressStart.y);
	});

	hammertime.on('panmove', function(ev) {
		updateRotation(pressStart.x + ev.deltaX, pressStart.y + ev.deltaY);
	});
	
	hammertime.on('panend pancancel', function(ev) {
		spring.setEndValue(0);
	});
	
	popupContainer.addEventListener('pointerup', function(ev) {
		spring.setEndValue(0);
	});
	
	var sliderEl = document.querySelector('.lory');
	var slider = lory(sliderEl, {
		infinite: 1,
		classNameFrame: 'lory__frame',
		classNameSlideContainer: 'lory__slides',
		classNamePrevCtrl: 'lory__previous',
		classNameNextCtrl: 'lory__next'
	});
	
	var mcSliderPrev = new Hammer.Manager(slider.querySelector('.lory__previous'));
	mcSliderPrev.add( new Hammer.Tap());
			 
	mcSliderPrev.on("tap", function() {
		slider.prev();
	});
	
	var mcSliderNext = new Hammer.Manager(slider.querySelector('.lory__next'));
	mcSliderPrev.add( new Hammer.Tap());
			 
	mcSliderPrev.on("tap", function() {
		slider.next();
	});
})();