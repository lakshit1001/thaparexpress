
app.controller('event_updatesCtrl', function ($scope, $modal, $filter, Data) {
    $scope.student = {};
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
          templateUrl: 'partials/events_updateEdit.html',
          controller: 'events_updatetEditCtrl',
          size: size,
          resolve: {
            item: function () {
              return p;
            }
          }
        });
        modalInstance.result.then(function(selectedObject) {
            if(selectedObject.save == "insert"){
                $scope.students.push(selectedObject);
                $scope.students = $filter('orderBy')($scope.students, 'id', 'reverse');
            }else if(selectedObject.save == "update"){
                p.name= selectedObject.name;
                p.category= selectedObject.category;
                p.email= selectedObject.email;
            }
        });
    };

 $scope.columns = [
                    {text:"ID",predicate:"id",sortable:true,dataType:"number"},
                    {text:"Name",predicate:"name",sortable:true},
                    {text:"E-mail ID",predicate:"eid",sortable:true},
                    {text:"Category",predicate:"category",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('events_updatetEditCtrl', function ($scope, $modalInstance, item, Data) {

  $scope.events_update = angular.copy(item);

        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.id > 0) ? 'Edit events_update' : 'Add events_update';
        $scope.buttonText = (item.id > 0) ? 'Update events_update' : 'Add New events_update';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.events_update);
        }
        $scope.saveevents_update = function (events_update) {
            events_update.uid = $scope.uid;
            console.log(events_update);
            if(events_update.id > 0){
                Data.put('event_updates/'+events_update.id, events_update).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(events_update);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('event_updates', events_update).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(events_update);
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