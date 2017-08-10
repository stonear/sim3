<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">business</i>
            </div>
            <div class="content">
                <div class="text">FAKULTAS</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_fakultas[0]->count; ?>" data-speed="15" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">account_balance</i>
            </div>
            <div class="content">
                <div class="text">DEPARTEMEN</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_departemen[0]->count; ?>" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group</i>
            </div>
            <div class="content">
                <div class="text">ANGKATAN</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_angkatan[0]->count; ?>" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">person</i>
            </div>
            <div class="content">
                <div class="text">MAHASISWA</div>
                <div class="number count-to" data-from="0" data-to="<?php echo $jumlah_mahasiswa[0]->count; ?>" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function ()
    {
        //Widgets count
        $('.count-to').countTo();
    });
</script>

<div class="row clearfix">
    <div class="col-sm-8 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Grafik Pengunjung</h2>
            </div>
            <div class="body">
                <canvas id="pengunjung" height="140"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Reset Password Mahasiswa</h2>
                <small>Karena manusia tempatnya salah dan lupa.</small>
            </div>
            <div class="body">
                <form class="form-horizontal" autocomplete="off" role="form" action="<?php echo base_url(); ?>Admin/reset_password" method="post">
                    <div class="row clearfix">
                        <div class="col-xs-2 form-control-label">
                            <label for="nrp"><i class="material-icons col-light-blue">account_box</i></label>
                        </div>
                        <div class="col-xs-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="nrp" name="nrp" class="form-control" placeholder="masukkan nrp" required pattern="[0-9]+">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-xs-2 form-control-label">
                            <label for="password"><i class="material-icons col-light-blue">vpn_key</i></label>
                        </div>
                        <div class="col-xs-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="masukkan password baru" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                    <div class="help-info">Password harus 8 karakter atau lebih, mengandung huruf kapital, huruf kecil, dan angka.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-xs-offset-2">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        new Chart(document.getElementById("pengunjung").getContext("2d"), getChartJs('line'));
    });

    function getChartJs(type)
    {
        var config = null;

        if (type === 'line')
        {
            config =
            {
                type: 'line',
                data:
                {
                    labels:
                    [
                        <?php
                            $i = 7;
                            while($i)
                            {
                                if ($i != 1)
                                {
                                    echo '"'.date("F", strtotime("-".--$i." month")).'", ';
                                }
                                else
                                {
                                    echo '"'.date("F", strtotime("now")).'"';
                                    $i = 0;
                                }
                            }
                        ?>
                    ],
                    datasets: [{
                        label: "Jumlah Pengunjung",
                        data:
                        [
                            <?php
                                $i = count($jumlah_pengunjung);
                                while($i)
                                {
                                    echo $jumlah_pengunjung[--$i];
                                    if ($i != 0) echo ', ';
                                }
                            ?>
                        ],
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options:
                {
                    responsive: true,
                    legend: false
                }
            }
        }
        return config;
    }
</script>