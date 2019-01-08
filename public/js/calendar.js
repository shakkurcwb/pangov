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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/calendar.js":
/*!**********************************!*\
  !*** ./resources/js/calendar.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var now = function now() {
  return moment().format('Y-MM-DD HH:mm:ss');
};

var format = function format() {
  var v = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : undefined;
  return moment(v).format('DD/MM HH:mm');
};

var date = function date() {
  var v = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : undefined;
  return moment(v);
};

var url = function url(link) {
  return "".concat(link);
};

var template = function template(e) {
  return "\n    <div class=\"fc-popover click\">\n\n        <div class=\"fc-header\">\n            ".concat(e.title, "\n            <button type=\"button\" class=\"cl\">\n                <i class=\"font-icon-close-2\"></i>\n            </button>\n        </div>\n\n        <div class=\"fc-body main-screen\">\n        \n            ") + (date(e.start) < date() && date(e.end) < date() ? "<div class=\"label label-danger\">Encerrado</div>" : '') + "\n\n            <p class=\"color-blue-grey\">In\xEDcio: ".concat(format(e.start), "<br>Encerramento: ").concat(format(e.end), "</p>\n            <p class=\"color-black\">").concat(e.title, "<br>") + (e.description ? "<small class=\"text-truncate\">".concat(e.description, " </small>") : '') + "</p>\n\n            <p class=\"\">\n                " + (e.location ? "<small>".concat(e.location, "</small>") : '') + "\n                <br>\n                " + (e.website ? "<small><a target=\"_blank\" href=\"".concat(e.website, "\">Website</a></small>") : '') + "\n            </p>\n\n            <ul class=\"actions\">\n                <li>\n                    <a target=\"_blank\" href=\"".concat(url("/events/".concat(e.id)), "\" class=\"btn btn-inline btn-primary\">Detalhes</a>\n                    ") + (_user_id == e.created_by ? "<a href=\"".concat(url("/events/".concat(e.id, "/edit")), "\" class=\"btn btn-inline btn-primary\">Editar</a>") : '') + "\n                </li>\n            </ul>\n\n        </div>\n\n    </div>\n";
};

$(document).ready(function () {
  var defaultDate = now();
  /* ==========================================================================
      Fullcalendar
      ========================================================================== */

  $('#calendar').fullCalendar({
    header: {
      left: 'prev, title, next',
      center: '',
      right: 'today, agendaDay, agendaWeek, month'
    },
    buttonIcons: {
      prev: 'font-icon font-icon-arrow-left',
      next: 'font-icon font-icon-arrow-right',
      prevYear: 'font-icon font-icon-arrow-left',
      nextYear: 'font-icon font-icon-arrow-right'
    },
    buttonText: {
      today: 'Hoje',
      agendaDay: 'Dia',
      agendaWeek: 'Semana',
      month: 'Mês'
    },
    defaultDate: defaultDate,
    editable: false,
    locale: 'pt-br',
    selectable: true,
    eventLimit: true,
    // allow "more" link when too many events
    events: _events,
    viewRender: function viewRender(view, element) {
      $('.fc-popover.click').remove();
    },
    eventClick: function eventClick(o, e, v) {
      var c = $(this); // Add and remove event border class

      if (!$(this).hasClass('event-clicked')) {
        $('.fc-event').removeClass('event-clicked');
        $(this).addClass('event-clicked');
      } // Add popover


      $('body').append(template(o)); // Position popover

      function posPopover() {
        $('.fc-popover.click').css({
          left: c.offset().left + c.outerWidth() / 2,
          top: c.offset().top + c.outerHeight()
        });
      }

      posPopover();
      $('.fc-scroller, .calendar-page-content, body').scroll(function () {
        posPopover();
      });
      $(window).resize(function () {
        posPopover();
      }); // Remove old popover

      if ($('.fc-popover.click').length > 1) {
        for (var i = 0; i < $('.fc-popover.click').length - 1; i++) {
          $('.fc-popover.click').eq(i).remove();
        }
      } // Close buttons


      $('.fc-popover.click .cl, .fc-popover.click .remove-popover').click(function () {
        $('.fc-popover.click').remove();
        $('.fc-event').removeClass('event-clicked');
      });
    }
  });
});
/* ==========================================================================
    Calendar page grid
    ========================================================================== */

(function ($, viewport) {
  $(document).ready(function () {
    if (viewport.is('>=lg')) {
      $('.calendar-page-content, .calendar-page-side').matchHeight();
    } // Execute code each time window size changes


    $(window).resize(viewport.changed(function () {
      if (viewport.is('<lg')) {
        $('.calendar-page-content, .calendar-page-side').matchHeight({
          remove: true
        });
      }
    }));
  });
})(jQuery, ResponsiveBootstrapToolkit);

/***/ }),

/***/ 2:
/*!****************************************!*\
  !*** multi ./resources/js/calendar.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\ana\Desktop\CODING\Panthera Lab\PanGov\resources\js\calendar.js */"./resources/js/calendar.js");


/***/ })

/******/ });