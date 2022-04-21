/* global _, ioneAdsConfig, ioneViewTimeTracker */

! function(a9, a, p, s, t, A, g) {
	if ( a[a9] ) return;
	function q(c, r) { a[a9]._Q.push([c, r]) }

	a[a9] = {
		init: function() {
			q("i", arguments)
		},
		fetchBids: function() {
			q("f", arguments)
		},
		setDisplayBids: function() {},
		targetingKeys: function() {return []},_Q: []
	};
	A = p.createElement(s); A.defer = true; A.src = t;
	document.body.appendChild( A );
}( 'apstag', window, document, 'script', '//c.amazon-adsystem.com/aax2/apstag.js' );

( function() {
	var head = document.getElementsByTagName( 'head' )[0];
	var script = document.createElement( 'script' );
	script.type = 'text/javascript';
	script.defer = true;
	script.src = 'https://securepubads.g.doubleclick.net/tag/js/gpt.js';
	head.appendChild( script );
} )();

var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];

var ioneAdLoader = {
	apstagHasInitialized: false,
	apsPromise: function( slots ) {
		var self = this;
		if ( ! this.apstagHasInitialized ) {
			apstag.init( {
				pubID: 'f699d784-7fb8-4b13-8909-93bdd4636914',
				adServer: 'googletag'
			} );
			this.apstagHasInitialized = true;
		}

		return new Promise( ( resolve, reject ) => {
			var a9_slots = [];
			slots.forEach( function( item ) {
				var slot = {
					slotID: item.getSlotElementId(),
					slotName: item.getAdUnitPath(),
					pos: item.getTargeting( 'pos' )
				};

				var config = self.findConfigByPos( slot.pos );
				// At this point, the config should exist. But let's test anyway.
				if ( null === config ) {
					return;
				}
				slot.sizes = self.isMobile() ? config.sizes.mobile : config.sizes.desktop;

				if ( slot.sizes.length > 0 ) {
					a9_slots.push( slot );
				}
			} );

			if ( a9_slots.length > 0 ) {
				apstag.fetchBids( {
					slots: a9_slots,
					timeout: 600
				}, function( bids ) {
					apstag.setDisplayBids();
					resolve();
				} );
			} else {
				resolve();
			}
		} );
	},
	isMobile: function() {
		return window.innerWidth < ioneAdsConfig.desktopBreakPoint[0];
	},
	findConfigByPos: function( pos ) {
		var ad = ioneAdsConfig.adConfig.filter( ad => ad.targeting.pos == pos );
		if ( ad.length > 0 ) {
			return ad[0];
		} else {
			return null;
		}
	},
	refreshAds: function( slots ) {
		if ( slots && slots.length > 0 ) {
			Promise.all( [ this.apsPromise( slots ) ] ).then( () => {
				googletag.pubads().refresh( slots, { changeCorrelator: false } );
			} );
		}
	},
	viewableTimeObserver: new ioneViewTimeTracker(
		parseInt( ioneAdsConfig.viewableRefreshInterval ),
		( elementIds ) => {
			let adSlots = ioneAdLoader.adSlots.filter( ( adSlot ) => -1 !== elementIds.indexOf( adSlot.getSlotElementId() ) );

			adSlots.map( function( adSlot ) {
				adSlot.setTargeting( 'refresh', 'yes' );
			} );
			ioneAdLoader.refreshAds( adSlots );
		}
	),
	adSlots: [],
	init: function() {
		var self = this;
		googletag.cmd.push( function() {
			let divs = document.querySelectorAll( 'div.ione-ad' );
		
			if ( ! ioneAdsConfig.adConfig ) {
				console.error( 'ADS NOT CONFIGURED' );
				return;
			}

			for ( let key in ioneAdsConfig.targeting ) {
				googletag.pubads().setTargeting( key, ioneAdsConfig.targeting[ key ] );
			}

			googletag.pubads().disableInitialLoad();
			googletag.pubads().enableAsyncRendering();
			googletag.pubads().enableSingleRequest();
			googletag.enableServices();

			divs.forEach( function( div, index ) {
				var slot, config, thisMap, adUnit;

				if ( ! div.dataset.hasOwnProperty( 'pos' ) ) {
					return;
				}

				config = self.findConfigByPos( div.dataset.pos );

				if ( null === config ) {
					return;
				}

				div.id = 'ione-ad-' + index;

				if ( self.isMobile() ) {
					adUnit = ioneAdsConfig.baseMobileAdUnit;
				} else {
					adUnit = ioneAdsConfig.baseDesktopAdUnit;
				}

				if ( config.adUnit ) {
					adUnit = config.adUnit;
				}

				thisMap = googletag.sizeMapping()
					.addSize( ioneAdsConfig.desktopBreakPoint, config.sizes.desktop )
					.addSize([ 0, 0 ], config.sizes.mobile )
					.build();

				slot = googletag.defineSlot( adUnit, [ 1, 1 ], div.id );
				slot.setCollapseEmptyDiv( true, false ).addService( googletag.pubads() );

				for ( let key in config.targeting ) {
					slot.setTargeting( key, config.targeting[ key ] );
				}

				slot.defineSizeMapping( thisMap );
				self.adSlots.push( slot );
				self.viewableTimeObserver.observe( div );
			} );

			self.refreshAds( self.adSlots );

			if ( ioneAdsConfig.viewableRefreshInterval > 5 ) {
				self.viewableTimeObserver.init();
			}
		} );
	}
};
ioneAdLoader.init();
