<?php

//create array variables for Gofitters priviledges/menu
switch ($_SESSION['roleid']) {
	case 1:
	//super administrator
	$gofitaccess = array(
				array("Edit Profile", "edituser.php", "1"), //1 show in main menu
				array("Delete Profile", "deleteprofile.php", "1"),
				array("Gofitters Users", "listusers.php", "1"),
				array("Create Season", "season.php", "1"),
				array("Create Survey", "survey.php", "1"),
                array("Survey Response", "responsesurvey.php", "1"),
				array("Create Alerts", "alerts.php", "1"),
				array("Approve Members", "approvemember.php", "1"),
                array("Set Calendar", "calender.php", "1"),
                array("Join Season", "jointeams.php", "1"),
                array("My Seasons", "myseasons.php", "1"),
                array("Chat fit", "chat.php", "1"),
                array("Add Webpages", "pages.php", "1"),
                array("Add Sections", "section.php", "1"),
                array("Edit Sections", "createsections.php", "1"),
                array("View Analytics", "analytics.php", "1")

					);

		break;

	case 2:
	//Admin
	$gofitaccess = array(
        array("Edit Profile", "edituser.php", "1"), //1 show in main menu
        array("Delete Profile", "deleteprofile.php", "0"),//0 means hide from the menu.
        array("Gofitters Users", "listusers.php", "1"),
        array("Create Season", "season.php", "0"),
        array("Create Survey", "survey.php", "0"),
        array("Survey Response", "responsesurvey.php", "1"),
        array("Create Alerts", "alerts.php", "1"),
        array("Approve Members", "approvemember.php", "0"),
        array("Set Calendar", "calender.php", "1"),
        array("Join Season", "jointeams.php", "1"),
        array("My Seasons", "myseasons.php", "1"),
        array("Chat fit", "chat.php", "1"),
        array("Add Webpages", "pages.php", "1"),
        array("Add Sections", "section.php", "1"),
        array("Edit Sections", "createsections.php", "1"),
        array("View Analytics", "analytics.php", "1")

            );


        break;
        
    case 3:
        //Trainer
        $gofitaccess = array(
            array("Edit Profile", "edituser.php", "1"), //1 show in main menu
            array("Delete Profile", "deleteprofile.php", "0"), //0 means hide from menu
            array("Gofitters Users", "listusers.php", "0"),
            array("Create Season", "season.php", "1"),
            array("Create Survey", "survey.php", "1"),
            array("Survey Response", "responsesurvey.php", "0"),
            array("Create Alerts", "alerts.php", "1"),
            array("Approve Members", "approvemember.php", "1"),
            array("Set Calendar", "calender.php", "1"),
            array("Join Season", "jointeams.php", "1"),
            array("My Seasons", "myseasons.php", "1"),
            array("Chat fit", "chat.php", "1"),
            array("Add Webpages", "pages.php", "0"),
            array("Add Sections", "section.php", "0"),
            array("Edit Sections", "createsections.php", "0"),
            array("View Analytics", "analytics.php", "1")
    
                );
    
    
            break;

    
	

	default:
	//Member
	$gofitaccess = array(
        array("Edit Profile", "edituser.php", "1"), //1 show in main menu
        array("Delete Profile", "deleteprofile.php", "0"),//0 means hide from menu
        array("Gofitters Users", "listusers.php", "0"),
        array("Create Season", "season.php", "0"),
        array("Create Survey", "survey.php", "0"),
         array("Survey Response", "responsesurvey.php", "1"),
        array("Create Alerts", "alerts.php", "0"),
        array("Approve Members", "approvemember.php", "0"),
        array("Set Calendar", "calender.php", "1"),
        array("Join Season", "jointeams.php", "1"),
        array("My Seasons", "myseasons.php", "1"),
        array("Chat fit", "chat.php", "1"),
        array("Add Webpages", "pages.php", "0"),
        array("Add Sections", "section.php", "0"),
        array("Edit Sections", "createsections.php", "0"),
        array("View Analytics", "analytics.php", "1")

            );



	break;
	

}


?>