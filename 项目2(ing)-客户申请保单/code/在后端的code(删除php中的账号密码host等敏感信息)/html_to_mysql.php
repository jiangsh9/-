<!DOCTYPE html>
<html>
  <form action="#">
  <header>
    <div><h1>лл���Ĳ���</h1></div>
    <!-- �¼� -->
    <link rel="stylesheet" href="css/geeks.css">
    <script type="text/javascript" src="js/app.js"></script>
  </header>
  </form>
</html>

<?php
session_start();
header("Content-type:text/html" );
$link = mysqli_connect( "?","?","?","?" );
if(! $link ) {
    die ("����ʧ��:" .mysqli_connect_error());
}




// ������ύ������MySQL

// �� ������ܱ��� ����Ϣ���沢�ϴ�
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Step 1.1: �� ������ܱ��˵����� ����һ��array
    $added_insured_name = array();
    foreach ($_POST as $name => $value) {
        if (strpos($name, 'added-insured-name_') !== false) {
            //if (!in_array($value, $added_insured_name)) {
                array_push($added_insured_name, $value);
            //}
        }
    }
    // Step 1.2: �� ������ܱ��˵��Ա� ����һ��array
    $added_insured_sex = array();
    foreach ($_POST as $name => $value) {
        if (strpos($name, 'added-insured-sex-choice_') !== false) {
                array_push($added_insured_sex, $value);
        }
    }
    // Step 1.3: �� ������ܱ��˵����� ����һ��array
    $added_insured_birthdate = array();
    foreach ($_POST as $name => $value) {
        if (strpos($name, 'added-insured-birthdate_') !== false) {
                array_push($added_insured_birthdate, $value);
        }
    }
    // Step 1.4: �� ������ܱ��˵Ĺ�ϵ ����һ��array
    $added_insured_relationship = array();
    foreach ($_POST as $name => $value) {
        if (strpos($name, 'added-relationship-insured_') !== false) {
                array_push($added_insured_relationship, $value);
        }
    }
    
    
    
    // �� ������ܱ��� ��4����Ҫ��Ϣ ���浽�±�����
    $values_name = array_values($added_insured_name);
    $values_sex = array_values($added_insured_sex);
    $values_birthdate = array_values($added_insured_birthdate);
    $values_relationship = array_values($added_insured_relationship);
    
    
    
    // ���Ƿ���������ܱ��ˡ� �����ݱ��棬Ϊ�˾����Ƿ���ӣ���һ���������ܱ���
    $add_insured_check = $_POST [ 'add-insured-choice' ];



}



// ���б���������
$insured_name = $_POST [ 'insured-name' ];
$insured_sex = $_POST [ 'insured-sex-choice' ];
$insured_birthdate = $_POST[ 'insured-birthdate' ];
$insured_street_address = $_POST[ 'insured-street-address' ];
$insured_zip = $_POST[ 'insured-zip' ];
$insured_province = $_POST[ 'insured-province' ];
$insured_city = $_POST[ 'insured-city' ];
$insured_tel = $_POST[ 'insured-tel' ];
$insured_mail = $_POST[ 'insured-mail' ];
$deceased_beneficiary = $_POST[ 'deceased-beneficiary' ];
$relationship_insured = $_POST[ 'relationship-insured' ];
$add_family_check = $_POST[ 'add-family-choice' ];

    

// ����������ͬ��ѡ�����ݿ�
$insurance_type_choice = $_POST['insurance-type-choice'];

echo gettype($insurance_type_choice);


if ($insurance_type_choice == "��ѧ��/�����ĸ����") 
{
    // "��ѧ��/�����ĸ����" �������
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
 
    
    // "��ѧ��/�����ĸ����" �ύ
    $sql = "INSERT INTO insurance_type_student_or_parent(insured_name, insured_sex, insured_birthday, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_relationship, add_family_check, insured_elder_check, arrive_canada_date, insurance_effective_date, insurance_end_date, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing, student_or_parent) VALUES ('$insured_name', '$insured_sex', '$insured_birthdate', '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', '$relationship_insured', $add_family_check, $insured_elder_check, '$arrive_canada_date', '$insurance_effective_date', '$insurance_end_date', $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing, $student_or_parent);";
    
    
    
    // �ύ ��������ܱ�����Ϣ�� �� ����ѧ��/�����ĸ���ա�
    
    if ($add_insured_check == "1"){
        for ($i = 0; $i < count($added_insured_name); $i++) {
            // "��ѧ��/�����ĸ����" �ύ
            $iterate_name = $values_name[$i];
            $iterate_sex = $values_sex[$i];
            $iterate_birthdate = $values_birthdate[$i];
            $iterate_relationship = $values_relationship[$i];
            $sql_added_insured = "INSERT INTO insurance_type_student_or_parent(insured_name, insured_sex, insured_birthday, insured_relationship, add_family_check, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_elder_check, arrive_canada_date, insurance_effective_date, insurance_end_date, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing, student_or_parent) VALUES ('$iterate_name', '$iterate_sex', '$iterate_birthdate', '$iterate_relationship', $add_family_check, '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', $insured_elder_check, '$arrive_canada_date', '$insurance_effective_date', '$insurance_end_date', $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing, $student_or_parent);";
            if (!(mysqli_query( $link, $sql_added_insured ))){
                echo "<script>alert('���ݲ���ʧ��');</script>";
                //  echo "<script>alert('���ݲ���ʧ��');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//����ʧ�ܺ�����µ����������
            }
        }
    }

    
}
elseif ($insurance_type_choice == "�ü��ÿͱ���") 
{
    // "�ü��ÿͱ���" �������
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
    
    
    // "�ü��ÿͱ���" �ύ
    $sql = "INSERT INTO insurance_type_visitor(insured_name, insured_sex, insured_birthday, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_relationship, add_family_check, insured_elder_check, arrive_canada_date, insurance_effective_date, insurance_end_date, insurance_amount, insurance_deductible, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing) VALUES ('$insured_name', '$insured_sex', '$insured_birthdate', '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', '$relationship_insured', $add_family_check, $insured_eider_check, '$arrive_canada_date', '$insurance_effective_date', '$insurance_end_date', '$insurance_amount', '$insurance_deductible', $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing);";
    
    // �ύ ��������ܱ�����Ϣ�� �� ���ü��ÿͱ��ա�
    if ($add_insured_check == "1"){
        
        for ($i = 0; $i < count($added_insured_name); $i++) {
            // "�ü��ÿͱ���" �ύ
            $iterate_name = $values_name[$i];
            $iterate_sex = $values_sex[$i];
            $iterate_birthdate = $values_birthdate[$i];
            $iterate_relationship = $values_relationship[$i];
            $sql_added_insured = "INSERT INTO insurance_type_visitor(insured_name, insured_sex, insured_birthday, insured_relationship, add_family_check, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_elder_check, arrive_canada_date, insurance_effective_date, insurance_end_date, insurance_amount, insurance_deductible, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing) VALUES ('$iterate_name', '$iterate_sex', '$iterate_birthdate', '$iterate_relationship', $add_family_check, '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', $insured_eider_check, '$arrive_canada_date', '$insurance_effective_date', '$insurance_end_date', '$insurance_amount', '$insurance_deductible', $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing);";
            if (!(mysqli_query( $link, $sql_added_insured ))){
                echo "<script>alert('���ݲ���ʧ��');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//����ʧ�ܺ�����µ����������
            }
        }
    }
    
}
elseif ($insurance_type_choice == "�ڼӾ���������α���")
{
    // "�ڼӾ���������α���" �������
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

    
    // "�ڼӾ���������α���" �ύ
    $sql = "INSERT INTO insurance_type_travelor(insured_name, insured_sex, insured_birthday, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_relationship, add_family_check, insured_elder_check, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, leave_canada_date, insurance_effective_date, insurance_end_date, america_destination_check, america_state, america_stay, country, medical_insurance, additional_insurance, no_insurance, air_accident_insurance, accidental_death_insurance, trip_interruption_insurance, trip_cancellation_insurance, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing) VALUES ('$insured_name', '$insured_sex', '$insured_birthdate', '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', '$relationship_insured', $add_family_check, $insured_elder_check, $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, '$leave_canada_date', '$insurance_effective_date', '$insurance_end_date', $america_destination_check, '$america_state', '$america_stay', '$country', $medical_insurance, $additional_insurance, $no_insurance, $air_accident_insurance, $accidental_death_insurance, $trip_interruption_insurance, $trip_cancellation_insurance, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing);";
    
    
    // ������������ύ ��������ܱ�����Ϣ�� �� ���ڼӾ���������α��ա�
    if ($add_insured_check == "1"){
        for ($i = 0; $i < count($added_insured_name); $i++) {
            // "�ڼӾ���������α���" �ύ
            $iterate_name = $values_name[$i];
            $iterate_sex = $values_sex[$i];
            $iterate_birthdate = $values_birthdate[$i];
            $iterate_relationship = $values_relationship[$i];
            $sql_added_insured = "INSERT INTO insurance_type_travelor(insured_name, insured_sex, insured_birthday, insured_relationship, add_family_check, insured_street_address, insured_postal_code, insured_province, insured_city, insured_tel, insured_email, deceased_beneficiary, insured_elder_check, heart_bypass, diabetes, organ_transplant, biuretics, stroke, cancer, digestive_tract, leave_canada_date, insurance_effective_date, insurance_end_date, america_destination_check, america_state, america_stay, country, medical_insurance, additional_insurance, no_insurance, air_accident_insurance, accidental_death_insurance, trip_interruption_insurance, trip_cancellation_insurance, age_require, no_msp, health, no_cancer, no_cancer_late, no_current_cancer_treat, no_nursing) VALUES ('$iterate_name', '$iterate_sex', '$iterate_birthdate', '$iterate_relationship', $add_family_check, '$insured_street_address', '$insured_zip', '$insured_province', '$insured_city', '$insured_tel', '$insured_mail', '$deceased_beneficiary', $insured_elder_check, $heart_bypass, $diabetes, $organ_transplant, $biuretics, $stroke, $cancer, $digestive_tract, '$leave_canada_date', '$insurance_effective_date', '$insurance_end_date', $america_destination_check, '$america_state', '$america_stay', '$country', $medical_insurance, $additional_insurance, $no_insurance, $air_accident_insurance, $accidental_death_insurance, $trip_interruption_insurance, $trip_cancellation_insurance, $age_require, $no_msp, $health, $no_cancer, $no_cancer_late, $no_current_cancer_treat, $no_nursing);";
            if (!(mysqli_query( $link, $sql_added_insured ))){
                //echo "<script>alert('���ݲ���ʧ��');</script>";
                echo "<script>alert('���ݲ���ʧ��');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//����ʧ�ܺ�����µ����������
            }
        }
    }
    
    
    
    
    // echo "<script>alert($medical_insurance);window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";
}
else
{
    echo "<script>alert('��ѡ��ʧ��');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";

}



//�˴���test�������ݿ��б�������
    //�������ݿ�
     if (!(mysqli_query( $link, $sql ))){
        //echo "<script>alert('���ݲ���ʧ��');</script>";
        echo "<script>alert('���ݲ���ʧ��');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//����ʧ�ܺ�����µ����������
    } else {
        //echo "<script>alert('���ύ�ɹ�!');</script>";
        echo "<script>alert('���ύ�ɹ�!');window.location.href='https://travelinsurance.weplusfinancial.ca/travelinsurance'</script>";//����ɹ�������µ����������
    }
?>