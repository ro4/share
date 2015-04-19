<?php
class TestController extends Controller
{
    function actionIndex()
    {
        $dir = '/public/upload/data';
        $uploaded = false;
        $model = new Upload();
        if (isset($_POST['Upload'])) {
            $model->attributes = $_POST['Upload'];
            $file = CUploadedFile::getInstance($model, 'file');
            $newName = substr(md5($file->extensionName . round((microtime(true) * 1000))), 0, 17) . '.' . $file->extensionName;
            $file_name = $dir . '/' . $newName;
            if ($model->validate()) {
                $attach = new Attache();
                $uploaded = $file->saveAs($file_name, TRUE);
                $attach->name = 'test';
                $attach->path = $file_name;
                $attach->create_time = time();
                $attach->save();
            }
        }
 
        $this->render('upload', array(
            'model' => $model,
            'uploaded' => $uploaded,
            'dir' => $dir,
        ));
    }
}