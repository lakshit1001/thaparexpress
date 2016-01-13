app.controller('studentsCtrl', function ($scope, $modal, $filter, Data) {
    $scope.student = {};
    Data.get('students').then(function(data){
        $scope.students = data.data;
    });
    $scope.changeStudentstatus = function(student){
        student.status = (student.status=="Active" ? "Inactive" : "Active");
        Data.put("students/"+student.id,{status:student.status});
    };
    $scope.deleteStudent = function(student){
        if(confirm("Are you sure to remove the student")){
            Data.delete("students/"+student.id).then(function(result){
                $scope.students = _.without($scope.students, _.findWhere($scope.students, {id:student.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/studentEdit.html',
          controller: 'studentEditCtrl',
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
                p.phone = selectedObject.phone;
                p.eid = selectedObject.eid;
                p.fn = selectedObject.fn;
                p.mn = selectedObject.mn;
                p.class = selectedObject.class;
                p.cn = selectedObject.cn;
                p.bn = selectedObject.bn;
            }
        });
    };

 $scope.columns = [
                    {text:"ID",predicate:"id",sortable:true,dataType:"number"},
                    {text:"Name",predicate:"name",sortable:true},
                    {text:"E-mail ID",predicate:"eid",sortable:true},
                    {text:"Phone",predicate:"phone",sortable:true,dataType:"number"},
                    {text:"Father's Name",predicate:"fn",sortable:true},
                    {text:"Mother's Name",predicate:"mn",sortable:true},
                    {text:"Contact Number",predicate:"cn",sortable:true,dataType:"number"},
                    {text:"Class",predicate:"class",reverse:true,sortable:true,dataType:"number"},
                    {text:"Batch",predicate:"batch",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('studentEditCtrl', function ($scope, $modalInstance,Upload,$timeout, item, Data) {

  $scope.student = angular.copy(item);

  $scope.uploadPic = function(file) {
    console.log("Something is happening.");
    file.upload = Upload.upload({
      url: 'http://thaparexpress.com/superadmin/image_upload.php',
      method: 'POST',
      sendFieldsAs: 'form',
      fields: {name: $scope.event.id,type:"student"},
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
        $scope.title = (item.id > 0) ? 'Edit student' : 'Add student';
        $scope.buttonText = (item.id > 0) ? 'Update student' : 'Add New student';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.student);
        }
        $scope.saveStudent = function (student) {
            student.uid = $scope.uid;
            console.log(student);
            if(student.id > 0){
                Data.put('students/'+student.id, student).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(student);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('students', student).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(student);
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


app.controller('enquiryCtrl', function ($scope,Data) {

  $scope.package = {};
  $scope.enquire = function(){

  $scope.package.name = $scope.name;
  $scope.package.gender = $scope.gender;
  $scope.package.number = $scope.phone;
  $scope.package.email =  $scope.email;
  $scope.package.class = $scope.class;
  $scope.package.message = $scope.message;

  Data.post('enquiry',$scope.package).then(function(result){
    if(result.status != 'error'){
      alert("Inquiry Added!");
    } else {
      alert("Please try again");
    }
  });
  }
});
