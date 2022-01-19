/*!
  * Pipeline Bootstrap Theme
  * Copyright 2018-2020 Medium Rare (undefined)
  */
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('jquery'), require('autosize'), require('@shopify/draggable/lib/draggable'), require('@shopify/draggable/lib/plugins'), require('list.js'), require('flatpickr'), require('prismjs')) :
  typeof define === 'function' && define.amd ? define(['exports', 'jquery', 'autosize', '@shopify/draggable/lib/draggable', '@shopify/draggable/lib/plugins', 'list.js', 'flatpickr', 'prismjs'], factory) :
  (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.theme = {}, global.jQuery, global.autosize, global.Draggable, global.SwapAnimation, global.List, global.flatpickr, global.Prism));
}(this, (function (exports, jQuery, autosize, Draggable, SwapAnimation, List, flatpickr, Prism) { 'use strict';

  function _interopDefaultLegacy (e) { return e && typeof e === 'object' && 'default' in e ? e : { 'default': e }; }

  var jQuery__default = /*#__PURE__*/_interopDefaultLegacy(jQuery);
  var autosize__default = /*#__PURE__*/_interopDefaultLegacy(autosize);
  var Draggable__default = /*#__PURE__*/_interopDefaultLegacy(Draggable);
  var SwapAnimation__default = /*#__PURE__*/_interopDefaultLegacy(SwapAnimation);
  var List__default = /*#__PURE__*/_interopDefaultLegacy(List);
  var flatpickr__default = /*#__PURE__*/_interopDefaultLegacy(flatpickr);
  var Prism__default = /*#__PURE__*/_interopDefaultLegacy(Prism);

  //

  var mrUtil = function ($) {
    var VERSION = '1.2.0';
    var Tagname = {
      SCRIPT: 'script'
    };
    var Selector = {
      RECAPTCHA: '[data-recaptcha]'
    }; // Activate tooltips

    $('body').tooltip({
      selector: '[data-toggle="tooltip"]',
      container: 'body'
    }); // Activate popovers

    $('body').popover({
      selector: '[data-toggle="popover"]',
      container: 'body'
    }); // Activate toasts

    $('.toast').toast();
    var Util = {
      version: VERSION,
      selector: Selector,
      activateIframeSrc: function activateIframeSrc(iframe) {
        var $iframe = $(iframe);

        if ($iframe.attr('data-src')) {
          $iframe.attr('src', $iframe.attr('data-src'));
        }
      },
      idleIframeSrc: function idleIframeSrc(iframe) {
        var $iframe = $(iframe);
        $iframe.attr('data-src', $iframe.attr('src')).attr('src', '');
      },
      forEach: function forEach(array, callback, scope) {
        if (array) {
          if (array.length) {
            for (var i = 0; i < array.length; i += 1) {
              callback.call(scope, i, array[i]); // passes back stuff we need
            }
          } else if (array[0] || mrUtil.isElement(array)) {
            callback.call(scope, 0, array);
          }
        }
      },
      dedupArray: function dedupArray(arr) {
        return arr.reduce(function (p, c) {
          // create an identifying String from the object values
          var id = JSON.stringify(c); // if the JSON string is not found in the temp array
          // add the object to the output array
          // and add the key to the temp array

          if (p.temp.indexOf(id) === -1) {
            p.out.push(c);
            p.temp.push(id);
          }

          return p; // return the deduped array
        }, {
          temp: [],
          out: []
        }).out;
      },
      isElement: function isElement(obj) {
        return !!(obj && obj.nodeType === 1);
      },
      getFuncFromString: function getFuncFromString(funcName, context) {
        var findFunc = funcName || null; // if already a function, return

        if (typeof findFunc === 'function') return funcName; // if string, try to find function or method of object (of "obj.func" format)

        if (typeof findFunc === 'string') {
          if (!findFunc.length) return null;
          var target = context || window;
          var func = findFunc.split('.');

          while (func.length) {
            var ns = func.shift();
            if (typeof target[ns] === 'undefined') return null;
            target = target[ns];
          }

          if (typeof target === 'function') return target;
        } // return null if could not parse


        return null;
      },
      getScript: function getScript(source, callback) {
        var script = document.createElement(Tagname.SCRIPT);
        var prior = document.getElementsByTagName(Tagname.SCRIPT)[0];
        script.async = 1;
        script.defer = 1;

        script.onreadystatechange = function (_, isAbort) {
          if (isAbort || !script.readyState || /loaded|complete/.test(script.readyState)) {
            script.onload = null;
            script.onreadystatechange = null;
            script = undefined;

            if (!isAbort && callback && typeof callback === 'function') {
              callback();
            }
          }
        };

        script.onload = script.onreadystatechange;
        script.src = source;
        prior.parentNode.insertBefore(script, prior);
      },
      isIE: function isIE() {
        var ua = window.navigator.userAgent;
        var isIE = /MSIE|Trident/.test(ua);
        return isIE;
      }
    };
    return Util;
  }(jQuery__default['default']);

  //
  autosize__default['default'](document.querySelectorAll('.chat-module-bottom textarea')); // Scrolls the chat-module-body to the bottom

  (function ($) {
    $(window).on('load', function () {
      var lastChatItems = document.querySelectorAll('.media.chat-item:last-child');

      if (lastChatItems) {
        mrUtil.forEach(lastChatItems, function (index, item) {
          item.scrollIntoView();
        });
      }
    });
  })(jQuery__default['default']);

  //

  var mrAutoWidth = function ($) {
    /*
       Special Thanks to Lim Yuan Qing
       for autosize-input
        https://github.com/yuanqing/autosize-input
        The MIT License (MIT)
       Copyright (c) 2018 Lim Yuan Qing
       Permission is hereby granted, free of charge, to any person obtaining
       a copy of this software and associated documentation files (the "Software"),
       to deal in the Software without restriction, including without limitation
       the rights to use, copy, modify, merge, publish, distribute, sublicense,
       and/or sell copies of the Software, and to permit persons to whom the Software
       is furnished to do so, subject to the following conditions:
       The above copyright notice and this permission notice shall be
       included in all copies or substantial portions of the Software.
       THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
       EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
       OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
       NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS
       BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN
       ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
       CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
    */
    var AutoWidth = /*#__PURE__*/function () {
      function AutoWidth(element, options) {
        this.element = element;
        var elementStyle = window.getComputedStyle(this.element); // prettier-ignore

        this.elementCssText = "box-sizing:" + elementStyle.boxSizing + "\n                          ;border-left:" + elementStyle.borderLeftWidth + " solid red           \n                          ;border-right:" + elementStyle.borderRightWidth + " solid red\n                          ;font-family:" + elementStyle.fontFamily + "\n                          ;font-feature-settings:" + elementStyle.fontFeatureSettings + "\n                          ;font-kerning:" + elementStyle.fontKerning + "\n                          ;font-size:" + elementStyle.fontSize + "\n                          ;font-stretch:" + elementStyle.fontStretch + "\n                          ;font-style:" + elementStyle.fontStyle + "\n                          ;font-variant:" + elementStyle.fontVariant + "\n                          ;font-variant-caps:" + elementStyle.fontVariantCaps + "\n                          ;font-variant-ligatures:" + elementStyle.fontVariantLigatures + "\n                          ;font-variant-numeric:" + elementStyle.fontVariantNumeric + "\n                          ;font-weight:" + elementStyle.fontWeight + "\n                          ;letter-spacing:" + elementStyle.letterSpacing + "\n                          ;margin-left:" + elementStyle.marginLeft + "\n                          ;margin-right:" + elementStyle.marginRight + "\n                          ;padding-left:" + elementStyle.paddingLeft + "\n                          ;padding-right:" + elementStyle.paddingRight + "\n                          ;text-indent:" + elementStyle.textIndent + "\n                          ;text-transform:" + elementStyle.textTransform + ";";
        this.GHOST_ELEMENT_ID = '__autosizeInputGhost';
        element.addEventListener('input', AutoWidth.passWidth);
        element.addEventListener('keydown', AutoWidth.passWidth);
        element.addEventListener('cut', AutoWidth.passWidth);
        element.addEventListener('paste', AutoWidth.passWidth);
        this.extraPixels = options && options.extraPixels ? parseInt(options.extraPixels, 10) : 0;
        this.width = AutoWidth.setWidth(this); // Set `min-width` only if `options.minWidth` was set, and only if the initial
        // width is non-zero.

        if (options && options.minWidth && this.width !== '0px') {
          this.element.style.minWidth = this.width;
        }
      }

      AutoWidth.setWidth = function setWidth(input) {
        var string = input.element.value || input.element.getAttribute('placeholder') || ''; // Check if the `ghostElement` exists. If no, create it.

        var ghostElement = document.getElementById(input.GHOST_ELEMENT_ID) || input.createGhostElement(); // Copy all width-affecting styles to the `ghostElement`.

        ghostElement.style.cssText += input.elementCssText;
        ghostElement.innerHTML = AutoWidth.escapeSpecialCharacters(string); // Copy the width of `ghostElement` to `element`.

        var _window$getComputedSt = window.getComputedStyle(ghostElement),
            width = _window$getComputedSt.width;

        width = Math.ceil(width.replace('px', '')) + input.extraPixels;
        /* eslint-disable no-param-reassign */

        input.element.style.width = width + "px";
        return width;
      };

      AutoWidth.passWidth = function passWidth(evt) {
        var input = $(evt.target).data('autoWidth');
        AutoWidth.setWidth(input);
      };

      AutoWidth.mapSpecialCharacterToCharacterEntity = function mapSpecialCharacterToCharacterEntity(specialCharacter) {
        var characterEntities = {
          ' ': 'nbsp',
          '<': 'lt',
          '>': 'gt'
        };
        return "&" + characterEntities[specialCharacter] + ";";
      };

      AutoWidth.escapeSpecialCharacters = function escapeSpecialCharacters(string) {
        return string.replace(/\s/g, '&nbsp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
      } // Create `ghostElement`, with inline styles to hide it and ensure that the text is all
      // on a single line.
      ;

      var _proto = AutoWidth.prototype;

      _proto.createGhostElement = function createGhostElement() {
        var ghostElement = document.createElement('div');
        ghostElement.id = this.GHOST_ELEMENT_ID;
        ghostElement.style.cssText = 'display:inline-block;height:0;overflow:hidden;position:absolute;top:0;visibility:hidden;white-space:nowrap;';
        document.body.appendChild(ghostElement);
        return ghostElement;
      };

      return AutoWidth;
    }();

    $(document).ready(function () {
      var checklistItems = document.querySelectorAll('form.checklist .custom-checkbox div input');

      if (checklistItems) {
        mrUtil.forEach(checklistItems, function (index, item) {
          $(item).data('autoWidth', new AutoWidth(item, {
            extraPixels: 3
          }));
          item.addEventListener('keypress', function (evt) {
            if (evt.which === 13) {
              evt.preventDefault();
            }
          });
        });
      }
    });
    return AutoWidth;
  }(jQuery__default['default']);

  var mrChecklist = {
    sortableChecklists: new Draggable__default['default'].Sortable(document.querySelectorAll('form.checklist, .drop-to-delete'), {
      plugins: [SwapAnimation__default['default']],
      draggable: '.checklist > .row',
      handle: '.form-group > span > i'
    })
  };

  //

  window.Dropzone.autoDiscover = false;

  (function ($) {
    $(function () {
      var template = "<li class=\"list-group-item dz-preview dz-file-preview\">\n      <div class=\"media align-items-center dz-details\">\n        <ul class=\"avatars\">\n          <li>\n            <div class=\"avatar bg-primary dz-file-representation\">\n              <i class=\"material-icons\">attach_file</i>\n            </div>\n          </li>\n        </ul>\n        <div class=\"media-body d-flex justify-content-between align-items-center\">\n          <div class=\"dz-file-details\">\n            <span class=\"dz-filename\"><span data-dz-name></span></span<br>\n            <span class=\"text-small dz-size\" data-dz-size></span>\n          </div>\n          <img alt=\"Loader\" src=\"assets/img/loader.svg\" class=\"dz-loading\" />\n          <div class=\"dropdown\">\n            <button class=\"btn-options\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n              <i class=\"material-icons\">more_vert</i>\n            </button>\n            <div class=\"dropdown-menu dropdown-menu-right\">\n              <a class=\"dropdown-item text-danger\" href=\"#\" data-dz-remove>Delete</a>\n            </div>\n          </div>\n          <button class=\"btn btn-danger btn-sm dz-remove\" data-dz-remove>\n            Cancel\n          </button>\n        </div>\n      </div>\n      <div class=\"progress dz-progress\">\n        <div class=\"progress-bar dz-upload\" data-dz-uploadprogress></div>\n      </div>\n    </li>";
      template = document.querySelector('.dz-template') ? document.querySelector('.dz-template').innerHTML : template;
      $('.dropzone').dropzone({
        previewTemplate: template,
        thumbnailWidth: 320,
        thumbnailHeight: 320,
        thumbnailMethod: 'contain',
        previewsContainer: '.dropzone-previews'
      });
    });
  })(jQuery__default['default']);

  function _defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  function _createClass(Constructor, protoProps, staticProps) {
    if (protoProps) _defineProperties(Constructor.prototype, protoProps);
    if (staticProps) _defineProperties(Constructor, staticProps);
    return Constructor;
  }

  var mrFilterList = function ($) {
    /**
     * Check for List.js dependency
     * List.js - http://listjs.com
     */
    if (typeof List__default['default'] === 'undefined') {
      throw new Error('mrFilterList requires list.js (http://listjs.com)');
    }
    /**
     * ------------------------------------------------------------------------
     * Constants
     * ------------------------------------------------------------------------
     */


    var NAME = 'mrFilterList';
    var VERSION = '1.0.0';
    var DATA_KEY = 'mr.filterList';
    var EVENT_KEY = "." + DATA_KEY;
    var DATA_API_KEY = '.data-api';
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Event = {
      LOAD_DATA_API: "load" + EVENT_KEY + DATA_API_KEY
    };
    var Selector = {
      FILTER: '[data-filter-list]',
      DATA_ATTR: 'filter-list',
      DATA_ATTR_CAMEL: 'filterList',
      DATA_FILTER_BY: 'data-filter-by',
      DATA_FILTER_BY_CAMEL: 'filterBy',
      FILTER_INPUT: 'filter-list-input',
      FILTER_TEXT: 'filter-by-text'
    };
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

    var FilterList = /*#__PURE__*/function () {
      function FilterList(element) {
        // The current data-filter-list element
        this.element = element; // Get class of list elements to be used within this data-filter-list element

        var listData = element.dataset[Selector.DATA_ATTR_CAMEL]; // data-filter-by rules collected from filterable elements
        // to be passed to List.js

        this.valueNames = []; // List.js instances included in this filterList

        this.lists = []; // Find all matching list elements and initialise List.js on each

        this.initAllLists(listData); // Bind the search input to each list in the array of lists

        this.bindInputEvents();
      } // version getter


      var _proto = FilterList.prototype;

      _proto.initAllLists = function initAllLists(listData) {
        var _this = this;

        // Initialise each list matching the selector in data-filter-list attribute
        mrUtil.forEach(this.element.querySelectorAll("." + listData), function (index, listElement) {
          _this.initList(_this.element, listElement);
        });
      };

      _proto.initList = function initList(element, listElement) {
        var _this2 = this;

        // Each individual list needs a unique ID to be added
        // as a class as List.js identifies lists by class
        var listID = Selector.DATA_ATTR + "-" + new Date().getTime(); // Use the first child of the list and parse all data-filter-by attributes inside.
        // Pass to parseFilters to construct an array of valueNames appropriate for List.js

        var filterables = listElement.querySelectorAll("*:first-child [" + Selector.DATA_FILTER_BY + "]");
        mrUtil.forEach(filterables, function (index, filterElement) {
          // Parse the comma separated values in the data-filter-by attribute
          // on each filterable element
          _this2.parseFilters(listElement, filterElement, filterElement.dataset[Selector.DATA_FILTER_BY_CAMEL]);
        }); // De-duplicate the array by creating new set of stringified objects and
        // mapping back to parsed objects.
        // This is necessary because similar items in the list element could produce
        // the same rule in the valueNames array.

        this.valueNames = mrUtil.dedupArray(this.valueNames); // Add unique ID as class to the list so List.js can handle it individually

        listElement.classList.add(listID); // Set up the list instance using the List.js library

        var list = new List__default['default'](element, {
          valueNames: this.valueNames,
          listClass: listID
        }); // Add this list instance to the array associated with this filterList instance
        // as each filterList can have miltiple list instances connected to the
        // same filter-list-input

        this.lists.push(list);
      };

      _proto.parseFilters = function parseFilters(listElement, filterElement, filterBy) {
        var _this3 = this;

        // Get a jQuery instance of the list for easier class manipulation on multiple elements
        var $listElement = $(listElement);
        var filters = []; // Get array of filter-by instructions from the data-filter-by attribute

        try {
          filters = filterBy.split(',');
        } catch (err) {
          throw new Error("Cannot read comma separated data-filter-by attribute: \"\n          " + filterBy + "\" on element: \n          " + this.element);
        }

        filters.forEach(function (filter) {
          // Store appropriate rule for List.js in the valueNames array
          if (filter === 'text') {
            if (filterElement.className !== filterElement.nodeName + "-" + Selector.FILTER_TEXT) {
              _this3.valueNames.push(filterElement.className + " " + filterElement.nodeName + "-" + Selector.FILTER_TEXT);
            }

            $listElement.find(filterElement.nodeName.toLowerCase() + "[" + Selector.DATA_FILTER_BY + "*=\"text\"]") // Prepend element type to class on filterable element as List.js needs separate classes
            .addClass(filterElement.nodeName + "-" + Selector.FILTER_TEXT);
          } else if (filter.indexOf('data-') === 0) {
            $listElement.find("[" + Selector.DATA_FILTER_BY + "*=\"" + filter + "\"]").addClass("filter-by-" + filter);

            _this3.valueNames.push({
              name: "filter-by-" + filter,
              data: filter.replace('data-', '')
            });
          } else if (filterElement.getAttribute(filter)) {
            $listElement.find("[" + Selector.DATA_FILTER_BY + "*=\"" + filter + "\"]").addClass("filter-by-" + filter);

            _this3.valueNames.push({
              name: "filter-by-" + filter,
              attr: filter
            });
          }
        });
      };

      _proto.bindInputEvents = function bindInputEvents() {
        var filterInput = this.element.querySelector("." + Selector.FILTER_INPUT); // Store reference to data-filter-list element on the input itself

        $(filterInput).data(DATA_KEY, this);
        filterInput.addEventListener('keyup', this.searchLists, false);
        filterInput.addEventListener('paste', this.searchLists, false); // Handle submit to disable page reload

        filterInput.closest('form').addEventListener('submit', function (evt) {
          if (evt.preventDefault) ;
        });
      };

      _proto.searchLists = function searchLists(event) {
        // Retrieve the filterList object from the element
        var filterList = $(this).data(DATA_KEY); // Apply the currently searched term to the List.js instances in this filterList instance

        mrUtil.forEach(filterList.lists, function (index, list) {
          list.search(event.target.value);
        });
      };

      FilterList.jQueryInterface = function jQueryInterface() {
        return this.each(function jqEachFilterList() {
          var $element = $(this);
          var data = $element.data(DATA_KEY);

          if (!data) {
            data = new FilterList(this);
            $element.data(DATA_KEY, data);
          }
        });
      };

      _createClass(FilterList, null, [{
        key: "VERSION",
        get: function get() {
          return VERSION;
        }
      }]);

      return FilterList;
    }(); // END Class definition

    /**
     * ------------------------------------------------------------------------
     * Initialise by data attribute
     * ------------------------------------------------------------------------
     */


    $(window).on(Event.LOAD_DATA_API, function () {
      var filterLists = $.makeArray($(Selector.FILTER));
      /* eslint-disable no-plusplus */

      for (var i = filterLists.length; i--;) {
        var $list = $(filterLists[i]);
        FilterList.jQueryInterface.call($list, $list.data());
      }
    });
    /**
     * ------------------------------------------------------------------------
     * jQuery
     * ------------------------------------------------------------------------
     */

    /* eslint-disable no-param-reassign */

    $.fn[NAME] = FilterList.jQueryInterface;
    $.fn[NAME].Constructor = FilterList;

    $.fn[NAME].noConflict = function FilterListNoConflict() {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return FilterList.jQueryInterface;
    };
    /* eslint-enable no-param-reassign */


    return FilterList;
  }(jQuery__default['default']);

  var mrFlatpickr = function ($) {
    /**
     * Check for flatpickr dependency
     */
    if (typeof flatpickr__default['default'] === 'undefined') {
      throw new Error('mrFlatpickr requires flatpickr.js (https://github.com/flatpickr/flatpickr)');
    }
    /**
     * ------------------------------------------------------------------------
     * Constants
     * ------------------------------------------------------------------------
     */


    var NAME = 'mrFlatpickr';
    var VERSION = '1.0.0';
    var DATA_KEY = 'mr.flatpickr';
    var EVENT_KEY = "." + DATA_KEY;
    var DATA_API_KEY = '.data-api';
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Event = {
      LOAD_DATA_API: "load" + EVENT_KEY + DATA_API_KEY
    };
    var Selector = {
      FLATPICKR: '[data-flatpickr]'
    };
    /**
     * ------------------------------------------------------------------------
     * Class Definition
     * ------------------------------------------------------------------------
     */

    var Flatpickr = /*#__PURE__*/function () {
      function Flatpickr(element) {
        // The current flatpickr element
        this.element = element; // const $element = $(element);

        this.initflatpickr();
      } // getters


      var _proto = Flatpickr.prototype;

      _proto.initflatpickr = function initflatpickr() {
        var options = $(this.element).data();
        this.instance = flatpickr__default['default'](this.element, options);
      };

      Flatpickr.jQueryInterface = function jQueryInterface() {
        return this.each(function jqEachFlatpickr() {
          var $element = $(this);
          var data = $element.data(DATA_KEY);

          if (!data) {
            data = new Flatpickr(this);
            $element.data(DATA_KEY, data);
          }
        });
      };

      _createClass(Flatpickr, null, [{
        key: "VERSION",
        get: function get() {
          return VERSION;
        }
      }]);

      return Flatpickr;
    }(); // END Class definition

    /**
     * ------------------------------------------------------------------------
     * Initialise by data attribute
     * ------------------------------------------------------------------------
     */


    $(window).on(Event.LOAD_DATA_API, function () {
      var pickers = $.makeArray($(Selector.FLATPICKR));
      /* eslint-disable no-plusplus */

      for (var i = pickers.length; i--;) {
        var $flatpickr = $(pickers[i]);
        Flatpickr.jQueryInterface.call($flatpickr, $flatpickr.data());
      }
    });
    /**
     * ------------------------------------------------------------------------
     * jQuery
     * ------------------------------------------------------------------------
     */

    /* eslint-disable no-param-reassign */

    $.fn[NAME] = Flatpickr.jQueryInterface;
    $.fn[NAME].Constructor = Flatpickr;

    $.fn[NAME].noConflict = function flatpickrNoConflict() {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return Flatpickr.jQueryInterface;
    };
    /* eslint-enable no-param-reassign */


    return Flatpickr;
  }(jQuery__default['default']);

  //
  var mrKanban = {
    sortableKanbanLists: new Draggable__default['default'].Sortable(document.querySelectorAll('div.kanban-board'), {
      draggable: '.kanban-col:not(:last-child)',
      handle: '.card-list-header'
    }),
    sortableKanbanCards: new Draggable__default['default'].Sortable(document.querySelectorAll('.kanban-col .card-list-body'), {
      plugins: [SwapAnimation__default['default']],
      draggable: '.card-kanban',
      handle: '.card-kanban',
      appendTo: 'body'
    })
  };

  //
  Prism__default['default'].highlightAll();

  (function () {
    if (typeof $ === 'undefined') {
      throw new TypeError('Medium Rare JavaScript requires jQuery. jQuery must be included before theme.js.');
    }
  })();

  exports.mrFilterList = mrFilterList;
  exports.mrFlatpickr = mrFlatpickr;
  exports.mrKanban = mrKanban;
  exports.mrUtil = mrUtil;

  Object.defineProperty(exports, '__esModule', { value: true });

})));
//# sourceMappingURL=theme.js.map
