<template>
    <div class="footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-3">
                    <div class="informations">
                        <h4>Informazioni</h4>
                        <div class="links">
                            <ul>
                                <li><a href="#">Chi siamo</a></li>
                                <li><a href="#">Ristoranti</a></li>
                                <li><a href="#">Sviluppatori</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="informations">
                        <h4>Note legali</h4>
                        <div class="links">
                            <ul>
                                <li><a href="#">Termini e condizioni</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Cookies</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="informations">
                        <h4>Help</h4>
                        <div class="links">
                            <ul>
                                <li>
                                    Contatti:
                                    <div class="contacts">
                                        <ul>
                                            <li class="mt-0">Telefono: 3512497684</li>
                                            <li class="mt-0">E-mail: deliveboo.help@gmail.com</li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer d-flex justify-content-between">
                <div class="language d-flex align-items-center">
                    <h6 class="mb-0">Lingua</h6>
                    <select name="language" class="ml-4 mr-2">
                        <option value="Italiano">Italiano</option>
                        <option value="Francese">Français</option>
                        <option value="Inglese">English</option>
                        <option value="Tesesco">Deutsch</option>
                        <option value="Spagnolo">Español</option>
                    </select>
                    <i class="fa-solid fa-earth-europe"></i>
                </div>
                <div class="socials d-flex align-items-center ml-5">
                    <div class="single-social">
                        <a href=""><i class="fa-brands fa-facebook-square"></i></a>
                    </div>
                    <div class="single-social">
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                    </div>
                    <div class="single-social">
                        <a href=""><i class="fa-brands fa-facebook-square"></i></a>
                    </div>
                    <div class="single-social">
                        <a href=""><i class="fa-brands fa-google-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style lang="scss" scoped>
.footer{
    background-color: #2E3333;
    padding: 50px;
    color: white;
    ul{
        list-style-type: none;
    }
    .col-3{
        background-color: #434848;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 10px 10px 5px 5px rgb(0, 0, 0, 0.5);
    }
    .contacts{
        font-size: 12px;
    }
    h4{
        font-family: 'Koulen', cursive;
        font-size: 25px;
    }
    li{
        margin-top: 10px;
        margin-left: 20px;
        a{
            color: white;
            text-decoration: none;
        }
    }
    .informations{
        margin-left: 20px;
    }
    .language{
        margin-top: 40px;
        background-color: #434848;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 10px 10px 5px 5px rgb(0, 0, 0, 0.5);
        width: 20%;
        i{
            font-size: 25px;
        }
        h6{
            font-size: 23px;
            font-family: 'Koulen', cursive;
        }
        select{
            background-color: #7d7e7e;
            border-radius: 10px;
            color: white;
            border: none;
        }
        i, h6{
            vertical-align: middle;
        }
    }
    .socials{
        .single-social{
            margin-top: 40px;
            background-color: #434848;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 10px 10px 5px 5px rgb(0, 0, 0, 0.5);
            margin-left: 10px;
            i{
                font-size: 30px;
            }
            a{
                color: white;
                text-decoration: none;
            }
        }
    }
}
</style>