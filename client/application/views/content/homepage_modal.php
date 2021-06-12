<div id="beritaModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Tambah Berita</h4>
                </div>
                <div class="modal-body">
                    <label>Title</label>
                    <input type="text" name="title_berita" id="title_berita" class="form-control" />
                    <span id="title_berita_error" class="text-danger"></span>
                    <br />
                    <label>Sumber</label>
                    <input type="text" name="subtitle_berita" id="subtitle_berita" class="form-control" />
                    <span id="subtitle_berita_error" class="text-danger"></span>
                    <br />
                    <label>Penulis</label>
                    <select name="id_angt" id="id_angt" class="form-control">
                        <?php 
                            
                            foreach($anggota as $row)
                            { 
                                echo '<option value="'.$row->id_angt.'">'.$row->nama.'</option>';
                            }
                        ?>
                    </select>
                    <span id="id_angt_error" class="text-danger"></span>
                    <br />
                    <input class="form-control-file " type="file" name="image">
                    <br />
                    <label>Isi Berita</label>
                    <textarea class="form-control" name="isi_berita" id="isi_berita"cols="50" rows="10" form="user_form"></textarea>
                    <span id="isi_berita_error" class="text-danger"></span>
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_berita" id="id_berita" />
                    <input type="hidden" name="data_action" id="data_action"/>
                    <input type="submit" name="action" id="action" class="btn btn-success"/>     
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal 1-->
<div class="portfolio-modal modal fade" id="detailContentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <div id="detailContent">



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>