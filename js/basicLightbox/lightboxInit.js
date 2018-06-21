window.onload = function(){
	const getTargetHTML = function(elem) {
		const id = elem.getAttribute('data-show-id');
		const target = document.querySelector(`[data-id="${ id }"]`);
		return target.outerHTML;
	};

	document.querySelectorAll('[data-show-id]').forEach(function(elem) {
		const html = getTargetHTML(elem);
		elem.onclick = basicLightbox.create(html).show;
	});
}