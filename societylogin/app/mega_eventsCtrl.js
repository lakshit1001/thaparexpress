
app.controller('mega_eventsCtrl', function ($scope, $modal, $filter, Data) {
    $scope.mega_event = {};
    Data.get('society/'+$scope.societylogin).then(function(data){
        $scope.society= data.data;
        Data.get('mega_events/'+$scope.society[0].id).then(function(data){
            $scope.mega_events= data.data;
        });
    });
    
    $scope.deletemega_event = function(mega_event){
        if(confirm("Are you sure to remove the mega_event")){
            Data.delete("mega_events/"+mega_event.id).then(function(result){
                $scope.mega_events = _.without($scope.mega_events, _.findWhere($scope.mega_events, {id:mega_event.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/mega_eventEdit.html',
          controller: 'mega_eventEditCtrl',
          size: size,
          resolve: {
            item: function () {
              return p;
            }
          }
        });
        modalInstance.result.then(function(selectedObject) {
            if(selectedObject.save == "insert"){
                $scope.mega_events.push(selectedObject);
                $scope.mega_events = $filter('orderBy')($scope.mega_events, 'id', 'reverse');
            }else if(selectedObject.save == "update"){
                p.name= selectedObject.name;
                p.link= selectedObject.link;
                p.short_description= selectedObject.short_description;
                p.long_description= selectedObject.long_description;
            }
        });
    };

 $scope.columns = [
                    {text:"ID",predicate:"id",sortable:true,dataType:"number"},
                    {text:"Name",predicate:"name",sortable:true},
                   
                ];

});


app.controller('mega_eventEditCtrl', function ($scope, $modalInstance, item, Data) {

  $scope.mega_event = angular.copy(item);

        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.id > 0) ? 'Edit mega_event' : 'Add mega_event';
        $scope.buttonText = (item.id > 0) ? 'Update mega_event' : 'Add New mega_event';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.mega_event);
        }
        $scope.savemega_event = function (mega_event) {
            Data.get('society/'+$scope.societylogin).then(function(data){
                $scope.society= data.data;
            mega_event.societyid=$scope.society[0].id;           
            console.log(mega_event);
            if(mega_event.id > 0){
                Data.put('mega_events/'+mega_event.id, mega_event).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(mega_event);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('mega_events', mega_event).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(mega_event);
                        x.save = 'insert';
                        x.id = result.data;
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            console.log($scope.society);
            }
            });
        };
});