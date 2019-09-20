  <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
            <fieldset style="width: 50%; margin: 0 auto;">
                <center><legend>Form Pencarian</legend></center>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtNumber">Nomor Induk</label>
                    <div class="col-md-5">
                        <input id="txtNumber" name="txtNumber" placeholder="tulis nomor induk" class="form-control input-md" required="" type="text">
                        <span class="help-block" style="color: red"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtName">Nama</label>
                    <div class="col-md-5">
                        <input id="txtName" name="txtName" class="form-control input-md" required="" type="text" readonly>
                        <span class="help-block" style="color: red"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtEmail">Email</label>
                    <div class="col-md-5">
                        <textarea id="txtEmail" name="txtEmail" class="form-control input-md" required="" readonly></textarea>
                        <span class="help-block" style="color: red"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtPhone">Telepon</label>
                    <div class="col-md-5">
                        <input id="txtPhone" name="txtPhone" class="form-control input-md" required="" type="text" readonly>
                        <span class="help-block" style="color: red"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtAlasan">Alasan</label>
                    <div class="col-md-5">
                        <input id="txtAlasan" name="txtAlasan" placeholder="tulis alasan" class="form-control input-md" required="" type="text">
                        <span class="help-block" style="color: red"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btnSimpan"></label>
                    <div class="col-md-4">
                        <button id="btnSimpan" name="btnSimpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <script type="text/javascript" src="js/jquery-min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-min.js"></script>
        <script type="text/javascript" src="js/bootstrap-dialog-min.js"></script>
        <script type="text/javascript" src="js/cari.js"></script>