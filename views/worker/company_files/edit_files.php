<?php
include 'views/others/errors.php';
//$list_languages = list_languages($db);
?>
<div class="row justify-content-center py-4 mx-0">

    <div class=" offset-1 col-10"> 
        <div class="card card-body bg-transparent border-0 shadow-sm">
            <form enctype="multipart/form-data" method="post" action="worker.php?page=controllers\worker\company_files\edit_files_controller" class="needs-validation" novalidate>
            <input type="hidden" name="id" value="<?= $id_file ?? $data["id"]  ?>" >    
            <div class="text-center my-4">
                    <span class="h3 font-weight-bold text-light"><?= language_content("Editer fichier ", "Edit file") ?></span>
                </div>

                <div class="row my-5">
                    <div class="custom-file col-8  mt-2">
                        <input type="file" name="files" class="custom-file-input" id="file" onchange="document.getElementById('preview_file').src = window.URL.createObjectURL(this.files[0])">
                        <label class="custom-file-label bg-dark text-light" for="file">
                            <?= isset($_FILES['files']['name']) ? $_FILES['files']['name'] : language_content("Choisir le fichier de mise à jour", "choose the new file") ?>
                        </label>
                        <p>
                            <i class="fa fa-info-circle"></i> <?= language_content(" les extensions pris en charge sont: jpeg, jpg, gif, png, doc, docx, xls, xlsx, pdf, zip, rar, pptx, pptm", " suppported extensions are: jpeg, jpg, gif, png, doc, docx, xls, xlsx, pdf, zip, rar, pptx, pptm") ?>
                        </p>
                    </div>
                    <!-- <div class="col-4  mt-2">

                        <?php if (pathinfo($_FILES['files']['name'])['extension'] == "jpeg") : ?>
                            <iframe width="500" height="100" class="bg-transparent img-thumbnail" w-100 id="preview_file" alt="Apercue fichier"></iframe>
                        <?php else : ?>
                            <p>
                                FICHIER SLECTIONNE
                            </p>
                        <?php endif; ?>
                    </div> -->
                </div>

                <div class="row mb-4 mt-0">

                </div>

                <div class="row justify-content-center">
                    <button type="submit" name="submit_edit_file" class="btn btn-outline-info col-md-4"><?= language_content("Editer", "Edit") ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- <div class="col-sm-6 pr-0 mr-0">
        <div class="card rounded-circle card-body p-0 text-center">
            <img class="img-thumbnail w-100" id="preview_image" alt="Apercue image" />
        </div>
    </div> -->

</div>

<!-- <div class="row justify-content-center py-4 mx-0">
    <div class="col-2 pr-0 mr-0">
        <div class="card card-body p-0 text-center">
            <img class="img-thumbnail w-100" id="preview_image" alt="Apercue image" />
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-body shadow-sm">
            <form enctype="multipart/form-data" method="post" action="index.php?page=controllers/subjects/add-subject-controller" class="needs-validation" novalidate>
                <div class="text-center my-4">
                    <span class="h3 font-weight-bold text-secondary">Ajouter un Sujet</span>
                </div>
                <div class="row my-4">
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Titre<span class="text-danger">&nbsp;*</span></label>
                        <input type="text" name="title" class="form-control " required id="exampleInputEmail1" value="<?= $data['title'] ?? '' ?>" aria-describedby="">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="input-group col">
                        <div class="custom-file  mt-2">
                            <input type="file" name="image" class="custom-file-input" id="image" onchange="document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0])">
                            <label class="custom-file-label" for="image">Choisir une image</label>
                        </div>
                    </div>

                    <div class="input-group col ">
                        <select required name="language" class="custom-select mt-2" id="gender">
                            <option value="0">Choisir le Langage...</option>
                            <?php foreach ($list_languages as $language) : ?>
                                <option <?= (isset($data['language'])) && $data['language'] === $language['LanguagesId'] ? 'selected' : '' ?> value="<?= $language['LanguagesId'] ?>"><?= $language['LanguageName'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="form-group col">
                        <label for="description"> Description <span class="text-danger">&nbsp;*</span></label>
                        <textarea class="form-control" name="description" id="description" cols="25" rows="3">
                        <?= $data['description'] ?? '' ?>
                        </textarea>
                    </div>
                </div>

                <div class="row no-gutters">
                    <div class="text-danger float-left">Champs obligatoirs *</div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit_add_subject" class="btn btn-secondary col-md-4">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div> -->