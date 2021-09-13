
<style>
    .bi{
        font-size : 30px;
        color: white;
    }

    .toggle_writer{
        position: fixed;
        top : 30px;
        left : 20px;
        background-color : #004883;
        color : whitesmoke;
        z-index: 900; margin : 0;

    }

    .writers_list{
        background-color : #004883;
        width : 250px;
        position : fixed;
        top: 0px;
        right: -250px;
        height : 100vh;
        transition : all ease-in .5s;
        z-index: 300;
    }

    .show{
        right : 0px;
    }
    
    .writers_option{
        list-style-type: none;
        text-transform : capitalize;
        padding : 0;
        margin-top : 20vh;
    }

    .option{
        text-align: center;
        padding : 5px;
    }

    .option:hover{
        border-bottom : 1px solid white;
    }
    
    .option_link{
        font-size : 15px;
        color : white;
        font-family: 'Poppins', serif;
        font-weight : 300;
        padding : 5px;
    }

    .option_link:hover{
        color :grey;
    }

    @media only screen and (max-width: 425px) {
        .bi{
            font-size : 20px;
        }
    }

    @media only screen and (max-width: 425px) {
        .bi{
            font-size : 15px;
        }
    }

</style>


<button class="btn toggle_writer rounded-circle"><i class="bi bi-justify"></i></button>

<div class="writers_list py-2">
    <div id="logo" class="d-flex justify-content-center">
        <a href="index.php"><img src="img/logo.png" alt="logo" width = "243px" height="90px"></a>
    </div>
    <ul class="writers_option">
        <li class="option"><a class="option_link" href="promoteyou.php">Promoting You</a></li>
        <li class="option"><a class="option_link" href="business.php">Business of writing</a></li>
        <li class="option"><a class="option_link" href="pitching.php">Pitching Reality</a></li>
        <li class="option"><a class="option_link" href="sample.php">Display Listing and Image Pitch</a></li>
        <li class="option"><a class="option_link" href="businessOption.php">Business of Options</a></li>
        <li class="option"><a class="option_link" href="hollywood.php">Hollywood outsiders pitched</a></li>
        <?php 
            if(!is_loggedIn()){ ?>
        <li class="option"><a class="option_link" href="wregistration.php">Register</a></li>
        <?php } ?>
    </ul>
</div>



<script>
    let btn = document.querySelector(".toggle_writer");

    let list = document.querySelector(".writers_list");

    btn.addEventListener("click", function(){
        list.classList.toggle("show");
    });
</script>