var app = angular.module("taskOrganizer", ["ngTable"]); //retorna una referencia a la aplicacion
    app.controller("listas", function($scope,NgTableParams){
        $scope.tasks = [];
        $scope.completed = [];
        $scope.newTaskName = '';

         $scope.pendientes = new NgTableParams({}, { dataset:  $scope.tasks});
         $scope.realizadas = new NgTableParams({}, { dataset:  $scope.completed});
        
        $scope.addTask = function() {
            var name = $scope.description;
            if (name && $scope.tasks.indexOf(name) == -1 && $scope.completed.indexOf(name)) {
                $scope.tasks.push({description:name});
                $scope.description = '';
                $scope.pendientes.reload();
                $scope.realizadas.reload();
            }
        };
        
        $scope.transferTo = function(index, tasks, completed) {
            completed.push(tasks[index]);
            tasks.splice(index, 1);
            $scope.pendientes.reload();
            $scope.realizadas.reload();
        }
        
         $scope.deleteTask =  function(index, obj) {
            obj.splice(index, 1);
            $scope.pendientes.reload();
            $scope.realizadas.reload();
        }
    });