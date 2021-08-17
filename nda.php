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
                <h2 class="px-5 pt-5 pb-2 promote_you_header ">NDA Confidentiality Agreement – Industry TV Executives </h2>
            </div>
            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">Industry Executive Terms of Service</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                         As an entertainment industry executive, I understand that subsequent to registering with RealityTVRegistry, I
                        (the &quot;Company&quot;) will be provided access to review a variety of intellectual properties that were originally
                        created by Member Writers who are being promoted on the RTVR platform. With this acknowledgement, I may
                        review the many Reality TV proposals and pitches created by third-party Writers. I confirm that such Material is
                        construed as proprietary and confidential, and is the sole property of the Writer.
                    </p>
                    <p class="writer_side_para">
                        I pledge to never disclose or exploit the content or use of any projects displayed on the RTVR platform.
                    </p>
                    <p class="writer_side_para">
                        I pledge, as a registered industry executive of the named company, I have authorization to represent and scout
                        projects and talent on the company’s behalf.
                    </p>
                    <p class="writer_side_para">
                        It is understood that any discussions relative to proposed reality TV programming through RTVR shall be
                        deemed as discussions only, and does not imply any commitment expressed or implied to the original writer of
                        the material or the company RTVR. Commitment to any monetary compensation is only valid after a bona-fide
                        written agreement is executed by both parties.
                    </p>
                    <p class="writer_side_para">
                        I acknowledge and pledge that a breach of this Non-Disclosure Confidentiality Agreement cannot be
                        satisfactorily compensated by damages, and I agree to enforcement of the provisions of this Agreement by
                        injunction or other equitable remedy in addition to all remedies available at law. Furthermore, Company agrees
                        to indemnify and hold harmless RealityTVRegistry, all of its executives, employees, related companies,
                        associates and agents against any issues of liability or lawsuits resulting from any infringement by Company of
                        any material submitted directly or indirectly by Writers via use or referral of the RTVR platform.
                    </p>
                    <p class="writer_side_para">
                        I understand and agree with RealityTVRegistry User Protocol as summarized for registered member Writers,
                        and will report back to RTVR staff, any writers who make unsolicited inquiry regarding information of project
                        statuses shared within the writers project status page. I further understand and agree that by selecting a
                        &quot;Requesting Contact with Writer&quot; status for any project, that the writer&#39;s direct contact information will be
                        provided to Company by executives at RTVR and it is Company&#39;s sole responsibility and discretion to contact
                        the writer.
                    </p>
                    <p class="writer_side_para">
                        I understand that if Company does not contact, or make reasonable attempt to contact a writer regarding any
                        &quot;Requesting Contact with Writer&quot; status selection for any specific project, RTVR may give that writer the
                        executive&#39;s contact information to make personal inquiry. I understand that all project status selections are at
                        the sole discretion of Company executive using RTVR database, and it is the Company executive&#39;s
                        responsibility to update or change any status as Company desires.
                    </p>
                </div>
            </div>

            <div class="row d-flex justify-content-start">
                <h5 class="pt-2 pl-5 pb-2 promote_you_header">Publicity &amp; Promotion</h5>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        I understand and agree that RTVR may publish the Company name in any advertising of its website services to
                        disclose their use of RTVR. The official name of Company is automatically listed within the publication of its
                        website Company Members List for view by potential users of the site. This information will be published to the
                        World Wide Web and potentially indexed by search engines.
                    </p>
                    <p class="writer_side_para">
                        I understand and agree that RTVR retains the right to publicize and promote any partnership, agreement,
                        option, sale, development deal, acquisition, either formal or informal with any member Writer or Entity at the
                        RTVR that is attained as a result of scouting projects and networking via the RTVR and its executives. The
                        RTVR retains the right to disclose the identities of all parties involved, and general project details for use in
                        promoting the interests and brand of RTVR as an active industry entity by use of any and all forms of media
                        whether now known or hereafter devised.
                    </p>
                    <p class="writer_side_para">
                        I hereby state that I have read and understand this agreement and that no oral representations of any kind have been made to me and that this agreement states our entire understanding. I acknowledge that but for my
                        agreement to the above terms and conditions, you would not permit me to receive the Confidential Information.
                    </p>
                    <p class="writer_side_para">
                        By typing &quot;I AGREE&quot; in the space provided within the Industry Executive Registration form, I understand and
                       agree to all terms of use for RealityTVRegistry, as outlined above.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>