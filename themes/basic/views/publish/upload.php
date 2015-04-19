<form id="upForm" action="<?php echo $this->createUrl('repairUpload'); ?>" method="post" enctype    ="multipart/form-data">
    <input type="file" name="repair_attached_file" id="repair_attached_file" />
    <input type="hidden" name="YII_CSRF_TOKEN" value="<?php echo Yii::app()->request->csrfToken; ?>" />
    <input type="submit" name="submitBtn" value="立即上传" />
</form>
<span id="upload_repairinfo_success" style="color:blue;"></span>
