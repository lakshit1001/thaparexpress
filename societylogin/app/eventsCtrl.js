app.controller('eventsCtrl', function ($scope, $modal, $filter, Data) {
    $scope.event = {};
    Data.get('society/'+$scope.societylogin).then(function(data){
        $scope.society= data.data;
        Data.get('events/'+$scope.society[0].id).then(function(data){
            $scope.events= data.data;
        });
    });
    
    $scope.deleteevent = function(event){
        if(confirm("Are you sure to remove the event")){
            Data.delete("events/"+event.id).then(function(result){
                $scope.events = _.without($scope.events, _.findWhere($scope.events, {id:event.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/eventEdit.html',
          controller: 'eventtEditCtrl',
          size: size,
          resolve: {
            item: function () {
              return p;
            }
          }
        });
        modalInstance.result.then(function(selectedObject) {
            if(selectedObject.save == "insert"){
                $scope.events.push(selectedObject);
                $scope.events = $filter('orderBy')($scope.events, 'id', 'reverse');
            }else if(selectedObject.save == "update"){
                p.name= selectedObject.name;
                p.venue= selectedObject.venue;
                p.cost= selectedObject.cost;
                p.time= selectedObject.time;
            }
        });
    };
    $scope.view = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/event_participants.html',
          controller: 'event_participantsCtrl',
          size: size,
          resolve: {
            item: function () {
              return p;
            }
          }
        });
    };

 $scope.columns = [
                    {text:"ID",predicate:"id",sortable:true,dataType:"number"},
                    {text:"Name",predicate:"name",sortable:true},
                    {text:"venue",predicate:"venue",sortable:true},
                    {text:"time",predicate:"time",sortable:true},
                    {text:"cost",predicate:"cost",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('eventtEditCtrl', function ($scope, $modalInstance,Upload,$timeout, item, Data) {

  $scope.event = angular.copy(item);

  $scope.uploadPic = function(file) {
    console.log("Something is happening.");
    file.upload = Upload.upload({
      url: 'http://thaparexpress.com/superadmin/image_upload.php',
      method: 'POST',
      sendFieldsAs: 'form',
      fields: {name: $scope.event.id,type:"event"},
      file: file
    });

    file.upload.then(function (response) {
      $timeout(function () {
        file.result = response.data;
      });
    }, function (response) {
      if (response.status > 0)
        $scope.errorMsg = response.status + ': ' + response.data;
      });

      file.upload.progress(function (evt) {
        // Math.min is to fix IE which reports 200% sometimes
        file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
      });
    };

        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.id > 0) ? 'Edit event' : 'Add event';
        $scope.buttonText = (item.id > 0) ? 'Update event' : 'Add New event';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.event);
        }
        $scope.saveevent = function (event) {
            Data.get('society/'+$scope.societylogin).then(function(data){
                $scope.society= data.data;
            event.societyid=$scope.society[0].id;           
            console.log(event);
            if(event.id > 0){
                Data.put('events/'+event.id, event).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(event);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('events', event).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(event);
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

app.controller('event_participantsCtrl', function ($scope, $modalInstance,Upload,$timeout, item, Data) {
  $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
   $scope.event = angular.copy(item);

 Data.get('participants/'+$scope.event.id).then(function(data){
    $scope.participants= data.data;
    });

});