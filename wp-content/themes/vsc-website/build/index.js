/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/MailingListPopupForm.js":
/*!*********************************************!*\
  !*** ./src/modules/MailingListPopupForm.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class MailingListPopupForm {
  // 1. Describe and create/initiate our object
  constructor() {
    this.popupOverlay = document.getElementById('signup-overlay');
    this.openPopupButton = document.getElementById('mailing-list-button');
    this.footerButton = document.getElementById('footer-mailing-list-button');
    this.openPopupLink = document.querySelector('.mailing-list-link');
    this.closePopupButton = document.getElementById('close-button');
    this.events();
  }

  // 2. Add Events
  events() {
    if (this.openPopupButton != null) {
      this.openPopupButton.addEventListener("click", () => this.openPopup());
    }
    if (this.openPopupLink != null) {
      this.openPopupLink.addEventListener("click", () => this.openPopup());
    }
    this.footerButton.addEventListener("click", () => this.openPopup());
    this.closePopupButton.addEventListener("click", () => this.closePopup());
  }

  // 3. Add methods (function, action...)

  openPopup() {
    this.popupOverlay.style.display = 'block';
  }
  closePopup() {
    this.popupOverlay.style.display = "none";
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MailingListPopupForm);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_MailingListPopupForm__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/MailingListPopupForm */ "./src/modules/MailingListPopupForm.js");
// Our modules / classes


//Instantiate a new object using our modules/classes
const mailingListPopupForm = new _modules_MailingListPopupForm__WEBPACK_IMPORTED_MODULE_0__["default"]();
})();

/******/ })()
;
//# sourceMappingURL=index.js.map