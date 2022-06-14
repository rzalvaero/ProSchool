<!DOCTYPE html>
<html>

<head>
    <title>PPDB - Formuli Pendaftaran</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif
        }

        :root {
            --primary-color: #02044A;
            --secondery-color: #25CC88;
            --shadow-color: #9d9fb3
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center
        }

        .form__container {
            margin-top: 4rem;
            background-color: var(--primary-color);
            border-radius: 2rem;
            padding: 1rem
        }

        .title__container {
            width: 100%;
            height: 4.5rem;
            padding: 0.6rem 1.5rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #42434e
        }

        .title__container h1 {
            letter-spacing: 2px;
            color: white;
            font-size: 1.25rem;
            margin-bottom: 0.4rem
        }

        .title__container p {
            color: var(--shadow-color);
            font-size: 0.75rem
        }

        .body__container {
            display: flex
        }

        .left__container {
            width: 35%;
            display: flex;
            justify-content: center;
            border-right: 1px solid #42434e;
            padding: 1.25rem 0;
            margin-right: 2rem;
            padding-right: 1.8rem
        }

        .side__titles {
            flex-direction: column;
            align-items: center;
            justify-content: center
        }

        .title__name {
            padding: 0.6rem 0.1rem;
            margin-bottom: 0.25rem
        }

        .title__name h3 {
            margin-bottom: 0.20rem;
            text-align: right;
            color: #ffffff;
            font-size: 0.8rem;
            letter-spacing: 1px
        }

        .title__name p {
            text-align: right;
            color: var(--shadow-color);
            font-size: 0.75rem
        }

        .progress__bar__container {
            padding-top: 0.6rem
        }

        .progress__bar__container ul .active {
            background-color: var(--secondery-color)
        }

        .progress__bar__container ul li {
            display: flex;
            align-items: center;
            justify-content: center;
            list-style: none;
            background: var(--shadow-color);
            padding: 0.5rem 0.6rem;
            margin-bottom: 1.2rem;
            border-radius: 50%;
            font-size: 1.4rem;
            color: #ffffff;
            margin-left: 2rem
        }

        .progress__bar__container ul li::before {
            content: '';
            width: 1px;
            height: 11vh;
            position: absolute;
            background-color: var(--shadow-color)
        }

        .progress__bar__container ul .active::before {
            content: '';
            width: 1px;
            height: 11vh;
            position: absolute;
            background-color: var(--secondery-color)
        }

        .right__container {
            width: 65%;
            display: flex;
            padding: 1.5rem 1.5rem
        }

        .right__container fieldset {
            border: none
        }

        .sub__title__container {
            padding: 1rem 0 1.2rem 0;
            border-bottom: 1px solid #42434e
        }

        .sub__title__container h2 {
            letter-spacing: 2px;
            color: #ffffff;
            margin: 0.4rem 0
        }

        .sub__title__container p {
            font-size: 0.75rem;
            color: var(--shadow-color)
        }

        .active__form {
            display: none
        }

        .input__container {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-top: 1.25rem
        }

        .input__container label {
            color: #ffffff;
            font-size: 0.75rem;
            margin-bottom: 0.4rem
        }

        .input__container input {
            padding: 0.5rem;
            font-size: 1.4rem;
            border-radius: 0.75rem;
            background: none;
            border: 1px solid var(--secondery-color);
            margin-bottom: 1.2rem;
            outline: none;
            color: #ffffff
        }

        .nxt__btn {
            width: 25%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 0;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 2rem;
            background: var(--secondery-color);
            color: #ffffff
        }

        .nxt__btn:hover {
            transform: scale(1.03);
            background: #1cd68c;
            cursor: pointer
        }

        .buttons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0;
            padding: 0
        }

        .prev__btn {
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: none;
            color: #ffffff;
            font-size: 18px;
            cursor: pointer
        }

        .selection {
            display: flex;
            align-items: center;
            border: 1px solid var(--shadow-color);
            padding: 0.5rem 0.5rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            width: 100%
        }

        .selection:hover {
            border: 1px solid var(--secondery-color);
            background-color: var(--primary-color);
            cursor: pointer
        }

        .imoji {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.4rem 0.4rem;
            margin: 0 0.2rem;
            margin-right: 0.4rem;
            font-size: 2rem;
            font-weight: 900;
            color: yellow;
            border-radius: 50%;
            background: var(--shadow-color)
        }

        .descriptionTitle h3 {
            color: #ffffff;
            margin-bottom: 4px
        }

        .descriptionTitle p {
            font-size: 0.75rem;
            color: var(--shadow-color)
        }

        .slider {
            display: flex;
            align-items: center;
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 0.75rem;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            position: relative;
            margin-top: 3rem
        }

        .slider:hover {
            opacity: 1
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: var(--secondery-color);
            cursor: pointer;
            position: relative
        }

        .slider::-webkit-range-thumb {
            width: 50px;
            height: 50px;
            background: var(--secondery-color);
            cursor: pointer;
            position: relative
        }

        .output__value {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            border-radius: 2em;
            padding: 0.8rem 0.8rem;
            position: absolute;
            background-color: var(--secondery-color)
        }

        .output__value::after {
            content: '';
            width: 1.5rem;
            height: 1.5rem;
            background-color: black;
            transform: rotate(45deg);
            position: absolute;
            margin-top: 40px;
            background-color: var(--secondery-color)
        }

        @media only screen and (max-width: 600px) {
            body {
                background-color: var(--primary-color)
            }

            .form__container {
                margin: 0;
                padding: 0
            }

            .body__container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                margin: 0;
                padding: 0
            }

            .right__container {
                width: 90%;
                margin: 0
            }

            .title__container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 0.5rem
            }

            .left__container {
                display: flex;
                flex-direction: column;
                margin: 0;
                padding: 0;
                border: none
            }

            .buttons {
                justify-content: space-between
            }

            .descriptionTitle h3 {
                font-size: 1rem
            }

            .descriptionTitle p {
                font-size: 0.6rem
            }

            .side__titles {
                display: none;
                flex-direction: row;
                justify-content: space-evenly
            }

            .title__name h3 {
                font-size: 0.75rem
            }

            .title__name p {
                font-size: 0.5rem
            }

            .progress__bar__container {
                margin-bottom: 0
            }

            .progress__bar__container ul {
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                margin-bottom: 0;
                padding: 0 2rem
            }

            .progress__bar__container ul::before {
                height: 5vh
            }

            .progress__bar__container ul li {
                margin: 10px;
                padding: 10px
            }

            .progress__bar__container ul .active::before {
                transform: rotate(90deg)
            }

            body {
                background: #eee
            }

            .form-control {
                border-radius: 0;
                box-shadow: none;
                border-color: #d2d6de
            }

            .select2-hidden-accessible {
                border: 0 !important;
                clip: rect(0 0 0 0) !important;
                height: 1px !important;
                margin: -1px !important;
                overflow: hidden !important;
                padding: 0 !important;
                position: absolute !important;
                width: 1px !important
            }

            .form-control {
                display: block;
                width: 100%;
                height: 34px;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.42857143;
                color: #555;
                background-color: #fff;
                background-image: none;
                border: 1px solid #ccc;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
                -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
                -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
            }

            .select2-container--default .select2-selection--single,
            .select2-selection .select2-selection--single {
                border: 1px solid #d2d6de;
                border-radius: 0;
                padding: 6px 12px;
                height: 34px
            }

            .select2-container--default .select2-selection--single {
                border-radius: 4px;
            }

            .select2-container .select2-selection--single {
                box-sizing: border-box;
                cursor: pointer;
                display: block;
                height: 28px;
                user-select: none;
                -webkit-user-select: none
            }

            .select2-container .select2-selection--single .select2-selection__rendered {
                padding-right: 10px
            }

            .select2-container .select2-selection--single .select2-selection__rendered {
                padding-left: 0;
                padding-right: 0;
                height: auto;
                margin-top: -3px
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #fff;
                line-height: 28px
            }

            .select2-container--default .select2-selection--single,
            .select2-selection .select2-selection--single {
                border: 1px solid #d2d6de;
                border-radius: 0 !important;
                padding: 6px 12px;
                height: 40px !important
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 26px;
                position: absolute;
                top: 6px !important;
                right: 1px;
                width: 20px
            }
        }
    </style>
</head>

<body>
    <div class="form__container">
        <div class="title__container">
            <h1>PPSB - <?php echo date('Y'); ?></h1>
            <p>FORMULIR PENERIMAAN PESERTA DIDIK BARU</p>
        </div>
        <div class="body__container">
            <div class="left__container">
                <div class="side__titles">
                    <div class="title__name">
                        <h3>Data Peserta Didik</h3>
                        <p>Enter & press next</p>
                    </div>
                    <div class="title__name">
                        <h3>Data Pribadi</h3>
                        <p>select & press next</p>
                    </div>
                    <div class="title__name">
                        <h3>Data Periodik</h3>
                        <p>select & press next</p>
                    </div>
                    <div class="title__name">
                        <h3>Data Sekolah Asal</h3>
                        <p>Select & press next</p>
                    </div>
                    <div class="title__name">
                        <h3>Complete</h3>
                        <p>Finaly press submit</p>
                    </div>
                </div>
                <div class="progress__bar__container">
                    <ul>
                        <li class="active" id="icon1">
                            <ion-icon name="person-outline"></ion-icon>
                        </li>
                        <li id="icon2">
                            <ion-icon name="book-outline"></ion-icon>
                        </li>
                        <li id="icon3">
                            <ion-icon name="layers-outline"></ion-icon>
                        </li>
                        <li id="icon4">
                            <ion-icon name="pricetag-outline"></ion-icon>
                        </li>
                        <li id="icon5">
                            <ion-icon name="mail-outline"></ion-icon>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right__container">
                <fieldset id="form1">
                    <div class="sub__title__container ">
                        <p>Langkah 1/5</p>
                        <h2>Data Peserta Didik</h2>
                        <p>Please fill the details below so that we can we can get in contacat with you about our product</p>
                    </div>
                    <div class="input__container">
                        <div class="form-group"> 
                            <label>Jenis Pendaftaran</label> 
                            <select name="jenis" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>- SELECT -</option>
                                <option>Baru</option>
                                <option>Pindahan</option>
                            </select> 
                        </div>
                        <div class="form-group"> 
                            <label>Jalur Pendaftaran</label> 
                            <select name="jalur" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>- SELECT -</option>
                                <option>Umum</option>
                                <option>Prestasi</option>
                            </select> 
                        </div>
                        <label for="name">Hobi</label>
                        <input type="text" name="hobi">
                        <label for="name" name="cita">Cita-cita</label>
                        <input type="text">
                    </div>
                    <div class="buttons"> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                </fieldset>
                <fieldset class="active__form" id="form2">
                    <div class="sub__title__container">
                        <p>Langkah 2/5</p>
                        <h2>Data Pribadi</h2>
                        <p>Please let us know what type of business best describes you as entreprenuer or businessman.</p>
                    </div>
                    <div class="input__container">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="nama">
                        <div class="form-group"> 
                            <label>Jalur Kelamin</label> 
                            <select name="jalur" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>- SELECT -</option>
                                <option>Laki</option>
                                <option>Perumpuan</option>
                            </select> 
                        </div>
                        <label for="name">NIK</label>
                        <input type="text" name="nama">
                        <label for="name">Tempat Lahir</label>
                        <input type="text" name="nama">
                        <label for="name">Tanggal Lahir</label>
                        <input type="date" name="nama">
                        <div class="form-group"> 
                            <label>Agama</label> 
                            <select name="jalur" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option>- SELECT -</option>
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Hindu</option>
                                <option>Budha</option>
                                <option>Protestan</option>
                                <option>Khatolik</option>
                            </select> 
                        </div>
                        <label for="name">Tanggal Lahir</label>
                        <textarea type="text" name="nama"></textarea>
                        <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                    </div>
                </fieldset>
                <fieldset class="active__form" id="form3">
                    <div class="sub__title__container">
                        <p>Step 3/5</p>
                        <h2>What service are looking for ?</h2>
                        <p>Please let us know what type of business best describes you as entreprenuer or businessman.</p>
                    </div>
                    <div class="input__container">
                        <div class="selection newB">
                            <div class="imoji">
                                <ion-icon name="desktop"></ion-icon>
                            </div>
                            <div class="descriptionTitle">
                                <h3>Website Development</h3>
                                <p>Development of online websites</p>
                            </div>
                        </div>
                        <div class="selection exitB">
                            <div class="imoji">
                                <ion-icon name="phone-portrait"></ion-icon>
                            </div>
                            <div class="descriptionTitle">
                                <h3>Development of Mobile App</h3>
                                <p>Development of android and IOS mobile app</p>
                            </div>
                        </div>
                        <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                    </div>
                </fieldset>
                <fieldset class="active__form" id="form4">
                    <div class="sub__title__container">
                        <p>Step 4/5</p>
                        <h2>Please select your budget</h2>
                        <p>Please let us know budget for your project so yes are great that we can give the right quote thanks</p>
                    </div>
                    <div class="input__container"> <input type="range" min="10000" max="500000" value="250000" class="slider">
                        <div class="output__value"> </div>
                        <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                    </div>
                </fieldset>
                <fieldset class="active__form" id="form5">
                    <div class="sub__title__container">
                        <p>Step 5/5</p>
                        <h2>Complete Submission</h2>
                        <p>Thanks for completing the form and for your time.Plss enter your email below and submit the form</p>
                    </div>
                    <div class="input__container"> <label for="Email">Enter your email</label> <input type="text">
                        <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" id="submitBtn" onclick="nextForm();">Next</a> </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<script>
    const nxtBtn = document.querySelector('#submitBtn');
    const form1 = document.querySelector('#form1');
    const form2 = document.querySelector('#form2');
    const form3 = document.querySelector('#form3');
    const form4 = document.querySelector('#form4');
    const form5 = document.querySelector('#form5');


    const icon1 = document.querySelector('#icon1');
    const icon2 = document.querySelector('#icon2');
    const icon3 = document.querySelector('#icon3');
    const icon4 = document.querySelector('#icon4');
    const icon5 = document.querySelector('#icon5');


    var viewId = 1;

    function nextForm() {
        console.log("hellonext");
        viewId = viewId + 1;
        progressBar();
        displayForms();

        console.log(viewId);

    }

    function prevForm() {
        console.log("helloprev");
        viewId = viewId - 1;
        console.log(viewId);
        progressBar1();
        displayForms();
    }

    function progressBar1() {
        if (viewId === 1) {
            icon2.classList.add('active');
            icon2.classList.remove('active');
            icon3.classList.remove('active');
            icon4.classList.remove('active');
            icon5.classList.remove('active');
        }
        if (viewId === 2) {
            icon2.classList.add('active');
            icon3.classList.remove('active');
            icon4.classList.remove('active');
            icon5.classList.remove('active');
        }
        if (viewId === 3) {
            icon3.classList.add('active');
            icon4.classList.remove('active');
            icon5.classList.remove('active');
        }
        if (viewId === 4) {
            icon4.classList.add('active');
            icon5.classList.remove('active');
        }
        if (viewId === 5) {
            icon5.classList.add('active');
            nxtBtn.innerHTML = "Submit"
        }
        if (viewId > 5) {
            icon2.classList.remove('active');
            icon3.classList.remove('active');
            icon4.classList.remove('active');
            icon5.classList.remove('active');

        }
    }

    function progressBar() {
        if (viewId === 2) {
            icon2.classList.add('active');
        }
        if (viewId === 3) {
            icon3.classList.add('active');
        }
        if (viewId === 4) {
            icon4.classList.add('active');
        }
        if (viewId === 5) {
            icon5.classList.add('active');
            nxtBtn.innerHTML = "Submit"
        }
        if (viewId > 5) {
            icon2.classList.remove('active');
            icon3.classList.remove('active');
            icon4.classList.remove('active');
            icon5.classList.remove('active');

        }
    }

    function displayForms() {

        if (viewId > 5) {
            viewId = 1;
        }

        if (viewId === 1) {
            form1.style.display = 'block';
            form2.style.display = 'none';
            form3.style.display = 'none';
            form4.style.display = 'none';
            form5.style.display = 'none';


        } else if (viewId === 2) {
            form1.style.display = 'none';
            form2.style.display = 'block';
            form3.style.display = 'none';
            form4.style.display = 'none';
            form5.style.display = 'none';

        } else if (viewId === 3) {
            form1.style.display = 'none';
            form2.style.display = 'none';
            form3.style.display = 'block';
            form4.style.display = 'none';
            form5.style.display = 'none';
        } else if (viewId === 4) {
            form1.style.display = 'none';
            form2.style.display = 'none';
            form3.style.display = 'none';
            form4.style.display = 'block';
            form5.style.display = 'none';

        } else if (viewId === 5) {
            form1.style.display = 'none';
            form2.style.display = 'none';
            form3.style.display = 'none';
            form4.style.display = 'none';
            form5.style.display = 'block';

        }
    }

    // for slider

    var slider = document.querySelector(".slider");
    var output = document.querySelector(".output__value");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;


    }

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select2').select2({
            closeOnSelect: false
        });
    });
</script>

</html>