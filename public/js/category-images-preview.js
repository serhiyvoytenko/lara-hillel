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

/***/ "./resources/js/category-images-preview.js":
/*!*************************************************!*\
  !*** ./resources/js/category-images-preview.js ***!
  \*************************************************/
/***/ (() => {

eval("// if (window.FileReader) {\n//     document.getElementById(\"images\").onchange = function () {\n//         let counter = -1,\n//             file;\n//\n//         $('.images-wrapper').html('');\n//\n//         let template = `<div class=\"col-sm-12 d-flex justify-content-center align-items-center\">\n//                                   <img src=\"__url__\" class=\"card-img-top\" style=\"max-width: 80%; margin: 0 auto; display: block;\">\n//                                 </div>`;\n//\n//         while (file = this.files[++counter]) {\n//             let reader = new FileReader();\n//             reader.onloadend = (function () {\n//                 return function () {\n//                     let img = template.replace('__url__', this.result);\n//                     $('.images-wrapper').append(img)\n//                 }\n//             })(file);\n//             reader.readAsDataURL(file);\n//         }\n//     }\n// }\n$(document).ready(function (e) {\n  $('#thumbnail').change(function () {\n    var reader = new FileReader();\n\n    reader.onload = function (e) {\n      $('#thumbnail-preview').attr('src', e.target.result);\n    };\n\n    reader.readAsDataURL(this.files[0]);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9sYXJhLWhpbGxlbC8uL3Jlc291cmNlcy9qcy9jYXRlZ29yeS1pbWFnZXMtcHJldmlldy5qcz80MGVlIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5IiwiZSIsImNoYW5nZSIsInJlYWRlciIsIkZpbGVSZWFkZXIiLCJvbmxvYWQiLCJhdHRyIiwidGFyZ2V0IiwicmVzdWx0IiwicmVhZEFzRGF0YVVSTCIsImZpbGVzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsVUFBVUMsQ0FBVixFQUFhO0FBQzNCSCxFQUFBQSxDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCSSxNQUFoQixDQUF1QixZQUFZO0FBQy9CLFFBQUlDLE1BQU0sR0FBRyxJQUFJQyxVQUFKLEVBQWI7O0FBQ0FELElBQUFBLE1BQU0sQ0FBQ0UsTUFBUCxHQUFnQixVQUFDSixDQUFELEVBQU87QUFDbkJILE1BQUFBLENBQUMsQ0FBQyxvQkFBRCxDQUFELENBQXdCUSxJQUF4QixDQUE2QixLQUE3QixFQUFvQ0wsQ0FBQyxDQUFDTSxNQUFGLENBQVNDLE1BQTdDO0FBQ0gsS0FGRDs7QUFHQUwsSUFBQUEsTUFBTSxDQUFDTSxhQUFQLENBQXFCLEtBQUtDLEtBQUwsQ0FBVyxDQUFYLENBQXJCO0FBQ0gsR0FORDtBQU9ILENBUkQiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBpZiAod2luZG93LkZpbGVSZWFkZXIpIHtcbi8vICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImltYWdlc1wiKS5vbmNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcbi8vICAgICAgICAgbGV0IGNvdW50ZXIgPSAtMSxcbi8vICAgICAgICAgICAgIGZpbGU7XG4vL1xuLy8gICAgICAgICAkKCcuaW1hZ2VzLXdyYXBwZXInKS5odG1sKCcnKTtcbi8vXG4vLyAgICAgICAgIGxldCB0ZW1wbGF0ZSA9IGA8ZGl2IGNsYXNzPVwiY29sLXNtLTEyIGQtZmxleCBqdXN0aWZ5LWNvbnRlbnQtY2VudGVyIGFsaWduLWl0ZW1zLWNlbnRlclwiPlxuLy8gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpbWcgc3JjPVwiX191cmxfX1wiIGNsYXNzPVwiY2FyZC1pbWctdG9wXCIgc3R5bGU9XCJtYXgtd2lkdGg6IDgwJTsgbWFyZ2luOiAwIGF1dG87IGRpc3BsYXk6IGJsb2NrO1wiPlxuLy8gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5gO1xuLy9cbi8vICAgICAgICAgd2hpbGUgKGZpbGUgPSB0aGlzLmZpbGVzWysrY291bnRlcl0pIHtcbi8vICAgICAgICAgICAgIGxldCByZWFkZXIgPSBuZXcgRmlsZVJlYWRlcigpO1xuLy8gICAgICAgICAgICAgcmVhZGVyLm9ubG9hZGVuZCA9IChmdW5jdGlvbiAoKSB7XG4vLyAgICAgICAgICAgICAgICAgcmV0dXJuIGZ1bmN0aW9uICgpIHtcbi8vICAgICAgICAgICAgICAgICAgICAgbGV0IGltZyA9IHRlbXBsYXRlLnJlcGxhY2UoJ19fdXJsX18nLCB0aGlzLnJlc3VsdCk7XG4vLyAgICAgICAgICAgICAgICAgICAgICQoJy5pbWFnZXMtd3JhcHBlcicpLmFwcGVuZChpbWcpXG4vLyAgICAgICAgICAgICAgICAgfVxuLy8gICAgICAgICAgICAgfSkoZmlsZSk7XG4vLyAgICAgICAgICAgICByZWFkZXIucmVhZEFzRGF0YVVSTChmaWxlKTtcbi8vICAgICAgICAgfVxuLy8gICAgIH1cbi8vIH1cblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKGUpIHtcbiAgICAkKCcjdGh1bWJuYWlsJykuY2hhbmdlKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0IHJlYWRlciA9IG5ldyBGaWxlUmVhZGVyKCk7XG4gICAgICAgIHJlYWRlci5vbmxvYWQgPSAoZSkgPT4ge1xuICAgICAgICAgICAgJCgnI3RodW1ibmFpbC1wcmV2aWV3JykuYXR0cignc3JjJywgZS50YXJnZXQucmVzdWx0KTtcbiAgICAgICAgfVxuICAgICAgICByZWFkZXIucmVhZEFzRGF0YVVSTCh0aGlzLmZpbGVzWzBdKTtcbiAgICB9KTtcbn0pO1xuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9jYXRlZ29yeS1pbWFnZXMtcHJldmlldy5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/category-images-preview.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/category-images-preview.js"]();
/******/ 	
/******/ })()
;