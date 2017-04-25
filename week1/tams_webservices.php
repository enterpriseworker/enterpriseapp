<?php


    header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");	
	
    set_time_limit(0);
	

	defined('D') ?NULL : define('DS',"\\");
	defined('LIB_SITE') ?NULL : define('LIB_SITE', 'C:'.DS.'xampp'.DS.'htdocs'.DS.'TamsMobile'.DS.'sbtelecoms'.DS.'tams'.DS.'classes');

    include(LIB_SITE.DS."employeesstatementnamevaluepair.php");
    include(LIB_SITE.DS."employeestatement.php");
    include(LIB_SITE.DS."exemption.php");    
    include(LIB_SITE.DS."leave.php");
    include(LIB_SITE.DS."location.php");
    include(LIB_SITE.DS."phonebookcontact.php");
    include(LIB_SITE.DS."loan.php");
    include(LIB_SITE.DS."exemptionsummary.php");
    include(LIB_SITE.DS."leaveusagesummary.php");
    include(LIB_SITE.DS."daysummary.php");
    include(LIB_SITE.DS."absentee.php");
    include(LIB_SITE.DS."lateness.php");
    include(LIB_SITE.DS."statistic.php");
    include(LIB_SITE.DS."weeklysummary.php");
    include(LIB_SITE.DS."attendancededuction.php");    
    include(LIB_SITE.DS."attendancelog.php");
    include(LIB_SITE.DS."attendance.php");
    include(LIB_SITE.DS."attendancesummary.php");
    include(LIB_SITE.DS."punctuality.php");
    include(LIB_SITE.DS."leavetype.php");
    include(LIB_SITE.DS."loantype.php");
	include(LIB_SITE.DS."user.php");
    include(LIB_SITE.DS."colleague.php");
    include(LIB_SITE.DS."appraisal.php");
    include(LIB_SITE.DS."approval.php");
    include(LIB_SITE.DS."approval2.php");
    include(LIB_SITE.DS."department.php");
    include(LIB_SITE.DS."mobileversion.php");
	
    error_reporting(0);
	
    define("SERVERNAME", "192.163.214.157");
    define("USERNAME", "root");
    define("PASSWORD", "OtherServer");
    define("DATABASENAME", "tams_adms");
    define("PORT", "3308");
    
    // API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AIzaSyC6XnHMtObCvev7Ieu6l1z1N6YNvKbxxyI');


    router($_GET["action"]);

    function router($action){
    
        switch ($action) {

            case "update_my_profile":
                     update_my_profile($_GET["companyid"], $_GET["pin"], $_GET["phone"], $_GET["city"], $_GET["address"]);// completed
                break;
            case "change_my_password":
                    change_my_password($_GET["companyid"], $_GET["pin"], $_GET["oldpassword"], $_GET["newpassword"]); // completed
                break;
            case "login":
                    login($_GET["companyid"], $_GET["pin"], $_GET["password"], $_GET["mode"]); // completed
                break;
            case "view_my_colleagues_status":
                    view_my_colleagues_status($_GET["companyid"], $_GET["pin"]); // completed
                break;
                case "update_user_status":
                    update_user_status($_GET["companyid"], $_GET["pin"], $_GET["status"]);//completed
                break; 
            case "view_leave_requests":
                 view_leave_requests($_GET["companyid"], $_GET["pins"]);// completed
                break;    
            case "view_leave_roaster":
                view_leave_roaster($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["leavetype"]);
                break;             
            case "create_leave_request":
                    create_leave_request(
                    $_GET["firstapprovalemail"], $_GET["secondapprovalemail"], $_GET["email"], $_GET["message"], $_GET["departmentid"],
                    $_GET["companyid"], $_GET["pin"], $_GET["leavetype"], $_GET["startdate"], $_GET["enddate"], $_GET["locationid"]
                    );
                break;
            case "update_leave_request":
                    update_leave_request($_GET["leaveid"], $_GET["departmentid"], $_GET["companyid"], 
                    $_GET["pin"], $_GET["leavetype"], $_GET["startdate"], $_GET["enddate"], $_GET["locationid"]
                    );
                break;
            case "delete_leave_request":
                    delete_leave_request($_GET["firstapprovalemail"], 
                                         $_GET["secondapprovalemail"], 
                                         $_GET["email"], 
                                         $_GET["message"], 
                                         $_GET["leaveid"]);//completed
                break;             
            case "approve_leave_request":
                 approve_leave_request($_GET["leaveid"], $_GET["status"]); // completed
                break;   
            
            case "generate_leave_usage_summary":
                 generate_leave_usage_summary($_GET["companyid"], $_GET["pins"], $_GET["year"]);
                break;             
            
            case "view_exemption_requests":
                    view_exemption_requests($_GET["companyid"], $_GET["pins"]);// completed 
                break; 
            case "view_exemption_roaster":               
                view_exemption_roaster($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"]);
                break; 
            
            case "view_exemption_summary":               
                view_exemption_summary($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"]);
                break; 
            
            case "approve_exemption_request":
                    approve_exemption_request($_GET["exemptionid"], $_GET["status"]);// completed 
                break;   
            
            case "create_exemption_request":
                create_exemption_request(
                $_GET["firstapprovalemail"], $_GET["secondapprovalemail"], $_GET["email"], $_GET["message"], $_GET["departmentid"],
                $_GET["companyid"], $_GET["pin"], $_GET["startdate"], $_GET["reason"], $_GET["location"] 
                );
                break;             
            case "delete_exemption_request":
                delete_exemption_request($_GET["firstapprovalemail"], 
                                         $_GET["secondapprovalemail"], 
                                         $_GET["email"], 
                                         $_GET["message"], 
                                         $_GET["exemptionid"]);//completed
                break;
            
            case "update_exemption_request":
                update_exemption_request($_GET["exemptionid"], $_GET["departmentid"], $_GET["companyid"], 
                $_GET["pin"], $_GET["leavetype"], $_GET["startdate"], $_GET["reason"], $_GET["locationid"]
                ); //completed
                break;                       
            case "view_appraisal_requests":
                view_appraisal_requests($_GET["companyid"], $_GET["pins"]);
                break;
            case "create_appraisal_request":
                create_appraisal_request($_GET["companyid"], $_GET["pin"], $_GET["name"], $_GET["startdate"], 
                                         $_GET["enddate"], $_GET["departmentid"], $_GET["parentdepartment"], $_GET["goals"], 
                                         $_GET["supervisorgoals"], $_GET["actualgoals"], $_GET["goalsnotaccomplished"], $_GET["locationid"]); 
                break;            
            case "update_appraisal_request":
                update_appraisal_request($_GET["appraisalid"], $_GET["name"], 
                $_GET["startdate"], $_GET["enddate"], $_GET["goals"], $_GET["actual_goals"], 
                                         $_GET["supervisorgoals"], $_GET["goalsnotaccomplished"], $_GET["locationid"]);
                break;             
            case "delete_appraisal_request":
                delete_appraisal_request($_GET["appraisalid"]); 
                break; 
			case "send_sms":
                send_sms($_GET["smsmessage"], $_GET["smscount"], $_GET["recipients"], 
                $_GET["senderid"], $_GET["smsdate"], $_GET["smstime"], $_GET["companyid"], $_GET["pin"]); 
                break; 
			case "sent_sms":
                sent_sms( $_GET["companyid"], $_GET["pin"]); 
                break;				
            case "add_contact_to_phone_book":
                  add_contact_to_phone_book($_GET["contactname"], $_GET["contactphone"], 
                $_GET["companyid"], $_GET["pin"], $_GET["address"], $_GET["gender"], $_GET["email"]);
                break;
            case "delete_phone_book_contact":
                delete_phone_book_contact($_GET["phonebookid"], $_GET["companyid"], $_GET["pin"]);
                break;
            case "view_phone_book_contact_list":
                view_phone_book_contact_list($_GET["companyid"], $_GET["pin"]);
                break;   
            case "update_phone_book_contact":
                update_phone_book_contact($_GET["phonebookid"], $_GET["contactname"], $_GET["contactphone"], 
                $_GET["companyid"], $_GET["pin"], $_GET["address"], $_GET["gender"], $_GET["email"]);
                break;
            case "generate_appraisal_reports":
                generate_appraisal_reports($_GET["companyid"], $_GET["pin"], $_GET["date"]); 
                break;             
            case "generate_punctuality_reports":
                generate_punctuality_reports($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);        
                break;
            case "generate_attendance_summary":
                generate_attendance_summary($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);          
                break;  
            case "generate_attendance":
                generate_attendance($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
                break;
            case "generate_attendance_deduction":
                generate_attendance_deduction($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
                break;  
            case "generate_weekly_summary_report":
                generate_weekly_summary_report($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
                break;     
            case "generate_lateness_report":
                generate_lateness_report($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
                break;  
            case "generate_absentee_report":
                generate_absentee_report($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
                break;         
            case "generate_attendance_logs":
                generate_attendance_logs($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
                break; 
            case "view_loan_requests":
                view_loan_requests($_GET["companyid"], $_GET["pin"]);
                break; 
            case "view_loan_requests_by_loan_type":
                view_loan_requests_by_loan_type($_GET["companyid"], $_GET["pin"], $_GET["loantypeid"]);
                break;   
            case "create_loan_request":
                create_loan_request($_GET["companyid"], $_GET["pin"], $_GET["amount"], 
                $_GET["loan_type_id"], $_GET["charges"], $_GET["numpayment"], $_GET["deductionstartdate"], 
                $_GET["rate"], $_GET["details"], $_GET["loanpaymenttype"]);
                break;
            case "generate_statistic_report":
                 generate_statistic_report($_GET["companyid"], $_GET["leavepins"], $_GET["exemptionpins"], $_GET["userid"]);
                break; 
            case "generate_employee_statement_report":
                  generate_employee_statement_report($_GET["companyid"], $_GET["pin"], $_GET["statementid"], $_GET["year"]);
                break; 
            case "generate_employee_payslip":
                  generate_employee_payslip($_GET["companyid"], $_GET["pin"], $_GET["month"], $_GET["year"]);
                break; 
            case "get_mobileversion":
                  get_mobileversion();
                break;   
            case "register_mobile_device":
                  register_mobile_device($_GET["manufacturer"], $_GET["model"], $_GET["platform"], $_GET["uuid"], $_GET["version"], $_GET["appversion"], $_GET['pin'], $_GET['compid']);
                break; 
			case "mobile_signin":
                mobile_signin($_GET["userid"], $_GET["pin"], $_GET["companyid"], $_GET["type"], $_GET["address"], $_GET["address2"], $_GET["city"]);         
                break;
			case "get_chat_messages":
                get_chat_messages($_GET["userid"]);
                break;
			case "get_account_type":
                get_account_type($_GET["companyid"]);
                break;  
			case "get_company_tams_ambassadors":
                get_company_tams_ambassadors($_GET["from"], $_GET["to"], $_GET["companyid"], $_GET["view"], $_GET["location"], $_GET["department"]);
                break;                
			case "get_general_tams_ambassadors":
                get_general_tams_ambassadors($_GET["from"], $_GET["to"], $_GET["companyid"]);
                break;                   
            default:
                $message = array("message"=>"INVALID REQUEST");
                echo json_encode($message); 
        }
    }

    function hash_password($password){
       $salt = "QxLUF1bgIAdeQX";
       $salt_password = $password.$salt;
       return hash('sha256',$salt_password);
    }

    function get_employee_statement_types($company_id, $connection){
        
        $result = $connection->query("select id, category from taxpension where compid = $company_id");         
        
        if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }


    function get_leave_types($compny_id, $connection){
        
        $result = $connection->query("SELECT id, leavetype, duration FROM leave1 where compid='$compny_id'");         
        
        $list = array();
        $counter = 0; 
        
        if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()){
                $leavetype = new leavetype();
                $leavetype->set_id($row['id']);
                $leavetype->set_type($row['leavetype']);
                $leavetype->set_duration($row['duration']);
                $list[$counter] = $leavetype;
                $counter = $counter + 1;
            }
        }
        return $list;
    }


    function get_loan_types($compny_id, $connection){ 

        $result = $connection->query("SELECT id, loantype, interestrate, num_payment FROM loantype where compid='$compny_id'");         
        
        $list = array();
        $counter = 0; 
        
        if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()){
                $loantype = new loantype();
                $loantype->set_id($row['id']);
                $loantype->set_type($row['loantype']);
                $loantype->set_interest_rate($row['interestrate']);
                $loantype->set_num_payment($row['num_payment']);
                $list[$counter] = $loantype;
                $counter = $counter + 1;
            }
        }
        return $list;
    }

    /***************************************************************************************************************
        function get_persons_to_approve_my_leaves is a helper function for other function that return the department
        head email. Note: This function should not be called as a webservice.
    ***************************************************************************************************************/
    function get_people_to_approve_my_requests($company_id, $pin, $connection){
        
        $approval_level_result = $connection->query("SELECT UserNames, ApprovalLevel, FirstApproval, 
        u.name AS firstname, u.email AS firstemail, SecondApproval, u2.name AS secondname, u2.email AS secondemail, ApprovalType 
        FROM approvallevel al 
        LEFT JOIN (select name, email, pin from tbl_user where compid='$company_id') u on al.FirstApproval=u.pin
        LEFT JOIN (select name, email, pin from tbl_user where compid='$company_id') u2 on al.SecondApproval=u2.pin
        WHERE al.compid = '$company_id'");         
        
        $list = array();
        $counter = 0;
        
        if ($approval_level_result->num_rows > 0) {
        
            while($approval_level_row = $approval_level_result->fetch_assoc()){
                
                $user_names = $approval_level_row['UserNames'];
                $names = explode(",", $user_names);
                
                foreach ($names as $value) {
                    
                    if ($value == $pin){
                        
                        $approval = new approval();
                        $approval->set_approval_level($approval_level_row['ApprovalLevel']);
                        $approval->set_first_approval($approval_level_row['FirstApproval']);
                
                        $approval->set_first_approval_name($approval_level_row['firstname']);
                        $approval->set_first_approval_email($approval_level_row['firstemail']);
                        
                        $approval->set_second_approval($approval_level_row['SecondApproval']);
                        $approval->set_second_approval_name($approval_level_row['secondname']);
                        $approval->set_second_approval_email($approval_level_row['secondemail']);

                        $approval->set_approval_type($approval_level_row['ApprovalType']);
                        
                        $list[$counter] = $approval;
                        $counter = $counter + 1;
                    }
                }
            }
        }
        return $list;
    }
    
   
    function get_people_i_can_approve($company_id, $pin, $connection){
        
        $approval_level_result = $connection->query("Select UserNames, ApprovalLevel, FirstApproval, SecondApproval, 
        ApprovalType FROM approvallevel WHERE (FirstApproval = '$pin' or SecondApproval = '$pin') AND compid = '$company_id'");
        
        $list = array();
        $counter = 0;
        if ($approval_level_result->num_rows > 0) {
        
            while($approval_level_row = $approval_level_result->fetch_assoc()){
                
                $approver_level = "";
                if($approval_level_row['FirstApproval'] == $pin && $approval_level_row['SecondApproval'] != $pin){
                    $approver_level = "First Approval";
                }
                
                if($approval_level_row['SecondApproval'] == $pin && $approval_level_row['FirstApproval'] != $pin){
                     $approver_level = "Second Approval";
                }
                
                if($approval_level_row['FirstApproval'] == $pin && $approval_level_row['SecondApproval'] == $pin){
                     $approver_level = "Two Level";
                }                
                $approval = new approval2();
                $approval->set_approval_level($approver_level);
                $approval->set_approval_type($approval_level_row['ApprovalType']);
                $approval->set_pins($approval_level_row['UserNames']);  
                
                $list[$counter] = $approval;
                $counter = $counter + 1;

            }
        }
        return $list;
    } 


    function get_name_and_email($company_id, $pin){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }
        
        $data = Array();
        $data['name'] = '';
        $data['email'] = '';
        $counter = 0;

        $result = $connection->query("SELECT name, email FROM tbl_user WHERE compid ='$company_id' AND pin = '$pin'");
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $data['name'] = $row['name'];
                    $data['email'] = $row['email'];
                    $counter = $counter + 1;
                    return $data;
                }

            }
            else{
                return $data;
            }
    
        $connection->close(); // terminate database connection.
     
    }

    /*********************************************************************************************************************
        This function is used by a user to update its profile
        update_my_profile($_GET["companyid"], $_GET["pin"], $_GET["phone"], $_GET["city"], $_GET["address"]);
    **********************************************************************************************************************/
    function update_my_profile($company_id, $pin, $phone, $city, $address){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
        $sql = "UPDATE tbl_user SET phone = '$phone', addr = '$address', city ='$city' WHERE compid = '$company_id' AND pin = '$pin'";
        
        if ($connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"UPDATED");
                log_message($connection, "CHANGE PROFILE", $pin, $company_id, "MANAGE USERS", "MY PROFILE");
                echo json_encode($message); 
            }
            else{
                $message = array("message"=>"NOT UPDATED");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: ". $connection->error);
            echo json_encode($message);             
        }  
    }
        

    /**********************************************************************************************************************
        This function is used by a user to change its password
        change_my_password($_GET["companyid"], $_GET["pin"], $_GET["oldpassword"], $_GET["newpassword"]);
    ***********************************************************************************************************************/
    function change_my_password($company_id, $pin, $old_password, $new_password){
        
		$new_password = hash_password($new_password);
		
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }   

        $sql = "UPDATE tbl_user SET password1 = '$new_password' WHERE compid = '$company_id' 
        AND pin = '$pin' AND password1 = '$old_password'";
         
        if ($connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                log_message($connection, "CHANGE PASSWORD(MOBILE)", $pin, $company_id, "", "");
                $message = array("message"=>"UPDATED");
                echo json_encode($message); 
            }
            else{
                $message = array("message"=>" NOT UPDATED");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: ".$connection->error);
            echo json_encode($message); 
        }         
    }


    /*******************************************************************************************************************
        This function is used by a client to login
        login($_GET["companyid"], $_GET["pin"], $_GET["password"], $_GET["mode"]);
    *******************************************************************************************************************/
	function login($company_id, $pin, $password, $mode){
	
        if($mode == "USER"){
            $password = hash_password($password);
        }
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	
        
        $sql = "SELECT user.compid, user.userid, user.pin, user.imgpath, user.name2, 
            user.password1, user.emppriv, user.status, user.gender, user.birthday, user.phone, user.email, user.online, user.bg, 
            user.location AS locationid, l.location, user.city, user.state, user.addr, user.department, 
            user.emptype, user.usertype, user.device, jd.jobtitle, t1.shift AS workingshift, t2.shift AS nightshift, d.id AS departmentid, d.departname, parentdepartname, d.departhead, user2.name AS departmentheadname, user2.email AS departmentheademail, c.currency  
            FROM ((tbl_user user LEFT JOIN jobdesc jd ON user.jobtitle = jd.id) LEFT JOIN tamsshift t1 ON t1.id = user.shift) 
            LEFT JOIN tamsshift t2 ON t2.id = user.shift1 
            LEFT JOIN location1 l ON l.id = user.location 
            LEFT JOIN depart1 d ON d.id = user.department 
            LEFT JOIN tbl_user user2 ON user2.pin = d.departhead 
            LEFT JOIN payrollsettings ps ON user.compid = ps.compid 
            LEFT JOIN currency c ON ps.currency_id = c.id 
            WHERE user.compid = $company_id AND user.pin = $pin AND user.password1 = '$password' AND (user.status = 'Active' OR user.status = 'On leave')";
			
        
        
           $user = new user();  
        
           if($user_query_result = $connection->query($sql)){
               
            if ($user_query_result->num_rows > 0) {

                if($user_row = $user_query_result->fetch_assoc()){

                    $update = $connection->query("UPDATE tbl_user SET online=1,login_type='mobile' WHERE userid='".$user_row['userid']."'");

                    $user->set_login_status("SUCCESSFUL");
                    $user->set_company_id($user_row['compid']); // set company's id for the user
                    $user->set_userid($user_row['userid']); // set userid for object user
                    $user->set_pin($user_row['pin']); // set pin for object user
                    $user->set_password($user_row['password1']); // set pin for object user
                    $user->set_photo($user_row['imgpath']); // set photo path for object user
                    $user->set_name($user_row['name2']); // set name for object user
                    $user->set_privilege($user_row['emppriv']); // set privilege for object user
                    $user->set_status($user_row['status']); // set status for object user
                    $user->set_gender($user_row['gender']); // set gender for object user
                    $user->set_birthday($user_row['birthday']); // set birthday for object user
                    $user->set_phone($user_row['phone']); // set phone for object user
                    $user->set_email($user_row['email']); // set email for object user
                    $user->set_blood_group($user_row['bg']); // set blood group for object user
                    $user->set_online_status_code($user_row['online']); // set online status code for the user object

                    $location = new location();
                    $location->set_location_id($user_row['locationid']); // set location id for object location
                    $location->set_location_name($user_row['location']); // set location name for object location
                    $user->set_location($location); // set location for object user

                    $user->set_city($user_row['city']); // set city for object user
                    $user->set_state($user_row['state']); // set state for object user
                    $user->set_address($user_row['addr']); // set address for object user
                    $user->set_job_title($user_row['jobtitle']); // set job title for object user

                    $user->set_employment_type($user_row['emptype']); // set employment type for object user
                    $user->set_user_type($user_row['usertype']); // set user type for object user

                    $user->set_device($user_row['device']); // set device for object user

                    $department = new department();
                    $department->set_department_id($user_row['departmentid']); // set department id for object department
                    $department->set_department_name($user_row['departname']); // set department for object department
                    $department->set_parent_department_name($user_row['parentdepartname']); // set department id for object department
                    $department->set_department_head_id($user_row['departhead']); // set department head id(pin) for object department
                    $department->set_department_head_name($user_row['departmentheadname']); //set department head name for object department 
                    $department->set_department_head_email($user_row['departmentheademail']); // set department head email for object department 
                    $department->set_department_members(get_department_members($company_id, $user_row['departmentid'], $connection)); // set department members
                    $user->set_department($department);// set department for object user 


                    $user->set_working_shift($user_row['workingshift']);// set working shift for object user
                    $user->set_night_shift($user_row['nightshift']);// set night shift for object user

                    $user->set_people_to_approve_my_requests(get_people_to_approve_my_requests($user_row['compid'], $user_row['pin'], $connection));
                    $user->set_people_i_can_approve(get_people_i_can_approve($user_row['compid'], $user_row['pin'], $connection));

                    $user->set_leave_types(get_leave_types($user_row['compid'], $connection));
                    $user->set_loan_types(get_loan_types($user_row['compid'], $connection));
                    
                    $user->set_currency($user_row['currency']);
                    
                    $user->set_employee_statement_types(get_employee_statement_types($user_row['compid'], $connection));
                    log_message($connection, "LOGIN(MOBILE)", $pin, $company_id, "", "");
                    echo json_encode($user); // echo the object user as a JSON data	                
                }
            }
            else{
                echo json_encode($user);
            }      
        }else{
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message);           
        }
		        
        $connection->close(); // terminate database connection.
	}


    function get_department_members($company_id, $department_id, $connection){
	
        $sql = "SELECT u.name2 as name, u.pin from tbl_user u LEFT JOIN depart1 d ON d.id = u.department WHERE d.id = $department_id and u.compid = $company_id";
   
        if($result = $connection->query($sql)){
               
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $data[] = $row;    
                }
                
                return $data;
            }     
        }
        else{
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message);           
        }        
        
    }
 

    /************************************************************************************************
        This function is used by a user to view its corresponding colleagues status
        view_my_colleagues_status($_GET["companyid"], $_GET["pin"]);
    *************************************************************************************************/    
	function view_my_colleagues_status($company_id, $pin){
	
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	 	
	
        $sql = "SELECT user.compid, user.userid, user.pin, user.imgpath, 
        user.name2, user.emppriv, user.online, user.status, user.gender, user.birthday, user.phone, 
        user.email, user.bg, user.location AS locationid, l.location, user.state, user.addr, user.department, 
            user.emptype, user.usertype, user.device, jd.jobtitle, d.id AS departmentid, d.departname
            FROM (tbl_user user LEFT JOIN jobdesc jd ON user.jobtitle = jd.id)  
            LEFT JOIN location1 l ON l.id = user.location
            LEFT JOIN depart1 d ON d.id = user.department  
            WHERE user.compid = $company_id AND pin != $pin AND (user.status = 'Active' OR user.status = 'On leave')";        	
		
        
		$colleague_status_list = array();// The colleagues_status_list holds the all the colleagues_status for the specified company id.
        
        if($colleague_status_list_result = $connection->query($sql)){

            if ($colleague_status_list_result->num_rows > 0) {

                while($user_row = $colleague_status_list_result->fetch_assoc()){

                    $colleague = new colleague(); // create new colleague_status object
                    $colleague->set_userid($user_row['userid']); // set status for the colleague_status object
                    $colleague->set_status($user_row['status']); // set status for the colleague_status object
                    $colleague->set_photo($user_row['imgpath']); // set photo for the colleague_status object
                    $colleague->set_name($user_row['name2']); // set name for the colleague_status object
                    $colleague->set_privilege($user_row['emppriv']); // set privilege for the colleague_status object
                    $colleague->set_online_status_code($user_row['online']); // set online status code for the colleague_status object

                    $colleague->set_company_id($user_row['compid']); // set company's id for the user
                    $colleague->set_userid($user_row['userid']); // set userid for object user
                    $colleague->set_pin($user_row['pin']); // set pin for object user
                    $colleague->set_photo($user_row['imgpath']); // set photo path for object user
                    $colleague->set_privilege($user_row['emppriv']); // set privilege for object user
                    $colleague->set_status($user_row['status']); // set status for object user
                    $colleague->set_gender($user_row['gender']); // set gender for object user
                    $colleague->set_birthday($user_row['birthday']); // set birthday for object user
                    $colleague->set_phone($user_row['phone']); // set phone for object user
                    $colleague->set_email($user_row['email']); // set email for object user

                    $colleague->set_location_name($user_row['location']); // set location name for object user

                    $colleague->set_state($user_row['state']); // set state for object user
                    $colleague->set_address($user_row['addr']); // set address for object user
                    $colleague->set_job_title($user_row['jobtitle']); // set job title for object user

                    $colleague->set_department_name($user_row['departname']); // set department for object department                
                    array_push($colleague_status_list, $colleague);
                }	
            }            
        }else{
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message);           
        }
        
        
        $connection->close(); // terminate database connection.        
		        
		echo json_encode($colleague_status_list); // echo the colleagues_status_list array as a JSON data        
	}
    

    /*********************************************************************************************************************
        This function is used by the HR to update the status of a user.
        update_user_status($_GET["companyid"], $_GET["pin"], $_GET["status"]);
    **********************************************************************************************************************/
	function update_user_status($company_id, $pin, $status){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	 	
	
        $sql = "UPDATE tbl_user SET status = '$status' WHERE compid = '$company_id' AND pin = '$pin'";
        
        if ($connection->query($sql) === TRUE) {
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"USER STATUS UPDATED");
                echo json_encode($message);                 
            }
            else{
                $message = array("message"=>"UNABLE TO UPDATE USER STATUS");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }  
        
        $connection->close(); // terminate database connection.
	}


    /************************************************************************************************************************ 
        This function is called by a user to request a leave. 
        create_leave_request(
        $_GET["firstapprovalemail"], $_GET["secondapprovalemail"], $_GET["email"], $_GET["message"], $_GET["departmentid"],
        $_GET["companyid"], $_GET["pin"], $_GET["leavetype"], $_GET["start_date"], $_GET["end_date"], $_GET["locationid"]
        );
    *************************************************************************************************************************/
	function create_leave_request($first_approval_email, $second_approval_email, $email, $message, 
                               $department_id, $company_id, $pin, $leavetype, $start_date, $end_date, $location_id){
		
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }
        
	    $start_date = date("Y-m-d",strtotime($start_date));
	    $end_date = date("Y-m-d",strtotime($end_date));
        
	    $duration = intval((strtotime("$end_date") - strtotime("$start_date")) / (60 * 60 * 24));
	    $duration = $duration+1;
	    
        $month = date("m",strtotime($start_date));
	    $year = date("Y",strtotime($start_date));
        
        $diff = $duration;
        
        $sql1 = "select u.name2, u.pin, d.departname, m.leavetype AS leaveid, l.leavetype, l.duration as ApprovedDuration, sum(m.duration) as 'Usage', l.duration - sum(m.duration) as Remainder, m.status
from myleave m LEFT JOIN leave1 l ON l.id = m.leavetype 
LEFT JOIN tbl_user u ON u.pin = m.pin
LEFT JOIN depart1 d ON d.id = u.department
where m.compid = $company_id and m.pin = $pin and m.y = $year and u.compid = $company_id and m.leavetype = $leavetype 
group by m.leavetype order by u.pin ";
       
        if(($result = $connection->query($sql1)) ){
            
            if($row = $result->fetch_assoc() & ($result->num_rows > 0)){
                if( $diff > $row['Remainder'] ){
                    $message = array("message"=>"YOUR REQUEST HAS EXCEEDED THE APPROVE DURATION");
                    echo json_encode($message);   
                    return;
                }    
            }              
        }
        else {
            $message = array("message"=>"Error: " . $sql1 . "<br>" . $connection->error);
            echo json_encode($message); 
        }
        
        
       $sql2 = "INSERT INTO myleave(depart, compid, pin, m, y, leavetype, duration, sdat, edat, status, location) 
       VALUES('$department_id', '$company_id', '$pin', '$month', '$year', '$leavetype', 
       '$duration', '$start_date', '$end_date', 'Pending', '$location_id')"; 
        
        if ($connection->query($sql2) === TRUE) {
            
            
          if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"LEAVE REQUEST CREATED");
                echo json_encode($message); 
                // send email
                /*
                $leaveid = $connection->insert_id;
                $to = $first_approval_email;
                $subject = "Leave Request";
                $txt = "$message";
                $headers = "From: $email" . "\r\n" .
                "CC: $second_approval_email";
                mail($to,$subject,$txt,$headers);
                echo "Email sent";
                */              
            }
            else{
                $message = array("message"=>"UNABLE TO CREATE LEAVE REQUEST");
                echo json_encode($message); 
            }            
            
        } 
        else {
            $message = array("message"=>"Error: " . $sql2 . "<br>" . $connection->error);
            echo json_encode($message); 
        }
        
        $connection->close(); // terminate database connection.
	}


    /********************************************************************************************************************************** 
        This function is called by a user to update a leave request. 
        update_leave_request($_GET["leaveid"], $_GET["departmentid"], $_GET["companyid"], 
        $_GET["pin"], $_GET["leavetype"], $_GET["startdate"], $_GET["enddate"], $_GET["locationid"]
        );
    **********************************************************************************************************************************/
	function update_leave_request($leave_id, $department_id, $company_id, $pin, $leavetype, $start_date, $end_date, $location_id){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	 	
	
	    $start_date = date("Y-m-d",strtotime($start_date));
	    $end_date = date("Y-m-d",strtotime($end_date));
	    $duration = intval((strtotime("$end_date") - strtotime("$start_date")) / (60 * 60 * 24));
	    $duration = $duration+1;
	    $month = date("m",strtotime($start_date));
	    $year = date("Y",strtotime($start_date));
        
        $sql = "UPDATE myleave SET depart = '$department_id', compid = '$company_id', 
        pin = '$pin', m = '$month', y = '$year', leavetype = '$leavetype', 
        duration = '$duration', sdat = '$start_date', edat = '$end_date', status = 'Pending', 
        location = '$location_id' WHERE id = '$leave_id'";
        
        if ($connection->query($sql) === TRUE) {
        
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"LEAVE REQUEST UPDATED");
                echo json_encode($message); 
            }
            else{
                $message = array("message"=>"UNABLE TO UPDATED REQUEST");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
        $connection->close(); // terminate database connection.
	}


    /***************************************************************************************************************************************
        This function is called by a user to delete a leave request 
        delete_leave_request($_GET["firstapprovalemail"], $_GET["secondapprovalemail"], 
        $_GET["email"], $_GET["message"], $_GET["leaveid"]);
    ***************************************************************************************************************************************/
	function delete_leave_request($first_approval_email, $second_approval_email, $email, $message, $leave_id){
	
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	
        
        $sql = "DELETE From myleave WHERE id = '$leave_id'"; 
        
        if ($connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"LEAVE REQUEST DELECTED");
                echo json_encode($message); 
                    /*
                    $to = $first_approval_email;
                    $subject = "Delete Leave Request";
                    $txt = "$message";
                    $headers = "From: $email" . "\r\n" .
                    "CC: $second_approval_email";
                    mail($to,$subject,$txt,$headers);      
                    echo "Email sent";
                    */
            }else{
                $message = array("message"=>"UNABLE TO DELETE LEAVE REQUEST");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
        
        $connection->close(); // terminate database connection.
	}

    /******************************************************************************************************************* 
        This function is called by supervisor to approve leave request by its surbodinate
       approve_leave_request($_GET["leaveid"], $_GET["status"]);
    *******************************************************************************************************************/
    function approve_leave_request($leave_id, $status){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	 	
	
        $sql = "UPDATE myleave SET status = '$status' WHERE id = '$leave_id'";
        
        if ($connection->query($sql) === TRUE) {
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"LEAVE REQUEST APPROVED");
                echo json_encode($message); 
            }else{
                $message = array("message"=>"UNABLE APPROVE LEAVE REQUEST");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
        
        $connection->close(); // terminate database connection.
    
    }
    
    /******************************************************************************************************************* 
        This fucntion is used to view leave requests of a user or its surbodinates
        view_leave_requests($_GET["companyid"], $_GET["pins"]);
    ********************************************************************************************************************/
    function view_leave_requests($company_id, $pins){
    
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }
        
        
        $sql = "SELECT myl.id, user.userid, user.name2, myl.compid, myl.pin, myl.depart, myl.m, myl.y, myl.sdat,
                myl.edat, myl.status, l1.leavetype, myl.duration, loc.location AS locationname FROM myleave myl
                LEFT JOIN leave1 l1 ON myl.leavetype = l1.id 
                LEFT JOIN tbl_user user ON user.pin = myl.pin 
                LEFT JOIN location1 loc ON loc.id = user.location 
                WHERE myl.compid ='$company_id' AND user.compid='$company_id' AND myl.pin IN ($pins) order by myl.id desc"; 
        
        
        $leave_list = array();	
        
        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $leave = new leave();
                    $leave->set_leave_id($row['id']);
                    $leave->set_userid($row['userid']);
                    $leave->set_name($row['name2']);
                    $leave->set_company_id($row['compid']);
                    $leave->set_pin($row['pin']);
                    $leave->set_department($row['depart']);
                    $leave->set_month($row['m']);
                    $leave->set_year($row['y']);
                    $leave->set_start_date($row['sdat']);
                    $leave->set_end_date($row['edat']);
                    $leave->set_status($row['status']);
                    $leave->set_leave_type($row['leavetype']);
                    $leave->set_duration($row['duration']);
                    $leave->set_location($row['locationname']);
                    array_push($leave_list, $leave);
                }	

            }             
        }else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
  
        $connection->close(); // terminate database connection.
        echo json_encode($leave_list);
    }



    /******************************************************************************************************************* 
        This fucntion is used to view leave roaster of a user or its surbodinates
        view_leave_roaster($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["leavetype"]);
    ********************************************************************************************************************/
    function view_leave_roaster($company_id, $pins, $start_date, $end_date, $leave_type){
    
        
        $start_date = date("Y-m-d",strtotime($start_date));
	    $end_date = date("Y-m-d",strtotime($end_date));
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }
        
        
        $sql = "SELECT myl.id, user.userid, user.name2, myl.compid, myl.pin, myl.depart, myl.m, myl.y, myl.sdat,
                myl.edat, myl.status, l1.leavetype, myl.duration, loc.location AS locationname FROM myleave myl
                LEFT JOIN leave1 l1 ON myl.leavetype = l1.id 
                LEFT JOIN tbl_user user ON user.pin = myl.pin 
                LEFT JOIN location1 loc ON loc.id = user.location 
                WHERE myl.compid =$company_id AND user.compid=$company_id AND myl.pin IN ($pins) and sdat >= '$start_date' and edat <= '$end_date' and l1.leavetype = '$leave_type' order by myl.id desc";        
        
        
        $leave_list = array();	

        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $leave = new leave();
                    $leave->set_leave_id($row['id']);
                    $leave->set_userid($row['userid']);
                    $leave->set_name($row['name2']);
                    $leave->set_company_id($row['compid']);
                    $leave->set_pin($row['pin']);
                    $leave->set_department($row['depart']);
                    $leave->set_month($row['m']);
                    $leave->set_year($row['y']);
                    $leave->set_start_date($row['sdat']);
                    $leave->set_end_date($row['edat']);
                    $leave->set_status($row['status']);
                    $leave->set_leave_type($row['leavetype']);
                    $leave->set_duration($row['duration']);
                    $leave->set_location($row['locationname']);
                    array_push($leave_list, $leave);
                }	

            }             
        }else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
  
        $connection->close(); // terminate database connection.
        echo json_encode($leave_list);
    }



    /******************************************************************************************************************* 
        This fucntion is used to generate_leave_usage_summary of a user or its surbodinates
        generate_leave_usage_summary($_GET["companyid"], $_GET["pins"], $_GET["year"]);
    ********************************************************************************************************************/
    function generate_leave_usage_summary($company_id, $pins, $year){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }
        
        $sql = "select u.name2, u.pin, d.departname, m.leavetype AS leaveid, l.leavetype, l.duration as ApprovedDuration, sum(m.duration) as 'Usage', l.duration - sum(m.duration) as Remainder, m.status
from myleave m LEFT JOIN leave1 l ON l.id = m.leavetype 
LEFT JOIN tbl_user u ON u.pin = m.pin 
LEFT JOIN depart1 d ON d.id = u.department 
where m.compid = $company_id and m.pin in ($pins) and m.y = $year and u.compid = $company_id
group by m.leavetype order by u.pin; ";        
        
        $list = array();
        
        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $leaveusagesummary = new leaveusagesummary();
                    $leaveusagesummary->set_name($row['name2']);
                    $leaveusagesummary->set_pin($row['pin']);
                    $leaveusagesummary->set_department($row['departname']);
                    $leaveusagesummary->set_leave_type($row['leavetype']);
                    $leaveusagesummary->set_approved_duration($row['ApprovedDuration']);
                    $leaveusagesummary->set_remainder($row['Remainder']);
                    $leaveusagesummary->set_status($row['status']);
                    array_push($list, $leaveusagesummary);
                }
            }
        }else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
        
        $connection->close(); // terminate database connection.
        echo json_encode($list);        
                
    }


    /********************************************************************************************************************* 
        This fucntion is used to view exemption requests of a user or its surbodinates
        view_exemption_requests($_GET["companyid"], $_GET["pins"]);
    **********************************************************************************************************************/
    function view_exemption_requests($company_id, $pins){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }
        
        
        $sql = "SELECT e.id, user.userid, user.name2, depart1.departname, e.compid, e.pin, e.sdat, e.status, 
        e.reason, loc.location AS locationname FROM exempt e 
        LEFT JOIN tbl_user user ON user.pin = e.pin 
        LEFT JOIN depart1 ON user.department = depart1.id 
        LEFT JOIN location1 loc ON loc.id = user.location 
        WHERE e.compid = $company_id AND user.compid =$company_id AND e.pin in ($pins) order by e.id desc";         
        
        $exemption_list = array();	
		$counter = 0;
                
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $exemption = new exemption();
                    $exemption->set_exemption_id($row['id']);
                    $exemption->set_userid($row['userid']);
                    $exemption->set_name($row['name2']);
                    $exemption->set_company_id($row['compid']);
                    $exemption->set_department_name($row['departname']);
                    $exemption->set_pin($row['pin']);
                    $exemption->set_start_date($row['sdat']);
                    $exemption->set_status($row['status']);
                    $exemption->set_reason($row['reason']);
                    $exemption->set_location($row['locationname']);
                    array_push($exemption_list, $exemption);
                }	
            }              
            
        }else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
         
        $connection->close(); // terminate database connection.
        echo json_encode($exemption_list);        
    }


   /********************************************************************************************************************* 
        This fucntion is used to view exemption roaster of a user or its surbodinates
        view_exemption_roaster($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"]);
    **********************************************************************************************************************/
    function view_exemption_roaster($company_id, $pins, $start_date, $end_date){
        
        $start_date = date("Y-m-d",strtotime($start_date));
	    $end_date = date("Y-m-d",strtotime($end_date));

        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }
        
        
        $sql = "SELECT e.id, user.userid, user.name2, depart1.departname, e.compid, e.pin, e.sdat, e.status, 
        e.reason, loc.location AS locationname FROM exempt e 
        LEFT JOIN tbl_user user ON user.pin = e.pin 
        LEFT JOIN depart1 ON user.department = depart1.id 
        LEFT JOIN location1 loc ON loc.id = user.location 
        WHERE e.compid = $company_id AND user.compid = $company_id AND e.pin IN ($pins) and sdat >= '$start_date' and sdat <= '$end_date' order by e.id desc";         
        
        $exemption_list = array();	
                
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $exemption = new exemption();
                    $exemption->set_exemption_id($row['id']);
                    $exemption->set_userid($row['userid']);
                    $exemption->set_name($row['name2']);
                    $exemption->set_company_id($row['compid']);
                    $exemption->set_department_name($row['departname']);
                    $exemption->set_pin($row['pin']);
                    $exemption->set_start_date($row['sdat']);
                    $exemption->set_status($row['status']);
                    $exemption->set_reason($row['reason']);
                    $exemption->set_location($row['locationname']);
                    array_push($exemption_list, $exemption);
                }	
            }              
            
        }else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
         
        $connection->close(); // terminate database connection.
        echo json_encode($exemption_list);        
    }


   /********************************************************************************************************************* 
        This fucntion is used to view exemption summary of a user or its surbodinates
        view_exemption_summary($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"]);
    **********************************************************************************************************************/
    function view_exemption_summary($company_id, $pins, $start_date, $end_date){
        
        $start_date = date("Y-m-d",strtotime($start_date));
	    $end_date = date("Y-m-d",strtotime($end_date));

        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }
        
        
        $sql = "SELECT COUNT(e.pin) as totalexemption, e.id, user.userid, user.name2, depart1.departname, e.compid, e.pin, e.sdat, e.status, 
        e.reason, loc.location AS locationname FROM exempt e 
        LEFT JOIN tbl_user user ON user.pin = e.pin 
        LEFT JOIN depart1 ON user.department = depart1.id 
        LEFT JOIN location1 loc ON loc.id = user.location 
        WHERE e.compid = '$company_id' AND user.compid='$company_id' AND e.pin IN ('$pins') and sdat >= '$start_date' and sdat <= '$end_date' GROUP BY e.pin order by e.id desc";         
        
                
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                if($row = $result->fetch_assoc()){ 
                    $exemptionsummary = new exemptionsummary();
                    $exemptionsummary->set_pin($row['pin']);
                    $exemptionsummary->set_name($row['name2']);
                    $exemptionsummary->set_department($row['departname']);
                    $exemptionsummary->set_location($row['locationname']);
                    $exemptionsummary->set_total_exemptions($row['totalexemption']);
                    
                }
                else {
                    $message = array("message"=>"NO RECORDS FOUND");
                    echo json_encode($message); 
                }                
            }              
            
        }else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
         
        $connection->close(); // terminate database connection.
        echo json_encode($exemptionsummary); 
    }



    /************************************************************************************************************************ 
        This function is called by supervisor to approve exemption request by its surbodinate
       approve_exemption_request($_GET["exemptionid"], $_GET["status"]);
    ************************************************************************************************************************/
    function approve_exemption_request($exemption_id, $status){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	 	
	
        $sql = "UPDATE exempt SET status = '$status' WHERE id = '$exemption_id'";
        
        if ($connection->query($sql) === TRUE) {
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"EXEMPTION REQUEST APPROVED");
                echo json_encode($message); 
            }
            else{
                $message = array("message"=>"UNABLE TO APPROVE EXEMPTION REQUEST");
                echo json_encode($message); ;
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }     
    
                
        $connection->close(); // terminate database connection.
    }

    /************************************************************************************************************************ 
        This function is called by a user to create an exemption 
        create_exemption_request(
        $_GET["firstapprovalemail"], $_GET["secondapprovalemail"], $_GET["email"], $_GET["message"], $_GET["departmentid"],
        $_GET["companyid"], $_GET["pin"], $_GET["startdate"], $_GET["reason"], $_GET["location"] 
        );
    *************************************************************************************************************************/
	function create_exemption_request($first_approval_email, $second_approval_email, 
                                   $email, $message, $department_id, $company_id, $pin,  
                                   $start_date, $reason, $location_id){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }        
        
	    $start_date = date("Y-m-d",strtotime($start_date));
        
        $sql = "INSERT INTO exempt(depart, compid, pin, sdat, status, reason, loca) 
        VALUES('$department_id', '$company_id', '$pin', '$start_date', 'Pending', '$reason', '$location_id')"; 
                
        if ($connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                // send email
                $message = array("message"=>"EXEMPTION REQUEST CREATED");
                echo json_encode($message); 
                /*
                $leaveid = $connection->insert_id;
                $to = $first_approval_email;
                $subject = "Leave Request";
                $txt = "$message";
                $headers = "From: $email" . "\r\n" .
                "CC: $second_approval_email";
                mail($to, $subject,$txt, $headers);
                */
            }
            else{
                $message = array("message"=>"UNABLE TO CREATE EXEMPTION REQUEST");
                echo json_encode($message); 
            }            
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }          
        
                
        $connection->close(); // terminate database connection.
	}


    /********************************************************************************************************************************** 
        This function is called by a user to request a leave. 
        update_exemption_request($_GET["exemptionid"], $_GET["departmentid"], $_GET["companyid"], 
        $_GET["pin"], $_GET["leavetype"], $_GET["startdate"], $_GET["reason"], $_GET["locationid"]
        );
    **********************************************************************************************************************************/
	function update_exemption_request($exemption_id, $department_id, $company_id, 
                              $pin, $leavetype, $start_date, $reason, $location_id){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	 
        
        $start_date=date("Y-m-d",strtotime($start_date));
        
        $sql = "UPDATE exempt SET depart = '$department_id', compid = '$company_id', 
        pin = '$pin', sdat = '$start_date', status = 'Pending', reason = '$reason', location = '$location_id' WHERE id = '$exemption_id'";
        
        if ($connection->query($sql) === TRUE) {
        
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"EXEMPTION REQUEST UPDATED");
                echo json_encode($message); 
            }
            else{
                $message = array("message"=>"UNABLE TO UPDATE EXEMPTION REQUEST");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
        
                
        $connection->close(); // terminate database connection.
	}


    /******************************************************************************************************************************
        This function is called by a user to delete a specific exemption request 
        delete_exemption_request($_GET["firstapprovalemail"], 
        $_GET["secondapprovalemail"], 
        $_GET["email"], 
        $_GET["message"], $_GET["exemptionid"]);
    *******************************************************************************************************************************/
	function delete_exemption_request($first_approval_email, $second_approval_email, $email, $message, $exemption_id){
	
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	
        
        $sql = "DELETE From exempt WHERE id = '$exemption_id'"; 
        
        if ($connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"EXEMPTION REQUEST DELETED");
                echo json_encode($message); 
                /*
                $to = $first_approval_email;
                $subject = "Delete Exemption Request";
                $txt = "$message";
                $headers = "From: $email" . "\r\n" .
                "CC: $second_approval_email";
                mail($to,$subject,$txt,$headers);                      
                echo "Deleted successfully";
                */
            }
            else{
                $message = array("message"=>"UNABLE TO DELETE EXEMPTION");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }         			
                
        $connection->close(); // terminate database connection.
	}


    /******************************************************************************************************************************
        This function is called by a user to view its appraisal requests.  
        view_appraisal_requests($_GET["companyid"], $_GET["pins"]);
    *******************************************************************************************************************************/

    function view_appraisal_requests($company_id, $pins){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	
        
        $sql = "SELECT a.id, a.pin, user.name2, a.startdate, a.enddate, a.month, a.status, (a.grade + a.grade1) AS totalgrade
                             FROM appraisal a
                             LEFT JOIN tbl_user user on a.pin = user.pin
                             WHERE a.pin in ($pins) AND a.compid=$company_id AND user.compid=$company_id ORDER BY a.id DESC";
        
        
        $appraisal_list = array();	
        
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $appraisal = new appraisal(); // create a new appraisal object
                    $appraisal->set_appraisal_id($row['id']); // set id for object appraisal
                    $appraisal->set_pin($row['pin']); // set pin for object appraisal
                    $appraisal->set_name($row['name2']); // set name for object appraisal
                    $appraisal->set_start_date($row['startdate']);// set start_date for object appraisal
                    $appraisal->set_end_date($row['enddate']);// set end date for object appraisal
                    $appraisal->set_month($row['month']);// set month for object appraisal
                    $appraisal->set_status($row['status']);// set status for object appraisal
                    $appraisal->set_total_grade($row['totalgrade']); // set total grade for object appraisal
                    array_push($appraisal_list, $appraisal);
                }
            }            
        }
        
        $connection->close(); // terminate database connection.
        echo json_encode($appraisal_list);
    }


    /*************************************************************************************************************************************
        This function is called by a user to update its appraisal request.  
        update_appraisal_request($_GET["appraisalid"], $_GET["name"], 
        $_GET["startdate"], $_GET["enddate"], $_GET["goals"], $_GET["actual_goals"], 
        $_GET["supervisorgoals"], $_GET["goalsnotaccomplished"], $_GET["locationid"]);
    **************************************************************************************************************************************/
    function update_appraisal_request($appraisal_id, $name, $start_date, $end_date, $goals, 
                              $actual_goals, $supervisor_goals, $goals_not_accomplished, $location_id){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 	

	    $start_date = date("Y-m-d", strtotime($start_date));
	    $end_date = date("Y-m-d", strtotime($end_date));       
        
        $sql = "UPDATE appraisal
                             SET startdate = '$start_date',
                                 enddate = '$end_date',
                                 name2 = '$name',
                                 goals = '$goals',
                                 supgoals = '$supervisor_goals',
                                 accgoals = '$actual_goals',
                                 goalsnotaccomp = '$goals_not_accomplished',
                                 location = '$location_id'
                                 status = 'Pending'
                                 WHERE id = '$appraisal_id'";
        
        
        if ($connection->query($sql) === TRUE) {
    
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"APPRAISAL REQUEST UPDATED");
                echo json_encode($message); 
            }else{
                $message = array("message"=>"UNABLE TO UPDATE APPRAISAL REQUEST");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }          
        $connection->close(); // terminate database connection.
    }

    /***************************************************************************************************************************************
        This function is called by a user to create appraisal request 
        create_appraisal_request($_GET["companyid"], $_GET["pin"], $_GET["name"], 
        $_GET["startdate"], $_GET["enddate"], $_GET["departmentid"], $_GET["parentdepartment"], $_GET["goals"], $_GET["supervisorgoals"], $_GET["actualgoals"], $_GET["goalsnotaccomplished"], $_GET["locationid"]);
    ****************************************************************************************************************************************/
    function create_appraisal_request($company_id, $pin, $name, $start_date, $end_date, 
                                      $department_id, $parent_department, $goals, $supervisor_goals, $actual_goals, $goals_not_accomplished, $location_id){
	       
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
	    $start_date = date("Y-m-d",strtotime($start_date));
	    $end_date = date("Y-m-d",strtotime($end_date));
        
   
        $months = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $month_index = date("m",strtotime($start_date));
        $month = $months[$month_index-1]; 
            
        $sql = "INSERT INTO appraisal(startdate, enddate, month, name2, pin, compid, 
        department, parentdepart, goals, supgoals, accgoals, goalsnotaccomp, 
        location, status) 
        VALUES('$start_date', '$end_date', '$month', '$name', '$pin', '$company_id',
        '$department_id', '$parent_department', '$goals', '$supervisor_goals', '$actual_goals', 
        '$goals_not_accomplished', '$location_id', 'Pending')";
        
        if ($connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"APPRAISAL REQUEST CREATED");
                echo json_encode($message); 
            }else{
                $message = array("message"=>"UNABLLE TO CREATE APPRAISAL");
                echo json_encode($message); 
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }
        
        $connection->close(); // terminate database connection.
    }

 
    /*************************************************************************************************************************************
        This function is called by a user to delete its appraisal request.  
        delete_appraisal_request($_GET["appraisalid"]);
    **************************************************************************************************************************************/
    function delete_appraisal_request($appraisal_id){	        
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
        $sql = "DELETE FROM appraisal WHERE id = '$appraisal_id'";
        
        if ($connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"APPRAISAL DELETED");
                echo json_encode($message); 
            }
            else{
                $message = array("message"=>"UNABLE TO DELETE APPRAISAL");
                echo json_encode($message);
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }   
        
        $connection->close(); // terminate database connection.
    }                              
    /*************************************************************************************************************************************
        This function is called by users to view their sent sms.  
        sent_sms($_GET["companyid"], $_GET["pin"]);
    **************************************************************************************************************************************/
    function sent_sms($company_id, $pin){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
		$sentsms_list=array();
		
        $sql = "select send_sms_id,recipients_nums,message,sender_id,status,schedule_ts from send_sms where pin=$pin and compid=$company_id ";
        
         if ($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    array_push($sentsms_list, $row);
                }
            }            
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        
		echo json_encode($sentsms_list);
		
        $connection->close(); // terminate database connection.    
    }

	
	    /*************************************************************************************************************************************
        This function is called by a user to send sms($message, $sms_count, $recipients, $senderid, $date, $time, $company_id, $pin)  
        send_sms($_GET["smsmessage"], $_GET["smscount"], $_GET["recipients"], 
        $_GET["senderid"], $_GET["smsdate"], $_GET["smstime"], $_GET["companyid"], $_GET["pin"]);
    **************************************************************************************************************************************/
    function send_sms($sms_message, $sms_count, $recipients, $sender_id, $sms_date, $sms_time, $company_id, $pin){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        }         
        
        $connection->autocommit(FALSE);
        
        
        $recipients = explode(",", $recipients);
        $schedule_date_time = date("Y-m-d h:i:s", strtotime("$sms_date $sms_time"));
        $number_of_recipients = count($recipients);
        
        $sms_volumes = $number_of_recipients * $sms_count;   
        
        $date = date("Y-m-d"); 
        
        $sql =  "select sms_balance from tbl_user where compid = $company_id and pin = $pin";
           
        if ($result = $connection->query($sql)) {
    
            if($result->num_rows > 0){
               
                if($row = $result->fetch_assoc()){
                    
                    if($row["sms_balance"] >= $sms_volumes){
                        
                        foreach($recipients as $recipient){
                            
                            $pre = substr(trim($recipient), 0, 4);
                            
                            if($pre === '0803' || $pre === '0806' || $pre === '0703' || $pre === '0706' || 
                               $pre === '0813' || $pre === '0816' || $pre === '0811' || $pre === '0909' ||
                               $pre === '0805' || $pre === '0807' || $pre === '0705' || $pre === '0815' || 
                               $pre === '0817' || $pre === '0810' || $pre === '0809' || $pre === '0819' ||
                               $pre === '0802' || $pre === '0808' || $pre === '0708' || $pre === '0712' || 
                               $pre === '0812' || $pre === '0709' || $pre === '0818'){
                                
                               $recipient = substr_replace(trim($recipient), '234', 0 , 1); 
                                
                               $sql_insert = "insert into send_sms (recipients_nums, message, s_limit, flash, sender_id, pin, schedule_ts, sent_time, status, compid) values ('$recipient','$sms_message','$sms_count','0','$sender_id','$pin','$schedule_date_time','$date','pending','$company_id') ";    
                             // die($sql_insert);
                               $connection->query($sql_insert);
                                
                            }                   
                        }
                        
                        $sql_update = "update tbl_user set sms_balance = sms_balance - $sms_volumes where compid = $company_id and pin = $pin";
                    
                        
                        if($connection->query($sql_update)){
                            $connection->commit();
                            $message = array("message"=>"MESSAGE SENT");
                            echo json_encode($message);  
                        }
                    } 
                    else{
                        $message = array("message"=>"INUSUCFICIENT SMS BALANCE");
                        echo json_encode($message);
                    }                      
                }                           
            }
        } 
        else {
            $message = array("message"=>"Error: " . $sql . "<br>" . $connection->error);
            echo json_encode($message); 
        }          
        $connection->close(); // terminate database connection.              
        
    }
                        
    /*************************************************************************************************************************************
        This function is called by users to add contact to their phone book.  
        add_contact_to_phone_book($_GET["contactname"], $_GET["contactphone"], 
        $_GET["contactid"], $_GET["pin"], $_GET["address"], $_GET["gender"], $_GET["email"]);
    **************************************************************************************************************************************/
    function add_contact_to_phone_book($contact_name, $contact_phone, $company_id, $pin, $address, $gender, $email){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
            
        $sql = "INSERT INTO phonebook(rec_name, rec_phone, compid, pin, addr, gender, email) 
        VALUES('$contact_name', '$contact_phone', '$company_id', '$pin', '$address', '$gender', '$email')";
        
        if ($connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"Contact added to phone successfully");
                echo json_encode($message);                 
            }
            else{
                $message = array("message"=>"Unable to add contact to phone");
                echo json_encode($message);                 
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        $connection->close(); // terminate database connection.
    }

    /*************************************************************************************************************************************
        This function is called by users to delete contact from their phone book.  
        delete_phone_book_contact($_GET["phone_book_id"], $_GET["companyid"], $_GET["pin"]);
    **************************************************************************************************************************************/        
    function delete_phone_book_contact($phone_book_id, $company_id, $pin){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
            
        $sql = "DELETE phonebook WHERE id = $phone_book_id AND compid = $company_id AND pin = $pin";
        
        if ($connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"Contact deleted successfully");
                echo json_encode($message);                
            }
            else{
                $message = array("message"=>"Unable to delete contact");
                echo json_encode($message);                 
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }

        $connection->close(); // terminate database connection.
    }

    /*************************************************************************************************************************************
        This function is called by users to view their contacts from their phone book.  
        view_phone_book_contact_list($_GET["companyid"], $_GET["pin"]);
    **************************************************************************************************************************************/         
    function view_phone_book_contact_list($company_id, $pin){
        
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
                
        $sms_balance = array();
        $phonebook_list = array();
        $colleage_list = array();
        $bulk_list = array();
        
        $sql = "SELECT sms_balance from tbl_user where compid = $company_id and pin = $pin";
        
        if ($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                if($row = $result->fetch_assoc()){
                    array_push($sms_balance, $row);
                }
            }            
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }        
        
        
        $sql = "SELECT id,rec_name, rec_phone, compid, pin, addr, gender, email 
        FROM phonebook WHERE compid = $company_id AND pin = $pin";
        
        if ($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    array_push($phonebook_list, $row);
                }
            }            
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        
        
        $sql = "SELECT compid, pin, name2 as name, phone, email, gender, addr from tbl_user where compid = $company_id and pin != $pin and ucase(status) != 'INACTIVE' ";
        
        if ($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    array_push($colleage_list, $row);
                }
            }            
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }  
        
        
        $sql = "SELECT pin, compid, bulkname, rec_phone from bulkno WHERE compid = $company_id AND pin = $pin";
        
        if ($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    array_push($bulk_list, $row);
                }
            }            
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }         
        
        $contact_list=array("sms_balance"=>$sms_balance, "phonebook_list"=>$phonebook_list, "colleage_list"=>$colleage_list, "bulk_list"=>$bulk_list);

        $connection->close(); // terminate database connection.          
        echo json_encode($contact_list); 
    }
        
    /*************************************************************************************************************************************
        This function is called by users to update contacts from their phone book.  
        update_phone_book_contact($_GET["phonebookid"], $_GET["contactname"], $_GET["contactphone"], 
        $_GET["contactid"], $_GET["pin"], $_GET["address"], $_GET["gender"], $_GET["email"]);
    **************************************************************************************************************************************/
    function update_phone_book_contact($phone_book_id, $contact_name, 
                                       $contact_phone, $company_id, $pin, $address, $gender, $email){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
            
        $sql = "UPDATE phonebook 
        SET rec_name = '$contact_name', 
        rec_phone = '$contact_phone', compid = '$company_id', pin = '$pin', 
        addr = '$address', gender = '$gender', email = '$email' WHERE id = '$phone_book_id' ";
        
        if ( $connection->query($sql) === TRUE) {
            
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"Contact updated successfully");
                echo json_encode($message);                 
            }
            else{
                $message = array("message"=>"Unable to update contact");
                echo json_encode($message);                 
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        
        $connection->close(); // terminate database connection.    
    }


    /*************************************************************************************************************************************
        This function is called by a user to generate appraisal report for a specified range of date.  
        generate_appraisal_reports($_GET["companyid"], $_GET["pin"], $_GET["date"]);
    **************************************************************************************************************************************/
    function generate_appraisal_reports($company_id, $pin, $date){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
        list($year, $month) = explode("-", $date);
        $start_date = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
        $end_date = date('Y-m-t', mktime(0, 0, 0, $month, 1, $year));

        $sql = "select ap.id,ap.pin,u.name2,startdate,enddate,month,ap.status,(ap.grade+ap.grade1) totalgrade,sumgrade.sumtotal
						 from appraisal ap
					     left join tbl_user u on ap.pin=u.pin
					     join (select sum(grade + grade1) sumtotal from appraisal where compid=$company_id and pin=$pin and
                         (startdate between '$start_date' and '$end_date' or enddate between '$start_date' and '$end_date' ) ) sumgrade 
					     where ap.pin =$pin and ap.compid=$company_id and u.compid=$company_id
					     and (startdate between '$start_date' and '$end_date' 
					     or enddate between '$start_date' and '$end_date' ) 
					     ORDER BY startdate asc";

        
        $appraisal_list = array();	

        if($result = $connection->query($sql)){

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $appraisal = new appraisal(); // create a new appraisal object
                    $appraisal->set_appraisal_id($row['id']); // set id for object appraisal
                    $appraisal->set_pin($row['pin']); // set pin for object appraisal
                    $appraisal->set_name($row['name2']); // set name for object appraisal
                    $appraisal->set_start_date($row['startdate']);// set start_date for object appraisal
                    $appraisal->set_end_date($row['enddate']);// set end date for object appraisal
                    $appraisal->set_month($row['month']);// set month for object appraisal
                    $appraisal->set_status($row['status']);// set status for object appraisal
                    $appraisal->set_total_grade($row['totalgrade']); // set total grade for object appraisal
                    $appraisal->set_total_sum($row['sumtotal']); // set total sum for object appraisal
                    array_push($appraisal_list, $appraisal);
                }
            }             
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        
        $connection->close(); // terminate database connection.        
        echo json_encode($appraisal_list); 
    }

   /*************************************************************************************************************************************
        This function is called by users to generate punctuality reports
        generate_punctuality_reports($_GET["companyid"], $_GET["pin"], $_GET["startdate"], $_GET["end_date"], $_GET["exweekend"], $_GET["exholiday"]);
    **************************************************************************************************************************************/
    function generate_punctuality_reports($company_id, $pins, $start_date, $end_date, $ex_weekend, $ex_holiday){

        $start_date = date("Y-m-d",strtotime($start_date));
        $end_date = date("Y-m-d",strtotime($end_date));

        $datepass = getdatearr($start_date, $end_date, $ex_weekend);
        
        if($datepass === NULL || count($datepass) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }
              
        $dates = filter_out_holidays($company_id, $start_date, $end_date, $datepass, $ex_holiday, true);

        if($dates === NULL || count($dates) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }        
        
        $dates = implode(",", $dates);        
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
    
        $pin_list = explode(",", $pins);
        
        $punctuality_report_list = array(); 
        
        foreach($pin_list as $pin){
            $sql = "SELECT count(*) as punctnum, u.name2, u.pin, IFNULL(SEC_TO_TIME(AVG(TIME_TO_SEC(checkin))),'00:00:00') avg_time from tbl_checkinout ch
                                LEFT JOIN tbl_user u on ch.user_id = u.userid
                                WHERE ch.checkdate in ($dates) 
                                AND ch.checkin < ch.cit
                                AND u.pin = $pin 
                                AND u.compid = $company_id  
                                GROUP BY ch.user_id ";

            if($result = $connection->query($sql)){

                if ($result->num_rows > 0) {

                    if($row = $result->fetch_assoc()){
                         $punctuality = new punctuality();
                         $punctuality->set_name($row['name2']);   
                         $punctuality->set_pin($row['pin']);
                         $punctuality->set_punctuality_num($row['punctnum']);
                         $punctuality->set_average_time($row['avg_time']);
                         array_push($punctuality_report_list, $punctuality);  
                    }
                }
            }       
            else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }           
        }
               
        $connection->close(); // terminate database connection.    
        echo json_encode($punctuality_report_list);           
    }


   /*************************************************************************************************************************************
        This function is called by users to generate attendance summary reports
        generate_attendance_summary($_GET["companyid"], $_GET["pin"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
    **************************************************************************************************************************************/
    function generate_attendance_summary($company_id, $pins, $start_date, $end_date, $ex_weekend, $ex_holiday){
        
        $start_date = date("Y-m-d",strtotime($start_date));
        $end_date = date("Y-m-d",strtotime($end_date));
        
        $datepass = getdatearr($start_date, $end_date, $ex_weekend);
        
        if($datepass === NULL || count($datepass) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }
              
        $dates = filter_out_holidays($company_id, $start_date, $end_date, $datepass, $ex_holiday, true);

        if($dates === NULL || count($dates) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }        
        
        $dates = implode(",", $dates);        
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database         
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 

        $pin_list = explode(",", $pins);
        
        $attendance_summary_list = array();
        
        foreach($pin_list as $pin){
            
            $sql = "select name2, u.pin, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(ch.cot,ch.cit)))) exp_hours,
                             SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(ch.checkout,ch.checkin)))) total_hrs,
                             ifnull(chl.numlate,0) numlate,
                             SUM(ISNULL(ch.checkin)) noclockin,
                             SUM(ISNULL(ch.checkout)) noclockout,
                             count(exm.pin) numexempt,
                             count(lev.pin) numleave
                             from tbl_user u
                             left join(select * from tbl_checkinout where checkdate in ($dates) ) ch
                             on u.userid=ch.user_id
                             left join(select count(checkin)numlate,user_id,cit from tbl_checkinout where checkdate in ($dates) and cit<checkin GROUP BY user_id) chl
                             on u.userid=chl.user_id
                             left join(select pin from exempt where sdat in ($dates) and compid=$company_id  GROUP BY pin) exm
                             on u.pin=exm.pin
                             left join(select pin from myleave where sdat in ($dates) and compid=$company_id  GROUP BY pin) lev
                             on u.pin=lev.pin
                             where ch.checkdate in ($dates) 
                             and u.pin=$pin
                             and u.compid=$company_id
                             GROUP BY u.pin";

          if($result = $connection->query($sql)){

              if ($result->num_rows > 0) {

                    if($row = $result->fetch_assoc()){
                        $attendancesummary  = new attendancesummary(); 
                        $attendancesummary->set_name($row['name2']);
                        $attendancesummary->set_pin($row['pin']); 
                        $attendancesummary->set_expected_hours($row['exp_hours']);
                        $attendancesummary->set_total_hours($row['total_hrs']);
                        $attendancesummary->set_number_of_lateness($row['numlate']);
                        $attendancesummary->set_number_of_clock_in($row['noclockin']);
                        $attendancesummary->set_number_of_clock_out($row['noclockout']);
                        $attendancesummary->set_number_of_exemption($row['numexempt']);
                        $attendancesummary->set_number_of_leave($row['numleave']);
                        array_push($attendance_summary_list, $attendancesummary);    
                    }
               }                   
          }
          else {
            echo "Error: " . $sql . "<br>" . $connection->error;
          }
   
        }

        $connection->close(); // terminate database connection.  
        echo json_encode($attendance_summary_list);            
    }


   /*************************************************************************************************************************************
        This function is called by users to generate attendance reports
        generate_attendance($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
    **************************************************************************************************************************************/
    function generate_attendance($company_id, $pins, $start_date, $end_date, $ex_weekend, $ex_holiday){

        $start_date = date("Y-m-d",strtotime($start_date));
        $end_date = date("Y-m-d",strtotime($end_date));
        
        $datepass = getdatearr($start_date, $end_date, $ex_weekend);
        
        if($datepass === NULL || count($datepass) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }
              
        $dates = filter_out_holidays($company_id, $start_date, $end_date, $datepass, $ex_holiday, true);  
        
        if($dates === NULL || count($dates) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }        
        
        $dates = implode(",", $dates);
        
        $pin_list = explode(",", $pins);
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 

        $attendance_list = array();       
        
        foreach($pin_list as $pin){
            
            $sql = "SELECT u.pin,u.name2,u.department,IFNULL(ch.checkin,'00:00:00')checkin,IFNULL(ch.checkout,'00:00:00') checkout,ch.checkdate,IFNULL(TIMEDIFF(ch.checkout,ch.checkin),'00:00:00') as difference from tbl_checkinout ch
                                left join tbl_user u on ch.user_id=u.userid
                                where u.compid=$company_id
                                and u.pin  = $pin
                                and ch.checkdate in ($dates) 
                                order by ch.checkdate desc";            
                
          
            if($result = $connection->query($sql)){
              if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()){
                        $name = $row['name2'];
                        $pin = $row['pin'];
                        $department = $row['department'];
                        $attendance  = new attendance();
                        $attendance->set_name($name);
                        $attendance->set_pin($pin); 
                        $attendance->set_department($department);
                        $attendance->set_check_in($row['checkin']);
                        $attendance->set_check_out($row['checkout']);
                        $attendance->set_check_date($row['checkdate']);
                        $attendance->set_difference($row['difference']);
                        array_push($attendance_list, $attendance);
                        $a[]= $row['checkdate'];
                    }

                    $getarray1 = getdatearr($start_date, $end_date,$ex_weekend);
                    $getarray2 = filter_out_holidays($company_id, $start_date, $end_date, $getarray1, $ex_holiday, false);                  
                  
                    foreach($getarray2 as $date){

                        if(!in_array($date, $a)){
                            $attendance  = new attendance();
                            $attendance->set_name($name);
                            $attendance->set_pin($pin); 
                            $attendance->set_department($department);
                            $attendance->set_check_in("No Clock");
                            $attendance->set_check_out('No Clock');
                            $attendance->set_check_date($date);
                            $attendance->set_difference('00:00:00');
                            array_push($attendance_list, $attendance);
                        }
                    }                
               } 
                else{
                    
                    $getarray1 = getdatearr($start_date, $end_date,$ex_weekend);
                    $getarray2 = filter_out_holidays($company_id, $start_date, $end_date, $getarray1, $ex_holiday, false);                  
                  
                    $sql = "SELECT pin, name2, department FROM tbl_user WHERE pin = $pin and compid = $company_id";            


                    if($result = $connection->query($sql)){
                      
                            if ($result->num_rows > 0) {
                                if($row = $result->fetch_assoc()){
                                    $name = $row['name2'];  
                                    $department = $row['department'];
                                }
                            }
                    }else {
                        die("Connection failed: " . $connection->connect_error);
                    }        
                    
                    foreach($getarray2 as $date){                        
                        $attendance  = new attendance();
                        $attendance->set_name($name); 
                        $attendance->set_pin($pin); 
                        $attendance->set_department($department);
                        $attendance->set_check_in("No Clock");
                        $attendance->set_check_out('No Clock');
                        $attendance->set_check_date($date);
                        $attendance->set_difference('00:00:00');
                        array_push($attendance_list, $attendance);
                    }                      
                    
                }                
          }
          else {
              die("Connection failed: " . $connection->connect_error);
          }  
              
        }      
        
        $connection->close(); // terminate database connection.         
        echo json_encode($attendance_list);          
    }

   /*************************************************************************************************************************************
        This function is called by users to generate attendance deduction
        generate_attendance_deduction($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
    **************************************************************************************************************************************/
function generate_attendance_deduction($companyid, $pins, $start_date, $end_date, $ex_weekend, $ex_holiday){
        
 
        $from=date("Y-m-d",strtotime($start_date));
        $to=date("Y-m-d",strtotime($end_date));         
         
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
         
                 
        $pin_list = explode(",", $pins);
        $attendance_deduction_list = array();
        
        foreach($pin_list as $pin){
            
            $attendancededuction = new attendancededuction();
            $sql = "SELECT * FROM tbl_user where compid=$companyid and status='Active' and pin=$pin order by pin ";
            
            list($noclock_hour, $num_nclock, $num_lateness, $com_late)=explode("|",getatt_rule($companyid, $connection));
            if($result = $connection->query($sql)){
                if ($result->num_rows > 0) {

                   while($rows = $result->fetch_assoc()){
				    
                       $texphour=0; $thr=0; $tmin=0; $tsec=0; $exphour=0; 
					   $thourwork=0; $thr1=0; $tmin1=0; $tsec1=0;
					   $late=0; $noclock=0; $noclockin=0; $noclockout=0; $numexempt=0; $numleave=0;
					   $pin=$rows['pin']; $name=$rows['name2']; $userid=$rows['userid']; $staffid=$rows['staffid']; $cadre_id=$rows['grade']; $shift=$rows['shift'];

					   $today = $from;
					   $days = intval((strtotime("$to") - strtotime("$today")) / (60 * 60 * 24));
				                       
					   for($i = 1; $i <= $days + 1; $i++){
                        
                           $dayy = getdayy($today);
					       if($ex_weekend == "true" and (getday($today)=="Sun" or getday($today)=="Sat")){
				                $today = strtotime($today) + 169200;
						        $today = date('Y-m-d',$today);
				           }
				           elseif($ex_holiday == "true" and (comp_publicholiday($today, $companyid, $connection))){
						        $today = strtotime($today) + 169200;
					 	        $today = date('Y-m-d',$today);
						   }
						   else{
				                $tod[$i] = $today;
						        if(noclockin($today, $userid, $connection))
                                    $noclockin = $noclockin + 1;
						
						        if(noclockout($today, $userid, $connection))
                                    $noclockin = $noclockin + 1;
						            $today = strtotime($today) + 169200;
						            $today = date('Y-m-d', $today);
					       }
				      }
                       
				      $daily_rate = getdailyrate($cadre_id, $connection);
				      $shift = getmyshift($shift, $connection);
									
				      if($shift > 0)
                          $hourly_payrate = $daily_rate/$shift;
                      else
				          $hourly_payrate = $daily_rate/8;
				          $late_payrate = $hourly_payrate;
								
				          if($com_late=="Daily")
				                $late = getlatee(min($tod), max($tod), $userid, $ex_weekend, $ex_holiday, $connection);
				          elseif($com_late=="Hourly")
				                $late = getlatee_2(min($tod),max($tod), $userid, $ex_weekend, $ex_holiday, $connection);
				          elseif($com_late=="Minute")
							    $late = getlatee_3(min($tod), max($tod), $userid, $ex_weekend, $ex_holiday, $connection);
                       
                                $leave = 2 * getappleave($pin, $companyid, min($tod), max($tod), $connection);
							    $tnoclockin = $noclockin - $num_nclock - $leave;
										 
							    if($tnoclockin < 0)
                                    $tnoclockin = 0;
							        $noclockin_deduct = $hourly_payrate * $tnoclockin * $noclock_hour ;

							        $tlateness = $late - $num_lateness;
							    if($tlateness < 0)
                                    $tlateness = 0;
							        $nolateness_deduct = $late_payrate * $tlateness;
							        $td = $nolateness_deduct + $noclockin_deduct;  
                                              
                                    $attendancededuction->set_name($name);
                                    $attendancededuction->set_pin($pin);
                                    $attendancededuction->set_hourly_pay_rate(round($hourly_payrate, 2));
                                    $attendancededuction->set_no_of_noclocks($noclockin);
                                    $attendancededuction->set_noclock_disregards($num_nclock);
                                    $attendancededuction->set_leave_noclock_disregards($leave);
                                    $attendancededuction->set_total_noclocks($tnoclockin);
                                    $attendancededuction->set_no_of_lateness($late);       
                                    $attendancededuction->set_lateness_disregards($num_lateness);
                                    $attendancededuction->set_total_lateness($tlateness);
                                    $attendancededuction->set_total_noclocks_deductions($noclockin_deduct);
                                    $attendancededuction->set_lateness_deductions(round($nolateness_deduct,2));
                                    $attendancededuction->set_total_deductions(round($td, 2));
                                    array_push($attendance_deduction_list, $attendancededuction);    
                   }
                    
                }   
            }      
            else {
                die("Connection failed: " . $connection->connect_error);
            }             
        }
         
        $connection->close(); // terminate database connection.        
        echo json_encode($attendance_deduction_list);  
     }


    function noclockin($today, $userid, $connection){

        $sql = "select user_id from tbl_checkinout where user_id='$userid' and checkdate='$today'  and checkin <> '' limit 1 ";

        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                return false;           
            }
            else{
                return true;
            }
        }
        else {
            die("Connection failed: " . $connection->connect_error);
        }        
    }


    function noclockout($today, $userid, $connection){       
        
        $sql = "select user_id from tbl_checkinout where user_id='$userid' and checkdate='$today'  and checkout<>'' limit 1 ";
        
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                return false;            
            }
            else{
                return true;
            }
        }
        else {
            die("Connection failed: " . $connection->connect_error);
        }         
    }


/*************************************************************************************************************************************
        This function is a helper function used to get attendance rule of a company
 **************************************************************************************************************************************/
     function getatt_rule($companyid, $connection){
        $sql = "select * from  company where compid=$companyid";
         
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['num_noclock']."|".$row['num_nclock']."|".$row['num_lateness']."|".$row['com_late'];
            }   
        }      
        else {
            die("Connection failed: " . $connection->connect_error);
        }              
    } 

/*************************************************************************************************************************************
        This function is a helper function used to get daily rate
 **************************************************************************************************************************************/
     function getdailyrate($cadre_id, $connection){
        $sql = "select daily_rate from  grosspay where  cadre_id='$cadre_id'";
         
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['daily_rate'];
            }   
        }      
        else {
            die("Connection failed: " . $connection->connect_error);
        }              
    }
  

/*************************************************************************************************************************************
        This function is a helper function used to get shift
 **************************************************************************************************************************************/
     function getmyshift($shift, $connection){
        $sql = "select TIMEDIFF(cot,cit) as diff from tamsshift where id='$shift' ";
         
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hms = explode(":", $row['diff']);
                $diff = ($hms[0] + ($hms[1]/60) + ($hms[2]/3600));
			    return $diff;
            }   
        }      
        else {
            die("Connection failed: " . $connection->connect_error);
        }              
    }

/*************************************************************************************************************************************
        This function is a helper function used to get latee
 **************************************************************************************************************************************/
    function getlatee($mindate, $maxdate, $userid, $exweek, $pub, $connection){
        $status = 0;
        $sql = "select checkdate,checkin from tbl_checkinout where checkdate>='$mindate' and  checkdate<='$maxdate'  and 
     time(checkin)>time(cit) and user_id='$userid' and checkin<>'00:00:00' ";

        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    if(($exweek == "true" or $pub == "true") and (getday($row[checkdate]) =="Sun" or getday($row[checkdate]) == "Sat")){
                        $status = $status + 0;
                    }
                    else{ 
                        $status=$status+1;
                    }                    
                }
            }   
        }      
        else {
            die("Connection failed: " . $connection->connect_error);
        }         
        
        return $status;
    }


/*************************************************************************************************************************************
        This function is a helper function used to get latee2
 **************************************************************************************************************************************/
    function  getlatee_2($mindate, $maxdate, $userid, $exweek, $pub, $connection){        
        $status = 0;
        $sql = "select checkdate,checkin,TIMEDIFF(checkin,cit) AS tim 
         from tbl_checkinout where checkdate>='$mindate' and  checkdate<='$maxdate'  and 
         time(checkin)>time(cit) and user_id='$userid' and checkin<>'00:00:00' ";

        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    if(($exweek == "true" or $pub == "true") and (getday($row[checkdate]) =="Sun" or getday($row[checkdate]) == "Sat")){
                        $status = $status + 0;
                    }
                    else{ 
                        $status=$status+ceil(time_to_decimal($row[tim])/60);
                    }                    
                }
            }   
        }      
        else {
            die("Connection failed: " . $connection->connect_error);
        }         
        
        return $status;        
    }


    function  getlatee_3($mindate, $maxdate, $userid, $exweek, $pub, $connection){
        
        $status = 0;
        $sql = "select checkdate,checkin,TIMEDIFF(checkin,cit) AS tim from tbl_checkinout where checkdate>='$mindate' and  checkdate<='$maxdate'  and time(checkin)>time(cit) and user_id='$userid' and checkin<>'00:00:00' ";

        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    if(($exweek == "true" or $pub == "true") and (getday($row[checkdate]) =="Sun" or getday($row[checkdate]) == "Sat")){
                        $status = $status + 0;
                    }
                    else{ 
                        $status=$status+ceil(time_to_decimal($row[tim])/60);
                    }                    
                }
            }   
        }      
        else {
            die("Connection failed: " . $connection->connect_error);
        }         
        
        if($status)
            $status = $status/60;
        return $status;        
        
    }



/*************************************************************************************************************************************
        This function is a helper function used to get appleave
 **************************************************************************************************************************************/
     function getappleave($pin, $compid, $from, $to, $connection){
        $sql = "select sum(duration) duration from myleave where compid='$compid' and pin='$pin' and sdat>='$from' and edat<='$to' and status='Approved'";
         
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['duration'];
            }   
        }      
        else {
            die("Connection failed: " . $connection->connect_error);
        }              
    }

    function time_to_decimal($time) {
        $timeArr = explode(':', $time);
        $decTime = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60);
        return $decTime;
    }


    function get_approved_leave($pin, $company_id, $start_date, $end_date, $connection){
        
        $sql = "select sum(duration) duration from myleave where compid = $company_id and pin = $pin and sdat >= $start_date and edat <= $end_date and status = 'Approved' ";

        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()){
                    return $row['duration'];
                }
            }
        }                 
    }


    function getdatearr($from, $to, $exweek){
        
        $days = intval((strtotime("$to") - strtotime("$from")) / (60 * 60 * 24));
        
          if(isset($days)){   
              $from=strtotime($from)-84600;
              for($i=0; $i<=$days;$i++){
                 $from+=strtotime($from)+169200;
                 $from=date('Y-m-d',$from);

                  if($exweek=="true" && (date("D",strtotime($from))=="Sat" || date("D",strtotime($from))=="Sun") ){
                  }
				  else{
		
					  $datearr[]=$from;
				  }  

                  #echo "date is".date("D",strtotime($from))." date".$from."<br>";
                   # echo date("D",strtotime($from));

               }
           }
        
            return $datearr;
    }


   /*************************************************************************************************************************************
        This function is called by users to generate weekly summary report
        generate_weekly_summary_report($_GET["companyid"], $_GET["pins"], $_GET["date"], $_GET["exweekend"], $_GET["exholiday"]);
    **************************************************************************************************************************************/
    function generate_weekly_summary_report($company_id, $pins, $start_date, $end_date, $ex_weekend, $ex_holiday){

        $start_date = date("Y-m-d",strtotime($start_date));
        $end_date = date("Y-m-d",strtotime($end_date));            
        
        $datepass = getdatearr($start_date, $end_date, $ex_weekend);
        
        if($datepass === NULL || count($datepass) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }
              
        $dates = filter_out_holidays($company_id, $start_date, $end_date, $datepass, $ex_holiday, true);

        if($dates === NULL || count($dates) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }          
        
        $datelngth = count($dates);
        $dates =  implode(",",$dates); 
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
        $pin_list = explode(",", $pins);
        
        $weekly_summary_report_list = array();
        
        foreach($pin_list as $pin){
            
            $sql = "select u.name2, u.pin, d.departname,  
            format(sum(((case when(ch.checkin<=tm.cit) then 1 else 0 end)/$datelngth)*100),0) percent_present,
            format(sum(((case when(ch.checkin>tm.cit) then 1 else 0 end)/$datelngth)*100),0) percent_late,
            format(100-sum((((case when(ch.checkin) then 1 else 0 end)/$datelngth)*100)),0) percent_absent
               from tbl_checkinout ch
            left join tbl_user u on ch.user_id = u.userid
            left join tamsshift tm on u.shift = tm.id
            left join depart1 d on d.id = u.department
            where checkdate in ($dates)
            and u.pin = $pin and u.compid = $company_id
            group by ch.user_id";            

            if($result = $connection->query($sql)){

                if ($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()){
                        $weeklysummary = new weeklysummary();
                        $weeklysummary->set_name($row['name2']);
                        $weeklysummary->set_pin($row['pin']);
                        $weeklysummary->set_department($row['departname']);
                        $weeklysummary->set_no_of_times_punctual($row['percent_present']);
                        $weeklysummary->set_no_of_times_late($row['percent_late']);
                        $weeklysummary->set_no_of_times_absent($row['percent_absent']);
                        $sql2 = "select ch.user_id,u.name2,u.pin,ch.checkin,ch.checkdate,tm.cit,
                        UCASE((case when(ch.checkin>tm.cit) then 'L' else 'P' end)) pas
                        from tbl_checkinout ch
                        left join tbl_user u on ch.user_id=u.userid
                        left join tamsshift tm on u.shift=tm.id
                        where checkdate in ($dates)
                        and u.pin = $pin and u.compid = $company_id";

                        $result2 = $connection->query($sql2);
                        $list = array();

                        while($row2 = $result2->fetch_assoc()){
                            $daysummary = new daysummary();
                            $daysummary->set_check_date($row2['checkdate']);
                            $daysummary->set_pas($row2['pas']);
                            $daysummary->set_day(date("D", strtotime($row2['checkdate']))); 
                            array_push($list, $daysummary);
                            $a[]=$row2['checkdate'];
                        }

                        $getarray1 = getdatearr($start_date, $end_date,$ex_weekend);
                        $getarray2 = filter_out_holidays($company_id, $start_date, $end_date, $getarray1, $ex_holiday, false);                                    

                        foreach($getarray2 as $date){

                                if(!in_array($date, $a)){
                                    $daysummary = new daysummary();
                                    $daysummary->set_check_date($date);
                                    $daysummary->set_pas("A");
                                    $daysummary->set_day(date("D", strtotime($date)));                            
                                    array_push($list, $daysummary);   
                                }
                         }

                        $weeklysummary->set_days_summary($list);
                    }
                    array_push($weekly_summary_report_list, $weeklysummary);
                }else{
                    
                    $sql = "SELECT pin, name2, department FROM tbl_user WHERE pin = $pin and compid = $company_id";            


                    if($result = $connection->query($sql)){
                      
                        if ($result->num_rows > 0) {
                            if($row = $result->fetch_assoc()){
                                $name = $row['name2'];  
                                $department = $row['department'];
                            }
                        }
                    }else {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $weeklysummary = new weeklysummary();
                    $weeklysummary->set_name($row['name2']);
                    $weeklysummary->set_pin($row['pin']);
                    $weeklysummary->set_department($row['department']);
                    $weeklysummary->set_no_of_times_punctual(0);
                    $weeklysummary->set_no_of_times_late(0);
                    $weeklysummary->set_no_of_times_absent(100);
                    
                    $getarray3 = getdatearr($start_date, $end_date,$ex_weekend);
                    $getarray4 = filter_out_holidays($company_id, $start_date, $end_date, $getarray3, $ex_holiday, false);                                    
                    $list = array();
                    
                    foreach($getarray4 as $date){
                        $daysummary = new daysummary();
                        $daysummary->set_check_date($date);
                        $daysummary->set_pas("A");
                        $daysummary->set_day(date("D", strtotime($date)));                            
                        array_push($list, $daysummary);   
                    }                    
                    
                    
                    $weeklysummary->set_days_summary($list);
                    array_push($weekly_summary_report_list, $weeklysummary);
                }
                
            }
            else {
                die("Connection failed: " . $connection->connect_error);
            }                
            
        }
        
        $connection->close(); // terminate database connection.      
        echo json_encode($weekly_summary_report_list);        
    }


   /*************************************************************************************************************************************
        This function is called by users to generate latenesss report
        generate_lateness_report($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["ex_holiday"]);
    **************************************************************************************************************************************/
    function generate_lateness_report($company_id, $pins, $start_date, $end_date, $ex_weekend, $ex_holiday){
        
        $start_date = date("Y-m-d",strtotime($start_date));
        $end_date = date("Y-m-d",strtotime($end_date));        

        $datepass = getdatearr($start_date, $end_date, $ex_weekend); 
        
        if($datepass === NULL || count($datepass) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }
              
        $dates = filter_out_holidays($company_id, $start_date, $end_date, $datepass, $ex_holiday, true);

        if($dates === NULL || count($dates) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }        
                
        $dates =  implode(",", $dates);
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
                
        $pin_list = explode(",", $pins);
        
        $lateness_report_list = array();
        
        foreach($pin_list as $pin){
            
            $sql = "select ch.user_id, u.name2, u.pin, ch.checkin, ch.checkdate, concat(tm.cit,'-',tm.cot) shift, time(tm.cit) AS cit,  
            UCASE((case when(ch.checkin > time(tm.cit)) then 'L' else 'P' end)) pas
            from tbl_checkinout ch
            left join tbl_user u on ch.user_id = u.userid
            left join tamsshift tm on u.shift = tm.id 
            where ch.checkdate in ($dates) and u.pin = $pin and u.compid = $company_id and ch.checkin > time(tm.cit)";
            
            if($result = $connection->query($sql)){
                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()){
                        $lateness = new lateness();
                        $lateness->set_name($row['name2']);
                        $lateness->set_pin($row['pin']);
                        $lateness->set_date($row['checkdate']);
                        $lateness->set_day(date("D", strtotime($row['checkdate'])));
                        $lateness->set_shift($row['shift']);
                        $lateness->set_clock_in($row['checkin']);
                        $lateness->set_expected_clock_in($row['cit']);
                        array_push($lateness_report_list, $lateness);    
                    }
                }            
            }
          else {
             echo "Error: " . $sql . "<br>" . $connection->error;
          }    
          
        }
        $connection->close(); // terminate database connection.  
        
        echo json_encode($lateness_report_list);  
    }

   /*************************************************************************************************************************************
        This function is called by users to generate absentee report
        generate_absentee_report($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
    **************************************************************************************************************************************/
    function generate_absentee_report($company_id, $pins, $start_date, $end_date, $ex_weekend, $ex_holiday){
        
        $start_date = date("Y-m-d",strtotime($start_date));
        $end_date = date("Y-m-d",strtotime($end_date));
        
        $datepass = getdatearr($start_date, $end_date, $ex_weekend);
        
        if($datepass === NULL || count($datepass) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }
              
        $dates = filter_out_holidays($company_id, $start_date, $end_date, $datepass, $ex_holiday, true);  

        if($dates === NULL || count($dates) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }        
        
        $dates = implode(",", $dates);        

        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
                
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
        $pin_list = explode(",", $pins);
        
        $absentee_report_list = array();        
                
        foreach($pin_list as $pin){
            
            $sql = "select ch.user_id, u.name2, u.pin, ch.checkin, ch.checkdate,tm.cit 
            from tbl_checkinout ch
            left join tbl_user u on ch.user_id=u.userid
            left join tamsshift tm on u.shift=tm.id
            where checkdate in ($dates)
            and u.pin = $pin and u.compid = $company_id";
            
            if($result = $connection->query($sql)){
                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()){
                        $name = $row['name2'];
                        $pin = $row['pin'];
                        $a[] = $row['checkdate'];
                    }

                    $getarray1 = getdatearr($start_date, $end_date,$ex_weekend);
                    $getarray2 = filter_out_holidays($company_id, $start_date, $end_date, $getarray1, $ex_holiday, false);                                    
                    foreach($getarray2 as $date){

                        if(!in_array($date, $a)){
                            $absentee = new absentee();  
                            $absentee->set_name($name);
                            $absentee->set_pin($pin);
                            $absentee->set_check_date($date);
                            $absentee->set_day(date("D", strtotime($date)));                            
                            array_push($absentee_report_list, $absentee);    
                        }
                    }            
                }else{
                
                    $sql = "SELECT pin, name2, department FROM tbl_user WHERE pin = $pin and compid = $company_id";            


                    if($result = $connection->query($sql)){
                      
                        if ($result->num_rows > 0) {
                            if($row = $result->fetch_assoc()){
                                $name = $row['name2'];  
                                $department = $row['department'];
                            }
                        }
                    }else {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $getarray1 = getdatearr($start_date, $end_date,$ex_weekend);
                    $getarray2 = filter_out_holidays($company_id, $start_date, $end_date, $getarray1, $ex_holiday, false);  
                    
                    foreach($getarray2 as $date){
                        $absentee = new absentee();  
                        $absentee->set_name($name);
                        $absentee->set_pin($pin);
                        $absentee->set_check_date($date);
                        $absentee->set_day(date("D", strtotime($date)));                            
                        array_push($absentee_report_list, $absentee);    
                    }                     
                
                }            
            }
          else {
            echo "Error: " . $sql . "<br>" . $connection->error;
          }             
        }
        
        $connection->close(); // terminate database connection.            
        echo json_encode($absentee_report_list);           
    }

   /*************************************************************************************************************************************
        This function is called by users to generate attendance logs
        generate_attendance_logs($_GET["companyid"], $_GET["pins"], $_GET["startdate"], $_GET["enddate"], $_GET["exweekend"], $_GET["exholiday"]);
    *************************************************************************************************************************************/
    function generate_attendance_logs($company_id, $pins, $start_date, $end_date, $ex_weekend, $ex_holiday){

        $start_date = date("Y-m-d",strtotime($start_date));
        $end_date = date("Y-m-d",strtotime($end_date));       
        
        $datepass = getdatearr($start_date, $end_date, $ex_weekend); 
        
        if($datepass === NULL || count($datepass) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }
              
        $dates = filter_out_holidays($company_id, $start_date, $end_date, $datepass, $ex_holiday, true);

        if($dates === NULL || count($dates) == 0){
            $message = array("message"=>"NO RECORD FOUND");
            echo json_encode($message); 
            return;
        }        
                
        $dates =  implode(",", $dates);
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
        $attendance_log_list = array();         
        
        $sql = "Select userid, name2 as name, pin FROM tbl_user WHERE compid = $company_id and pin in ($pins)";

        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()){
                    
                    $name = $row['name'];
                    $userid = $row['userid'];
                    $pin = $row['pin'];
                    
                    $getarray1 = getdatearr($start_date, $end_date,$ex_weekend);
                    $getarray2 = filter_out_holidays($company_id, $start_date, $end_date, $getarray1, $ex_holiday, false);                                                        
                    foreach($getarray2 as $date){

                        $sql_clock_in = "select c.checkin AS CIN from  tbl_checkin c
                        where c.user_id = $userid
                        and c.checkdate = '$date' and c.type=0
                        order by c.checkin";

                        $sql_clock_out = "select c.checkin AS COUT from tbl_checkin c
                        where c.user_id = $userid
                        and c.checkdate = '$date' and c.type = 1 
                        order by c.checkin";

                        $sql_other_clock = "select c.checkin AS OTHC from  tbl_checkin c
                        where c.user_id = $userid
                        and c.checkdate = '$date' and c.type > 1
                        order by c.checkin";  


                        $result_clock_in = $connection->query($sql_clock_in);  
                        $result_clock_out = $connection->query($sql_clock_out);  
                        $result_other_clock = $connection->query($sql_other_clock);  

                        $attendancelog = new attendancelog();
                        $attendancelog->set_name($name);
                        $attendancelog->set_user_id($userid);
                        $attendancelog->set_pin($pin);
                        $attendancelog->set_check_date($date);
                        $attendancelog->set_day(date("D", strtotime($date)));

                        if($result_clock_in->num_rows > 0) {
                            while($row = $result_clock_in->fetch_assoc()){
                               $check_in_dates[] =  $row['CIN'];    
                               $attendancelog->set_check_in($check_in_dates);   
                            }
                        }

                        if($result_clock_out->num_rows > 0) {
                            while($row = $result_clock_out->fetch_assoc()){
                               $check_out_dates[] =  $row['COUT']; 
                               $attendancelog->set_check_out($check_out_dates);   
                            }
                        } 

                        if($result_other_clock->num_rows > 0) {
                            while($row = $result_other_clock->fetch_assoc()){
                               $other_clock_dates[] =  $row['OTHC']; 
                               $attendancelog->set_other_clock($other_clock_dates);   
                            }
                        }            

                        unset($check_in_dates);
                        unset($check_out_dates);
                        unset($other_clock_dates);

                        array_push($attendance_log_list, $attendancelog);    
                    }
                }
            }
        }else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        } 
        
        $connection->close(); // terminate database connection.   
                
        echo json_encode($attendance_log_list);  
    }
                     

   /**************************************************************************************************************************************
        This function is called by users to create loan request
        create_loan_request($_GET["companyid"], $_GET["pin"], $_GET["amount"], 
        $_GET["loan_type_id"], $_GET["charges"], $_GET["numpayment"], $_GET["deductionstartdate"], 
        $_GET["rate"], $_GET["details"], $_GET["loanpaymenttype"]);
    **************************************************************************************************************************************/
    function create_loan_request($company_id, $pin, $amount, $loan_type_id, $charges, $num_payment,  
                                 $deduction_start_date, $rate, $details, $loan_payment_type){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 
        
        $current_date = date("F,Y", strtotime("-1 month"));
        
        
        $sql = "select netpay, grosspay, monthyear, p.loancap,(case when (s.netpay >= p.loancap / 100 * s.grosspay) then 'true' else 'false' end) pay from  salaryschedule s left join payrollsettings p on s.compid = p.compid
where s.compid = $company_id and s.pin = $pin and monthyear = '$current_date' ";        

        $result = $connection->query($sql);
        
        
        if($result->num_rows > 0) {

            if($row = $result->fetch_assoc()){
                if($row['pay'] == true){
       
                    $deduction_start_date = date("Y-m-d", strtotime($deduction_start_date));
                    $dat = date("Y-m-d");
                    $deduction_end_date = date("Y-m-d", strtotime("+$num_payment month", strtotime($deduction_start_date)));        

                    $sql= "INSERT INTO loanrequest (pin, amount, loan_id, charges, compid, status, 
                    deduct_startdate, deduct_enddate, dat, rate, details, ptype) 
                    values('$pin', '$amount', '$loan_type_id', '$charges', '$charges', 
                    'Pending', '$deduction_start_date', '$deduction_end_date', '$dat', '$rate', '$details', '$loan_payment_type')";  

                    if ($connection->query($sql) === TRUE) {

                        if(mysqli_affected_rows($connection) > 0){
                            $message = array("message"=>"Loan request created successfully");
                            echo json_encode($message);
                        }
                        else{
                            $message = array("message"=>"Unable to create loan request");
                            echo json_encode($message);                            
                        }
                    } 
                    
                }else if($row['pay'] == false){
                    $message = array("message"=>"Sorry! You can not request for Loan at this time. (Loan Cap. Exceeded)");
                    echo json_encode($message);                    
                }
            }
        } 
    }


   /*************************************************************************************************************************************
        This function is called by users to view loan requests
        view_loan_requests($_GET["companyid"], $_GET["pin"]);
    **************************************************************************************************************************************/
    function view_loan_requests($company_id, $pin){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        } 
        
        $sql = "SELECT lr.id, lr.amount as principal, ifnull(lt.interestrate,lr.rate)/100*lr.amount as interest, ifnull(lt.loantype, 'Beginning Balance') loantype, ifnull(lt.interestrate,0) interestpercent, lr.status, lr.dat as requestdate, lr.charges as schedulepayment, p.amt AS amountpaid, lr.amount - p.amt AS duebalance 
FROM loanrequest lr LEFT JOIN loantype lt ON lt.id = lr.loan_id 
LEFT JOIN debitaccount da ON da.loanrequest_id = lr.id 
LEFT JOIN (Select sum(amount) amt,loanrequest_id from debitaccount WHERE STATUS = 'Paid' GROUP BY loanrequest_id) p ON lr.id = p.loanrequest_id 
Where lr.pin = $pin AND lr.compid = $company_id 
GROUP BY da.loanrequest_id
order by lr.id desc";

        $list = array();
        
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $loan  = new loan();
                    $loan->set_loan_id($row['id']);
                    $loan->set_loan_type($row['loantype']);
                    $loan->set_principal($row['principal']);
                    $loan->set_rate($row['interestpercent']);
                    $loan->set_interest($row['interest']);
                    $loan->set_request_date($row['requestdate']);
                    $loan->set_schedule_payment($row['schedulepayment']);
                    $loan->set_amount_paid($row['amountpaid']);
                    $loan->set_due_balance($row['duebalance']);
                    $loan->set_status($row['status']);
                    array_push($list, $loan);
                }
            }            
        }
      else {
        echo "Error: " . $sql . "<br>" . $connection->error;
      }    
        
      $connection->close(); // terminate database connection.         
      echo json_encode($list);
          
    }

   /*************************************************************************************************************************************
        This function is called by users to view loan requests by loan_type
        view_loan_requests_by_loan_type($_GET["companyid"], $_GET["pin"], $_GET["loantypeid"]);
    **************************************************************************************************************************************/
    function view_loan_requests_by_loan_type($company_id, $pin, $loan_type_id){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        } 
        
        if($loan_type_id == 0){
            $sql = "SELECT lr.id, lr.loan_id, lr.amount as principal, ifnull(lt.interestrate,lr.rate)/100*lr.amount as interest, ifnull(lt.loantype,'Beginning Balance') loantype, ifnull(lt.interestrate,0) interestpercent, lr.status, lr.dat as requestdate, lr.charges as schedulepayment, p.amt AS amountpaid, lr.amount - p.amt AS duebalance 
    FROM loanrequest lr LEFT JOIN loantype lt ON lt.id = lr.loan_id 
    LEFT JOIN debitaccount da ON da.loanrequest_id = lr.id 
    LEFT JOIN (Select sum(amount) amt,loanrequest_id from debitaccount WHERE STATUS = 'Paid' GROUP BY loanrequest_id) p ON lr.id = p.loanrequest_id 
    Where lr.pin = $pin AND lr.compid = $company_id 
    GROUP BY da.loanrequest_id
    order by lr.id desc";             
        }else{
        $sql = "SELECT lr.id, lr.loan_id, lr.amount as principal, ifnull(lt.interestrate,lr.rate)/100*lr.amount as interest, ifnull(lt.loantype,'Beginning Balance') loantype, ifnull(lt.interestrate,0) interestpercent, lr.status, lr.dat as requestdate, lr.charges as schedulepayment, p.amt AS amountpaid, lr.amount - p.amt AS duebalance 
FROM loanrequest lr LEFT JOIN loantype lt ON lt.id = lr.loan_id 
LEFT JOIN debitaccount da ON da.loanrequest_id = lr.id 
LEFT JOIN (Select sum(amount) amt,loanrequest_id from debitaccount WHERE STATUS = 'Paid' GROUP BY loanrequest_id) p ON lr.id = p.loanrequest_id 
Where lr.pin = $pin AND lr.compid = $company_id and lr.loan_id = $loan_type_id 
GROUP BY da.loanrequest_id
order by lr.id desc";            
            
        }
        
        $list = array();
        
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    $loan  = new loan();
                    $loan->set_loan_id($row['id']);
                    $loan->set_loan_type($row['loantype']);
                    $loan->set_principal($row['principal']);
                    $loan->set_rate($row['interestpercent']);
                    $loan->set_interest($row['interest']);
                    $loan->set_request_date($row['requestdate']);
                    $loan->set_schedule_payment($row['schedulepayment']);
                    $loan->set_amount_paid($row['amountpaid']);
                    $loan->set_due_balance($row['duebalance']);
                    $loan->set_status($row['status']);
                    array_push($list, $loan);

                }
            }            
        }
      else {
        echo "Error: " . $sql . "<br>" . $connection->error;
      }    
        
      $connection->close(); // terminate database connection.         
      echo json_encode($list); 
    }


   /*************************************************************************************************************************************
        This function is called by users to generate statistic report
        generate_statistic_report($_GET["companyid"], $_GET["leavepins"], $_GET["$exemptionpins"], $_GET["userid"]);
    **************************************************************************************************************************************/
    function generate_statistic_report($company_id, $leave_pins, $exemption_pins, $user_id){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database
        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);
        } 

        $sql = "Select * FROM tbl_user WHERE userid = $user_id";
        $result = $connection->query($sql);
        
        if($row = $result->fetch_assoc()){
            $pin = $row['pin'];
        }
        
                
        $sql = "select count(u.pin) activeemp,numemp.numofemp,exempt.pendingexmpt,allexempt.aexmpt,pleave.pendingleave,alleave.aleave,usronline.uonline,usroffline.uoffline from tbl_user u
						join(select count(ex.id) pendingexmpt from exempt ex
						where ex.compid=$company_id and ex.status='pending' and ex.pin in ($exemption_pins)) exempt
						join(select count(ex.id) aexmpt from exempt ex
						where ex.compid=$company_id and ex.pin in ($exemption_pins)) allexempt
						join(select count(pin)numofemp from tbl_user where compid = $company_id) numemp
						join(select count(lev.pin) pendingleave from myleave lev 
				        where lev.compid=$company_id and lev.status='pending' and lev.pin in ($leave_pins))pleave
                        join(select count(lev.pin) aleave from myleave lev
				        where lev.compid=$company_id and lev.pin in ($leave_pins))alleave
	                   join(select count(online)uonline from tbl_user where compid = $company_id and userid!= $user_id and status!='inactive' and online=1)usronline
                         join(select count(online)uoffline from tbl_user where compid = $company_id and userid != $user_id and status!='inactive' and online=0)usroffline
    					 where u.compid = $company_id and status!='inactive'
						group by u.compid";
        
        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {

                if($row = $result->fetch_assoc()){
                    
                    $statistic = new statistic();
                    $statistic->set_active_employee($row['activeemp']);
                    $statistic->set_num_of_employee($row['numofemp']);
                    $statistic->set_pending_exemption($row['pendingexmpt']);
                    $statistic->set_pending_leave($row['pendingleave']);
                    $statistic->set_approved_leave($row['aleave']);
                    $statistic->set_approved_exemption($row['aexmpt']);
                    $statistic->set_user_online($row['uonline']);
                    $statistic->set_user_offline($row['uoffline']);
   
                    $statistic->set_total_number_employee_present_today(get_total_number_employee_present_today($company_id, $connection));
                    $statistic->set_total_number_of_pending_appraisal(get_total_number_of_pending_appraisal($company_id, $pin, $connection));
                   # $statistic->set_inactive_employees(get_inactive_employees($company_id));
                    $statistic->set_other_statistics(get_other_statistics($company_id, $connection));
                }
            }
            else{
                $message = array("message"=>"NO RECORDS FOUND");
                echo json_encode($message);
            }             
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }  
        
        $connection->close(); // terminate database connection.         
        echo json_encode($statistic); 
    }


   /*************************************************************************************************************************************
        This function is a helper function used to  get other statistics
         get other statistics($company_id)
    **************************************************************************************************************************************/
    function get_other_statistics($company_id, $connection){
        
        $total_number_employee_present_today = 0; 
        
        $sql = "Select u.userid, u.name2 as name, u.pin,u.phone, ch.checkdate, ch.checkin, ch.cit
from tbl_user u LEFT JOIN (SELECT * from tbl_checkinout where checkdate = CURDATE()) ch ON u.userid = ch.user_id where u.compid = $company_id and UCASE(u.status) <> 'INACTIVE' ";
        
        if($result = $connection->query($sql)){
            
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        } 
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }        
    }


   /*************************************************************************************************************************************
        This function is a helper function used to get inactive employees
        get inactive employees($company_id)
    **************************************************************************************************************************************/
    function get_inactive_employees($company_id){
        
        $total_number_employee_present_today = 0;
        
		$connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        }  
        
        $sql = "select u.name2 as name, u.pin, u.department as departmentid, d.departname as departmentname
from tbl_user u LEFT JOIN depart1 d ON d.id = u.department 
where u.compid = $company_id and u.status = 'InActive'";
        
        if($result = $connection->query($sql)){
            
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        } 
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }        
    }


   /*************************************************************************************************************************************
        This function is a helper function used to get active employees
        get active employees($company_id)
    **************************************************************************************************************************************/
    function get_active_employees($company_id){
        
        $total_number_employee_present_today = 0;
        
		$connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        }  
        
        $sql = "select u.name2 as name, u.pin, u.department as departmentid, d.departname as departmentname 
from tbl_user u LEFT JOIN depart1 d ON d.id = u.department 
where u.compid = $company_id and u.status = 'InActive'";
        
        if($result = $connection->query($sql)){
            
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            } 
            return $data;
        } 
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }        
    }

   /*************************************************************************************************************************************
        This function is a helper function used to get total number employee present today
        get_total_employee_present_today($company_id)
    **************************************************************************************************************************************/
    function get_total_number_employee_present_today($company_id, $connection){
        
        $sql = "Select * from tbl_checkinout where comp_id = $company_id and checkdate = CURDATE() and (checkin <> '' || checkin <> Null)";
        
        if($result = $connection->query($sql)){
            
            $total_number_employee_present_today = $result->num_rows; 
            return $total_number_employee_present_today;
        } 
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }        
    }


   /*************************************************************************************************************************************
        This function is a helper function used to get total number of pending appraisal
        get total number of pending appraisal($GET['company_id'])
    **************************************************************************************************************************************/
    function get_total_number_of_pending_appraisal($company_id, $pin, $connection){
        
        $total_pending_appraisal = 0;
        
        $sql = "Select * FROM appraisal a where a.compid = $company_id and a.pin = $pin and a.status = 'Pending'";
        
        if($result = $connection->query($sql)){
            
            $total_pending_appraisal = $result->num_rows; 
            return $total_pending_appraisal;
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }

   /*************************************************************************************************************************************
        This function is a private function used to get category
    **************************************************************************************************************************************/
    function get_category($statement_id, $connection){
    
        $sql = "select category from taxpension where id = $statement_id";
        $result = $connection->query($sql);

        if($row = $result->fetch_assoc()){ 
            return $row['category'];
        }
    }


   /*************************************************************************************************************************************
        This function is a private function used to get all get_percent_by_cat belonging to a companyid
    **************************************************************************************************************************************/
    function get_percent_by_cat($connection, $company_id, $category){
        
        $sql = "select catpercent from taxpension where compid = $company_id AND category = '$category'";
        $result = $connection->query($sql);
        
        if($row = $result->fetch_assoc()){ 
            return $row['catpercent'];
        }
    }


   /*************************************************************************************************************************************
        This function is called by users to generate_employee_statement_report
        generate_employee_statement_report($_GET["companyid"], $_GET["pins"], $_GET["statementid"], $_GET["year"]);
    **************************************************************************************************************************************/

    function generate_employee_statement_report($company_id, $pin, $statement_id, $year){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        }   
        
        if($statement_id == "TAX"){
            $operation = "TAX";
        }
        else if($statement_id == "ALL"){
            $operation = "ALL";
        }else{
            $operation = get_category($statement_id, $connection);
        }
   
        $sql = "Select u.name2, u.pin, u.compid, s.grosspay, s.pension, s.tax, s.att_deduct, s.netpay, s.totaldeduction, s.monthyear 
From tbl_user u LEFT JOIN salaryschedule s ON s.compid = u.compid 
WHERE u.pin = $pin and u.compid = $company_id and s.compid = $company_id and s.pin = $pin and EXTRACT(YEAR FROM STR_TO_DATE(s.monthyear,'%M,%Y')) = '$year' order by STR_TO_DATE(s.monthyear,'%M,%Y')";        
        
        $list = array();
        
        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    if($operation == "TAX"){
                        $employeestatement = new employeestatement();
                        $employeestatement->set_name($row['name2']);
                        $employeestatement->set_pin($row['pin']);
                        $employeestatement->set_grosspay($row['grosspay']);
                        $employeestatement->set_tax($row['tax']); 

                        $employeestatement->set_netpay($row['netpay']);
                        $employeestatement->set_date($row['monthyear']);
                        array_push($list, $employeestatement);
                    }
                    else if($operation == "ALL"){
                                                
                        $employeestatement = new employeestatement();
                        $employeestatement->set_name($row['name2']);
                        $employeestatement->set_pin($row['pin']);
                        $employeestatement->set_grosspay($row['grosspay']);
                        $employeestatement->set_tax($row['tax']); 
                        
                        $name_value_list = array();
                        
                        $employeesstatementnamevaluepair1 = new employeesstatementnamevaluepair();
                        $employeesstatementnamevaluepair1->set_name_value("NHF", (get_percent_by_cat($connection, $company_id, "NHF") / 100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair1);
                            
                        $employeesstatementnamevaluepair2 = new employeesstatementnamevaluepair();
                        $employeesstatementnamevaluepair2->set_name_value("NHIS", (get_percent_by_cat($connection, $company_id, "NHIS") / 100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair2);
                        
                        $employeesstatementnamevaluepair3 = new employeesstatementnamevaluepair();
                        $employeesstatementnamevaluepair3->set_name_value("LAP", (get_percent_by_cat($connection, $company_id, "LAP") / 100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair3);
                        
                        $employeesstatementnamevaluepair4 = new employeesstatementnamevaluepair();
                        $employeesstatementnamevaluepair4->set_name_value("EMPLOYEEPENSION CONTRIBUTION", (get_percent_by_cat($connection, $company_id, "Pension") / 100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair4);
                        
                        $employeesstatementnamevaluepair5 = new employeesstatementnamevaluepair();                        
                        $employeesstatementnamevaluepair5->set_name_value("EMPLOYERPENSION CONTRIBUTION", (10/100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair5);
                        
                        $employeesstatementnamevaluepair6 = new employeesstatementnamevaluepair();
                        $employeesstatementnamevaluepair6->set_name_value("ATTENDANCE DEDUCTION", $row['att_deduct']);
                        array_push($name_value_list, $employeesstatementnamevaluepair6);
                        
                        $employeesstatementnamevaluepair7 = new employeesstatementnamevaluepair();                        
                        $employeesstatementnamevaluepair7->set_name_value("TOTAL DEDUCTION", $row['totaldeduction']); 
                        array_push($name_value_list, $employeesstatementnamevaluepair7);
                        
                        $employeestatement->set_employee_statement_type($name_value_list);
        
                        $employeestatement->set_netpay($row['netpay']);
                        $employeestatement->set_date($row['monthyear']);
                        array_push($list, $employeestatement);                     
                                                                     
                    }
                    else if($operation == "NHIS"){                       
                        $employeestatement = new employeestatement();
                        $employeestatement->set_name($row['name2']);
                        $employeestatement->set_pin($row['pin']);
                        $employeestatement->set_grosspay($row['grosspay']);
                        $employeestatement->set_tax($row['tax']); 
                        
                        $name_value_list = array();
                            
                        $employeesstatementnamevaluepair2 = new employeesstatementnamevaluepair();
                        $employeesstatementnamevaluepair2->set_name_value("NHIS", (get_percent_by_cat($connection, $company_id, "NHIS") / 100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair2);
                        
                        $employeestatement->set_employee_statement_type($name_value_list);
        
                        $employeestatement->set_netpay($row['netpay']);
                        $employeestatement->set_date($row['monthyear']);
                        array_push($list, $employeestatement);                          
                    }
                    else if($operation == "NHF"){                        
                        $employeestatement = new employeestatement();
                        $employeestatement->set_name($row['name2']);
                        $employeestatement->set_pin($row['pin']);
                        $employeestatement->set_grosspay($row['grosspay']);
                        $employeestatement->set_tax($row['tax']); 
                        
                        $name_value_list = array();
                        
                        $employeesstatementnamevaluepair1 = new employeesstatementnamevaluepair();
                        $employeesstatementnamevaluepair1->set_name_value("NHF", (get_percent_by_cat($connection, $company_id, "NHF") / 100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair1);
                        
                        $employeestatement->set_employee_statement_type($name_value_list);
        
                        $employeestatement->set_netpay($row['netpay']);
                        $employeestatement->set_date($row['monthyear']);
                        array_push($list, $employeestatement);                        
                    }                    
                    else if($operation == "LAP"){  
                                            
                        $employeestatement = new employeestatement();
                        $employeestatement->set_name($row['name2']);
                        $employeestatement->set_pin($row['pin']);
                        $employeestatement->set_grosspay($row['grosspay']);
                        $employeestatement->set_tax($row['tax']); 
                        
                        $name_value_list = array();
                        
                        $employeesstatementnamevaluepair3 = new employeesstatementnamevaluepair();
                        $employeesstatementnamevaluepair3->set_name_value("LAP", (get_percent_by_cat($connection, $company_id, "LAP") / 100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair3);
                        
                        
                        $employeestatement->set_employee_statement_type($name_value_list);
        
                        $employeestatement->set_netpay($row['netpay']);
                        $employeestatement->set_date($row['monthyear']);
                        array_push($list, $employeestatement);                         
                        
                    }
                    else if($operation == "Pension"){    

                        $employeestatement = new employeestatement();
                        $employeestatement->set_name($row['name2']);
                        $employeestatement->set_pin($row['pin']);
                        $employeestatement->set_grosspay($row['grosspay']);
                        $employeestatement->set_tax($row['tax']); 
                        
                        $name_value_list = array();
                        
                        $employeesstatementnamevaluepair4 = new employeesstatementnamevaluepair();
                        $employeesstatementnamevaluepair4->set_name_value("EMPLOYEEPENSION CONTRIBUTION", (get_percent_by_cat($connection, $company_id, "Pension") / 100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair4);
                        
                        $employeesstatementnamevaluepair5 = new employeesstatementnamevaluepair();                        
                        $employeesstatementnamevaluepair5->set_name_value("EMPLOYERPENSION CONTRIBUTION", (10/100) * $row['grosspay']);
                        array_push($name_value_list, $employeesstatementnamevaluepair5);
                        
                        $employeestatement->set_employee_statement_type($name_value_list);
        
                        $employeestatement->set_netpay($row['netpay']);
                        $employeestatement->set_date($row['monthyear']);
                        array_push($list, $employeestatement);                                                                   
                    }
                    
                }
            }
        }        
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }         
        
        $connection->close(); // terminate database connection.    
        echo json_encode($list);
    }
    
	   /*************************************************************************************************************************************
        This function is called by users to generate_employee_payslip
        generate_employee_payslip($_GET["companyid"], $_GET["pin"], $_GET["month"], $_GET["year"]);
    **************************************************************************************************************************************/
    function generate_employee_payslip($compid, $pin, $month, $year) { 
        
		$connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        }  
		
		$monthyear=$month.",".$year;
		$datetouse=date("Y-m-d",strtotime($monthyear));
		$from=date("Y-m-01",strtotime($datetouse));
		$to=date("Y-m-t",strtotime($datetouse));
		//die($monthyear);

		$sql="select pin,userid,name2,u.grade cadreid,g.grosspay,g.tax/12 taxamount,g.remove_sd,c.comprname,d.departname,
			  cd.grade,ifnull(sl.att_deduct,0) att_deduct,ifnull(sl.netpay,0) netpay,
			  ifnull((case when(g.remove_sd='Grosspay') then g.grosspay/12 else (g.grosspay/12)*al.gp/100   end),0) sd_amount,
			  g.tax/12 taxamount,(case when(g.allow>0) then g.allow/12 else 0 end) marginalallowance
			  from tbl_user u
			  left join grosspay g on u.grade=g.cadre_id
			  left join company c on u.compid=c.compid
			  left join depart1 d on u.department=d.id
			  left join( select att_deduct,compid,netpay from salaryschedule where pin=$pin and compid=$compid and monthyear='$monthyear' ) sl on  u.compid=sl.compid
			  left join(select gross_percent gp,compid from allowancename where allowancename='Basic Salary') al on u.compid=al.compid
			  left join cadre cd on u.grade=cd.id
			  where pin=$pin and u.compid=$compid and g.compid=$compid";
			 
		if($result=$connection->query($sql))
		{
			if($result->num_rows>0){
				$row=$result->fetch_assoc();
				$data1=$row;
				$cadre_id=$row['cadreid'];
				$sd_amount=$row['sd_amount'];
				$grossamount=$row['grosspay']/12;
			}
		}
		
		$sql2="SELECT al.*,u.pin,sum(g.grosspay/12*gross_percent)/100 amount from allowancename al
			   left join tbl_user u on al.compid=u.compid
			   left join grosspay g on u.grade=g.cadre_id
			   where al.compid=$compid and pin=$pin and u.compid=$compid
			   group by al.id;";
		
		if($result2=$connection->query($sql2)){
			if($result2->num_rows>0){
				while($row2=$result2->fetch_assoc()){
					$data2[]=$row2;
				}
			}
		}
		
		$sql3="SELECT catname,catpercent,cadre from taxpension t where t.compid=$compid";
		
		if($result3=$connection->query($sql3)){
			if($result3->num_rows>0){
				while($row3=$result3->fetch_assoc()){
					$cadres=explode(",",$row3['cadre']);
					if(in_array($cadre_id,$cadres,true)){
						$amount=$sd_amount*$row3['catpercent']/100;
						$datain=array("catname"=>$row3['catname'],"catpercent"=>$row3['catpercent'],"amount"=>$amount);
						$data3[]=$datain;
					}
				}
			}
		}
		
		$sql4="SELECT lr.id,(case when(lr.loan_id=-1) then 'Beginning Balance' else (select loantype from  loantype where  id=lr.loan_id) end)loantype,
			   lr.amount,lr.dat,ifnull(ap.amount,0) amtdeduct,ifnull((lr.amount-ap2.amount),0) amtdue
			   from loanrequest lr
			   left join(select sum(amount) as amount,loanrequest_id from  debitaccount where pin=$pin  and compid=$compid and status='Paid' and dat BETWEEN '$from' and '$to' group by loanrequest_id) ap
			   on lr.id=ap.loanrequest_id
			   left join(select sum(amount) as amount,loanrequest_id from  debitaccount where pin=$pin  and compid=$compid and status='Paid' group by loanrequest_id) ap2
			   on lr.id=ap2.loanrequest_id
			   where compid=$compid and pin=$pin";
		
		if($result4=$connection->query($sql4)){
			if($result4->num_rows>0){
				while($row4=$result4->fetch_assoc()){
					$data4[]=$row4;
				}
			}
		}
		
		$sql5 = "SELECT * from contribution  where compid=$compid and con_type='Monthly Remittance'";
		
		if($result5=$connection->query($sql5)){
			if($result5->num_rows>0){
				while($row5=$result5->fetch_assoc()){
					$cadres2=explode(",",$row5['cadre']);
					if(in_array($cadre_id,$cadres2,true)){
						$amount2=$grossamount * $row5['con_percent']/100;
						$datain2=array("con_name"=>$row5['con_name'],"amount"=>$amount);
						$data5[]=$datain2;
					}
				}
			}
		}
		
		$datapayslip=array("payslip"=>$data1,"Allowance_Breakdown"=>$data2,"statutory_deduction"=>$data3,"loan_deduction"=>$data4,"contribution"=>$data5);
        
        $connection->close(); // terminate database connection.    
		echo json_encode($datapayslip);
	}
	

   /*************************************************************************************************************************************
        This function is called by users to get mobileversion
        get_mobileversion();
    **************************************************************************************************************************************/
    function get_mobileversion(){
        
		$connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        }  
        
        $sql = "SELECT mobileversion FROM tbl_mobileversion";
        
        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {

                if($row = $result->fetch_assoc()){ 
                    $mobileversion = new mobileversion();
                    $mobileversion->set_mobileversion($row["mobileversion"]);
                }
            }
        }else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }         
        
        $connection->close(); // terminate database connection.    
        echo json_encode($mobileversion);        
    }


   /******************************************************************************************************************************************
        This function is called by users to register mobile device
        register_mobile_device($_GET["manufacturer"], $_GET["model"], $_GET["platform"],
        $_GET["uuid"], $_GET["version"], $_GET["appversion"],$_GET["pin"], $_GET["compid"])
    ******************************************************************************************************************************************/
    function register_mobile_device($manufacturer, $model, $platform, $uuid, $version, $appversion, $pin, $compid){
        
		$connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        } 
        
        $sql = "SELECT * FROM mobiledevices WHERE compid = $compid and pin = $pin";
        
        if($result = $connection->query($sql)){

            if($result->num_rows > 0) {

                if($row = $result->fetch_assoc()){
                    $message = array("message"=>"MOBILE DEVICE IS ALREADY REGISTERED");
                    echo json_encode($message); 
                    return;
                }
            }                      
        }
        
		$datetime=date("Y-m-d H:i:s");
        $sql = "INSERT INTO mobiledevices (manufacturer, model, platform, uuid, version, appversion, pin, compid,datetime) VALUES('$manufacturer', '$model', '$platform', '$uuid', '$version', '$appversion', '$pin', '$compid','$datetime')";
        
        if ($connection->query($sql) === TRUE) {
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"SUCCESSFUL");
                echo json_encode($message); 
            }
            else{
                $message = array("message"=>"UNSUCCESSFUL");
                echo json_encode($message); 
            }            
        }        
        else {
            $message = array("message"=>"Error: ". $connection->error);
            echo json_encode($message);             
        }
        
        $connection->close(); // terminate database connection.    
    }
	
	 
/******************************************************************************************************************************************
        This function is called by users to signin via their mobile
        mobile_signin($_GET["userid"], $_GET["pin"], $_GET["companyid"], $_GET["type"], $_GET["address"], $_GET["address2"], $_GET["city"])
    ******************************************************************************************************************************************/
    function mobile_signin($user_id, $pin, $company_id, $type, $address, $address2, $city){     
        
        $clock_time = date("Y-m-d H:i:s");
        $date_created= date("Y-m-d H:i:s");

        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        } 
        
        $sql = "INSERT INTO tbl_mobile_checkin (user_id, pin, compid, clocktime, datecreated, type, address, address2, city, status) VALUES('$user_id', '$pin', '$company_id', '$clock_time', '$date_created', '$type', '$address', '$address2', '$city', 'Pending')";
        
        if ($connection->query($sql) === TRUE) {
            if(mysqli_affected_rows($connection) > 0){
                $message = array("message"=>"SUCCESSFUL");
                echo json_encode($message); 
            }
            else{
                $message = array("message"=>"UNSUCCESSFUL");
                echo json_encode($message); 
            }            
        }        
        else {
            $message = array("message"=>"Error: ". $connection->error);
            echo json_encode($message);             
        }
        
        $connection->close(); // terminate database connection.    
        
    }

/***************************************************************************************************************************************
        This function is called to get chat messages associated with a user ***************************************************************************************************************************************/
    function get_chat_messages($userid){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
            // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        } 
        
        $sql =  "SELECT from1, to1, msg, time2 FROM Chat WHERE from1 = $userid || to1 = $userid";
        
        $chat_list = array();
    
        if($result = $connection->query($sql)){

            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){
                    array_push($chat_list, $row);
                }
            }                      
        }
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        
        $connection->close(); // terminate database connection.    
        echo json_encode($chat_list);    
    }

   /***************************************************************************************************************************************
        This helper function is called to filter out holidays associated with a company
 **************************************************************************************************************************************/
    function filter_out_holidays($company_id, $start_date, $end_date, $date_array_list, $ex_holiday, $how){         
          
        if($ex_holiday == "false"){
             $date_array_list=$date_array_list;        
        }
        else{
            $start_date = date("Y-m-d",strtotime($start_date));
            $end_date = date("Y-m-d",strtotime($end_date)); 
        
            $datepass = getdatearr($start_date, $end_date, false); 
                   // $datepass =  implode(",", $datepass);
            
            $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
            // Check connection status
            if ($connection->connect_error) {     
                die("Connection failed: " . $connection->connect_error);            
            } 
            
            $holidays = array();
            $sql = "select * from holiday where compid = $company_id";
     
            
            if($result = $connection->query($sql)){

                if ($result->num_rows > 0) {
 
                    while($row = $result->fetch_assoc()){   
        
                         foreach($datepass as $date){
                             if($date >= $row['sdat'] && $date <= $row['edat']){   
                                 array_push($holidays, $date);
                             }
                         } 
                    }
                }
               
            }
            else {
                $message = array("message"=>"Error: ". $connection->error);
                echo json_encode($message);             
            }            
            
            $holidays = array_unique($holidays);
        
            foreach($holidays as $day){ 
        
                if (in_array($day, $date_array_list)) {
                    unset($date_array_list[array_search($day, $date_array_list)]); 
                } 
            }
        }
        
        if($how)
        {
            $finaldatearr=array();
            foreach($date_array_list as $dates)
            {
                array_push($finaldatearr,"'".$dates."'");
            }
            return $finaldatearr;
        }
        else{               
            return $date_array_list; 
        }
        
        $connection->close(); // terminate database connection.    
    }

/**************************************************************************************************************************************
        This helper function is called to log message related to users action
 ***************************************************************************************************************************************/
    function log_message($connection, $operation, $pin, $company_id, $module, $submodule){

        $today = date("Y-m-d H:i:s");    
        $dat = date("Y-m-d", strtotime($today));
        $time = date("H:i:s", strtotime($today));;
        
        $sql = "INSERT INTO log (action, user, dat, time, compid, module, submodule) VALUES('$operation', '$pin', '$dat', '$time', '$company_id', '$module', '$submodule')";

        $connection->query($sql);         
    }
    

/**************************************************************************************************************************************
        This function is called to get account type
 ***************************************************************************************************************************************/
    function get_account_type($company_id){
        
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
        // Check connection status
        
        $sql = "select accounttype, compid from company where compid = $company_id";        
        
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        } 
        
        if($result = $connection->query($sql)){
            if ($result->num_rows > 0) {

                if($row = $result->fetch_assoc()){
                    
                    if($row['accounttype'] == "Premium"){
                        $message = array("message"=>"PREMIUM");
                        echo json_encode($message); 
                    }
                    else if($row['accounttype'] == "Classic"){
                        $message = array("message"=>"CLASSIC");
                        echo json_encode($message);
                    }
                       
                }
            }            
        }
      else {
         echo "Error: " . $sql . "<br>" . $connection->error;
      }         
     
      $connection->close(); // terminate database connection.    
    }

/**************************************************************************************************************************************
        This function is called to get company tams ambassadors
 **************************************************************************************************************************************/

    function get_company_tams_ambassadors($from, $to, $companyid, $view, $location, $department){
                
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
            // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        }   

        $from=date("Y-m-d",strtotime($from));
        $to=date("Y-m-d",strtotime($to));
        $dates=implode(",",remove_weekend($from, $to, "true", "true", $companyid, $connection));
        $expclock  = count(explode(",",$dates));          
        
        if($view=="All Staff"){
            $sql = "select u.name2,u.pin, SEC_TO_TIME(AVG(TIME_TO_SEC(c.checkin))) as avgtime ,count(*) clocks, SEC_TO_TIME(AVG(TIME_TO_SEC(c.cit))) as cit,SEC_TO_TIME(AVG(TIME_TO_SEC(c.cit)-TIME_TO_SEC(c.checkin))) as diff,SEC_TO_TIME(AVG(TIME_TO_SEC(c.checkout)-TIME_TO_SEC(c.cot))) as diffout
    from tbl_checkinout c,tbl_user u where c.checkdate>='$from' and  c.checkdate<='$to'  and TIME_TO_SEC(c.checkin)<=TIME_TO_SEC(cit) and TIME_TO_SEC(c.checkout)>=TIME_TO_SEC(cot) and c.checkin<>'00:00:00' and c.checkdate in ($dates) and u.compid=$companyid and u.userid=c.user_id  and (u.status='Active' or u.status='On Leave')  group by u.userid order by clocks desc,avgtime";
        }
        elseif($view=="Department"){
            $sql= "select u.name2,u.pin, SEC_TO_TIME(AVG(TIME_TO_SEC(c.checkin))) as avgtime ,count(*) clocks, SEC_TO_TIME(AVG(TIME_TO_SEC(c.cit))) as cit,SEC_TO_TIME(AVG(TIME_TO_SEC(c.cit)-TIME_TO_SEC(c.checkin))) as diff,SEC_TO_TIME(AVG(TIME_TO_SEC(c.checkout)-TIME_TO_SEC(c.cot))) as diffout
    from tbl_checkinout c,tbl_user u where c.checkdate>='$from' and  c.checkdate<='$to' and TIME_TO_SEC(c.checkin)<=TIME_TO_SEC(cit) and TIME_TO_SEC(c.checkout)>=TIME_TO_SEC(cot) and u.location=$location and u.department=$department and c.checkin<time(cit) and c.checkin<>'00:00:00' and c.checkdate in ($dates) and u.compid=$companyid and u.userid=c.user_id  and (u.status='Active' or u.status='On Leave')   group by u.userid order by clocks desc,avgtime";
        }
        elseif($view=="Location"){
             $sql = "select u.name2,u.pin, SEC_TO_TIME(AVG(TIME_TO_SEC(c.checkin))) as avgtime ,count(*) clocks, SEC_TO_TIME(AVG(TIME_TO_SEC(c.cit))) as cit,SEC_TO_TIME(AVG(TIME_TO_SEC(c.cit)-TIME_TO_SEC(c.checkin))) as diff,SEC_TO_TIME(AVG(TIME_TO_SEC(c.checkout)-TIME_TO_SEC(c.cot))) as diffout
    from tbl_checkinout c,tbl_user u where c.checkdate>='$from' and  c.checkdate<='$to' and TIME_TO_SEC(c.checkin)<=TIME_TO_SEC(cit) and TIME_TO_SEC(c.checkout)>=TIME_TO_SEC(cot) and u.location=$location and c.checkin<time(cit) and c.checkin<>'00:00:00' and c.checkdate in ($dates) and u.compid=$companyid  and u.userid=c.user_id and (u.status='Active' or u.status='On Leave') group by u.userid order by clocks desc,avgtime";
        }

        
        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {
                
                for($j3=1; $j3 <= $result->num_rows; $j3++){  
                    
                    $row = $result->fetch_assoc();                    
				    $name=$row['name2']; $pin=$row['pin']; 
	
				    $avgtime=$row['avgtime']; $clockin=$row['clocks'];  $cit=$row['cit']; $diff=$row['diff']; $diffout=$row['diffout'];				
				    if($expclock > 0 and $clockin>0 )
				        $pc=$clockin/$expclock * 70;
				    else
				        $pc=0;
				        $pd= punctualgrade($diff);
				        $od= punctualgrade($diffout);

				        if($pd > 0)
				            $pd=$pd/5 * 15;
				        else
				            $pd=0;
							
				        if($od > 0)
				            $od=$od/5 * 15;
				        else
				            $od=0;
							$total=$pc+$pd+$od;
							
                            $pc = round($pc, 2);
							$total = round($total, 2);                    
                    
							$data[] = array('name' => $name,  'pin' => $pin,'avgtime' => $avgtime,'expclock' => $expclock,'clockin' => $clockin, 'cit' => $cit,
											  'diff' => $diff, 'pd' => $pd, 'od' => $od,'pc' => $pc,'total1' => "$total");				
                }
                
                // Obtain a list of columns
                foreach ($data as $key => $r) {
                    $total1[$key]  = $r['total1'];
                }
                
               array_multisort($total1, SORT_DESC, $data);
                
                echo json_encode($data);  
                return;
            }

        }else{
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        
        $connection->close(); // terminate database connection.                 
        echo json_encode($data);          
        
    }

/**************************************************************************************************************************************
        This function is called to get genaral tams ambassadors
 **************************************************************************************************************************************/
    function get_general_tams_ambassadors($from, $to, $companyid){
                
        $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASENAME, PORT); // establish a connection to the database        
            // Check connection status
        if ($connection->connect_error) {     
            die("Connection failed: " . $connection->connect_error);            
        }         
        
        $from = date("Y-m-d",strtotime($from));
        $to = date("Y-m-d",strtotime($to));
        
        $dates = implode(",",remove_weekend($from, $to, "true", "true", $companyid, $connection));
        $expclock = count(explode(",", $dates));        
        
        $sql = "select u.name2,u.pin,u.compid,u.userid,SEC_TO_TIME(AVG(TIME_TO_SEC(c.checkin))) as avgtime ,count(*) clocks, SEC_TO_TIME(AVG(TIME_TO_SEC(c.cit))) as cit,SEC_TO_TIME(AVG(TIME_TO_SEC(c.cit)-TIME_TO_SEC(c.checkin))) as diff,SEC_TO_TIME(AVG(TIME_TO_SEC(c.checkout)-TIME_TO_SEC(c.cot))) as diffout
from tbl_checkinout c,tbl_user u where c.checkdate>='$from' and  c.checkdate<='$to'  and TIME_TO_SEC(c.checkin)<=TIME_TO_SEC(cit) and TIME_TO_SEC(c.checkout)>=TIME_TO_SEC(cot) and c.checkin<>'00:00:00' and c.checkdate in ($dates)  and u.userid=c.user_id  and (u.status='Active' or u.status='On Leave')  group by u.userid order by clocks desc,avgtime limit 500";
        
        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {
         
                for($j3=1; $j3 <= $result->num_rows; $j3++){  
                    
                    $row = $result->fetch_assoc();                    
                    $name = $row['name2'];  
                    $pin = $row['pin'];  
                    $userid = $row['userid']; 
                    $company = getcompany($row['compid'], $connection); 
                    $avgtime = $row['avgtime']; $clockin = $row['clocks'];  $cit = $row['cit']; $diff = $row['diff'];           $diffout=$row['diffout'];
                    $compid = $row['compid']; 
                    
				    if (!in_array($row['compid'], $array, true) and $row['compid'] <> 2000 ){
							
				        if($expclock > 0 and $clockin>0 )
				            $pc = $clockin/$expclock * 70;
				        else
				            $pc=0;
							$pd= punctualgrade($diff);
							$od= punctualgrade($diffout);

							if($pd > 0)
								$pd = $pd/5 * 15;
							else
								$pd = 0;
							
							if($od > 0)
								$od=$od/5 * 15;
							else
								$od=0;

							$total=$pc + $pd + $od;	
                            
                            $pc = round($pc, 2);
							$total = round($total, 2);
                        
					        $data[] = array('company' => $company, 'name' => $name,  'pin' => $pin,'avgtime' => $avgtime,'expclock' => $expclock,'clockin' => $clockin, 'cit' => $cit, 'diff' => $diff, 'pd' => $pd, 'od' => $od,'pc' => $pc,'total1' => "$total");
		 					 
				    }
                    
                    $array[$j3] = $row['compid'];    
                }
                
                // Obtain a list of columns
                foreach ($data as $key => $r) {
                    $total1[$key]  = $r['total1'];
                }
                
                array_multisort($total1, SORT_DESC, $data);
                
                echo json_encode($data);  
                return;
            }

        }else{
            echo "Error: " . $sql . "<br>" . $connection->error;
        } 
         $connection->close(); // terminate database connection.                 
        echo json_encode($data);            
    }

/**************************************************************************************************************************************
        This function is an helper function for removing weekends between two dates
 **************************************************************************************************************************************/
    function remove_weekend($from, $to, $exweek, $pub, $companyid, $connection){
        $dates = array();
        $today=$from;
        $days = intval((strtotime("$to") - strtotime("$today")) / (60 * 60 * 24));

        for($i=1; $i<=$days+1; $i++){
            $dayy = getdayy($today);
            if($exweek=="true" and (getday($today)=="Sun" or getday($today)=="Sat")){
                $today = strtotime($today) + 169200;
                $today = date('Y-m-d',$today);
            }
            elseif($pub=="true" and (comp_publicholiday($today, $companyid, $connection))){
                $today = strtotime($today) + 169200;
                $today = date('Y-m-d',$today);
            }
            else{
                $dates[]= "'".$today."'";
                $today = strtotime($today) + 169200;
                $today = date('Y-m-d',$today);
            }
        }
        return $dates;
    }


    function getdayy($dat){
        return $dat=date('l',strtotime($dat));
    }

/**************************************************************************************************************************************
        This function is an helper function
 **************************************************************************************************************************************/
    function getday($dat){
        $dat = strtotime($dat);
        $dat = date('D',$dat);
        return $dat;
    }

/**************************************************************************************************************************************
        This function is an helper function 
 **************************************************************************************************************************************/
    function punctualgrade($diff){
        if(getsec($diff) > getsec("02:00:00"))
            $grade=5;
        elseif(getsec($diff) > getsec("01:30:00"))
            $grade=4;
        elseif(getsec($diff) > getsec("01:00:00"))
            $grade=3;
        elseif(getsec($diff) > getsec("00:30:00"))
            $grade=2;
        elseif(getsec($diff) > getsec("00:00:00"))
            $grade=1;
        return $grade;
    }

/**************************************************************************************************************************************
        This function is an helper function
 **************************************************************************************************************************************/
    function getsec($time){
        list ($hr, $min, $sec) = explode(':',$time);
        $hs = $hr *60 * 60;
        $ms = $min * 60;
        $ss = $sec;
        $ts = $hs + $ms + $ss;
        return $ts;
    }

/**************************************************************************************************************************************
        This function is an helper function
 **************************************************************************************************************************************/
    function getcompany($compid, $connection){
        
        $sql = "select comprname from company where compid=$compid";
        $result = $connection->query($sql);
        
        if($row = $result->fetch_assoc()){ 
            return $row['comprname'];
        }        
    }

/**************************************************************************************************************************************
        This function is an helper function
 **************************************************************************************************************************************/
    function comp_publicholiday($today, $companyid, $connection){

        $sql = "select a.publicid,a.sdat,a.msg,aa.compid from holiday a,pub_alert aa where  a.id=aa.pub_id and aa.status=1 and aa.compid='$companyid' and (a.sdat='$today' or edat='$today')  ";
        
        if($result = $connection->query($sql)){
            
            if ($result->num_rows > 0) {  
                return true;
            }else{
                return false;
            }
        }else{
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        return false;
    }

?>