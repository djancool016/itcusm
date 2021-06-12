<?php include ('templates/header.php')?>  

    
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container" >
                <div class="d-flex">
                    <a class="px-2" href="#page-top"><img src="<?php echo base_url();?>assets/img/logo_USM.png" alt="..." width="auto" height="40"/></a>
                    <a class="px-2" href="#page-top"><img src="<?php echo base_url();?>assets/img/logo_ITC.png" alt="..." width="auto" height="40"/></a>
                    <a class="px-2" href="#page-top"><img src="<?php echo base_url();?>assets/img/logo_FTIK.png" alt="..." width="auto" height="40"/></a>
                </div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#profil">Profil</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#tentang">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#berita">Berita</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#pengumuman">Pengumuman</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#artikel">Artikel</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#prestasi">Prestasi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" id="profil" style="background-image : url('<?php echo base_url();?>assets/img/laptopcode.jpg'); height:100vh">
            <div class="container">
                <div class="masthead-subheading mb-4">Selamat Datang Di Laman Profil</div>
                <div class="masthead-heading text-uppercase mb-4">UKM ITC</div>
                <div class="masthead-subheading">Universitas Semarang</div>
            </div>
        </header>
        <!-- tentang-->
        <section class="page-section" id="tentang">
            <h2 class="section-heading text-uppercase">Tentang Kami</h2>
            <?php include ('content/tentangkami.php')?>  
        </section>
        <!-- berita-->
        <section class="page-section bg-light" id="berita"  style="height:100vh">
            <div class="container-fluid">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Berita Terkini</h2>
                    <?php include ('content/berita.php')?>  
                </div>
            </div>
        </section>
        <!-- pengumuman-->
        <section class="page-section" id="pengumuman"  style="height:100vh">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Pengumuman</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
        </section>
        <!-- artikel-->
        <section class="page-section bg-light" id="artikel"  style="height:100vh">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Artikel</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
        </section>
        <!-- prestasi-->
        <section class="page-section" id="prestasi"  style="height:100vh">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Prestasi</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">
                        Copyright &copy; Your Website
                        <!-- This script automatically adds the current year to your website footer-->
                        <!-- (credit: https://updateyourfooter.com/)-->
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>

<?php include ('templates/footer.php')?>

<?php include ('content/homepage_modal.php')?>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

    function fetch_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>homepage/action",
            method:"POST",
            data:{
                data_action:'fetch_tentang_kami',           
            },
            success:function(data){
                $('#tentang_kami').html(data);
            }
        })

        $.ajax({
            url:"<?php echo base_url(); ?>homepage/action",
            method:"POST",
            data:{
                data_action:'fetch_berita',           
            },
            success:function(data){
                $('#slider').html(data);
                card_slider();     
            }
        })
    }
    fetch_data();

    $(document).on('click', '.add_berita', function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Tambah Berita");   
        $('#action').val('Insert');
        $('#data_action').val('insert_berita');
        $('#beritaModal').modal('show');
    });

    $(document).on('click', '.detail_berita', function(){
        var id_berita = $(this).attr('value');   
        $.ajax({
            url:"<?php echo base_url(); ?>homepage/action",
            method:"POST",
            data:{
                id_berita:id_berita,
                data_action:'fetch_detail_berita'    
            },
            success:function(data){
                $('#detailContent').html(data);  
                $('#detailContentModal').modal('show');
            }
        })
    });

   

    $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url(); ?>homepage/action",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            
            {
                if(data.success)
                {
                    $('#user_form')[0].reset();
                    $('#beritaModal').modal('hide');
                    location.reload();
                    if($('#data_action').val() == "insert_berita")
                    {
                        alert("Data Berhasil Ditambahkan");
                    }
                    if($('#data_action').val() == "edit_berita")
                    {
                        alert("Data Berhasil Diubah");
                    }
                    if($('#data_action').val() == "delete_berita")
                    {
                        alert("Data Berhasil Dihapus");
                    }
                }

                if(data.error)
                {
                    $('#title_berita_error').html(data.title_berita_error);
                    $('#isi_berita_error').html(data.isi_berita_error);
                }
            }
        })
    });


    $(document).on('click', '.edit_berita', function(){

        var id_berita = $(this).attr('value');     

        $.ajax({
            url:"<?php echo base_url(); ?>homepage/action",
            method:"POST",
            data:{
                id_berita : id_berita, 
                data_action:'fetch_single_berita'},
            dataType:"json",
            success:function(data)
            {      
                $('#beritaModal').modal('show');
                $('.modal-title').text("Ubah Berita");
                $('#id_berita').val(id_berita);
                $('#title_berita').val(data.title_berita);
                $('#subtitle_berita').val(data.subtitle_berita);
                $('#id_angt').val(data.id_angt);
                $('#isi_berita').val(data.isi_berita);    
                $('#action').val('edit_berita');
                $('#data_action').val('edit_berita');
            }
        })
    });

    $(document).on('click','.delete_berita', function()
    {
        var id_berita = $(this).attr('value');  
        console.log(id_berita);
        if(window.confirm('Hapus data?'))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>homepage/action",
                method:"POST",
                data:{
                    id_berita : id_berita, 
                    data_action:'delete_berita'},
                dataType:"json",
                success:function(data)
                {
                    if(data.success)
                    {    
                        location.reload();
                    }
                },
            })
        }
    }); 


    function card_slider(){
        //current position
        var pos = 0;
        //number of slides
        var totalSlides = $('#slider-wrap ul li').length;
        //get the slide width
        var sliderWidth = $('#slider-wrap').width();
           
            
            /*****************
             BUILD THE SLIDER
            *****************/
            //set width to be 'x' times the number of slides
            $('#slider-wrap ul#slider').width(sliderWidth*totalSlides);
            
            //next slide 	
            $('#next').click(function(){
                slideRight();
            });
            
            //previous slide
            $('#previous').click(function(){
                slideLeft();
            });
            
            
            /*************************
             //*> OPTIONAL SETTINGS
            ************************/
            //automatic slider
            var autoSlider = setInterval(slideRight, 20000);
            
            //for each slide 
            $.each($('#slider-wrap ul li'), function() { 
            //set its color
            var c = $(this).attr("data-color");
            $(this).css("background",c);
            
            //create a pagination
            var li = document.createElement('li');
            $('#pagination-wrap ul').append(li);	   
            });
            
            //counter
            countSlides();
            
            //pagination
            pagination();
            
            //hide/show controls/btns when hover
            //pause automatic slide when hover
            $('#slider-wrap').hover(
            function(){ $(this).addClass('active'); clearInterval(autoSlider); }, 
            function(){ $(this).removeClass('active'); autoSlider = setInterval(slideRight, 20000); }
            );
            
            
        /***********
         SLIDE LEFT
        ************/
        function slideLeft(){
            pos--;
            if(pos==-1){ pos = totalSlides-1; }
            $('#slider-wrap ul#slider').css('left', -(sliderWidth*pos)); 	
            
            //*> optional
            countSlides();
            pagination();
        }


        /************
         SLIDE RIGHT
        *************/
        function slideRight(){
            pos++;
            if(pos==totalSlides){ pos = 0; }
            $('#slider-wrap ul#slider').css('left', -(sliderWidth*pos)); 
            
            //*> optional 
            countSlides();
            pagination();
        }

        /************************
         //*> OPTIONAL SETTINGS
        ************************/
        function countSlides(){
            $('#counter').html(pos+1 + ' / ' + totalSlides);
        }

        function pagination(){
            $('#pagination-wrap ul li').removeClass('active');
            $('#pagination-wrap ul li:eq('+pos+')').addClass('active');
        }              
    }
})

</script>