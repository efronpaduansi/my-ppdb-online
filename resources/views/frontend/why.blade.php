    <style>
        #why{
            background: #DEDEDE;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            margin-top: -13em;
            padding-bottom: 5em
        }
        #why-card{
            margin-top: 2em!important;
        }
    </style>
   
   <section id="why">
    <div class="container">
        <h1 class="about-title">Kenapa Harus Kami?</h1>
        <p class="text-center">Kami memiliki alasan, itulah kenapa anda harus memilih kami.</p>
        <div class="row" id="why-card">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 shadow-lg">
                <div class="card text-center border-success" style="width: 18rem;">
                    <img src="{{ asset('frontend/img/why/akreditasi.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h4 class="card-text">Terakreditasi A</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 shadow-lg">
                <div class="card text-center border-success" style="width: 18rem;">
                    <img src="{{ asset('frontend/img/why/fasilitas.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h4 class="card-text">Fasilitas Terlengkap</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 shadow-lg">
                <div class="card text-center border-success" style="width: 18rem;">
                    <img src="{{ asset('frontend/img/why/pengajar.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h4 class="card-text">Pengajar Lulusan Kampus Ternama</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </section>
