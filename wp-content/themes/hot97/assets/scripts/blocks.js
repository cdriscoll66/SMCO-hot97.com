/**
 * Add Styles to blocks
 *
 * @link https://www.billerickson.net/block-styles-in-gutenberg/
 */

 wp.domReady(() => {

  /**
   * Block Styles
   *
   * Add/Remove Block Styles
   */
  (function () {

    wp.blocks.unregisterBlockStyle('core/button', [
      'fill',
      'outline',
    ]);

    wp.blocks.registerBlockStyle('core/button', [
      {
        name: 'primary',
        label: 'Primary',
        isDefault: true
      },
      {
        name: 'secondary',
        label: 'Secondary',
        isDefault: false
      },
    ]);

    wp.blocks.registerBlockStyle('core/columns', [
      {
        name: 'default',
        label: 'Default',
        isDefault: true
      },
      {
        name: 'collapse-width',
        label: 'Collapse Width',
        isDefault: false
      },
    ]);

  })();

  /**
   * Blocks Allowed
   *
   * @see /config/blocks-allowed.php
   *
   * @TODO Repair blacklist exclusion for ACF blocks
   */
  // (function () {
  //   let whitelist = blocksAllowed && blocksAllowed.whitelist ? blocksAllowed.whitelist : null;
  //   let blacklist = blocksAllowed && blocksAllowed.blacklist ? blocksAllowed.blacklist : null;

  //   if (whitelist.length || blacklist.length) {
  //     wp.blocks.getBlockTypes().forEach(block => {

  //       if (whitelist.indexOf(block.name) === -1) {
  //         wp.blocks.unregisterBlockType(block.name);
  //       }

  //       if (blacklist.indexOf(block.name) !== -1) {
  //         wp.blocks.unregisterBlockType(block.name);
  //       }
  //     });
  //   }
  // })();
});
