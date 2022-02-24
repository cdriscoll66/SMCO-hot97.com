/* jslint esversion: 6 */
/**
 * Cookies
 *
 * @link https://github.com/A-gambit/cookie-es6
 * @link https://gist.github.com/paulobrumatti/f80342b9ff13df99b4ae
 */
var encode = encodeURIComponent;
var decode = decodeURIComponent;

function cookie(name, value, options) {
	if (arguments.length < 2) return get(name);
	set(name, value, options);
}

function set(name, value, options = {}) {
	var str = `${encode(name)}=${encode(value)}`;

	if (value === null) options.maxage = -1;

	if (options.maxage) {
		// options.expires = new Date(+new Date() + options.maxage); // doesn't seem to work

		const date = new Date();
		options.expires = new Date(date.setTime(date.getTime()+(options.maxage * 24 * 60 * 60 * 1000)));
	}

	if (options.path) {
		str += '; path=' + options.path;
	}
	else {
		str += '; path=/';
	}

	// if (options.path)    str += '; path=' + options.path; // see above
	if (options.domain)  str += '; domain=' + options.domain;
	if (options.expires) str += '; expires=' + options.expires.toUTCString();
	if (options.secure)  str += '; secure';

	document.cookie = str;
}

function get(name) {
	// @TODO, is there room here for improvement?
	// var cookies = parse(document.cookie); // Idk what this was supposed to do but it didnt seem to work.
	// @link https://gist.github.com/paulobrumatti/f80342b9ff13df99b4ae // this code does it differently
	var cookies = {};

	for (let cookie of document.cookie.split('; ')) {
		let [name, value] = cookie.split('=');
		cookies[name] = decodeURIComponent(value);
	}

	// return !!name ? cookies : cookies[name]; // this seemed backwards
	return !!name ? cookies[name] : cookies;
}

function parse(str) {
	var obj = {},
		pairs = str.split(/ *; */);

	if (!pairs[0]) return obj;

	for (let pair of pairs) {
		pair = pair.split('=');
		obj[decode(pair[0])] = decode(pair[1]);
	}
}

export {cookie as default};
