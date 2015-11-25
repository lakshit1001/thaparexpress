
app.controller('event_updatesCtrl', function ($scope, $modal, $filter, Data) {
    $scope.event_update = {};
    Data.get('event_updates').then(function(data){
        $scope.event_updates= data.data;
    });
    
    $scope.deleteevents_update = function(events_update){
        if(confirm("Are you sure to remove the events_update")){
            Data.delete("event_updates/"+events_update.id).then(function(result){
                $scope.event_updates = _.without($scope.event_updates, _.findWhere($scope.event_updates, {id:events_update.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/event_updatesEdit.html',
          controller: 'event_updatesEditCtrl',
          size: size,
          resolve: {
            item: function () {
              return p;
            }
          }
        });
        modalInstance.result.then(function(selectedObject) {
            if(selectedObject.save == "insert"){
                $scope.event_updates.push(selectedObject);
                $scope.event_updates = $filter('orderBy')($scope.event_updates, 'id', 'reverse');
            }else if(selectedObject.save == "update"){
                p.name= selectedObject.name;
                p.category= selectedObject.category;
                p.email= selectedObject.email;
            }
        });
    };

 $scope.columns = [
                    {text:"ID",predicate:"id",sortable:true,dataType:"number"},
                    {text:"Title",predicate:"name",sortable:true},                    
                    {text:"Action",predicate:"",sortable:false}
                ];

});



    



app.controller('event_updatesEditCtrl', function ($scope, $modalInstance, item, Data) {

  $scope.event_updates = angular.copy(item);
  Data.get('society/'+$scope.societylogin).then(function(data){
          $scope.society= data.data;
          Data.get('events/'+$scope.society[0].id).then(function(data){
              $scope.events= data.data;
          });
      });

    
        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.id > 0) ? 'Edit event_updates' : 'Add event_updates';
        $scope.buttonText = (item.id > 0) ? 'Update event_updates' : 'Add New event_updates';
        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.event_updates);
        }
        $scope.saveevent_updates = function (event_updates) {
            Data.get('society/'+$scope.societylogin).then(function(data){
                $scope.society= data.data;
            
            event_updates.societyid=$scope.society[0].id;
            console.log(event_updates);
            });
            if(event_updates.id > 0){
                Data.put('event_updates/'+event_updates.id, event_updates).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(event_updates);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('event_updates', event_updates).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(event_updates);
                        x.save = 'insert';
                        x.id = result.data;
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }
        };
});