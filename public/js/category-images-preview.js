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

eval("// if (window.FileReader) {\n//     document.getElementById(\"images\").onchange = function () {\n//         let counter = -1,\n//             file;\n//\n//         $('.images-wrapper').html('');\n//\n//         let template = `<div class=\"col-sm-12 d-flex justify-content-center align-items-center\">\n//                                   <img src=\"__url__\" class=\"card-img-top\" style=\"max-width: 80%; margin: 0 auto; display: block;\">\n//                                 </div>`;\n//\n//         while (file = this.files[++counter]) {\n//             let reader = new FileReader();\n//             reader.onloadend = (function () {\n//                 return function () {\n//                     let img = template.replace('__url__', this.result);\n//                     $('.images-wrapper').append(img)\n//                 }\n//             })(file);\n//             reader.readAsDataURL(file);\n//         }\n//     }\n// }\n$(document).ready(function (e) {\n  $('#thumbnail').change(function () {\n    var reader = new FileReader();\n\n    reader.onload = function (e) {\n      $('#thumbnail-preview').attr('src', e.target.result);\n    };\n\n    reader.readAsDataURL(this.files[0]);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY2F0ZWdvcnktaW1hZ2VzLXByZXZpZXcuanM/NDBlZSJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsImUiLCJjaGFuZ2UiLCJyZWFkZXIiLCJGaWxlUmVhZGVyIiwib25sb2FkIiwiYXR0ciIsInRhcmdldCIsInJlc3VsdCIsInJlYWRBc0RhdGFVUkwiLCJmaWxlcyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFVBQVVDLENBQVYsRUFBYTtBQUMzQkgsRUFBQUEsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkksTUFBaEIsQ0FBdUIsWUFBWTtBQUMvQixRQUFJQyxNQUFNLEdBQUcsSUFBSUMsVUFBSixFQUFiOztBQUNBRCxJQUFBQSxNQUFNLENBQUNFLE1BQVAsR0FBZ0IsVUFBQ0osQ0FBRCxFQUFPO0FBQ25CSCxNQUFBQSxDQUFDLENBQUMsb0JBQUQsQ0FBRCxDQUF3QlEsSUFBeEIsQ0FBNkIsS0FBN0IsRUFBb0NMLENBQUMsQ0FBQ00sTUFBRixDQUFTQyxNQUE3QztBQUNILEtBRkQ7O0FBR0FMLElBQUFBLE1BQU0sQ0FBQ00sYUFBUCxDQUFxQixLQUFLQyxLQUFMLENBQVcsQ0FBWCxDQUFyQjtBQUNILEdBTkQ7QUFPSCxDQVJEIiwic291cmNlc0NvbnRlbnQiOlsiLy8gaWYgKHdpbmRvdy5GaWxlUmVhZGVyKSB7XG4vLyAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJpbWFnZXNcIikub25jaGFuZ2UgPSBmdW5jdGlvbiAoKSB7XG4vLyAgICAgICAgIGxldCBjb3VudGVyID0gLTEsXG4vLyAgICAgICAgICAgICBmaWxlO1xuLy9cbi8vICAgICAgICAgJCgnLmltYWdlcy13cmFwcGVyJykuaHRtbCgnJyk7XG4vL1xuLy8gICAgICAgICBsZXQgdGVtcGxhdGUgPSBgPGRpdiBjbGFzcz1cImNvbC1zbS0xMiBkLWZsZXgganVzdGlmeS1jb250ZW50LWNlbnRlciBhbGlnbi1pdGVtcy1jZW50ZXJcIj5cbi8vICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW1nIHNyYz1cIl9fdXJsX19cIiBjbGFzcz1cImNhcmQtaW1nLXRvcFwiIHN0eWxlPVwibWF4LXdpZHRoOiA4MCU7IG1hcmdpbjogMCBhdXRvOyBkaXNwbGF5OiBibG9jaztcIj5cbi8vICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+YDtcbi8vXG4vLyAgICAgICAgIHdoaWxlIChmaWxlID0gdGhpcy5maWxlc1srK2NvdW50ZXJdKSB7XG4vLyAgICAgICAgICAgICBsZXQgcmVhZGVyID0gbmV3IEZpbGVSZWFkZXIoKTtcbi8vICAgICAgICAgICAgIHJlYWRlci5vbmxvYWRlbmQgPSAoZnVuY3Rpb24gKCkge1xuLy8gICAgICAgICAgICAgICAgIHJldHVybiBmdW5jdGlvbiAoKSB7XG4vLyAgICAgICAgICAgICAgICAgICAgIGxldCBpbWcgPSB0ZW1wbGF0ZS5yZXBsYWNlKCdfX3VybF9fJywgdGhpcy5yZXN1bHQpO1xuLy8gICAgICAgICAgICAgICAgICAgICAkKCcuaW1hZ2VzLXdyYXBwZXInKS5hcHBlbmQoaW1nKVxuLy8gICAgICAgICAgICAgICAgIH1cbi8vICAgICAgICAgICAgIH0pKGZpbGUpO1xuLy8gICAgICAgICAgICAgcmVhZGVyLnJlYWRBc0RhdGFVUkwoZmlsZSk7XG4vLyAgICAgICAgIH1cbi8vICAgICB9XG4vLyB9XG5cbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uIChlKSB7XG4gICAgJCgnI3RodW1ibmFpbCcpLmNoYW5nZShmdW5jdGlvbiAoKSB7XG4gICAgICAgIGxldCByZWFkZXIgPSBuZXcgRmlsZVJlYWRlcigpO1xuICAgICAgICByZWFkZXIub25sb2FkID0gKGUpID0+IHtcbiAgICAgICAgICAgICQoJyN0aHVtYm5haWwtcHJldmlldycpLmF0dHIoJ3NyYycsIGUudGFyZ2V0LnJlc3VsdCk7XG4gICAgICAgIH1cbiAgICAgICAgcmVhZGVyLnJlYWRBc0RhdGFVUkwodGhpcy5maWxlc1swXSk7XG4gICAgfSk7XG59KTtcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvY2F0ZWdvcnktaW1hZ2VzLXByZXZpZXcuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/category-images-preview.js\n");

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