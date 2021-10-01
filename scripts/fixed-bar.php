<style>
    a{
        color : black;
    }
    .profile_toggle{
        width : 250px;
        height : 100vh;
        display : none;
        transform: translateX(-250px);
        transition : all ease-in .5s;

    }
    .sho{
        transform: translateX(0px);
        display : block;
    }

    .profile_option{
        list-style-type: none;
        text-transform : capitalize;
        padding : 0;
    }
    .profile_link{
        color : black;
    }
    .option{
        padding : 12px;
        cursor : pointer;
        font-size : 18px;
    }
    .sub-option{
        font-size : 15px;
    }

    .option:hover{
        background-color : #dbd9d9;
    }
    .sub-option:hover{
        background-color : #ccc4;
    }
</style>

<div class="navbar-container bg-dark"> 
    <div class="row">
        <div class="col-3">
            <nav class="navbar navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
            </nav>

        </div>
        <div class="col-9 text-right pt-2">
            <a href="profile.php" class="text-light mr-3"><i class="bi bi-person"></i> <?= $_SESSION['firstname'] ?></a>
            <a href="logout.php" class="text-light mr-3"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>    
</div>
<div class="profile_toggle border py-2" style="background-color: rgb(218, 214, 214);">
    <ul class="profile_option py-2">
        <li class="option"><a href="<?= $_SESSION['index'] ?>"><i class="bi bi-house"></i> <span class="ml-2">Home</span></a></li>

        <li class="option">
          <div data-toggle="collapse" data-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">  <i class="bi bi-person-fill"></i>   <span class="ml-2">Profile</span> </div>
            <div class="collapse mt-2" id="collapseProfile">
                 <ul class="profile_option">
                    <li class="pl-5 py-2 sub-option"><a class="profile_link" href="profile.php"><i class="bi bi-person-fill"></i> My Profile</a></li>
                    <li class="pl-5 py-2 sub-option"><a class="profile_link" href="edit_profile.php"><i class="bi bi-person-plus-fill"></i> Edit Profile</a></li>
                 </ul>
            </div>
        </li>
        
        <?php if(role() == 2){ ?>
        <li class="option">
            <div data-toggle="collapse" data-target="#collapseDraft" aria-expanded="false" aria-controls="collapseDraft">  <i class="bi bi-pencil-square"></i> <span class="ml-2">Drafts</span></div>
            <div class="collapse mt-2" id="collapseDraft">
                 <ul class="profile_option">
                    <li class="pl-5 py-2  sub-option"><a href="writer_edit.php"><i class="bi bi-plus-lg"></i> Create New</a></li>
                    <li class="pl-5 py-2  sub-option"><a href="drafts.php"><i class="bi bi-journal-bookmark"></i> My Drafts</a></li>
                 </ul>
            </div>
        </li>
        <li class="option">
            <div data-toggle="collapse" data-target="#collapseReel" aria-expanded="false" aria-controls="collapseDraft">  <i class="bi bi-film"></i> <span class="ml-2">Sizzle Reel</span></div>
            <div class="collapse mt-2" id="collapseReel">
                 <ul class="profile_option">
                    <li class="pl-5 py-2  sub-option"><a href="reel.php"><i class="bi bi-sliders"></i> Manage</a></li>
                 </ul>
            </div>
        </li>
        <?php } ?>
        <?php if(role() == 1){ ?>
        <li class="option">
            <div data-toggle="collapse" data-target="#collapseMovie" aria-expanded="false" aria-controls="collapseDraft"> <i class="bi bi-camera-reels"></i> <span class="ml-2">Gigs</span></div>
            <div class="collapse mt-2" id="collapseMovie">
                 <ul class="profile_option">
                    <li class="pl-5 py-2  sub-option"><i class="bi bi-plus-lg"></i> New Gig</li>
                    <li class="pl-5 py-2  sub-option"><i class="bi bi-camera-reels"></i> My Gigs</li>
                 </ul>
            </div>
        </li>
        <?php } ?>
        <?php if(role() == 3){ ?>
        <li class="option">
            <div data-toggle="collapse" data-target="#collapseC" aria-expanded="false" aria-controls="collapseDraft"><i class="bi bi-building"></i> <span class="ml-2">Company Profile</span></div>
            <div class="collapse mt-2" id="collapseC">
                 <ul class="profile_option">
                    <li class="pl-5 py-2  sub-option"><a href="company_details.php?id=<?=$user_details->company_id ?>"><i class="bi bi-building"></i> View Profile </a> </li>
                    <li class="pl-5 py-2  sub-option"><a href="edit_company_details.php?id=<?=$user_details->company_id ?>"><i class="bi bi-building"></i> Edit Profile </a></li>
                 </ul>
            </div>
        </li>
        <li class="option">
            <div data-toggle="collapse" data-target="#collapseP" aria-expanded="false" aria-controls="collapseDraft"><i class="bi bi-film"></i> <span class="ml-2">Projects</span></div>
            <div class="collapse mt-2" id="collapseP">
                 <ul class="profile_option">
                    <li class="pl-5 py-2  sub-option"><i class="bi bi-plus-lg"></i> Add New</li>
                    <li class="pl-5 py-2  sub-option"><i class="bi bi-film"></i> Manage Projects</li>
                 </ul>
            </div>
        </li>
        <li class="option"><i class="bi bi-pen"></i> <span class="ml-2"><a class="profile_link" href="all_writers.php">Writers</a></span></li>
        <li class="option"><i class="bi bi-people-fill"></i><span class="ml-2"><a class="profile_link" href="all_contestants.php">Contestants</a></span></li>
        <?php } ?>
        <?php if(role() == 4){ ?>
        <li class="option"><i class="bi bi-pen"></i> <span class="ml-2"><a class="profile_link" href="all_writers.php">Writers</a></span></li>
        <li class="option"><i class="bi bi-people-fill"></i><span class="ml-2"><a class="profile_link" href="all_contestants.php">Contestants</a></span></li>
        <li class="option"><i class="bi bi-people-fill"></i><span class="ml-2"><a class="profile_link" href="all_executives.php">Executives</a></span></li>

        <?php } ?>
        <li class="option"><a href="logout.php"><i class="bi bi-box-arrow-right"></i><span class="ml-2">Logout</span></a></li>
        
            
    </ul>
</div>

<script>
    let btn = document.querySelector(".navbar-toggler");

    let list = document.querySelector(".profile_toggle");

    btn.addEventListener("click", function(){
        list.classList.toggle("sho");
    });
</script>