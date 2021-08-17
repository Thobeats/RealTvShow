<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);
?>
<style>
.promote-you{
    height : auto;
}

.promote-you h2{
    text-transform : uppercase;
    letter-spacing: 1px;
    font-family: 'Poppins', serif;
    font-weight : 600;
}

.promote-you h4{
    text-transform : uppercase;
    letter-spacing: 1px;
    font-family: 'Poppins', serif;
    font-weight : 400;
}

.promote-you h5{
    text-transform : uppercase;
    letter-spacing: 1px;
    font-family: 'Poppins', serif;
    font-weight : 600;
}

.promote_you_header::before{
    display: inline-block;
    background-color :  #004883;
    content : " ";
    width : 10px;
    height : 23px;
    margin-right : 3px;
}


.promote-you h5::before{
    display: inline-block;
    background-color :  #004883;
    content : " ";
    width : 10px;
    height : 15px;
    margin-right : 3px;
}
.writer_side_para, .movie-para{
    font-size : 14px;
    font-family : 'Poppins', serif;
    font-weight : 300;
}

.promote_img{
    width : 300px;
    height : 250px;
    transform : scale(0.7);
}

.movie-para{
    margin-top : -30px;
}

@media only screen and (max-width: 768px) {
    .promote_img{
    width : 180px;
    height : 140px;
}

.movie-para{
    margin-top : 0px;
    margin-top : -20px;
    font-size : 10px;
    margin-right : -10px;

}
    
}


@media only screen and (max-width: 425px) {

body{
    width : auto;
}

.cover-image{
    height : 50vh;
    background-position : center right;
}

.cover-wrapper h1{
    font-size : 25px;
    letter-spacing : 2px;
}

.cover-wrapper p{
    font-size : 15px;
    letter-spacing : 1px;
}



.writer_side_para, .movie-para{
    font-size : 12px;
  
}

.promote_img{
    width : 150px;
    height : 100px;
}

.movie-para{
    margin-top : 0px;
    margin-top : -10px;
    border: 1px solid;
   
}
}
</style>



<section class="promote-you p-2 mt-2 mb-5">

    <div class="row">
        <div class="col-12">
            <div class="row d-flex justify-content-start">
                <h2 class="px-5 pt-5 pb-2 promote_you_header ">Privacy Policy – TV Industry Executives </h2>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                    The RealityTVRegistry platform has employed significant security elements to protect the loss, exploitation and
                    modification of the information under our control. As a safeguard all user/members who elect to register, may
                    only do so by imputing an electronic/binding signature &quot;I AGREE&quot;. This signature provides consent to the
                    relevant non-disclosure/confidentiality agreement, or industry-standard material release form. 
                    </p>
                    <p class="writer_side_para">
                    To insure, protection to our member’s credentials and projects, all information from registrants is reviewed and
                    or vetted respectively, to confirm the validity of the information. This, to safeguard that our member&#39;s and
                    projects are being examined by legitimate executives in the film industry, and their entities. This assessment
                    and authentication process is conducted prior to permitting access to our password protected database. All
                    industry executive registrations are confirmed by RealityTVRegistry executives and/or staff. Any questionable
                    registrations will be permanently deleted from our data base.
                    </p>
                </div>
            </div>

            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">communications</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        The RealityTVRegistry implement Form Mail and Send Mail to deliver electronic notification to certain
                        registered members relative to the activity on their private account. It also delivers specific notifications of
                        member related news. Our staff manually sends all emails to those registered with our promotional services.
                        We do not spam non-members. Registered members submit either a personal or business email address that
                        is used to receive notifications from our office. We pledge to never sale, lend or exploit member emails or other
                        personal data to third parties.
                    </p>
                    <p class="writer_side_para">
                        User Activity Monitored Password protected access is provided to member writers. Thus, these members have
                        access to a personal project status page where they are enabled to observe registered member executive
                        reviews. The reviews are accessed for member writer related projects that are posted for review strictly for the
                        access of the RTVR industry executive database. As registered industry executive examines or selects an
                        applicable status for any project, that review/status is electronically sent and posted to the corresponding
                        writer&#39;s project status page. The information indicates the company name/ project title / date reviewed / and
                        time. Industry executives have full discretion to select the status or the ability to change it at any time for any
                        project that has been posted. The executive has no obligation to the corresponding writer. The review status
                        logs are submitted to our registered member writers as a courtesy and service, and not to be construed as a
                        right of information.
                    </p>
                </div>
            </div>

            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">copyright protection</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        It is highly recommended that all member writers of RealityTVRegistry who submit original written material take
                        the initiative to register for copyright protection. Your written material is considered intellectual property and it is
                        ultimately the responsibility of the Writer to take these measures in protecting their work.
                    </p>
                    <p class="writer_side_para">
                        To provide mutual protection and privacy of both industry executives and registered writers, we require all
                        registering industry executives to agree by electronic signature to an industry standard Non-Disclosure
                        Agreement. Furthermore, all registered writers are required to agree by electronic signature, to an industry
                        standard Material Release Form.
                    </p>
                </div>
            </div>
            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">cookies</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                    Member names and passwords are stored as “cookies” on websites that we use. Cookies permit individuals to
                    store and retrieve login information through a user&#39;s browser. A cookie is a small data file that certain Web
                    sites write to your hard drive when you visit them. A cookie file generally contains information such as a user
                    ID that the site exercises to track pages that you have visited.
                    </p>
                    <p class="writer_side_para">
                        The RealityTVRegistry registration form requires users to provide contact information including name, email
                        address, and additional information. Our staff gathers customer contact information from the registration form
                        to deliver user information about our company as well as information concerning available projects and other
                        acquisition related data. The member&#39;s contact information is also used to contact the visitor when necessary.
                    </p>
                    <p class="writer_side_para">
                        Industry executives have the ability to contact registered members of RTVR to discuss their talent interests and
                        projects, therefore it is important that member contact data are current. If the RTVR member enlists an industry
                        representative it is imperative to so state and include the current contact data of the representative. *Writer
                        contact information is not publicly displayed on RTVR platform. Contact information is only released to a
                        verified Industry Executive when a formal solicitation or formal review of the talent or project is requested by
                        the executive. At that time the executive may discuss project particulars or a deal proposal. The executives
                        and/or staff of RTVR may contact any member as deemed necessary.
                    </p>
                    <p class="writer_side_para">
                        Within the content of the RealityTVRegistry are links to related websites that are not under the policies of our
                        company. Therefore, RTVR cannot be held liable for the privacy practices or the content of these websites.
                        The RTVR staff and executives pledge to never sell, broker or otherwise distribute mailing lists, contact
                        information or personal demographics information to third party companies, members, or non-members.
                    </p>
                </div>
            </div>            
        </div>
    </div>
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>