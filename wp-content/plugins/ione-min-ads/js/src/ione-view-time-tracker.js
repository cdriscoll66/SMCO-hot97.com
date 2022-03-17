/* global _, IntersectionObserver */

const ioneViewTimeTracker = function( timeLimit, onLimitCallback ) {
	this.timeLimit = timeLimit;
	this.onLimitCallback = onLimitCallback;
	this.idsVisible = [];
	this.idsViewTime = {};
	this.isViewportActive = true;
	this.observer = new IntersectionObserver(
		this.onIntersecting.bind( this ),
		{
			root: null,
			rootMargin: '0px',
			threshold: [ 0.0, 0.5 ]
		}
	);
};

ioneViewTimeTracker.prototype = {
	init: function() {
		document.addEventListener(
			'visibilitychange',
			this.onViewportVisibilityChange.bind( this )
		);

		if ( this.timeLimit ) {
			setInterval( this.onTick.bind( this ), 1000 );
		}
	},

	observe: function( element ) {
		this.observer.observe( element );
	},

	unobserve: function( element ) {
		var elementVisibleIndex = this.idsVisible.indexOf( element.id );

		this.observer.unobserve( element );

		if ( element.id ) {
			// Remove references from the element being in view.
			if ( -1 !== elementVisibleIndex ) {
				delete this.idsVisible[ elementVisibleIndex ];
			}
			// Remove the view time counter to prevent refresh.
			if ( element.id in this.idsViewTime ) {
				delete this.idsViewTime[ element.id ];
			}
		}
	},

	onViewportVisibilityChange: function() {
		this.isViewportActive = ! document.hidden;
	},

	idsOverLimit: function() {
		var self = this;

		return _.keys(
			_.pick( this.idsViewTime, function( viewTime ) {
				return ( viewTime >= self.timeLimit );
				}
			)
		);
	},

	onTick: function() {
		var idsOverLimit,
			self = this;

		if ( ! this.isViewportActive ) {
			return;
		}

		_.each( this.idsVisible, function( elementId ) {
			if ( 'undefined' === typeof self.idsViewTime[ elementId ] ) {
				self.idsViewTime[ elementId ] = 0;
			}

			self.idsViewTime[ elementId ] += 1;
		} );

		idsOverLimit = this.idsOverLimit();

		if ( idsOverLimit.length ) {
			_.each( idsOverLimit, function( elementId ) {
				self.idsViewTime[ elementId ] = 0;
			} );

			this.onLimitCallback( idsOverLimit );
		}
	},

	onIntersecting: function( entries ) {
		let self = this;

		_.each( entries, function( entry ) {
			if ( entry.isIntersecting && entry.intersectionRatio >= 0.5 ) {
				if ( -1 === self.idsVisible.indexOf( entry.target.id ) ) {
					self.idsVisible.push( entry.target.id );
				}
			} else {
				self.idsVisible = _.without( self.idsVisible, entry.target.id );
			}
		} );
	}
};
