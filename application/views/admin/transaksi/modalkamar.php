<div id="carikamar" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 30px 30px 30px 30px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cari Kamar</h4>
            </div><br/>
<table id="table2" class="table penelitian table-bordered table-striped" width="100%">
    <thead>     
        <tr>
            <th>Kode Kamar</th>
            <th>Nama Blok Hotel</th>
            <th>Lokasi</th>
            <th>Harga Sewa</th>
          <th>Opsi</th>
        </tr>
    </thead>

            <tbody>
            <?php
            foreach ($dataKH as $data){?>
            <tr>
            <td><?php echo $data['kode_kamar']; ?></td>
            <td><?php echo $data['namablok']; ?></td>
            <td><?php echo $data['lantai']; ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($data['hargasewa']).',00'; ?></td>
                        <td class="text-center">
                        <button type="button" id="kamar<?php echo $data['kode_kamar']?>" data-dismiss="modal" class="btn btn-next" style="float: left;">Pilih</button>
                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
     </div>
    </div>
</div>