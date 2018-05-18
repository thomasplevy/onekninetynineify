/**
 * Javascript did exist in the 90s and I still only kind of understand how to write it
 * @return   void
 * @since    0.0.1
 * @version  0.0.1
 */
;( function() {

	var main = function() {

		/**
		 * Init
		 * @return   void
		 * @since    0.0.1
		 * @version  0.0.1
		 */
		function init() {

			if ( document.body.classList.contains( 'onek99-mousetrail' ) ) {

				MouseTrails();

			}

		}

		/**
		 * Make mouse trails b/c they're slick
		 * @source   https://codepen.io/falldowngoboone/pen/PwzPYv (mostly stolen but slightly, and I mean very slightly, modified)
		 * @since    0.0.1
		 * @version  0.0.1
		 */
		function MouseTrails() {

			var dots = [],
				mouse = {
					x: 0,
					y: 0,
				};

			/**
			 * Create a dot
			 * @since    0.0.1
			 * @version  0.0.1
			 */
			var Dot = function( i ) {

				this.x = 0;
				this.y = 0;
				this.node = ( function() {
					var node = document.createElement( 'div' );
					node.className = 'onek99-dot dot--' + i;
					document.body.appendChild( node );
					return node;
				}() );

			};

			/**
			 * Move the dot's position around
			 * @return   {[type]}
			 * @since    0.0.1
			 * @version  0.0.1
			 */
			Dot.prototype.draw = function() {

				this.node.style.left = this.x + 'px';
				this.node.style.top = this.y + 'px';

			};

			// add 10 dots
			for ( var i = 0; i < 12; i++ ) {
				dots.push( new Dot( i ) );
			}

			function draw() {

				var x = mouse.x,
					y = mouse.y;

				dots.forEach( function( dot, index, dots ) {

					var next = dots[ index + 1 ] || dots[0];

					dot.x = x;
					dot.y = y;

					dot.draw();

					x += ( next.x - dot.x ) * 0.65;
					y += ( next.y - dot.y ) * 0.65;

				} );

			}

			// update mouse position on mousemove
			addEventListener( 'mousemove', function( event ) {
				mouse.x = event.pageX;
				mouse.y = event.pageY;
			} );


			/**
			 * Draw and then recusively animate during repaints
			 * @return   {[type]}
			 * @since    0.0.1
			 * @version  0.0.1
			 */
			function animate() {
			  draw();
			  requestAnimationFrame( animate );
			}

			// And get it started by calling animate().
			animate();

		};

		init();

		return this;

	};

	window.oneK99ify = new main();

} )(); // you know what's not here? A dollar sign. That's right. I don't even need jQuery
// okay but I'll be honest I did steal this script from a codepen so the author didn't need jQuery
// I really do need jquery most of the time and that's okay
// I'm still a real developer I swear
