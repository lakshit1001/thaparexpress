<?php
require '.././libs/Slim/Slim.php';
require_once 'dbHelper.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app = \Slim\Slim::getInstance();
$db = new dbHelper();

/**
 * Database Helper Function templates
 */
/*
select(table name, where clause as associative array)
insert(table name, data as associative array, mandatory column names as array)
update(table name, column names as associative array, where clause as associative array, required columns as array)
delete(table name, where clause as array)
*/

// blog
$app->get('/blogs/:id', function($id) {
    global $db;
    $rows = $db->select("blogs","id,name,description,image,email,username,password,blogger_name",array('email'=>$id));
    echoResponse(200, $rows);
});
// blog_posts
$app->get('/blog_posts/:id', function($id) {
    global $db;
    $rows = $db->select("blog_posts","id,name,content,image,blogid,timer",array('blogid'=>$id));
    echoResponse(200, $rows);
});

$app->post('/blog_posts', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("blog_posts", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Blog post added successfully.";
    echoResponse(200, $rows);
});

$app->put('/blog_posts/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("blog_posts", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Blog post information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/blog_posts/:id', function($id) {
    global $db;
    $rows = $db->delete("blog_posts", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Blog post removed successfully.";
    echoResponse(200, $rows);
});
function echoResponse($status_code, $response) {
    global $app;
    $app->status($status_code);
    $app->contentType('application/json');
    echo json_encode($response,JSON_NUMERIC_CHECK);
}

$app->run();
?>
