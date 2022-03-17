<?php

/**
 * Inject an ad in the content.
 */
class IOne_Ad_Injector {

	const OPTION_NAME_INCONTENT = 'ione-advertising-config-incontent';

	public static $do_incontent = true;

	public function __construct() {
		self::$do_incontent = get_option( self::OPTION_NAME_INCONTENT );

		add_action( 'ione-ads__show_settings', array( $this, 'settings' ) );
		add_action( 'ione-ads__process_input', array( $this, 'save_settings' ) );

		if ( self::$do_incontent ) {
			add_filter( 'the_content', array( $this, 'inject_ads' ) );
		}
	}

	public function settings() {
		?>
		<p>
			<label>
				<input type="checkbox" name="ione-advertising-disable-incontent" <?php checked( self::$do_incontent ); ?>> Enable incontent ad injection. Ads will be injected on posts with more than 300 words, starting with the block that contains the 75th word, then every 250 words, up to 5 times.
			</label>
		</p>
		<?php
	}

	public function save_settings() {
		$disable_incontent = filter_input( INPUT_POST, 'ione-advertising-disable-incontent' );
		update_option( self::OPTION_NAME_INCONTENT, (bool) $disable_incontent );
	}

	/**
	 * Insert something after a paragraph at a certain word count
	 *
	 * @param string $html Content string
	 * @param array $insertions Array of injections (key = content string, value = number of words to insert after)
	 * @return string
	 */
	private function insert_after_paragraph( $html, $insertions ) {
		$wordcount = 0;
		$return    = false;
		$addflag   = false;

		$doc = new DOMDocument();
		@$doc->loadHTML( mb_convert_encoding( $html, 'HTML-ENTITIES', 'UTF-8' ) );

		if ( ! isset( $doc->documentElement->firstChild->childNodes ) ) {
			return $html;
		}

		$children = $doc->documentElement->firstChild->childNodes;

		if ( is_array( $insertions ) && ! empty( $insertions ) ) {
			foreach ( $children as $pindex => $child ) {
				$words = explode( ' ', wp_strip_all_tags( $child->nodeValue ) );

				foreach ( $insertions as $insert => $at ) {
					if ( $addflag ) {
						$wordcount -= $addflag;
						$addflag    = false;
						continue;
					}

					if ( $wordcount + count( $words ) >= $at ) {
						$frag = $doc->createDocumentFragment();
						$frag->appendXML( $insert );

						if ( $child->nextSibling ) {
							$child->parentNode->insertBefore( $frag, $child->nextSibling );
							unset( $insertions[ $insert ] );
							$childwords = explode( ' ', wp_strip_all_tags( $insert ) );
							$wordcount -= count( $childwords );
							$addflag    = count( $childwords );
							continue;
						}
					}
				}
				$wordcount += count( $words );
			}
			// Clean up the doctype, html, and body tags from our string
			$doc->removeChild( $doc->doctype );
			$return = str_replace( array( '<html><body>', '</body></html>' ), array( '', '' ), $doc->saveHTML() );
		}

		return $return;
	}

	/**
	 * Count words in a block of text, exclude html tags.
	 *
	 * @param string $text Text to count.
	 *
	 * @return integer
	 */
	private function count_words( $text ) {
		$text  = trim( wp_strip_all_tags( strip_shortcodes( $text ) ) );
		$words = explode( ' ', $text );

		return count( $words );
	}

	public function inject_ads( $the_content ) {
		if ( is_admin() || ! is_single() ) {
			return $the_content;
		}

		$initial_insert_at = 75;
		$repeat_after      = 250;
		$max_incontent_ads = 5;

		$wordcount = $this->count_words( $the_content );

		if ( $wordcount > 300 ) {
			$advertisement = '<div class="ione-ad">';
			$ad = new IOne_Ad( 'incontent1' );
			$advertisement .= $ad->get_html();
			$advertisement .= '</div>';
			$the_content    = $this->insert_after_paragraph(
				$the_content,
				array(
					$advertisement => $initial_insert_at,
				)
			);

			$remaining_words = $wordcount - $initial_insert_at;
			$repeat_x_times  = floor( $remaining_words / $repeat_after );

			for ( $i = 1; $i <= $repeat_x_times && $i <= $max_incontent_ads; $i ++ ) {
				$insert_at = $initial_insert_at + ( $repeat_after * $i );

				$ad_slot = 'incontent' . ( $i + 1 );

				$advertisement = '<div class="ione-ad">';
				$ad = new IOne_Ad( $ad_slot );
				$advertisement .= $ad->get_html();
				$advertisement .= '</div>';
				$the_content    = $this->insert_after_paragraph(
					$the_content,
					array(
						$advertisement => $insert_at,
					)
				);
			}
		}

		return $the_content;
	}
}
