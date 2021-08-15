<?php 
$navBar = true;
require "scripts/functions.php";
require "scripts/header_two.php"; 

//var_dump($_SESSION);
?>
<style>
    .cover-image{
    background-image: url(img/camera8.jpg);
    height: 100vh;
    background-size : cover;
    background-position : top left;
    color : white;
    display: flex;
    align-items : center;
}

.cover-wrapper{
    text-align : center;
    font-family: "Montserrat", sans-serif;
    width : 100%;
}

.cover-wrapper h1{
    font-weight : 600;
    letter-spacing : 1.75rem;
    text-transform : uppercase;
}

.cover-wrapper p{
    font-weight : 300;
    letter-spacing : 1rem;
    text-transform : uppercase;
    width : 100%;
}

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

.promote-you h3{
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

.promote-you h3::before{
    display: inline-block;
    background-color :  #004883;
    content : " ";
    width : 10px;
    height : 19px;
    margin-right : 3px;
}

.writer_side_para, .movie-para{
    font-size : 14px;
    font-family : 'Poppins', serif;
    font-weight : 300;
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
}
</style>

<section class="cover-image p-4">
    <div class="cover-wrapper m-auto d-flex flex-column justify-content-center">                
        <h1>Reality Tv</h1>
        <p class="mr-auto ml-auto">cache of unique formats & talent</p>                  
    </div>
</section>

<?php include("floating_toggler.php"); ?>

<section class="promote-you p-2 my-5">

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="row d-flex justify-content-start">
                <h2 class="p-5 promote_you_header">business of writing reality </h2>
            </div>
            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        Today, there are more than 50 nationwide broadcasting networks. In a mere seven-year period the number 
                        of commercial television stations airing in the United States grew from 763 to 1,761 stations today. 
                        This near increase of 1,000 stations represents a staggering 231% growth rate during this period. 
                        The appetite for TV programming which has grown to enormity, has created intense competition between 
                        the networks. 
                    </p>

                    <p class="writer_side_para">
                        To gain an advantage networks have an insatiable desire to discover new and unique material 
                        from writers who can satisfy the audience’s interest while improving network’s bottom line.
                        To acknowledge this incredible growth in programming, one can point to the recent injection of investment 
                        into streaming from the likes of Amazon Fire TV, YouTube TV, Apple TV, Disney Plus, AT&T, Roku, Fubo, Hulu, 
                        Philo, Sling, and of course the giant, Netflix. Competition between networks is intense and those who deliver 
                        the most unique and engaging programming will garner the lion’s share of the market and emerge as winners.
                    </p>                   
                </div>
            </div>

            <div class="row d-flex justify-content-start">
                <h3 class="pt-5 pl-5 pb-2 promote_you_header">scripting unscripted television</h3>
            </div>

            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        While reality TV shows don't require scripts, it doesn't mean they don't have storytelling. Here's how writer’s 
                        function in a reality genre that, in theory, doesn't need skilled writers.
                    </p>

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">get real: how to break into reality tv</h5>

                    <p class="writer_side_para">
                        Look for everyday processes that require unique skills or create drama and conflict. From "Flip That House" to "Bridezillas,"  many reality shows exploit the drama found in universal 
                        situations. Find an area of your life that lets you peek into unique human conflicts.If you're a tennis coach, 
                                    develop a series examining how the training regimen affects athletes' relationships. If you're a plumber, concoct 
                                    a game show in which handymen compete in a series of home-repair challenges.
                    </p> 
                    
                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">find a comic</h5>

                    <p class="writer_side_para">
                        Or become one, because much of reality TV is driven by personalities, producers often turn to the world of stand-up comedy to find new hosts. 
                        Partner with a talented stand-up and learn to write for her. Or become a stand-up yourself. Being a potential host not only increases your project's value, but you'll also learn to deliver information quickly and comedically...
                        an essential skill for any reality writer.
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">keep it simple</h5>

                    <p class="writer_side_para">
                         While television boasts a handful of large-scale reality 
                        shows like "Survivor" and "The Amazing Race," most networks appreciate reality because it's cheap and easy to produce. 
                        So, while massive stunts, elaborate sets and exotic locations are exciting and glamorous, they're also expensive. 
                        Try to imagine shows that shoot with small crews in easily accessible locations and don't use stunts or activities 
                        requiring expensive insurance.
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">compile a sizzle reel</h5>

                    <p class="writer_side_para">
                        Such as "Newlyweds" and 
                                        "Rollergirls" depend on compelling characters and relationships. Because docu-series are based on real people (not cast), 
                                        many producers sell shows with the help of "sizzle reels," three- to five-minute teaser films introducing the core characters 
                                        and showing how they interact. This gives a sense of the show's tone, perspective, style and potential stories.
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">attach a higher level producer</h5>

                    <p class="writer_side_para">
                        When buying a show, networks aren't simply investing in an idea, they're investing in a producer. 
                        In other words, you may have the world's greatest TV idea, but if you haven't proven yourself as a capable showrunner,
                                        networks have little interest in your product. So, unless you already have several series under your belt, it often helps 
                                        to attach a seasoned producer who has enough trust and respect from the networks to convince them to buy a new series.
                                        It's no secret that reality television ain't exactly, well, reality. Sure, it's unscripted. Sure, it uses real people. 
                                        And yes, it's completely unrehearsed. (OK, maybe not completely unrehearsed.) But reality programming also has the same 
                                        basic goals as scripted television—to move people.
                    </p> 
                    <p class="writer_side_para">
                         Whether it's VH1's outrageous "Hogan Knows Best" or ABC's tear-jerking "Extreme Makeover: Home Edition," reality TV—like  
                                        sitcoms and dramas—is designed to elicit emotion. 
                                        Which means, like on scripted shows, there are writers structuring, designing, 
                                        honing and tweaking stories.
                                        They may not function quite the same as the staff on "Grey's Anatomy" or "The Office," but their job is essentially the same: 
                                        create stories that make us crack up. Or cry. Or want to try a new soufflé recipe.
                                        If you want to make the cut in the booming, lucrative world of reality TV, the first thing to understand is there are many 
                                        different types of "reality shows." Today, the term "reality" covers almost any show that's not traditionally scripted. 
                                        This includes competitions like "Project Runway," docu-series like "Dr. 90210" or social experiments like "30 Days." 
                                        Each of these shows has writers; and each uses its writers in a unique way.
                                        Here's how writers function in reality TV. 
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">the docu-shows</h5>

                    <p class="writer_side_para">
                        Docu-dramas, docu-soaps and docu-comedies are reality versions of scripted shows. MTV's "The Osbournes," for instance, 
                        was an unscripted sitcom. While it didn't use an actual script, it's designed to maximize comic moments and look and feel like a 
                        conventional comedy. MTV's "Laguna Beach" and BRAVO's "Real Housewives of Orange County" are reality soaps;
                        VH1's "Breaking Bonaduce" was a heartbreaking drama.
                        While unscripted, these shows share the same
                        key elements as their scripted counterparts: relationships and relatability. 
                    </p> 

                    <p class="writer_side_para">
                        Although he's a legendary rock star, audiences related to Ozzy's attempts to be a good father and husband. 
                        And though we've all grown up in different towns or cities, we've all felt the adolescent angst Lo, Morgan and 
                        Christina experience on "Laguna Beach."
                        Writers on these shows, therefore, are charged with telling stories that illuminate characters and relationships. 
                        This means working with producers and talent to craft stories in pre-production. When producers on E!'s "The Anna Nicole Show" 
                        learned Anna couldn't drive, they concocted an episode in which she went to driving school with a teacher who didn't speak English. 
                    </p> 

                    <p class="writer_side_para">
                        Although the adventure wasn't something Anna may have done on her own, and she certainly didn't memorize her lines, 
                        the plot points and story beats were all laid out before shooting began.
                        Writers also work with editors, honing story in post-production. Writers often begin by doing a "paper cut," a script based on 
                        transcriptions of the footage. This paper cut guides editors as they whittle countless hours of footage into an hour or half-hour episode. 
                        Reality shows follow the same storytelling rules as scripted material, but while scripted writers create plot points and characters 
                        from their imaginations, reality writers produce them by manipulating footage. This frequently means moving moments around chronologically
                        or combining bits from different scenes to create a coherent story. While calling these shows pure documentaries may be a stretch, 
                        they use many of the same storytelling techniques as larger documentaries, from Fahrenheit 9/11 to March of the Penguins.
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">game shows</h5>

                    <p class="writer_side_para">
                            While traditional game shows like "Wheel of Fortune" and "The Price Is Right" are still with us, today's game shows have much 
                            higher stakes and more interactivity. NBC's "Fear Factor" challenges contestants to do daredevil stunts. "Deal or No Deal" is a 
                            guessing game that allows contestants to consult their friends and family.
                            The first job of a game's creators is to define the rules of the game. 
                            Most shows have simple rules, which force contestants into
                            high-pressure decision-making situations. Good games have a few sparse, easily understandable rules, and these must be articulated 
                            quickly and simply to contestants and audiences. Writers then brainstorm challenges—anything from "Jeopardy!" 's trivia questions to 
                            "Fear Factor" 's gross-out eating contests. Writers also write jokes and patter for the host. The host's job is to convey vital game 
                            information and keep the show moving, and the writers' job is to make this material fun, concise and humorous.
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">elimination and competition shows</h5>

                    <p class="writer_side_para">
                        "American Idol" and "So You Think You Can Dance" are hybrids of docu-soaps and game shows. While they're based in  competition, 
                        they also explore relationships, incorporating participants' lives into the stories. "Rock Star," for instance, pits contestants 
                        participants to interact in new and unique ways. Activities such as dates and group outings spark relationship dynamics that heighten competition later on.
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">makeover shows</h5>

                    <p class="writer_side_para">
                         Some of the most popular and prevalent shows on television follow a central participant as she undergoes a transformation. 
                        On Style's "How Do I Look?" the participant undergoes a personal and physical transformation; on ABC's "Extreme Makeover: Home Edition," 
                        a family gets a new house. These shows work on three components:<br><br>
                        1. The transformation must be visible and incredible. HGTV's "Curb Appeal," for instance, transforms ho-hum front yards into landscaping wonderlands. </br><br>
                        2. Each subject has a strong personal, emotional story. "Extreme Makeover: Home Edition" finds families whose personal lives have been shattered by death, 
                        disease and misfortune, and then gives them a gorgeous dream house. Even shows like MTV's "Pimp My Ride" and TLC's "What Not to Wear" delve into participants' 
                        backstories to establish why they deserve their physical and, ultimately, emotional makeover.</br><br>
                        3. The charisma of the hosts and experts. Because each episode features a different participant, it's essential that these shows have relatable,
                        charismatic hosts and experts who keep audiences coming back. ABC's "Extreme Makeover: Home Edition" boasts the energetic and compassionate Ty Pennington. 
                        Style's "Foody Call" featured the sexy, flirty Rossi and Michele.
                        Writers must service each of these components. They help producers search for participants with interesting, emotional stories. They then work with experts 
                        and designers to decide what kind of makeover will be the most dramatic—both visually and emotionally. And lastly, they provide the hosts and experts with 
                        story information, jokes and banter to keep the show moving. 
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">talk shows</h5>

                    <p class="writer_side_para">
                         While traditional formats have changed little over the past few decades, talk shows have undergone major tonal shifts. We still have conventional talkers 
                        like "The Tonight Show" and "The Late Show," but we also have pointed, agendized programs likes Comedy Central's "The Daily Show" and "The Colbert Report." 
                        Talk-show writers spend much of their time writing jokes for their hosts. Because many talk shows are strips (daily shows), writers must have encyclopedic 
                        knowledge of current events and pop culture. Writers also research and create the questions hosts ask their guests, as well as special "bits" and sketches 
                        such as Jay Leno's "Jay Walking," David Letterman's "Top Ten Lists," and the 
                        mock feature reports of the "The Daily Show." Many times, writers stand in the
                        wings scribbling jokes, notes and questions to slip to the hosts as the show is shooting.
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">how-to shows</h5>

                    <p class="writer_side_para">
                         The basic how-to shows are often the bread and butter of niche cable networks. The Food Network, for example, thrives on hits such as "The Barefoot Contessa" 
                        and "Good Eats." Yet while these shows indeed offer valuable how-to information, they're actually driven by the personalities of their hosts. Few people tune 
                        into "30 Minute Meals" to write down a recipe; they just enjoy spending a half-hour with the spunky Rachael Ray. Thus, writers must convey how-to information in quick, 
                        digestible chunks, but—like talk-show writers—they must also write in the voice of the show's host. 
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">clip shows</h5>

                    <p class="writer_side_para">
                    Because they require very little shooting, clip shows are some of the cheapest, easiest shows to produce. Programs like VH1's "Best Week Ever" and E!'s "The 101" 
                    rely primarily on snippets of other shows and commentary from comics and pundits, so writers mostly write jokes and voice-over. As with talk shows, this means 
                    staying on top of breaking news and pop culture, as timeliness is a major ingredient in these shows' success. Writers must also be able to write in many 
                    specific voices so jokes and comments sound natural coming from different hosts, guests or comics.
                    Indeed, Writers' jobs are as diverse as the types of shows. But whether it's a talk-show pilot on cable or a long-running network series, unscripted television 
                    is designed to affect us emotionally—which takes talented writers who understand the medium. And that's reality. This article by Chad Gervich is included as a 
                    credible source of information for those interested in learning about the writing of reality programming.
                    </p> 
                </div>
            </div>

            <hr>

            <div class="row d-flex justify-content-start">
                <h3 class="pt-5 pl-5 pb-2 promote_you_header">How to create a reality show</h3>
            </div>

            <div class="row p-2">
                <div class="col-12 pl-3">
                    <p class="writer_side_para">
                        Do you have a great idea for a reality show, 
                        and you’re ready to finally see it on screen? Before you get your reality show produced, you’ll need to plan 
                        out the show’s structure and put together a stellar pitch package. Once you have an outline and a short reel featuring the highlights of your show, you can 
                        start networking with TV producers and executives to get your name out there and get your show in front of potential buyers.
                    </p> 

                    <h5 class="pt-2 pl-5 pb-2 promote_you_header">choosing a concept for your show</h5>

                    <ul class="writer_side_para">
                        <li class="mb-2">
                            Make a show about someone or something you have access to. Find someone interesting you know and ask them to be the subject of your reality show. 
                            You could also find a group of people or a business in your town to focus on. Avoid pitching a show that’s about celebrities or exotic, far off places; 
                            you probably won’t have access to them when you’re just starting out.
                        </li>

                        <li class="mb-2">
                            Choose a structure for your show. Up front you’ll need to decide how your show will be structured. </br>There are two main structures for reality shows:
                            <ol>
                                <li class="mt-1 mb-2">
                                    <b>Self-contained.</b> Self-contained reality shows contain episodes that stand on their own. There’s no storyline that connects all of the episodes together. 
                                    Viewers can watch the episodes out of order and it won’t make a difference. Think: Extreme Home Makeover, Fear Factor, and Hoarders. Self-contained shows 
                                    are generally easier to sell because networks like that viewers can join in at any time in the season.
                                </li>

                                <li class="mb-2">
                                    <b>Arced.</b> Arced reality shows have an overarching storyline that connects every episode. Viewers need to watch the episodes in order to understand what’s going on. 
                                     Examples of arced reality shows are The Real World, Survivor, and The Bachelorette. Arced reality shows are harder to sell to networks because they're riskier; 
                                        if audiences don't tune in for episode one,
                                        the rest of the season could be a bust.
                                </li>
                            </ol>
                        </li>

                        <li class="mb-2">
                            Give your show a format style if you want audiences to know what to expect. Format style reality shows have a similar format they return to each episode. 
                            Dancing with the Stars is an example of a format reality show; every episode features the dancers performing a new routine. The audience expects that tuning in. 
                        </li>

                        <li class="mb-2">
                            Give your show a format style if you want audiences to know what to expect. Format style reality shows have a similar format they return to each episode. 
                            Dancing with the Stars is an example of a format reality show; every episode features the dancers performing a new routine. The audience expects that tuning in. 
                            A format reality show is a good choice if your show will feature different characters or storylines each episode. If your reality show is about parents moving 
                            into their kid's college dorm for a week, you could have a different family in each episode. The parents moving into the dorm each episode would be the format 
                            people would come to expect.
                        </li>

                        <li class="mb-2">
                            Make your show docu-style if you want it to feel like a documentary.                                                
                            Docu-style reality shows don't have a format; they just follow the main characters 
                            around as they go about their lives. Keeping Up with the Kardashians is an example of a docu-style reality show.
                            A docu-style reality show is a good option if the premise of your show is examining an interesting person or group of people
                            as they navigate their world. 
                            If you're making a show about a retired pilot, filming like a documentary will be easier than trying to come up with a format for your character to repeat every episode.
                        </li>


                    </ul>
                </div>
            </div>
                                        
            <div class="row mt-3">
                <div class="col-lg-6 col-md-6 text-center p-3 col-sm-12">
                    <a class="realbtn btn-warning" href="sample.php">View Pitch Sample</a>
                </div>
                <div class="col-lg-6 col-md-6 text-center p-3 col-sm-12">
                    <a class="realbtn btn-warning" href="wregistration.php">Register</a>
                </div>
            </div>
           
        </div>
        <?php require "scripts/sidebar_member_benefits.php"; ?>
    </div>
    
</section>

     



<?php
 require "scripts/footer_two.php";
?>