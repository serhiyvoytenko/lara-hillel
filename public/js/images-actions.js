/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/images-actions.js":
/*!****************************************!*\
  !*** ./resources/js/images-actions.js ***!
  \****************************************/
/***/ (() => {

eval("$(function () {\n  $.ajaxSetup({\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    }\n  });\n  $(document).on('click', '.remove-product-image', function (e) {\n    e.preventDefault(); // console.log('success');\n\n    var $btn = $(this);\n    $.ajax({\n      url: $btn.data('route'),\n      type: 'DELETE',\n      dataType: 'json',\n      success: function success(data) {\n        $btn.parent().remove();\n        console.log('Success: ', data);\n      },\n      error: function error(data) {\n        console.log('Error: ', data);\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvaW1hZ2VzLWFjdGlvbnMuanM/MzAyZCJdLCJuYW1lcyI6WyIkIiwiYWpheFNldHVwIiwiaGVhZGVycyIsImF0dHIiLCJkb2N1bWVudCIsIm9uIiwiZSIsInByZXZlbnREZWZhdWx0IiwiJGJ0biIsImFqYXgiLCJ1cmwiLCJkYXRhIiwidHlwZSIsImRhdGFUeXBlIiwic3VjY2VzcyIsInBhcmVudCIsInJlbW92ZSIsImNvbnNvbGUiLCJsb2ciLCJlcnJvciJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxZQUFZO0FBRVZBLEVBQUFBLENBQUMsQ0FBQ0MsU0FBRixDQUFZO0FBQ1JDLElBQUFBLE9BQU8sRUFBRTtBQUNMLHNCQUFnQkYsQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJHLElBQTdCLENBQWtDLFNBQWxDO0FBRFg7QUFERCxHQUFaO0FBTUFILEVBQUFBLENBQUMsQ0FBQ0ksUUFBRCxDQUFELENBQVlDLEVBQVosQ0FBZSxPQUFmLEVBQXdCLHVCQUF4QixFQUFpRCxVQUFVQyxDQUFWLEVBQWE7QUFDMURBLElBQUFBLENBQUMsQ0FBQ0MsY0FBRixHQUQwRCxDQUUxRDs7QUFDQSxRQUFJQyxJQUFJLEdBQUdSLENBQUMsQ0FBQyxJQUFELENBQVo7QUFFQUEsSUFBQUEsQ0FBQyxDQUFDUyxJQUFGLENBQU87QUFDSEMsTUFBQUEsR0FBRyxFQUFFRixJQUFJLENBQUNHLElBQUwsQ0FBVSxPQUFWLENBREY7QUFFSEMsTUFBQUEsSUFBSSxFQUFFLFFBRkg7QUFHSEMsTUFBQUEsUUFBUSxFQUFFLE1BSFA7QUFJSEMsTUFBQUEsT0FBTyxFQUFFLGlCQUFVSCxJQUFWLEVBQWdCO0FBQ3JCSCxRQUFBQSxJQUFJLENBQUNPLE1BQUwsR0FBY0MsTUFBZDtBQUNBQyxRQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWSxXQUFaLEVBQXlCUCxJQUF6QjtBQUNILE9BUEU7QUFRSFEsTUFBQUEsS0FBSyxFQUFFLGVBQVVSLElBQVYsRUFBZ0I7QUFDbkJNLFFBQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZLFNBQVosRUFBdUJQLElBQXZCO0FBQ0g7QUFWRSxLQUFQO0FBWUgsR0FqQkQ7QUFrQkgsQ0ExQkEsQ0FBRCIsInNvdXJjZXNDb250ZW50IjpbIiQoZnVuY3Rpb24gKCkge1xuXG4gICAgJC5hamF4U2V0dXAoe1xuICAgICAgICBoZWFkZXJzOiB7XG4gICAgICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCAnLnJlbW92ZS1wcm9kdWN0LWltYWdlJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAvLyBjb25zb2xlLmxvZygnc3VjY2VzcycpO1xuICAgICAgICBsZXQgJGJ0biA9ICQodGhpcyk7XG5cbiAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgIHVybDogJGJ0bi5kYXRhKCdyb3V0ZScpLFxuICAgICAgICAgICAgdHlwZTogJ0RFTEVURScsXG4gICAgICAgICAgICBkYXRhVHlwZTogJ2pzb24nLFxuICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICAgICAkYnRuLnBhcmVudCgpLnJlbW92ZSgpO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCdTdWNjZXNzOiAnLCBkYXRhKTtcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBlcnJvcjogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnRXJyb3I6ICcsIGRhdGEpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9KVxufSk7XG4iXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2ltYWdlcy1hY3Rpb25zLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/images-actions.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/images-actions.js"]();
/******/ 	
/******/ })()
;