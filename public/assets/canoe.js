var app = angular.module('canoe', ['ngRoute'])

    .config(['$routeProvider',
        function config($routeProvider) {
            $routeProvider.when('/clients/:clientId', {
                template: '<client></client>'
            }).when('/', {
                template: '<home></home>'
            }).when('/cash-flows', {
                template: '<cashFlows></cashFlows>'
            }).otherwise('/');
        }
    ])

    .component('home', {
        templateUrl: '/templates/home.html',
        controller: function HomeController($http) {
            var $ctrl = this;

            $http.get('/api/clients').then(function (response) {
                $ctrl.clients = response.data;
            });
        }
    })

    .component('client', {
        templateUrl: '/templates/client.html',
        controller: function ClientsController($http, $route) {
            var $ctrl = this;
            var clientId = $route.current.params.clientId;

            $http.get('/api/clients/' + clientId + '/available-funds').then(function (response) {
                $ctrl.client = response.data.client;
                $ctrl.funds = response.data.funds;
                $ctrl.allowed = response.data.allowed;
            });
        }
    })

    .component('navbar', {
        templateUrl: '/templates/navbar.html',
        controller: function ClientsController($scope, $route) {
            var $ctrl = this;

            $ctrl.path = $route.current.originalPath;
            $scope.$on('$routeChangeSuccess', function(event) {
                $ctrl.path = $route.current.originalPath;
            });
        }
    })

    .component('cashflows', {
        templateUrl: '/templates/cashFlows.html',
        controller: function ClientsController($http) {
            var $ctrl = this;
            $ctrl.clients = [];
            $ctrl.investments = [];
            $ctrl.selectedClient = null;
            $ctrl.selectedType = null;
            $ctrl.selectedInvestment = null;
            $ctrl.currentValue = 0;
            $ctrl.updatedValue = 0;
            $ctrl.date = null;
            $ctrl.returnValue = null;

            $http.get('/api/clients/').then(function (response) {
                $ctrl.clients = response.data;
            });

            $ctrl.onClientChange = function () {
                $http.get('/api/clients/' + $ctrl.selectedClient.id).then(function (response) {
                    $ctrl.selectedClient = response.data
                });

                $ctrl.investments = [];
                $ctrl.selectedInvestment = null;
                $ctrl.onInvestmentChange();
            };

            $ctrl.onTypeChange = function () {
                $ctrl.investments = $ctrl.selectedClient.investments.filter(function (investment) {
                    return investment.fund.type === $ctrl.selectedType;
                })
            };

            $ctrl.onInvestmentChange = function () {
                if (!$ctrl.selectedInvestment) {
                    $ctrl.currentValue = 0;
                    $ctrl.updatedValue = 0;
                    return;
                }

                $http.get('/api/investments/' + $ctrl.selectedInvestment.id).then(function (response) {
                    $ctrl.selectedInvestment = response.data;

                    $ctrl.currentValue = calculateValue($ctrl.selectedInvestment.amount, $ctrl.selectedInvestment.cash_flows);
                });
            };

            $ctrl.calcUpdatedValue = function () {
                var cashFlows = $ctrl.selectedInvestment.cash_flows.map(function (cashFlow) {
                    return cashFlow;
                });

                cashFlows.push({'return': ($ctrl.returnValue / 100)});

                $ctrl.updatedValue = calculateValue($ctrl.selectedInvestment.amount, cashFlows);
            };

            function calculateValue(amount, cashFlows) {
                return cashFlows.reduce(function (acc, cashFlow) {
                    acc = (1 + cashFlow['return']) * acc;
                    return acc;
                }, amount);
            }

            $ctrl.storeCashFlow = function () {

                if(!$ctrl.date){
                    alert('Error: date is required');
                    return
                }

                if(!$ctrl.returnValue){
                    alert('Error: value is required');
                    return;
                }

                $http({
                    url: '/api/cash-flows/',
                    method: 'POST',
                    data: {
                        investment_id: $ctrl.selectedInvestment.id,
                        date: $ctrl.date,
                        return: $ctrl.returnValue
                    }
                }).then(function (response) {
                    alert('Cash Flow Updated');
                    console.log(response.data);
                });
            }
        }
    });