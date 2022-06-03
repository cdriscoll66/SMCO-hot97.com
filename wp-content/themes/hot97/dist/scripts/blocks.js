/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/scripts/blocks.js":
/*!**********************************!*\
  !*** ./assets/scripts/blocks.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/**\n * Add Styles to blocks\n *\n * @link https://www.billerickson.net/block-styles-in-gutenberg/\n */\nwp.domReady(function () {\n  /**\n   * Block Styles\n   *\n   * Add/Remove Block Styles\n   */\n  (function () {\n    wp.blocks.unregisterBlockStyle('core/button', ['fill', 'outline']);\n    wp.blocks.registerBlockStyle('core/button', [{\n      name: 'primary',\n      label: 'Primary',\n      isDefault: true\n    }, {\n      name: 'secondary',\n      label: 'Secondary',\n      isDefault: false\n    }]);\n    wp.blocks.registerBlockStyle('core/columns', [{\n      name: 'default',\n      label: 'Default',\n      isDefault: true\n    }, {\n      name: 'collapse-width',\n      label: 'Collapse Width',\n      isDefault: false\n    }]);\n  })();\n  /**\n   * Blocks Allowed\n   *\n   * @see /config/blocks-allowed.php\n   *\n   * @TODO Repair blacklist exclusion for ACF blocks\n   */\n  // (function () {\n  //   let whitelist = blocksAllowed && blocksAllowed.whitelist ? blocksAllowed.whitelist : null;\n  //   let blacklist = blocksAllowed && blocksAllowed.blacklist ? blocksAllowed.blacklist : null;\n  //   if (whitelist.length || blacklist.length) {\n  //     wp.blocks.getBlockTypes().forEach(block => {\n  //       if (whitelist.indexOf(block.name) === -1) {\n  //         wp.blocks.unregisterBlockType(block.name);\n  //       }\n  //       if (blacklist.indexOf(block.name) !== -1) {\n  //         wp.blocks.unregisterBlockType(block.name);\n  //       }\n  //     });\n  //   }\n  // })();\n\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvc2NyaXB0cy9ibG9ja3MuanM/ZmVhZiJdLCJuYW1lcyI6WyJ3cCIsImRvbVJlYWR5IiwiYmxvY2tzIiwidW5yZWdpc3RlckJsb2NrU3R5bGUiLCJyZWdpc3RlckJsb2NrU3R5bGUiLCJuYW1lIiwibGFiZWwiLCJpc0RlZmF1bHQiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQ0EsRUFBRSxDQUFDQyxRQUFILENBQVksWUFBTTtBQUVqQjtBQUNGO0FBQ0E7QUFDQTtBQUNBO0FBQ0UsR0FBQyxZQUFZO0FBRVhELE1BQUUsQ0FBQ0UsTUFBSCxDQUFVQyxvQkFBVixDQUErQixhQUEvQixFQUE4QyxDQUM1QyxNQUQ0QyxFQUU1QyxTQUY0QyxDQUE5QztBQUtBSCxNQUFFLENBQUNFLE1BQUgsQ0FBVUUsa0JBQVYsQ0FBNkIsYUFBN0IsRUFBNEMsQ0FDMUM7QUFDRUMsVUFBSSxFQUFFLFNBRFI7QUFFRUMsV0FBSyxFQUFFLFNBRlQ7QUFHRUMsZUFBUyxFQUFFO0FBSGIsS0FEMEMsRUFNMUM7QUFDRUYsVUFBSSxFQUFFLFdBRFI7QUFFRUMsV0FBSyxFQUFFLFdBRlQ7QUFHRUMsZUFBUyxFQUFFO0FBSGIsS0FOMEMsQ0FBNUM7QUFhQVAsTUFBRSxDQUFDRSxNQUFILENBQVVFLGtCQUFWLENBQTZCLGNBQTdCLEVBQTZDLENBQzNDO0FBQ0VDLFVBQUksRUFBRSxTQURSO0FBRUVDLFdBQUssRUFBRSxTQUZUO0FBR0VDLGVBQVMsRUFBRTtBQUhiLEtBRDJDLEVBTTNDO0FBQ0VGLFVBQUksRUFBRSxnQkFEUjtBQUVFQyxXQUFLLEVBQUUsZ0JBRlQ7QUFHRUMsZUFBUyxFQUFFO0FBSGIsS0FOMkMsQ0FBN0M7QUFhRCxHQWpDRDtBQW1DQTtBQUNGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNFO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFFQTtBQUNBO0FBQ0E7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBQ0QsQ0FsRUEiLCJmaWxlIjoiLi9hc3NldHMvc2NyaXB0cy9ibG9ja3MuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIEFkZCBTdHlsZXMgdG8gYmxvY2tzXG4gKlxuICogQGxpbmsgaHR0cHM6Ly93d3cuYmlsbGVyaWNrc29uLm5ldC9ibG9jay1zdHlsZXMtaW4tZ3V0ZW5iZXJnL1xuICovXG5cbiB3cC5kb21SZWFkeSgoKSA9PiB7XG5cbiAgLyoqXG4gICAqIEJsb2NrIFN0eWxlc1xuICAgKlxuICAgKiBBZGQvUmVtb3ZlIEJsb2NrIFN0eWxlc1xuICAgKi9cbiAgKGZ1bmN0aW9uICgpIHtcblxuICAgIHdwLmJsb2Nrcy51bnJlZ2lzdGVyQmxvY2tTdHlsZSgnY29yZS9idXR0b24nLCBbXG4gICAgICAnZmlsbCcsXG4gICAgICAnb3V0bGluZScsXG4gICAgXSk7XG5cbiAgICB3cC5ibG9ja3MucmVnaXN0ZXJCbG9ja1N0eWxlKCdjb3JlL2J1dHRvbicsIFtcbiAgICAgIHtcbiAgICAgICAgbmFtZTogJ3ByaW1hcnknLFxuICAgICAgICBsYWJlbDogJ1ByaW1hcnknLFxuICAgICAgICBpc0RlZmF1bHQ6IHRydWVcbiAgICAgIH0sXG4gICAgICB7XG4gICAgICAgIG5hbWU6ICdzZWNvbmRhcnknLFxuICAgICAgICBsYWJlbDogJ1NlY29uZGFyeScsXG4gICAgICAgIGlzRGVmYXVsdDogZmFsc2VcbiAgICAgIH0sXG4gICAgXSk7XG5cbiAgICB3cC5ibG9ja3MucmVnaXN0ZXJCbG9ja1N0eWxlKCdjb3JlL2NvbHVtbnMnLCBbXG4gICAgICB7XG4gICAgICAgIG5hbWU6ICdkZWZhdWx0JyxcbiAgICAgICAgbGFiZWw6ICdEZWZhdWx0JyxcbiAgICAgICAgaXNEZWZhdWx0OiB0cnVlXG4gICAgICB9LFxuICAgICAge1xuICAgICAgICBuYW1lOiAnY29sbGFwc2Utd2lkdGgnLFxuICAgICAgICBsYWJlbDogJ0NvbGxhcHNlIFdpZHRoJyxcbiAgICAgICAgaXNEZWZhdWx0OiBmYWxzZVxuICAgICAgfSxcbiAgICBdKTtcblxuICB9KSgpO1xuXG4gIC8qKlxuICAgKiBCbG9ja3MgQWxsb3dlZFxuICAgKlxuICAgKiBAc2VlIC9jb25maWcvYmxvY2tzLWFsbG93ZWQucGhwXG4gICAqXG4gICAqIEBUT0RPIFJlcGFpciBibGFja2xpc3QgZXhjbHVzaW9uIGZvciBBQ0YgYmxvY2tzXG4gICAqL1xuICAvLyAoZnVuY3Rpb24gKCkge1xuICAvLyAgIGxldCB3aGl0ZWxpc3QgPSBibG9ja3NBbGxvd2VkICYmIGJsb2Nrc0FsbG93ZWQud2hpdGVsaXN0ID8gYmxvY2tzQWxsb3dlZC53aGl0ZWxpc3QgOiBudWxsO1xuICAvLyAgIGxldCBibGFja2xpc3QgPSBibG9ja3NBbGxvd2VkICYmIGJsb2Nrc0FsbG93ZWQuYmxhY2tsaXN0ID8gYmxvY2tzQWxsb3dlZC5ibGFja2xpc3QgOiBudWxsO1xuXG4gIC8vICAgaWYgKHdoaXRlbGlzdC5sZW5ndGggfHwgYmxhY2tsaXN0Lmxlbmd0aCkge1xuICAvLyAgICAgd3AuYmxvY2tzLmdldEJsb2NrVHlwZXMoKS5mb3JFYWNoKGJsb2NrID0+IHtcblxuICAvLyAgICAgICBpZiAod2hpdGVsaXN0LmluZGV4T2YoYmxvY2submFtZSkgPT09IC0xKSB7XG4gIC8vICAgICAgICAgd3AuYmxvY2tzLnVucmVnaXN0ZXJCbG9ja1R5cGUoYmxvY2submFtZSk7XG4gIC8vICAgICAgIH1cblxuICAvLyAgICAgICBpZiAoYmxhY2tsaXN0LmluZGV4T2YoYmxvY2submFtZSkgIT09IC0xKSB7XG4gIC8vICAgICAgICAgd3AuYmxvY2tzLnVucmVnaXN0ZXJCbG9ja1R5cGUoYmxvY2submFtZSk7XG4gIC8vICAgICAgIH1cbiAgLy8gICAgIH0pO1xuICAvLyAgIH1cbiAgLy8gfSkoKTtcbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./assets/scripts/blocks.js\n");

/***/ }),

/***/ "./assets/styles/admin.scss":
/*!**********************************!*\
  !*** ./assets/styles/admin.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FkbWluLnNjc3M/YmJjOCJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSIsImZpbGUiOiIuL2Fzc2V0cy9zdHlsZXMvYWRtaW4uc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./assets/styles/admin.scss\n");

/***/ }),

/***/ "./assets/styles/editor.scss":
/*!***********************************!*\
  !*** ./assets/styles/editor.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2VkaXRvci5zY3NzPzg0NDkiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUEiLCJmaWxlIjoiLi9hc3NldHMvc3R5bGVzL2VkaXRvci5zY3NzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gcmVtb3ZlZCBieSBleHRyYWN0LXRleHQtd2VicGFjay1wbHVnaW4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./assets/styles/editor.scss\n");

/***/ }),

/***/ "./assets/styles/login.scss":
/*!**********************************!*\
  !*** ./assets/styles/login.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2xvZ2luLnNjc3M/NzUxNCJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSIsImZpbGUiOiIuL2Fzc2V0cy9zdHlsZXMvbG9naW4uc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./assets/styles/login.scss\n");

/***/ }),

/***/ "./assets/styles/print.scss":
/*!**********************************!*\
  !*** ./assets/styles/print.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL3ByaW50LnNjc3M/MjU2NSJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSIsImZpbGUiOiIuL2Fzc2V0cy9zdHlsZXMvcHJpbnQuc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./assets/styles/print.scss\n");

/***/ }),

/***/ "./assets/styles/theme.scss":
/*!**********************************!*\
  !*** ./assets/styles/theme.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL3RoZW1lLnNjc3M/YjBkYSJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSIsImZpbGUiOiIuL2Fzc2V0cy9zdHlsZXMvdGhlbWUuc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./assets/styles/theme.scss\n");

/***/ }),

/***/ 0:
/*!********************************************************************************************************************************************************************************!*\
  !*** multi ./assets/scripts/blocks.js ./assets/styles/admin.scss ./assets/styles/editor.scss ./assets/styles/login.scss ./assets/styles/print.scss ./assets/styles/theme.scss ***!
  \********************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /app/wp-content/themes/hot97/assets/scripts/blocks.js */"./assets/scripts/blocks.js");
__webpack_require__(/*! /app/wp-content/themes/hot97/assets/styles/admin.scss */"./assets/styles/admin.scss");
__webpack_require__(/*! /app/wp-content/themes/hot97/assets/styles/editor.scss */"./assets/styles/editor.scss");
__webpack_require__(/*! /app/wp-content/themes/hot97/assets/styles/login.scss */"./assets/styles/login.scss");
__webpack_require__(/*! /app/wp-content/themes/hot97/assets/styles/print.scss */"./assets/styles/print.scss");
module.exports = __webpack_require__(/*! /app/wp-content/themes/hot97/assets/styles/theme.scss */"./assets/styles/theme.scss");


/***/ })

/******/ });