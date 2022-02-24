/* jslint esversion: 6 */
/**
 * Alerts
 *
 * Pantheon has a specific workflow for cookie handling through the Varnish
 * cache, See link below.
 *
 * @author Dylan James Wagner
 *
 * @link https://pantheon.io/docs/caching-advanced-topics/
 */
import cookie from './Cookies';

//check if browser is IE 11
let isIE11 = !!navigator.userAgent.match(/Trident.*rv\:11\./);


const $ = window.jQuery;
const s = {
	$window : $(window),
	$alerts : $('.js-alert'),
};

function init() {

	if (s.$alerts.length) {
		const currentDate = Date.now();
		const nowDate     = new Date(currentDate);
		s.$alerts.each(function(index, element) {
			const $element    = $(element);
			const startValue  = element.getAttribute('data-start');
			const endValue    = element.getAttribute('data-end');
			const alertId     = element.getAttribute('data-id');
			const alertCookie = 'STYXKEY-alert-' + alertId;
			let isInDateRange = false;
			if (startValue && endValue) {
				const startDate = new Date(startValue);
				const endDate   = new Date(endValue);
				isInDateRange = startDate.getTime() <= nowDate.getTime() && nowDate.getTime() <= endDate.getTime();
			}
			else {
				isInDateRange = true;
			}

			if (isInDateRange) {
				if (cookie(alertCookie) === undefined || cookie(alertCookie) !== 'inactive' || isIE11 ) {
					$element.addClass('active').removeClass('inactive');
					cookie(alertCookie, 'active');
				}
			}
		});
	}

	events();
}

function events() {

	$('.js-alert__dismiss').on('click', function( event ) { event.preventDefault();
		const $this = $(this);
		cookie('STYXKEY-alert-' + $this.parent().data('id'), 'inactive', { 'maxage' : 1 } );
		$this.parent().addClass('inactive').removeClass('active');
	});
}

export {init as default};
