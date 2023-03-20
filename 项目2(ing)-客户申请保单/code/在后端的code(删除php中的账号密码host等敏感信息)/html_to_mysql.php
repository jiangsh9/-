<!DOCTYPE html>
<html>
  <form action="#">
  <header>
    <div><h1>谢谢您的参与</h1></div>
    <!-- 新加 -->
    <link rel="stylesheet" href="css/geeks.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script type="text/javascript" src="js/app.js"></script>
  </header>
  </form>
</html>

<?php
session_start();
header("Content-type:text/html" );
$link = mysqli_connect( "?","?","?","?" );
if(! $link ) {
    die ("连接失败:" .mysqli_connect_error());
}





// 保存和提交数据至MySQL

// 将 新添加受保人 的信息保存并上传
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Step 1.1: 将 新添加受保人的姓名 存入一个array
    // $added_insured_name = array();
    // foreach ($_POST as $name => $value) {
    //     if (strpos($name, 'added-insured-name_') !== false) {
    //             array_push($added_insured_name, $value);
    //     }
    // }
    $added_insured_last_name = array();
    foreach ($_POST as $name => $value) {
        if (strpos($name, 'added-insured-last-name_') !== false) {
                array_push($added_insured_last_name, $value);
        }
    }
    $added_insured_first_name = array();
    foreach ($_POST as $name => $value) {
        if (strpos($name, 'added-insured-first-name_') !== false) {
                array_push($added_insured_first_name, $value);
        }
    }
    // Step 1.2: 将 新添加受保人的性别 存入一个array
    $added_insured_sex = array();
    foreach ($_POST as $name => $value) {
        if (strpos($name, 'added-insured-sex-choice_') !== false) {
                array_push($added_insured_sex, $value);
        }
    }
    // Step 1.3: 将 新添加受保人的生日 存入一个array
    $added_insured_birthdate = array();
    foreach ($_POST as $name => $value) {
        if (strpos($name, 'added-insured-birthdate_') !== false) {
                array_push($added_insured_birthdate, $value);
        }
    }
    // Step 1.4: 将 新添加受保人的关系 存入一个array
    $added_insured_relationship = array();
    foreach ($_POST as $name => $value) {
        if (strpos($name, 'added-relationship-insured_') !== false) {
                array_push($added_insured_relationship, $value);
        }
    }
    
    
    
    // 将 新添加受保人 的4个重要信息 保存到新变量中
    $values_name = array_values($added_insured_name);
    $values_first_name = array_values($added_insured_first_name);
    $values_last_name = array_values($added_insured_last_name);
    $values_sex = array_values($added_insured_sex);
    $values_birthdate = array_values($added_insured_birthdate);
    $values_relationship = array_values($added_insured_relationship);
    
    
    
    // “是否添加其他受保人” 的内容保存，为了决定是否添加（第一个）其他受保人
    $add_insured_check = $_POST [ 'add-insured-choice' ];



}



// 所有表单共有数据
$insured_name = $_POST [ 'insured-last-name' ] . $_POST [ 'insured-first-name' ];
$insured_sex = $_POST [ 'insured-sex-choice' ];
$insured_birthdate = $_POST[ 'insured-birthdate' ];
$insured_street_address = $_POST[ 'insured-street-address_1' ] . $_POST[ 'insured-street-address_2' ] . $_POST[ 'insured-street-address_3' ] . $_POST[ 'insured-street-address_4' ];
$insured_zip = $_POST[ 'insured-zip_1' ] . $_POST[ 'insured-zip_2' ];
$insured_province = $_POST[ 'insured-province' ];
$insured_city = $_POST[ 'insured-city' ];
$insured_tel = $_POST[ 'insured-tel_1' ] . $_POST[ 'insured-tel_2' ] . $_POST[ 'insured-tel_3' ];
$insured_mail = $_POST[ 'insured-mail' ];
$deceased_beneficiary = $_POST[ 'deceased-beneficiary' ];
$relationship_insured = $_POST[ 'relationship-insured' ];
$add_family_check = $_POST[ 'add-family-choice' ];

// 银行卡数据
// $payment_amount = floatval($_POST ['my_number']);

// 测试是否能接收价格数据
$payment_amount = isset($_POST["final_price"]) ? (float)$_POST["final_price"] : 0;
$card_type = $_POST ['card-type-choice'];
$card_holder = $_POST ['card-holder'];
$card_number = $_POST ['card-number'];
$card_expiry_date = $_POST ['card_expiry-date'];

// // 价格数据
// $price = $_POST[ 'num' ];




// 将plan 和 trip-type 保存并提交
$insurance_plan_choice = $_POST[ 'insurance-plan-choice' ];
$trip_type = $_POST[ 'payment-amount-trip-type-choice' ];
$plan = $insurance_plan_choice . " " . $trip_type;

    

// 根据三个不同表单选择数据库
$insurance_type_choice = $_POST['insurance-type-choice'];


if ($insurance_type_choice == "留学生/陪读父母保险") 
{
    // "留学生/陪读父母保险" 相关数据
    $insured_elder_check = $_POST [ 'insured-elder-study-choice' ];
    $arrive_canada_date = $_POST [ 'arrival-date' ];
    $insurance_effective_date = $_POST [ 'effective-date-study' ];
    $insurance_end_date = $_POST [ 'end-date-study' ];
    $heart_bypass = $_POST ['heart-bypass-study'];
    $diabetes = $_POST [ 'diabetes-study' ];
    $organ_transplant = $_POST [ 'organ-transplant-study' ];
    $biuretics = $_POST [ 'biuretics-study' ];
    $stroke = $_POST [ 'stroke-study' ];
    $cancer = $_POST [ 'cancer-study' ];
    $digestive_tract = $_POST [ 'digestive-tract-study' ];
    
    $age_require = $_POST [ 'insured-condition-1-study' ];
    $no_msp = $_POST [ 'insured-condition-2-study' ];
    $health = $_POST [ 'insured-condition-3-study' ];
    $no_cancer = $_POST [ 'insured-condition-4-study' ];
    $no_cancer_late = $_POST [ 'insured-condition-5-study' ];
    $no_current_cancer_treat = $_POST [ 'insured-condition-6-study' ];
    $no_nursing = $_POST [ 'insured-condition-7-study' ];
    $student_or_parent = $_POST [ 'insured-condition-8-study' ];
 
    
    // "留学生/陪读父母保险" 提交
    $sql = "INSERT INTO insurance_type_student_or_parent(insured_name, insured_sex, insured_birthday, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_relationship, add_family_check, insured_elder_check, arrive_canada_date, insurance_effective_date, insurance_end_date, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing, student_or_parent, payment_amount, card_type, card_holder, card_number, card_expiry_date, plan) VALUES ('$insured_name', '$insured_sex', '$insured_birthdate', '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', '$relationship_insured', $add_family_check, $insured_elder_check, '$arrive_canada_date', '$insurance_effective_date', '$insurance_end_date', $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing, $student_or_parent, $payment_amount, '$card_type', '$card_holder', '$card_number', '$card_expiry_date', '$plan');";
    
    
    
    // 提交 “新添加受保人信息” 至 “留学生/陪读父母保险”
    
    if ($add_insured_check == "1"){
        for ($i = 0; $i < count($added_insured_first_name); $i++) {
            // "留学生/陪读父母保险" 提交
            // $iterate_name = $values_name[$i];
            $iterate_name = $values_last_name[$i] . $values_first_name[$i];
            
            $iterate_sex = $values_sex[$i];
            $iterate_birthdate = $values_birthdate[$i];
            $iterate_relationship = $values_relationship[$i];
            $sql_added_insured = "INSERT INTO insurance_type_student_or_parent(insured_name, insured_sex, insured_birthday, insured_relationship, add_family_check, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_elder_check, arrive_canada_date, insurance_effective_date, insurance_end_date, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing, student_or_parent, payment_amount, card_type, card_holder, card_number, card_expiry_date, plan) VALUES ('$iterate_name', '$iterate_sex', '$iterate_birthdate', '$iterate_relationship', $add_family_check, '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', $insured_elder_check, '$arrive_canada_date', '$insurance_effective_date', '$insurance_end_date', $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing, $student_or_parent, $payment_amount, '$card_type', '$card_holder', '$card_number', '$card_expiry_date', '$plan');";
            if (!(mysqli_query( $link, $sql_added_insured ))){
                echo "<script>alert('数据插入失败');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//插入失败后会重新调回这个界面
            }
        }
    }

    
}
elseif ($insurance_type_choice == "访加旅客保险") 
{
    // "访加旅客保险" 相关数据
    $insured_eider_check = $_POST [ 'insured-elder-visitor-choice' ];
    $arrive_canada_date = $_POST [ 'arrival-date-visitor' ];
    $insurance_effective_date = $_POST [ 'effective-date-visit' ];
    $insurance_end_date = $_POST [ 'end-date-visit' ];
    $insurance_amount = $_POST [ 'insurance-amount-choice' ];
    $insurance_deductible = $_POST [ 'insurance-deductible-choice' ];
    $heart_bypass = $_POST [ 'heart-bypass-visit' ];
    $diabetes = $_POST [ 'diabetes-visit' ];
    $organ_transplant = $_POST [ 'organ-transplant-visit' ];
    $biuretics = $_POST [ 'biuretics-visit' ];
    $stroke = $_POST [ 'stroke-visit' ];
    $cancer = $_POST [ 'cancer-visit' ];
    $digestive_tract = $_POST [ 'digestive-tract-visit' ];
    
    $age_require = $_POST [ 'insured-condition-1-visit' ];
    $no_msp = $_POST [ 'insured-condition-2-visit' ];
    $health = $_POST [ 'insured-condition-3-visit' ];
    $no_cancer = $_POST [ 'insured-condition-4-visit' ];
    $no_cancer_late = $_POST [ 'insured-condition-5-visit' ];
    $no_current_cancer_treat = $_POST [ 'insured-condition-6-visit' ];
    $no_nursing = $_POST [ 'insured-condition-7-visit' ];
    
    
    // "访加旅客保险" 提交
    $sql = "INSERT INTO insurance_type_visitor(insured_name, insured_sex, insured_birthday, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_relationship, add_family_check, insured_elder_check, arrive_canada_date, insurance_effective_date, insurance_end_date, insurance_amount, insurance_deductible, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing, payment_amount, card_type, card_holder, card_number, card_expiry_date, plan) VALUES ('$insured_name', '$insured_sex', '$insured_birthdate', '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', '$relationship_insured', $add_family_check, $insured_eider_check, '$arrive_canada_date', '$insurance_effective_date', '$insurance_end_date', '$insurance_amount', '$insurance_deductible', $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing, $payment_amount, '$card_type', '$card_holder', '$card_number', '$card_expiry_date', '$plan');";
    
    // 提交 “新添加受保人信息” 至 “访加旅客保险”
    if ($add_insured_check == "1"){
        
        for ($i = 0; $i < count($added_insured_first_name); $i++) {
            // "访加旅客保险" 提交
            // $iterate_name = $values_name[$i];
            $iterate_name = $values_last_name[$i] . $values_first_name[$i];
            $iterate_sex = $values_sex[$i];
            $iterate_birthdate = $values_birthdate[$i];
            $iterate_relationship = $values_relationship[$i];
            $sql_added_insured = "INSERT INTO insurance_type_visitor(insured_name, insured_sex, insured_birthday, insured_relationship, add_family_check, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_elder_check, arrive_canada_date, insurance_effective_date, insurance_end_date, insurance_amount, insurance_deductible, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing, payment_amount, card_type, card_holder, card_number, card_expiry_date, plan) VALUES ('$iterate_name', '$iterate_sex', '$iterate_birthdate', '$iterate_relationship', $add_family_check, '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', $insured_eider_check, '$arrive_canada_date', '$insurance_effective_date', '$insurance_end_date', $insurance_amount, '$insurance_deductible', $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing, $payment_amount, '$card_type', '$card_holder', '$card_number', '$card_expiry_date', '$plan');";
            if (!(mysqli_query( $link, $sql_added_insured ))){
                echo "<script>alert('数据插入失败');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//插入失败后会重新调回这个界面
            }
        }
    }
    
}
elseif ($insurance_type_choice == "在加居民出境旅游保险")
{
    // "在加居民出境旅游保险" 相关数据
    $insured_elder_check = $_POST [ 'insured-elder-travel-choice' ];
    $heart_bypass = $_POST [ 'heart-bypass-travel' ];
    $diabetes = $_POST [ 'diabetes-travel' ];
    $organ_transplant = $_POST [ 'organ-transplant-travel' ];
    $biuretics = $_POST [ 'biuretics-travel' ];
    $stroke = $_POST [ 'stroke-travel' ];
    $cancer = $_POST [ 'cancer-travel' ];
    $digestive_tract = $_POST [ 'digestive-tract-travel' ];
    $leave_canada_date = $_POST [ 'departure-date' ];
    $insurance_effective_date = $_POST [ 'effective-date-travel' ];
    $insurance_end_date = $_POST [ 'end-date-travel' ];
    $america_destination_check = $_POST [ 'america-or-not-choice' ];
    $america_state = $_POST [ 'america-state' ];
    $america_stay = $_POST [ 'america-stay' ];
    $country = $_POST [ 'country' ];
    $medical_insurance = $_POST [ 'medical-insurance' ];
    $additional_insurance = $_POST [ 'additional_insurance_1' ];
    $no_insurance = $_POST [ 'no_insurance' ];
    $air_accident_insurance = $_POST [ 'air-accident-insurance' ];
    $accidental_death_insurance = $_POST [ 'accidental-death-insurance' ];
    $trip_interruption_insurance = $_POST [ 'trip-interruption-insurance' ];
    $trip_cancellation_insurance = $_POST [ 'trip-cancellation-insurance' ];
    
    
    $age_require = $_POST [ 'insured-condition-1-travel' ];
    $no_msp = $_POST [ 'insured-condition-2-travel' ];
    $health = $_POST [ 'insured-condition-3-travel' ];
    $no_cancer = $_POST [ 'insured-condition-4-travel' ];
    $no_cancer_late = $_POST [ 'insured-condition-5-travel' ];
    $no_current_cancer_treat = $_POST [ 'insured-condition-6-travel' ];
    $no_nursing = $_POST [ 'insured-condition-7-travel' ];

    
    // "在加居民出境旅游保险" 提交
    $sql = "INSERT INTO insurance_type_travelor(insured_name, insured_sex, insured_birthday, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_relationship, add_family_check, insured_elder_check, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, leave_canada_date, insurance_effective_date, insurance_end_date, america_destination_check, america_state, america_stay, country, medical_insurance, additional_insurance, no_insurance, air_accident_insurance, accidental_death_insurance, trip_interruption_insurance, trip_cancellation_insurance, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing, payment_amount, card_type, card_holder, card_number, card_expiry_date, plan) VALUES ('$insured_name', '$insured_sex', '$insured_birthdate', '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', '$relationship_insured', $add_family_check, $insured_elder_check, $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, '$leave_canada_date', '$insurance_effective_date', '$insurance_end_date', $america_destination_check, '$america_state', '$america_stay', '$country', $medical_insurance, $additional_insurance, $no_insurance, $air_accident_insurance, $accidental_death_insurance, $trip_interruption_insurance, $trip_cancellation_insurance, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing, $payment_amount, '$card_type', '$card_holder', '$card_number', '$card_expiry_date', '$plan');";
    
    
    // 从这里继续：提交 “新添加受保人信息” 至 “在加居民出境旅游保险”
    if ($add_insured_check == "1"){
        for ($i = 0; $i < count($added_insured_first_name); $i++) {
            // "在加居民出境旅游保险" 提交
            // $iterate_name = $values_name[$i];
            $iterate_name = $values_last_name[$i] . $values_first_name[$i];
            $iterate_sex = $values_sex[$i];
            $iterate_birthdate = $values_birthdate[$i];
            $iterate_relationship = $values_relationship[$i];
            $sql_added_insured = "INSERT INTO insurance_type_travelor(insured_name, insured_sex, insured_birthday, insured_relationship, add_family_check, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_elder_check, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, leave_canada_date, insurance_effective_date, insurance_end_date, america_destination_check, america_state, america_stay, country, medical_insurance, additional_insurance, no_insurance, air_accident_insurance, accidental_death_insurance, trip_interruption_insurance, trip_cancellation_insurance, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing, payment_amount, card_type, card_holder, card_number, card_expiry_date, plan) VALUES ('$iterate_name', '$iterate_sex', '$iterate_birthdate', '$iterate_relationship', $add_family_check, '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', $insured_elder_check, $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, '$leave_canada_date', '$insurance_effective_date', '$insurance_end_date', $america_destination_check, '$america_state', '$america_stay', '$country', $medical_insurance, $additional_insurance, $no_insurance, $air_accident_insurance, $accidental_death_insurance, $trip_interruption_insurance, $trip_cancellation_insurance, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing, $payment_amount, '$card_type', '$card_holder', '$card_number', '$card_expiry_date', '$plan');";
            if (!(mysqli_query( $link, $sql_added_insured ))){
                echo "<script>alert('数据插入失败');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//插入失败后会重新调回这个界面
            }
        }
    }
    
    

}
else
{
    echo "<script>alert('表单选择失败');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";

}



//此处的test就是数据库中表单的名称
    //插入数据库
     if (!(mysqli_query( $link, $sql ))){
        echo "<script>alert('数据插入失败');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//插入失败后会重新调回这个界面
    } else {
        echo "<script>alert('表单提交成功!');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//插入成功后会重新调回这个界面
    }
    
    
    
    
    
// 发送邮件
$to = "lavieFinanceTest@gmail.com";
$subject = '新提交表单的主要数据';



// 获取数据库中的database的名称
$table_name='';

if ($insurance_type_choice == "留学生/陪读父母保险"){
    $table_name='insurance_type_student_or_parent';
}
elseif ($insurance_type_choice == "访加旅客保险") {
    $table_name='insurance_type_visitor';
}
else {
    $table_name='insurance_type_travelor';
}

$href1='https://host.axcelmedia.ca:2083/cpsess4701787910/3rdparty/phpMyAdmin/sql.php?server=1&db=wepltrav_wp1&table=';
$href2=$table_name;
$href3='&pos=0';

$href=$href1.$href2.$href3;

        
        
$message = "
<html>
<head>
<title>新提交表单的主要数据</title>
</head>
<body>
<p>(此电子邮件包含 HTML 标签!)</p>
<br><br>
<p>有一位新客户提交了一份表单，以下是一些关键信息：</p>
<table border='1'>
<tr>
<th>受保人姓名</th>
<th>受保人性别</th>
<th>受保人Email</th>
<th>受保人电话</th>
<th>保险类型</th>
<th>数据库的table</th>
</tr>
<tr>
<td>$insured_name</td>
<td>$insured_sex</td>
<td>$insured_mail</td>
<td>$insured_tel</td>
<td>$insurance_type_choice</td>
<td>$table_name</td>
</tr>
</table>
<br>
请进入<span><a href=$href>数据库</a></span>进行操作
</body>
</html>
";

// 当发送 HTML 电子邮件时，请始终设置 content-type
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// 更多报头
$headers .= 'From: <jiangshaohua1997@gmail.com>' . "\r\n";
$headers .= 'Cc: lavieFinanceTest@gmail.com' . "\r\n";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (mail($to,$subject,$message,$headers)) {
        // 邮件发送成功
        $success = '邮件发送成功';
        $insured_name = $insured_mail = $insured_tel = '';
        echo $success;
    } else {
        // 邮件发送失败
        $error = '邮件发送失败，请稍后尝试。';
        echo $error;
    }
}
    
    
?>