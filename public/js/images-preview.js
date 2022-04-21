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

/***/ "./resources/js/images-preview.js":
/*!****************************************!*\
  !*** ./resources/js/images-preview.js ***!
  \****************************************/
/***/ (() => {

eval("if (window.FileReader) {\n  document.getElementById(\"images\").onchange = function () {\n    var counter = -1,\n        file;\n    $('.images-wrapper').html('');\n    var template = \"<div class=\\\"col-sm-12 d-flex justify-content-center align-items-center\\\">\\n                                  <img src=\\\"__url__\\\" class=\\\"card-img-top\\\" style=\\\"max-width: 80%; margin: 0 auto; display: block;\\\">\\n                                </div>\";\n\n    while (file = this.files[++counter]) {\n      var reader = new FileReader();\n\n      reader.onloadend = function () {\n        return function () {\n          var img = template.replace('__url__', this.result);\n          $('.images-wrapper').append(img);\n        };\n      }(file);\n\n      reader.readAsDataURL(file);\n    }\n  };\n}\n\n$(document).ready(function (e) {\n  $('#thumbnail').change(function () {\n    var reader = new FileReader();\n\n    reader.onload = function (e) {\n      $('#thumbnail-preview').attr('src', e.target.result);\n    };\n\n    reader.readAsDataURL(this.files[0]);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9sYXJhLWhpbGxlbC8uL3Jlc291cmNlcy9qcy9pbWFnZXMtcHJldmlldy5qcz9hNDA4Il0sIm5hbWVzIjpbIndpbmRvdyIsIkZpbGVSZWFkZXIiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwib25jaGFuZ2UiLCJjb3VudGVyIiwiZmlsZSIsIiQiLCJodG1sIiwidGVtcGxhdGUiLCJmaWxlcyIsInJlYWRlciIsIm9ubG9hZGVuZCIsImltZyIsInJlcGxhY2UiLCJyZXN1bHQiLCJhcHBlbmQiLCJyZWFkQXNEYXRhVVJMIiwicmVhZHkiLCJlIiwiY2hhbmdlIiwib25sb2FkIiwiYXR0ciIsInRhcmdldCJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBSUEsTUFBTSxDQUFDQyxVQUFYLEVBQXVCO0FBQ25CQyxFQUFBQSxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsUUFBeEIsRUFBa0NDLFFBQWxDLEdBQTZDLFlBQVk7QUFDckQsUUFBSUMsT0FBTyxHQUFHLENBQUMsQ0FBZjtBQUFBLFFBQ0lDLElBREo7QUFHQUMsSUFBQUEsQ0FBQyxDQUFDLGlCQUFELENBQUQsQ0FBcUJDLElBQXJCLENBQTBCLEVBQTFCO0FBRUEsUUFBSUMsUUFBUSxpUUFBWjs7QUFJQSxXQUFPSCxJQUFJLEdBQUcsS0FBS0ksS0FBTCxDQUFXLEVBQUVMLE9BQWIsQ0FBZCxFQUFxQztBQUNqQyxVQUFJTSxNQUFNLEdBQUcsSUFBSVYsVUFBSixFQUFiOztBQUNBVSxNQUFBQSxNQUFNLENBQUNDLFNBQVAsR0FBb0IsWUFBWTtBQUM1QixlQUFPLFlBQVk7QUFDZixjQUFJQyxHQUFHLEdBQUdKLFFBQVEsQ0FBQ0ssT0FBVCxDQUFpQixTQUFqQixFQUE0QixLQUFLQyxNQUFqQyxDQUFWO0FBQ0FSLFVBQUFBLENBQUMsQ0FBQyxpQkFBRCxDQUFELENBQXFCUyxNQUFyQixDQUE0QkgsR0FBNUI7QUFDSCxTQUhEO0FBSUgsT0FMa0IsQ0FLaEJQLElBTGdCLENBQW5COztBQU1BSyxNQUFBQSxNQUFNLENBQUNNLGFBQVAsQ0FBcUJYLElBQXJCO0FBQ0g7QUFDSixHQXBCRDtBQXFCSDs7QUFFREMsQ0FBQyxDQUFDTCxRQUFELENBQUQsQ0FBWWdCLEtBQVosQ0FBa0IsVUFBVUMsQ0FBVixFQUFhO0FBQzNCWixFQUFBQSxDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCYSxNQUFoQixDQUF1QixZQUFZO0FBQy9CLFFBQUlULE1BQU0sR0FBRyxJQUFJVixVQUFKLEVBQWI7O0FBQ0FVLElBQUFBLE1BQU0sQ0FBQ1UsTUFBUCxHQUFnQixVQUFDRixDQUFELEVBQU87QUFDbkJaLE1BQUFBLENBQUMsQ0FBQyxvQkFBRCxDQUFELENBQXdCZSxJQUF4QixDQUE2QixLQUE3QixFQUFvQ0gsQ0FBQyxDQUFDSSxNQUFGLENBQVNSLE1BQTdDO0FBQ0gsS0FGRDs7QUFHQUosSUFBQUEsTUFBTSxDQUFDTSxhQUFQLENBQXFCLEtBQUtQLEtBQUwsQ0FBVyxDQUFYLENBQXJCO0FBQ0gsR0FORDtBQU9ILENBUkQiLCJzb3VyY2VzQ29udGVudCI6WyJpZiAod2luZG93LkZpbGVSZWFkZXIpIHtcbiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImltYWdlc1wiKS5vbmNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0IGNvdW50ZXIgPSAtMSxcbiAgICAgICAgICAgIGZpbGU7XG5cbiAgICAgICAgJCgnLmltYWdlcy13cmFwcGVyJykuaHRtbCgnJyk7XG5cbiAgICAgICAgbGV0IHRlbXBsYXRlID0gYDxkaXYgY2xhc3M9XCJjb2wtc20tMTIgZC1mbGV4IGp1c3RpZnktY29udGVudC1jZW50ZXIgYWxpZ24taXRlbXMtY2VudGVyXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGltZyBzcmM9XCJfX3VybF9fXCIgY2xhc3M9XCJjYXJkLWltZy10b3BcIiBzdHlsZT1cIm1heC13aWR0aDogODAlOyBtYXJnaW46IDAgYXV0bzsgZGlzcGxheTogYmxvY2s7XCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PmA7XG5cbiAgICAgICAgd2hpbGUgKGZpbGUgPSB0aGlzLmZpbGVzWysrY291bnRlcl0pIHtcbiAgICAgICAgICAgIGxldCByZWFkZXIgPSBuZXcgRmlsZVJlYWRlcigpO1xuICAgICAgICAgICAgcmVhZGVyLm9ubG9hZGVuZCA9IChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGltZyA9IHRlbXBsYXRlLnJlcGxhY2UoJ19fdXJsX18nLCB0aGlzLnJlc3VsdCk7XG4gICAgICAgICAgICAgICAgICAgICQoJy5pbWFnZXMtd3JhcHBlcicpLmFwcGVuZChpbWcpXG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSkoZmlsZSk7XG4gICAgICAgICAgICByZWFkZXIucmVhZEFzRGF0YVVSTChmaWxlKTtcbiAgICAgICAgfVxuICAgIH1cbn1cblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKGUpIHtcbiAgICAkKCcjdGh1bWJuYWlsJykuY2hhbmdlKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0IHJlYWRlciA9IG5ldyBGaWxlUmVhZGVyKCk7XG4gICAgICAgIHJlYWRlci5vbmxvYWQgPSAoZSkgPT4ge1xuICAgICAgICAgICAgJCgnI3RodW1ibmFpbC1wcmV2aWV3JykuYXR0cignc3JjJywgZS50YXJnZXQucmVzdWx0KTtcbiAgICAgICAgfVxuICAgICAgICByZWFkZXIucmVhZEFzRGF0YVVSTCh0aGlzLmZpbGVzWzBdKTtcbiAgICB9KTtcbn0pO1xuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9pbWFnZXMtcHJldmlldy5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/images-preview.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/images-preview.js"]();
/******/ 	
/******/ })()
;