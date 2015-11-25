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


// students
$app->get('/students', function() {
    global $db;
    $rows = $db->select("students","id,name,rollnum,year,branch,hostel,gender,email,mobile",array());
    echoResponse(200, $rows);
});

$app->post('/students', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("students", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Student added successfully.";
    echoResponse(200, $rows);
});

$app->put('/students/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("students", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Student information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/students/:id', function($id) {
    global $db;
    $rows = $db->delete("students", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Student removed successfully.";
    echoResponse(200, $rows);
});
// societies
$app->get('/societies', function() {
    global $db;
    $rows = $db->select("societies","id,name,email,category",array());
    echoResponse(200, $rows);
});

$app->post('/societies', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("societies", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Society added successfully.";
    echoResponse(200, $rows);
});

$app->put('/societies/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("societies", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Society information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/societies/:id', function($id) {
    global $db;
    $rows = $db->delete("societies", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Society removed successfully.";
    echoResponse(200, $rows);
});
// societies_members
$app->get('/societies_members', function() {
    global $db;
    $rows = $db->select("societies_members","id,name,position,email,phone",array());
    echoResponse(200, $rows);
});

$app->post('/societies_members', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("societies_members", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Member added successfully.";
    echoResponse(200, $rows);
});

$app->put('/societies_members/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("societies_members", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Member information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/societies_members/:id', function($id) {
    global $db;
    $rows = $db->delete("societies_members", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Member removed successfully.";
    echoResponse(200, $rows);
});
// mega_events
$app->get('/mega_events', function() {
    global $db;
    $rows = $db->select("mega_events","id,name,societyid,image,short_description,long_description,link",array());
    echoResponse(200, $rows);
});

$app->post('/mega_events', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("mega_events", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Event added successfully.";
    echoResponse(200, $rows);
});

$app->put('/mega_events/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("mega_events", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Event information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/mega_events/:id', function($id) {
    global $db;
    $rows = $db->delete("mega_events", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Event removed successfully.";
    echoResponse(200, $rows);
});
// events
$app->get('/events', function() {
    global $db;
    $rows = $db->select("events","id,name,description,venue,date,time,cost,societyid,short_description,image",array());
    echoResponse(200, $rows);
});

$app->post('/events', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("events", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Event added successfully.";
    echoResponse(200, $rows);
});

$app->put('/events/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("events", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Event information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/events/:id', function($id) {
    global $db;
    $rows = $db->delete("events", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Event removed successfully.";
    echoResponse(200, $rows);
});
// event_updates
$app->get('/event_updates', function() {
    global $db;
    $rows = $db->select("event_updates","id,title,message,color,timestamp",array());
    echoResponse(200, $rows);
});

$app->post('/event_updates', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("event_updates", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Update added successfully.";
    echoResponse(200, $rows);
});

$app->put('/event_updates/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("event_updates", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Update information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/event_updates/:id', function($id) {
    global $db;
    $rows = $db->delete("event_updates", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Update removed successfully.";
    echoResponse(200, $rows);
});
// blog
$app->get('/blogs', function() {
    global $db;
    $rows = $db->select("blogs","id,name,description,image,email,username,password,blogger_name",array());
    echoResponse(200, $rows);
});

$app->post('/blogs', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("blogs", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Blog added successfully.";
    echoResponse(200, $rows);
});

$app->put('/blogs/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("blogs", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Blog information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/blogs/:id', function($id) {
    global $db;
    $rows = $db->delete("blogs", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Blog removed successfully.";
    echoResponse(200, $rows);
});
// blog_posts
$app->get('/blog_posts', function() {
    global $db;
    $rows = $db->select("blog_posts","id,name,content,image,blogid,timer",array());
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
// albums
$app->get('/albums', function() {
    global $db;
    $rows = $db->select("albums","id,caption,image,name,venue,title",array());
    echoResponse(200, $rows);
});

$app->post('/albums', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("albums", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Album added successfully.";
    echoResponse(200, $rows);
});

$app->put('/albums/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("albums", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Album information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/albums/:id', function($id) {
    global $db;
    $rows = $db->delete("albums", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Album removed successfully.";
    echoResponse(200, $rows);
});
// pictures
$app->get('/pictures', function() {
    global $db;
    $rows = $db->select("pictures","id,title,album_id,caption,image",array());
    echoResponse(200, $rows);
});

$app->post('/pictures', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("pictures", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Pictures added successfully.";
    echoResponse(200, $rows);
});

$app->put('/pictures/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("pictures", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Pictures information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/pictures/:id', function($id) {
    global $db;
    $rows = $db->delete("pictures", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Pictures removed successfully.";
    echoResponse(200, $rows);
});
// store_items
$app->get('/store_items', function() {
    global $db;
    $rows = $db->select("store_items","id,name,price,status,userid,timer",array());
    echoResponse(200, $rows);
});

$app->post('/store_items', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("store_items", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Item added successfully.";
    echoResponse(200, $rows);
});

$app->put('/store_items/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("store_items", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Item information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/store_items/:id', function($id) {
    global $db;
    $rows = $db->delete("store_items", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Item removed successfully.";
    echoResponse(200, $rows);
});

// teachers
$app->get('/teachers', function() {
    global $db;
    $rows = $db->select("teachers","id,name,email,department,gender,mobile,password,username",array());
    echoResponse(200, $rows);
});

$app->post('/teachers', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('name');
    global $db;
    $rows = $db->insert("teachers", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Teacher added successfully.";
    echoResponse(200, $rows);
});

$app->put('/teachers/:id', function($id) use ($app) {
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("teachers", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Teacher information updated successfully.";
    echoResponse(200, $rows);
});

$app->delete('/teachers/:id', function($id) {
    global $db;
    $rows = $db->delete("teachers", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Teacher removed successfully.";
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
