
app.controller('teachersCtrl', function ($scope, $modal, $filter, Data) {
    $scope.student = {};
    Data.get('teachers').then(function(data){
        $scope.teachers= data.data;
    });
    
    $scope.deleteteacher = function(teacher){
        if(confirm("Are you sure to remove the teacher")){
            Data.delete("teachers/"+teacher.id).then(function(result){
                $scope.teachers = _.without($scope.teachers, _.findWhere($scope.teachers, {id:teacher.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/teacherEdit.html',
          controller: 'teachertEditCtrl',
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


app.controller('teachertEditCtrl', function ($scope, $modalInstance, item, Data) {

  $scope.teacher = angular.copy(item);

        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.id > 0) ? 'Edit teacher' : 'Add teacher';
        $scope.buttonText = (item.id > 0) ? 'Update teacher' : 'Add New teacher';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.teacher);
        }
        $scope.saveteacher = function (teacher) {
            teacher.uid = $scope.uid;
            console.log(teacher);
            if(teacher.id > 0){
                Data.put('teachers/'+teacher.id, teacher).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(teacher);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('teachers', teacher).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(teacher);
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