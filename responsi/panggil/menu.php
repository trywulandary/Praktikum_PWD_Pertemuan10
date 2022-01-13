<div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                </div>
                <?php
                if (isset($_SESSION['masuk'])) {
                ?>
                    <ul class="nav navbar-nav">
                        <li <?php if(@$_GET['a'] == 'buku'){ echo "class='active'";}?>><a href="?a=buku">Data Buku</a></li>
                        <li <?php if(@$_GET['a'] == 'peminjaman'){ echo "class='active'";}?>><a href="?a=peminjaman">Peminjaman Buku</a></li>
                        <li <?php if(@$_GET['a'] == 'laporan'){ echo "class='active'";}?>><a href="?a=laporan">Laporan Data Buku</a></li>
                        <li <?php if(@$_GET['a'] == 'informasi.php'){ echo "class='active'";}?>><a href="?a=informasi">Informasi Terkait SD Qurrota A'yun</a></li>
                        
                        

                    </ul>
                    <ul style="float: right;" class="nav navbar-nav">
                    <?php
                    if (@$_GET['keluar'] == '1') {
                    unset($_SESSION['masuk']);
                    header("location:./");
                    }
                    ?>
                        <li><a href="?keluar=1">Log Out</a></a></li>
                    </ul>
                <?php
                }
                ?>
            </div>
            