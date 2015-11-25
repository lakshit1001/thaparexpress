
app.controller('societies_membersCtrl', function ($scope, $modal, $filter, Data) {
    $scope.student = {};
    Data.get('societies_members').then(function(data){
        $scope.societies_members= data.data;
    });
    
    $scope.deletesocieties_member = function(societies_member){
        if(confirm("Are you sure to remove the societies_member")){
            Data.delete("societies_members/"+societies_member.id).then(function(result){
                $scope.societies_members = _.without($scope.societies_members, _.findWhere($scope.societies_members, {id:societies_member.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/societies_memberEdit.html',
          controller: 'societies_membertEditCtrl',
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


app.controller('societies_membertEditCtrl', function ($scope, $modalInstance, item, Data) {

  $scope.societies_member = angular.copy(item);

        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.id > 0) ? 'Edit societies_member' : 'Add societies_member';
        $scope.buttonText = (item.id > 0) ? 'Update societies_member' : 'Add New societies_member';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.societies_member);
        }
        $scope.savesocieties_member = function (societies_member) {
            societies_member.uid = $scope.uid;
            console.log(societies_member);
            if(societies_member.id > 0){
                Data.put('societies_members/'+societies_member.id, societies_member).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(societies_member);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('societies_members', societies_member).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(societies_member);
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