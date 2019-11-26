</div>
<section id="user" class="">
<div class="row stats block-1-4 block-m-1-2 block-mob-full" data-aos="fade-up">
        
   
    <div class="col-block stats__col">
        <div class="stats__count">108</div>
        <h5>Projects Completed</h5>
        <a class="smoothscroll" href="#user">Guuru</a>
    </div>
    <div class="col-block stats__col">
        <div class="stats__count">1507</div>
        <h5>Cups of Coffee</h5>
        <a class="smoothscroll" href="#kelas">Wali Kelas</a>
    </div>
    <div class="col-block stats__col ">
        <div class="stats__count">129</div>
        <h5>Awards Received</h5>
        <a class="smoothscroll" href="#siswa">Admin</a>
    </div>
    <div class="col-block stats__col">
        <div class="stats__count">103</div>
        <h5>Happy Clients</h5> 
        <a class="smoothscroll" href="#pelajaran">Guru BK</a>
    </div>

</div> <!-- end stats -->

</section> <!-- end s-stats -->
<div class="container">
<a href="<?= base_url('admin/insertuser'); ?>" class="btn btn-primary" style="margin-bottom: 10px"> + Tambah Data</a>
<table class="table table-striped table-dark">
  <thead >
    <tr>
          <th width="1%">No</th>
          <th width="10%">username</th>
           <th width="15%">nama lengkap</th>
          <th width="15%">email</th>
          <th width="10%">tgl lahir</th>
          <th width="20%">alamat</th>
          <th width="10%">status</th>
          <th style="vertical-align: middle;"width="35%" colspan="2" ><em class="fa fa-cog"></em></th>
        </tr>
  </thead>
  <tbody>
  <?php $i= 1; ?>
  <?php foreach($Member as $ab) : ?>
    <tr>
      <th style="vertical-align: middle;" scope="row" ><?= $i; ?></th>
      <td style="vertical-align: middle;"><?= $ab['username']?></td>
      <td style="vertical-align: middle;"><?= $ab['nama']?></td>
      <td style="vertical-align: middle;"><?= $ab['email']?></td>
      <td style="vertical-align: middle;"><?= $ab['tgl_lahir']?></td>
      <td style="vertical-align: middle;"><?= $ab['alamat']?></td>
      <td style="vertical-align: middle;"><?= $ab['status']?></td>
      <td style="vertical-align: middle;">
            <a href=""class="btn btn-small"><i class="fas fa-edit"></i></a>
						<a onclick="return confirm('apa anda yakin.....?');" href="<?= base_url('admin/delete/'.$ab['id']); ?> " class="btn btn-danger"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>
</div>