<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "student_db");
if ($conn->connect_error) {
    echo json_encode(["status"=>"error","message"=>"เชื่อมต่อ DB ไม่ได้"]);
    exit;
}

// ตรวจสอบว่าเป็น POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data) {
        echo json_encode(["status"=>"error","message"=>"JSON ไม่ถูกต้อง"]);
        exit;
    }

    $first_name = $data['first_name'] ?? '';
    $last_name  = $data['last_name'] ?? '';
    $phone      = $data['phone'] ?? '';
    $email      = $data['email'] ?? '';
    $faculty    = $data['faculty'] ?? '';

    $sql = "INSERT INTO students (first_name, last_name, phone, email, faculty)
            VALUES ('$first_name','$last_name','$phone','$email','$faculty')";

    if ($conn->query($sql)) {
        echo json_encode(["status"=>"success","message"=>"เพิ่มข้อมูลสำเร็จ"]);
    } else {
        echo json_encode(["status"=>"error","message"=>$conn->error]);
    }

} else {
    echo json_encode(["status"=>"error","message"=>"ต้องใช้ POST request เท่านั้น"]);
}