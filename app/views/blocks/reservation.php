<?php
$name;
$date;
$people;
$phone;
$email;
$time;
if (isset($_POST["name"]) 
&& isset($_POST["date"]) 
&& isset($_POST["people"]) 
&& isset($_POST["phone"]) 
&& isset($_POST["email"])
&& isset($_POST["time"])) {
    $name = htmlspecialchars($_POST["name"]);
    $date = htmlspecialchars($_POST["date"]);
    $people = htmlspecialchars($_POST["people"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $time = htmlspecialchars($_POST["time"]);
    $date = $date . " " . $time;
    $dateTimeObj = DateTime::createFromFormat('d/m/Y H:i', $date);
    $dateTime = $dateTimeObj->format('Y-m-d H:i:s');
    $reservation = new Reservation();
    if ($reservation->setPlace($dateTime,$people,$name,$phone,$email)){
        $content = "
        Cảm ơn bạn tin tưởng sử dụng dịch vụ của Food store. Đơn hàng của bạn đã được xác nhận <br>
        <h5>Chi tiết đơn hàng : </h5>  <br>
        Tên khách hàng : $name  <br>
        Thời gian : $date  <br>
        Số lượng khách : $people  <br>
        Số điện thoại : $phone  <br>
        Email : $email  <br>
        Trạng thái : Đang xét duyệt  <br>
        <br>  <br>
        Cảm ơn quý khách đã tin tưởng <3 <3
        ";
        $subject = "[Food Store] Cập nhật trạng thái bàn";
        sendCodeMail($email,$subject,$content);
        echo "<script>alert('Đăng kí bàn đã được ghi nhận');
        window.location.href = 'reservation.php';
        </script>";
    }
    else{
        echo "<script>alert('Đăng kí thất bại')</script>";
    }
}
?>
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
    style="background-image: url(public/images/bg-title-page-02.jpg);">
    <h2 class="tit6 t-center">
        Reservation
    </h2>
</section>

<!-- Reservation -->
<section class="section-reservation bg1-pattern p-t-100 p-b-113">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12 p-b-30">
                <div class="t-center">
                    <span class="tit2 t-center">
                        Reservation
                    </span>

                    <h3 class="tit3 t-center m-b-35 m-t-2">
                        Book table
                    </h3>
                </div>

                <form class="wrap-form-reservation size22 m-l-r-auto" action="reservation.php" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Date -->
                            <span class="txt9">
                                Date
                            </span>

                            <div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="date" required>
                                <i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Time -->
                            <span class="txt9">
                                Time
                            </span>

                            <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 -->
                                <select class="selection-1" name="time" required>
                                    <option value="9:00">9:00</option>
                                    <option value="9:30">9:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- People -->
                            <span class="txt9">
                                People
                            </span>

                            <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 -->
                                <select class="selection-1" name="people" required>
                                    <option value="1">1 person</option>
                                    <option value="2">2 people</option>
                                    <option value="3">3 people</option>
                                    <option value="4">4 people</option>
                                    <option value="5">5 people</option>
                                    <option value="6">6 people</option>
                                    <option value="7">7 people</option>
                                    <option value="8">8 people</option>
                                    <option value="9">9 people</option>
                                    <option value="10">10 people</option>
                                    <option value="11">11 people</option>
                                    <option value="12">12 people</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <!-- Name -->
                            <span class="txt9">
                                Name
                            </span>

                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" required
                                    placeholder="Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Phone -->
                            <span class="txt9">
                                Phone
                            </span>

                            <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="phone" required
                                    placeholder="Phone">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Email -->
                            <span class="txt9">
                                Email
                            </span>

                            <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email"required
                                    placeholder="Email">
                            </div>
                        </div>

                    </div>

                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                            Book Table
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="info-reservation flex-w p-t-80">
            <div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
                <h4 class="txt5 m-b-18">
                    Reserve by Phone
                </h4>

                <p class="size25">
                    Donec quis euismod purus. Donec feugiat ligula rhoncus, varius nisl sed, tincidunt lectus.
                    <span class="txt25">Nulla vulputate</span>
                    , lectus vel volutpat efficitur, orci
                    <span class="txt25">lacus sodales</span>
                    sem, sit amet quam:
                    <span class="txt24">(001) 345 6889</span>
                </p>
            </div>

            <div class="size24 w-full-md p-t-40">
                <h4 class="txt5 m-b-18">
                    For Event Booking
                </h4>

                <p class="size26">
                    Donec feugiat ligula rhoncus:
                    <span class="txt24">(001) 345 6889</span>
                    , varius nisl sed, tinci-dunt lectus sodales sem.
                </p>
            </div>

        </div>
    </div>
</section>

<?php
function sendCodeMail($email,$subject,$content)
{
    require "public/phpmailer/src/PHPMailer.php";
    require "public/phpmailer/src/SMTP.php"; 
    require 'public/phpmailer/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; 
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'tannp.42.student@fit.tdc.edu.vn';
        $mail->Password = 'tandz1234'; 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 465;           
        $mail->setFrom('tannp.42.student@fit.tdc.edu.vn', 'Food store admin' ); 
        $mail->addAddress($email); 
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $noidungthu = "<div style='color: #000'>$content</div>"; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        return true;
    } catch (Exception $e) {
        // echo 'Error: ', $mail->ErrorInfo;
        return false;
    }
} 
?>

