<p><?= $typedata->description ?></p>

<?php if (count($subtype) != 0) : ?>
    <label for="type_sub" class="col-form-label">انتخاب نوع جزئی تر :</label>
    <select onchange="Showtow()" class="form-select mb-2" id="type_sub" name="type_sub" aria-label="Default select example">
        <option selected value="0">
            همه موارد زیر مجموعه
        </option>
        <?php foreach ($subtype as $row) : ?>
            <?php if ($row->is_active == 1) : ?>
                <option value="<?php echo $row->id ?>">
                    <?php echo $row->title ?>
                </option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>

    <div class="px-2 mb-3" id="tozih2"></div>

<?php endif; ?>