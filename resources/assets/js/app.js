var app = angular.module('desafioLaravel', ['ui.select', 'ngSanitize', 'ui.utils.masks', 'angularUtils.directives.dirPagination'], ['$interpolateProvider', function ($interpolateProvider) {

    /**
     * Interporlação necessária já que é o laravel utiliza a mesma nomenclatura de chaves no blade,
     * então com isso altero para <% %> a do angular
     */
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

    
}]);

/**
 * Filtro utilizado na lib ui
 */
app.filter('propsFilter', function () {
    return function (items, props) {
        var out = [];

        if (angular.isArray(items)) {
            var keys = Object.keys(props);

            items.forEach(function (item) {
                var itemMatches = false;

                for (var i = 0; i < keys.length; i++) {
                    var prop = keys[i];
                    var text = props[prop].toLowerCase();
                    if (item[prop].toString().toLowerCase().indexOf(text) !== -1) {
                        itemMatches = true;
                        break;
                    }
                }

                if (itemMatches) {
                    out.push(item);
                }
            });
        } else {
            // Let the output be the input untouched
            out = items;
        }

        return out;
    };
});

/**
 * Diretiva responsável por controlar o mode de file, seja multiplo ou não
 */
app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function (e) {
                scope.$apply(function () {
                    if (attrs.multiple === undefined) {
                        modelSetter(scope, element[0].files[0]);
                    } else {
                        modelSetter(scope, element[0].files);
                    }

                });

                if (attrs.multiple === undefined) {
                    var reader = new FileReader();
                    reader.onload = function (loadEvent) {
                        scope.$apply(function () {
                            scope.fileread = loadEvent.target.result;
                        });
                    };
                    reader.readAsDataURL(e.target.files[0]);
                } else {
                    scope.fileread = [];

                    angular.forEach(e.target.files, function (data, i) {
                        var reader = new FileReader();

                        reader.onload = function (loadEvent) {
                            scope.$apply(function () {
                                scope.fileread.push(loadEvent.target.result);
                            });
                        };

                        reader.readAsDataURL(e.target.files[i]);

                    });

                }

            });
        }
    };
}]);

