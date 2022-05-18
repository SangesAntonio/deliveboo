<template>
  <footer>
    <div class="container pb-5 pb-lg-0">
      <div class="row align-items-center justify-content-between">
        <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-4 mb-lg-0">
          <div class="informations grow">
            <h4 class="pl-3">Informazioni</h4>
            <div class="links">
              <ul>
                <li><a href="#">Chi siamo</a></li>
                <li><a href="#">Ristoranti</a></li>
                <li><a href="#">Sviluppatori</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-4 mb-lg-0">
          <div class="informations grow">
            <h4 class="pl-3">Note legali</h4>
            <div class="links">
              <ul>
                <li><a href="#">Termini e condizioni</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Cookies</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-4 mb-lg-0">
          <div class="informations grow">
            <h4 class="pl-3">Help</h4>
            <div class="links">
              <ul>
                <li><a href="#">Contatti</a></li>
                <li><a href="#">FAQ</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="bottom-footer col-12 col-md-6 col-lg-3 mb-5 mb-md-4 mb-lg-0">
          <div
            class="informations d-flex flex-column justify-content-around grow"
          >
            <div class="language d-flex justify-content-center align-items-center">
              <h6 class="mb-0">Lingua</h6>
              <select name="language" class="mx-3 px-2">
                <option value="Italiano">Italiano</option>
                <option value="Francese">Français</option>
                <option value="Inglese">English</option>
                <option value="Tesesco">Deutsch</option>
                <option value="Spagnolo">Español</option>
              </select>
              <i class="fa-solid fa-earth-europe"></i>
            </div>
            <div
              class="socials d-flex align-items-center justify-content-around"
            >
              <div class="single-social">
                <a href=""><i class="fa-brands fa-facebook-square"></i></a>
              </div>
              <div class="single-social">
                <a href=""><i class="fa-brands fa-instagram"></i></a>
              </div>
              <div class="single-social">
                <a href=""><i class="fa-brands fa-github"></i></a>
              </div>
              <div class="single-social">
                <a href=""><i class="fa-brands fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col mt-5 text-center">
          <p style="color: black">Made with &#10084; from Team 1</p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style lang="scss" scoped>
footer {
  background-color: #f8f9fa;
  padding: 50px;
  color: white;
  ul {
    list-style-type: none;
  }
  .contacts {
    font-size: 12px;
  }
  h4 {
    font-size: 25px;
  }
  li {
    margin-top: 5px;
    margin-left: 20px;
    a {
      color: white;
      text-decoration: none;
    }
  }
  .informations {
    margin-left: 20px;
    background-color: #02b7b0;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 10px 10px 5px 5px rgb(2, 183, 176, 0.5);
    height: 150px;
  }
  .language {
    i {
      font-size: 20px;
    }
    h6 {
      font-size: 17px;
    }
    select {
      background-color: #026b68;
      border-radius: 10px;
      color: white;
      border: none;
    }
    i,
    h6 {
      vertical-align: middle;
    }
  }
  .socials {
    .single-social {
      i {
        font-size: 25px;
      }
      a {
        color: white;
        text-decoration: none;
      }
    }
  }
  @media screen and (max-width: 576px) {
    .bottom-footer {
      width: 50%;
    }
  }
}
</style>