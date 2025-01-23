/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************!*\
  !*** ./src/js/admin/index.js ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

/**
 * @package: 	GlimFSE WooCommerce Extension
 * @author: 	Bican Marian Valeriu
 * @license:	https://www.glimfse.com/
 * @version:	1.0.0
 */

const {
  i18n: {
    __,
    sprintf
  },
  hooks: {
    addFilter
  },
  components: {
    Placeholder,
    DropdownMenu,
    RangeControl,
    ToggleControl,
    Card,
    CardHeader,
    CardBody,
    Dashicon,
    Spinner,
    Button
  },
  element: {
    useState
  }
} = wp;
addFilter('glimfse.admin.tabs.plugins', 'glimfse/woocommerce/admin/panel', optionsPanel);
function optionsPanel(panels) {
  return [...panels, {
    name: 'glim-woocommerce',
    title: __('WooCommerce', 'glim-woocommerce'),
    render: props => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Options, props)
  }];
}
const Options = props => {
  const {
    settings,
    saveSettings,
    isRequesting,
    createNotice
  } = props;
  if (isRequesting || !settings) {
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Placeholder, {
      icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Spinner, null),
      label: __('Loading', 'glim-woocommerce'),
      instructions: __('Please wait, loading settings...', 'glim-woocommerce')
    });
  }
  const [loading, setLoading] = useState(null);
  const apiOptions = (({
    woocommerce
  }) => woocommerce)(settings);
  const [formData, setFormData] = useState(apiOptions);
  const handleNotice = (message = '') => {
    setLoading(false);
    if (!message) {
      message = __('Settings saved.', 'glim-woocommerce');
    }
    return createNotice('success', message);
  };
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "grid",
    style: {
      '--glim--columns': 2
    }
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "g-col-1"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Card, {
    className: "border shadow-none"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(CardHeader, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("h5", {
    className: "text-uppercase fw-medium m-0"
  }, __('Optimization', 'glim-woocommerce'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(CardBody, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      style: {
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'space-between'
      }
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, __('Remove legacy CSS?', 'glim-woocommerce')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(DropdownMenu, {
      label: __('More Information', 'glim-woocommerce'),
      icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Dashicon, {
        icon: "info",
        style: {
          color: 'var(--glim--header--color)'
        }
      }),
      toggleProps: {
        style: {
          height: 'initial',
          minWidth: 'initial',
          padding: 0
        }
      },
      popoverProps: {
        focusOnMount: 'container',
        position: 'bottom',
        noArrow: false
      }
    }, () => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
      style: {
        minWidth: 250,
        margin: 0
      }
    }, __('These styles primarily cater to legacy themes, whereas WooCommerce blocks now have their own styles.', 'glim-woocommerce'))))),
    help: sprintf(__('Default WooCommerce style will be %s.', 'glim-woocommerce'), !formData?.remove_style ? __('loaded', 'glim-woocommerce') : __('removed', 'glim-woocommerce')),
    checked: formData?.remove_style,
    onChange: value => setFormData({
      ...formData,
      remove_style: value
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Replace Select2 CSS?', 'glim-woocommerce'),
    help: __('Replace Select2 stylesheet with an optimized version for our theme.', 'glim-woocommerce'),
    checked: formData?.replace_select2_style,
    onChange: value => setFormData({
      ...formData,
      replace_select2_style: value
    })
  })))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "g-col-1"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Card, {
    className: "border shadow-none"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(CardHeader, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("h5", {
    className: "text-uppercase fw-medium m-0"
  }, __('Functionality', 'glim-woocommerce'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(CardBody, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      style: {
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'space-between'
      }
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, __('Enable product price extras?', 'glim-woocommerce')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(DropdownMenu, {
      label: __('More Information', 'glim-woocommerce'),
      icon: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Dashicon, {
        icon: "info",
        style: {
          color: 'var(--glim--header--color)'
        }
      }),
      toggleProps: {
        style: {
          height: 'initial',
          minWidth: 'initial',
          padding: 0
        }
      },
      popoverProps: {
        focusOnMount: 'container',
        position: 'bottom',
        noArrow: false
      }
    }, () => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
      style: {
        minWidth: 250,
        margin: 0
      }
    }, __('A new field has been introduced in the product administration page for both normal and variation products.', 'glim-woocommerce'))))),
    help: __('Enhance the Product Price block by integrating a tooltip that showcases the recommended price set by the producer.', 'glim-woocommerce'),
    checked: formData?.product_price_extra,
    onChange: value => setFormData({
      ...formData,
      product_price_extra: value
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Enable product rating extras?', 'glim-woocommerce'),
    help: __('Enhance the Product Rating block(s) by incorporating enhanced and visually captivating rating information.', 'glim-woocommerce'),
    checked: formData?.product_rating_extra,
    onChange: value => setFormData({
      ...formData,
      product_rating_extra: value
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
    label: __('Enable customer account extras?', 'glim-woocommerce'),
    help: __('Enhance the Customer Account block by adding a dropdown with WooCommerce\'s account page endpoints.', 'glim-woocommerce'),
    checked: formData?.customer_account_extra,
    onChange: value => setFormData({
      ...formData,
      customer_account_extra: value
    })
  }))))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("hr", {
    style: {
      margin: '20px 0'
    }
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Button, {
    className: "button",
    isPrimary: true,
    isLarge: true,
    icon: loading && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Spinner, null),
    onClick: () => {
      setLoading(true);
      saveSettings({
        woocommerce: formData
      }, () => handleNotice());
    },
    disabled: loading
  }, loading ? '' : __('Save', 'glimfse')));
};
})();

/******/ })()
;
//# sourceMappingURL=admin.js.map