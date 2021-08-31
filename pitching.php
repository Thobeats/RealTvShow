<?php 
$navBar = true;$logo =true;
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

.pitch-logline{
    font-size : 15px;
    font-family : 'Poppins', serif;
    font-weight : 300;
}

@media only screen and (max-width: 768px) {
.pitch-logline{
    font-size : 12px;
    font-family : 'Poppins', serif;
    font-weight : 300;
}

}


@media only screen and (max-width: 425px) {

body{
    width : auto;
}
.writer_side_para, .movie-para{
    font-size : 12px;
  
}
}
</style>

<?php include("floating_toggler.php"); ?>

<section class="promote-you p-2 my-5">

    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-12">
            <div class="row d-flex justify-content-start">
                <h2 class="p-5 promote_you_header">pitching reality for success</h2>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                     <h5 class="pt-2 pl-5 pb-2 promote_you_header">pitching</h5>

                    <p class="writer_side_para">
                    In Hollywood, delivering Pitches is your path to break-through in the TV Industry. After finishing your reality draft, it is time to refine and 
                    polish the elements of your reality that will be read by agents, producers and networks executives. The pitch, which includes a title, logline and synopsis 
                    is the absolute business in selling Reality TV scripts. 
                    </p>

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">the title</h5>


                    <p class="writer_side_para">
                    obviously, is the name of the proposed show and is usually one to three words. In a nutshell, the title reveals the nature or theme of the show. 
                    When appropriate, a play on words or catchy word title can elevate initial interest.
                    The logline defines in two to three sentences what the show will be about. It reveals the genre and reality type such as a formatted or docuseries type show. 
                    It needs to be concise and motivate the reader to want to know more.  
                    </p>                    
                </div>
            </div>

            <div class="row d-flex justify-content-start">
                <h2 class="pt-5 pl-5 pb-2 promote_you_header">sample titles and loglines</h2>
            </div>

            <div class="row">
                <?php 
                    $movieQuery = mysqli_query($link, "select * from realtv_movies where id in ('1' , '6', '10' , '15')");

                    while($movies = mysqli_fetch_assoc($movieQuery)):

                ?>

                <div class="col-12 my-2">
                    <div class="card border-0 bg-light">
                        <h5 class="card-title text-left pl-2 pt-2">TITLE: <?= $movies['movie_title'] ?></h5>
                        <div class="card-body pitch-logline row">
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <h6>Logline</h6>
                                <hr> 
                                <?= $movies['logline'] ?>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12 text-center">
                                <img src="img/uploads/<?= $movies['movie_pic'] ?>" alt="" width="250px" class="border" style="transform : scale(0.8);">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 my-2">
                </div>


                <?php endwhile; ?>
            </div>

            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        The Synopsis, usually written in 3-5 pages, identifies the show as a formatted or docuseries type with the rules (if any), being defined. 
                        Please refer back to the <a href="business.php">Business of Writing Reality</a> link for program types. In this component of the pitch, it is very important to clearly 
                        define the unique and original elements and concepts within the body of your written material. It is the original material that is specifically 
                        protected when submitting to industry professionals for their consideration. The synopsis needs to be written in a concise manner, invoke 
                        interest and compel the industry professional to want to finish reading the entire proposal. 
                    </p>
                    
                    <p class="writer_side_para">
                        As an absolute safeguard to the privacy of your material, RealityTVRegistry only shares your 
                        submission to professionals who have been strictly 
                        vetted to be associated with legitimate TV industry companies. We also suggest that you register your material with the Writers Guild of America 
                        and especially with the US Copyright Office.
                        We suggest that you utilize every available tool to expose yourself and the original material of creation. In doing so, you will naturally become 
                        a player in the industry and elevate your chances of success.
                        When writers register for Option 2 of a Display Listing and Image Enhanced Pitch they can incorporates as many as seven images 
                        within the body of the synopsis content. 
                    </p>
                    <p class="writer_side_para">
                        Also, the writer has the ability to include a title and one highly visible Home Page 2”x 2” block display.  The display listing will 
                        capture the reader’s attention with the likelihood of wanting to read the logline and synopsis. RealityTVRegistry functions as a viable 
                        resource destination for Industry TV Executives to review and discover pitches of unique reality 
                        programming. Writers who pitch their original material have a great opportunity to be read and to be discovered for their creative works.
                    </p>

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">pitching contribution</h5>
                    <ol class="writer_side_para">
                        <li class="mt-1 mb-2">
                            Make a 2-5 minute tape featuring the main elements of your show,
                            Film the star of your show in their natural environment, 
                            Try to capture what makes them special or unique. If you’re making a show about a group of people, film them all interacting. 
                            Make sure you include the main characters or locations of the show. 
                            For example, if your show is going to be about a group of employees at a barber shop, go to the barber shop and film them as they 
                            work and joke around with each other. Don’t worry about using special camera equipment at this stage. You can film with a regular digital video camera, your phone, or a computer.
                        </li>

                        <li class="mb-2">
                            Craft a 1-5 page logline and synopsis about your show. Make the write up short and simple.  
                            Tell production companies what 
                            format and style your show is and briefly mention 
                            the characters and what the storyline will be like. Give them a sense of what 
                            a typical episode will be like. 
                            For example, you could introduce your write up with something like “I’m envisioning a self-contained format series featuring a 
                            psychic couple that travels the country, helping people redecorate their homes along the way. Not only will the couple give their 
                            own interior decorating opinions, but also those of the deceased former inhabitants of the home. Each episode will feature a 
                            different family and their home.”
                        </li>

                        <li class="mb-2">
                            Take headshots of the main characters. They don’t need to be fancy; just clear, straight-on photos that you can attach to your pitch. Production companies will want to know what the characters in your show look like.
                            Write the name of each character on their headshot. You want executives looking at the pitch package to be able to match
                            up their faces with the character descriptions you provide in the write up.
                        </li>
                    </ol>

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">pitching the show</h5>
                        <ol class="writer_side_para">
                        <li class="mt-1 mb-2">
                            Get an agent if you’re new to the industry. An agent can help you connect with potential buyers and make it 
                            easier to get your pitch package in front of the right people. Look for agents in your area that specialize in 
                            reality television and see if you can get someone to represent you.
                        </li>

                        <li class="mb-2">
                            Team up with an established reality show producer. Look for a producer who’s already produced reality shows 
                            similar to the one you’re pitching. If you’re new to the industry and you don’t know any producers, pay to attend 
                            a conference like the National Association of Television Program Executives that takes place annually in Miami, 
                            Florida,or the annual RealScreen Summit in Washington, DC. 
                            Attending a conference with high-level TV executives can cost over $1,000 (€843), so you'll want to make sure you're 
                            prepared if you decide to take this route. Make sure your pitch package is all put together and consider having multiple 
                            ideas to pitch. 
                            At the conference, attend sessions hosted by network executives you're interested in networking with, and introduce yourself 
                            after the session. Have cards with your contact information on them that you can hand out to prospective buyers.
                        </li>

                        <li class="mb-2">
                            Pitch directly to the networks. If you have an agent, have them arrange a meeting between you and some network executives. 
                            Choose a network you could see your show airing on; if your show is about CEOs renovating their own penthouses, look for a 
                            network that airs home-improvement-style shows. Come to the meeting prepared with your pitch package (short tape, write up, 
                            headshots) and convince the network execs that your show would be a hit. If your show centers around the bold personality of a 
                            particular character, consider bringing them along to the meeting to help woo the network.
                        </li>

                        <li class="mb-2">
                            Keep shopping around your idea until you get a buyer. If one network isn’t interested in your idea, that doesn’t mean other 
                            networks won’t be. Keep attending meetings and pitching your show. Take the feedback you get from network executives and TV 
                            producers and use it to make your pitch package better. If you’re not having any luck, consider changing the premise or 
                            structure of your show so it’s more marketable.
                        </li>
                    </ol>
                    
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-lg-6 col-md-6 text-center p-3 col-sm-12">
                    <a class="realbtn border-bottom" href="sample.php">View Pitch Sample</a>
                </div>
                <div class="col-lg-6 col-md-6 text-center p-3 col-sm-12">
                    <a class="realbtn border-bottom" href="wregistration.php">Register</a>
                </div>
            </div>

        </div>
        <?php require "scripts/sidebar_member_benefits.php"; ?>
    </div>
    
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>