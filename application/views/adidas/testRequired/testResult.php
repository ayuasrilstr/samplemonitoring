<style>
    .card-modern {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-bottom: 15px;
        transition: all 0.3s;
    }
    .card-header-modern {
        background-color: #001f3f;
        color: white;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        padding: 10px 15px;
    }
    .card-body-modern {
        padding: 15px;
        background-color: #f8f9fa;
    }
    .toggle-icon {
        transition: transform 0.3s;
    }
    .toggle-icon.rotate {
        transform: rotate(180deg);
    }
    .shrinkage{
        display: none;
    }
    .form-check {
    display: flex;
    align-items: center;
    gap: 6px; /* jarak antara checkbox & label */
    }

    .form-check-input {
    position: static !important; /* hilangkan posisi absolut bawaan */
    margin-top: 0 !important;
    }

    .form-check-label {
    margin-bottom: 0;
    font-size: 11px;
}
</style>

<div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Sample Monitoring</a></li>
                <li class="breadcrumb-item active">Kualitas - <?= htmlspecialchars($testResult->report_no ?? '') ?></li>
                </ol>
          </div>
          
        </div>
      </div>
</div>
<section class="content">
    <div class="container-fluid">
        <form action = "<?php echo site_url('c_transaksi/tambahaksi_method'); ?>" method="post" name="method"> 
            <!-- Inputan ID -->
            <?php $firstTestResult = isset($testResult[0]) ? $testResult[0] : null; ?>
            <input type="hidden" name="id_kualitas" value="<?= $id_kualitas ?>">
            <input type="hidden" name="id_penerimaan" value="<?= $firstTestResult->id_penerimaan ?? '' ?>">
            <input type="hidden" name="id_reportkualitas" value="<?= $firstTestResult->id_reportkualitas ?? $kodereport ?>">
            <input type="hidden" name="report_no" value="<?= $firstTestResult->report_no ?? $report_no ?>">

            <input type="hidden"
                name="test_required"
                value='<?= json_encode($test_required) ?>'>
            <!-- CARD Data Quality -->
            <div class="card card-modern">
                <div class="card-header-modern" data-toggle="collapse" data-target="#cardDataQuality" onclick="this.querySelector('.toggle-icon').classList.toggle('rotate')">
                    <span>Kualitas - <?= htmlspecialchars($testResult->test_required ?? '') ?></span>
                    <i class="fas fa-chevron-down toggle-icon"></i>
                </div>
                <div id="cardDataQuality" class="collapse show">
                    <div class="card-body-modern">
                        <!-- Semua input Data Quality -->
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date Of Sampling</label>
                                <input class="form-control" type="date" name="date_sampling">
                            </div>
                            <div class="col-md-6">
                                <label>Time Of Sampling</label>
                                <input class="form-control" type="time" name="time_sampling">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label>Date Of Test</label>
                                <input class="form-control" type="date" name="date_test">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label>Date Finish Of Test</label>
                                <input class="form-control" type="date" name="date_finish">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CARD Other -->
            <div class="card card-modern other" style="display: none;">
                <div class="card-header-modern" data-toggle="collapse" data-target="#cardAfterWash" onclick="this.querySelector('.toggle-icon').classList.toggle('rotate')">
                    <span>Other - <?= htmlspecialchars($testResult->test_required ?? '') ?></span>
                    <i class="fas fa-chevron-down toggle-icon"></i>
                </div>
                <div id="cardAfterWash" class="collapse">
                   <div class="card-body-modern">
                        <div class="col-md-12">
                             <span class="fw-semibold d-block mb-2" style="font-size:12px;"><b>Washing Condition</b></span><br>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="line_dry" name="line_dry">
                                    <label class="form-check-label" for="line_dry">Line Dry</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Temperature</label>
                                <input type="text" name="temp" id="temp" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tumble_dry" name="tumble_dry">
                                    <label class="form-check-label" for="tumble_dry">Tumble Dry</label>
                                </div>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Machine Model</label>
                                <input type="text" name="machine_model" id="machine_model"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="hand_dry" name="hand_dry">
                                    <label class="form-check-label" for="hand_dry">Hand Wash Cold</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fibre Composition</label>
                                <input type="text" name="fibre_com" id="fibre_comp" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr class="mt-2 mb-3">
                        </div>
                        <div class="col-md-6">
                            <span class="fw-semibold d-block mb-2" style="font-size:11px;">Stretched Neck Opening is OK according to size spec?</span>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="neck_yes" name="neck_yes">
                                    <label class="form-check-label" for="neck_yes">Yes</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="neck_no" name="neck_no">
                                    <label class="form-check-label" for="neck_no">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr class="mt-2 mb-3">
                        </div>
                        <div class="col-md-12">
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;"><b>Spirality</b></span>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Body (%)</label>
                                <input type="text" name="body" id="body" class="form-control">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label>Sleeve (%)</label>
                                <input type="text" name="sleeve" id="sleeve" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sideseam (%)</label>
                                <input type="text" name="sideseam" id="sideseam" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sleeve cuff width</label>
                                <input type="text" name="sle_width" id="sle_width" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>movement of side seam     cm</label>
                                <input type="text" name="mov_sideseam" id="mov_sideseam" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>movement of sleeve opening     cm</label>
                                <input type="text" name="mov_sleeve" id="mov_sleeve" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr class="mt-2 mb-3">
                        </div>
                        <!------After Wash Appearance Check List------>
                        <div class="col-md-12">
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;"><b>After Wash Appearance Check List</b></span>
                        </div>
                        <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">Trim Durability</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">1. Wash</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">3. Wash**</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">15. Wash***</span>
                        </div>
                         <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">Comment</span>
                        </div>
                        <!---PRINT--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Print / Heat Transfer</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_print" id="1_wash_print" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="3_wash_print" id="3_wash_print" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="15_wash_print" id="15_wash_print" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" name="com_wash_print">
                            </div>
                        </div>
                        <!---Embroidery--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Embroidery</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="1_wash_emb" id="1_wash_emb" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                 <select name="3_wash_emb" id="3_wash_emb" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="15_wash_emb" id="15_wash_emb" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_emb" name="com_wash_emb">
                            </div>
                        </div>
                        <!---Label--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Label</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="1_wash_label" id="1_wash_label" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                 <select name="3_wash_label" id="3_wash_label" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="15_wash_label" id="15_wash_label" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_label" name="com_wash_label">
                            </div>
                        </div>
                         <!---Zipper/ snap button/ button/tie cord/etc.--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Zipper/ snap button/ button/tie cord/etc.</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_zip" id="1_wash_zip" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="3_wash_zip" id="3_wash_zip" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="15_wash_zip" id="15_wash_zip" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_zip" name="com_wash_zip">
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">Fabric Properties</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">1. Wash</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">3. Wash**</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">15. Wash***</span>
                        </div>
                         <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">Comment</span>
                        </div>
                        <!---Discoloration   (colour change)--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Discoloration   (colour change)</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_dis" id="1_wash_dis" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                 <select name="3_wash_dis" id="3_wash_dis" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="15_wash_dis" id="15_wash_dis" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_dis" name="com_wash_dis">
                            </div>
                        </div>
                        <!---Colour Staining --->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Colour Staining </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_sta" id="1_wash_sta" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="3_wash_sta" id="3_wash_sta" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <select name="15_wash_sta" id="15_wash_sta" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_sta" name="com_wash_sta">
                            </div>
                        </div>
                        <!---Pilling--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Pilling</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_pil" id="1_wash_pil" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="3_wash_pil" id="3_wash_pil" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="15_wash_pil" id="15_wash_pil" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_pil" name="com_wash_pil">
                            </div>
                        </div>
                         <!---Shrinkage & Spirality--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Shrinkage & Spirality.</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="1_wash_shrink" id="1_wash_shrink" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="3_wash_shrink" id="3_wash_shrink" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="15_wash_shrink" id="15_wash_shrink" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_shrink" name="com_wash_shrink">
                            </div>
                        </div>
                        <!---Appearance of garment after wash---->
                        <div class="col-md-3"><br>
                            <label>Appearance of garment after wash</label>
                        </div>
                        <div class="col-md-2"><br>
                            <div class="form-group">
                               <select name="1_wash_app" id="1_wash_app" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2"><br>
                            <div class="form-group">
                                  <select name="3_wash_app" id="3_wash_app" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2"><br>
                            <div class="form-group">
                                 <select name="15_wash_app" id="15_wash_app" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                               <input type="text" class="form-control" name="com_wash_app" id="com_wash_app">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- CARD Sock -->
            <div class="card card-modern sock" style="display: none;">
                <div class="card-header-modern" data-toggle="collapse" data-target="#cardDataSock" onclick="this.querySelector('.toggle-icon').classList.toggle('rotate')">
                    <span>After Wash Appearance Checklist Sock</span>
                    <i class="fas fa-chevron-down toggle-icon"></i>
                </div>
                <div id="cardDataSock" class="collapse">
                    <div class="card-body-modern">
                        <!-- Semua input Data Quality -->
                        <div class="row">
                        <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">&nbsp;</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">1. Wash</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">3. Wash**</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">15. Wash***</span>
                        </div>
                        <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">Comment</span>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jaguard logo appearance</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_logo" id="1_wash_print" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="3_wash_logo" id="3_wash_logo" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="15_wash_logo" id="15_wash_logo" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" name="com_wash_logo">
                            </div>
                        </div>
                         <!------After Wash Appearance Check List------>
                        <div class="col-md-12">
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;"><b>After Wash Appearance Check List</b></span>
                        </div>
                        <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">Trim Durability</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">1. Wash</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">3. Wash**</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">15. Wash***</span>
                        </div>
                        <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">Comment</span>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <!---PRINT--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Print / Heat Transfer</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_print" id="1_wash_print" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="3_wash_print" id="3_wash_print" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="15_wash_print" id="15_wash_print" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" name="com_wash_print">
                            </div>
                        </div>
                        <!---Embroidery--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Embroidery</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="1_wash_emb" id="1_wash_emb" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                 <select name="3_wash_emb" id="3_wash_emb" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="15_wash_emb" id="15_wash_emb" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_emb" name="com_wash_emb">
                            </div>
                        </div>
                        <!---Label--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Accesorries (badge/label etc.)</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="1_wash_label" id="1_wash_label" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                 <select name="3_wash_label" id="3_wash_label" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="15_wash_label" id="15_wash_label" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_label" name="com_wash_label">
                            </div>
                        </div>
                     
                        <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">Fabric Properties</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">1. Wash</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">3. Wash**</span>
                        </div>
                        <div class="col-md-2"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">15. Wash***</span>
                        </div>
                         <div class="col-md-3"><br>
                           <span class="fw-semibold d-block mb-2" style="font-size:12px;">Comment</span>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <!---Discoloration   (colour change)--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Discoloration   (colour change)</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_dis" id="1_wash_dis" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                 <select name="3_wash_dis" id="3_wash_dis" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="15_wash_dis" id="15_wash_dis" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_dis" name="com_wash_dis">
                            </div>
                        </div>
                        <!---Colour Staining --->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Colour Staining </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_sta" id="1_wash_sta" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="3_wash_sta" id="3_wash_sta" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <select name="15_wash_sta" id="15_wash_sta" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_sta" name="com_wash_sta">
                            </div>
                        </div>
                        <!---Pilling--->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Pilling</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               <select name="1_wash_pil" id="1_wash_pil" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="3_wash_pil" id="3_wash_pil" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="15_wash_pil" id="15_wash_pil" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                               <input type="text" class="form-control" id="com_wash_pil" name="com_wash_pil">
                            </div>
                        </div>
                        <!---Appearance of garment after wash---->
                        <div class="col-md-3"><br>
                            <label>Appearance of sock after wash</label>
                        </div>
                        <div class="col-md-2"><br>
                            <div class="form-group">
                               <select name="1_wash_app" id="1_wash_app" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2"><br>
                            <div class="form-group">
                                <select name="3_wash_app" id="3_wash_app" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2"><br>
                            <div class="form-group">
                                 <select name="15_wash_app" id="15_wash_app" class="form-control">
                                    <option selected disabled>PILIH</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                               <input type="text" class="form-control" name="com_wash_app" id="com_wash_app">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CARD Test Method -->
            <div class="card card-modern">
                <div class="card-header-modern" data-toggle="collapse" data-target="#cardTestMethod" onclick="this.querySelector('.toggle-icon').classList.toggle('rotate')">
                    <span>&nbsp;</span>
                    <i class="fas fa-chevron-down toggle-icon"></i>
                </div>
                <div id="cardTestMethod" class="collapse">
                    <div class="card-body-modern test_result">
                            <h3>Test Result - Report No: <?= htmlspecialchars($report_no) ?></h3>
                        <!-- ================= FILTER TYPE TEST ================= -->
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <div class="dropdown flex-fill">
                                <button class="btn btn-outline-secondary dropdown-toggle w-100"
                                        type="button"
                                        data-toggle="dropdown">
                                    Filter Type Test
                                </button>

                                <div class="dropdown-menu p-3" id="filter-type">

                                    <!-- ACTION -->
                                    <div class="d-flex justify-content-between mb-2">
                                        <button type="button"
                                                class="btn btn-sm btn-link p-0 select-all"
                                                data-target="type">
                                            Select All
                                        </button>
                                        <button type="button"
                                                class="btn btn-sm btn-link text-danger p-0 clear-all"
                                                data-target="type">
                                            Clear All
                                        </button>
                                    </div>

                                    <hr class="my-2">

                                    <?php foreach(array_keys($matrix_group) as $type): ?>
                                        <div class="form-check">
                                            <input class="form-check-input filter-type"
                                                type="checkbox"
                                                value="<?= htmlspecialchars($type) ?>"
                                                checked
                                                id="type_<?= md5($type) ?>">
                                            <label class="form-check-label"
                                                for="type_<?= md5($type) ?>">
                                                <?= htmlspecialchars($type) ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                </div>
                                <div class="dropdown flex-fill">
                                    <button class="btn btn-outline-secondary dropdown-toggle w-100"
                                            type="button"
                                            data-toggle="dropdown">
                                        Filter Method Group
                                    </button>
                                    <div class="dropdown-menu p-3">
                                        <!-- ACTION -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <button type="button"
                                                    class="btn btn-sm btn-link p-0 select-all"
                                                    data-target="method-group">
                                                Select All
                                            </button>
                                            <button type="button"
                                                    class="btn btn-sm btn-link text-danger p-0 clear-all"
                                                    data-target="method-group">
                                                Clear All
                                            </button>
                                        </div>
                                         <hr class="my-2">
                                         <div id="filter-method-group">

                                         </div>
                                    </div>
                                </div>
                                <div class="dropdown flex-fill">
                                    <button class="btn btn-outline-secondary dropdown-toggle w-100"
                                            type="button"
                                            data-toggle="dropdown">
                                        Filter Test Level
                                    </button>
                                    <div class="dropdown-menu p-3">
                                        <!-- ACTION -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <button type="button"
                                                    class="btn btn-sm btn-link p-0 select-all"
                                                    data-target="test-level">
                                                Select All
                                            </button>
                                            <button type="button"
                                                    class="btn btn-sm btn-link text-danger p-0 clear-all"
                                                    data-target="test-level">
                                                Clear All
                                            </button>
                                        </div>
                                        <hr class="my-2">
                                        <div id="filter-test-level">

                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown flex-fill">
                                    <button class="btn btn-outline-secondary dropdown-toggle w-100"
                                            type="button"
                                            data-toggle="dropdown">
                                        Filter Composition
                                    </button>
                                    <div class="dropdown-menu p-3">
                                        <!-- ACTION -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <button type="button"
                                                    class="btn btn-sm btn-link p-0 select-all"
                                                    data-target="composition">
                                                Select All
                                            </button>
                                            <button type="button"
                                                    class="btn btn-sm btn-link text-danger p-0 clear-all"
                                                    data-target="composition">
                                                Clear All
                                            </button>
                                        </div>
                                        <hr class="my-2">
                                        <div id="filter-composition">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        <!-- ================= TABLE ================= -->
                       
                            <table class="table table-bordered table-striped">
                                <thead>
                                     <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Test Method</th>
                                        <th width="15%">Method Name</th>
                                        <th width="20%">Requirement</th>
                                        <th width="15%">Result</th>
                                        <th width="20%">Statement / Comment</th>
                                        <th width="10%">Status</th>
                                    </tr>
                                </thead>
                                 <?php $no = 1; ?>
                                <?php foreach ($matrix_group as $type => $rows): ?>

                                <tbody class="type-group" data-type="<?= htmlspecialchars($type) ?>">

                                <tr style="background:#e9ecef;font-weight:bold;">
                                    <td colspan="7"><?= strtoupper(htmlspecialchars($type)) ?></td>
                                </tr>

                                <?php foreach ($rows as $r): ?>
                                <tr
                                    data-type="<?= htmlspecialchars($type) ?>"
                                    data-method-group="<?= htmlspecialchars($r['id_methodgroup']) ?>"
                                    data-test-level="<?= htmlspecialchars($r['test_level']) ?>"
                                    data-composition="<?= htmlspecialchars($r['composition']) ?>"
                                    data-result-type="<?= htmlspecialchars(strtolower($r['result_type'])) ?>"
                                    data-value-from="<?= htmlspecialchars($r['value_from']) ?>"
                                    data-value-to="<?= htmlspecialchars($r['value_to']) ?>"
                                >
                                    <!-- NO -->
                                    <td><?= $no++ ?></td>

                                    <!-- TEST METHOD -->
                                    <td><?= htmlspecialchars($r['method_code']) ?></td>

                                    <!-- METHOD NAME -->
                                    <td><?= htmlspecialchars($r['title']) ?></td>

                                    <!-- REQUIREMENT -->
                                    <td>
                                        <?php if (!empty($r['remarks']) && $r['remarks'] !== '-'): ?>
                                            <?= htmlspecialchars($r['remarks']) ?><br>
                                        <?php endif; ?>

                                        <?php if (!empty($r['value_from']) && $r['value_from'] !== '-'): ?>
                                            <b>Value From:</b> <?= htmlspecialchars($r['value_from']) ?><br>
                                        <?php endif; ?>

                                        <?php if (!empty($r['value_to']) && $r['value_to'] !== '-'): ?>
                                            <b>Value To:</b> <?= htmlspecialchars($r['value_to']) ?>
                                        <?php endif; ?>
                                    </td>

                                    <!-- RESULT -->
                                    <td class="result-cell"></td>

                                    <!-- COMMENT (FREE TEXT) -->
                                    <td>
                                        <input type="text" class="form-control comment-input">
                                    </td>

                                    <!-- STATUS -->
                                    <td class="status-cell fw-bold"></td>

                                    <!-- HIDDEN FOR SUBMIT -->
                                    <input type="hidden" name="id_testmatrix[]" value="<?= $r['id_testmatrix'] ?>">
                                    <input type="hidden" name="result[]" class="result-hidden">
                                    <input type="hidden" name="comment[]" class="comment-hidden">
                                    <input type="hidden" name="status[]" class="status-hidden">

                                </tr>
                                <?php endforeach; ?>

                                </tbody>
                                <?php endforeach; ?>
                                </table>
                    </div>
                </div>
                <div class="collapse show" id="cardKerajangMethod">
                    <div class="col-md-12"><hr>
                           
                    </div>
                </div> 
                <div class="card-footer">
                    <div class="col-md-1">
                        <a href="<?=site_url('#')?>" type="button" class="btn btn-block" style="background-color: #001f3f; color: white;">Back</a>
                    </div>
                    <div class="col-md-10">
                        
                    </div>
                    <div class="col-md-1">
                        <ol class="float-sm-right">
                            <button type="submit" class="btn btn-block" style="background-color: #001f3f; color: white;" value="Tambah">Submit</button>
                        </ol>
                    </div>      
                </div>
            </div>
        </form>
    </div>         
</section>

               
