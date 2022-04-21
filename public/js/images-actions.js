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

eval("$(function () {\n  $.ajaxSetup({\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    }\n  });\n  $(document).on('click', '.remove-product-image', function (e) {\n    e.preventDefault(); // console.log('success');\n\n    var $btn = $(this);\n    $.ajax({\n      url: $btn.data('route'),\n      type: 'DELETE',\n      dataType: 'json',\n      success: function success(data) {\n        $btn.parent().remove();\n        console.log('Success: ', data);\n      },\n      error: function error(data) {\n        console.log('Error: ', data);\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9sYXJhLWhpbGxlbC8uL3Jlc291cmNlcy9qcy9pbWFnZXMtYWN0aW9ucy5qcz8zMDJkIl0sIm5hbWVzIjpbIiQiLCJhamF4U2V0dXAiLCJoZWFkZXJzIiwiYXR0ciIsImRvY3VtZW50Iiwib24iLCJlIiwicHJldmVudERlZmF1bHQiLCIkYnRuIiwiYWpheCIsInVybCIsImRhdGEiLCJ0eXBlIiwiZGF0YVR5cGUiLCJzdWNjZXNzIiwicGFyZW50IiwicmVtb3ZlIiwiY29uc29sZSIsImxvZyIsImVycm9yIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDLFlBQVk7QUFFVkEsRUFBQUEsQ0FBQyxDQUFDQyxTQUFGLENBQVk7QUFDUkMsSUFBQUEsT0FBTyxFQUFFO0FBQ0wsc0JBQWdCRixDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QkcsSUFBN0IsQ0FBa0MsU0FBbEM7QUFEWDtBQURELEdBQVo7QUFNQUgsRUFBQUEsQ0FBQyxDQUFDSSxRQUFELENBQUQsQ0FBWUMsRUFBWixDQUFlLE9BQWYsRUFBd0IsdUJBQXhCLEVBQWlELFVBQVVDLENBQVYsRUFBYTtBQUMxREEsSUFBQUEsQ0FBQyxDQUFDQyxjQUFGLEdBRDBELENBRTFEOztBQUNBLFFBQUlDLElBQUksR0FBR1IsQ0FBQyxDQUFDLElBQUQsQ0FBWjtBQUVBQSxJQUFBQSxDQUFDLENBQUNTLElBQUYsQ0FBTztBQUNIQyxNQUFBQSxHQUFHLEVBQUVGLElBQUksQ0FBQ0csSUFBTCxDQUFVLE9BQVYsQ0FERjtBQUVIQyxNQUFBQSxJQUFJLEVBQUUsUUFGSDtBQUdIQyxNQUFBQSxRQUFRLEVBQUUsTUFIUDtBQUlIQyxNQUFBQSxPQUFPLEVBQUUsaUJBQVVILElBQVYsRUFBZ0I7QUFDckJILFFBQUFBLElBQUksQ0FBQ08sTUFBTCxHQUFjQyxNQUFkO0FBQ0FDLFFBQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZLFdBQVosRUFBeUJQLElBQXpCO0FBQ0gsT0FQRTtBQVFIUSxNQUFBQSxLQUFLLEVBQUUsZUFBVVIsSUFBVixFQUFnQjtBQUNuQk0sUUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVksU0FBWixFQUF1QlAsSUFBdkI7QUFDSDtBQVZFLEtBQVA7QUFZSCxHQWpCRDtBQWtCSCxDQTFCQSxDQUFEIiwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbiAoKSB7XG5cbiAgICAkLmFqYXhTZXR1cCh7XG4gICAgICAgIGhlYWRlcnM6IHtcbiAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXG4gICAgICAgIH1cbiAgICB9KTtcblxuICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsICcucmVtb3ZlLXByb2R1Y3QtaW1hZ2UnLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIC8vIGNvbnNvbGUubG9nKCdzdWNjZXNzJyk7XG4gICAgICAgIGxldCAkYnRuID0gJCh0aGlzKTtcblxuICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgdXJsOiAkYnRuLmRhdGEoJ3JvdXRlJyksXG4gICAgICAgICAgICB0eXBlOiAnREVMRVRFJyxcbiAgICAgICAgICAgIGRhdGFUeXBlOiAnanNvbicsXG4gICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgICRidG4ucGFyZW50KCkucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ1N1Y2Nlc3M6ICcsIGRhdGEpO1xuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIGVycm9yOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCdFcnJvcjogJywgZGF0YSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgIH0pXG59KTtcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvaW1hZ2VzLWFjdGlvbnMuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/images-actions.js\n");

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