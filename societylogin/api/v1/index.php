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


// society
$app->get('/society/:email', function($email) {
    global $db;
    $rows = $db->select("societies","id,name,email,category,description,short_description",array('email' => $email));
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
// societies_members
$app->get('/societies_members/:id', function($id) {
    global $db;
    $rows = $db->select("societies_members","id,name,position,email,phone",array('societyid' => $id));
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
$app->get('/mega_events/:id', function($id) {
    global $db;
    $rows = $db->select("mega_events","id,name,societyid,image,short_description,long_description,link",array('societyid'=>$id));
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
$app->get('/events/:id', function($id) {
    global $db;
    $rows = $db->select("events","id,name,description,venue,time,cost,societyid,short_description",array('societyid' =>$id));
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
// event_participants

$app->get('/participants/:eventid', function($eventid) {
    global $db;
  $rows = $db->selectjoin2("students","participate","id","studentid" , array('eventid' => $eventid));

    echoResponse(200, $rows);
});

// event_updates
$app->get('/event_updates', function() {
    global $db;
    $rows = $db->select("event_updates","id,title,message,color,timestamp,eventid",array());
    echoResponse(200, $rows);
});

$app->post('/event_updates', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array();
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
function echoResponse($status_code, $response) {
    global $app;
    $app->status($status_code);
    $app->contentType('application/json');
    echo json_encode($response,JSON_NUMERIC_CHECK);
}

$app->run();
?>
